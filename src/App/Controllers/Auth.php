<?php

namespace App\Controllers;

use App\Models\Education;
use App\Models\User;
use Core\Config;
use Core\Validator\ValidateErrors;

/**
 * Контроллер страницы авторизации
 * Class Auth
 * @package App\Controllers
 */
class Auth extends Base
{
    public function __construct()
    {
        $this->login = false;
        parent::__construct();
    }

    protected function indexAction($params)
    {
        $this->loginAction();
    }

    protected function loginAction()
    {
        $this->checkRemember();

        if ($this->isPost()) {
            $this->authUser($_POST['email'], $_POST['password'], $_POST['remember'] == 'on');
        }

        $this->view->title = $this->lang->findByKey('loginAuthTitle');
        $this->view->icon = 'lock.png';
        $this->view->renderTemplate('auth/index', [
            'content' => 'auth/login'
        ]);
    }

    protected function registrationAction()
    {
        $this->view->errors = [];

        if ($this->isPost()) {
            $data = $_POST;
            $data['photo'] = $_FILES['photo'];

            $user = User::create($data);
            $errors = $user->validate();

            if (!$errors->hasError()) {
                $user->save();
                $_SESSION['userId'] = $user->id;
                $this->redirect('/index/index/users/' . $user->id);
            }

            $this->view->user = $user;
            $this->view->errors = $errors->getErrors();
        }

        $this->view->title = $this->lang->findByKey('loginRegTitle');
        $this->view->icon = 'reg.png';
        $this->view->educations = Education::getAll();
        $this->view->renderTemplate('auth/index', [
            'content' => 'auth/registration'
        ]);
    }

    protected function logoutAction()
    {
        if (!empty(session_id())) {
            session_unset();
            session_destroy();
        }

        $this->dieCookie('email');
        $this->dieCookie('pass');

        $this->redirect('/auth');
    }

    private function checkRemember()
    {
        $email = $_COOKIE['email'];
        $pass = $_COOKIE['pass'];

        if (!empty($email) && !empty($pass)) {
            $user = User::getByEmail($email);
            // strcmp если = тогда 0, а 0 приобразуется в false, поэтому !strcmp() = true
            if (!strcmp($user->email, $email) && !strcmp($user->password, $pass)) {
                $_SESSION['userId'] = $user->id;
                $this->redirect('/index/index/users/'. $user->id);
            }
        }
    }

    private function authUser($email, $password, $remember)
    {
        if (User::authorization($email, $password)) {
            $user = User::getByEmail($email);

            if ($remember) {
                $this->setCookie('email', $user->email);
                $this->setCookie('pass', $user->password);
            }
            $_SESSION['userId'] = $user->id;
            $this->redirect('/index/index/users/' . $user->id);
        } else {
            $this->view->error = $this->lang->findByKey('loginError');
        }
    }

    private function dieCookie($name)
    {
        $cookieSettings = Config::getCookieSettings('time_die_cookie');
        setcookie($name, '', $cookieSettings, '/');
    }

    private function setCookie($name, $value)
    {
        $cookieSettings = Config::getCookieSettings('time_life_cookie');
        setcookie($name, $value, $cookieSettings, '/');
    }
}

<?php

namespace App\Controllers;

use App\Models\Education;
use App\Models\User;
use Core\Config;

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

//    /**
//     * Метод генерации страницы авторизации
//     */
//    public function indexAction()
//    {
//        $this->title = $this->getString('loginAuthTitle'); //"Авторизация";
//        $this->icon = "lock.png";
//
//        if ($this->isPost()) {
//            $this->authorization();
//        } else {
//            $user = $this->getUser($this->getParamCookie('email'));
//            $password = $this->getParamCookie('pass');
//
//            if ($this->checkUser($user, $password, FALSE)) {
//                $this->userAuth($user['id']);
//            }
//        }
//
//        // Сохраняем данные для контента страницы
//        $this->addPageData("contentData", "contentData");
//        // Генерируем контент страницы
//        $this->_content = $this->render(self::VIEWS_PATCH . "login.php");
//    }
//
//    /**
//     * Метод авторизации пользователя
//     */
//    private function authorization()
//    {
//        $user = $this->getUser($this->getParamPost("email"));
//        $password = $this->getParamPost("password");
//
//        if ($this->checkUser($user, $password)) {
//            $remember = $this->getParamPost('remember');
//            if ($remember == 'on') {
//                $this->setParamCookie('email', $this->getParamPost("email"), TIME_LIFE_COOKIE);
//                $this->setParamCookie('pass', md5($password), TIME_LIFE_COOKIE);
//            }
//
//            $this->userAuth($user['id']);
//        } else {
//            $this->addPageData("error", $this->getString("loginError"));
//        }
//    }
//
//    /**
//     * Метод возвращает пользовательские данные по значению введенного e-mail
//     * @param string $email - Почтовый ящик
//     * @return array
//     */
//    private function getUser($email)
//    {
//        return (new M_Users())->getByEmail($email);
//    }
//
//    /**
//     * Метод проверяет совпадает ли введенный пароль с паролем, хранящимся в БД
//     * @param string $user - Пользователь
//     * @param string $password - Введенный пароль
//     * @param boolean $passToHesh - При проверке введенный пароль хэшировать
//     * @return boolean
//     */
//    private function checkUser($user, $password, $passToHesh = TRUE)
//    {
//        return !empty($user) && $user['password'] == ($passToHesh ? md5($password) : $password);
//    }
//
//    /**
//     * Метод заносит id авторизованного пользователя в сессию
//     * (чтобы не предлагать повторную авторизацию), и перебрасывает на главную страницу
//     * @param int $userId - id пользователя
//     */
//    private function userAuth($userId)
//    {
//        $this->setParamSession('userId', $userId);
//        $this->redirect('?c=main');
//    }
//
//    /**
//     * Метод генерации страницы регистрации
//     */
//    public function regAction()
//    {
//        $this->title = $this->getString("loginRegTitle"); // "Регистрация";
//        $this->icon = "reg.png";
//
//        if ($this->isPost()) {
//            try {
//                $this->registrationUser();
//            } catch (ExceptionController $exc) {
//                // NOP
//            }
//        }
//
//        $this->addPageData("educations", (new M_Educations())->getAll());
//
//        // Сохраняем данные для контента страницы
//        $this->addPageData("contentData", "contentData");
//        // Генерируем контент страницы
//        $this->_content = $this->render(self::VIEWS_PATCH . "registration.php");
//    }
//
//    /**
//     * Метод регистрации нового пользователя
//     * @throws ExceptionController
//     */
//    private function registrationUser()
//    {
//        $post = $this->getParamPost();
//        $post['photo'] = $this->getParamFile('photo');
//        $userData = new UserData($post);
//        $users = new M_Users();
//
//        try {
//            $userData->isRequiredFieldsEmpty();
//            $userData->isRequiredFieldsValid();
//            $userId = $users->add($userData);
//
//            $this->userAuth($userId);
//
//        } catch (ExceptionValidate $exc) {
//            $this->addPageData('warning', $exc->getMessage());
//            throw new ExceptionController();
//        } catch (ExceptionModel $exc) {
//            $this->addPageData('error', $exc->getMessage());
//            throw new ExceptionController();
//        }
//    }

    protected function indexAction($params)
    {
        $email = $_COOKIE['email'];
        $pass = $_COOKIE['pass'];

        if (!empty($email) && !empty($pass)) {
            $user = User::getByEmail($email);
            // strcmp если = тогда 0, а 0 приобразуется в false, поэтому !strcmp() = true
            $_SESSION['authorized'] = !strcmp($user->email, $email) && !strcmp($user->password, $pass);
        }
        
        $this->loginAction();
    }

    protected function loginAction()
    {
        $this->view->title = $this->lang->findByKey('loginAuthTitle');
        $this->view->icon = 'lock.png';

        if ($this->isPost()) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $_SESSION['authorized'] = User::authorization($email, $password);

            if ($_POST['remember'] == 'on') {
                $user = User::getByEmail($email);

                $this->setCookie('email', $email);
                $this->setCookie('pass', $user->password);
            }
            $this->redirect('/index');
        }

        $this->view->renderTemplate('auth/index', [
            'content' => 'auth/login'
        ]);
    }

    protected function registrationAction()
    {
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

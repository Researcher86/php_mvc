<?php

namespace App\Controllers;

use Core\AbstractController;
use Core\Config;
use Core\Locale;
use Core\View;

/**
 * Базовый класс приложения
 * Class Base
 * @package App\Controllers
 */
abstract class Base extends AbstractController
{
    protected $lang;
    protected $login = true;

    public function __construct()
    {
        if ($this->login && !$_SESSION['authorized']) {
            $this->redirect('/auth');
        }

        parent::__construct();
        $this->lang = new Locale($this->getUserLang());
        $this->view->lang = $this->lang;
    }


    protected function beforeAction()
    {
        // TODO: Implement beforeAction() method.
    }

    protected function afterAction()
    {
        // TODO: Implement afterAction() method.
    }

    protected function E404Action()
    {
        $this->view->renderTemplate('errors/404');
    }


    protected function E500Action()
    {
        $this->view->renderTemplate('errors/500');
    }

    private function getUserLang(): string
    {
        $lang = $_COOKIE['lang'] ?? substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        if ($this->checkLang($lang)) {
            return $lang;
        }

        return 'ru';
    }

    private function checkLang($lang): bool
    {
        return $lang == 'ru' || $lang == 'en';
    }
}
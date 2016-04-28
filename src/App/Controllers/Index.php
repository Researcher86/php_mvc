<?php

namespace App\Controllers;

use App\Models\Language;
use App\Models\User;
use Core\Exceptions\E404Exception;

/**
 * Контроллер главной страницы
 * Class Index
 * @package App\Controllers
 */
class Index extends Base
{

    protected function indexAction($params)
    {
        $this->view->user = User::getById((int)$params[1]);

        if (!isset($this->view->user)) {
            $this->view->user = User::getById($_SESSION['userId']);

            if (!isset($this->view->user)) {
                throw new E404Exception('User not found');
            }
        }

        $this->view->title = $this->lang->findByKey('webappTitle');
        $this->view->icon = "main.png";;
        $this->view->renderTemplate('index/index', [
            'content' => 'index/content'
        ]);
    }
}

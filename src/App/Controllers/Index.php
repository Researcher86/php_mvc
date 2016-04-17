<?php

namespace App\Controllers;

use App\Models\Language;
use App\Models\User;

/**
 * Контроллер главной страницы
 * Class Index
 * @package App\Controllers
 */
class Index extends Base
{

    protected function indexAction($params)
    {
//        $this->view->user = User::getById((int)$params[1]);
        $this->view->user = User::getById(1);

        $this->view->title = $this->lang->findByKey('webappTitle');
        $this->view->icon = "main.png";;
        $this->view->renderTemplate('index/index', [
            'content' => 'index/content'
        ]);
    }
}

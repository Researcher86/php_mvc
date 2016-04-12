<?php

namespace Core;

/**
 * Абстрактный класс всех контроллеров системы
 * Class AbstractController
 * @package App\Core
 */
abstract class AbstractController
{
    protected $view;

    public function __construct()
    {
        $prefix = Config::getViewSettings()['prefix'];
        $suffix = Config::getViewSettings()['suffix'];
        $this->view = new View($prefix, $suffix);
    }

    final protected function isGet()
    {
        return $_SERVER['REQUEST_METHOD'] == 'GET';
    }

    final protected function isPost()
    {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }

    /**
     * Метод редиректа
     * @param string $url - Адресная строка для перенаправления
     */
    final protected function redirect($url)
    {
        header('Location:' . $url);
        die();
    }

    abstract protected function beforeAction();
    abstract protected function afterAction();

    /**
     * Template Method
     * @param $name string - Имя метода контроллера
     * @param $params array - Параметры
     */
    final public function action($name, $params = null)
    {
        $this->beforeAction();
        $this->$name($params);
        $this->afterAction();
    }

}

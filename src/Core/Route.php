<?php

namespace Core;

use Core\Exceptions\E404Exception;

/**
 * Класс маршрутизатор
 * Class Route
 * @package App\Core
 */
class Route
{
    private $url;

    public function __construct(string $url)
    {
        $this->url = parse_url(trim($url, '/'), PHP_URL_PATH);
    }

    public function run()
    {
        $url = explode('/', $this->url);
        $controllerName = !empty($url[0]) ? ucfirst(array_shift($url)) : 'Index';
        $actionName = (!empty($url[0]) ? array_shift($url) : 'index') . 'Action';

        $controller = '\\App\\Controllers\\' . $controllerName;
        if (!class_exists($controller) && !is_subclass_of($controller, 'Core\AbstractController')) {
            throw new E404Exception('Controller ' . $controller . ' does not exist');
        }

        if (!method_exists($controller, $actionName)) {
            throw new E404Exception('Action ' . $actionName . ' is not found in controller ' . $controller);
        }

        (new $controller())->action($actionName, $url);
    }

}
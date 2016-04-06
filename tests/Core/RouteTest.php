<?php

namespace Core;

class RouteTest extends \PHPUnit_Framework_TestCase
{

    public function testRootDirControllers()
    {
        $_SERVER['REQUEST_URI'] = '/index';
        $route = new Route($_SERVER['REQUEST_URI']);
        $route->run();
    }

    public function testSubDirControllers()
    {
        $route = new Route('/admin/index');
        $route->run();
    }
}

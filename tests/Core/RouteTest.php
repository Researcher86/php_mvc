<?php

namespace Core;

class RouteTest extends \PHPUnit_Framework_TestCase
{
    public function testRootDirRoute()
    {
        $_SESSION['userId'] = 1;
        $route = new Route('/index/index/users/1');
        ob_start();
        $route->run();
        ob_end_clean();
    }

    /**
     * @expectedException Core\Exceptions\E404Exception
     */
    public function testIncorrectRoute()
    {
        $route = new Route('/index2');
        $route->run();
    }

    public function testSubDirRoute()
    {
        $this->markTestSkipped('Ignore testSubDirRoute');
        $route = new Route('/admin/index');
        $route->run();
    }
}

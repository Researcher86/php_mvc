<?php

namespace Core;

/**
 * Created by IntelliJ IDEA.
 * User: Tanat
 * Date: 04.04.2016
 * Time: 12:44
 */
class DbTest extends \PHPUnit_Framework_TestCase
{

    public function testInstance()
    {
        new Config(__DIR__ . '/../../App/config.php');
        Db::getInstance();
    }
}

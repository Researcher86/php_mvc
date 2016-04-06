<?php

namespace Core;

class DbTest extends \PHPUnit_Framework_TestCase
{

    public function testInstance()
    {
        Db::getInstance();
    }
}

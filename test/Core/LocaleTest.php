<?php

namespace Core;

class LocaleTest extends \PHPUnit_Framework_TestCase
{

    public function testCreate()
    {
        $locale = new Locale('en');
        $this->assertEquals('Login', $locale->findByKey('login'));
    }
}

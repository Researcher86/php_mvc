<?php

namespace Core;

class LocaleTest extends \PHPUnit_Framework_TestCase
{

    public function testInstance()
    {
        $locale = new Locale('ru');
        var_dump($locale->findByKey('login'));
    }
}

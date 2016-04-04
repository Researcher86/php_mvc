<?php

require_once realpath(__DIR__ . '/../Core/Loader/autoload.php');

/**
 * Created by IntelliJ IDEA.
 * User: Comp
 * Date: 04.04.2016
 * Time: 13:41
 */
class SeleniumTest extends PHPUnit_Extensions_Selenium2TestCase
{
    public function setUp()
    {
        $this->setHost('localhost');
        $this->setPort(4444);
        $this->setBrowserUrl('http://vaprobash.dev');
        $this->setBrowser('firefox');
    }
}
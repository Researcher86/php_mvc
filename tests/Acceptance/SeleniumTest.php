<?php

namespace Acceptance;

class SeleniumTest extends \PHPUnit_Extensions_Selenium2TestCase
{
//    public function setUp()
//    {
//        $this->setHost('localhost');
//        $this->setPort(4444);
//        $this->setBrowserUrl('http://vaprobash.dev');
//        $this->setBrowser('firefox');
//    }

    protected function setUp()
    {
        // Which browser to use
        $this->setBrowser('firefox');
        // The base URL
        $this->setBrowserUrl('http://www.phpro.org/');
    }
}
<?php

namespace App\Models;

use Core\Config;

/**
 * Created by IntelliJ IDEA.
 * User: Tanat
 * Date: 04.04.2016
 * Time: 12:44
 */
class EducationTest extends \PHPUnit_Framework_TestCase
{

    public function testEducation()
    {
        new Config(__DIR__ . '/../../../App/config.php');
        $education = Education::getAll();
//
//        var_dump($education);

        $this->assertEquals(true, false);
//        $this->assertTrue(false);
    }
}

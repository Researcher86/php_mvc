<?php

namespace App\Models;

class EducationTest extends \PHPUnit_Framework_TestCase
{

    public function testEducation()
    {
        $education = Education::getAll();
//
//        var_dump($education);

        $this->assertEquals(true, true);
//        $this->assertTrue(false);
    }
}

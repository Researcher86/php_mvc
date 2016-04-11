<?php

namespace App\Models;

class EducationTest extends AbstractBaseTest
{

    public function testGetAll()
    {
        $educations = Education::getAll();

        $this->assertEquals(3, count($educations));
    }

    public function testGetById()
    {
        $education = Education::getById(2);

        $this->assertTrue($education instanceof Education);
    }

}

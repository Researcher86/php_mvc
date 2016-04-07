<?php

namespace App\Models;

class EducationTest extends BaseTest
{

    public function testEducation()
    {
        $education = Education::getAll();
    }
}

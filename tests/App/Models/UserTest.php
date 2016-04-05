<?php

namespace App\Models;

class UserTest extends \PHPUnit_Framework_TestCase
{

    public function testEducation()
    {
        User::getAll();

        var_dump(\PDO::getAvailableDrivers());
    }
}

<?php

namespace App\Models;

class UserTest extends \PHPUnit_Framework_TestCase
{

    public function testGetAll()
    {
        User::getAll();
    }
}

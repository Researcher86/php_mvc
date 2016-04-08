<?php

namespace App\Models;


class MaritalStatusTest extends AbstractBaseTest
{

    public function testGetById()
    {
        $maritalStatus = MaritalStatus::getById(1);

        $this->assertTrue($maritalStatus instanceof MaritalStatus);
    }

    public function testCreate()
    {
        $maritalStatus = new MaritalStatus();
        $maritalStatus->name = 'Холост';
        $maritalStatus->user_id = 3;
        $maritalStatus->save();

        $this->assertEquals($maritalStatus->name, MaritalStatus::getById($maritalStatus->id)->name);
    }


}

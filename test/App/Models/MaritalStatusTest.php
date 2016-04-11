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

        $store = MaritalStatus::getById($maritalStatus->id);
        $this->assertEquals($maritalStatus->name, $store->name);
        $this->assertEquals($maritalStatus->user_id, $store->user_id);
    }


}

<?php

namespace App\Models;


class PhoneTest extends AbstractBaseTest
{

    public function testGetById()
    {
        $phone = Phone::getById(1);

        $this->assertTrue($phone instanceof Phone);
    }

    public function testCreate()
    {
        $phone = new Phone();
        $phone->phone = '7011520885';
        $phone->user_id = 1;
        
        $phone->save();

        $store = Phone::getById($phone->id);
        $this->assertEquals($phone->phone, $store->phone);
        $this->assertEquals($phone->user_id, $store->user_id);
    }


}

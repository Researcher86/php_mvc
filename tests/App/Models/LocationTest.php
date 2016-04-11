<?php

namespace App\Models;


class LocationTest extends AbstractBaseTest
{

    public function testGetById()
    {
        $location = Location::getById(1);

        $this->assertTrue($location instanceof Location);
    }

    public function testCreate()
    {
        $location = new Location();
        $location->name = 'г. Костанай';
        $location->user_id = 1;
        
        $location->save();

        $store = Location::getById($location->id);
        $this->assertEquals($location->name, $store->name);
        $this->assertEquals($location->user_id, $store->user_id);
    }


}

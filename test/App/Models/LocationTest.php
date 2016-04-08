<?php

namespace App\Models;


class LocationTest extends BaseTest
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

        $this->assertEquals($location->name, Location::getById($location->id)->name);
    }


}

<?php

namespace App\Models;


class PhotoTest extends AbstractBaseTest
{

    public function testGetByUserId()
    {

    }

    public function testCreate()
    {
        $photo = new Photo();
        $photo->path = 'C:\OpenServer\domains\job.kz\public\userfiles\1.png';
        $photo->type = 'image/png';
        $photo->size = 20480;
        $photo->user_id = 1;

        $photo->save();

        $store = Photo::getById($photo->id);
        $this->assertEquals($photo->path, $store->path);
        $this->assertEquals($photo->type, $store->type);
        $this->assertEquals($photo->size, $store->size);
        $this->assertEquals($photo->user_id, $store->user_id);
    }


}

<?php

namespace App\Models;

class AboutTest extends AbstractBaseTest
{

    public function testCreate()
    {
        $about = new About();
        $about->about = 'Я простой программист';
        $about->user_id = 1;

        $about->save();

        $store = About::getById($about->id);
        $this->assertEquals($about->about, $store->about);
        $this->assertEquals($about->user_id, $store->user_id);
    }
}

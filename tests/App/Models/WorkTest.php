<?php

namespace App\Models;


class WorkTest extends AbstractBaseTest
{

    public function testCreate()
    {
        $work = new Work();
        $work->organization = 'КИнЭУ';
        $work->post = 'Инженер-программист';
        $work->jobStartMonth = 5;
        $work->jobStartYear = 2014;
        $work->jobStopMonth = 5;
        $work->jobStopYear = 2014;
        $work->forNow = true;
        $work->duties = 'Разработка ПО внутренней автоматизации предприятия, Java, PHP, MySQL.';
        $work->user_id = 1;

        $work->save();

        $store = Work::getById($work->id);
        $this->assertEquals($work->organization, $store->organization);
        $this->assertEquals($work->post, $store->post);
        $this->assertEquals($work->jobStartMonth, $store->jobStartMonth);
        $this->assertEquals($work->jobStartYear, $store->jobStartYear);
        $this->assertEquals($work->jobStopMonth, $store->jobStopMonth);
        $this->assertEquals($work->jobStopYear, $store->jobStopYear);
        $this->assertEquals($work->forNow, $store->forNow);
        $this->assertEquals($work->duties, $store->duties);
        $this->assertEquals($work->user_id, $store->user_id);
    }
}

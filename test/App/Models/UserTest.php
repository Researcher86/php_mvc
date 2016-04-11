<?php

namespace App\Models;

class UserTest extends AbstractBaseTest
{
    public function testGetAll()
    {
        $users = User::getAll();
        $this->assertEquals(3, count($users));
    }

    public function testGetById()
    {
        $user = User::getById(1);

        $this->assertTrue($user instanceof User);
    }

    public function testCreateRequiredField()
    {
        $user = new User();
        $user->firstName = 'Танат';
        $user->lastName = 'Альпенов';
        $user->patronymic = 'Маратович';
        $user->yearOfBirth = '1986-07-22';
        $user->sex = 1;
        $user->education = Education::getById(2);
        $user->email = 'researcher2286@gmail.com';
        $user->password = '123456';

        $user->save();

        $storeUser = User::getById($user->id);
        $this->assertEquals($user->email, $storeUser->email);
        $this->assertEquals(2, $storeUser->education->id);
    }
    public function testCreateNotRequiredField()
    {
        $about = new About();
        $about->about = 'Я простой программист';

        $location = new Location();
        $location->name = 'Костанай';

        $maritalStatus = new MaritalStatus();
        $maritalStatus->name = 'Женат';

        $phone = new Phone();
        $phone->phone = '7011520885';

        $photo = new Photo();
        $photo->path = 'C:\OpenServer\domains\job.kz\public\userfiles\1.png';
        $photo->type = 'image/png';
        $photo->size = 20480;

        $work = new Work();
        $work->organization = 'КИнЭУ';
        $work->post = 'Инженер-программист';
        $work->jobStartMonth = 5;
        $work->jobStartYear = 2014;
        $work->forNow = true;
        $work->duties = 'Разработка ПО внутренней автоматизации предприятия, Java, PHP, MySQL.';

        $user = new User();
        $user->firstName = 'Танат';
        $user->lastName = 'Альпенов';
        $user->patronymic = 'Маратович';
        $user->yearOfBirth = '1986-07-22';
        $user->sex = 1;
        $user->education = Education::getById(2);
        $user->email = 'researcher2286@gmail.com';
        $user->password = '123456';

        $user->about = $about;
        $user->location = $location;
        $user->maritalStatus = $maritalStatus;
        $user->phone = $phone;
        $user->photo = $photo;
        $user->work = $work;

        $user->save();

        $userStore = User::getById($user->id);
        $this->assertEquals($userStore->id, $userStore->about->user_id);
        $this->assertEquals($userStore->id, $userStore->location->user_id);        
        $this->assertEquals($userStore->id, $userStore->maritalStatus->user_id);
        $this->assertEquals($userStore->id, $userStore->phone->user_id);
        $this->assertEquals($userStore->id, $userStore->photo->user_id);
        $this->assertEquals($userStore->id, $userStore->work->user_id);
    }

    public function testGetByEmail()
    {
        $user = User::getByEmail('researcher86@mail.ru');
        $this->assertEquals(1, count($user));
    }

}

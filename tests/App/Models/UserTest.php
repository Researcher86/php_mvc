<?php

namespace App\Models;

class UserTest extends AbstractBaseTest
{
    public function testGetAll()
    {
        $users = User::getAll();
        $this->assertEquals(2, count($users));
    }

    public function testGetById()
    {
        $user = User::getById(1);

        $this->assertTrue($user instanceof User);
    }

    public function testGetByEmail()
    {
        $user = User::getByEmail('researcher86@mail.ru');
        $this->assertEquals(1, count($user));
    }


    public function testCreateRequiredField()
    {
        $user = new User();
        $user->firstName = 'Танат';
        $user->lastName = 'Альпенов';
        $user->patronymic = 'Маратович';
        $user->yearOfBirth = new \DateTime('1986-07-22');
        $user->sex = 1;
        $user->education = Education::getById(2);
        $user->email = 'researcher2286@gmail.com';
        $user->password = '123456';

        $user->save();

        $store = User::getById($user->id);
        $this->assertEquals($user->email, $store->email);
        $this->assertTrue(password_verify($user->password, $store->password));
        $this->assertEquals(2, $store->education->id);

        $this->assertEquals(null, $store->about);
        $this->assertEquals(null, $store->location);
        $this->assertEquals(null, $store->maritalStatus);
        $this->assertEquals(null, $store->phone);
        $this->assertEquals(null, $store->photo);
        $this->assertEquals(null, $store->work);
    }

    public function testAuthorization()
    {
        $this->assertTrue(User::authorization('researcher86@mail.ru', '123456'));
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
        $user->yearOfBirth = new \DateTime('1986-07-22');
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

    public function testMethodCreateRequiredField()
    {
        $data['about'] = 'Я простой программист';
        $data['locations'] = 'Костанай';
        $data['maritalStatus'] = 'Женат';
        $data['phone'] = '7011520885';

//        $data['photo']['name'] = '1.png';
//        $data['photo']['path'] = 'C:\OpenServer\domains\job.kz\public\userfiles\1.png';
//        $data['photo']['type'] = 'image/png';
//        $data['photo']['size'] = 20480;

        $data['organization'] = 'КИнЭУ';
        $data['post'] = 'Инженер-программист';
        $data['workMonth1'] = 5;
        $data['workYear1'] = 2014;        
        $data['workMonth2'] = 5;
        $data['workYear2'] = 2016;
        $data['forNow'] = true;
        $data['duties'] = 'Разработка ПО внутренней автоматизации предприятия, Java, PHP, MySQL.';
        

        $data['firstName'] = 'Танат';
        $data['lastName'] = 'Альпенов';
        $data['patronymic'] = 'Маратович';
        $data['yearOfBirth'] = new \DateTime('1986-07-22');
        $data["month"] = '07';
        $data["day"] = '22';
        $data["year"] = '1986';

        $data['sex'] = 1;
        $data['education'] = 2;
        $data['email'] = 'researcher2286@gmail.com';
        $data['pass1'] = '123456';
        $data['pass2'] = '123456';


        $user = User::create($data);
        $user->save();

        $userStore = User::getById($user->id);
        $this->assertEquals($userStore->id, $userStore->about->user_id);
        $this->assertEquals($userStore->id, $userStore->location->user_id);
        $this->assertEquals($userStore->id, $userStore->maritalStatus->user_id);
        $this->assertEquals($userStore->id, $userStore->phone->user_id);
//        $this->assertEquals($userStore->id, $userStore->photo->user_id);
        $this->assertEquals($userStore->id, $userStore->work->user_id);

    }

}

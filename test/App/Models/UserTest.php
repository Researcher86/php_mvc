<?php

namespace App\Models;

class UserTest extends BaseTest
{
    public function testGetAll()
    {
        $users = User::getAll();
        $this->assertEquals(2, count($users));
    }

    public function testCreate()
    {
        $user = new User();
        $user->firstName = 'Танат';
        $user->lastName = 'Альпенов';
        $user->patronymic = 'Маратович';
        $user->yearOfBirth = '1986-07-22';
        $user->sex = 1;
        $user->education_id = 2;
        $user->email = 'researcher2286@gmail.com';
        $user->password = '123456';

        $user->save();

        $storeUser = User::getById($user->id);
        $this->assertEquals($user->email, $storeUser->email);
    }

    public function testDelete()
    {
        $storeUser = User::getById(1);

        $storeUser->delete();

        $storeUser = User::getById(1);
        $this->assertNull($storeUser);
    }

    public function testDeleteAll()
    {
        User::deleteAll();

        $count = User::getCount();
        $this->assertEquals(0, $count);
    }

    public function testGetByEmail()
    {
        $user = User::getByEmail('researcher86@mail.ru');
        $this->assertEquals(1, count($user));
    }

}

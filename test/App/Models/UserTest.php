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
        $user->education_id = 2;
        $user->email = 'researcher2286@gmail.com';
        $user->password = '123456';

        $user->save();

        $storeUser = User::getById($user->id);
        $this->assertEquals($user->email, $storeUser->email);
    }

    public function testGetByEmail()
    {
        $user = User::getByEmail('researcher86@mail.ru');
        $this->assertEquals(1, count($user));
    }

}

<?php

namespace App\Validators;

use App\Models\Education;
use App\Models\User;
use Core\Validator\ValidateErrors;

class UserValidatorTest extends \PHPUnit_Framework_TestCase
{

    public function testValid()
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
        $user->pass1 = '123456';
        $user->pass2 = '123456';

        $errors = new ValidateErrors();
        $validator = new UserValidator($user, $errors);

        $validator->validate();

        $this->assertEquals(false, $errors->hasError());
    }

    public function testInvalid()
    {
        $user = new User();
        $errors = new ValidateErrors();
        $validator = new UserValidator($user, $errors);

        $validator->validate();

        $this->assertEquals(true, $errors->hasError());
        $this->assertEquals(6, count($errors->getErrors()));
    }

    public function testEmailExists()
    {
        $user = new User();
        $user->email = 'researcher86@mail.ru';


        $errors = new ValidateErrors();
        $validator = new UserValidator($user, $errors);

        $validator->validate();

        $this->assertEquals(true, $errors->hasError());
        $this->assertEquals(5, array_search('emailExists', $errors->getErrors()));
    }
}

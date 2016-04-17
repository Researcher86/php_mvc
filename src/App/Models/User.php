<?php

namespace App\Models;

use App\Validators\AboutValidator;
use App\Validators\LocationValidator;
use App\Validators\MaritalStatusValidator;
use App\Validators\PhoneValidator;
use App\Validators\PhotoValidator;
use App\Validators\UserValidator;
use App\Validators\WorkValidator;
use Core\AbstractModel;
use Core\Exceptions\ModelException;
use Core\Validator\ValidateErrors;

/**
 * Модель для манипулирования данными пользователей
 * @author Tanat
 */
class User extends AbstractModel
{
    public $lastName;
    public $firstName;
    public $patronymic;
    public $yearOfBirth;
    public $sex;
    public $email;
    public $password;
    protected $education_id;

    function __get($name)
    {
        switch ($name) {
            case 'about':
                return About::getByUserId($this->id);
            case 'education':
                return Education::getById($this->education_id);
            case 'location':
                return Location::getByUserId($this->id);
            case 'maritalStatus':
                return MaritalStatus::getByUserId($this->id);
            case 'phone':
                return Phone::getByUserId($this->id);
            case 'photo':
                return Photo::getByUserId($this->id);
            case 'work':
                return Work::getByUserId($this->id);
        }
    }

    function __set($name, $value)
    {
        $this->$name = $value;
    }

    function __isset($name)
    {
        return isset($this->$name);
    }

    public static function getByEmail($email)
    {
        return self::getBy('email', $email)[0];
    }

    public static function authorization($email, $password): bool
    {
        $result = self::getDb()->nativeQuery('SELECT email, password FROM user WHERE email = ?', [$email])[0];
        return !strcmp($email, $result['email']) && password_verify($password, $result['password']);
    }

    public static function getHash($param)
    {
        return password_hash($param, PASSWORD_BCRYPT);
    }

    public function checkEmail($email)
    {
        $user = self::getByEmail($email);
        return $user->email == $email;
    }

    public function save()
    {
//        if ($this->checkEmail($this->email)) {
//            throw new ModelException('emailExists');
//        }

        self::getDb()->beginTransaction();

        self::getDb()->execute('INSERT INTO ' . self::getTableName() .
            '(lastName, firstName, patronymic, yearOfBirth, sex, email, password, education_id) VALUES(?,?,?,?,?,?,?,?)', [
            $this->lastName,
            $this->firstName,
            $this->patronymic,
            $this->yearOfBirth,
            $this->sex,
            $this->email,
            password_hash($this->password, PASSWORD_BCRYPT),
            $this->education_id ?? $this->education->id
        ]);
        $this->id = self::getDb()->lastInsertId();
        $this->saveNotRequiredFields($this->id);

        self::getDb()->commitTransaction();
    }

    private function saveNotRequiredFields(int $userId)
    {
        foreach ($this as $field) {
            if ($field instanceof AbstractModel && !$field instanceof Education) {
                $field->user_id = $userId;
                $field->save();
            }
        }
    }

    public static function create($data)
    {
        $user = new User();
        $user->lastName = trim($data['lastName']);
        $user->firstName = trim($data['firstName']);
        $user->patronymic = trim($data['patronymic']);
        $user->yearOfBirth = $data['year'] . '-' . $data['month'] . '-' . $data['day'];

        $user->location = Location::create($data['locations']);
        $user->sex = (int)$data['sex'];

        $user->maritalStatus = MaritalStatus::create($data['maritalStatus']);
        $user->education_id = $data['education'];
        $user->about = About::create($data['about']);
        $user->photo = Photo::create($data['photo']);
        $user->work = Work::create($data);

        $user->email = $data['email'];
        $user->password = $data['pass1'];
        $user->pass1 = $data['pass1'];
        $user->pass2 = $data['pass2'];

        $user->phone = Phone::create($data['phone']);

        return $user;
    }

    public function validate(ValidateErrors $errors)
    {
        (new UserValidator($this, $errors))->validate();

        if (isset($this->work)) {
            (new WorkValidator($this->work, $errors))->validate();
        }

        if (isset($this->location)) {
            (new LocationValidator($this->location, $errors))->validate();
        }

        if (isset($this->maritalStatus)) {
            (new MaritalStatusValidator($this->maritalStatus, $errors))->validate();
        }

        if (isset($this->about)) {
            (new AboutValidator($this->about, $errors))->validate();
        }

        if (isset($this->photo)) {
            (new PhotoValidator($this->photo, $errors))->validate();
        }

        if (isset($this->phone)) {
            (new PhoneValidator($this->phone, $errors))->validate();
        }

        return count($errors->getErrors()) == 0;
    }

}

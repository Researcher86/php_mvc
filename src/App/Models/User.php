<?php

namespace App\Models;

use Core\AbstractModel;
use Core\Exceptions\ModelException;

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

    public function save()
    {
        $user = self::getByEmail($this->email);
        if ($user->email == $this->email) {
            throw new ModelException('emailExists');
        }

        self::getDb()->beginTransaction();

        self::getDb()->execute('INSERT INTO ' . self::getTableName() .
            '(lastName, firstName, patronymic, yearOfBirth, sex, email, password, education_id) VALUES(?,?,?,?,?,?,?,?)', [
            $this->lastName,
            $this->firstName,
            $this->patronymic,
            $this->yearOfBirth->format('Y-m-d'),
            $this->sex,
            $this->email,
            password_hash($this->password, PASSWORD_BCRYPT),
            $this->education->id
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
        if (empty($user->lastName)) {
            throw new ModelException('lastNameEmpty');
        }

        $user->firstName = trim($data['firstName']);
        if (empty($user->firstName)) {
            throw new ModelException('firstNameEmpty');
        }

        $user->patronymic = trim($data['patronymic']);
        if (empty($user->patronymic)) {
            throw new ModelException('patronymicEmpty');
        }

        $user->education = Education::getById($data['education']);

        if (!checkdate($data['month'], $data['day'], $data['year'])) {
            throw new ModelException('incorrectDate');
        }
        $user->yearOfBirth = new \DateTime( $data['year'] . '-' . $data['month'] . '-' . $data['day']);
        $user->sex = $data['sex'];

        if (!empty(trim($data['locations']))) {
            $user->location = new Location();
            $user->location->name = trim($data['locations']);
        }

        if (!empty(trim($data['maritalStatus']))) {
            $user->maritalStatus = new MaritalStatus();
            $user->maritalStatus->name = trim($data['maritalStatus']);
        }

        if (!empty(trim($data['about']))) {
            $user->about = new About();
            $user->about->about = trim($data['about']);
        }

        if ($data['photo']['error'] === 0) {
            $user->photo = Photo::create($data['photo']);
        }

        $user->work = new Work();
        $user->work->organization = $data['organization'];
        $user->work->post = $data['post'];
        $user->work->jobStartMonth = $data['workMonth1'];
        $user->work->jobStartYear = $data['workYear1'];
        $user->work->forNow = $data['forNow'] == 'on';
        $user->work->jobStopMonth = $data['workMonth2'];
        $user->work->jobStopYear = $data['workYear2'];
        $user->work->duties = $data['duties'];


        $user->email = $data['email'];
        if (!filter_var($user->email, FILTER_VALIDATE_EMAIL)) {
            throw new ModelException('incorrectEmail'); // 'Некорректный e-mail адрес'
        }

        if ($data['pass1'] != $data['pass2']) {
            throw new ModelException('pass1NotPass2'); // 'Пароли не совпадают. Пожалуйста, проверьте.'
        }

        $user->password = $data['pass1'];

        $user->phone = new Phone();
        $user->phone->phone = $data['phone'];

        return $user;
    }

}

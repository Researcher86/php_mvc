<?php

namespace App\Models;

use Core\AbstractModel;
use Core\Exceptions\DbException;
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

    /**
     * @param $email
     * @return User
     * @throws \Core\Exceptions\DbException
     */
    public static function getByEmail($email)
    {
        return self::getBy('email', $email)[0];
    }

    public static function authorization($email, $password): bool
    {
        $result = self::getDb()->nativeQuery('SELECT email, password FROM user WHERE email = ?', [$email])[0];
        return !strcmp($email, $result['email']) && password_verify($password, $result['password']);
    }

    public function save()
    {
        if (!isset($this->education)) {
            throw new ModelException('Education is null');
        }

        self::getDb()->beginTransaction();

        try {
            self::getDb()->execute('INSERT INTO ' . self::getTableName() .
                '(lastName, firstName, patronymic, yearOfBirth, sex, email, password, education_id) VALUES(?,?,?,?,?,?,?,?)', [
                $this->lastName,
                $this->firstName,
                $this->patronymic,
                $this->yearOfBirth,
                $this->sex,
                $this->email,
                password_hash($this->password, PASSWORD_BCRYPT),
                $this->education->id
            ]);

            $this->id = self::getDb()->lastInsertId();
            $this->saveNotRequiredFields($this->id);

            self::getDb()->commitTransaction();
        } catch (DbException $e) {
            self::getDb()->rollbackTransaction();
            throw new ModelException('An error occurred while saving user data', $e);
        }

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

}

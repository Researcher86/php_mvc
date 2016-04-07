<?php

namespace App\Models;

use Core\AbstractModel;

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
    public $education_id;

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
        return self::getDb()->query('SELECT * FROM ' . self::getTableName() . ' WHERE email=?', [$email], self::getClassName())[0];
    }

    public function save()
    {
        self::getDb()->execute('INSERT INTO ' . self::getTableName() .
            '(lastName, firstName, patronymic, yearOfBirth, sex, email, password, education_id) VALUES(?,?,?,?,?,?,?,?)', [
            $this->lastName,
            $this->firstName,
            $this->patronymic,
            $this->yearOfBirth,
            $this->sex,
            $this->email,
            $this->password,
            $this->education_id
        ]);
        $this->id = self::getDb()->lastInsertId();
    }

//    /**
//     * Метод возвращает полную информацию о пользователе
//     * @param int $userId - id пользователя
//     * @return array
//     */
//    public static function getUserInfo(int $userId)
//    {
//        $result = $this->dbConnect->select('CALL getUserInfo(?)', array($userId));
//        return isset($result) ? $result[0] : NULL;
//        return self::getConn()->query('CALL getUserInfo(?)', [$userId], self::getClass());
//    }

//    /**
//     * Метод добавляет информацию о пользователе в базу данных
//     * @param UserData $userData - Пользовательские данные
//     * @throws ExceptionModel
//     */
//    public function add(UserData $userData)
//    {
//        if ($this->getByEmail($userData->email) != NULL) {
//            throw new ExceptionModel(Lang::getInstance()->get('emailExists')); // 'Данный E-mail (логин) уже занят'
//        }
//
//        $this->dbConnect->beginTransaction();
//        try {
//            $this->dbConnect->insert("INSERT INTO users
//                (lastName,
//                 firstName,
//                 patronymic,
//                 yearOfBirth,
//                 sex,
//                 educations_id,
//                 email,
//                 password)
//                VALUES(?, ?, ?, DATE_FORMAT(STR_TO_DATE(?,'%d.%m.%Y'),'%Y-%m-%d'), ?, ?, ?, ?)", array(
//                $userData->lastName,
//                $userData->firstName,
//                $userData->patronymic,
//                $userData->day . '.' . $userData->month . '.' . $userData->year,
//                $userData->sex,
//                $userData->education,
//                $userData->email,
//                md5($userData->pass1),
//            ));
//
//            $userId = $this->dbConnect->lastInsertId();
//            $this->saveOptionalData($userId, $userData);
//
//            $this->dbConnect->commitTransaction();
//            return $userId;
//        } catch (ExceptionModel $exc) {
//            $this->dbConnect->rollBackTransaction();
//            throw new ExceptionModel(Lang::getInstance()->get('userAddError') . '<br />' . $exc->getMessage()); // 'Ошибка добавления нового пользователя.  '
//        } catch (Exception $exc) {
//            $this->dbConnect->rollBackTransaction();
//            throw new ExceptionModel(Lang::getInstance()->get('unknownAddUserError')); // 'Произошла непредвиденная ошибка, попробуйте повторить действие позже!'
//        }
//    }
//
//    /**
//     * Проверяем есть ли такой E-mail (логин) в базе
//     * @param string $email - E-mail пользователя
//     * @return array
//     */
//    public function getByEmail($email)
//    {
//        $result = $this->dbConnect->select("SELECT * FROM users WHERE email = ?", array($email));
//        return empty($result) ? NULL : $result[0];
//    }
//
//    /**
//     * Сохраняем не обязательные поля
//     * @param int $userId - id пользователя
//     */
//    private function saveOptionalData($userId, UserData $userData)
//    {
//        $locations = new M_Locations();
//        $abouts = new M_Abouts();
//        $maritalStatus = new M_MaritalStatus();
//        $photos = new M_Photos();
//        $works = new Work();
//        $phones = new M_Phones();
//
//        if (!empty($userData->maritalStatus))
//            $maritalStatus->addRecord($userId, $userData->maritalStatus);
//
//        if (!empty($userData->locations))
//            $locations->addRecord($userId, $userData->locations);
//
//        if (!empty($userData->about))
//            $abouts->addRecord($userId, $userData->about);
//
//        if (!empty($userData->photo['name']))
//            $photos->savePhoto($userId, $userData->photo);
//
//        if (!empty($userData->organization))
//            $works->addRecord($userId, $userData);
//
//        if (!empty($userData->phone))
//            $phones->addRecord($userId, $userData->phone);
//    }
//
//    /**
//     * Метод удаляет пользователя из базы данных
//     * @param int $id - id пользователя
//     * @throws ExceptionModel
//     */
//    public function delete($id)
//    {
//        try {
//            $this->dbConnect->delete("DELETE FROM users WHERE id = ?", $id);
//        } catch (Exception $exc) {
//            throw new ExceptionModel(Lang::getInstance()->get('deleteUserError')); // 'Ошибка при удалении пользователя.'
//        }
//    }

}

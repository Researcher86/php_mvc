<?php

namespace App\Models;

/**
 * Модель управляет данными "Место проживания"
 * @author Tanat
 */
class Location extends AbstractBase
{
    public $name;

    public function save()
    {
        self::getDb()->execute('INSERT INTO ' . self::getTableName() . '(name, user_id) VALUES(?, ?)', [
            $this->name,
            $this->user_id
        ]);

        $this->id = self::getDb()->lastInsertId();
    }

//    /**
//     * Метод сохраняет информацию
//     * @param int $userId - id пользователя
//     * @param string $name - "Место проживания"
//     * @throws ExceptionModel
//     */
//    public function addRecord($userId, $name)
//    {
//        try {
//            $this->dbConnect->insert("INSERT INTO locations (users_id, name) VALUES(?, ?)", array($userId, $name));
//        } catch (Exception $exc) {
//            throw new ExceptionModel(Lang::getInstance()->get('locationSaveError')); // 'Произошла ошибка при сохранении информации "Место проживания"'
//        }
//    }

}

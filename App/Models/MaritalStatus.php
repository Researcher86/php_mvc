<?php

namespace App\Models;

/**
 * Модель управляет данными "Семейное положение"
 * @author Tanat
 */
class MaritalStatus extends AbstractBase
{
    public $name;

//    /**
//     * Метод сохраняет информацию
//     * @param int $userId - id пользователя
//     * @param string $name - "Семейное положение"
//     * @throws ExceptionModel
//     */
//    public function addRecord($userId, $name)
//    {
//        try {
//            $this->dbConnect->insert("INSERT INTO maritalStatus (users_id, name) VALUES(?, ?)", array($userId, $name));
//        } catch (Exception $exc) {
//            throw new ExceptionModel(Lang::getInstance()->get('maritalStatusSaveError')); // 'Произошла ошибка при сохранении информации "Семейное положение"'
//        }
//    }

}

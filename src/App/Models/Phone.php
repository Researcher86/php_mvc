<?php

namespace App\Models;

/**
 * Модель управляет телефонами пользователей
 * @author Tanat
 */
class Phone extends AbstractBase
{
    public $phone;

    public function save()
    {
        self::getDb()->execute('INSERT INTO ' . self::getTableName() . ' (phone, user_id) VALUES(?,?)', [
            $this->phone,
            $this->user_id
        ]);

        $this->id = self::getDb()->getPdo()->lastInsertId();
    }

//    /**
//     * Сохраняем информацию
//     * @param int $userId - id пользователя
//     * @param string $contact - контакты
//     * @throws ExceptionModel
//     */
//    public function addRecord($userId, $contact)
//    {
//        try {
//            $this->dbConnect->insert("INSERT INTO phones (users_id, phone) VALUES(?, ?)", array($userId, $contact));
//        } catch (Exception $exc) {
//            throw new ExceptionModel(Lang::getInstance()->get('phonesSaveError')); // 'Произошла ошибка при сохранении информации "Контакты"'
//        }
//    }

}

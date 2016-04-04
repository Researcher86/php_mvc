<?php

namespace App\Models;

/**
 * Модель управляет данными пользователей "Обо мне"
 * @author Tanat
 */
class About extends AbstractBase
{
    public $about;

//    /**
//     * Сохраняем информацию
//     * @param int $userId - id пользователя
//     * @param string $text - "Обо мне"
//     * @throws ExceptionModel
//     */
//    public function addRecord($userId, $text)
//    {
//        try {
//            $this->dbConnect->insert("INSERT INTO abouts (users_id, about) VALUES(?, ?)", array($userId, $text));
//        } catch (Exception $exc) {
//            throw new ExceptionModel(Lang::getInstance()->get('aboutSaveError')); // 'Произошла ошибка при сохранении информации "Обо мне"'
//        }
//    }

}

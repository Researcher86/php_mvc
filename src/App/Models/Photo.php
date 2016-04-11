<?php

namespace App\Models;

/**
 * Модель управляет фотографиями пользователей
 * @author Tanat
 */
class Photo extends AbstractBase
{
    public $path;
    public $type;
    public $size;

    public function save()
    {
        $result = self::getDb()->execute('INSERT INTO ' . self::getTableName() . ' (path, type, size, user_id) VALUES(?,?,?,?)',
            [$this->path, $this->type, $this->size, $this->user_id]);
        $this->id = self::getDb()->lastInsertId();
        return $result;
    }

//    /**
//     * Сохраняем файл в пользовательскую папку, и записываем информацию в базу
//     * @param int $userId - id пользователя
//     * @param array $file - Информация о загруженном файле
//     * @throws ExceptionModel
//     */
//    public function savePhoto($userId, $file)
//    {
//        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
//
//        if (!in_array($ext, ['gif', 'png', 'jpg']))
//            throw new ExceptionModel(Lang::getInstance()->get('photoErrorHint')); // 'Выберите файл изображения (*.gif, *.jpg, *.png)'
//
//        $patch = USER_FILES_DIR . $userId . '.' . $ext;
//        if (!move_uploaded_file($file['tmp_name'], $patch)) {
//            throw new ExceptionModel(Lang::getInstance()->get('imageSaveError')); // 'Произошла ошибка при сохранении изображения'
//        }
//        $this->addRecord($userId, $patch, $file['type'], $file['size']);
//    }
//
//    /**
//     * Метод сохраняет информацию
//     * @param int $userId - id пользователя
//     * @param string $patch - путь
//     * @param string $type - тип
//     * @param int $size - размер
//     * @throws ExceptionModel
//     */
//    public function addRecord($userId, $patch, $type, $size)
//    {
//        try {
//            $this->dbConnect->insert("INSERT INTO photos (users_id, patch, type, size) VALUES(?, ?, ?, ?)", array($userId, $patch, $type, $size));
//        } catch (Exception $exc) {
//            throw new ExceptionModel(Lang::getInstance()->get('imageInfoSaveError')); // 'Произошла ошибка при добавлении информации "фотографии"'
//        }
//    }

}

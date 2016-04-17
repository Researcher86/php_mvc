<?php

namespace App\Models;
use Core\Config;
use Core\Exceptions\ModelException;

/**
 * Модель управляет фотографиями пользователей
 * @author Tanat
 */
class Photo extends AbstractBase
{
    public $path;
    public $type;
    public $size;

    public static function create($file)
    {
        if ($file['error'] !== 0) {
            return null;
        }

        $userFilesDir = Config::getSettings('user_files_dir') . date('Y') . '/';
        $patch = __DIR__ . '/../../../public/' . $userFilesDir;

        if (!file_exists($patch)) {
            mkdir($patch);
        }

        while (true) {
            $filename = uniqid('MyApp', true) . '.' . strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            if (!file_exists($patch . $filename)) break;
        }

        if (!move_uploaded_file($file['tmp_name'], $patch . $filename)) {
            throw new ModelException('imageSaveError'); // 'Произошла ошибка при сохранении изображения'
        }

        $photo = new Photo();
        $photo->path = $userFilesDir . $filename;
        $photo->type = $file['type'];
        $photo->size = $file['size'];

        return $photo;
    }

    public function save()
    {
        $result = self::getDb()->execute('INSERT INTO ' . self::getTableName() . ' (path, type, size, user_id) VALUES(?,?,?,?)',
            [$this->path, $this->type, $this->size, $this->user_id]);
        $this->id = self::getDb()->lastInsertId();
        return $result;
    }
}

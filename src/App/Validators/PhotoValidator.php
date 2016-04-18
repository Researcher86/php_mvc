<?php

namespace App\Validators;

use App\Models\Photo;
use Core\Validator\AbstractValidator;
use Core\Validator\ValidateErrors;

/**
 * Валидатор для информации фото пользователя
 * Class PhotoValidator
 * @package App\Validators
 */
class PhotoValidator extends AbstractValidator
{
    private $photo;

    public function __construct(Photo $photo, ValidateErrors $errors)
    {
        parent::__construct($errors);
        $this->photo = $photo;
    }


    public function validate()
    {
        $ext = strtolower(pathinfo($this->photo->path, PATHINFO_EXTENSION));

        if (!in_array($ext, ['gif', 'png', 'jpg'])) {
            $this->handleError('photoErrorHint'); // 'Выберите файл изображения (*.gif, *.jpg, *.png)'
        }
 
    }
}
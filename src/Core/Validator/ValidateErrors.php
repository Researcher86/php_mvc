<?php

namespace Core\Validator;

/**
 * Класс для хранения ошибок валидации
 * Class ValidateErrors
 * @package Core\Validator
 */
class ValidateErrors
{
    private $errors = [];

    public function add($error)
    {
        $this->errors[] = $error;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }
}
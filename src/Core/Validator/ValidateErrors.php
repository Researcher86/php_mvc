<?php

namespace Core\Validator;


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
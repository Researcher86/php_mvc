<?php

namespace Core\Validator;

/**
 * Базовый класс для валидаторов
 * Class AbstractValidator
 * @package Core\Validator
 */
abstract class AbstractValidator
{
    private $errors;

    /**
     * AbstractValidator constructor.
     * @param ValidateErrors $errors
     */
    public function __construct(ValidateErrors $errors)
    {
        $this->errors = $errors;
    }


    protected function handleError($error)
    {
        $this->errors->add($error);
    }

    abstract public function validate();
}
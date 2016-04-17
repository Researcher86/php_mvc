<?php

namespace Core\Validator;


abstract class AbstractValidator
{
    private $errors;

    /**
     * AbstractValidator constructor.
     * @param array $errors
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
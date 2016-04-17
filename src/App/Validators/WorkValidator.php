<?php

namespace App\Validators;

use App\Models\Work;
use Core\Validator\AbstractValidator;
use Core\Validator\ValidateErrors;

class WorkValidator extends AbstractValidator
{

    private $work;

    public function __construct(Work $work, ValidateErrors $errors)
    {
        parent::__construct($errors);
        $this->work = $work;
    }


    public function validate()
    {

    }
}
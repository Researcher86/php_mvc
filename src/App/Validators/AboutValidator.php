<?php

namespace App\Validators;

use App\Models\About;
use Core\Validator\AbstractValidator;
use Core\Validator\ValidateErrors;

/**
 * Валидатор информации о себе
 * Class AboutValidator
 * @package App\Validators
 */
class AboutValidator extends AbstractValidator
{

    private $about;

    public function __construct(About $about, ValidateErrors $errors)
    {
        parent::__construct($errors);
        $this->about = $about;
    }


    public function validate()
    {

    }
}
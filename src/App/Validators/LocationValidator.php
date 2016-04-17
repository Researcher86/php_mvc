<?php

namespace App\Validators;

use App\Models\Location;
use Core\Validator\AbstractValidator;
use Core\Validator\ValidateErrors;

class LocationValidator extends AbstractValidator
{

    private $location;

    public function __construct(Location $location, ValidateErrors $errors)
    {
        parent::__construct($errors);
        $this->location = $location;
    }


    public function validate()
    {

    }
}
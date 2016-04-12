<?php

namespace Core\Exceptions;


use Exception;

class AppException extends \RuntimeException
{
    public function __construct($message, Exception $previous = null, $code = 500) {
        parent::__construct($message,$code,$previous);
    }

}
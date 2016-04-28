<?php

namespace Core\Exceptions;
use Exception;

/**
 * Ошибка БД
 * @author Tanat
 */
class DbException extends AppException
{
    public function __construct(Exception $previous, $msg = 'Db error')
    {
        parent::__construct($msg, $previous);
    }

}

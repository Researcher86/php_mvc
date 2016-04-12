<?php

namespace Core\Exceptions;
use Exception;

/**
 * Ошибка БД
 * @author Tanat
 */
class DbException extends AppException
{
    public function __construct(Exception $previous)
    {
        parent::__construct('Db error', $previous);
    }

}

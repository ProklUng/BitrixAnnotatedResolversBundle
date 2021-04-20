<?php

namespace Prokl\BitrixAnnotatedResolversBundle\Exceptions;

use Exception;

/**
 * Class BaseException
 * Базовые исключения.
 * @package Prokl\BitrixAnnotatedResolversBundle\Exceptions
 * @codeCoverageIgnore
 */
class BaseException extends Exception implements ExceptionInterface
{
    /**
     * Ошибку в строку.
     *
     * @return string
     */
    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}

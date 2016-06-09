<?php

/**
 * Created by IntelliJ IDEA.
 * User: Ivan Kalita
 * Date: 09.06.16
 * Time: 12:22.
 */
namespace MayakRed\ECheepIntegration\Exception;

class NotAnAPIResponseException extends \RuntimeException
{
    public function __construct()
    {
        parent::__construct('Can\'t decode API response', 0);
    }
}

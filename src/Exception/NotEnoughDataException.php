<?php

/**
 * Created by IntelliJ IDEA.
 * User: Ivan Kalita
 * Date: 09.06.16
 * Time: 13:18.
 */

namespace MayakRed\ECheepIntegration\Exception;

class NotEnoughDataException extends \RuntimeException
{
    public function __construct($message)
    {
        parent::__construct($message, 0);
    }
}

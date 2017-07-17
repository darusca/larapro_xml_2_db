<?php

namespace Eon\Dario;

class InvalidXmlException extends \Exception
{
    public function __construct($message = null)
    {
        $message = $message ?: 'Invalid XML configuration';
        parent::__construct($message);
    }
}

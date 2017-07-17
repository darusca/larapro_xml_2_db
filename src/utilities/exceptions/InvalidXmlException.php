<?php

namespace Eon\Dario;

class InvalidXmlException extends \Exception
{
    public function __construct($message = 'Invalid XML configuration')
    {
        parent::__construct($message);
    }
}

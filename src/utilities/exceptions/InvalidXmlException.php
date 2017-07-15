<?php

namespace Eon\Dario;

class InvalidXmlException extends \Exception
{
    public function __construct($message = 'XML validation failed')
    {
        parent::__construct($message);
    }
}

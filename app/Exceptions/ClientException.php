<?php

namespace App\Exceptions;

use Exception;

class ClientException extends Exception
{
    private $_options;
    private $_next;

    public function __construct(
        $message,
        $code = 400,
        Exception $previous = null,
        $options = array('params'),
        $next = null
    ) {
        parent::__construct($message, $code, $previous);

        $this->_options = $options;
        $this->_next = $next;
    }

    public function getOptions()
    {
        return $this->_options;
    }

    public function getNext()
    {
        return $this->_next;
    }
}

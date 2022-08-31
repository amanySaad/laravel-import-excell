<?php

/**
 *this class responsible for set response for request
 * and return this response
 */

namespace App\Responders;

abstract class Responder
{
    protected $response;

    abstract public function respond();

    public function setResponse($response):Responder
    {
        $this->response = $response;
        return $this;
    }

    public function getResponse()
    {
        return $this->response;
    }

}

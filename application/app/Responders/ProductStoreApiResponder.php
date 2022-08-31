<?php
namespace App\Responders;

use App\Collections\ImportCollection;
use App\Enum\HttpStatus;


class ProductStoreApiResponder extends Responder
{
    public function respond()
    {
        return new ImportCollection($this->getResponse(),HttpStatus::HTTP_OK->value);
    }
}

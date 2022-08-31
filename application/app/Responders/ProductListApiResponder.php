<?php
namespace App\Responders;

use App\Collections\ProductCollection;
use App\Enum\HttpStatus;


class ProductListApiResponder extends Responder
{
    public function respond()
    {
        return new ProductCollection($this->getResponse(),HttpStatus::HTTP_OK->value);
    }
}

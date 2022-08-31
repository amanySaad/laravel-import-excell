<?php

namespace App\Collections;

use App\Resources\ProductResource;

class ProductCollection extends BasicCollection
{

    public function __construct($collection, $status)
    {

        parent::__construct(ProductResource::collection($collection), $status);
    }

    public function toArray($request)
    {
        return parent::toArray($request);
    }

}

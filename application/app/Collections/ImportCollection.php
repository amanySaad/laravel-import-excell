<?php

namespace App\Collections;


class ImportCollection extends BasicCollection
{

    public function __construct($request, $status)
    {

        parent::__construct($request, $status);
    }

    public function toArray($request)
    {
        return parent::toArray($request);
    }

}

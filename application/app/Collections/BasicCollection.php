<?php

namespace App\Collections;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BasicCollection extends ResourceCollection
{

    private $Collection;
    private $Status;

    public function __construct($Collection, $Status)
    {
        $this->Collection = $Collection;
        $this->Status = $Status;
    }

    public function getHeader(){
        return [
            'status'=> $this->Status,
            'DateTime'=>time(),
            'DateTimeZone'=>new \DateTime(),
        ];
    }

    public function toArray($request)
    {
        return [
            'response' => $this->getHeader(),
            'data'     => $this->Collection,
            'meta'     => [
                'DateTime'     => time(),
                'DateTimeZone' => new \DateTime(),
            ],
        ];
    }
}

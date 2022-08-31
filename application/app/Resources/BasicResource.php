<?php

namespace App\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BasicResource extends JsonResource
{

    private $Resource;
    private $Status;

    public function __construct($Resource, $Status)
    {
        $this->Resource = $Resource;
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
            'data'     => $this->Resource,
            'meta'     => [
                'DateTime'     => time(),
                'DateTimeZone' => new \DateTime(),
            ],
        ];
    }
}

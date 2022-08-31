<?php

namespace App\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'name' => $this->name,
            'part_number'=> $this->part_number,
            'article_group_id' => $this->article_group_id,
            'prize' => $this->prize,
        ];
    }
}

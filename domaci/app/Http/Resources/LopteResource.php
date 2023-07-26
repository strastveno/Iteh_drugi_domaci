<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LopteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */


     public static $wrap='lopte';
    public function toArray($request)
    {
        // return parent::toArray($request);

        return[
            'id'=>$this->resource->id,
            'name'=>$this->resource->name,
            'description'=>$this->resource->description,
            'price'=>$this->resource->price,
            'type'=>new TypeResource($this->resource->type),
            'user'=>new UserResource($this->resource->user)

        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NavIndexResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'path' => $this->path,
            'title' => $this->title,
            'breadcrumb' => $this->breadcrumb,
            'image' => $this->image,
            'degree' => $this->degree,
            'color_1' => $this->color_1,
            'color_2' => $this->color_2,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

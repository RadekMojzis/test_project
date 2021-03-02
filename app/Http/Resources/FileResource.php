<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\File;

class FileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $categories = $this->categories()->get();
        return [
            'name' => $this->name,
            'size' => $this->size,
            'link' => $this->link,
            'categories' => $categories,
            'created' => $this->CREATED_AT, 
            'updated' => $this->updated_at
        ];
    }
}

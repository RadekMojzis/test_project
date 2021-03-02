<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Category;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $files = $this->files()->get();
        return [
            'name' => $this->name,
            'files' => $files,
            'no_files' => $files->count(),
            'extensions' => $this->extensions()->get()
        ];
    }
}

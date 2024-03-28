<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Category;

class ApiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'api' => $this->api,
            'description' => $this->description,
            'link' => $this->link,
            'category' => [
                'id' => $this->category->id,
                'category' => $this->category->category,
            ]
        ];
    }
}

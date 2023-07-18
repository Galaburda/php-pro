<?php

namespace App\Http\Resources;

use App\Repositories\Categories\Iterators\CategoryIterators;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var CategoryIterators $resource */
        $resource = $this->resource;

        return [
            'id' => $resource->getId(),
            'name' => $resource->getName(),
        ];
    }
}

<?php

namespace App\Http\Resources;

use App\Repositories\Authors\Iterators\AuthorIterator;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        /** @var AuthorIterator $resource */
        $resource = $this->resource;
        return [
            'name' => $resource->getName(),
        ];
    }
}

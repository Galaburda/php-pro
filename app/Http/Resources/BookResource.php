<?php

namespace App\Http\Resources;


use App\Repositories\Authors\Iterators\AuthorsWithoutBooksIterator;
use App\Repositories\Books\Iterators\BookIterator;
use App\Repositories\Categories\Iterators\CategoryIterators;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    public $collections = CategoryIterators::class;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var BookIterator $resource */
        $resource = $this->resource;
        return [
            'id' => $resource->getId(),
            'name' => $resource->getName(),
            'year' => $resource->getYear(),
            'lang' => $resource->getLang(),
            'pages' => $resource->getPages(),
            'category' => new CategoryResource($resource->getCategory()),
            'authors' => new AuthorResource($resource->getAuthors()),
            'created_at' => $resource->getCreatedAt(),
        ];
    }
}

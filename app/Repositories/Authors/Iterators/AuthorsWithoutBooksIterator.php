<?php

namespace App\Repositories\Authors\Iterators;

use ArrayIterator;
use Illuminate\Support\Collection;
use IteratorAggregate;
use Traversable;

class AuthorsWithoutBooksIterator implements IteratorAggregate
{
    protected array $data = [];

    public function __construct(Collection $collection)
    {
        $this->data[] = $collection;
    }


    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->data);
    }
}

<?php

namespace App\Services\Books;

use App\Repositories\Books\BookIndexDTO;
use App\Repositories\Books\BooksRepository;
use App\Repositories\Books\Iterators\BooksIterator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;


class CacheService
{
    public function __construct(
        protected BooksRepository $booksRepository,
        protected AllBooksStorage $allBooksStorage,
    ) {
    }

    public function selectToFilterIterator(BookIndexDTO $data)
    {
        $hasData = $this->allBooksStorage->has($data->getLastId());

        if ($hasData === true) {
            return $this->allBooksStorage->get($data->getLastId());
        }

        $data = $this->booksRepository->selectToFilterIterator(
            $data->getLastId()
        );
        $this->allBooksStorage->set($data->getLastId(), $data);

        return $data;
    }
}

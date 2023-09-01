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
    ) {
    }

    public function selectToFilterIterator(BookIndexDTO $data): BooksRepository
    {
        $seconds = 120;
        return Cache::remember(
            'books_' . $data->getLastId(),
            $seconds,
            function () use ($data) {
                return $this->booksRepository->selectToFilterIterator($data);
            }
        );
    }
}

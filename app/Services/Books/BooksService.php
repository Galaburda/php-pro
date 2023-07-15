<?php

namespace App\Services\Books;

use App\Http\Resources\BookResource;
use App\Repositories\Books\BookIndexDTO;
use App\Repositories\Books\BooksRepository;
use App\Repositories\Books\BooksStoreDTO;
use App\Repositories\Books\BookUpdateDTO;
use App\Repositories\Books\Iterators\BookIterator;

class BooksService
{
    public function __construct(
        protected BooksRepository $booksRepository

    ) {
    }

    public function store(BooksStoreDTO $data): BookIterator
    {
        $bookId = $this->booksRepository->store($data);
        return $this->booksRepository->getById($bookId);
    }

    public function getById($bookId): BookIterator
    {
        return $this->booksRepository->getById($bookId);
    }

    public function update(BookUpdateDTO $data): BookIterator
    {
        $this->booksRepository->update($data);
        return $this->getById($data->getId());
    }

    public function delete($bookId): void
    {
        $this->booksRepository->delete($bookId);
    }

    public function collection(BookIndexDTO $data)
    {
        return $this->booksRepository->selectToFilter($data);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\BookIndexRequest;
use App\Http\Requests\Book\BookRequest;
use App\Http\Requests\Book\BookStoreRequest;
use App\Http\Requests\Book\BookUpdateRequest;
use App\Http\Resources\BookResource;
use App\Repositories\Books\BookIndexDTO;
use App\Repositories\Books\BooksStoreDTO;
use App\Repositories\Books\BookUpdateDTO;
use App\Services\Books\BooksService;


class BookController extends Controller
{
    public function __construct(
        protected BooksService $booksService,
    ) {
    }

    public function index(BookIndexRequest $request)
    {
        $validationData = $request->validated();

        $dto = new BookIndexDTO(
            $validationData['startDate'],
            $validationData['endDate'],
            $validationData['year'],
            $validationData['lang'],
        );

        $result = $this->booksService->collection($dto);

        return BookResource::collection($result);
    }

    public function store(BookStoreRequest $request)
    {
        $validatedData = $request->validated();

        $dto = new BooksStoreDTO(
            $validatedData['name'],
            $validatedData['year'],
            $validatedData['lang'],
            $validatedData['pages'],
            now(),
        );

        return $this->getStoreResponse(
            new BookResource(
                $this->booksService->store($dto)
            )
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(BookRequest $request, string $id)
    {
        $request->validated();

        $bookIterator = $this->booksService->getById($id);

        return new BookResource($bookIterator);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookUpdateRequest $request, string $id)
    {
        $validatedData = $request->validated();

        $dto = new BookUpdateDTO(
            $validatedData['id'],
            $validatedData['name'],
            $validatedData['year'],
            $validatedData['lang'],
            $validatedData['pages'],
            now(),
        );

        $bookIterator = $this->booksService->update($dto);

        return new BookResource($bookIterator);
    }

    public function destroy(BookRequest $request, string $id): void
    {
        $bookId = $request->validated();
        $this->booksService->delete($bookId['id']);
    }
}

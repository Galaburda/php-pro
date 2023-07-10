<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\BookRequest;
use App\Http\Requests\Book\BookStoreRequest;
use App\Http\Requests\Book\BookUpdateRequest;
use App\Http\Resources\BookResource;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return new BookResource(
            (object)[
                'id' => '1',
                'name' => 'indexx',
                'author' => 'Erich Maria Remarque',
                'year' => '1931',
                'countPages' => '288',
            ]
        );
    }

    public function store(BookStoreRequest $request)
    {
        $request->validated();

        return new BookResource(
            (object)
            [
                'id' => '1',
                'name' => 'store',
                'author' => 'store',
                'year' => '1931',
                'countPages' => '2888',
            ]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(BookRequest $request, string $id)
    {
        $request->validated();

        return new BookResource(
            (object)[
                'id' => '1',
                'name' => 'show',
                'author' => 'Erich Maria Remarque',
                'year' => '1931',
                'countPages' => '288',
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookUpdateRequest $request, string $id)
    {
        $request->validated();

        return new BookResource(
            (object)[
                'id' => '1',
                'name' => 'update',
                'author' => 'Erich Maria Remarque',
                'year' => '1931',
                'countPages' => '288',
            ]
        );
    }

    public function destroy(BookRequest $request, string $id)
    {
        $request->validated();

        return 'delete';
    }
}

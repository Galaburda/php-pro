<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\CategoryRequest;
use App\Http\Requests\Category\CategoryStoreRequest;
use App\Http\Requests\Category\CategoryUpdateRequest;
use App\Http\Resources\CategoryResource;
use App\Repositories\Categories\CategoryDTO;
use App\Repositories\Categories\CategoryUpdateDTO;
use App\Services\Category\CategoryService;

class CategoryController extends Controller
{
    public function __construct(
        protected CategoryService $categoryService,
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    {
        $validatedData = $request->validated();

        $dto = new CategoryDTO(
            $validatedData['name'],
        );

        $categoryIterator = $this->categoryService->store($dto);

        $resource = new CategoryResource($categoryIterator);

        return $this->getStoreResponse($resource);
    }

    /**
     * Display the specified resource.
     */
    public function show(CategoryRequest $request, string $id)
    {
        $request->validated();

        $categoryIterators = $this->categoryService->getById($id);

        return new CategoryResource($categoryIterators);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, string $id)
    {
        $validatedData = $request->validated();

        $dto = new CategoryUpdateDTO(
            $validatedData['id'],
            $validatedData['name'],
        );

        $categoryIterator = $this->categoryService->update($dto);

        return new CategoryResource($categoryIterator);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryRequest $request, string $id): void
    {
        $categoryId = $request->validated();

        $this->categoryService->delete($categoryId['id']);
    }
}

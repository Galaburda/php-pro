<?php

namespace App\Services\Category;

use App\Repositories\Categories\CategoryDTO;
use App\Repositories\Categories\CategoryRepository;
use App\Repositories\Categories\CategoryUpdateDTO;
use App\Repositories\Categories\Iterators\CategoryIterators;

class CategoryService
{
    public function __construct(
        protected CategoryRepository $categoryRepository,
    ) {
    }

    public function store(CategoryDTO $category): CategoryIterators
    {
        $idCategory = $this->categoryRepository->store($category);

        return $this->categoryRepository->getById($idCategory);
    }

    public function delete(int $categoryId): void
    {
        $this->categoryRepository->delete($categoryId);
    }

    public function getById($id): CategoryIterators
    {
        return $this->categoryRepository->getById($id);
    }

    public function update(CategoryUpdateDTO $data): CategoryIterators
    {
        $this->categoryRepository->update($data);
        return $this->categoryRepository->getById($data->getId());
    }
}

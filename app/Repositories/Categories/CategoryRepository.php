<?php

namespace App\Repositories\Categories;

use App\Repositories\Categories\Iterators\CategoryIterators;
use Illuminate\Support\Facades\DB;

class CategoryRepository
{
    public function store(CategoryDTO $category): int
    {
        return DB::table('categories')
            ->insertGetId([
                    'name' => $category->getName(),
                ]
            );
    }

    public function getById(int $idCategory): CategoryIterators
    {
        return new CategoryIterators(
            DB::table('categories')
                ->where('id', '=', $idCategory)
                ->first()
        );
    }

    public function delete(int $categoryId): void
    {
        DB::table('categories')
            ->delete($categoryId);
    }

    public function update(CategoryUpdateDTO $data): int
    {
        return DB::table('categories')
            ->where('id', '=', $data->getId())
            ->update([
                'name' => $data->getName(),
            ]);
    }
}

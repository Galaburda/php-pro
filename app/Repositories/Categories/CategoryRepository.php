<?php

namespace App\Repositories\Categories;

use App\Repositories\Categories\Iterators\CategoryIterators;
use Illuminate\Support\Facades\DB;

class CategoryRepository
{
    public function store(CategoryStoreDTO $category): int
    {
        return DB::table('categories')
            ->insertGetId([
                    'name' => $category->getName(),
                ]
            );
    }

    public function getById(int $idCategory): CategoryIterators
    {
        $category = DB::table('categories')
            ->where('id', '=', $idCategory)
            ->first();

        return new CategoryIterators($category->id, $category->name);
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

<?php

namespace App\Services\Category;

use App\Services\Rabbit\Messages\CategoryCreateMessage;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CategoryRepository
{
    public function create(CategoryCreateMessage $dto)
    {
        DB::table('categories')->insert([
            'name' => $dto->getName(),
            'created_at' => Carbon::createFromTimestamp($dto->getCreatedAt()),
            'updated_at' => Carbon::createFromTimestamp($dto->getCreatedAt()),
        ]);
    }
}

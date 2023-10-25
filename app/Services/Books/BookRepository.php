<?php

namespace App\Services\Books;

use App\Services\Rabbit\Messages\BookCreateMessageDTO;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class BookRepository
{

    public function create(BookCreateMessageDTO $dto)
    {
        DB::table('books')->insert([
            'name' => $dto->getName(),
            'year' => Carbon::createFromTimestamp($dto->getYear()),
            'lang' => $dto->getLang(),
            'pages' => $dto->getPages(),
            'created_at' => Carbon::createFromTimestamp($dto->getCreatedAt()),
            'updated_at' => Carbon::createFromTimestamp($dto->getCreatedAt()),
            'category_id' => $dto->getCategoryId(),
        ]);
    }
}

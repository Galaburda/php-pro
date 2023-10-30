<?php

namespace App\Repositories\BookStatisticscHour;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HourStatisticsRepositories
{
    public function storeViewsPerHour(BookStatisticsCounterDTO $dto): void
    {
        DB::table('books_hour_statistic')
            ->insert([
                'book_id' => $dto->getId(),
                'book_views' => $dto->getCount(),
                'book_comments' => 0,
                'created_at' => Carbon::now(),
            ]);
    }

    public function storeCommentsPerHour(BookStatisticsCounterDTO $dto): void
    {
        DB::table('books_hour_statistic')
            ->where('book_id', '=', $dto->getId())
            ->update([
                'book_comments' => $dto->getCount(),
                'updated_at' => Carbon::now(),
            ]);
    }
}

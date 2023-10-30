<?php

namespace App\Services\Books\Storage;

use Illuminate\Support\Facades\Redis;

class BookByHourCountViewsStorage
{
    public const KEY = 'count_book_views';

    public function set(string $value): void
    {
        Redis::set(self::KEY, $value);
    }

    public function get(): string
    {
        return Redis::get(self::KEY);
    }

    public function exists(): bool
    {
        if (Redis::exists(self::KEY) === 0) {
            return false;
        }
        return true;
    }
}

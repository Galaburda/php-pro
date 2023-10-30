<?php

namespace App\Services\Books;

use App\Services\Books\Storage\BookByHourCountViewsStorage;
use Illuminate\Support\Facades\Redis;

class BookViewsByHourCounterService
{
    public const BASIC_COUNT_VALUE = 1;

    public function __construct(
        protected BookByHourCountViewsStorage $storage,
        protected BookCounterService $service,
    ) {
    }

    public function handel(int $bookId)
    {
        $array = [];

        if ($this->storage->exists()) {
            $result = $this->service->handle(
                $bookId,
                json_decode($this->storage->get(), true)
            );
            $this->storage->set(json_encode($result));
            return;
        }

        $array[$bookId] = self::BASIC_COUNT_VALUE;
        $this->storage->set(json_encode($array));
    }
}

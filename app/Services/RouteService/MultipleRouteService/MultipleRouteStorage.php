<?php

namespace App\Services\RouteService\MultipleRouteService;

use Illuminate\Support\Facades\Redis;

class MultipleRouteStorage
{
    protected const KEY = 'multiple_route_';
    protected const SECOND = 'EX';
    protected const EXPIRE = 60;

    public function get(int $userId): int
    {
        return (int)Redis::get($this->getKey($userId));
    }

    public function set(int $userId, int $value): void
    {
        Redis::set($this->getKey($userId), $value, self::SECOND, self::EXPIRE);
    }

    public function incr($userId, int $value = 1): void
    {
        Redis::incr($this->getKey($userId), $value);
    }

    protected function getKey(int $userId): string
    {
        return self::KEY . $userId;
    }
}

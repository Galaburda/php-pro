<?php

namespace App\Services\RouteService\SingleRouteService;

use Illuminate\Support\Facades\Redis;

class SingleRouteStorage
{
    protected const KEY = 'single_route_';
    protected const SECOND = 'EX';
    protected const TIME_LIVE = 60;

    public function get(int $userId, string $route): int
    {
        return (int)Redis::get($this->getKey($userId, $route));
    }

    public function set(int $userId, string $route, int $value): void
    {
        Redis::set(
            $this->getKey($userId, $route),
            $value,
            self::SECOND,
            self::TIME_LIVE
        );
    }

    public function incr($userId, string $route, int $value = 1): void
    {
        Redis::incr($this->getKey($userId, $route), $value);
    }

    protected function getKey(int $userId, string $route): string
    {
        return self::KEY . $userId . $route;
    }
}

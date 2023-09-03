<?php

namespace App\Services\Proxy;

use Illuminate\Support\Facades\Redis;


class ProxyStorage
{
    protected const KEY = 'proxies';

    public function rpush(ProxyDTO $proxyDTO): void
    {
        Redis::rpush(self::KEY, json_encode($proxyDTO));
    }

    public function lpush(ProxyDTO $proxyDTO): void
    {
        Redis::lpush(self::KEY, json_encode($proxyDTO));
    }

    public function lpop(): ProxyDTO
    {
        $data = json_decode(Redis::lpop(self::KEY), true);
        return new ProxyDTO(...$data);
    }

    public function rpop(): ProxyDTO
    {
        $data = json_decode(Redis::rpop(self::KEY), true);
        return new ProxyDTO(...$data);
    }

    public function lrange(int $start, int $end): array
    {
        return Redis::lrange(self::KEY, $start, $end);
    }
}

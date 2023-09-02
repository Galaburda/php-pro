<?php

namespace App\Services\GetMyIp;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redis;

class GetMyIpService
{
    public function __construct(
        public Client $client,
    ) {
    }

    public function getMyIp()
    {
        $proxy = json_decode(Redis::lpop('proxies'), true);

        $userData = $proxy['username'] . ':' . $proxy['password'];

        $start = microtime(true);
        $result = $this->client->request(
            'GET',
            'https://api.myip.com/',
            [
                'proxy' => 'http://' . $userData . '@' . $proxy['proxy_address']
                    . ':' . $proxy['port']
            ],
        );
        $response = $result->getBody()->getContents();
        $end = microtime(true);

        if ($end - $start < 1) {
            Redis::rpush('proxies', json_encode($proxy));
        }

        $proxyCount = count(Redis::lrange('proxies', 0, 10));

        if ($proxyCount < 5) {
            exec('php artisan app:proxy-test');
        }

        var_dump(json_decode($response));
    }
}

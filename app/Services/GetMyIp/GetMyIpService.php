<?php

namespace App\Services\GetMyIp;

use App\Services\Proxy\ProxyDTO;
use App\Services\Proxy\ProxyStorage;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redis;

class GetMyIpService
{
    protected const MIN_EXECUTION_SECOND = 1;
    protected const MIN_PROXIES = 5;

    public function __construct(
        public Client $client,
        public ProxyStorage $proxyStorage,
    ) {
    }

    public function getMyIp()
    {
        $proxy = $this->proxyStorage->lpop();

        $start = microtime(true);

        $result = $this->client->request(
            'GET',
            'https://api.myip.com/',
            [
                'proxy' => $proxy->getData(),
            ],
        );

        $response = $result->getBody()->getContents();

        $end = microtime(true);

        if ($end - $start < self::MIN_EXECUTION_SECOND) {
            $this->proxyStorage->rpush($proxy);
        }

        $proxyCount = count($this->proxyStorage->lrange(0, 5));

        if ($proxyCount < self::MIN_PROXIES) {
            exec('php artisan app:proxy-test');
        }

        var_dump(json_decode($response));
    }
}

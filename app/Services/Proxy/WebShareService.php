<?php

namespace App\Services\Proxy;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redis;

class WebShareService
{
    public function __construct(
        public Client $client,
    ) {
    }

    public function getProxyList()
    {
        $response = $this->client->request(
            'GET',
            'https://proxy.webshare.io/api/v2/proxy/list',
            [
                'headers' => [
                    'Authorization' => 'Token ' . config('proxy.key'),
                ],
                'query' => [
                    'mode' => 'direct',
                ],
            ]
        );

        $content = $response->getBody()->getContents();

        $proxies = [];

        foreach (json_decode($content)->results as $result) {
            $proxy = [
                'username' => $result->username,
                'password' => $result->password,
                'proxy_address' => $result->proxy_address,
                'port' => $result->port,
            ];
            Redis::lpush('proxies', json_encode($proxy));

            $proxies [] = $proxy;
        }
        var_dump($proxies);
    }
}

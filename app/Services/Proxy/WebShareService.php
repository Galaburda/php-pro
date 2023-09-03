<?php

namespace App\Services\Proxy;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redis;

class WebShareService
{
    public function __construct(
        public Client $client,
        public ProxyStorage $proxyStorage,
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

        foreach (json_decode($content)->results as $result) {
            $dto = new ProxyDTO(
                $result->username,
                $result->password,
                $result->proxy_address,
                $result->port,
            );
            $this->proxyStorage->lpush($dto);
        }
    }
}

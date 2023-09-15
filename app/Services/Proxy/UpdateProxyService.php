<?php

namespace App\Services\Proxy;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class UpdateProxyService
{
    public function __construct(
        protected Client $client,
        public ProxyStorage $proxyStorage,
    ) {
    }

    public function updateProxy()
    {
        $response = $this->client->request(
            'POST',
            'https://proxy.webshare.io/api/v2/proxy/list/refresh/',
            [
                'headers' =>
                    [
                        'Authorization' => 'Token: ' . config('proxy.key'),
                    ],
            ],
        );

        $content = $response->getBody()->getContents();

        Log::info('updated list proxy: ' . $content);

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

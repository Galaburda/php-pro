<?php

namespace App\Services\Proxy;

use JsonSerializable;

class ProxyDTO implements JsonSerializable
{
    public function __construct(
        protected string $username,
        protected string $password,
        protected string $proxy_address,
        protected int $port,
    ) {
    }

    public function getData(): string
    {
        return 'http://' . $this->getUsername() . ':' . $this->getPassword()
            . '@' . $this->getProxyAddress() . ':' . $this->getPort();
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getProxyAddress(): string
    {
        return $this->proxy_address;
    }

    /**
     * @return int
     */
    public function getPort(): int
    {
        return $this->port;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'username' => $this->username,
            'password' => $this->password,
            'proxy_address' => $this->proxy_address,
            'port' => $this->port,
        ];
    }
}

<?php

namespace App\Console\Commands\DTO;

use JsonSerializable;

class PublishDTO implements JsonSerializable
{
    public string $name;

    public function __construct($name = 'vlad')
    {
        $this->name = $name;
    }

    public function jsonSerialize(): mixed
    {
        return $this->name;
    }

}

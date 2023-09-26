<?php

namespace App\Services\Word\DTO;

class WordMessageDTO implements \JsonSerializable
{
    public function __construct(
        protected string $name,
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function jsonSerialize(): array
    {
        return [
            'name' => $this->name,
        ];
    }

}

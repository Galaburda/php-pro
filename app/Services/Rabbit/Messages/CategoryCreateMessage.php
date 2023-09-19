<?php

namespace App\Services\Rabbit\Messages;

class CategoryCreateMessage implements \JsonSerializable
{
    public function __construct(
        protected string $name,
        protected int $createdAt,
        protected int $updatedAt,
    ) {
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    /**
     * @return int
     */
    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }


    function jsonSerialize(): array
    {
        return [
            'name' => $this->name,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ];
    }
}

<?php

namespace App\Services\SuperVisor\Iterators;

use JsonSerializable;

class SupervisorProcessIterator implements JsonSerializable
{
    public function __construct(
        protected string $name,
        protected string $status,
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
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }


    public function jsonSerialize(): array
    {
        return [
            'name' => $this->name,
            'status' => $this->status,
        ];
    }
}

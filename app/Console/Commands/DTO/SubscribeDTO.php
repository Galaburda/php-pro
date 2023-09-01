<?php

namespace App\Console\Commands\DTO;

use JsonSerializable;

class SubscribeDTO
{
    public function __construct(
        private string $name,
    ) {
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

}

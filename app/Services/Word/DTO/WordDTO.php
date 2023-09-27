<?php

namespace App\Services\Word\DTO;

class WordDTO
{
    public function __construct(
        protected string $name,
        protected string $result,
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
    public function getResult(): string
    {
        return $this->result;
    }

}

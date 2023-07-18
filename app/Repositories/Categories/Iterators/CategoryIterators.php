<?php

namespace App\Repositories\Categories\Iterators;

class CategoryIterators
{
    public function __construct(
        protected int $id,
        protected string $name,
    ) {
        //$this->id = $data->id;
        //$this->name = $data->name;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }


}

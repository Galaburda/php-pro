<?php

namespace App\Repositories\Categories;

class CategoryDTO
{
    public function __construct(
        protected string $name,
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

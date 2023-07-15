<?php

namespace App\Repositories\Books;

use Carbon\Carbon;

class BookUpdateDTO
{
    public function __construct(
        protected int $id,
        protected string $name,
        protected string $year,
        protected string $lang,
        protected int $pages,
        protected Carbon $updatedAt,
    ) {
    }

    /**
     * @return Carbon
     */
    public function getUpdatedAt(): Carbon
    {
        return $this->updatedAt;
    }

    /**
     * @return int
     */
    public
    function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public
    function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public
    function getYear(): string
    {
        return $this->year;
    }


    /**
     * @return string
     */
    public
    function getLang(): string
    {
        return $this->lang;
    }

    /**
     * @return int
     */
    public
    function getPages(): int
    {
        return $this->pages;
    }
}

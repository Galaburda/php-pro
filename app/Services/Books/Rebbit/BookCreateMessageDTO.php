<?php

namespace App\Services\Books\Rebbit;

use JsonSerializable;

class BookCreateMessageDTO implements JsonSerializable
{
    public function __construct(
        protected string $name,
        protected int $year,
        protected string $lang,
        protected int $pages,
        protected int $createdAt,
        protected int $updatedAt,
        protected int $categoryId,
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
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @return string
     */
    public function getLang(): string
    {
        return $this->lang;
    }

    /**
     * @return int
     */
    public function getPages(): int
    {
        return $this->pages;
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

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->categoryId;
    }


    public function jsonSerialize(): mixed
    {
        return [
            'name' => $this->name,
            'year' => $this->year,
            'lang' => $this->lang,
            'pages' => $this->pages,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
            'categoryId' => $this->categoryId,
        ];
    }

}

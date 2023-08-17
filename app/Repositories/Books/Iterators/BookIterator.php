<?php

namespace App\Repositories\Books\Iterators;

use App\Repositories\Authors\Iterators\AuthorsWithoutBooksIterator;
use App\Repositories\Categories\Iterators\CategoryIterators;

class BookIterator
{
    protected int $id;
    protected string $name;
    protected string $year;
    protected string $lang;
    protected int $pages;
    protected string $createdAt;
    protected CategoryIterators $category;
    protected AuthorsWithoutBooksIterator $authors;

    public function __construct(object $data)
    {
        $this->id = $data->id;
        $this->name = $data->name;
        $this->year = $data->year;
        $this->lang = $data->lang;
        $this->pages = $data->pages;
        $this->category = new CategoryIterators(
            $data->category_id,
            $data->category_name,
        );
        $this->authors = new AuthorsWithoutBooksIterator($data->authors);
        $this->createdAt = $data->created_at;
    }

    /**
     * @return AuthorsWithoutBooksIterator
     */
    public function getAuthors(): AuthorsWithoutBooksIterator
    {
        return $this->authors;
    }


    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * @return CategoryIterators
     */
    public function getCategory(): CategoryIterators
    {
        return $this->category;
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
     * @return string
     */
    public function getYear(): string
    {
        return $this->year;
    }

}

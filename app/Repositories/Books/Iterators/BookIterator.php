<?php

namespace App\Repositories\Books\Iterators;

class BookIterator
{
    protected int $id;
    protected string $name;
    protected string $year;
    protected string $lang;
    protected int $pages;

    public function __construct(object $data)
    {
        $this->id = $data->id;
        $this->name = $data->name;
        $this->year = $data->year;
        $this->lang = $data->lang;
        $this->pages = $data->pages;
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

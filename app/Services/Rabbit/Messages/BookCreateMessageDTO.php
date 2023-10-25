<?php

namespace App\Services\Rabbit\Messages;

use App\Enums\Lang;
use JsonSerializable;

class BookCreateMessageDTO extends BaseMessage
{
    protected string $name;
    protected int $year;
    protected Lang $lang;
    protected int $pages;
    protected int $createdAt;
    protected int $updatedAt;
    protected int $categoryId;

    public function getName(): string
    {
        return $this->name;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function getLang(): Lang
    {
        return $this->lang;
    }

    public function getPages(): int
    {
        return $this->pages;
    }

    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    public function getCategoryId(): int
    {
        return $this->categoryId;
    }
}

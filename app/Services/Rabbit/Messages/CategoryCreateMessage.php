<?php

namespace App\Services\Rabbit\Messages;

use App\Enums\Lang;
use Carbon\Carbon;


class CategoryCreateMessage extends BaseMessage
{
    // protected string $name;
    protected Carbon $createdAt;
    protected Carbon $updatedAt;
    //protected Lang $lang;

//public function __construct(object $data)
//{
//    parent::__construct($data);
//    $this->lang = Carbon::createFromTimestamp();
//}

    public function getLang(): Lang
    {
        return $this->lang;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }
}

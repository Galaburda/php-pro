<?php

namespace App\Repositories\Books;

use http\Env\Response;

class BookIndexDTO
{
    public function __construct(
        protected string $startDate,
        protected string $endDate,
        protected ?string $year,
        protected ?string $lang,
    ) {
    }


    /**
     * @return string
     */
    public function getStartDate(): string
    {
        return $this->startDate;
    }

    /**
     * @return string
     */
    public function getEndDate(): string
    {
        return $this->endDate;
    }

    /**
     * @return string|null
     */
    public function getYear(): ?string
    {
        return $this->year;
    }

    /**
     * @return string|null
     */
    public function getLang(): ?string
    {
        return $this->lang;
    }

}

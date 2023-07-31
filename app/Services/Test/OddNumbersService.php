<?php

namespace App\Services\Test;

class OddNumbersService
{
    public function oddNumber(array $data): int
    {
        return count(
            array_filter($data, function ($element) {
                return $element % 2 !== 0;
            })
        );
    }
}

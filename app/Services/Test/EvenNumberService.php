<?php

namespace App\Services\Test;

class EvenNumberService
{
    public function evenNumber(array $data): int
    {
        return count(
            array_filter($data, function ($element) {
                return $element % 2 === 0;
            })
        );
    }

}

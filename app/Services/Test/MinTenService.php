<?php

namespace App\Services\Test;

class MinTenService
{
    public function minTen(array $data): int
    {
        return count(
            array_filter($data, function ($element) {
                return $element < 10;
            })
        );
    }
}

<?php

namespace App\Services\Test;

class OverTwentyFiveAndEvenServer
{
    public function overTwentyFiveAndEven(array $data): int
    {
        return count(
            array_filter($data, function ($element) {
                return $element % 2 === 0 and $element > 25;
            })
        );
    }
}

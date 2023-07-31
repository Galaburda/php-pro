<?php

namespace Services\Test;


use App\Services\Test\OddNumbersService;
use PHPUnit\Framework\TestCase;

class OddNumbersServiceTest extends TestCase
{
    protected OddNumbersService $service;

    public function setUp(): void
    {
        parent::setUp();
        $this->service = new OddNumbersService();
    }

    public function testOddNumber(): void
    {
        $data = [1,2,3,4,5,6,7,8,9,10];
        $result = $this->service->oddNumber($data);
        $this->assertEquals(5, $result);
    }
}

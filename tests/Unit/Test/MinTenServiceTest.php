<?php

namespace Services\Test;

use App\Services\Test\MinTenService;
use PHPUnit\Framework\TestCase;

class MinTenServiceTest extends TestCase
{
    protected MinTenService $service;
    public function setUp(): void
    {
        parent::setUp();
        $this->service = new MinTenService();
    }

    public function testMinTen(): void
    {
        $data = [1,2,3,4,5,6,7,8,9,10];
        $result = $this->service->minTen($data);
        $this->assertEquals(9, $result);
    }
}

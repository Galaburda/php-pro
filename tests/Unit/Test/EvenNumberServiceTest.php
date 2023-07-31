<?php

namespace Services\Test;

use App\Services\Test\EvenNumberService;
use PHPUnit\Framework\TestCase;

class EvenNumberServiceTest extends TestCase
{
    protected EvenNumberService $service;
    public function setUp(): void
    {
        parent::setUp();
        $this->service = new EvenNumberService();
    }

    public function testEvenNumber(): void
    {
        $data = [1,2,3,4,5,6,7,8,9,10];
        $result = $this->service->evenNumber($data);
        $this->assertEqualsCanonicalizing(5, $result);
    }
}

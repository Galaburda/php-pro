<?php

namespace Services\Test;

use App\Services\Test\OverTwentyFiveAndEvenServer;
use PHPUnit\Framework\TestCase;

class OverTwentyFiveAndEvenServerTest extends TestCase
{
    protected OverTwentyFiveAndEvenServer $service;

    public function setUp(): void
    {
        parent::setUp();
        $this->service = new OverTwentyFiveAndEvenServer();
    }

    public function testOverTwentyFiveAndEven(): void
    {
        $data = [25,26,27,28,29,30];
        $result =$this->service->overTwentyFiveAndEven($data);
        $this->assertEquals(3, $result);
    }
}

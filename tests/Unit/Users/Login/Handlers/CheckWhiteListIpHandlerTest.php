<?php

namespace Services\Users\Login\Handlers;

use App\Repositories\Users\Iterators\UsersIterators;
use App\Repositories\WhiteListIp\WhiteListIpRepository;
use App\Services\Users\Login\Handlers\CheckWhiteListIpHandler;
use App\Services\Users\Login\LoginDTO;
use App\Services\Users\Login\RequestService;
use PHPUnit\Framework\TestCase;

class CheckWhiteListIpHandlerTest extends TestCase
{
    protected CheckWhiteListIpHandler $handler;
    protected WhiteListIpRepository $whiteListIpRepository;

    protected RequestService $requestService;

    public function setUp(): void
    {
        parent::setUp();
        $this->whiteListIpRepository = $this->createMock(
            WhiteListIpRepository::class
        );
        $this->requestService = $this->createMock(
            RequestService::class
        );
        $this->handler = new CheckWhiteListIpHandler(
            $this->whiteListIpRepository,
            $this->requestService,
        );
    }

    public function testCheckWhiteListIp()
    {
        $dto = new LoginDTO('test@test.com', '123456');
        $dto->setUser(
            new UsersIterators(
                (object)[
                    'id' => 1,
                    'email' => 'test@test.com',
                ]
            )
        );

        $this->whiteListIpRepository
            ->expects(self::once())
            ->method('existByUserIdByIp')
            ->with(1, "192.168.56.1")
            ->willReturn(true);

        $result = $this->handler->handle($dto, fn($dto) => $dto);

        $this->assertSame($dto, $result);
    }

    public function testCheckWhiteListIpFalse()
    {
        $dto = new LoginDTO('test@test.com', '123456');
        $dto->setUser(
            new UsersIterators(
                (object)[
                    'id' => 1,
                    'email' => 'test@test.com',
                ]
            )
        );

        $this->whiteListIpRepository
            ->expects(self::once())
            ->method('existByUserIdByIp')
            ->with(1, "192.168.56.1")
            ->willReturn(false);

        $result = $this->handler->handle($dto, fn($dto) => $dto);

        $this->assertSame($dto, $result);
    }
}

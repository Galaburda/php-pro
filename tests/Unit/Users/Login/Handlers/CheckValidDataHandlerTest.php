<?php

namespace Tests\Unit\Users\Login\Handlers;

use App\Services\Users\Login\AuthService;
use App\Services\Users\Login\Handlers\CheckValidDataHandler;
use App\Services\Users\Login\LoginDTO;
use PHPUnit\Framework\TestCase;
use Closure;

class CheckValidDataHandlerTest extends TestCase
{
    protected CheckValidDataHandler $checkValidDataHandler;
    protected AuthService $authService;

    public function setUp(): void
    {
        parent::setUp();
        $this->authService = $this->createMock(
            AuthService::class
        );
        $this->checkValidDataHandler = new CheckValidDataHandler(
            $this->authService,
        );
    }

    public function testCheckValidUserDataHandle()
    {
        $dto = new LoginDTO('test@test.com', '123456');

        $data = [
            'email' => 'test@test.com',
            'password' => '123456',
        ];

        $this->authService
            ->expects(self::once())
            ->method('isCorrectUserData')
            ->with($data)
            ->willReturn(false);

        $result = $this->checkValidDataHandler->handle($dto, fn($dto) => $dto);

        $this->assertSame($dto, $result);
    }

    public function testCheckNotValidUserDataHandle()
    {
        $dto = new LoginDTO('test@test.com', '123456');

        $data = [
            'email' => 'test@test.com',
            'password' => '123456',
        ];

        $this->authService
            ->expects(self::once())
            ->method('isCorrectUserData')
            ->with($data)
            ->willReturn(true);

        $result = $this->checkValidDataHandler->handle($dto, fn($dto) => $dto);

        $this->assertSame($dto, $result);
    }

}

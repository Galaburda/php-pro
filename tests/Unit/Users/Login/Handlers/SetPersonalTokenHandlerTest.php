<?php

namespace Services\Users\Login\Handlers;

use App\Services\Users\Login\AuthService;
use App\Services\Users\Login\Handlers\SetPersonalTokenHandler;
use App\Services\Users\Login\LoginDTO;
use PHPUnit\Framework\TestCase;

class SetPersonalTokenHandlerTest extends TestCase
{
    protected SetPersonalTokenHandler $token;
    protected AuthService $authService;

    public function setUp(): void
    {
        parent::setUp();
        $this->authService = $this->createMock(AuthService::class);
        $this->token = new SetPersonalTokenHandler(
            $this->authService,
        );
    }

    public function testSetPersonalToken()
    {
        $dto = $this->createMock(LoginDTO::class);

        $dto->expects(self::once())
            ->method('setToken')
            ->with($this->authService->setToken());

        $result = $this->token->handle($dto, fn($dto) => $dto);

        $this->assertSame($dto, $result);
    }
}

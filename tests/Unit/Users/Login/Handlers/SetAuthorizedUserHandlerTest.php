<?php

namespace Services\Users\Login\Handlers;

use App\Repositories\Users\Iterators\UsersIterators;
use App\Repositories\Users\UserRepository;
use App\Services\Users\Login\AuthService;
use App\Services\Users\Login\Handlers\SetAuthorizedUserHandler;
use App\Services\Users\Login\LoginDTO;
use PHPUnit\Framework\TestCase;

class SetAuthorizedUserHandlerTest extends TestCase
{
    protected SetAuthorizedUserHandler $setAuthorizedUserHandler;
    protected UserRepository $userRepository;
    protected AuthService $authServic;

    public function setUp(): void
    {
        parent::setUp();
        $this->userRepository = $this->createMock(UserRepository::class);
        $this->authServic = $this->createMock(AuthService::class);
        $this->setAuthorizedUserHandler = new SetAuthorizedUserHandler(
            $this->userRepository,
            $this->authServic,
        );
    }

    public function testCheckSetAuthorizedUser()
    {
        $dto = $this->createMock(LoginDTO::class);

        $userIterator = new UsersIterators(
            (object)[
                'id' => 1,
                'email' => 'test@test.com',
            ]
        );

        $this->userRepository
            ->expects(self::once())
            ->method('getById')
            ->with($this->authServic->getUserId())
            ->willReturn($userIterator);

        $dto->expects(self::once())
            ->method('setUser')
            ->with($userIterator);


        $result = $this->setAuthorizedUserHandler
            ->handle($dto, fn($dto) => $dto);
        $this->assertSame($dto, $result);
    }
}

<?php

namespace Services\Users;

use App\Repositories\Users\Iterators\UsersIterators;
use App\Repositories\Users\UserRepository;
use App\Services\Users\UserAuthService;
use App\Services\Users\UserLoginService;
use PHPUnit\Framework\TestCase;

class UserLoginValidDataTest extends TestCase
{
    protected UserLoginService $service;
    protected UserRepository $userRepository;
    protected UserAuthService $authService;
    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->userRepository = $this->createMock(UserRepository::class);
        $this->authService = $this->createMock(UserAuthService::class);
        $this->service = new UserLoginService(
            $this->userRepository,
            $this->authService,
        );
    }

    public function testValidLogin(): void
    {
        $userId = 1;

        $userIterator = new UsersIterators((object)[
            'id' => $userId,
            'email' => ' ',
        ]);

        $this->authService
            ->expects(self::once())
            ->method('isCorrectUserData')
            ->with([])
            ->willReturn(true);

        $this->authService
            ->expects(self::once())
            ->method('getUserId')
            ->willReturn($userId);

        $this->userRepository
            ->expects(self::once())
            ->method('getById')
            ->with($userId)
            ->willReturn($userIterator);

        $result = $this->service->login([]);
        $this->assertSame($userIterator, $result);
    }
}
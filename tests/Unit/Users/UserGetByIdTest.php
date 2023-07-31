<?php

namespace Services\Users;

use App\Repositories\Users\Iterators\UsersIterators;
use App\Repositories\Users\UserRepository;
use App\Services\Users\UserAuthService;
use App\Services\Users\UserLoginService;
use PHPUnit\Framework\TestCase;

class UserGetByIdTest extends TestCase
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

    public function testGetById(): void
    {
        $id = 1;
        $usersIterators = new usersIterators(
            (object)[
                'id' => 1,
                'email' => ' ',
            ]
        );
        $this->userRepository
            ->expects(self::once())
            ->method('getById')
            ->with($id)
            ->willReturn($usersIterators);

        $result = $this->service->getById($id);

        $this->assertSame($usersIterators, $result);
    }
}
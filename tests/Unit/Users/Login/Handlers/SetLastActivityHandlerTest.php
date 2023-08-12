<?php

namespace Services\Users\Login\Handlers;

use App\Repositories\LastActivity\LastActivityRepository;
use App\Repositories\Users\Iterators\UsersIterators;
use App\Services\Users\Login\Handlers\SetLastActivityHandler;
use App\Services\Users\Login\LoginDTO;
use App\Services\Users\Login\RequestService;
use PHPUnit\Framework\TestCase;

class SetLastActivityHandlerTest extends TestCase
{
    protected SetLastActivityHandler $lastActivity;
    protected LastActivityRepository $lastActivityRepository;
    protected RequestService $requestService;

    public function setUp(): void
    {
        parent::setUp();
        $this->lastActivityRepository = $this->createMock(
            LastActivityRepository::class
        );
        $this->requestService = $this->createMock(
            RequestService::class
        );
        $this->lastActivity = new SetLastActivityHandler(
            $this->lastActivityRepository,
            $this->requestService,
        );
    }

    public function testCheckLastActivity()
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

        $this->lastActivityRepository
            ->expects(self::once())
            ->method('store')
            ->with(1, '192.168.56.1');

        $result = $this->lastActivity->handle($dto, fn($dto) => $dto);
        $this->assertSame($dto, $result);
    }
}

<?php

namespace Services\Books;

use App\Repositories\Books\BooksRepository;
use App\Services\Books\CacheService;
use Closure;
use Illuminate\Support\Facades\Cache;
use PHPUnit\Framework\TestCase;

class CacheServiceTest extends TestCase
{
    protected BooksRepository $booksRepository;

    public function setUp(): void
    {
        parent::setUp();
        $this->booksRepository = $this->createMock(BooksRepository::class);
    }

    public function testSelectToFilterIterator()
    {
        $dto = (object)[
            'lastId' => 2,
        ];
        $data = [];

//        $d = $this->booksRepository
//            ->expects(self::once())
//            ->method('selectToFilterIterator')
//            ->with($dto)
//            ->willReturn($booksRepository);

        $result = Cache::shouldReceive('remember')
            ->once()
            ->with(2, 120, Closure::class)
            ->andReturn($data);

        $this->assertSame('expected', $result);
    }
}

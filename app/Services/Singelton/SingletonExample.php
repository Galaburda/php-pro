<?php

namespace App\Services\Singelton;


use App\Services\Singelton\Handlers\Handler1;
use App\Services\Singelton\Handlers\Handler2;
use App\Services\Singelton\Handlers\Handler3;
use Illuminate\Pipeline\Pipeline;

use function Clue\StreamFilter\fun;

class SingletonExample
{
    const HANDLERS
        = [
            Handler1::class,
            Handler2::class,
            Handler3::class,
        ];

    public function __construct(
        protected Pipeline $pipeline
    ) {
    }

    public function handle()
    {
        $dto = new SendDataDTO();

        $result = $this->pipeline
            ->send($dto)
            ->through(self::HANDLERS)
            ->then(function (SendDataDTO $DTO) {
                return $DTO;
            });

        return $result;
    }
}

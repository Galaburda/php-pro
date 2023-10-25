<?php

namespace App\Services\Singelton\Handlers;

use App\Services\Singelton\SaveDataStorage;
use App\Services\Singelton\SendDataDTO;
use Closure;

class Handler3
{
    public function __construct(
        protected SaveDataStorage $saveDataStorage,
    ) {
    }

    public function handle(SendDataDTO $DTO, Closure $next): SendDataDTO
    {
        echo 'hi from Handler 3' . PHP_EOL;
        echo $this->saveDataStorage->getCount() . PHP_EOL;
        return $next($DTO);
    }
}

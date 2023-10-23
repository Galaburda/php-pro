<?php

namespace App\Services\Rabbit\Messages;

use App\Services\Rabbit\Messages\Hendlers\CheckCarbonValueHandler;
use App\Services\Rabbit\Messages\Hendlers\CheckDefaultValueHandler;
use App\Services\Rabbit\Messages\Hendlers\CheckEnumHandlerValue;
use App\Services\Rabbit\Messages\Hendlers\CheckLastHandler;
use App\Services\Rabbit\Messages\Hendlers\CheckNullableValueHandler;
use Illuminate\Pipeline\Pipeline;
use ReflectionProperty;

class ReflectionService
{
    const PIPES
        = [
            CheckDefaultValueHandler::class,
            CheckNullableValueHandler::class,
            CheckEnumHandlerValue::class,
            CheckCarbonValueHandler::class,
            CheckLastHandler::class,
        ];

    public function __construct(
        protected ReflectionProperty $property,
    ) {
    }

    public function handle(object $data)
    {
        return app(Pipeline::class)
            ->send([
                'property' => $this->property,
                'data' => $data,
            ])
            ->through(self::PIPES)
            ->thenReturn();
    }
}

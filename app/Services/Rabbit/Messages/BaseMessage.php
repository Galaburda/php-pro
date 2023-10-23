<?php

namespace App\Services\Rabbit\Messages;

use Illuminate\Contracts\Validation\ValidatorAwareRule;
use JsonSerializable;
use ReflectionClass;
use Carbon\Carbon;

class BaseMessage implements JsonSerializable
{

    public function __construct(object $data)
    {
        $reflect = new ReflectionClass($this);

        foreach ($reflect->getProperties() as $property) {
            $reflectionService = new ReflectionService($property);

            $value = $reflectionService->handle($data);

            $propertyName = $property->getName();

            $this->$propertyName = $value;
        }
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}

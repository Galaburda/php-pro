<?php

namespace App\Services\Rabbit\Messages\Hendlers;


use App\Services\Rabbit\Messages\ReflectionInterface;
use Closure;


class CheckDefaultValueHandler implements ReflectionInterface
{
    public function handle(array $reflection, Closure $next): mixed
    {
        $propertyName = $reflection['property']->getName();

        if ($reflection['property']->hasDefaultValue()
            && isset($reflection['data']->$propertyName) === false
        ) {
            return $reflection['property']->getDefaultValue();
        }

        return $next($reflection);
    }
}

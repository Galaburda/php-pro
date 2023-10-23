<?php

namespace App\Services\Rabbit\Messages\Hendlers;

use Closure;

class CheckNullableValueHandler
{
    public function handle(array $reflection, Closure $next): mixed
    {
        $propertyName = $reflection['property']->getName();

        if ($reflection['property']->getType()->allowsNull()
            && isset($reflection['data']->$propertyName) === false
        ) {
            return null;
        }

        return $next($reflection);
    }
}

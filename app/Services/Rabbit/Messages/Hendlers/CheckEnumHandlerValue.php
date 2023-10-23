<?php

namespace App\Services\Rabbit\Messages\Hendlers;

use Closure;

class CheckEnumHandlerValue
{
    public function handle(array $reflection, Closure $next): mixed
    {
        $type = $reflection['property']->getType()->getName();
        $propertyName = $reflection['property']->getName();

        if (enum_exists($type)) {
            return call_user_func([$type, 'from'],
                $reflection['data']->$propertyName);
        }

        return $next($reflection);
    }
}

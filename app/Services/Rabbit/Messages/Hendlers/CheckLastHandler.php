<?php

namespace App\Services\Rabbit\Messages\Hendlers;

use Closure;

class CheckLastHandler
{
    public function handle(array $reflection, Closure $next): mixed
    {
        $propertyName = $reflection['property']->getName();

        if (isset($reflection['data']->$propertyName) === true) {
            return $reflection['data']->$propertyName;
        }

        return $next($reflection);
    }
}

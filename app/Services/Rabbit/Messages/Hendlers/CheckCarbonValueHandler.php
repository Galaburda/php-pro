<?php

namespace App\Services\Rabbit\Messages\Hendlers;

use Carbon\Carbon;
use Closure;


class CheckCarbonValueHandler
{
    //цей хендлер непрацює
    public function handle(array $reflection, Closure $next): mixed
    {
        $propertyName = $reflection['property']->getName();
        $type = $reflection['property']->getType()->getName();

        if ($reflection['data']->$propertyName instanceof Carbon) {
            $timeStamp = Carbon::parse($reflection['data']->$propertyName)
                ->getTimestamp();

            return call_user_func([$type, 'createFromTimestamp'], $timeStamp);
        }

        return $next($reflection);
    }
}

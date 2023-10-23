<?php

namespace App\Services\Rabbit\Messages;

use Closure;
use ReflectionProperty;

interface ReflectionInterface
{
    public function handle(array $reflection, Closure $next): mixed;
}

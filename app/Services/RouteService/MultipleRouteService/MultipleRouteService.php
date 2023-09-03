<?php

namespace App\Services\RouteService\MultipleRouteService;

use App\Events\StoreUserAction;
use Illuminate\Support\Facades\Log;

class MultipleRouteService
{
    protected const MAX_USED = 30;

    public function __construct(
        protected MultipleRouteStorage $multipleRouteStorage,
    ) {
    }

    public function handle(
        StoreUserAction $event,
        \Closure $next
    ): StoreUserAction {
        $value = $this->multipleRouteStorage->get($event->data->getUserId());

        $this->multipleRouteStorage->incr($event->data->getUserId());

        if ($value > self::MAX_USED) {
            Log::info('multiple route');
        }

        return $next($event);
    }

}

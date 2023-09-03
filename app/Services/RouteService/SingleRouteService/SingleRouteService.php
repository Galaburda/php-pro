<?php

namespace App\Services\RouteService\SingleRouteService;

use App\Events\StoreUserAction;
use Illuminate\Support\Facades\Log;

class SingleRouteService
{
    protected const MAX_NUMBER_ROUTE = 3;

    public function __construct(
        protected SingleRouteStorage $singleRouteStorage,
    ) {
    }

    public function handle(
        StoreUserAction $event,
        \Closure $next
    ): StoreUserAction {
        $value = $this->singleRouteStorage->get(
            $event->data->getUserId(),
            $event->data->getRoute()
        );

        $this->singleRouteStorage->incr(
            $event->data->getUserId(),
            $event->data->getRoute()
        );

        if ($value > self::MAX_NUMBER_ROUTE) {
            Log::info('single route');
        }

        return $next($event);
    }
}

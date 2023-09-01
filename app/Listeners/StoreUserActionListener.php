<?php

namespace App\Listeners;

use App\Events\StoreUserAction;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class StoreUserActionListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(StoreUserAction $event): void
    {
        $singleRoute = $event->data->getRoute() . '_' . $event->data->getUserId(
            );

        if (Redis::get($singleRoute) === null) {
            Redis::set($singleRoute, 0, 'EX', 60);
        }

        $count = Redis::incr($singleRoute);

        if ($count > 10) {
            Log::info('single route');
        }


        $ollRouteOneUser = $event->data->getUserId();

        if (Redis::get($ollRouteOneUser) === null) {
            Redis::set($ollRouteOneUser, 0, 'EX', 60);
        }

        $allRouteUser = Redis::incr($ollRouteOneUser);

        if ($allRouteUser > 30) {
            Log::info('multiple route');
        }
    }
}

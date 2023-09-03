<?php

namespace App\Listeners;

use App\Events\StoreUserAction;
use App\Services\RouteService\MultipleRouteService\MultipleRouteService;
use App\Services\RouteService\SingleRouteService\SingleRouteService;
use Illuminate\Pipeline\Pipeline;


class StoreUserActionListener
{
    protected const HANDLERS
        = [
            SingleRouteService::class,
            MultipleRouteService::class,
        ];

    public function __construct(
        protected Pipeline $pipeline,
    ) {
    }

    public function handle(StoreUserAction $event)
    {
        $result = $this->pipeline
            ->send($event)
            ->through(self::HANDLERS)
            ->then(fn(StoreUserAction $event) => $event);

        return $result;
    }
}

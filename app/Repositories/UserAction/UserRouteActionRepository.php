<?php

namespace App\Repositories\UserAction;

use App\Repositories\UserAction\Iterators\RouteActionIterator;
use Illuminate\Support\Facades\DB;

class UserRouteActionRepository
{
    public function storeUserAction(UserRouteActionDTO $data): void
    {
        DB::table('user_route_action')
            ->insertOrIgnore([
                'user_id' => $data->getUserId(),
                'route' => $data->getRoute(),
                'method' => $data->getMethods(),
                'created_at' => $data->getCreatedAt(),
            ]);
    }
}

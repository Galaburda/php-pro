<?php

namespace App\Services\UserAction;

use App\Repositories\UserAction\UserRouteActionDTO;
use App\Repositories\UserAction\UserRouteActionRepository;

class UserActionService
{
    public function __construct(
        protected UserRouteActionRepository $userRouteActionRepository,
    ) {
    }

    public function storeUserAction(UserRouteActionDTO $data): void
    {
        $this->userRouteActionRepository->storeUserAction($data);
    }

}

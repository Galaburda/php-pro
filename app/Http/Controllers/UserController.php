<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserLoginRequest;
use App\Http\Resources\UserResource;
use App\Services\Users\UserLoginService;


class UserController extends Controller
{
    public function __construct(
        protected UserLoginService $userLoginService,
    ) {
    }
}


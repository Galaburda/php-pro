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

    public function login(UserLoginRequest $request)
    {
        $validatedData = $request->validated();

        $user = $this->userLoginService->login($validatedData);

        if (is_null($user) === true) {
            return 'email or password incorrect';
        }

        $token = $this->userLoginService->getToken();

        $userResource = new UserResource($user);

        return $userResource->additional([
            'Bearer' => $token,
        ]);
    }
}


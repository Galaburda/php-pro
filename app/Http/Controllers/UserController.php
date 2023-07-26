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

        $user = $this->userLoginService->returnUserIfExists($validatedData);

        $token = $this->userLoginService->setToken($user);

        $resource = new UserResource(
            $this->userLoginService->getById(auth()->user()->id)
        );

        return $resource->additional([
            'Bearer' => $token,
        ]);
    }
}


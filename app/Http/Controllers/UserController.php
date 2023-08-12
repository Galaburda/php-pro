<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserLoginRequest;
use App\Http\Resources\UserResource;
use App\Services\Users\Login\LoginDTO;
use App\Services\Users\Login\LoginService;


class UserController extends Controller
{
    public function __construct(
        protected LoginService $loginService,
    ) {
    }

    public function login(UserLoginRequest $request)
    {
        $validatedData = $request->validated();
        $loginDTO = new LoginDTO(... $validatedData);
        $user = $this->loginService->handle($loginDTO);

        var_dump($user);
//        $user = $this->userLoginService->login($validatedData);
//
//        if (is_null($user) === true) {
//            return 'email or password incorrect';
//        }
//
//        $token = $this->userLoginService->getToken();
//
//        $userResource = new UserResource($user);
//
//        return $userResource->additional([
//            'Bearer' => $token,
//        ]);
    }
}


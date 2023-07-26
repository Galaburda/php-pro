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
        //TODO неймінг методів.
        // бачу в деяких місцях робиш добре, а деколи - ні.
        // підніми пліз тему неймінгу на уроці, щоб ми обговорили те де ти плутаєшся,
        // або не до кінця розумієш.
        // це рекомендація і якщо не хочеш піднімати цю тему на уроці чи розбирати
        // цей код то не потрібно себе змушувати)
        // як варіант можеш мені в приват написати. постараюсь пояснити детальніше)))
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


<?php

namespace App\Services\Users\Login;

use Laravel\Passport\PersonalAccessTokenResult;

class AuthService
{
    public function isCorrectUserData(array $data): bool
    {
        if (auth()->attempt($data) === false) {
            return false;
        }

        return true;
    }

    public function getUserId(): int
    {
        return auth()->user()->id;
    }

    public function setToken(): PersonalAccessTokenResult
    {
        return auth()->user()->createToken('secret');
    }

}

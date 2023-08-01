<?php

namespace App\Services\Users;

use Laravel\Passport\PersonalAccessTokenResult;

class UserAuthService
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

    public function createToken(): PersonalAccessTokenResult
    {
        return auth()->user()->createToken(config('app.name'));
    }
}

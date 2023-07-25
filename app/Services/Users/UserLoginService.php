<?php

namespace App\Services\Users;


use App\Repositories\Books\Iterators\BookIterator;
use App\Repositories\Users\Iterators\UsersIterators;
use App\Repositories\Users\UserLoginDTO;
use App\Repositories\Users\UserRepository;
use Laravel\Passport\PersonalAccessTokenResult;

class UserLoginService
{
    public function __construct(
        protected UserRepository $userRepository
    ) {
    }

    public function getById(int $id): UsersIterators
    {
        return $this->userRepository->getById($id);
    }

    public function returnUserIfExists(mixed $data): ?UsersIterators
    {
        if (auth()->attempt($data) === false) {
            return null;
        }
        return $this->userRepository->getByEmail($data['email']);
    }

    public function setToken(UsersIterators $user): ?PersonalAccessTokenResult
    {
        if ($user === null) {
            return null;
        }

        return auth()->user()->createToken(config('app.name'));
    }
}

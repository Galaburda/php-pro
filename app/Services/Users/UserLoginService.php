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
        protected UserRepository $userRepository,
        protected UserAuthService $authService,
    ) {
    }

    public function login(array $data): ?UsersIterators
    {
        $isCorrectUserData = $this->authService->isCorrectUserData($data);

        if ($isCorrectUserData === false) {
            return null;
        }

        $id = $this->authService->getUserid();

        return $this->userRepository->getById($id);
    }
    public function getById(int $id): UsersIterators
    {
        return $this->userRepository->getById($id);
    }

    public function getToken(): PersonalAccessTokenResult
    {
        return $this->authService->createToken();
    }

}

<?php

namespace App\Services\Users\Login\Handlers;

use App\Repositories\Users\UserRepository;
use App\Services\Users\Login\AuthService;
use App\Services\Users\Login\LoginDTO;
use App\Services\Users\Login\LoginInterface;
use Closure;

class SetAuthorizedUserHandler implements LoginInterface
{
    public function __construct(
        protected UserRepository $usersRepository,
        protected AuthService $authService,
    ) {
    }

    public function handle(LoginDTO $loginDTO, Closure $next): LoginDTO
    {
        $user = $this->usersRepository->getById(
            $this->authService->getUserId()
        );

        $loginDTO->setUser($user);

        return $next($loginDTO);
    }
}

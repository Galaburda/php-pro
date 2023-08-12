<?php

namespace App\Services\Users\Login\Handlers;

use App\Services\Users\Login\AuthService;
use App\Services\Users\Login\LoginDTO;
use App\Services\Users\Login\LoginInterface;
use Closure;

class SetPersonalTokenHandler implements LoginInterface
{
    public function __construct(
        protected AuthService $authService,
    ) {
    }

    public function handle(LoginDTO $loginDTO, Closure $next): LoginDTO
    {
        $loginDTO->setToken($this->authService->setToken());

        return $next($loginDTO);
    }
}

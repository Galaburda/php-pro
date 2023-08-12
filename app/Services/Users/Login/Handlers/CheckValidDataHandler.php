<?php

namespace App\Services\Users\Login\Handlers;

use App\Services\Users\Login\AuthService;
use App\Services\Users\Login\LoginDTO;
use App\Services\Users\Login\LoginInterface;
use Closure;

class CheckValidDataHandler implements LoginInterface
{
    public function __construct(
        protected AuthService $authService,
    ) {
    }

    public function handle(LoginDTO $loginDTO, Closure $next): LoginDTO
    {
        $data = [
            'email' => $loginDTO->getEmail(),
            'password' => $loginDTO->getPassword(),
        ];

        $isCorrectUserData = $this->authService->isCorrectUserData($data);

        if ($isCorrectUserData === false) {
            return $loginDTO;
        }

        return $next($loginDTO);
    }
}

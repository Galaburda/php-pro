<?php

namespace App\Services\Users\Login\Handlers;

use App\Repositories\LastActivity\LastActivityRepository;
use App\Services\Users\Login\LoginDTO;
use App\Services\Users\Login\LoginInterface;
use App\Services\Users\Login\RequestService;
use Closure;

class SetLastActivityHandler implements LoginInterface
{
    public function __construct(
        protected LastActivityRepository $lastActivityRepository,
        protected RequestService $requestService,
    ) {
    }

    public function handle(LoginDTO $loginDTO, Closure $next): LoginDTO
    {
        $this->lastActivityRepository->store(
            $loginDTO->getUser()->getId(),
            //$this->requestService->getIp(),
            //request()->ip(),
            '192.168.56.1',
        );

        return $next($loginDTO);
    }
}

<?php

namespace App\Services\Users\Login\Handlers;

use App\Repositories\WhiteListIp\WhiteListIpRepository;
use App\Services\Users\Login\LoginDTO;
use App\Services\Users\Login\LoginInterface;
use App\Services\Users\Login\RequestService;
use Closure;

class CheckWhiteListIpHandler implements LoginInterface
{
    public function __construct(
        protected WhiteListIpRepository $whiteListIpRepository,
        protected RequestService $requestService,
    ) {
    }

    public function handle(LoginDTO $loginDTO, Closure $next): LoginDTO
    {
        $exist = $this->whiteListIpRepository->existByUserIdByIp(
            $loginDTO->getUser()->getId(),
            //$this->requestService->getIp(),
            //request()->ip(),
            '192.168.56.1',
        );

        if ($exist === false) {
            return $loginDTO;
        }

        return $next($loginDTO);
    }
}

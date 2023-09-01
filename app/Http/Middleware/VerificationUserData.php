<?php

namespace App\Http\Middleware;

use App\Enums\Methods;
use App\Events\StoreUserAction;
use App\Repositories\UserAction\UserRouteActionDTO;
use App\Services\UserAction\UserActionService;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerificationUserData
{
    public function __construct(
        protected UserActionService $userActionService,
    ) {
    }

    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $dto = new UserRouteActionDTO(
            auth()->id(),
            $request->url(),
            Methods::from($request->method()),
            Carbon::now(),
        );

        $this->userActionService->storeUserAction($dto);

        StoreUserAction::dispatch($dto);

        return $next($request);
    }
}

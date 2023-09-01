<?php

namespace App\Repositories\UserAction;

use App\Enums\Methods;

class UserRouteActionDTO
{
    public function __construct(
        protected int $userId,
        protected string $route,
        protected Methods $methods,
        protected string $createdAt,
    ) {
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function getRoute(): string
    {
        return $this->route;
    }

    /**
     * @return Methods
     */
    public function getMethods(): Methods
    {
        return $this->methods;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

}

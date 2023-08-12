<?php

namespace App\Services\Users\Login;

use App\Repositories\Users\Iterators\UsersIterators;
use Laravel\Passport\PersonalAccessTokenResult;

class LoginDTO
{
    protected UsersIterators $user;
    protected PersonalAccessTokenResult $token;

    public function __construct(
        protected string $email,
        protected string $password,
    ) {
    }

    /**
     * @return PersonalAccessTokenResult
     */
    public function getToken(): PersonalAccessTokenResult
    {
        return $this->token;
    }

    /**
     * @param PersonalAccessTokenResult $token
     */
    public function setToken(PersonalAccessTokenResult $token): void
    {
        $this->token = $token;
    }

    /**
     * @return UsersIterators
     */
    public function getUser(): UsersIterators
    {
        return $this->user;
    }

    /**
     * @param UsersIterators $user
     */
    public function setUser(UsersIterators $user): void
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

}

<?php

namespace App\Services\Users\Login;

class RequestService
{
    public function getIp(): null|string
    {
        return request()->ip();
    }
}

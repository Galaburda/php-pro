<?php

namespace App\Repositories\Users;

use App\Repositories\Users\Iterators\UsersIterators;
use Illuminate\Support\Facades\DB;

class UserRepository
{
    public function getById(int $id): UsersIterators
    {
        $data = DB::table('users')
            ->where('id', '=', $id)
            ->first();

        return new UsersIterators($data);
    }

    public function getByEmail(string $email): UsersIterators
    {
        $data = DB::table('users')
            ->where('email', '=', $email)
            ->first();
        return new UsersIterators($data);
    }
}

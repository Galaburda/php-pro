<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class SetRedisCommand extends Command
{
    protected $signature = 'app:redis-set';

    protected $description = 'Set key to hold the string value';

    public function handle()
    {
        $key = $this->ask('Enter key:');
        $value = $this->ask('Enter value:');
        $time = $this->ask('Enter time life in second');
        Redis::set($key, $value, 'EX', $time);
        $this->info('The key is installed');
    }
}

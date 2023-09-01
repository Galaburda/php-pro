<?php

namespace App\Console\Commands;


use App\Console\Commands\DTO\SubscribeDTO;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class RedisSubscribeCommand extends Command
{
    protected $signature = 'app:redis-subscribe';

    protected $description = 'Subscribe to a Redis channel';


    public function handle(): void
    {
        Redis::subscribe(['test-channel'], function ($message) {
            $subscribeDTO = new SubscribeDTO($message);
            $this->info($subscribeDTO->getName());
        });
    }
}

<?php

namespace App\Console\Commands;

use App\Console\Commands\DTO\PublishDTO;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class RedisPublishCommand extends Command
{
    protected $signature = 'app:redis-publish';

    protected $description = 'Command description';

    public function handle(PublishDTO $publishDTO)
    {
        while (true) {
            Redis::publish('test-channel', $publishDTO->jsonSerialize());
            $this->info('published');
            sleep(5);
        }
    }
}

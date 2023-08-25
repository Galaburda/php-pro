<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class IncrementsRedisCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:redis-increments';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Increments the number stored at key by one';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $key = $this->ask('Enter key for increments:');
        Redis::incr($key);
        $this->info(Redis::get($key));
    }
}

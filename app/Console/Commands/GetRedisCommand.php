<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class GetRedisCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:redis-get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get the value of key';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $key = $this->ask('Enter key:');
        $this->info('Your value: ' . Redis::get($key));
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class DeleteRedisCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:redis-delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get the value of key and delete the key';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $key = $this->ask('Key for delete:');
        Redis::del($key);
        $this->info('Key deleted');
    }
}

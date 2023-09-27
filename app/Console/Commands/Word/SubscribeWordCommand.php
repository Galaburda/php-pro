<?php

namespace App\Console\Commands\Word;

use App\Services\SuperVisor\SuperVisorService;
use App\Services\Word\WordConsumer;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SubscribeWordCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:subscribe-word-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(WordConsumer $consumer)
    {
        $consumer->handle();
    }
}

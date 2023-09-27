<?php

namespace App\Console\Commands;

use App\Services\Books\Rebbit\CreateBookConsumer;
use App\Services\SuperVisor\ProcessDTO;
use App\Services\SuperVisor\SuperVisorService;
use Illuminate\Console\Command;

class SubscribeBookCreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:subscribe-book-create-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(CreateBookConsumer $consumer)
    {
        $consumer->handle();
    }
}

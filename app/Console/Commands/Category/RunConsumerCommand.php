<?php

namespace App\Console\Commands\category;

use App\Enums\Queue;
use App\Services\Rabbit\Subscribe\AmqpBaseConsumerService;
use Illuminate\Console\Command;

class RunConsumerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(AmqpBaseConsumerService $service)
    {
        $service->handle(Queue::CREATE_BOOK_QUEUE);
    }
}

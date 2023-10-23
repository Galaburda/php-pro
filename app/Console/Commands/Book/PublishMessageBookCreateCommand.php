<?php

namespace App\Console\Commands\Book;

use App\Services\Rabbit\Publish\SendBookCreateService;
use App\Services\SuperVisor\SuperVisorService;
use Carbon\Carbon;
use Illuminate\Console\Command;

class PublishMessageBookCreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:publish-message-book-create-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(
        SendBookCreateService $service,
        //SuperVisorService $superVisorService,
    ) {
        // $timeExecution = Carbon::now()->addMinute(1);

        // while ($timeExecution > Carbon::now()) {
            $service->handle();
        // }

        //$superVisorService->stopProcesses('StartPublishMessageBook');
    }
}

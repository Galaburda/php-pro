<?php

namespace App\Console\Commands\Word;

use App\Services\SuperVisor\SuperVisorService;
use App\Services\Word\WordService;
use Carbon\Carbon;
use Illuminate\Console\Command;

class PublishWordCommand extends Command
{
    protected $signature = 'app:publish-word-command';

    protected $description = 'Command description';

    public function handle(
        WordService $service,
        SuperVisorService $superVisorService
    ) {
        $timeExecution = Carbon::now()->addMinute(1);

        while ($timeExecution > Carbon::now()) {
            $service->handle();
        }

        $superVisorService->stopProcesses('PublishWord');
    }
}

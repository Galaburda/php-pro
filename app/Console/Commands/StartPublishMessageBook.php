<?php

namespace App\Console\Commands;

use App\Services\SuperVisor\ProcessDTO;
use App\Services\SuperVisor\SuperVisorService;
use Carbon\Carbon;
use Illuminate\Console\Command;

class StartPublishMessageBook extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(SuperVisorService $service)
    {
        $process = new ProcessDTO([
            'name' => 'StartPublishMessageBook',
            'command' => 'php /var/www/html/artisan app:publish-message-book-create-command',
            'number' => 1
        ]);
        $hasSection = $service->hasSection($process->getName());
        if ($hasSection === false) {
            $service->addProcessesConfig($process);
            $this->info('created new process');
            exec('supervisorctl reread');
            exec('supervisorctl update');
            return;
        }
        $service->updateProcesses($process);
        exec('supervisorctl reread');
        exec('supervisorctl update');
        $this->info('updated existed process');
    }
}

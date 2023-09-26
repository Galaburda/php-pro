<?php

namespace App\Console\Commands\Word;

use App\Services\SuperVisor\ProcessDTO;
use App\Services\SuperVisor\SuperVisorService;
use Illuminate\Console\Command;

class SupervisorStartPublishWordCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:supervisor-start-publish-word-command';

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
            'name' => 'PublishWord',
            'command' => 'php /var/www/html/artisan app:publish-word-command',
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

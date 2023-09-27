<?php

namespace App\Console\Commands\Word;

use App\Services\SuperVisor\ProcessDTO;
use App\Services\SuperVisor\SuperVisorService;
use Illuminate\Console\Command;

class SupervisorStartSubscribeWordCommand extends Command
{
    protected $signature = 'app:supervisor-start-subscribe-word-command';

    protected $description = 'Command description';

    public function handle(SuperVisorService $service)
    {
        $process = new ProcessDTO([
            'name' => 'SubscribeWord',
            'command' => 'php /var/www/html/artisan app:subscribe-word-command',
            'number' => 10
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

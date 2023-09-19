<?php

namespace App\Console\Commands;

use App\Services\SuperVisor\ProcessDTO;
use App\Services\SuperVisor\SuperVisorService;
use Illuminate\Console\Command;
use Illuminate\Contracts\Console\PromptsForMissingInput;

class SupervisorDeleteProcess extends Command implements PromptsForMissingInput
{

    protected const SUPERVISOR_PROCESS_NAME = 'name_supervisor_process';
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:supervisor-delete-process {name_supervisor_process}';

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
        $nameProcess = $this->argument(self::SUPERVISOR_PROCESS_NAME);
        $hasSection = $service->hasSection($nameProcess);

        if ($hasSection === true) {
            $service->deleteProcess($nameProcess);
            exec('supervisorctl reread');
            exec('supervisorctl update');
            $this->info('delete process');
        }

        $this->info('process not found');
    }

    protected function promptForMissingArgumentsUsing()
    {
        return [
            self::SUPERVISOR_PROCESS_NAME => 'You forgot to enter the name of the processor Supervisor',
        ];
    }

}

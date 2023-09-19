<?php

namespace App\Console\Commands;

use App\Services\SuperVisor\SuperVisorService;
use Illuminate\Console\Command;

class SupervisorGetAllProcess extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:supervisor-get-all-process';

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
        $result = $service->getAllProcess();
        $this->info(json_encode($result->getIterator()->getArrayCopy()));
    }
}

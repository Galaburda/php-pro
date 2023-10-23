<?php

namespace App\Console\Commands;

use App\Services\Logger\LoggerService;
use App\Services\Singelton\SingletonExample;
use Illuminate\Console\Command;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Log;

class SingletonCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:singleton-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $logger = LoggerService::getInstance();
        $logger->logMessage('Запис 1');
        $logger->logMessage('Запис 2');
        $logger->logMessage('Запис 3');

        var_dump($logger->getLog());
    }


}

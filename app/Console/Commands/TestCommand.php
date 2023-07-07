<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'User age verification';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $age = $this->ask('How old are you?');

        if($this->confirmContinuation($age)){
            $action = $this->choice('Select an action', ['read', 'write']);
            $this->$action();
        }
        $this->info('good day');
    }


    private function confirmContinuation(int $age): bool
    {
        if ($age < 18){
            return $this->confirm('Do you wish to continue?') ? true : false;
        }
        return true;
    }

    private function write(): void
    {
        $userData = [];
        $userData['gender'] = $this->ask('Your gender?');
        $userData['city'] = $this->ask('Where do you live?');
        $userData['phone'] = $this->ask('What is you phone number');

        $this->fileWrite($userData);


    }

    private function read(): void
    {
        $file = storage_path('app/public/data.txt');

        if (file_exists($file) === false){
            $this->error('File not found');
            return;
        }

        $this->info(file_get_contents($file));

    }

    public function fileWrite(array $userData): void
    {
        $file = storage_path('app/public/data.txt');
        $jsonData = json_encode($userData);
        $writeFile = file_put_contents($file, $jsonData, FILE_APPEND);

        if ($writeFile === false) {
            $this->info('data was not written to the file');
            return;
        }

        $this->info('Data successfully written to file');

    }
}

<?php

namespace App\Console\Commands;

use App\Enums\Lang;
use App\Services\Rabbit\Messages\CategoryCreateMessage;
use Carbon\Carbon;
use Illuminate\Console\Command;


class ExampleCommand extends Command
{
    protected $signature = 'app:example-command';
    protected $description = 'Command description';

    public function handle()
    {
        $m = new CategoryCreateMessage(
            (object)[
                //'name' => 'vlad',
                'createdAt' => now(),
                'updatedAt' => now(),
                //'lang' => Lang::UA->value,
            ]
        );

        $encode = (json_encode($m));

        var_dump($encode);
//
        $cat = new CategoryCreateMessage(json_decode($encode));

        var_dump($cat);
    }
}

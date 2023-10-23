<?php

namespace App\Services\Logger;

use Illuminate\Support\Facades\Log;
use Psy\Readline\Hoa\File;

class LoggerService
{
    private static $instances = null;

    private array $log = [];

    private function __construct()
    {
    }

    private function __clone()
    {
    }


    public static function getInstance(): LoggerService
    {
        if (self::$instances === null) {
            return self::$instances = new self();
        }
        return self::$instances;
    }

    public function logMessage($message): void
    {
        $this->log[] = $message;
        Log::info($message);
    }

    public function getLog(): array
    {
        return $this->log;
    }

}

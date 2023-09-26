<?php

namespace App\Services\Books\Rebbit;

use Bschmitt\Amqp\Facades\Amqp;

class SendBookCreateService
{
    public const QUEUE_NAME = 'create_book';

    public function handle()
    {
        $dto = new BookCreateMessageDTO(
            'name' . rand(1, 100000),
            time(),
            'ua',
            rand(345, 1000),
            time(),
            time(),
            rand(1, 999),
        );

        Amqp::publish(self::QUEUE_NAME, json_encode($dto), [
            'queue' => self::QUEUE_NAME
        ]);
    }
}

<?php

namespace App\Services\Rabbit\Publish;

use App\Services\Rabbit\Messages\CategoryCreateMessage;
use Bschmitt\Amqp\Facades\Amqp;

class SendCreateCategoryService
{
// цей файл відповідає за відправку наших повідомлень
// для того щоб ми створювали нашу категорію

    public const QUEUE_NAME = 'create_category';

    public function handle()
    {
        $massage = new CategoryCreateMessage(
            'naw_category' . rand(1, 999),
            time(),
            time(),
        );
        Amqp::publish(self::QUEUE_NAME, json_encode($massage), [
            'queue' => self::QUEUE_NAME,
        ]);
    }
}

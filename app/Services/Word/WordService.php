<?php

namespace App\Services\Word;

use App\Services\Word\DTO\WordMessageDTO;
use Bschmitt\Amqp\Facades\Amqp;
use Faker\Generator as Faker;

class WordService
{
    public const QUEUE_NAME = 'get_word_result';

    public function __construct(
        public Faker $faker,
    ) {
    }

    public function handle()
    {
        $messageDTO = new WordMessageDTO($this->faker->word());

        Amqp::publish(self::QUEUE_NAME, json_encode($messageDTO), [
            'queue' => self::QUEUE_NAME
        ]);
    }
}

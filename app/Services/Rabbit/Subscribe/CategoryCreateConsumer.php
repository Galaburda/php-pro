<?php

namespace App\Services\Rabbit\Subscribe;

use App\Services\Category\CategoryRepository;
use App\Services\Rabbit\Messages\CategoryCreateMessage;
use App\Services\Rabbit\Publish\SendCreateCategoryService;
use Bschmitt\Amqp\Facades\Amqp;
use PhpAmqpLib\Message\AMQPMessage;

class CategoryCreateConsumer
{
// це той хто слухає повідомлення з нашої черги
    public function __construct(
        protected CategoryRepository $categoryRepository,
    ) {
    }

    public function handle()
    {
        Amqp::consume(
            SendCreateCategoryService::QUEUE_NAME,
            function (AMQPMessage $message, $resolver) {
                $messageDTO = new CategoryCreateMessage(
                    ...
                    json_decode($message->getBody(), true,)
                );
                $this->categoryRepository->create($messageDTO);
                $message->ack();
            }
        );
    }
}

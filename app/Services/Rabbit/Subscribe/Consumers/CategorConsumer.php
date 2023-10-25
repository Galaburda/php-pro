<?php

namespace App\Services\Rabbit\Subscribe\Consumers;

use App\Services\Category\BookStoreByMessageService;
use App\Services\Rabbit\Messages\CategoryCreateMessage;
use App\Services\Rabbit\Subscribe\ConsumerInterface;
use PhpAmqpLib\Message\AMQPMessage;

class CategorConsumer implements ConsumerInterface
{
    public function __construct(
        protected BookStoreByMessageService $bookStoreByMessageService,
    ) {
    }

    public function handle(AMQPMessage $message)
    {
        $messageDTO = new CategoryCreateMessage(
            ...
            json_decode($message->getBody(), true)
        );
        $this->bookStoreByMessageService->handle($messageDTO);
        $message->ack();
    }
}

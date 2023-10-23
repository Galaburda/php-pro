<?php

namespace App\Services\Rabbit\Subscribe\Consumers;

use App\Services\Books\BookRepository;
use App\Services\Rabbit\Messages\BookCreateMessageDTO;
use App\Services\Rabbit\Subscribe\ConsumerInterface;
use PhpAmqpLib\Message\AMQPMessage;


class CreateBookConsumer implements ConsumerInterface
{
    public function __construct(
        protected BookRepository $bookRepository,
    ) {
    }

    public function handle(AMQPMessage $message)
    {
        $dto = new BookCreateMessageDTO(
            ...
            json_decode($message->getBody(), true)
        );
        $this->bookRepository->create($dto);
        $message->ack();
    }
}

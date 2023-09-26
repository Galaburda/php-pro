<?php

namespace App\Services\Books\Rebbit;

use App\Services\Books\BookRepository;
use Bschmitt\Amqp\Facades\Amqp;
use PhpAmqpLib\Message\AMQPMessage;


class CreateBookConsumer
{
    public function __construct(
        protected BookRepository $bookRepository,
    ) {
    }

    public function handle()
    {
        Amqp::consume(
            SendBookCreateService::QUEUE_NAME,
            function (AMQPMessage $message,) {
                $dto = new BookCreateMessageDTO(
                    ...
                    json_decode($message->getBody(), true)
                );
                $this->bookRepository->create($dto);
                $message->ack();
            }
        );
    }
}

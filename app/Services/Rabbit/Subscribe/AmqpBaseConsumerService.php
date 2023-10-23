<?php

namespace App\Services\Rabbit\Subscribe;


use App\Enums\Queue;
use App\Services\Rabbit\Subscribe\Consumers\CategorConsumer;
use App\Services\Rabbit\Subscribe\Consumers\CreateBookConsumer;
use Bschmitt\Amqp\Amqp;
use PhpAmqpLib\Message\AMQPMessage;


class AmqpBaseConsumerService
{
    protected const QUEUE_CONSUMER
        = [
            Queue::CREATE_CATEGORY_QUEUE->value => CategorConsumer::class,
            Queue::CREATE_BOOK_QUEUE->value => CreateBookConsumer::class,
        ];

    public function __construct(
        protected Amqp $amqp,
    ) {
    }

    public function handle(Queue $queue)
    {
        $consumer = app()->make(self::QUEUE_CONSUMER[$queue->value]);

        $this->amqp->consume(
            $queue->value,
            function (AMQPMessage $message) use ($consumer) {
                // try {
                $consumer->handle($message);
                // } catch (\Exception $exception){
                //$exception->getMessage();
                // ToDo check $message and $exception
                //$message->ack();
                //}
            }
        );
    }
}

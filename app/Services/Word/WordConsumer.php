<?php

namespace App\Services\Word;

use App\Services\Rabbit\Messages\CategoryCreateMessage;
use App\Services\Rabbit\Publish\SendCreateCategoryService;
use App\Services\Word\DTO\WordDTO;
use App\Services\Word\DTO\WordMessageDTO;
use Bschmitt\Amqp\Facades\Amqp;
use GuzzleHttp\Client;
use PhpAmqpLib\Message\AMQPMessage;

class WordConsumer
{
    public function __construct(
        protected Client $client,
        protected WordRepository $repository,
    ) {
    }

    public function handle()
    {
        Amqp::consume(
            WordService::QUEUE_NAME,
            function (AMQPMessage $message, $resolver) {
                $messageDTO = new WordMessageDTO(
                    ...
                    json_decode($message->getBody(), true)
                );

                $duckResult = $this->client->get(
                    'https://api.duckduckgo.com',
                    [
                        'query' =>
                            [
                                'q' => $messageDTO->getName(),
                                'format' => 'json',
                                'pretty' => 1,
                            ]
                    ]
                );

                $result = $duckResult->getBody()->getContents();

                $word = new WordDTO(
                    $messageDTO->getName(),
                    $result,
                );

                $this->repository->create($word);

                $message->ack();
            }
        );
    }
}

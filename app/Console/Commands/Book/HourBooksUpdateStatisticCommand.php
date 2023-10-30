<?php

namespace App\Console\Commands\Book;

use App\Repositories\BookStatisticscHour\BookStatisticsCounterDTO;
use App\Repositories\BookStatisticscHour\HourStatisticsRepositories;
use App\Services\Books\Storage\BookByHourCountViewsStorage;
use App\Services\Books\Storage\BookCommentByHourCounterServiceStorage;
use Illuminate\Console\Command;

class HourBooksUpdateStatisticCommand extends Command
{

    protected $signature = 'app:hour-books-update-statistic-command';

    protected $description = 'count views and comment of book';


    public function __construct(
        protected BookCommentByHourCounterServiceStorage $commentsStorage,
        protected BookByHourCountViewsStorage $viewsStorage,
        protected HourStatisticsRepositories $bookRepository,
    ) {
        parent::__construct();
    }

    public function handle(): void
    {
        $views = json_decode($this->viewsStorage->get());
        $comments = json_decode($this->commentsStorage->get());


        foreach ($views as $key => $value) {
            $dto = new BookStatisticsCounterDTO(
                $key,
                $value,
            );
            $this->bookRepository->storeViewsPerHour($dto);
        }


        foreach ($comments as $key => $value) {
            $dto = new BookStatisticsCounterDTO(
                $key,
                $value,
            );
            $this->bookRepository->storeCommentsPerHour($dto);
        }
    }
}

<?php

namespace App\Services\Category;

use App\Services\Rabbit\Messages\CategoryCreateMessage;

class BookStoreByMessageService
{
    public function __construct(
        protected CategoryRepository $categoryRepository,
    ) {
    }

    public function handle(CategoryCreateMessage $messageDTO)
    {
        $this->categoryRepository->create($messageDTO);
    }
}

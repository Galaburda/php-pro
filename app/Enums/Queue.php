<?php

namespace App\Enums;

enum Queue: string
{
    case CREATE_CATEGORY_QUEUE = 'create_category';
    case CREATE_BOOK_QUEUE = 'create_book';
}

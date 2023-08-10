<?php

namespace App\Enums;

enum PaymentsStatus: int
{
    case COMPLETED = 1;
    case CREATED = 2;
}

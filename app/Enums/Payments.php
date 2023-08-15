<?php

namespace App\Enums;

enum Payments: int
{
    case PAYPAL = 1;

    case STRIPE = 2;
}

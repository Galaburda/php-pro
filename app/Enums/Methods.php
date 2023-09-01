<?php

namespace App\Enums;

enum Methods: string
{
    case POST = ' POST';
    case GET = 'GET';
    case PUT = 'PUT';
    case PATCH = 'PATCH';
    case DELETE = 'DELETE';
    case HEAD = 'HEAD';
    case TRACE = 'TRACE';

}

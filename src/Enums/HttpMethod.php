<?php
declare(strict_types=1);

namespace Uicklv\LaravelMonobank\Enums;

enum HttpMethod: string
{
    case GET = 'GET';

    case POST = 'POST';
    case DELETE = 'DELETE';
}

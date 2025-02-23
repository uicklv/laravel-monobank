<?php
declare(strict_types=1);

namespace Uicklv\LaravelMonobank\Facades;

use Illuminate\Support\Facades\Facade;
use Uicklv\LaravelMonobank\Services\MonobankService;

class Monobank extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return MonobankService::class;
    }
}

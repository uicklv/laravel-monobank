<?php

namespace Uicklv\LaravelMonobank\Enums;

enum InitiationKind: string
{
    case MERCHANT = 'merchant';

    case CLIENT = 'client';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}

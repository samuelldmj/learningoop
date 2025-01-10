<?php

namespace Tests\DataProviders;

class RouterDataProvider
{
    // Make the method static
    public static function routeNotFoundCases(): array
    {
        return [
            ['/users', 'put'],
            ['/invoices', 'post'],
            ['/users', 'get'],
            ['/users', 'post']
        ];
    }
}


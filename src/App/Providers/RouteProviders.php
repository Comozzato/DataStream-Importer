<?php

declare(strict_types=1);

namespace App\Providers;


class RouteProviders
{
    public static function register()
    {
        require __DIR__ . '/../../routes/api.php';
    }
}

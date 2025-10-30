<?php

declare(strict_types=1);

namespace App\Providers;

use App\CassandraClient;
use App\Container;

class CassandraProvider
{
    public static function register()
    {
        Container::set('db', CassandraClient::getConnection());
    }
}

<?php

declare(strict_types=1);

namespace App;

use App\Providers\CassandraProvider;
use App\Providers\RouteProviders;

CassandraProvider::register();
RouteProviders::register();

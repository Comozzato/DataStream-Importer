<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';
use App\Server;

$server = new Server();
$server->start();

<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Core\MigrationRunner;
use App\Providers\CassandraProvider;

// 🔹 Registra os providers (como no bootstrap da aplicação web)
CassandraProvider::register();
echo "Cassandra provider registered.\n";
$action = $argv[1] ?? 'migrate';

if ($action === 'rollback') {
    MigrationRunner::rollback();
} else {
    echo "Running migrations...\n";
    MigrationRunner::run();
}

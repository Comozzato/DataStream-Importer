<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Core\MigrationCreator;

$name = $argv[1] ?? null;

if (!$name) {
    echo "❌ Você precisa informar o nome da migration.\n";
    echo "Exemplo: composer make:migration create_usuarios_table\n";
    exit(1);
}

MigrationCreator::make($name);

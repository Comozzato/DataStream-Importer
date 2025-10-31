<?php

declare(strict_types=1);

namespace App\Core;

use App\Container;

class MigrationRunner
{
    // Implementação do executor de migrações

    public static array $files = [];
    public static function run(): void
    {
        $db = Container::get('db');
        $migrationPath = __DIR__ . '/../../database/migrations';
        self::$files = glob($migrationPath . '/*.php');
        Self::createTableMigrations($db);
        Self::registerMigrations($db);
        foreach (self::$files as $file) {
            $migration = require $file;

            if (!method_exists($migration, 'up')) {
                echo "Migration inválida: {$file}\n";
                continue;
            }

            echo "Executando: {$file}\n";
            $query = $migration->up();

            if ($query) {
                $db->querySync($query);
            }
        }

        echo "✅ Todas as migrations foram executadas.\n";
    }

    public static function rollback(): void
    {
        $migrationPath = __DIR__ . '/../../database/migrations';
        $files = glob($migrationPath . '/*.php');

        foreach (array_reverse($files) as $file) {
            $migration = require $file;

            if (!method_exists($migration, 'down')) {
                echo "Migration inválida: {$file}\n";
                continue;
            }

            echo "Revertendo: {$file}\n";
            $migration->down();
        }

        echo "♻️ Rollback completo.\n";
    }


    private static function registerMigrations($db)
    {
        $query = <<<CQL
        SELECT migrate FROM migrations;
        CQL;
        $response = $db->querySync($query);
        $rows  = $response->fetchAll();    
        if (count($rows) === 0) {
            echo "Nenhuma linha retornada.\n";
        } else {
            foreach ($rows as $row) {
                var_dump($row);
            }
        }
    }

    private static function createTableMigrations($db)
    {
        $keyspace = config('app.cassandra.keyspace');
        $query = <<<CQL
                CREATE TABLE IF NOT EXISTS $keyspace.migrations (id int PRIMARY KEY,
                migrate text,
                step int
                );
       CQL;
        $db->querySync($query);
    }
}

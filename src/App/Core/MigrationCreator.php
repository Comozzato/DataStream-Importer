<?php

declare(strict_types=1);

namespace App\Core;

class MigrationCreator
{
    public static function make(string $name): void
    {
        $timestamp = date('Ymd_His');
        $filename = "{$timestamp}_{$name}.php";

        $migrationsPath = __DIR__ . '/../../database/migrations';

        if (!is_dir($migrationsPath)) {
            mkdir($migrationsPath, 0777, true);
        }

        $filepath = "{$migrationsPath}/{$filename}";

        $stub = self::getStub($name);

        file_put_contents($filepath, $stub);

        echo "✅ Migration criada: {$filepath}\n";
    }

    private static function getStub(string $name): string
    {
        $table = self::extractTableName($name);

        return <<<PHP
<?php

declare(strict_types=1);

use App\Container;
return new class {
    public function up(): void
    {
        
         public function up(): void
    {
        \$cassandra = Container::get('db');
        \$cassandra->querySync(<<<CQL
        
        CQL);
        echo "Tabela 'usuarios' criada com sucesso.\n";
    }

    public function down(): void
    {
        \$cassandra = Container::get('db');

        \$cassandra->querySync(<<<CQL
       
        CQL);
        echo "Tabela 'usuarios' removida.\n";
    }
};
PHP;
    }

    private static function extractTableName(string $name): string
    {
        // tenta extrair o nome da tabela a partir do nome da migration
        // ex: create_users_table → users
        if (preg_match('/create_(.+)_table/', $name, $matches)) {
            return $matches[1];
        }
        return $name;
    }
}

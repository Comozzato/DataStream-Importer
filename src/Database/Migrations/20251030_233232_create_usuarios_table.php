<?php

declare(strict_types=1);

return new class {
    public function up(): string
    {
        return <<<CQL
        CREATE TABLE IF NOT EXISTS teste.usuarios (
            id UUID PRIMARY KEY,
            nome text,
            created_at timestamp
        );
        CQL;
    }


    public function down(): string
    {
        return "
        DROP TABLE IF EXISTS teste.usuarios;
        ";
        echo "Tabela 'usuarios' removida.\n";
    }
};

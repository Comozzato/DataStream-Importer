<?php

declare(strict_types=1);

namespace App;

use Cassandra;

class CassandraClient
{
    private static ?Cassandra\Connection $connection = null;

    public static function getConnection(): Cassandra\Connection
    {
        if (self::$connection === null) {
            try {
                self::$connection = new Cassandra\Connection(
                    ['127.0.0.1'], // lista de hosts
                    'teste',       // keyspace
                    [
                        'port' => 9042,
                    ]
                );
            } catch (Cassandra\Exception $e) {
                echo "Erro ao conectar ao Cassandra: " . $e->getMessage() . "\n";
                exit(1);
            }
        }
        //echo "Conectado ao Cassandra com sucesso!\n";
        return self::$connection;
    }
}

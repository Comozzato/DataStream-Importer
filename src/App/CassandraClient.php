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
                    [config('app.cassandra.host')], // lista de hosts
                    config('app.cassandra.keyspace'),       // keyspace
                    [
                        'port' => config('app.cassandra.port'),
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

<?php

declare(strict_types=1);

namespace App;

class Server
{
    public function start(): void
    {
        $host = "0.0.0.0";
        $port = 9000;

        $sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        socket_bind($sock, $host, $port);
        socket_listen($sock);

        echo "Servidor rodando em $host:$port...\n";

        while (true) {
            $client = socket_accept($sock);
            $input = socket_read($client, 1024);

            echo "Recebido: $input\n";

            // Aqui futuramente vamos mandar para o Cassandra
            $resposta = "Dados recebidos com sucesso!";
            socket_write($client, $resposta, strlen($resposta));

            socket_close($client);
        }
    }
}

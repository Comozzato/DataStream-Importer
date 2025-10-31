<?php

require_once __DIR__ . '/../App/core/Env.php';

return [
    'app_env' => $_ENV['APP_ENV'] ?: 'production',
    'app_debug' => filter_var($_ENV['APP_DEBUG'], FILTER_VALIDATE_BOOLEAN),

    'cassandra' => [
        'host' => $_ENV['cassandra_host'],
        'port' => $_ENV['cassandra_port'],
        'keyspace' => $_ENV['cassandra_keyspace'],
    ],
];

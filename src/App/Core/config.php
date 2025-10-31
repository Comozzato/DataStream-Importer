<?php

declare(strict_types=1);

namespace App\Core;

class Config
{
    private static array $configs = [];


    private static function load(string $name): array
    {
        if (!isset(self::$configs[$name])) {
            $path = __DIR__ . "/../../config/{$name}.php";

            if (!file_exists($path)) {
                throw new \RuntimeException("Arquivo de configuração não encontrado: {$name}");
            }

            self::$configs[$name] = require $path;
        }

        return self::$configs[$name];
    }

    public static function get(string $key, mixed $default = null): mixed
    {
        $parts = explode('.', $key);
        $config = self::load($parts[0]);

        unset($parts[0]); // remove o nome do arquivo

        foreach ($parts as $part) {
            if (is_array($config) && array_key_exists($part, $config)) {
                $config = $config[$part];
            } else {
                return $default;
            }
        }

        return $config;
    }
}

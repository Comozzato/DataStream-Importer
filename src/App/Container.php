<?php

declare(strict_types=1);

namespace App;

class Container
{
    private static array $services = [];

    public static function set(string $name, $service): void
    {
        self::$services[$name] = $service;
    }
    public static function get(string $name)
    {
        return self::$services[$name] ?? null;
    }
}

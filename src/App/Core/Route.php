<?php

declare(strict_types=1);

namespace App\Core;

use Exception;

class Route
{
    public static array $routes = [
        'GET' => [],
        'POST' => [],
    ];

    public static function get(string $path, array $controllerAction): void
    {
        self::$routes['GET'][$path] = $controllerAction;
    }

    public static function post(string $path, array $controllerAction): void
    {
        self::$routes['POST'][$path] = $controllerAction;
    }

    function load(string $pathController, string $action)
    {
        try {
            if (!class_exists($pathController)) {
                throw new \Exception("O controller: {$pathController} não existe.");
            }

            $controllerInstance = new $pathController();
            if (!method_exists($controllerInstance, $action)) {
                throw new \Exception("O método: {$action} não existe no controller: {$pathController}");
            }
            $controllerInstance->$action((object)$_REQUEST);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public static function dispatch(string $uri, string $method): void
    {
        $path = parse_url($uri, PHP_URL_PATH);

        if (!isset(self::$routes[$method][$path])) {
            http_response_code(404);
            echo "404 Not Found";
            return;
        }

        [$controllerClass, $action] = self::$routes[$method][$path];

        try {
            if (!class_exists($controllerClass)) {
                throw new Exception("O controller {$controllerClass} não existe.");
            }

            $controllerInstance = new $controllerClass();

            if (!method_exists($controllerInstance, $action)) {
                throw new Exception("O método {$action} não existe no controller {$controllerClass}.");
            }

            // executa o método do controller
            $controllerInstance->$action((object)$_REQUEST);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

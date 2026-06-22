<?php

namespace App\Core;

use App\Core\Factory\ControllerFactory;

/**
 * Router (Front Controller).
 * Único ponto de entrada das requisições: lê os parâmetros "c" (controller)
 * e "a" (action) da URL, pede ao ControllerFactory o Controller correto
 * e executa a ação (método) correspondente.
 *
 * Exemplo de URL: /index.php?c=tasks&a=create
 */
class Router
{
    public function dispatch(): void
    {
        $controllerName = $_GET['c'] ?? 'auth';
        $action          = $_GET['a'] ?? 'showLogin';

        try {
            $controller = ControllerFactory::make($controllerName);
        } catch (\InvalidArgumentException $e) {
            http_response_code(404);
            echo 'Página não encontrada.';
            return;
        }

        if (!method_exists($controller, $action)) {
            http_response_code(404);
            echo 'Ação não encontrada.';
            return;
        }

        $controller->$action();
    }
}

<?php

/**
 * Front Controller — único ponto de entrada da aplicação.
 * Todas as requisições passam por aqui e são despachadas pelo Router
 * para o Controller/ação corretos (padrão MVC).
 */

session_start();

require __DIR__ . '/../app/Core/autoload.php';

use App\Core\Router;

$router = new Router();
$router->dispatch();

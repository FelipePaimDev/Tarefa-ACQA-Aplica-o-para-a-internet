<?php

namespace App\Core\Factory;

use App\Controllers\AuthController;
use App\Controllers\DashboardController;
use App\Controllers\TaskController;
use App\Core\Controller;
use InvalidArgumentException;

/**
 * DESIGN PATTERN: Factory Method
 *
 * Centraliza a lógica de criação dos Controllers em um único lugar.
 * O Router (front controller) não precisa conhecer os detalhes de
 * instanciação de cada Controller — apenas pede ao "fabricante" o
 * objeto certo a partir de um nome lógico (string vinda da URL).
 *
 * Isso facilita adicionar novos Controllers no futuro sem alterar
 * a lógica do Router, e evita um emaranhado de "if/else" ou "switch"
 * espalhado pelo código.
 */
class ControllerFactory
{
    public static function make(string $name): Controller
    {
        return match ($name) {
            'auth'      => new AuthController(),
            'dashboard' => new DashboardController(),
            'tasks'     => new TaskController(),
            default     => throw new InvalidArgumentException("Controller [{$name}] não encontrado."),
        };
    }
}

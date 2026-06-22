<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Task;

/**
 * Controller da página inicial (Dashboard).
 * Exibe a lista de tarefas do usuário autenticado.
 */
class DashboardController extends Controller
{
    public function index(): void
    {
        $this->requireAuth();

        $taskModel = new Task();
        $tarefas   = $taskModel->allByUser((int) $_SESSION['usuario_id']);

        $total      = count($tarefas);
        $concluidas = count(array_filter($tarefas, fn ($t) => $t['status'] === 'concluida'));

        $this->view('dashboard/index', [
            'tarefas'    => $tarefas,
            'total'      => $total,
            'concluidas' => $concluidas,
        ]);
    }
}

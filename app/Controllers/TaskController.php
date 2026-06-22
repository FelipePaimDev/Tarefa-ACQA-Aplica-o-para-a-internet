<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Task;

/**
 * Controller da tela própria do projeto: gerenciamento de Tarefas.
 * Implementa o CRUD completo exigido pela atividade.
 */
class TaskController extends Controller
{
    public function create(): void
    {
        $this->requireAuth();
        $this->view('tasks/create');
    }

    /** INSERÇÃO */
    public function store(): void
    {
        $this->requireAuth();

        $titulo    = trim($_POST['titulo'] ?? '');
        $descricao = trim($_POST['descricao'] ?? '');

        if ($titulo === '') {
            $this->view('tasks/create', ['erro' => 'O título é obrigatório.']);
            return;
        }

        (new Task())->create((int) $_SESSION['usuario_id'], $titulo, $descricao);

        $this->redirect('/index.php?c=dashboard&a=index');
    }

    /** SELEÇÃO (registro único, para edição) */
    public function edit(): void
    {
        $this->requireAuth();

        $id     = (int) ($_GET['id'] ?? 0);
        $tarefa = (new Task())->find($id, (int) $_SESSION['usuario_id']);

        if (!$tarefa) {
            $this->redirect('/index.php?c=dashboard&a=index');
        }

        $this->view('tasks/edit', ['tarefa' => $tarefa]);
    }

    /** ATUALIZAÇÃO */
    public function update(): void
    {
        $this->requireAuth();

        $id        = (int) ($_POST['id'] ?? 0);
        $titulo    = trim($_POST['titulo'] ?? '');
        $descricao = trim($_POST['descricao'] ?? '');
        $status    = $_POST['status'] ?? 'pendente';

        if ($titulo === '') {
            $tarefa = (new Task())->find($id, (int) $_SESSION['usuario_id']);
            $this->view('tasks/edit', ['tarefa' => $tarefa, 'erro' => 'O título é obrigatório.']);
            return;
        }

        (new Task())->update($id, (int) $_SESSION['usuario_id'], $titulo, $descricao, $status);

        $this->redirect('/index.php?c=dashboard&a=index');
    }

    /** REMOÇÃO */
    public function destroy(): void
    {
        $this->requireAuth();

        $id = (int) ($_POST['id'] ?? 0);
        (new Task())->delete($id, (int) $_SESSION['usuario_id']);

        $this->redirect('/index.php?c=dashboard&a=index');
    }
}

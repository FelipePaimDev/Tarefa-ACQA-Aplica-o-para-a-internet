<?php

namespace App\Core;

/**
 * Controller base.
 * Todos os Controllers da aplicação herdam daqui (parte da arquitetura MVC),
 * reaproveitando comportamentos comuns como renderizar views, redirecionar
 * e exigir autenticação.
 */
abstract class Controller
{
    /**
     * Renderiza um arquivo de View, passando os dados ($data) como
     * variáveis disponíveis dentro do template.
     */
    protected function view(string $view, array $data = []): void
    {
        extract($data);

        $viewFile = __DIR__ . "/../Views/{$view}.php";

        if (!file_exists($viewFile)) {
            die("View não encontrada: {$view}");
        }

        require $viewFile;
    }

    protected function redirect(string $path): void
    {
        header("Location: {$path}");
        exit;
    }

    /**
     * Bloqueia o acesso de usuários não autenticados,
     * redirecionando para a tela de login.
     */
    protected function requireAuth(): void
    {
        if (empty($_SESSION['usuario_id'])) {
            $this->redirect('/index.php?c=auth&a=showLogin');
        }
    }
}

<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;

/**
 * Controller responsável por cadastro, login e logout.
 */
class AuthController extends Controller
{
    public function showLogin(): void
    {
        $this->view('auth/login');
    }

    public function showRegister(): void
    {
        $this->view('auth/register');
    }

    public function register(): void
    {
        $nome  = trim($_POST['nome'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $senha = $_POST['senha'] ?? '';

        if ($nome === '' || $email === '' || $senha === '') {
            $this->view('auth/register', [
                'erro' => 'Preencha todos os campos.'
            ]);
            return;
        }

        if (strlen($senha) < 6) {
            $this->view('auth/register', [
                'erro' => 'A senha deve ter pelo menos 6 caracteres.'
            ]);
            return;
        }

        $userModel = new User();

        if ($userModel->findByEmail($email)) {
            $this->view('auth/register', [
                'erro' => 'Este e-mail já está cadastrado.'
            ]);
            return;
        }

        // bcrypt
        $hash = password_hash($senha, PASSWORD_BCRYPT);

        $userModel->create($nome, $email, $hash);

        // ✔ CORRETO (sem "/" no início)
        $this->redirect('index.php?c=auth&a=showLogin&registrado=1');
    }

    public function login(): void
    {
        $email = trim($_POST['email'] ?? '');
        $senha = $_POST['senha'] ?? '';

        $userModel = new User();
        $usuario = $userModel->findByEmail($email);

        if (!$usuario || !password_verify($senha, $usuario['senha'])) {
            $this->view('auth/login', [
                'erro' => 'E-mail ou senha inválidos.'
            ]);
            return;
        }

        session_regenerate_id(true);

        $_SESSION['usuario_id']   = $usuario['id'];
        $_SESSION['usuario_nome'] = $usuario['nome'];

        // ✔ CORRETO
        $this->redirect('index.php?c=dashboard&a=index');
    }

    public function logout(): void
    {
        $_SESSION = [];
        session_unset();
        session_destroy();

        // ✔ CORRETO
        $this->redirect('index.php?c=auth&a=showLogin');
    }
}
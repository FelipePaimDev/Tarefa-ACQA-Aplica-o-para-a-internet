<?php

namespace App\Models;

use App\Core\Model;

/**
 * Model responsável pela tabela "usuarios" (cadastro/login).
 */
class User extends Model
{
    public function findByEmail(string $email): array|false
    {
        $stmt = $this->db->prepare('SELECT * FROM usuarios WHERE email = :email LIMIT 1');
        $stmt->execute(['email' => $email]);

        return $stmt->fetch();
    }

    public function findById(int $id): array|false
    {
        $stmt = $this->db->prepare('SELECT * FROM usuarios WHERE id = :id LIMIT 1');
        $stmt->execute(['id' => $id]);

        return $stmt->fetch();
    }

    /**
     * Cria um novo usuário. A senha já deve chegar com o hash bcrypt
     * aplicado (ver AuthController::register).
     */
    public function create(string $nome, string $email, string $senhaHash): int
    {
        $stmt = $this->db->prepare(
            'INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)'
        );

        $stmt->execute([
            'nome'  => $nome,
            'email' => $email,
            'senha' => $senhaHash,
        ]);

        return (int) $this->db->lastInsertId();
    }
}

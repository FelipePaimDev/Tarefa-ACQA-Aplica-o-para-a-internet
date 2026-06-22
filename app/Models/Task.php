<?php

namespace App\Models;

use App\Core\Model;

/**
 * Model responsável pela tabela "tarefas".
 * Implementa o CRUD completo exigido pela atividade:
 * Create (create), Read (allByUser/find), Update (update), Delete (delete).
 *
 * Todas as consultas filtram por usuario_id para garantir que um usuário
 * nunca acesse ou altere tarefas de outro usuário.
 */
class Task extends Model
{
    /** READ (listagem) */
    public function allByUser(int $userId): array
    {
        $stmt = $this->db->prepare(
            'SELECT * FROM tarefas WHERE usuario_id = :uid ORDER BY criado_em DESC'
        );
        $stmt->execute(['uid' => $userId]);

        return $stmt->fetchAll();
    }

    /** READ (registro único) */
    public function find(int $id, int $userId): array|false
    {
        $stmt = $this->db->prepare(
            'SELECT * FROM tarefas WHERE id = :id AND usuario_id = :uid LIMIT 1'
        );
        $stmt->execute(['id' => $id, 'uid' => $userId]);

        return $stmt->fetch();
    }

    /** CREATE */
    public function create(int $userId, string $titulo, string $descricao): int
    {
        $stmt = $this->db->prepare(
            'INSERT INTO tarefas (usuario_id, titulo, descricao) VALUES (:uid, :titulo, :descricao)'
        );

        $stmt->execute([
            'uid'       => $userId,
            'titulo'    => $titulo,
            'descricao' => $descricao,
        ]);

        return (int) $this->db->lastInsertId();
    }

    /** UPDATE */
    public function update(int $id, int $userId, string $titulo, string $descricao, string $status): bool
    {
        $stmt = $this->db->prepare(
            'UPDATE tarefas
             SET titulo = :titulo, descricao = :descricao, status = :status
             WHERE id = :id AND usuario_id = :uid'
        );

        return $stmt->execute([
            'titulo'    => $titulo,
            'descricao' => $descricao,
            'status'    => $status,
            'id'        => $id,
            'uid'       => $userId,
        ]);
    }

    /** DELETE */
    public function delete(int $id, int $userId): bool
    {
        $stmt = $this->db->prepare('DELETE FROM tarefas WHERE id = :id AND usuario_id = :uid');

        return $stmt->execute(['id' => $id, 'uid' => $userId]);
    }
}

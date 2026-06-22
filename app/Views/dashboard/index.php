<?php require __DIR__ . '/../partials/header.php'; ?>

<div class="card">
    <div class="card-header">
        <div>
            <h1>Minhas tarefas</h1>
        </div>
        <a class="btn" href="/index.php?c=tasks&a=create">+ Nova tarefa</a>
    </div>

    <div class="stats">
        <span><strong><?= $total ?></strong> no total</span>
        <span><strong><?= $concluidas ?></strong> concluídas</span>
        <span><strong><?= $total - $concluidas ?></strong> pendentes</span>
    </div>

    <?php if (empty($tarefas)): ?>
        <div class="empty">
            <p>Você ainda não tem tarefas cadastradas.</p>
            <a class="btn" href="/index.php?c=tasks&a=create">Criar a primeira tarefa</a>
        </div>
    <?php else: ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Status</th>
                    <th>Criada em</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($tarefas as $tarefa): ?>
                <tr>
                    <td><?= htmlspecialchars($tarefa['titulo']) ?></td>
                    <td>
                        <span class="badge badge-<?= $tarefa['status'] ?>">
                            <?= $tarefa['status'] === 'concluida' ? 'Concluída' : 'Pendente' ?>
                        </span>
                    </td>
                    <td><?= htmlspecialchars(date('d/m/Y H:i', strtotime($tarefa['criado_em']))) ?></td>
                    <td>
                        <a href="/index.php?c=tasks&a=edit&id=<?= (int) $tarefa['id'] ?>">Editar</a>
                        &nbsp;·&nbsp;
                        <form method="POST" action="/index.php?c=tasks&a=destroy" style="display:inline"
                              onsubmit="return confirm('Excluir esta tarefa?');">
                            <input type="hidden" name="id" value="<?= (int) $tarefa['id'] ?>">
                            <button type="submit" class="link-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<?php require __DIR__ . '/../partials/footer.php'; ?>

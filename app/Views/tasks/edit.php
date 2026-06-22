<?php require __DIR__ . '/../partials/header.php'; ?>

<div class="card">
    <h1>Editar tarefa</h1>

    <?php if (!empty($erro)): ?>
        <p class="alert alert-error"><?= htmlspecialchars($erro) ?></p>
    <?php endif; ?>

    <form method="POST" action="/index.php?c=tasks&a=update">
        <input type="hidden" name="id" value="<?= (int) $tarefa['id'] ?>">

        <label>Título
            <input type="text" name="titulo" required autofocus
                   value="<?= htmlspecialchars($tarefa['titulo']) ?>">
        </label>
        <label>Descrição
            <textarea name="descricao" rows="4"><?= htmlspecialchars($tarefa['descricao'] ?? '') ?></textarea>
        </label>
        <label>Status
            <select name="status">
                <option value="pendente" <?= $tarefa['status'] === 'pendente' ? 'selected' : '' ?>>Pendente</option>
                <option value="concluida" <?= $tarefa['status'] === 'concluida' ? 'selected' : '' ?>>Concluída</option>
            </select>
        </label>
        <button type="submit">Atualizar tarefa</button>
        <a href="/index.php?c=dashboard&a=index">Cancelar</a>
    </form>
</div>

<?php require __DIR__ . '/../partials/footer.php'; ?>

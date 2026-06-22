<?php require __DIR__ . '/../partials/header.php'; ?>

<div class="card">
    <h1>Nova tarefa</h1>
    <p class="subtitle">Descreva o que precisa ser feito.</p>

    <?php if (!empty($erro)): ?>
        <p class="alert alert-error"><?= htmlspecialchars($erro) ?></p>
    <?php endif; ?>

    <form method="POST" action="/index.php?c=tasks&a=store">
        <label>Título
            <input type="text" name="titulo" required autofocus
                   value="<?= htmlspecialchars($_POST['titulo'] ?? '') ?>">
        </label>
        <label>Descrição
            <textarea name="descricao" rows="4"><?= htmlspecialchars($_POST['descricao'] ?? '') ?></textarea>
        </label>
        <button type="submit">Salvar tarefa</button>
        <a href="/index.php?c=dashboard&a=index">Cancelar</a>
    </form>
</div>

<?php require __DIR__ . '/../partials/footer.php'; ?>

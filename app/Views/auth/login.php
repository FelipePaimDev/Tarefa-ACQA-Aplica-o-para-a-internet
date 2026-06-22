<?php require __DIR__ . '/../partials/header.php'; ?>

<div class="card auth-card">
    <h1>Entrar</h1>
    <p class="subtitle">Acesse sua conta para ver suas tarefas.</p>

    <?php if (!empty($_GET['registrado'])): ?>
        <p class="alert alert-success">
            Cadastro realizado com sucesso! Faça login abaixo.
        </p>
    <?php endif; ?>

    <?php if (!empty($erro)): ?>
        <p class="alert alert-error">
            <?= htmlspecialchars($erro) ?>
        </p>
    <?php endif; ?>

    <form method="POST" action="index.php?c=auth&a=login">
        <label>
            E-mail
            <input
                type="email"
                name="email"
                required
                autofocus
            >
        </label>

        <label>
            Senha
            <input
                type="password"
                name="senha"
                required
            >
        </label>

        <button type="submit">
            Entrar
        </button>
    </form>

    <p style="margin-top:1.5rem; font-size:0.9rem;">
        Não tem conta?
        <a href="index.php?c=auth&a=showRegister">
            Cadastre-se
        </a>
    </p>
</div>

<?php require __DIR__ . '/../partials/footer.php'; ?>
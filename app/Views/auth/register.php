<?php require __DIR__ . '/../partials/header.php'; ?>

<div class="card auth-card">
    <h1>Criar conta</h1>

    <p class="subtitle">
        Leva menos de um minuto.
    </p>

    <?php if (!empty($erro)): ?>
        <p class="alert alert-error">
            <?= htmlspecialchars($erro) ?>
        </p>
    <?php endif; ?>

    <form method="POST" action="index.php?c=auth&a=register">

        <label>
            Nome
            <input
                type="text"
                name="nome"
                required
                autofocus
            >
        </label>

        <label>
            E-mail
            <input
                type="email"
                name="email"
                required
            >
        </label>

        <label>
            Senha
            <input
                type="password"
                name="senha"
                required
                minlength="6"
            >
        </label>

        <button type="submit">
            Cadastrar
        </button>

    </form>

    <p style="margin-top:1.5rem; font-size:0.9rem;">
        Já tem conta?
        <a href="index.php?c=auth&a=showLogin">
            Entrar
        </a>
    </p>

</div>

<?php require __DIR__ . '/../partials/footer.php'; ?>
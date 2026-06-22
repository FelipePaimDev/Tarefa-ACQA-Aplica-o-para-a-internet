<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Tarefas</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<header class="topbar">
    <div class="topbar-inner">
        <a href="/index.php?c=dashboard&a=index" class="brand">Fichário de Tarefas</a>
        <?php if (!empty($_SESSION['usuario_id'])): ?>
            <nav>
                <span>Olá, <?= htmlspecialchars($_SESSION['usuario_nome']) ?></span>
                <a href="/index.php?c=auth&a=logout">Sair</a>
            </nav>
        <?php endif; ?>
    </div>
</header>
<main class="container">

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Biblioteca</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Seu CSS adicional -->
    <link rel="stylesheet" href="/Sistema-de-biblioteca/css/style.css">
</head>
<body class="bg-light">

    <!-- Cabeçalho -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="index.php?route=home">Biblioteca</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php?route=home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?route=livro&action=index">Livros</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?route=exemplares&action=index">Exemplares</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?route=emprestimos&action=index">Empréstimos</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?route=usuarios&action=index">Usuários</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Conteúdo -->
    <main class="container bg-white p-4 rounded shadow-sm">
        <?php if (isset($content)) echo $content; ?>
    </main>

    <!-- Rodapé -->
    <footer class="text-center mt-4 text-muted">
        <p>&copy; <?= date('Y') ?> - Sistema de Biblioteca</p>
    </footer>

</body>
</html>
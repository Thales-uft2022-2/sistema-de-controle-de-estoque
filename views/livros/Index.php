<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Livros</title>
</head>
<body>
    <h1>Lista de Livros</h1>
    <a href="?route=livro&action=create">Adicionar Novo Livro</a>
    <br><br>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Ano</th>
                <th>Editora</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($livros as $livro): ?>
            <tr>
                <td><?php echo htmlspecialchars($livro['id']); ?></td>
                <td><?php echo htmlspecialchars($livro['titulo']); ?></td>
                <td><?php echo htmlspecialchars($livro['autor']); ?></td>
                <td><?php echo htmlspecialchars($livro['ano_publicacao']); ?></td>
                <td><?php echo htmlspecialchars($livro['editora']); ?></td>
            </tr>
            <?php endforeach; ?>
            <?php if (empty($livros)): ?>
            <tr>
                <td colspan="5">Nenhum livro encontrado.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Livro</title>
</head>
<body>
    <h1>Cadastrar Novo Livro</h1>
    <form action="?route=livro&action=store" method="POST">
        <label for="titulo">Título:</label><br>
        <input type="text" id="titulo" name="titulo" required><br><br>
        
        <label for="autor">Autor:</label><br>
        <input type="text" id="autor" name="autor" required><br><br>
        
        <label for="ano_publicacao">Ano de Publicação:</label><br>
        <input type="number" id="ano_publicacao" name="ano_publicacao"><br><br>
        
        <label for="editora">Editora:</label><br>
        <input type="text" id="editora" name="editora"><br><br>

        <button type="submit">Cadastrar</button>
    </form>
    <br>
    <a href="?route=livro&action=index">Ver todos os livros</a>
</body>
</html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Exemplar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2>Adicionar Novo Exemplar</h2>
            <hr>
            <form action="?controller=Exemplar&action=store" method="POST">
                
                <div class="form-group">
                    <label for="livro_id">Livro:</label>
                    <select class="form-control" id="livro_id" name="livro_id" required>
                        <option value="">Selecione um livro</option>
                        <?php 
                        while ($livro = $livros->fetch(PDO::FETCH_ASSOC)) : 
                        ?>
                        <option value="<?php echo htmlspecialchars($livro['id']); ?>">
                            <?php echo htmlspecialchars($livro['titulo']); ?>
                        </option>
                        <?php endwhile; ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="numero_tombo">Número de Tombo:</label>
                    <input type="text" class="form-control" id="numero_tombo" name="numero_tombo" required>
                </div>

                <div class="form-group">
                    <label for="estado_conservacao">Estado de Conservação:</label>
                    <select class="form-control" id="estado_conservacao" name="estado_conservacao" required>
                        <option value="">Selecione o estado</option>
                        <option value="Ótimo">Ótimo</option>
                        <option value="Bom">Bom</option>
                        <option value="Regular">Regular</option>
                        <option value="Danificado">Danificado</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Salvar Exemplar</button>
                <a href="?controller=Exemplar&action=index" class="btn btn-secondary">Voltar</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>
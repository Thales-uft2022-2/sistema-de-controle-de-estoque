<?php
// views/usuarios/edit.php
?>
<h1>Editar Usuário: <?php echo htmlspecialchars($usuario['nome']); ?></h1>

<form action="?route=usuario&action=update" method="POST">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($usuario['id']); ?>">
    
    <label for="nome">Nome:</label>
    <br>
    <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($usuario['nome']); ?>" required>
    <br><br>

    <label for="email">E-mail:</label>
    <br>
    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($usuario['email']); ?>" required>
    <br><br>

    <label for="tipo">Tipo:</label>
    <br>
    <select id="tipo" name="tipo" required>
        <option value="aluno" <?php echo ($usuario['tipo'] == 'aluno') ? 'selected' : ''; ?>>Aluno</option>
        <option value="professor" <?php echo ($usuario['tipo'] == 'professor') ? 'selected' : ''; ?>>Professor</option>
        <option value="bibliotecario" <?php echo ($usuario['tipo'] == 'bibliotecario') ? 'selected' : ''; ?>>Bibliotecário</option>
    </select>
    <br><br>

    <button type="submit">Atualizar</button>
</form>

<p><a href="?route=usuario&action=index">Voltar para a lista de usuários</a></p>

<?php
// Verifique se a variável de erro existe e a exiba
if (isset($mensagemErro)): ?>
    <div style="color: red; border: 1px solid red; padding: 10px; margin-bottom: 20px;">
        <?php echo $mensagemErro; ?>
    </div>
<?php endif; ?>

<h1>Adicionar Novo Usuário</h1>

<form action="?route=usuario&action=store" method="POST">
    <label for="nome">Nome:</label>
    <br>
    <input type="text" id="nome" name="nome" required>
    <br><br>

    <label for="email">E-mail:</label>
    <br>
    <input type="email" id="email" name="email" required>
    <br><br>

    <label for="senha">Senha:</label>
    <br>
    <input type="password" id="senha" name="senha" required>
    <br><br>

    <label for="tipo">Tipo:</label>
    <br>
    <select id="tipo" name="tipo" required>
        <option value="aluno">Aluno</option>
        <option value="professor">Professor</option>
        <option value="bibliotecario">Bibliotecário</option>
    </select>
    <br><br>

    <button type="submit">Salvar</button>
</form>

<p><a href="?route=usuario&action=index">Voltar para a lista de usuários</a></p>

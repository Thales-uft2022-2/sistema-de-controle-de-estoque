<?php
// views/usuarios/login.php
?>
<h1>Login</h1>

<form action="?route=usuario&action=authenticate" method="POST">
    <label for="email">E-mail:</label>
    <br>
    <input type="email" id="email" name="email" required>
    <br><br>
    
    <label for="senha">Senha:</label>
    <br>
    <input type="password" id="senha" name="senha" required>
    <br><br>

    <button type="submit">Entrar</button>
</form>

<p><a href="?route=home">Voltar para a Home</a></p>

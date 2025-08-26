<?php
// views/home.php

// verificando se a variável de sessão 'user_name' existe
$usuarioLogado = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : false;

// verificando se o login foi bem-sucedido (parâmetro na URL)
$loginSucesso = isset($_GET['login_success']) && $_GET['login_success'] == 'true';

?>

<h1>Bem-vindo ao Sistema de Biblioteca</h1>

<?php if ($loginSucesso && $usuarioLogado): ?>
    <div style="color: green; font-weight: bold; margin-bottom: 15px;">
        Login realizado com sucesso! Bem-vindo(a), <?php echo htmlspecialchars($usuarioLogado); ?>.
    </div>
<?php endif; ?>

<p>Use o menu ou acesse 
<?php if ($usuarioLogado): ?>
    <a href="?route=livro&action=index">Livros</a> | 
    <a href="?route=usuario&action=index">Usuários</a> |
    <a href="?route=usuario&action=logout">Sair</a>
<?php else: ?>
    <a href="?route=livro&action=index">Livros</a> |
    <a href="?route=usuario&action=login">Login</a>
<?php endif; ?>
</p>
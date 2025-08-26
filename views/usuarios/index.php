<?php
// views/usuarios/index.php
?>
<h1>Gerenciamento de Usuários</h1>
<p><a href="?route=usuario&action=create">Adicionar Novo Usuário</a></p>

<?php if (count($usuarios) > 0): ?>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Tipo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?php echo htmlspecialchars($usuario['id']); ?></td>
                    <td><?php echo htmlspecialchars($usuario['nome']); ?></td>
                    <td><?php echo htmlspecialchars($usuario['email']); ?></td>
                    <td><?php echo htmlspecialchars($usuario['tipo']); ?></td>
                    <td>
                        <a href="?route=usuario&action=edit&id=<?php echo $usuario['id']; ?>">Editar</a>
                        <a href="?route=usuario&action=delete&id=<?php echo $usuario['id']; ?>" onclick="return confirm('Tem certeza que deseja deletar este usuário?')">Deletar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Nenhum usuário cadastrado.</p>
<?php endif; ?>
<p><a href="?route=home">Voltar para a Home</a></p>

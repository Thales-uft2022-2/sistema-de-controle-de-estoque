<h2>Lista de Empréstimos</h2>
<a href="index.php?route=emprestimo&action=create">Novo Empréstimo</a>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Usuário</th>
        <th>Exemplar</th>
        <th>Data Empréstimo</th>
        <th>Data Devolução Prevista</th>
        <th>Data Devolução Realizada</th>
    </tr>

    <?php if (!empty($emprestimos)): ?>
        <?php foreach ($emprestimos as $e): ?>
            <tr>
                <td><?= $e['id'] ?></td>
                <td><?= $e['usuario_id'] ?></td>
                <td><?= $e['exemplar_id'] ?></td>
                <td><?= $e['data_emprestimo'] ?></td>
                <td><?= $e['data_devolucao_prevista'] ?></td>
                <td><?= $e['data_devolucao_realizada'] ?? '---' ?></td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="6">Nenhum empréstimo registrado ainda.</td>
        </tr>
    <?php endif; ?>
</table>

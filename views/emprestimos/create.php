<h2>Novo Empréstimo</h2>

<form method="POST" action="index.php?route=emprestimo&action=create">
    <label>ID Usuário:</label>
    <input type="number" name="usuario_id" required><br><br>

    <label>ID Exemplar:</label>
    <input type="number" name="exemplar_id" required><br><br>

    <label>Data de Devolução Prevista:</label>
    <input type="date" name="data_devolucao_prevista" required><br><br>

    <button type="submit">Registrar Empréstimo</button>
</form>

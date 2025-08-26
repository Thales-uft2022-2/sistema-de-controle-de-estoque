<?php
require_once  'Database.php';

class Emprestimo {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function listar() {
        $stmt = $this->conn->prepare("SELECT * FROM emprestimos");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function criar($usuario_id, $exemplar_id, $data_devolucao_prevista) {
        $stmt = $this->conn->prepare("
            INSERT INTO emprestimos (usuario_id, exemplar_id, data_emprestimo, data_devolucao_prevista)
            VALUES (?, ?, CURDATE(), ?)
        ");
        return $stmt->execute([$usuario_id, $exemplar_id, $data_devolucao_prevista]);
    }
}

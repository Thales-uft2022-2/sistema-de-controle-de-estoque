<?php
require_once 'Database.php';

class ReturnModel {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    // Registrar devolução
    public function returnBook($loan_id) {
        $sql = "UPDATE loans
                SET status = 'devolvido', devolvido_em = NOW()
                WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$loan_id]);
    }

    // Verificar se houve atraso e gerar multa
    public function checkFine($loan_id) {
        $sql = "SELECT previsto_para, devolvido_em 
                FROM loans WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$loan_id]);
        $loan = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($loan && $loan['devolvido_em'] > $loan['previsto_para']) {
            $dias_atraso = (strtotime($loan['devolvido_em']) - strtotime($loan['previsto_para'])) / (60*60*24);
            $valor = $dias_atraso * 2.00; // multa R$2 por dia
            $sql = "INSERT INTO fines (loan_id, valor_total, status) VALUES (?, ?, 'pendente')";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$loan_id, $valor]);
        }
    }
}

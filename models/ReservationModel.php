<?php
require_once 'Database.php';

class ReservationModel {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    // Criar uma reserva
    public function createReservation($book_id, $user_id) {
        $sql = "INSERT INTO reservations (book_id, user_id, criado_em, status, posicao_fila)
                VALUES (?, ?, NOW(), 'ativa',
                    (SELECT IFNULL(MAX(posicao_fila),0)+1 FROM reservations WHERE book_id = ?)
                )";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$book_id, $user_id, $book_id]);
    }

    // Buscar reservas ativas de um usuário
    public function getUserReservations($user_id) {
        $sql = "SELECT r.*, b.titulo 
                FROM reservations r
                JOIN books b ON r.book_id = b.id
                WHERE r.user_id = ? AND r.status = 'ativa'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

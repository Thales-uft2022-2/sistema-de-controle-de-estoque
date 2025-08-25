<?php
require_once 'models/ReservationModel.php';

class ReservationController {
    private $model;

    public function __construct() {
        $this->model = new ReservationModel();
    }

    public function create($book_id, $user_id) {
        if ($this->model->createReservation($book_id, $user_id)) {
            echo "Reserva criada com sucesso!";
        } else {
            echo "Erro ao criar reserva.";
        }
    }
}

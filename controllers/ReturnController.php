<?php
require_once 'models/ReturnModel.php';

class ReturnController {
    private $model;

    public function __construct() {
        $this->model = new ReturnModel();
    }

    public function devolver($loan_id) {
        if ($this->model->returnBook($loan_id)) {
            $this->model->checkFine($loan_id);
            echo "Devolução registrada!";
        } else {
            echo "Erro ao registrar devolução.";
        }
    }
}

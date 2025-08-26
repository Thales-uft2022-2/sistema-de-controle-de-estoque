<?php
require_once __DIR__ . '/../models/Emprestimo.php';

class EmprestimoController {
    private $model;

    public function __construct() {
        $this->model = new Emprestimo();
    }

    public function index() {
        $emprestimos = $this->model->listar();
        include __DIR__ . '/../views/emprestimos/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario_id = $_POST['usuario_id'];
            $exemplar_id = $_POST['exemplar_id'];
            $data_devolucao_prevista = $_POST['data_devolucao_prevista'];

            $this->model->criar($usuario_id, $exemplar_id, $data_devolucao_prevista);

            header("Location: index.php?route=emprestimo&action=index");
            exit;
        }
        include __DIR__ . '/../views/emprestimos/create.php';
    }
}

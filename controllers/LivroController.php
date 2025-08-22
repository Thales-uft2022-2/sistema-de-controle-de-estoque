<?php
// controllers/LivroController.php

require_once 'Database.php';
require_once 'models/Livro.php';

class LivroController {
    private $livro;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->livro = new Livro($db);
    }

    // Exibe a lista de todos os livros
    public function index() {
        $stmt = $this->livro->read();
        $livros = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include 'views/livros/index.php';
    }

    // Exibe o formulário para criar um novo livro
    public function create() {
        include 'views/livros/create.php';
    }

    // Processa o formulário de criação de livro
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->livro->titulo = $_POST['titulo'];
            $this->livro->autor = $_POST['autor'];
            $this->livro->ano_publicacao = $_POST['ano_publicacao'];
            $this->livro->editora = $_POST['editora'];

            if ($this->livro->create()) {
                // Redireciona para a página de listagem após o sucesso
                header("Location: " . BASE_URL . "?route=livro&action=index");
                exit;
            } else {
                echo "Erro ao cadastrar o livro.";
            }
        }
    }
}
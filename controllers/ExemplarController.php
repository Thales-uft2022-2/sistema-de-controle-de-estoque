<?php

include_once 'config.php';
include_once 'Database.php';
include_once 'models/Exemplar.php';
include_once 'models/Livro.php';

class ExemplarController {
    private $exemplar;
    private $livro;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->exemplar = new Exemplar($db);
        $this->livro = new Livro($db);
    }

    public function index() {
        $stmt = $this->exemplar->read();
        include 'views/exemplares/index.php';
    }

    public function create() {
        $livros = $this->livro->read(); // Para exibir a lista de livros no formulário
        include 'views/exemplares/create.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->exemplar->livro_id = $_POST['livro_id'];
            $this->exemplar->numero_tombo = $_POST['numero_tombo'];
            $this->exemplar->estado_conservacao = $_POST['estado_conservacao'];
            $this->exemplar->disponibilidade = 'Disponível'; // Exemplo: padrão 'Disponível'

            if ($this->exemplar->create()) {
                header("Location: /exemplares?success=1");
                exit();
            } else {
                header("Location: /exemplares?error=1");
                exit();
            }
        }
    }

    public function edit($id) {
        $this->exemplar->id = $id;
        $this->exemplar->readOne();
        $livros = $this->livro->read();
        include 'views/exemplares/edit.php';
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->exemplar->id = $_POST['id'];
            $this->exemplar->livro_id = $_POST['livro_id'];
            $this->exemplar->numero_tombo = $_POST['numero_tombo'];
            $this->exemplar->estado_conservacao = $_POST['estado_conservacao'];
            $this->exemplar->disponibilidade = $_POST['disponibilidade'];
    
            if ($this->exemplar->update()) {
                header("Location: /exemplares?success_update=1");
                exit();
            } else {
                header("Location: /exemplares?error_update=1");
                exit();
            }
        }
    }

    public function delete($id) {
        $this->exemplar->id = $id;
        if ($this->exemplar->delete()) {
            header("Location: /exemplares?success_delete=1");
            exit();
        } else {
            header("Location: /exemplares?error_delete=1");
            exit();
        }
    }
}
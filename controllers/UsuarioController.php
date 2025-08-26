<?php
// controllers/UsuarioController.php

require_once __DIR__ . '/../models/Usuario.php';

class UsuarioController {
    private $usuario;

    public function __construct() {
        $this->usuario = new Usuario();
    }

    // Ação para listar todos os usuários (rota: ?route=usuario&action=index)
    public function index() {
        $stmt = $this->usuario->listar();
        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
        require_once __DIR__ . '/../views/usuarios/index.php';
    }

    // Ação para exibir o formulário de criação (rota: ?route=usuario&action=create)
    public function create() {
        require_once __DIR__ . '/../views/usuarios/create.php';
    }

    // Ação para salvar um novo usuário (rota: ?route=usuario&action=store)
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->usuario->nome = $_POST['nome'];
            $this->usuario->email = $_POST['email'];
            $this->usuario->senha = $_POST['senha'];
            $this->usuario->tipo = $_POST['tipo'];

            if ($this->usuario->criar()) {
                // Sucesso
                header("Location: ?route=usuario&action=index");
                exit();
            } else {
                // Falha
                $mensagemErro = "Erro ao criar o usuário. O e-mail informado já está em uso.";
                // AQUI, você pode passar a mensagem para a sua view
                require_once __DIR__ . '/../views/usuarios/create.php';
            }
        }
    }
    // Ação para exibir o formulário de edição (rota: ?route=usuario&action=edit&id=...)
    public function edit() {
        if (isset($_GET['id'])) {
            $usuario = $this->usuario->buscarPorId($_GET['id']);
            if ($usuario) {
                require_once __DIR__ . '/../views/usuarios/edit.php';
            } else {
                echo "Usuário não encontrado.";
            }
        } else {
            echo "ID do usuário não fornecido.";
        }
    }

    // Ação para atualizar um usuário (rota: ?route=usuario&action=update)
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->usuario->id = $_POST['id'];
            $this->usuario->nome = $_POST['nome'];
            $this->usuario->email = $_POST['email'];
            $this->usuario->tipo = $_POST['tipo'];

            if ($this->usuario->atualizar()) {
                header("Location: ?route=usuario&action=index");
                exit();
            } else {
                echo "Erro ao atualizar o usuário.";
            }
        }
    }

    // Ação para deletar um usuário (rota: ?route=usuario&action=delete&id=...)
    public function delete() {
        if (isset($_GET['id'])) {
            $this->usuario->id = $_GET['id'];
            if ($this->usuario->deletar()) {
                header("Location: ?route=usuario&action=index");
                exit();
            } else {
                echo "Erro ao deletar o usuário.";
            }
        }
    }

    // Ação para exibir o formulário de login (rota: ?route=usuario&action=login)
    public function login() {
        require_once __DIR__ . '/../views/usuarios/login.php';
    }

    public function logout() {
        // Inicia a sessão se ainda não estiver iniciada
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        // Limpa todas as variáveis de sessão
        $_SESSION = array();

        // Destrói a sessão
        session_destroy();
        
        // Redireciona para a página inicial
        header("Location: ?route=home");
        exit();
    }

    // Ação para processar o login (rota: ?route=usuario&action=authenticate)
    public function authenticate() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $this->usuario->email = $_POST['email'];
        $this->usuario->senha = $_POST['senha'];

        if ($this->usuario->login()) {
            // Login bem-sucedido: Armazene as informações do usuário na sessão
            $_SESSION['user_id'] = $this->usuario->id;
            $_SESSION['user_name'] = $this->usuario->nome;
            $_SESSION['user_type'] = $this->usuario->tipo;

            // Redirecione para a página inicial com a mensagem de sucesso
            header("Location: ?route=home&login_success=true");
            exit();
        } else {
            // Login falhou
            echo "E-mail ou senha incorretos.";
        }
    }
}
}
?>

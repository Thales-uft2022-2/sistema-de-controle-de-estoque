<?php
// models/Usuario.php

require_once __DIR__ . '/../Database.php';

class Usuario {
    private $conn;
    private $table_name = "usuarios";

    public $id;
    public $nome;
    public $email;
    public $senha;
    public $tipo;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Método para listar todos os usuários
    public function listar() {
        $query = "SELECT id, nome, email, tipo FROM " . $this->table_name . " ORDER BY nome ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Método para buscar um único usuário por ID
    public function buscarPorId($id) {
        $query = "SELECT id, nome, email, tipo FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para criar um novo usuário
    public function criar() {
        try {
            $query = "INSERT INTO " . $this->table_name . " SET nome=:nome, email=:email, senha=:senha, tipo=:tipo";
            $stmt = $this->conn->prepare($query);

            // Limpeza dos dados
            $this->nome = htmlspecialchars(strip_tags($this->nome));
            $this->email = htmlspecialchars(strip_tags($this->email));
            $this->senha = htmlspecialchars(strip_tags($this->senha));
            $this->tipo = htmlspecialchars(strip_tags($this->tipo));

            // Criptografar a senha
            $this->senha = password_hash($this->senha, PASSWORD_DEFAULT);

            // Bind dos valores
            $stmt->bindParam(":nome", $this->nome);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":senha", $this->senha);
            $stmt->bindParam(":tipo", $this->tipo);

            if ($stmt->execute()) {
                return true;
            }

        } catch (PDOException $e) {
            // Captura o erro de duplicação (código 23000)
            if ($e->getCode() == '23000') {
                // Este é o código específico para "violação de restrição de integridade"
                // Você pode logar o erro para depuração
                // error_log("Erro de duplicação de e-mail: " . $e->getMessage());
                return false; // Retorna falso se o e-mail já existir
            }
            // Para outros erros, relance a exceção ou lide com eles
            throw $e;
        }

        return false;
    }


    // Método para atualizar um usuário
    public function atualizar() {
        $query = "UPDATE " . $this->table_name . " SET nome=:nome, email=:email, tipo=:tipo WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->tipo = htmlspecialchars(strip_tags($this->tipo));

        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":tipo", $this->tipo);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Método para deletar um usuário
    public function deletar() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(1, $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Método para validar login
    public function login() {
        $query = "SELECT id, nome, senha, tipo FROM " . $this->table_name . " WHERE email = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->email);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($this->senha, $usuario['senha'])) {
            $this->id = $usuario['id'];
            $this->nome = $usuario['nome'];
            $this->tipo = $usuario['tipo'];
            return true;
        }
        return false;
    }
}
?>

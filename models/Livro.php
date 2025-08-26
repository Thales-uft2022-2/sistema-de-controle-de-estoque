<?php
// models/Livro.php

class Livro {
    private $conn;
    private $table_name = "livros";

    public $id;
    public $titulo;
    public $autor;
    public $ano_publicacao;
    public $editora;
    public $criado_em;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para ler todos os livros
    public function read() {
        $query = "SELECT id, titulo, autor, ano_publicacao, editora FROM " . $this->table_name . " ORDER BY titulo ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Método para criar um novo livro
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (titulo, autor, ano_publicacao, editora) VALUES (:titulo, :autor, :ano_publicacao, :editora)";

        $stmt = $this->conn->prepare($query);

        // Limpeza dos dados
        $this->titulo = htmlspecialchars(strip_tags($this->titulo));
        $this->autor = htmlspecialchars(strip_tags($this->autor));
        $this->ano_publicacao = htmlspecialchars(strip_tags($this->ano_publicacao));
        $this->editora = htmlspecialchars(strip_tags($this->editora));

        // Vincular os valores
        $stmt->bindParam(":titulo", $this->titulo);
        $stmt->bindParam(":autor", $this->autor);
        $stmt->bindParam(":ano_publicacao", $this->ano_publicacao);
        $stmt->bindParam(":editora", $this->editora);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }
}
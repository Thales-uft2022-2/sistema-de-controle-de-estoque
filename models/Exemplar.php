<?php

class Exemplar {
    public $id;
    public $livro_id;
    public $numero_tombo;
    public $estado_conservacao;
    public $disponibilidade;

    private $conn;
    private $table_name = "exemplares";

    public function __construct($db){
        $this->conn = $db;
    }

    // Método para criar um novo exemplar
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET livro_id=:livro_id, numero_tombo=:numero_tombo, estado_conservacao=:estado_conservacao, disponibilidade=:disponibilidade";
        
        $stmt = $this->conn->prepare($query);

        // Limpeza de dados (para evitar injeção de SQL)
        $this->livro_id = htmlspecialchars(strip_tags($this->livro_id));
        $this->numero_tombo = htmlspecialchars(strip_tags($this->numero_tombo));
        $this->estado_conservacao = htmlspecialchars(strip_tags($this->estado_conservacao));
        $this->disponibilidade = htmlspecialchars(strip_tags($this->disponibilidade));

        // Vinculação dos valores
        $stmt->bindParam(":livro_id", $this->livro_id);
        $stmt->bindParam(":numero_tombo", $this->numero_tombo);
        $stmt->bindParam(":estado_conservacao", $this->estado_conservacao);
        $stmt->bindParam(":disponibilidade", $this->disponibilidade);

        if($stmt->execute()){
            return true;
        }

        return false;
    }

    // Método para ler todos os exemplares
    public function read() {
        $query = "SELECT 
                    e.id, e.numero_tombo, e.estado_conservacao, e.disponibilidade, l.titulo as titulo_livro
                  FROM 
                    " . $this->table_name . " e
                  LEFT JOIN
                    livros l ON e.livro_id = l.id
                  ORDER BY
                    e.id DESC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // Método para buscar um único exemplar
    public function readOne(){
        $query = "SELECT 
                    e.id, e.numero_tombo, e.estado_conservacao, e.disponibilidade, l.titulo as titulo_livro
                  FROM 
                    " . $this->table_name . " e
                  LEFT JOIN
                    livros l ON e.livro_id = l.id
                  WHERE
                    e.id = ?
                  LIMIT
                    0,1";
    
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
    
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        $this->livro_id = $row['titulo_livro']; // Note: Estamos pegando o título do livro para exibição
        $this->numero_tombo = $row['numero_tombo'];
        $this->estado_conservacao = $row['estado_conservacao'];
        $this->disponibilidade = $row['disponibilidade'];
    }

    // Método para atualizar um exemplar
    public function update() {
        $query = "UPDATE
                    " . $this->table_name . "
                  SET
                    livro_id = :livro_id,
                    numero_tombo = :numero_tombo,
                    estado_conservacao = :estado_conservacao,
                    disponibilidade = :disponibilidade
                  WHERE
                    id = :id";
    
        $stmt = $this->conn->prepare($query);
    
        // Limpeza de dados
        $this->livro_id = htmlspecialchars(strip_tags($this->livro_id));
        $this->numero_tombo = htmlspecialchars(strip_tags($this->numero_tombo));
        $this->estado_conservacao = htmlspecialchars(strip_tags($this->estado_conservacao));
        $this->disponibilidade = htmlspecialchars(strip_tags($this->disponibilidade));
        $this->id = htmlspecialchars(strip_tags($this->id));
    
        // Vinculação dos valores
        $stmt->bindParam(':livro_id', $this->livro_id);
        $stmt->bindParam(':numero_tombo', $this->numero_tombo);
        $stmt->bindParam(':estado_conservacao', $this->estado_conservacao);
        $stmt->bindParam(':disponibilidade', $this->disponibilidade);
        $stmt->bindParam(':id', $this->id);
    
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }

    // Método para deletar um exemplar
    public function delete(){
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
    
        $stmt = $this->conn->prepare($query);
    
        // Limpeza de dados
        $this->id = htmlspecialchars(strip_tags($this->id));
    
        // Vinculação do ID
        $stmt->bindParam(1, $this->id);
    
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }
}
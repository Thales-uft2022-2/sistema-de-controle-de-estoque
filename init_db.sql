-- init_db.sql - Script para criar a estrutura do banco de dados da biblioteca

-- Criação da tabela usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    tipo VARCHAR(50) NOT NULL, -- Ex: 'aluno', 'professor', 'bibliotecario'
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Criação da tabela livros
CREATE TABLE livros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    autor VARCHAR(255) NOT NULL,
    ano_publicacao INT,
    editora VARCHAR(255),
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Criação da tabela exemplares (cópias de livros)
CREATE TABLE exemplares (
    id INT AUTO_INCREMENT PRIMARY KEY,
    livro_id INT NOT NULL,
    codigo_barras VARCHAR(255) NOT NULL UNIQUE,
    status VARCHAR(50) NOT NULL, -- Ex: 'disponivel', 'emprestado', 'reservado', 'danificado'
    FOREIGN KEY (livro_id) REFERENCES livros(id)
);

-- Criação da tabela emprestimos
CREATE TABLE emprestimos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    exemplar_id INT NOT NULL,
    usuario_id INT NOT NULL,
    data_emprestimo DATE NOT NULL,
    data_devolucao_prevista DATE NOT NULL,
    data_devolucao_realizada DATE,
    FOREIGN KEY (exemplar_id) REFERENCES exemplares(id),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

-- Criação da tabela reservas
CREATE TABLE reservas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    livro_id INT NOT NULL,
    usuario_id INT NOT NULL,
    data_reserva DATE NOT NULL,
    status VARCHAR(50) NOT NULL, -- Ex: 'ativa', 'cancelada', 'finalizada'
    FOREIGN KEY (livro_id) REFERENCES livros(id),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);
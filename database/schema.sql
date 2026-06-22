-- Banco de dados do projeto ACQA (PHP + MySQL + MVC + Design Patterns)
-- Curso: Sistemas da Informação | Aluno: Felipe Almeida Pires | RA: 1171140-1

CREATE DATABASE IF NOT EXISTS php_mvc_tarefas
    CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE php_mvc_tarefas;

-- Tabela de usuários (cadastro/login)
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,        -- hash bcrypt (password_hash)
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Tabela de tarefas (CRUD completo: inserção, seleção, atualização, remoção)
CREATE TABLE IF NOT EXISTS tarefas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    titulo VARCHAR(150) NOT NULL,
    descricao TEXT,
    status ENUM('pendente', 'concluida') NOT NULL DEFAULT 'pendente',
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    atualizado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
) ENGINE=InnoDB;

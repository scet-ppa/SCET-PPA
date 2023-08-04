-- Criação da tabela de usuários
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    senha VARCHAR(100) NOT NULL
);

-- Inserção de dados de exemplo
INSERT INTO usuarios (nome, email, senha)
VALUES ('Fulano da Silva', 'fulano@example.com', 'senha123'),
       ('Ciclana Souza', 'ciclana@example.com', 'outrasenha456');

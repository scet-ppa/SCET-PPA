-- Criação da tabela de usuários
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,

);

-- Inserção de dados de exemplo
INSERT INTO usuarios (nome, email, senha)
VALUES ('Fulano da Silva', 'fulano@example.com', 'senha123'),
       ('Ciclana Souza', 'ciclana@example.com', 'outrasenha456');

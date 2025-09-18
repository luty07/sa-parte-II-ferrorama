CREATE DATABASE railtrack_db;
USE railtrack_db;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(120) NOT NULL UNIQUE,
    senha VARCHAR(100) NOT NULL
);

CREATE TABLE trens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    codigo VARCHAR(20) NOT NULL UNIQUE,
    modelo VARCHAR(50),
    capacidade INT
);

CREATE TABLE rotas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    origem VARCHAR(100) NOT NULL,
    destino VARCHAR(100) NOT NULL,
    distancia_km INT
);

CREATE TABLE manutencao (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_trem INT NOT NULL,
    descricao VARCHAR(255),
    data DATE,
    FOREIGN KEY (id_trem) REFERENCES trens(id)
);

CREATE TABLE alertas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    mensagem VARCHAR(255) NOT NULL,
    data TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO usuarios (nome, email, senha) VALUES
('Maria', 'maria@email.com', '1234'),
('João', 'joao@email.com', 'abcd');

INSERT INTO trens (codigo, modelo, capacidade) VALUES
('T001', 'Modelo A', 300),
('T002', 'Modelo B', 250);

INSERT INTO rotas (origem, destino, distancia_km) VALUES
('Setor 1', 'Setor 3', 50),
('Setor 4', 'Setor 2', 70);

INSERT INTO manutencao (id_trem, descricao, data) VALUES
(1, 'Acidente', '2025-09-01'),
(2, 'Check-up', '2025-09-05');

INSERT INTO alertas (mensagem) VALUES
('Novo horário para o trajeto Setor 2 ➤ Setor 5 a partir de 01/05.'),
('Setor 5 ➤ Setor 1 terá um atraso de aproximadamente 15 minutos.'),
('Setor 1 ➤ Setor 3 chega à plataforma em 5 min.'),
('Relatório do dia 28/03 disponível na aba Relatório e análises.');

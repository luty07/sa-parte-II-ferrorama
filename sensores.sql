CREATE DATABASE sensores;
USE sensores;

CREATE TABLE sensor (
    id_sensor INT AUTO_INCREMENT PRIMARY KEY,
    tipo VARCHAR(50),
    descricao VARCHAR(100),
    status VARCHAR(20)
);

CREATE TABLE dados (
    id_dado INT AUTO_INCREMENT PRIMARY KEY,
    id_sensor INT,
    valor DECIMAL(10,2),
    data_hora DATETIME,
    FOREIGN KEY (id_sensor) REFERENCES sensor(id_sensor)
);

INSERT INTO sensor (tipo, descricao, status) VALUES
('Temperatura', 'Sensor de temperatura dos freios', 'Ativo'),
('Vibracao', 'Sensor de vibração do motor', 'Ativo');

INSERT INTO dados (id_sensor, valor, data_hora) VALUES
(1, 75.3, '2025-09-25 10:00:00'),
(1, 80.1, '2025-09-25 10:05:00'),
(2, 0.02, '2025-09-25 10:00:00'),
(2, 0.05, '2025-09-25 10:05:00');
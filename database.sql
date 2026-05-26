CREATE DATABASE construccion_db;
USE construccion_db;

CREATE TABLE calculos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    largo DECIMAL(10,2),
    ancho DECIMAL(10,2),
    alto DECIMAL(10,2),
    cemento DECIMAL(10,2),
    arena DECIMAL(10,2),
    blockes DECIMAL(10,2),
    total DECIMAL(10,2),
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
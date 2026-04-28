CREATE DATABASE IF NOT EXISTS tareas_db;
USE tareas_db;

CREATE TABLE IF NOT EXISTS usuarios (
id INT NOT NULL AUTO_INCREMENT,
usuario VARCHAR(50),
password VARCHAR(255),
rol ENUM('admin','user','observador','supervisor'),
PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS tareas (
id INT NOT NULL AUTO_INCREMENT,
texto VARCHAR(20),
estado VARCHAR(20),
autor VARCHAR(100),
tema VARCHAR(100),
fecha_limite DATE,
prioridad INT DEFAULT 2,
PRIMARY KEY (id)
);

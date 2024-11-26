CREATE DATABASE IF NOT EXISTS tfphpgrupo10;

USE tfphpgrupo10;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR (60) NOT NULL,
    apellido VARCHAR (60) NOT NULL,
    email VARCHAR (60) NOT NULL UNIQUE,
    usuario VARCHAR (60) NOT NULL UNIQUE,
    clave VARCHAR (255) NOT NULL,
    imagen TEXT DEFAULT 'http://echo-grupo-diez.wuaze.com/assets/images/pngtree-users.png',
    activo INT DEFAULT 1
);

CREATE TABLE IF NOT EXISTS turnos(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR (60) NOT NULL,
    apellido VARCHAR (60) NOT NULL,
    tramite VARCHAR (60) NOT NULL,
    fecha DATE NOT NULL,
    horario TIME NOT NULL,
    id_cliente INT NOT NULL
);

INSERT INTO turnos VALUES 
(NULL,'Jorge','Martinez','Facturación','2025-01-17','18:00:00',1),
(NULL,'Aldo','Gimenez','Impuestos','2025-01-05','14:00:00',2),
(NULL,'Jorge','Martinez','Sellados','2025-02-20','13:30:00',1),
(NULL,'Aldo','Gimenez','Facturación','2025-03-20','17:00:00',2),
(NULL,'Jorge','Martinez','Impuestos','2025-03-20','17:45:00',1),
(NULL,'Aldo','Gimenez','Infracciones','2025-02-03','10:00:00',2),
(NULL,'Jorge','Martinez','Patentes','2025-04-03','18:00:00',1),
(NULL,'Aldo','Gimenez','Sellados','2025-04-17','09:00:00',2),
(NULL,'Jorge','Martinez','VTV','2025-05-17','13:00:00',1),
(NULL,'Aldo','Gimenez','VTV','2025-05-17','13:30:00',2);

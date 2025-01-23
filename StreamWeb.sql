drop database if exists StreamWeb;
create database StreamWeb;
use StreamWeb;

create table clientes(
	id_cliente int auto_increment primary key,
    nombre varchar(50),
    apellido varchar(50),
    email varchar(50),
    telefono varchar(50),
    edad int not null
);

create table inscripcion(
	id_factura int auto_increment primary key,
    id_cliente int,
	plan set("Basico", "Estandar", "Premium"),
    pack set("Deporte", "Cine", "Infantil"),
    duracion set("Mensual", "Anual"),
    FOREIGN KEY (id_cliente) REFERENCES clientes(id_cliente)
);


-- insertar los clientes
INSERT INTO clientes (nombre, apellido, email, telefono, edad) VALUES
('Juan', 'Pérez', 'juan.perez@email.com', '555-1234', 28),
('Ana', 'Gómez', 'ana.gomez@email.com', '555-2345', 35),
('Luis', 'Rodríguez', 'luis.rodriguez@email.com', '555-3456', 42),
('María', 'Hernández', 'maria.hernandez@email.com', '555-4567', 25),
('Carlos', 'López', 'carlos.lopez@email.com', '555-5678', 38),
('Sofía', 'Martínez', 'sofia.martinez@email.com', '555-6789', 31),
('Pedro', 'García', 'pedro.garcia@email.com', '555-7890', 27),
('Laura', 'Fernández', 'laura.fernandez@email.com', '555-8901', 40),
('David', 'Sánchez', 'david.sanchez@email.com', '555-9012', 22),
('Elena', 'Ramírez', 'elena.ramirez@email.com', '555-0123', 34),
('Raúl', 'Vázquez', 'raul.vazquez@email.com', '555-1111', 26),
('Carmen', 'Jiménez', 'carmen.jimenez@email.com', '555-2222', 29),
('José', 'Morales', 'jose.morales@email.com', '555-3333', 37),
('Marta', 'Ruiz', 'marta.ruiz@email.com', '555-4444', 30),
('Andrés', 'González', 'andres.gonzalez@email.com', '555-5555', 33),
('Isabel', 'Álvarez', 'isabel.alvarez@email.com', '555-6666', 28),
('Ricardo', 'Díaz', 'ricardo.diaz@email.com', '555-7777', 41),
('Patricia', 'Muñoz', 'patricia.munoz@email.com', '555-8888', 36),
('Francisco', 'Pérez', 'francisco.perez@email.com', '555-9999', 39),
('Beatriz', 'Castro', 'beatriz.castro@email.com', '555-0000', 25),
('Antonio', 'Ortíz', 'antonio.ortiz@email.com', '555-1112', 45),
('Natalia', 'Vega', 'natalia.vega@email.com', '555-1234', 32),
('Javier', 'Moreno', 'javier.moreno@email.com', '555-2345', 28),
('Cristina', 'Herrera', 'cristina.herrera@email.com', '555-3456', 29),
('Samuel', 'Serrano', 'samuel.serrano@email.com', '555-4567', 26),
('Raquel', 'Torres', 'raquel.torres@email.com', '555-5678', 31);

-- insertar las inscripciones
INSERT INTO inscripcion (id_cliente, plan, pack, duracion) VALUES
(1, 'Basico', 'Deporte', 'Mensual'),
(2, 'Estandar', 'Cine', 'Anual'),
(3, 'Premium', 'Infantil', 'Mensual'),
(4, 'Basico', 'Deporte', 'Anual'),
(5, 'Estandar', 'Deporte', 'Mensual'),
(6, 'Premium', 'Cine', 'Anual'),
(7, 'Basico', 'Infantil', 'Mensual'),
(8, 'Estandar', 'Cine', 'Mensual'),
(9, 'Premium', 'Deporte', 'Anual'),
(10, 'Basico', 'Deporte', 'Mensual'),
(11, 'Estandar', 'Deporte', 'Mensual'),
(12, 'Premium', 'Cine', 'Mensual'),
(13, 'Basico', 'Infantil', 'Anual'),
(14, 'Estandar', 'Deporte', 'Anual'),
(15, 'Premium', 'Infantil', 'Mensual'),
(16, 'Basico', 'Cine', 'Mensual'),
(17, 'Estandar', 'Deporte', 'Mensual'),
(18, 'Premium', 'Cine', 'Anual'),
(19, 'Basico', 'Deporte', 'Anual'),
(20, 'Estandar', 'Cine', 'Mensual'),
(21, 'Premium', 'Infantil', 'Anual'),
(22, 'Basico', 'Deporte', 'Mensual'),
(23, 'Estandar', 'Deporte', 'Anual'),
(24, 'Premium', 'Cine', 'Mensual'),
(25, 'Basico', 'Infantil', 'Anual');

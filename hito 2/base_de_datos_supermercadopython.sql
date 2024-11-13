drop database if exists SupermercadoPyton;
create database SupermercadoPyton;
use SupermercadoPyton;

CREATE TABLE producto (
    idproducto int primary key,
    nombre varchar(150),
    medida varchar(100),
    precio int,
    stock int
);

create table cliente (
    idcliente int auto_increment primary key,
    dni varchar(9),
    nombre varchar(100),
    apellido varchar(100),
    tlf varchar(25),
    direccion varchar(200),
    ciudad varchar(50)
);

CREATE TABLE pedido(
    idpedido int auto_increment primary key,
    idcliente int,
    fecha date,
    foreign key (idcliente) references cliente(idcliente)
);

create table detalle(
idpedido int,
    idproducto int,
    cantidad int default 1,
    precio decimal(10,2),
    foreign key (idpedido) references pedido(idpedido),
    foreign key (idproducto) references producto(idproducto)
);

INSERT INTO producto (idproducto, nombre, medida, precio, stock) VALUES
(1, 'Coca-Cola', 'Lata 330ml', 1, 150),
(2, 'Pepsi', 'Lata 330ml', 1, 200),
(3, 'Agua Mineral', 'Botella 500ml', 1, 300),
(4, 'Fanta', 'Lata 330ml', 1, 100),
(5, 'Sprite', 'Lata 330ml', 1, 180),
(6, 'Red Bull', 'Lata 250ml', 2, 80),
(7, 'Té Frío', 'Botella 500ml', 1, 220),
(8, 'Jugos Naturales', 'Botella 1L', 2, 150),
(9, 'Cerveza', 'Botella 500ml', 2, 120),
(10, 'Aceite de Oliva Extra Virgen', 'Botella 1L', 3, 100),
(11, 'Vinagre de Vino', 'Botella 500ml', 2, 140),
(12, 'Salsa de Tomate', 'Botella 500ml', 2, 180),
(13, 'Salsa Soja', 'Botella 250ml', 3, 90),
(14, 'Mayonesa', 'Frasco 500g', 2, 160),
(15, 'Mostaza', 'Frasco 250g', 1, 210),
(16, 'Ketchup', 'Botella 1L', 2, 200),
(17, 'Azúcar Blanca', 'Paquete 1kg', 2, 250),
(18, 'Harina de Trigo', 'Saco 1kg', 2, 120),
(19, 'Levadura en Polvo', 'Sobre 10g', 1, 180),
(20, 'Cacao en Polvo', 'Paquete 200g', 3, 130),
(21, 'Chocolate en Tableta', 'Tableta 100g', 2, 220),
(22, 'Manteca', 'Paquete 500g', 3, 100),
(23, 'Mermelada de Fresa', 'Frasco 250g', 2, 160),
(24, 'Galletas', 'Paquete 400g', 2, 200),
(25, 'Leche Entera', 'Botella 1L', 1, 180),
(26, 'Yogurt Natural', 'Envase 500g', 1, 220),
(27, 'Leche Desnatada', 'Botella 1L', 1, 210),
(28, 'Queso Manchego', 'Pieza 500g', 5, 100),
(29, 'Queso Mozzarella', 'Bolsa 300g', 3, 130),
(30, 'Mantequilla', 'Paquete 250g', 3, 160),
(31, 'Nata para Montar', 'Tetra Pak 200ml', 2, 140),
(32, 'Crema de Leche', 'Envase 500ml', 2, 180),
(33, 'Arroz Blanco', 'Paquete 1kg', 1, 300),
(34, 'Avena', 'Paquete 500g', 2, 250),
(35, 'Maíz en Grano', 'Paquete 1kg', 2, 200),
(36, 'Harina de Maíz', 'Saco 500g', 2, 230),
(37, 'Lentejas', 'Paquete 500g', 2, 300),
(38, 'Frijoles', 'Paquete 500g', 2, 280),
(39, 'Garbanzos', 'Paquete 500g', 2, 250),
(40, 'Pasta de Tomate', 'Lata 400g', 1, 200);

INSERT INTO cliente (dni, nombre, apellido, tlf, direccion, ciudad) VALUES
('12345678A', 'Juan', 'Pérez', '612345678', 'Calle Falsa 123', 'Madrid'),
('23456789B', 'María', 'Gómez', '623456789', 'Avenida de la Paz 45', 'Barcelona'),
('34567890C', 'Luis', 'López', '634567890', 'Calle Mayor 20', 'Sevilla'),
('45678901D', 'Ana', 'Martínez', '645678901', 'Paseo de Gracia 11', 'Valencia'),
('56789012E', 'Carlos', 'Hernández', '656789012', 'Ronda Norte 56', 'Zaragoza'),
('67890123F', 'Laura', 'García', '667890123', 'Calle del Sol 78', 'Madrid'),
('78901234G', 'José', 'Rodríguez', '678901234', 'Callejón de las Flores 22', 'Alicante'),
('89012345H', 'Isabel', 'Sánchez', '689012345', 'Calle Luna 33', 'Granada'),
('90123456I', 'David', 'Martín', '690123456', 'Calle del Mar 44', 'Bilbao'),
('01234567J', 'Patricia', 'Fernández', '601234567', 'Avenida de Andalucía 100', 'Málaga'),
('12345678K', 'Marta', 'Jiménez', '612345678', 'Calle de la Luna 56', 'Madrid'),
('23456789L', 'Ricardo', 'Ruiz', '623456789', 'Calle del Sol 21', 'Barcelona'),
('34567890M', 'Elena', 'Álvarez', '634567890', 'Callejón del Agua 12', 'Valencia'),
('45678901N', 'Antonio', 'Méndez', '645678901', 'Plaza Mayor 8', 'Sevilla'),
('56789012O', 'Carmen', 'Moreno', '656789012', 'Calle Nueva 5', 'Zaragoza'),
('67890123P', 'Fernando', 'González', '667890123', 'Avenida Libertad 22', 'Bilbao'),
('78901234Q', 'Sofía', 'Hernández', '678901234', 'Calle San Juan 76', 'Alicante'),
('89012345R', 'Pedro', 'Vázquez', '689012345', 'Calle de la Estrella 34', 'Granada'),
('90123456S', 'Verónica', 'Pérez', '690123456', 'Paseo de la Castellana 67', 'Madrid'),
('01234567T', 'Raúl', 'Martínez', '601234567', 'Calle de los Olivos 55', 'Valencia');

INSERT INTO pedido (idcliente, fecha) VALUES
(1, '2024-11-11'),
(2, '2024-11-11'),
(3, '2024-11-11'),
(4, '2024-11-11'),
(5, '2024-11-11'),
(6, '2024-11-11'),
(7, '2024-11-11'),
(8, '2024-11-11'),
(9, '2024-11-11'),
(10, '2024-11-11'),
(11, '2024-11-11'),
(12, '2024-11-11'),
(13, '2024-11-11'),
(14, '2024-11-11'),
(15, '2024-11-11'),
(16, '2024-11-11'),
(17, '2024-11-11'),
(18, '2024-11-11'),
(19, '2024-11-11'),
(20, '2024-11-11');

INSERT INTO detalle (idpedido, idproducto, cantidad, precio) VALUES (1, 1, 2, 1.00);
INSERT INTO detalle (idpedido, idproducto, cantidad, precio) VALUES (1, 2, 1, 1.00);
INSERT INTO detalle (idpedido, idproducto, cantidad, precio) VALUES (2, 3, 3, 1.00);
INSERT INTO detalle (idpedido, idproducto, cantidad, precio) VALUES (2, 4, 2, 1.00);
INSERT INTO detalle (idpedido, idproducto, cantidad, precio) VALUES (3, 5, 1, 1.00);
INSERT INTO detalle (idpedido, idproducto, cantidad, precio) VALUES (3, 6, 2, 2.00);
INSERT INTO detalle (idpedido, idproducto, cantidad, precio) VALUES (4, 7, 1, 1.00);
INSERT INTO detalle (idpedido, idproducto, cantidad, precio) VALUES (4, 8, 1, 2.00);
INSERT INTO detalle (idpedido, idproducto, cantidad, precio) VALUES (5, 9, 1, 2.00);
INSERT INTO detalle (idpedido, idproducto, cantidad, precio) VALUES (5, 10, 1, 3.00);
INSERT INTO detalle (idpedido, idproducto, cantidad, precio) VALUES (6, 11, 1, 2.00);
INSERT INTO detalle (idpedido, idproducto, cantidad, precio) VALUES (6, 12, 2, 2.00);
INSERT INTO detalle (idpedido, idproducto, cantidad, precio) VALUES (7, 13, 1, 3.00);
INSERT INTO detalle (idpedido, idproducto, cantidad, precio) VALUES (7, 14, 1, 2.00);
INSERT INTO detalle (idpedido, idproducto, cantidad, precio) VALUES (8, 15, 1, 1.00);
INSERT INTO detalle (idpedido, idproducto, cantidad, precio) VALUES (8, 16, 1, 2.00);
INSERT INTO detalle (idpedido, idproducto, cantidad, precio) VALUES (9, 17, 1, 2.00);
INSERT INTO detalle (idpedido, idproducto, cantidad, precio) VALUES (9, 18, 1, 1.00);
INSERT INTO detalle (idpedido, idproducto, cantidad, precio) VALUES (10, 19, 1, 1.00);
INSERT INTO detalle (idpedido, idproducto, cantidad, precio) VALUES (10, 20, 2, 3.00);
INSERT INTO detalle (idpedido, idproducto, cantidad, precio) VALUES (11, 21, 1, 2.00);
INSERT INTO detalle (idpedido, idproducto, cantidad, precio) VALUES (11, 22, 1, 2.00);
INSERT INTO detalle (idpedido, idproducto, cantidad, precio) VALUES (12, 23, 3, 2.00);
INSERT INTO detalle (idpedido, idproducto, cantidad, precio) VALUES (12, 24, 2, 1.00);
INSERT INTO detalle (idpedido, idproducto, cantidad, precio) VALUES (13, 25, 1, 1.00);
INSERT INTO detalle (idpedido, idproducto, cantidad, precio) VALUES (13, 26, 1, 2.00);
INSERT INTO detalle (idpedido, idproducto, cantidad, precio) VALUES (14, 27, 1, 1.00);
INSERT INTO detalle (idpedido, idproducto, cantidad, precio) VALUES (14, 28, 1, 5.00);
INSERT INTO detalle (idpedido, idproducto, cantidad, precio) VALUES (15, 29, 1, 3.00);
INSERT INTO detalle (idpedido, idproducto, cantidad, precio) VALUES (15, 30, 2, 3.00);
INSERT INTO detalle (idpedido, idproducto, cantidad, precio) VALUES (16, 31, 2, 2.00);
INSERT INTO detalle (idpedido, idproducto, cantidad, precio) VALUES (16, 32, 1, 2.00);
INSERT INTO detalle (idpedido, idproducto, cantidad, precio) VALUES (17, 33, 1, 1.00);
INSERT INTO detalle (idpedido, idproducto, cantidad, precio) VALUES (17, 34, 1, 2.00);
INSERT INTO detalle (idpedido, idproducto, cantidad, precio) VALUES (18, 35, 1, 1.00);
INSERT INTO detalle (idpedido, idproducto, cantidad, precio) VALUES (18, 36, 2, 2.00);
INSERT INTO detalle (idpedido, idproducto, cantidad, precio) VALUES (19, 37, 1, 2.00);
INSERT INTO detalle (idpedido, idproducto, cantidad, precio) VALUES (19, 38, 1, 2.00);
INSERT INTO detalle (idpedido, idproducto, cantidad, precio) VALUES (20, 39, 2, 2.00);
INSERT INTO detalle (idpedido, idproducto, cantidad, precio) VALUES (20, 40, 1, 1.00);
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
    pack enum("Deporte", "Cine", "Infantil"),
    duracion set("Mensual", "Anual"),
    FOREIGN KEY (id_cliente) REFERENCES clientes(id_cliente)
);


INSERT INTO clientes (nombre, apellido, email, edad)
VALUES ("a", "sad", "sand@mskalfd", 15);
INSERT INTO inscripcion (id_cliente, plan, pack, duracion)
VALUES (1, "Premium", "Deporte, Cine", "Anual");

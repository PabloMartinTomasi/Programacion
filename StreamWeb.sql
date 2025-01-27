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


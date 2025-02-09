DROP DATABASE IF EXISTS gestion_tareas;
CREATE DATABASE gestion_tareas;
USE gestion_tareas;

create table usuarios(
	id_usuario int auto_increment primary key,
    usuario varchar(100) unique not null,
    telefono varchar(9) unique not null,
    email varchar(100) unique not null,
    contrasena varchar(100) not null
);

create table tareas(
	id_tarea int auto_increment primary key,
    id_usuario int,
    nombre_tarea varchar(100) not null,
    descripcion_tarea varchar(200) not null,
    estado_tarea enum("En proceso", "Completada") not null,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
);

insert into usuarios(usuario, telefono, email, contrasena) VALUES
("juan", 123456, "juan@ejemplo.com", "12lola");

insert into tareas(id_usuario, nombre_tarea, descripcion_tarea, estado_tarea) VALUES
(1, "hacer colada", "secar la ropa", "Completada");


insert into usuarios(usuario, telefono, email, contrasena) VALUES
("ma", 562, "juaan@ejemplo.com", "12lolaa"),
("maa", 5462, "jauaan@ejemplo.com", "12loala");


insert into tareas(id_usuario, nombre_tarea, descripcion_tarea, estado_tarea) 
select id_usuario, 'hacera la colada', 'secara la ropa', 'Completada'
from usuarios
WHERE id_usuario = 1;




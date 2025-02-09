DROP DATABASE IF EXISTS gestion_tareas;
CREATE DATABASE gestion_tareas;
USE gestion_tareas;

create table usuarios(
    nombre_usuario varchar(100) unique not null primary key,
    telefono varchar(9) unique not null,
    email varchar(100) unique not null,
    contrasena varchar(100) not null
);

create table tareas(
id_tarea int auto_increment primary key,
    nombre_tarea varchar(100) not null,
    descripcion_tarea varchar(200) not null,
    estado_tarea enum("En proceso", "Completada") not null
);
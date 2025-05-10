DROP DATABASE IF EXISTS gestion_tareas;
CREATE DATABASE gestion_tareas;
USE gestion_tareas;

create table usuarios(
	email varchar(100) unique not null primary key,
    usuario varchar(100) unique not null,
    contrasena varchar(100) not null
);

create table tareas(
	id_tarea int auto_increment primary key,
    email varchar(100),
    nombre_tarea varchar(100) NOT NULL,
    descripcion_tarea varchar(200) NOT NULL,
    estado_tarea enum("En proceso", "Completada") NOT NULL,
    FOREIGN KEY (email) REFERENCES usuarios(email)
);







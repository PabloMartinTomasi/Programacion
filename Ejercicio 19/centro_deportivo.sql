drop database if exists Centro_Deportivo;
create database Centro_Deportivo;
use Centro_Deportivo;

create table clientes(
	id_cliente int auto_increment primary key,
    nombre varchar(50),
    edad int,
    tipo_membresia varchar(20)
);

create table entrenadores(
	id_entrenador int auto_increment primary key,
    nombre_entrenador varchar(50),
    especialidad varchar(50)
);

create table actividades(
	id_actividad int auto_increment primary key,
    nombre_actividad varchar(50),
    horario varchar (50),
    duracion int,
    id_entrenador int,
    foreign key (id_entrenador) references entrenadores(id_entrenador)
); 

create table inscripciones(
	id_inscripcion int auto_increment primary key,
    id_cliente int,
    id_actividad int,
    foreign key (id_cliente) references clientes(id_cliente),
    foreign key (id_actividad) references actividades(id_actividad)
);


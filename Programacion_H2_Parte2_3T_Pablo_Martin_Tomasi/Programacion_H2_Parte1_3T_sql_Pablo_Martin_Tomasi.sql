CREATE DATABASE hitocine;
USE hitocine;

create table categoria(
    idCategoria int primary key,
    categoria varchar(100) not null
);

create table peliculas (
    idPelicula int PRIMARY key,
    titulo varchar(100) not null,
    duracionMin int not null,
    director varchar(100) not null,
    idCategoria int,
    aniPublicacion date,
    foreign key (idCategoria) references categoria(idCategoria)
);

INSERT INTO categoria (idCategoria, categoria) VALUES
(1, 'Acción'),
(2, 'Aventura'),
(3, 'Animación'),
(4, 'Ciencia ficción'),
(5, 'Comedia'),
(6, 'Crimen'),
(7, 'Terror'),
(8, 'Drama'),
(9, 'Fantasía'),
(10, 'Histórica');

INSERT INTO peliculas (idPelicula, titulo, duracionMin, director, idCategoria, aniPublicacion) VALUES
(1, 'Piratas del Caribe: La maldición del Perla Negra', 143, 'Gore Verbinski', 2, '2003-07-09'),
(2, 'Indiana Jones y los cazadores del arca perdida', 115, 'Steven Spielberg', 2, '1981-06-12'),
(3, 'Terminator 2: El juicio final', 137, 'James Cameron', 1, '1991-07-03'),
(4, 'Interestelar', 169, 'Christopher Nolan', 4, '2014-11-07'),
(5, 'El resplandor', 146, 'Stanley Kubrick', 7, '1980-05-23'),
(6, 'El Padrino', 175, 'Francis Ford Coppola', 6, '1972-03-24'),
(7, 'El conjuro', 112, 'James Wan', 7, '2013-07-19'),
(8, 'Harry Potter y la piedra filosofal', 152, 'Chris Columbus', 9, '2001-11-16'),
(9, 'El Señor de los Anillos: La Comunidad del Anillo', 178, 'Peter Jackson', 9, '2001-12-19'),
(10, 'La lista de Schindler', 195, 'Steven Spielberg', 10, '1993-12-15');

USE recetas;

CREATE TABLE recetas (
	id				int PRIMARY KEY auto_increment,
	nombre			varchar(100) NOT NULL,
	ingredientes	text,
	preparacion		text,
	rendimiento		varchar(50),
	tiempo_prep		varchar(50),
	imagen			varchar(200),
	autor_id		int NOT NULL
);

CREATE TABLE usuarios (
	id			int PRIMARY KEY auto_increment,
	nombre		varchar(50),
	apellidos	varchar(100),
	email		varchar(100) NOT NULL UNIQUE,
	imagen		varchar(200),
	password	varchar(255) NOT NULL
);

CREATE TABLE comentarios (
	id 			int PRIMARY KEY auto_increment,
	receta_id	int NOT NULL,
	usuario_id	int NOT NULL,
	comentario	text
);

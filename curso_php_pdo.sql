drop database if exists curso_pdo;
create database curso_pdo;

use curso_pdo;

create table alunos( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL, 
    nota INT(6) NOT NULL
);

insert into alunos (nome, nota ) 
values
( 'Arthur Conan', 10 ),
( 'Machado de Assis', 9 ),
( 'Oscar Wilde', 8 ),
( 'Clarice Linspector', 7 ),
( 'Graciliano Ramos', 7 ),
( 'Carlos Drumond', 5 ),
( 'Guimarães Rosa', 5 ),
( 'Jorge Amado', 6 ),
( 'Paulo Coelho', 3 ),
( 'Oswald de Andrade', 5 ),
( 'Castro Alves', 2 ),
( 'Manoel Bandeira', 3 ),
( 'Mario de Andrade', 6 ),
( 'Mario Quintana', 5 ),
( 'Ariano Suassuna', 3 ),
( 'Luis Fernando Verissimo', 10 ),
( 'Érico Verissimo', 2 ),
( 'Monteiro Lobato', 8 ),
( 'Nelson Rodrigues', 5 ),
( 'Rachel de Queiroz', 5 ),
( 'Álvares de Azevedo', 6);

CREATE TABLE usuarios (
id INT NOT NULL AUTO_INCREMENT,
nome VARCHAR(100) NOT NULL,
username VARCHAR(30) NOT NULL UNIQUE,
senha VARCHAR(255) NOT NULL,
must_change_password int(11) DEFAULT '0',
admin int(11) DEFAULT NULL,
UNIQUE KEY username (username)
PRIMARY KEY (id)
);
#Usuário admin, senha = admin
INSERT INTO usuarios (`id`, `nome`, `username`, `senha`, `must_change_password`, `admin`) 
VALUES ('1', 'Adminsitrador', 'admin', 
'$2y$10$aqdGOAJR2/lU6Ovgu9i9we3n3koixHjZ01XnCjY8sTH7s1.my6U3a', 1, 1 );


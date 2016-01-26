create database curso_pdo;

use curso_pdo;

create table alunos( id int auto_increment Primary Key ,nome varchar(255), nota int );

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
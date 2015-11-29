create database curso_pdo;

use curso_pdo;

create table alunos( id int auto_increment Primary Key ,nome varchar(255), nota int );

insert into alunos (nome, nota ) 
values
( 'Evandro', 10 ),
( 'Leandro', 9 ),
( 'Simone', 8 ),
( 'Selma', 7 ),
( 'Luzia', 7 ),
( 'Paloma', 5 ),
( 'Ciclano', 5 ),
( 'Fulano', 6 ),
( 'Marcos', 3 ),
( 'Maria', 5 ),
( 'João', 2 ),
( 'Antônio', 3 ),
( 'Mario', 6 ),
( 'Maria Joaquina', 5 ),
( 'Cirilo', 3 ),
( 'Mgyver', 10 ),
( 'Madalena', 2 ),
( 'Chucky Noris', 8 ),
( 'Silvester Stalone', 5 ),
( 'Jean Claude Van Dame', 5 ),
( 'Arnold Schuazneger', 6);
create schema ppa; 
use ppa; 
drop schema ppa; 

create table aluno(
	id_aluno integer auto_increment key, 
    id_curso integer,
    foreign key (id_curso) references curso(id_curso),
    nome varchar(50) not null, 
    matricula int(20),
    email varchar(80),
    senha varchar(25)
);

alter table aluno add column turma varchar (10); 
alter table curso drop column id_aluno; 
alter table curso drop constraint curso_ibfk_2; 
alter table aluno add column id_curso integer; 
alter table aluno add constraint foreign key (id_curso) references curso(id_curso); 
alter table coordenador drop column id_usuario; 
alter table coordenador drop constraint coordenador_ibfk_1;

create table coordenador(
	id_coordenador integer auto_increment primary key, 
    nome varchar(50) not null, 
    email varchar(80),
    senha varchar(25)
); 
    
create table professor(
	id_professor integer auto_increment primary key, 
    nome varchar(50) not null, 
    matricula int(20),
    email varchar(80),
    senha varchar(25) 
); 

create table curso(
	id_curso integer auto_increment primary key,
    descricao varchar(25)
);

create table curso_coord( 
	id_curso_coord integer auto_increment primary key, 
    id_curso integer,
    foreign key (id_curso) references curso(id_curso), 
    id_coordenador integer,
    foreign key (id_coordenador) references coordenador(id_coordenador)
); 

select * from curso; 
select * from coordenador; 
select * from aluno; 

insert into coordenador(nome, email, senha) values("nicholas", "nick@gmail.com", "123"); 
insert into curso(id_curso, id_coordenador, descricao) values( 1, 1, "Informatica"); 
create schema ppa; 
use ppa; 
drop schema ppa; 

create table usuario(
	id_usuario integer auto_increment primary key, 
    nome varchar(50) not null, 
    email varchar(80),
    senha varchar(25)
); 

create table aluno(
	id_usuario integer auto_increment key, 
    foreign key (id_usuario)references usuario(id_usuario),
    nome varchar(50) not null, 
    matricula int(20),
    email varchar(80),
    senha varchar(25)
);

create table coordenador(
	id_usuario integer auto_increment primary key, 
    foreign key (id_usuario)references usuario(id_usuario), 
    nome varchar(50) not null, 
    email varchar(80),
    senha varchar(25)
); 
    
create table professor(
	id_usuario integer auto_increment primary key, 
    foreign key (id_usuario)references usuario(id_usuario),
    nome varchar(50) not null, 
    matricula int(20),
    email varchar(80),
    senha varchar(25) 
); 

create table curso(
	id_curso integer auto_increment primary key,
    id_coordenador integer, 
    foreign key (id_coordenador)references coordenador(id_usuario),
    id_aluno integer, 
    foreign key (id_aluno)references aluno(id_usuario),
    descricao varchar(25)
);
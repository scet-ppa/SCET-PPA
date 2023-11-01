create schema ppa; 
use ppa; 
drop schema ppa; 
create schema teste; 
drop schema teste; 

create table usuario(
	id_usuario integer auto_increment primary key, 
    descricao varchar(25)
);

insert into usuario(descricao) values("Coordenador");
insert into usuario(descricao) values("Professor");
insert into usuario(descricao) values("Aluno");

create table aluno(
	id_aluno integer auto_increment key, 
    id_curso integer,
    foreign key (id_curso) references curso(id_curso),
    nome varchar(50) not null, 
    matricula int(20),
    email varchar(80),
    senha varchar(25)
);

alter table nota drop column valor; 
alter table nota add column nota numeric(4,2); 
alter table estagio add column id_avalia_aluno integer; 
alter table estagio add constraint foreign key (id_avalia_aluno) references avaliacao_aluno(id_avalia_aluno); 
alter table estagio add column id_avalia_prof integer;
alter table estagio add constraint foreign key (id_avalia_prof) references avaliacao_prof(id_avalia_prof); 
alter table estagio add column id_avalia_emp integer;
alter table estagio add constraint foreign key (id_avalia_emp) references avaliacao_empresa(id_avalia_emp); 
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

create table tcc(
	id_tcc integer auto_increment primary key,
    id_aluno integer,
    foreign key (id_aluno) references aluno(id_aluno),
    id_professor integer,
    foreign key (id_professor) references professor(id_professor),
    situacao varchar (20) not null,
    tema varchar (50),
    relatorio varchar (40)
);

create table apresentacao(
	id_apresentacao integer auto_increment primary key,
	id_tcc integer, 
    foreign key (id_tcc) references tcc(id_tcc), 
    datas varchar (10)
);

create table avaliação(
	id_avaliacao integer auto_increment primary key, 
    id_apresentacao integer, 
	foreign key (id_apresentacao) references apresentacao(id_apresentacao), 
    orientador integer, 
    foreign key (orientador) references professor(id_professor), 
    banca integer, 
    foreign key (banca) references professor(id_professor), 
    descricao varchar (35)
);

create table nota(
	id_nota integer auto_increment primary key, 
    valor numeric (4,2), 
    descricao varchar (50)
); 

create table estagio(
	id_estagio integer auto_increment primary key, 
    orientador integer, 
    foreign key (orientador) references professor(id_professor), 
    id_aluno integer, 
    foreign key (id_aluno) references aluno(id_aluno), 
    id_empresa integer, 
    foreign key (id_empresa) references empresa(id_empresa), 
    data_inicio int(20), 
    prev_termino int(20), 
    situacao varchar(15)
);

create table avaliacao_aluno(
	id_avalia_aluno integer auto_increment primary key,
    nota numeric (4,2)
); 

create table avaliacao_prof(
	id_avalia_prof integer auto_increment primary key,
    nota numeric (4,2)
); 

create table avaliacao_empresa(
	id_avalia_emp integer auto_increment primary key,
    nota numeric (4,2)
); 

create table empresa(
	id_empresa integer auto_increment primary key, 
    nome varchar(50)
);

select * from usuario; 
select * from curso; 
select * from coordenador; 
select * from aluno; 
select * from professor; 

insert into coordenador(nome, email, senha) values("nicholas", "nick@gmail.com", "123"); 
insert into curso(id_curso, id_coordenador, descricao) values( 1, 1, "Informatica"); 
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
	id_curso integer,
    foreign key (id_curso) references curso(id_curso), 
    id_coordenador integer,
    foreign key (id_coordenador) references coordenador(id_coordenador),
	primary key(id_curso, id_coordenador)
); 

create table tcc(
	id_tcc integer auto_increment primary key,
    id_aluno integer,
    foreign key (id_aluno) references aluno(id_aluno),
    id_professor integer,
    foreign key (id_professor) references professor(id_professor),
    situacao varchar (50) not null,
    tema varchar (20),
    relatorio varchar (40)
);

create table apresentacao(
	id_apresentacao integer auto_increment primary key,
    descricao varchar (50)
);

create table avaliacao(
	id_avaliacao integer auto_increment primary key,
    id_professor integer,
    foreign key (id_professor) references professor(id_professor)
);

create table professor_apresentacao(
	id_professor integer,
    foreign key (id_professor) references professor(id_professor),
    id_apresentacao integer,
    foreign key (id_apresentacao) references apresentacao(id_apresentacao),
    primary key(id_professor, id_apresentacao)
);

create table nota(
	id_nota integer auto_increment primary key,
    id_avaliacao integer,
    foreign key (id_avaliacao) references avaliacao(id_avaliacao),
    valor varchar (40),
    descricao varchar (50)
);

create table empresa(
	id_empresa integer auto_increment primary key
);

create table avaliacao_discente(
	avaliacao_discente integer auto_increment primary key
);

create table avaliacao_orientador(
	avaliacao_orientador integer auto_increment primary key
);

create table avaliacao_empresa(
	avaliacao_empresa integer auto_increment primary key
);

create table estagio(
	id_estagio integer auto_increment primary key,
    id_aluno integer,
    foreign key (id_aluno) references aluno(id_aluno),
    id_professor integer,
    foreign key (id_professor) references professor(id_professor),
    avaliacao_discente integer,
    foreign key (avaliacao_discente) references avaliacao_discente(avaliacao_discente),
    avaliacao_orientador integer,
    foreign key (avaliacao_orientador) references avaliacao_orientador(avaliacao_orientador),
    avaliacao_empresa integer,
    foreign key (avaliacao_empresa) references avaliacao_empresa(avaliacao_empresa),
	id_empresa integer,
    foreign key (id_empresa) references empresa(id_empresa),
    data_inicial varchar (50),
    tema varchar (40),
    relatorio varchar (40)
);

select * from curso; 
select * from coordenador; 
select * from aluno; 
select * from tcc;
select * from estagio;

insert into coordenador(nome, email, senha) values("nicholas", "nick@gmail.com", "123"); 
insert into curso(id_curso, id_coordenador, descricao) values( 1, 1, "Informatica"); 
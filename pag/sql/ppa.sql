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

use ppa; 
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
alter table aluno drop constraint aluno_ibfk_1;
alter table aluno add column id_turma integer;
alter table aluno add constraint foreign key (id_turma) references turma(id_turma); 
alter table aluno add column id_curso integer; 
alter table turma drop constraint turma_ibfk_1;
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
select * from empresa;
alter table curso add column ano_letivo int(4);
alter table curso drop column ano_letivo; 

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
    data_inicio date, 
    prev_termino date
);

insert into tcc (id_aluno, id_professor, situacao, data_inicio, prev_termino, tema) values(1, 1, "Não iniciado.", 01/01/2001, 02/02/2002, "Impacto da Mc Pipoquinha na Sociedade");
alter table tcc add column tema varchar(80);
select * from tcc; 

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
    data_inicio date, 
    prev_termino date,
    situacao varchar(15)
);

drop table estagio;

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
    nome varchar(50),
    uf varchar(2), 
    municipio varchar(50),
    endereco varchar (50), 
    numero int(4), 
    complemento varchar(50), 
    bairro varchar(50), 
    cep varchar(20), 
    telefone int(20)
);

create table turma(
	id_turma integer auto_increment primary key, 
    descricao varchar(5), 
    ano_letivo int(4),
	id_curso integer, 
    foreign key (id_curso) references curso(id_curso)
);

use ppa; 
select * from usuario; 
select * from curso; 
select * from coordenador; 
select * from aluno; 
select * from professor; 
select * from turma;
select * from empresa;
select * from estagio;
select * from tcc;
select * from tema; 

alter table turma drop column id_curso; 

insert into empresa (nome) values ("OF");
insert into curso (descricao) values ("Edificacoes");
insert into professor(nome, matricula, email, senha) values ("Hiarles", 20201910, "hiarlessouza@gmail.com", "123");
insert into aluno (nome, matricula, id_curso, email, senha) values ("Ricardo", 20, 1, "hiarlessouza@gmail.com", "123");
insert into estagio(orientador, id_aluno, id_empresa, data_inicio, prev_termino, situacao) values(1, 2, 1, 12112023, 02022002, "em andamento");
insert into coordenador(nome, email, senha) values("nicholas", "nick@gmail.com", "123"); 
insert into curso(id_curso, id_coordenador, descricao) values( 1, 1, "Informatica");

select tcc.id_tcc, professor.nome as 'professor',  aluno.nome as 'estudante', date_format(tcc.data_inicio, '%d/%m/%Y') as data_inicio, date_format(tcc.prev_termino, '%d/%m/%Y') as prev_termino, tcc.situacao, tcc.tema
from tcc inner join aluno on tcc.id_aluno = aluno.id_aluno inner join professor on tcc.id_professor = professor.id_professor
where tcc.id_tcc = id_tcc;



select estagio.id_estagio, professor.nome as 'professor', aluno.nome as 'estudante', empresa.nome as 'empresa', date_format(estagio.data_inicio, '%d/%m/%Y') as data_inicio, date_format(estagio.prev_termino, '%d/%m/%Y') as prev_termino, estagio.situacao from estagio inner join aluno on (estagio.id_aluno = aluno.id_aluno)
inner join professor on (estagio.orientador = professor.id_professor)
inner join empresa on (estagio.id_empresa = empresa.id_empresa)
where estagio.id_estagio = id_estagio;

select date_format(data_inicio, '%d/%m/%Y') from estagio;
select date_format(prev_termino, '%d/%m/%Y') as prev_termino from estagio;
select date_format(data_inicio, '%d/%m/%Y') from tcc;
select date_format(prev_termino, '%d/%m/%Y') as prev_termino from tcc;



select * from professor;

update professor set nome = 'Hiarles' where id_professor = 2;

select * from estagio;
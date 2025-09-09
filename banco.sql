create database sistemalogin;

use sistemalogin;

create table usuario(
	id int auto_increment primary key,
    nome varchar(100) not null,
    email varchar (100),
	senha varchar(100),
    criado_em date
);
show tables;
select*from usuario;

alter table usuario
alter column criado_em timestamp
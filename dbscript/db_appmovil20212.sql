create database db_appmovil20212;
use db_appmovil20212;

create table t_languaje(
    languaje_id varchar(40) not null,
    languaje_name varchar(70), 
    primary key(languaje_id)
)engine=InnoDB;

create table t_person(
	person_id char(13) not null,
    person_name varchar(70) not null,
    person_surname varchar(40) not null,
    person_birthDate date not null,
    person_gender boolean not null, -- Masculino => true y Femenino = false
    person_heigh varchar(20) not null, -- Alto, Normal, Bajo 
    primary key(person_id)
)engine=InnoDB;

create table t_favoriteLanguaje(
	id_favoriteLanguaje char(13) not null,
  	person_id char(13) not null,  
	languaje_id varchar(40) not null,
    foreign key(person_id) references t_person(person_id) on delete cascade on update cascade,
    foreign key(languaje_id) references t_languaje(languaje_id) on delete cascade on update cascade,
    primary key(id_favoriteLanguaje)
)engine=InnoDB;
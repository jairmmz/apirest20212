create database dbappmovil20212;
use dbappmovil20212;

create table tlanguage
(
idLanguage char(13) not null,
name varchar(70) not null,
created_at datetime not null,
updated_at datetime not null,
primary key(idLanguage)
) engine=innodb;

create table tperson
(
idPerson char(13) not null,
firstName varchar(70) not null,
surName varchar(40) not null,
birthDate date not null,
gender boolean not null,/*true => Masculino, false => Femenino*/
height varchar(20) not null,/*Alto, Normal, Bajo*/
created_at datetime not null,
updated_at datetime not null,
primary key(idPerson)
) engine=innodb;

create table tfavoritelanguage
(
idFavoriteLanguage char(13) not null,
idPerson char(13) not null,
idLanguage char(13) not null,
created_at datetime not null,
updated_at datetime not null,
foreign key(idPerson) references tperson(idPerson) on delete cascade on update cascade,
foreign key(idLanguage) references tlanguage(idLanguage) on delete cascade on update cascade,
primary key(idFavoriteLanguage)
) engine=innodb;

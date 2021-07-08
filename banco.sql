create database devsbook;
use devsbook;

create table users (
	id int not null auto_increment,
	email varchar(100) not null,
    password varchar(400) not null,
    name varchar(100) not null,
    birthdate date not null,
    city varchar(100),
    work varchar(100),
    avatar varchar(100) ,
    cover varchar(100) ,
    token varchar(200) not null,
    primary key (id)
);

create table userrelations (
	id int not null auto_increment,
    user_from int not null,
    user_to int not null,
	primary key (id)
);

create table posts (
	id int not null auto_increment,
    type varchar(20) null,
    created_at datetime,
    body text,
    primary key (id)
);

create table postcomments (
	id int not null auto_increment,
    id_post int not null,
    id_user int not null,
    created_at datetime not null,
    body text not null,
    primary key (id)
);

create table postlikes (
	id int not null auto_increment,
    id_post int not null,
    id_user int not null,
    created_at datetime,
    primary key (id)
);

select * from users;






















drop database if exists thismightkillyou;

create database thismightkillyou;

use thismightkillyou;

create table if not exists users(
username varchar(255),
password varchar(255),
email varchar(255),
primary key(username)
);

create table if not exists recipes(
id int not null auto_increment,
name varchar(255),
primary key(id)
);

create table if not exists votes(
username varchar(255),
recipe_id int,
value int,
constraint pk_username_recipe_id primary key (username, recipe_id)
);
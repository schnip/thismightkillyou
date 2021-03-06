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

create table if not exists ingredients(
recipe_id int,
i_num int,
quantity varchar(255),
name varchar(255),
constraint pk_recipe_ingredient primary key (recipe_id, i_num)
);

create table if not exists directions(
recipe_id int,
d_num int not null,
d_text varchar(4095),
constraint pk_recipe_direction primary key (recipe_id, d_num)
);

-- Tables used for creating new recipes

create table if not exists gen_food(
name varchar(255),
ara boolean,
type varchar(255),
primary key(name)
);

create table if not exists gen_steps(
id int not null auto_increment,
primary_action varchar(255),
secondary_action varchar(255),
result varchar(255),
ara boolean,
primary_type varchar(255),
secondary_type varchar(255),
result_type varchar(255),
primary key(id)
);

create table if not exists gen_type(
type varchar(255),
parent varchar(255),
primary key(type)
);

create table if not exists gen_title(
word varchar(255),
primary key(word)
);

create table if not exists gen_quantities(
quantity varchar(255),
type varchar(255),
primary key(quantity)
);
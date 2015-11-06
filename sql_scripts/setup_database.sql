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
id int,
name varchar(255),
);
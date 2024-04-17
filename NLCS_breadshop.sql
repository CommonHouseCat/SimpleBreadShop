create database breadshop default charset utf8mb4;
use breadshop;
drop database breadshop;


create table breadType(
	type_id varchar(255) primary key,
    type_name varchar(255) not null
);

create table bread (
	bread_id int auto_increment primary key,
	type_id varchar(255),
    bread_name varchar(255) not null,
    bread_price int check(bread_price > 10000),
    bread_desc varchar(255),
    foreign key (type_id) references breadType(type_id)
);

create table 


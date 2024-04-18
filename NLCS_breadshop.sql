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

create table userInfo(
	user_ID int auto_increment primary key,
    user_name varchar(255) not null,
    user_passwd varchar(255) not null,
    user_role boolean default 0,
    user_phoneNum varchar(10) CHECK (user_phoneNum regexp '^0[0-9]{9}$')
);

create table invoice(
	invoice_ID varchar(20) primary key,
    user_ID int,
    invoice_date date,
    invoice_total int,
    CONSTRAINT FOREIGN KEY (user_id) REFERENCES userinfo(user_id)
);

 create table invoiceDetail(
	invoice_ID varchar(20),
    type_id varchar(255),
    quantity int, 
    CONSTRAINT FOREIGN KEY (invoice_ID) REFERENCES invoice(invoice_id),
    CONSTRAINT FOREIGN KEY (type_id) REFERENCES breadtype(type_id)
);
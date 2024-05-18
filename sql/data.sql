create database dropzone;
use dropzone;
create table rules(
    rule_id int primary key auto_increment,
    rule_name varchar(255) 
);

create table files_details(
    files_details_id int primary key auto_increment,
    rule_id int ,
    files_details_nom varchar(255) 
);


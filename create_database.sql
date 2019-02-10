CREATE DATABASE IF NOT EXISTS httpstatus;
USE httpstatus;

CREATE TABLE user (
	id int primary key not null auto_increment,
	email varchar(255) not null,
	password varchar(255) not null,
	api_key varchar(255) not null
);

CREATE TABLE websites (
	id int primary key not null auto_increment,
	url varchar(255) not null,
	status boolean not null
);

CREATE TABLE history (
	id_history int primary key not null auto_increment,
	id_website int not null,
	status boolean not null,
	update_time datetime not null,
	CONSTRAINT FK_WebsiteHistory FOREIGN KEY (id_website) REFERENCES websites(id)
);
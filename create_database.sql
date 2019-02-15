CREATE DATABASE IF NOT EXISTS lafuente_mehaye;
USE lafuente_mehaye;

CREATE TABLE users (
	id int primary key not null auto_increment,
	email varchar(255) not null,
	password varchar(255) not null,
	is_admin boolean not null,
	api_key varchar(255) not null
);

CREATE TABLE websites (
	id int primary key not null auto_increment,
	url varchar(255) not null
);

CREATE TABLE history (
	id_history int primary key not null auto_increment,
	id_website int not null,
	status int not null,
	update_time datetime not null,
	CONSTRAINT FK_WebsiteHistory FOREIGN KEY (id_website) REFERENCES websites(id)
);

INSERT INTO users (email, password, is_admin, api_key) VALUES ('deschaussettes@yopmail.com', 'password', true, 'abcdefghjaimelesapis');
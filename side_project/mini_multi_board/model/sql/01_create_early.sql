CREATE DATABASE mini_multi_board;
USE mini_multi_board;

CREATE TABLE USER(
 	id INT PRIMARY KEY auto_increment
 	,u_id VARCHAR(20) NOT null
 	,u_pw VARCHAR(256) NOT null
 	,u_name VARCHAR(50) NOT null
 	,created_at DATETIME DEFAULT CURRENT_TIMESTAMP()
 	,updated_at DATETIME DEFAULT CURRENT_TIMESTAMP()
 	,deleted_at DATETIME 
 );
 
 CREATE TABLE board(
 	id INT PRIMARY KEY auto_increment
 	,u_pk INT NOT null
 	,b_type CHAR(1) NOT null
 	,b_title VARCHAR(30) NOT null 
 	,b_content VARCHAR(1000) NOT null
 	,b_img VARCHAR(50)
 	,created_at DATETIME DEFAULT CURRENT_TIMESTAMP()
 	,updated_at DATETIME DEFAULT CURRENT_TIMESTAMP()
 	,deleted_at DATETIME 
 );
 
 CREATE TABLE boardname(
 	id INT PRIMARY KEY auto_increment
 	,b_type CHAR(1) NOT null
 	,b_name VARCHAR(15) NOT null
 );
 
 
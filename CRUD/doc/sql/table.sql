CREATE DATABASE crud_list;

USE crud_list;
COMMIT;

CREATE TABLE crud(
	id INT PRIMARY KEY AUTO_INCREMENT
	,title VARCHAR(100) NOT null
	,content VARCHAR(1000) NOT null
	,create_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
	,update_at DATETIME NOT NULL
	,delete_at datetime NOT NULL
);
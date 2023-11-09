CREATE DATABASE test;

USE test;

CREATE TABLE user(
	id INT PRIMARY KEY AUTO_INCREMENT
	,u_name VARCHAR(30) NOT null
	,birth date NOT null
	,created_at DATETIME DEFAULT CURRENT_TIMESTAMP()
);

CREATE TABLE productinfo(
	id INT PRIMARY KEY AUTO_INCREMENT
	,p_name VARCHAR(100) NOT null
	,p_price INT NOT null
);

CREATE TABLE delivery(
	id INT PRIMARY KEY AUTO_INCREMENT
	,delivery_flg CHAR(1) DEFAULT '0'
	,u_id INT NOT null
	,p_id INT NOT null	
);

-- 포링키 같은경우는 알터테이블로 테이블 을 만들고 따로 추가 작업을 한다
-- 이유는 나중에 코드소스 관리를 위해서

--  REFERENCES USER(id);on cascaded
-- on cascaded : 연결된 부모가 업데이트 되거나 하면 자식까지 같이 변경되는 것
-- CONSTRAINT : 제약조건

ALTER TABLE delivery
ADD CONSTRAINT fk_delivery_u_id FOREIGN KEY (u_id)
REFERENCES USER(id);

ALTER TABLE delivery
ADD CONSTRAINT fk_delivery_p_id FOREIGN KEY (p_id)
REFERENCES productinfo(id);

COMMIT;
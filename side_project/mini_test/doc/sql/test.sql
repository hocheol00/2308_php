SET autocommit = 0;

SELECT @@AUTOCOMMIT;

CREATE DATABASE mini_test;

USE mini_test;

CREATE TABLE test(
	id INT PRIMARY KEY AUTO_INCREMENT
	,title varchar(100) NOT null
	,name_t VARCHAR(1000) NOT null
	,creat_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
	,views int NOT NULL DEFAULT '0'
	,delete_fig CHAR(1) NOT NULL DEFAULT '0'
);

INSERT INTO test(
	title
	,name_t

)
VALUES
('제목1','내용1')
,('제목2','내용2')
,('제목3','내용3')
,('제목4','내용4')
,('제목5','내용5')
,('제목6','내용6')
,('제목7','내용7')
,('제목8','내용8')
,('제목9','내용9')
,('제목10','내용10')
,('제목11','내용11')
,('제목12','내용12')
,('제목13','내용13')
,('제목14','내용14')
,('제목15','내용15')
,('제목16','내용16')
,('제목17','내용17')
,('제목18','내용18')
,('제목19','내용19')
,('제목20','내용20')
,('제목21','내용21')
,('제목22','내용22')
,('제목23','내용23')
,('제목24','내용24')
,('제목25','내용25')
,('제목26','내용26')
,('제목27','내용27');

COMMIT;
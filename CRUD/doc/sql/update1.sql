CREATE DATABASE crud_list;

USE crud_list;
COMMIT;

CREATE TABLE crud(
    id INT PRIMARY KEY AUTO_INCREMENT
    ,title VARCHAR(100) NOT NULL
    ,content VARCHAR(1000) NOT NULL
    ,create_at DATE NOT NULL DEFAULT CURRENT_TIMESTAMP
    ,update_at DATE NOT NULL DEFAULT CURRENT_TIMESTAMP
    ,delete_flg CHAR(1) NOT NULL DEFAULT '0'
    ,delete_at DATETIME DEFAULT NULL
);

INSERT INTO crud(
	title
	,content
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

FLUSH PRIVILEGES;

COMMIT;

INSERT INTO boardname(b_type, b_name)
VALUES('3', '상담게시판');

INSERT INTO boardname(b_type, b_name)
VALUES('4', '빵빵게시판');
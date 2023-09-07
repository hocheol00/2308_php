-- VIEW란?
-- 	가상의 테이블로, 보안과 함께 사용자의 편의성을 높이기 위해 사용합니다
-- 	여러테이블을 조인 할 시에 view를 생선하여,
-- 	복잡한 SQL을 편리하게 조회 할 수 있는 장점이 있습니다.
-- 	단점 : INDEX를 사용할 수 없어 조회 속도가 느리다.

-- 2.VIEW 생성
-- 	CREATE [OR REPLACE] VIEW 뷰명
-- 	AS
-- 		SELECT 문
-- 	;
-- 	**[OR REPLACE] : 기존의 뷰가 있을 경우 덮어쓰기를 합니다.**

CREATE VIEW view_employed_emp
as
	SELECT emp.*, tit.title
	FROM employees emp
		INNER JOIN titles tit
			ON emp.emp_no = tit.emp_no
			and tit.to_date >= NOW();
		
SELECT *
FROM view_employed_emp;

-- 6. INDEX 생성
-- 	CREATE INDEX 인덱스명 ON 테이블 (컬럼);
-- 	CREATE INDEX 인덱스명 ON 테이블명(컬럼1,컬럼2..);
-- 	SHOW INDEX FROM employees; = 인덱스 확인 방법

SHOW INDEX FROM employees;

CREATE INDEX idx_employees_last_name ON employees(last_name);

-- 7.INDEX 제거
-- 	FROP INDEX 인덱스명 ON 테이블;

DROP INDEX idx_employees_last_name ON employees;
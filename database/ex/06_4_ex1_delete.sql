-- delete의 기본구조
-- delete from 테이블명
-- where 조건
-- **추가설명 : 조건을 적지않을 경우 모든 레코드가 삭제됩니다.

INSERT INTO departments(
	dept_no
	,dept_name
)
VALUES (
	'd010'
	,'new'
);

SELECT * FROM departments


DELETE FROM departments
WHERE dept_no = 'd010';

-- 사원정보테이블에서 사원번호가 500001이상인 사원의 데이터를 모두 삭제

DELETE FROM employees
WHERE emp_no >= 500001;

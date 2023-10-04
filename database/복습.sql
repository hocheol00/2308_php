-- 1. 짝궁의 인적사항을 사원테이블에 삽입해주세요
-- 2. 1번에서 삽입한 짝궁의 월급을 삽입해주세요
-- 3. 이름이 'Sachin'인 사람의 성별을 'F', 생일을 1970-01-01로 변경해주세요
-- 4. 짝궁의 모든 정보를 삭제해 주세요

INSERT INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)
VALUES (
	500008
	,19961013
	,'minji'
	,'cha'
	,'f'
	,20230927
);

INSERT INTO salaries (
	emp_no
	,salary
	,from_date
	,to_date
)
VALUES (
	500008
	,6
	,20230927
	,99990101
);

UPDATE employees
SET gender = 'F'
	,hire_date = 19700101
WHERE first_name = 'Sachin'; 


DELETE FROM employees
WHERE emp_no = '500008';


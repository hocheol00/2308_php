-- UPDATE 기본구조
-- UPDATE 테이블명
-- SET (컬1 = 값1, 컬럼2 = 값2)
-- WHERE 조건
-- **추가설명 : 조건을 적지않을 경우 모든레코드가 수정됩니다.
-- 				실수를 방지하기위해 WHERE 절을 먼저 작성하고 SET 작성하는 것

UPDATE titles
SET title = 'CEO'
WHERE emp_no = 500000;


-- 500000번 사원의 직급을 'STAFF', 연봉을'25000', 소속부서


UPDATE titles
SET title = 'STAFF'
WHERE emp_no = 500000;

UPDATE salaries
SET salary = 25000
WHERE emp_no = 500000;

-- 확인

SELECT * FROM titles ORDER BY emp_no DESC;
SELECT * FROM salaries ORDER BY emp_no DESC;
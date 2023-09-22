INSERT INTO departments (
    dep_no 
    ,dept_name
)
VALUES (
    'd010'
    ,'php504'
);

FLUSH PRIVILEGES;

SELECT *
FROM titles
ORDER BY emp_no DESC;

SELECT salary
		,emp_no
FROM salaries
WHERE to_date >= NOW()
AND salary > 80000;

INSERT INTO employees
VALUES (
	700000
	,20000101
	,'first'
	,'last'
	,'M'
	,20230919
	,NULL
);
COMMIT;

SELECT *
FROM titles;

-- 문제
SELECT emp.emp_no
FROM employees emp
left outer JOIN titles t
ON emp.emp_no = t.emp_no
WHERE t.emp_no IS NULL;

-- INSERT INTO titles
-- 		emp_no
-- 		,title
-- 		,from_date
-- 		,to_date
-- VALUES (
-- 		700000
-- 		,'green'
-- 		,20230919
-- 		,99990101;
-- 


CREATE DATABASE mini_board;

USE mini_board;


CREATE TABLE boards (
	id INT PRIMARY KEY AUTO_INCREMENT
	,title VARCHAR(100) NOT null
	,content VARCHAR(1000) NOT null
	,creat_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
	,delete_flg CHAR(1) NOT NULL DEFAULT '0'
	,delete_at DATETIME DEFAULT null 
);
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
FROM employees
ORDER BY emp_no desc;
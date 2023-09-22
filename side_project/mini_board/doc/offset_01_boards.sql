SELECT id, title, creat_at
FROM boards
ORDER BY id DESC
LIMIT 5 OFFSET 5;

SELECT COUNT(id)
FROM boards;
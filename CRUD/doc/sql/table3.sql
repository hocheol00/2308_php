SELECT DISTINCT ci.c_id FROM create_information ci
    JOIN chal_info ch
        ON ci.c_id = ch.c_id
    WHERE ci.c_com_at IS NOT NULL and ci.c_deleted_at IS NULL;
    
SELECT c_id, c_name FROM chal_info WHERE c_id =  GROUP BY c_id;

SELECT ch.l_name FROM chal_info ch WHERE ch.c_id = 

COMMIT;
FLUSH PRIVILEGES;
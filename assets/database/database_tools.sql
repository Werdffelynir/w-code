--SELECT path FROM path WHERE active is not 0;

/*
SELECT * FROM item i
LEFT JOIN relation r ON (r.item = i.id)
LEFT JOIN path p ON (p.id = r.path)
WHERE p.active = 1;
*/
/*
SELECT * FROM path p WHERE p.active = 1;
*/
--SELECT p.* FROM path p 
--LEFT JOIN relation r ON (r.path = p.id)
--WHERE p.active = 1;
/*
SELECT i.*, 
p.id as path_id,
p.name as path_name,
p.path as path_path,
p.active as path_active
FROM item i 
LEFT JOIN relation r ON (r.item = i.id)
LEFT JOIN path p ON (p.id = r.path)
WHERE i.id = 1;
 '/python/function'
*/
/*
SELECT i.*, 
p.id as path_id,
p.name as path_name,
p.path as path_path,
p.active as path_active
FROM item i 
LEFT JOIN relation r ON (r.item = i.id)
LEFT JOIN path p ON (p.id = r.path)
WHERE p.path = '/python';
*/


--DELETE FROM item WHERE id = 12;

INSERT INTO `item` (`id`, `link`,`title`,`content`) VALUES (12, 'link12','title','content');










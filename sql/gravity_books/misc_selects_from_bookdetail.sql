/* 

SELECT COUNT(*) FROM bookdetail;


 */

SELECT title, author_name, publisher_name
 FROM bookdetail where 
title LIKE '%EVA%'
OR title LIKE 'che%'
ORDER BY title, author_name;
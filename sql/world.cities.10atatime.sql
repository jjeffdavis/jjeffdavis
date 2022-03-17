--- world db  

use world;
SELECT id, name, countrycode, Population
 FROM  city
ORDER BY id limit 100,10;



-- select column1, column2, ... from table_name LIMIT m,n



DELIMITER $$
CREATE procedure while_ex()
block: BEGIN
 declare value VARCHAR(20) default ' ' ;

 declare m INT default 0;

 SET m= 1;
 WHILE m <= 50000 DO

SELECT id, name, countrycode, Population
 FROM  city
ORDER BY id,
 limit m,10;





   SET m = m + 10;
 END
 WHILE block;

END $$
DELIMITER ;



/* 
users.sql
users database
*/

DROP DATABASE IF EXISTS users;
CREATE DATABASE IF NOT EXISTS users;
USE users;

 

 DROP TABLE IF EXISTS tuser;

CREATE TABLE  tuser (
tuserid    INT NOT NULL AUTO_INCREMENT KEY,
tusername  	 varchar(255) NOT NULL UNIQUE,
tpassword    varchar(255) NOT NULL DEFAULT '',
tfirstname 	varchar(255) NOT NULL  DEFAULT '',
tmiddle char(1) NOT NULL DEFAULT ' ',
tlastname 	varchar(255) NOT NULL  DEFAULT '',
tbirthday  	datetime,
temail 	varchar(255) NOT NULL,
tage	 int NOT NULL DEFAULT 0,
tisadmin BOOLEAN NOT NULL DEFAULT 0,   
tisregistereduser BOOLEAN NOT NULL DEFAULT 0);  
/*  ENGINE MyISAM;   */

DESCRIBE tuser;
INSERT INTO tuser(tusername,tpassword,tfirstname,tlastname,
    tbirthday,temail,tage,
    tisadmin, tisregistereduser)
    VALUES('RalphKramden', 'busdriver', 'Ralph', 'Kramden',
            '1932-02-11', 'rkramden@newyorkbus.org', 90,
            0, 1);

INSERT INTO tuser(tusername,tpassword,tfirstname,tlastname,
    tbirthday,temail,tage,
    tisadmin, tisregistereduser)
    VALUES('ChinaCatSunflower', 'RainInHavana', 'China Cat', 'Sunflower',
            '1992-02-11', 'chinacatsunflower@greatfuldead.org', 30,
            1, 1);

INSERT INTO tuser(tusername,tpassword,tfirstname,tlastname,
    tbirthday,temail)
    VALUES('iris', 'SnowInNewYork', 'Iris', 'Sunflower',
            '1999-02-11', 'chinacatsunflower@greatfuldead.org');

INSERT INTO tuser(tusername, tmiddle, tlastname, temail)
VALUES
('Hermione Gingold', 'G',  'Gingold', 'hgg@retiredactors.org');

INSERT INTO tuser(tusername, tpassword, temail)
VALUES
('ChopinsNocturnes', 'TsunamiInKyoto', 'chops22@chopin.po');

SELECT COUNT(*) FROM  tuser;


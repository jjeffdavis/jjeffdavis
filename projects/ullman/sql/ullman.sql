DROP SCHEMA IF EXISTS ullman;
CREATE SCHEMA ullman;
USE ullman;

DROP TABLE IF EXISTS users;
CREATE TABLE users (
id INT UNSIGNED NOT NULL AUTO_INCREMENT,
userType ENUM('public','author','admin'),
username VARCHAR(30) NOT NULL,
email VARCHAR(40) NOT NULL,
pass CHAR(40) NOT NULL,
dateAdded TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (id),
UNIQUE (username),
UNIQUE (email),
INDEX login (email, pass)
);
	
CREATE TABLE pages (
id INT UNSIGNED NOT NULL AUTO_INCREMENT,
creatorId INT UNSIGNED NOT NULL,
title VARCHAR(100) NOT NULL,
content TEXT NOT NULL,
dateUpdated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
dateAdded TIMESTAMP NOT NULL,
PRIMARY KEY (id),
INDEX (creatorId),
INDEX (dateUpdated)
);
	
INSERT INTO users VALUES 
(NULL, 'public', 'publicUser', 'public@example.com', SHA1('publicPass'), NULL),
(NULL, 'author', 'authorUser', 'author@example.com', SHA1('authorPass'), NULL),
(NULL, 'admin', 'adminUser', 'admin@example.com', SHA1('adminPass'), NULL);

INSERT INTO pages VALUES
(NULL, 2, 'This is a post', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', NULL, NOW()),
(NULL, 2, 'This is another post', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', NULL, NOW() + 1000000), 
(NULL, 3, 'This is the third post', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', NULL, NOW() + 2000000);


SELECT * FROM  users;
select id, creatorid, title, dateupdated, dateadded,  substr(content FROM 1 FOR 24)  from pages;



USE ullman;


INSERT INTO pages VALUES
(NULL, 2, 'Nth post', '<p>
<hr>
<p>', NULL, NOW() + 7000000)
;


SELECT * FROM  users;
select id, creatorid, title, dateupdated, dateadded,  substr(content FROM 1 FOR 72)  from pages;



/*
INSERT INTO pages VALUES
(NULL, 2, 'Nth post', '<p>

</p>', NULL, NOW() + 3000000)
;
*/

INSERT INTO pages VALUES
(NULL, 2, 'Nth post', '<p>
INSERT INTO `countrylanguage` VALUES (\'HUN\',\'German\',\'F\',0.4)\;
INSERT INTO `countrylanguage` VALUES (\'HUN\',\'Hungarian\',\'T\',98.5)\;
INSERT INTO `countrylanguage` VALUES (\'HUN\',\'Romani\',\'F\',0.5)\;
INSERT INTO `countrylanguage` VALUES (\'HUN\',\'Romanian\',\'F\',0.1)\;
INSERT INTO `countrylanguage` VALUES (\'HUN\',\'Serbo-Croatian\',\'F\',0.2)\;
INSERT INTO `countrylanguage` VALUES (\'HUN\',\'Slovak\',\'F\',0.1)\;
INSERT INTO `countrylanguage` VALUES (\'IDN\',\'Bali\',\'F\',1.7)\;
INSERT INTO `countrylanguage` VALUES (\'IDN\',\'Banja\',\'F\',1.8)\;
INSERT INTO `countrylanguage` VALUES (\'IDN\',\'Batakki\',\'F\',2.2)\;
INSERT INTO `countrylanguage` VALUES (\'IDN\',\'Bugi\',\'F\',2.2)\;
INSERT INTO `countrylanguage` VALUES (\'IDN\',\'Javanese\',\'F\',39.4)\;
INSERT INTO `countrylanguage` VALUES (\'IDN\',\'Madura\',\'F\',4.3)\;
INSERT INTO `countrylanguage` VALUES (\'IDN\',\'Malay\',\'T\',12.1)\;
INSERT INTO `countrylanguage` VALUES (\'IDN\',\'Minangkabau\',\'F\',2.4)\;

INSERT INTO `countrylanguage` VALUES (\'MNP\',\'Chinese\',\'F\',7.1)\;
INSERT INTO `countrylanguage` VALUES (\'MNP\',\'English\',\'T\',4.8)\;
INSERT INTO `countrylanguage` VALUES (\'MNP\',\'Korean\',\'F\',6.5)\;
INSERT INTO `countrylanguage` VALUES (\'MNP\',\'Philippene Languages\',\'F\',34.1)\;

INSERT INTO `countrylanguage` VALUES (\'ZMB\',\'Tongan\',\'F\',11.0)\;
INSERT INTO `countrylanguage` VALUES (\'ZWE\',\'English\',\'T\',2.2)\;
INSERT INTO `countrylanguage` VALUES (\'ZWE\',\'Ndebele\',\'F\',16.2)\;
INSERT INTO `countrylanguage` VALUES (\'ZWE\',\'Nyanja\',\'F\',2.2)\;
INSERT INTO `countrylanguage` VALUES (\'ZWE\',\'Shona\',\'F\',72.1)\;
COMMIT\;

SET AUTOCOMMIT=1\;

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */\;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */\;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */\;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */\;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */\;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */\;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */\;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */\;

-- Dump completed on 2010-09-30 11:01:37
</p>', NULL, NOW() + 3000000)
;



SELECT * FROM  users;
select id, creatorid, title, dateupdated, dateadded,  substr(content FROM 1 FOR 72)  from pages;







/*
USE ullman;

INSERT INTO pages VALUES
(NULL, 2, '4th post', '<p></p>', NULL, NOW() + 3000000)
,

(NULL, 2, '5th post', '<p></p>', NULL, NOW() + 4000000)
;


SELECT * FROM  users;
select id, creatorid, title, dateupdated, dateadded,  substr(content FROM 1 FOR 24)  from pages;

*/
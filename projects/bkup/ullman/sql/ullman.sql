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
(NULL, 2, '5th post', '\<p\>
NSERT INTO `city` VALUES (1,\'Kabul\'\,\'AFG\'\,\'Kabol\'\,1780000)\;
\</p\>', NULL, NOW() + 4000000)
;


SELECT * FROM  users;
select id, creatorid, title, dateupdated, dateadded,  substr(content FROM 1 FOR 72)  from pages;



/*
INSERT INTO pages VALUES
(NULL, 2, '4th post', '<p>
DROP TABLE IF EXISTS `city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `city` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Name` CHAR(35) NOT NULL DEFAULT '',
  `CountryCode` CHAR(3) NOT NULL DEFAULT '',
  `District` CHAR(20) NOT NULL DEFAULT '',
  `Population` INT(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `CountryCode` (`CountryCode`),
  CONSTRAINT `city_ibfk_1` FOREIGN KEY (`CountryCode`) REFERENCES `country` (`Code`)
) ENGINE=InnoDB AUTO_INCREMENT=4080 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
</p>', NULL, NOW() + 3000000)
,

*/


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
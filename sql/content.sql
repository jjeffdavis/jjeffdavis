--  create content database
--      text and keys tables.

DROP DATABASE IF EXISTS content;
CREATE DATABASE content;

USE content;

DROP TABLE IF EXISTS text;
CREATE TABLE `ctext` (
  `tid` INT(11) NOT NULL AUTO_INCREMENT,
  `ttext` TEXT NOT NULL,
  FULLTEXT(`ttext`),
PRIMARY KEY (`tid`)
) ENGINE=InnoDB   DEFAULT CHARSET=utf8;



CREATE TABLE `ckeys` (
`kkey` VARCHAR(255),  ## primary key not unique,
`kid` int(11) NOT NULL,
 KEY (`kid`),
CONSTRAINT `contentkeys` 
  FOREIGN KEY (`kid`) 
  REFERENCES `ctext` (`tid`)
) ENGINE=InnoDB   DEFAULT CHARSET=utf8;

INSERT INTO `ctext` VALUES(1,"the find command is useful in bash");


INSERT INTO `ckeys` VALUES
  ("bash", 1),
  ("find", 1);

  INSERT INTO `ctext` VALUES(2,
  "find . -name '*.tar'   ## generates from curr dir ./IN20070923/txt2pdf.tar
find . -name '*.txt' -exec rm {} \;  ## recursively removes from all subdirs
find . -name '*.rtf' -exec cp {} $HOME/utest/. \;   ## copy all matches to specific dir
");


INSERT INTO `ckeys` VALUES
  ("bash", 2),
  ("find", 2);



  INSERT INTO `ctext` VALUES(3,
  "
  ---------------------------------------------
>date format
---------------------------------------------
date '+DATE: %m/%d/%y%nTIME:%H:%M:%S' - Would list the time and date in the below format:

DATE: 02/08/01
TIME:16:44:55
---------------------------------------------
");

INSERT INTO `ckeys` VALUES
  ("bash", 3),
  ("date", 3);



  select * from ctext;


  select  ctext.ttext
  from ctext, ckeys
  where ckeys.kkey = "find"
    AND  ckeys.kid = ctext.tid;


 select  ctext.ttext
  from ctext, ckeys
  where ckeys.kkey = "date"
    AND  ckeys.kid = ctext.tid;


DROP VIEW IF EXISTS vcontent;
CREATE VIEW `vcontent` ( vkey, vtext )
AS
  SELECT
    ckeys.kkey, ctext.ttext
  FROM
    `ctext`, `ckeys`
  WHERE
    ckeys.kid = ctext.tid;
)

select  vtext 
from  vcontent
where vkey = "date";
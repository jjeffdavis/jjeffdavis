DROP TABLE IF EXISTS `bookdetail`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `bookdetail` (
`bookdetail_id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
`book_id` INT NOT NULL,
`title` VARCHAR(96),
`isbn13` CHAR(13) NOT NULL,
`num_pages` INT NOT NULL,
`publisher_id` INT NOT NULL,
`publisher_name` VARCHAR(96),
`publication_date` DATETIME,
`author_id` INT NOT NULL,
`author_name` VARCHAR(96),
`language_id` INT NOT NULL,
`language_name` VARCHAR(96)

);


INSERT INTO  bookdetail(
    book_id, title, isbn13, num_pages,
    publisher_id, publisher_name, publication_date,
    author_id, author_name,
    language_id, language_name
)

    SELECT
    ba.book_id,
    LEFT(b.title,95),
    b.isbn13,
    b.num_pages,
    b.publisher_id,
    LEFT(p.publisher_name,95),
    b.publication_date, 
    a.author_id,
    LEFT(a.author_name,95),
    b.language_id,
    LEFT(bl.language_name,95)
    FROM
    book_author ba,
    book b,
    author a,
    publisher p,
    book_language bl
    WHERE 
    ba.book_id = b.book_id AND
    ba.author_id = a.author_id AND
    b.publisher_id = p.publisher_id AND
    b.language_id = bl.language_id;
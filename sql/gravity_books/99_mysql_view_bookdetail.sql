

CREATE VIEW view_bookdetail AS
SELECT 
    ba.book_id,
    ba.author_id,
    b.title,
    b.isbn13,
    b.language_id,
    b.num_pages,
    b.publication_date,
    b.publisher_id,
    a.author_name,
    p.publisher_name,
    bl.language_name
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
    b.language_id = bl.language_id
    ORDER BY
    b.title,
    a.author_name;
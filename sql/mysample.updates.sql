### mysample.updates.sql  
ALTER TABLE products 
ADD FULLTEXT(productline, productname, productdescription);

SELECT 
	productName, 
    productLine 
FROM products 
WHERE 
	MATCH(productline) 
    AGAINST('Classic,Vintage')
ORDER BY productName;

SELECT 
	productName, 
    productLine 
FROM products 
WHERE 
	MATCH(productName) 
    AGAINST('1932,Ford');

/*

    MySQL Boolean full-text search operators
The following table illustrates the full-text search Boolean operators and their meanings:

Operator	Description
+	Include, the word must be present.
–	Exclude, the word must not be present.
>	Include, and increase ranking value.
<	Include, and decrease the ranking value.
()	Group words into subexpressions (allowing them to be included, excluded, ranked, and so forth as a group).
~	Negate a word’s ranking value.
*	Wildcard at the end of the word.
“”	Defines a phrase (as opposed to a list of individual words, the entire phrase is matched for inclusion or exclusion).
The following examples illustrate how to use boolean full-text operators in the search query:

To search for rows that contain at least one of the two words: mysql or tutorial

‘mysql tutorial’

To search for rows that contain both words: mysql and tutorial

‘+mysql +tutorial’

To search for rows that contain the word “mysql”, but put the higher rank for the rows that contain “tutorial”:

‘+mysql tutorial’

To search for rows that contain the word “mysql” but not “tutorial”

‘+mysql -tutorial’

To search for rows that contain the word “mysql” and rank the row lower if it contains the word “tutorial”.

‘+mysql ~tutorial’

To search for rows that contain the words “mysql” and “tutorial”, or “mysql” and “training” in whatever order, but put the rows that contain “mysql tutorial” higher than “mysql training”.

‘+mysql +(>tutorial <training)’

To find rows that contain words starting with “my” such as “mysql”, “mydatabase”, etc., you use the following:

‘my*’

*/

SELECT productName, productline
FROM products
WHERE MATCH(productName) 
      AGAINST('Truck' IN BOOLEAN MODE );


SELECT productName, productline
FROM products
WHERE MATCH(productName) AGAINST('Truck -Pickup' IN BOOLEAN MODE );
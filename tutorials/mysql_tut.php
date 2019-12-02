~MyISAM AND InnoDB
~primary key vs unique key in SQL
~Mysql Join
~MySQL ON DELETE CASCADE Example
~MySQL LIMIT clause
~How to concatenate columns in MySql
*****************************************



~MyISAM AND InnoDB
<?php 
# MyISAM
- The MyISAM tables are not transaction-safe.
- Provides high-speed storage and retrieval, supports full text searching.
- MyISAM provides table-level locking.
- MYISAM occupies less memory sapce for tables rather than
InnoDB tables.

# InnoDB
- The InnoDB tables fully support ACID-compliant and transactions.
- Supports FOREIGN KEY referential-integrity constraints. It supports commit, rollback, and crash-recovery capabilities to protect data.
- Row level locking.

# What is transaction safe?
When an update is performed and it fails, all changes are reverted.

# Locking 
MYISAM provide the table level locking means if the data in one table has been modified by the other 
table ,the entire table will lock for the next process.
But INNODB provide the row level locking only the row of the 
table that is being updated is locked.
?>


~primary key vs unique key in SQL
<?php
primary key and unique key used to uniquely identify a row in a table. But there are some subtle difference between them.
1) Unique key in a table can be null
2) There can be only one primary key per table in relation database e.g. MySQL,
but there can be more than one unique key per table.
?>
===================================================================
~Mysql Join
<?php
CREATE TABLE `course` (
	`id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(50) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

id	name
1	HTML5
2	CSS3
3	JavaScript
4	PHP
5	MySQL

CREATE TABLE `user` (
	`id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(30) NOT NULL,
	`course` smallint(5) unsigned DEFAULT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

id	name	 course
1	Alice	   1
2	Bob	       1
3	Caroline   2
4	David	   5
5	Emma	  (NULL)



Since we’re using InnoDB tables and know that user.course and course.id are related, we can specify a foreign key relationship:

ALTER TABLE `user`
ADD CONSTRAINT `FK_course`
FOREIGN KEY (`course`) REFERENCES `course` (`id`)
ON UPDATE CASCADE;

In essence, MySQL will automatically:
- re-number the associated entries in the user.course column if the course.id changes
- reject any attempt to delete a course where users are enrolled.

# INNER JOIN - 
This produces a set of records which match in both the user and course tables, i.e. all users who are enrolled on a course:

SELECT user.name, course.name
FROM `user`
INNER JOIN `course` on user.course = course.id;

Result:
(user.name)	(course.name)
Alice	    HTML5
Bob	        HTML5
Carline	    CSS3
David	    MySQL


# LEFT JOIN -
A LEFT JOIN produces a set of records which matches every entry in the left table (user) regardless of any matching entry in the right table (course):

SELECT user.name, course.name
FROM `user`
LEFT JOIN `course` on user.course = course.id;

Result:

user.name	course.name
Alice	    HTML5
Bob	        HTML5
Carline	    CSS3
David	    MySQL
Emma	   (NULL)


# RIGHT JOIN - 
A RIGHT JOIN produces a set of records which matches every entry in the right table (course) regardless of any matching entry in the left table (user):

SELECT user.name, course.name
FROM `user`
RIGHT JOIN `course` on user.course = course.id;

Result:

user.name	course.name
Alice	    HTML5
Bob	        HTML5
Carline	    CSS3
(NULL)	    JavaScript
(NULL)	    PHP
David	    MySQL


# OUTER JOIN (or FULL OUTER JOIN) - 

Our last option is the OUTER JOIN which returns all records in both tables regardless of any match. Where no match exists, the missing side will contain NULL.

OUTER JOIN is less useful than INNER, LEFT or RIGHT and it’s not implemented in MySQL. However, you can work around this restriction using the UNION of a LEFT and RIGHT JOIN, e.g.

SELECT user.name, course.name
FROM `user`
LEFT JOIN `course` on user.course = course.id

UNION

SELECT user.name, course.name
FROM `user`
RIGHT JOIN `course` on user.course = course.id;

Result:

user.name	course.name
Alice	     HTML5
Bob	         HTML5
Carline	     CSS3
David	     MySQL
Emma	    (NULL)
(NULL)	    JavaScript
(NULL)	    PHP

?>
===================================================================

~MySQL ON DELETE CASCADE Example

<?php 

We have two tables named buildings and rooms . Each building has one or more rooms. However, each room belongs to only one building. A room would not exist without a building.

The relationship between the buildings table and the rooms table is one-to-many (1:N) as illustrated in the following database diagram:

MySQL On Delete Cascade example

When we delete a record from the buildings table, we want the records in the rooms  table, which associates with the deleted building record to be removed e.g., when we delete a record with building no. 2 in the buildings  table as the following query:


DELETE FROM buildings
WHERE building_no = 2;

We want the records in the rooms table associated with the building number 2 to be removed as well.

The following are steps that demonstrate how MySQL ON DELETE CASCADE  referential action works.

Step 1. Create the buildings table:

CREATE TABLE buildings (
  building_no int(11) NOT NULL AUTO_INCREMENT,
  building_name varchar(255) NOT NULL,
  address varchar(355) NOT NULL,
  PRIMARY KEY (building_no)
) ENGINE=InnoDB;
Step 2. Create the rooms table:


CREATE TABLE rooms (
  room_no int(11) NOT NULL AUTO_INCREMENT,
  room_name varchar(255) NOT NULL,
  building_no int(11) NOT NULL,
  PRIMARY KEY (room_no),
  KEY building_no (building_no),
  CONSTRAINT rooms_ibfk_1 
  FOREIGN KEY (building_no) 
  REFERENCES buildings (building_no) 
  ON DELETE CASCADE
) ENGINE=InnoDB;

Notice that we put the ON DELETE CASCADE  clause at the end of the foreign key constraint definition.

Step 3. Insert data into the buildings table:


INSERT INTO buildings(building_name,address)
VALUES('ACME Headquaters','3950 North 1st Street CA 95134'),
      ('ACME Sales','5000 North 1st Street CA 95134')

Insert data into the rooms table:

INSERT INTO rooms(room_name,building_no)
VALUES('Amazon',1),
      ('War Room',1),
      ('Office of CEO',1),
      ('Marketing',2),
      ('Showroom',2)
	  
	  Delete the building with building no. 2:
	  
DELETE FROM buildings
WHERE building_no = 2

Notice that ON DELETE CASCADE  works only with tables whose storage engines support foreign keys e.g., InnoDB. Some table types do not support foreign keys such as MyISAM so you should choose appropriate storage engines for the tables that you plan to use the MySQL ON DELETE CASCADE  referential action.

?>
===================================================================

~MySQL LIMIT clause:
<?php
The LIMIT clause accepts one or two arguments. The values of both arguments must be zero or positive integers.

SELECT column1,column2,...
FROM table
LIMIT offset , count;

The offset specifies the offset of the first row to return. The offset of the first row is 0, not 1.
The count specifies the maximum number of rows to return.
?>
==================================================================

~How to concatenate columns in MySql
<?php
To concatenate columns in MySql there is in-built function for that.
(id)	(firstname)		(lastname)
1		John	    	Doe
2		John	    	Smith

=> SELECT concat(firstname,' ',lastname) as user_name FROM users;

o/p => 
(user_name)
John Doe
John Smith

# CONCAT_WS
CONCAT_WS to Concatenate Columns with Separator

select concat_ws(',',firstname,lastname);

It returns the concatenate value of firstname and lastname with comma separated.

?>
=======================================================================

FIND_IN_SET
<?php 
Syntax:
FIND_IN_SET(argument1,argument2)

Here, argument1 is a string. argument2 is a string list separated by comma.

find_in_set() function returns the position of a string within second string.

i) If string is not found in string_list, the FIND_IN_SET function will return 0.

ii) If string is NULL, the FIND_IN_SET function will return NULL.

iii) If string_list is an empty string, the FIND_IN_SET function will return 0.

iv) If string_list is NULL, the FIND_IN_SET function will return NULL.

/* Search a in a string of 'b,a,c,d' */
select find_in_set ('a', 'b,a,c,d'); 
//output - 2

/* Search h in a string of 'b,a,c,d' */
select find_in_set ('h', 'b,a,c,d'); 
//output - 0, as h is not present in a list

/* Search a in NULL value. */
select find_in_set ('a', NULL); 
//output - NULL

mysql> SELECT FIND_IN_SET(null, 'a,b,c');
Result: NULL

mysql> select * from category;
+-------------+-------------+----------+
| category_id | name        | cat_path |
+-------------+-------------+----------+
|           1 | Electronics | 4,2,6,7  |
|           2 | Mobiles     | 2,4,6    |
|           3 | DSLR        | 1,4,7    |
|           4 | Fashion     | 3,9,2    |
+-------------+-------------+----------+
4 rows in set (0.00 sec)


Let’s write query to find all the category_id and name whose cat_path contains value 4.

/* Search category 4 in cat_path (which is a comma separated cat_ids) */
mysql> select * from category where find_in_set('4',cat_path);
+-------------+-------------+----------+
| category_id | name        | cat_path |
+-------------+-------------+----------+
|           1 | Electronics | 4,2,6,7  |
|           2 | Mobiles     | 2,4,6    |
|           3 | DSLR        | 1,4,7    |
+-------------+-------------+----------+
3 rows in set (0.00 sec)

Three matching rows are fetched.

?>

=======================================================================

IF Condition in MySql:
<?php
// Syntax
if (condition,print value if true,print value if false)
	
To understand the if condition in MySql let’s check the example.
Ex - if(timestamp is NULL,1,0)
It’s a simple if condition which means if the value of timestamp column is NULL then prints 1 otherwise 0.

Some more examples.

SELECT IF(1 = 3,'true','false'); -- print false
SELECT IF(2 = 2,' true','false'); -- print true

+--------+--------+-------------------+
| emp_id | name   | designation       |
+--------+--------+-------------------+
|      1 | John   | Manager           |
|      2 | smith  | Sales Associate   |
|      3 | Amit   | Software Engineer |
|      4 | vikash | Customer Support  |
|      5 | vikky  | Manager           |
+--------+--------+-------------------+

Print the name and designation of all the employee either Manager or in other category.

mysql> select name,if(designation='Manager','Manager','Other') as designation from emp_data;
Output - 
+--------+-------------+
| name   | designation |
+--------+-------------+
| John   | Manager     |
| smith  | Other       |
| Amit   | Other       |
| vikash | Other       |
| vikky  | Manager     |
+--------+-------------+


If condition with aggregate functions
Let’s take another table products.

+------------+--------------+--------+
| product_id | product_name | status |
+------------+--------------+--------+
|          1 | Nokia        | A      |
|          2 | cooker       | P      |
|          3 | HTC          | A      |
|          4 | Mixer        | D      |
|          5 | Laptop       | D      |
|          6 | Reebok shoes | A      |
+------------+--------------+--------+

We want to know how many products are in active, disabled and pending state. So let’s write a query.

mysql> SELECT SUM(IF(status = 'A',1,0))   AS Active,
->        SUM(IF(status = 'D',1,0)) AS Disabled,
->        SUM(IF(status = 'P',1,0)) AS Pending
-> FROM products;
+--------+----------+---------+
| Active | Disabled | Pending |
+--------+----------+---------+
|      3 |        2 |       1 |
+--------+----------+---------+

You can achieve the same result through group by without using IF condition.

mysql> select count(status),status from products group by status;
+---------------+--------+
| count(status) | status |
+---------------+--------+
|             3 | A      |
|             2 | D      |
|             1 | P      |
+---------------+--------+

?>
==================================================================================

How to Query NULL Value in MySql:
<?php
mysql> select * from emp;
+----+--------+--------------+
| id | name   | emp_pan_card |
+----+--------+--------------+
|  1 | John   | NULL         |
|  2 | smith  | DDS9167GH    |
|  3 | Amit   | NULL         |
|  4 | vikash | DD47H86GH    |
+----+--------+--------------+
4 rows in set (0.00 sec)


Let’s see what happens when comparing emp_pan_card with NULL value.

mysql> select * from emp where emp_pan_card = NULL;
Empty set (0.00 sec)

NULL and ‘ ‘ (empty string) are different thing. NULL means value is unknown while empty string represents blank value.


To select rows which contain NULL value in mysql, you have to use IS NULL.
mysql> select * from emp where emp_pan_card IS NULL;
+----+------+--------------+
| id | name | emp_pan_card |
+----+------+--------------+
|  1 | John | NULL         |
|  3 | Amit | NULL         |
+----+------+--------------+
2 rows in set (0.00 sec)

To select rows where emp_pan_card column is not null you have to use IS NOT NULL.
mysql> select * from emp where emp_pan_card IS NOT NULL;
+----+--------+--------------+
| id | name   | emp_pan_card |
+----+--------+--------------+
|  2 | smith  | DDS9167GH    |
|  4 | vikash | DD47H86GH    |
+----+--------+--------------+
2 rows in set (0.00 sec)
?>
==============================================================================
Mysql 'BETWEEN' operator :
<?php 
Suppose you want to find products whose buy prices are within the ranges of $90 and $100, you can use the BETWEEN operator as the following query:

SELECT productCode, productName, buyPrice
FROM products
WHERE buyPrice BETWEEN 90 AND 100;

You can achieve the same result by using the greater than or equal (>=) and less than or equal ( <= ) operators as the following query:

SELECT productCode, productName, buyPrice
FROM products
WHERE buyPrice >= 90 AND buyPrice <= 100;

To find the product whose buy price is not between $20 and $100, you combine the BETWEEN operator with the NOT operator as follows:

SELECT productCode, productName, buyPrice
FROM products
WHERE buyPrice NOT BETWEEN 20 AND 100;


You can rewrite the query above using the less than (<), greater than (>), and logical operators (AND) as the following query.

SELECT productCode, productName, buyPrice
FROM products
WHERE buyPrice < 20 OR buyPrice > 100;


MySQL BETWEEN with dates example: 

When you use the BETWEEN operator with date values, to get the best result, you should use the type cast to explicitly convert the type of column or expression to the DATE type.

For example, to get the orders whose required dates are from 01/01/2003 to 01/31/2003, you use the following query:

SELECT orderNumber,requiredDate,status
FROM orders
WHERE requireddate
BETWEEN CAST('2003-01-01' AS DATE)
AND CAST('2003-01-31' AS DATE);

Because the data type of the required date column is DATE so we used the cast operator to convert the literal strings ‘2003-01-01 ‘ and ‘2003-12-31 ‘ to the DATE data type.

?>
==============================================================================

nth highest salary in MySQL without using subquery as shown below:
<?php 
SELECT salary FROM Employee ORDER BY salary DESC LIMIT N-1, 1

Examples :

2nd highest salary in MySQL without subquery:
SELECT salary FROM Employee ORDER BY salary DESC LIMIT 1,1
OR
SELECT MAX(salary) FROM Employee WHERE Salary NOT IN ( SELECT Max(Salary) FROM Employee);
OR
SELECT MAX(Salary) From Employee WHERE Salary < ( SELECT Max(Salary) FROM Employee);

3rd highest salary in MySQL using LIMIT clause:
SELECT salary FROM Employee ORDER BY salary DESC LIMIT 2,1
?>
============================================================================

# DDL, DML and DCL ?
<?php
DDL:- DDL stands for Data Definition Language.Its deals with database schemas and descriptions of
how the data should reside in the database.Example:- CREATE TABLE or ALTER TABLE,
DML:- DML stands for data manipulation Language.Its deals with SELECT, INSERT, UPDATE ,
DELETE etc.
DCL:- DCL stand for Data Control Language.Its contain commands like GRANT,Revoke etc.
?>
============================================================================

# VIEW in Mysql
<?php
In simple language , Views are nothing but virtual tables and do not contain data in itself but display data stored in other tables.

ADVANTAGES OF VIEWS:
Join two or more tables and show its outcome as single table to end user (i.e. hiding complexity of your data and tables).

BASIC SYNTAX :-
create view view_name as 
select columnname1,columnname2 from table_name ; 

Example:
CREATE VIEW productlist as 
SELECT brand.brand_name, product.product_name 
FRON brand 
INNER JOIN product
ON product.product_id = brand.brand_id
?>
============================================================================

Index
<?php
Indexes are used to retrieve data from the database very fast. 
INDEX`s are created on the column(s) that will be used to filter the data.

# Note: Updating a table with indexes takes more time than updating a table without (because the indexes also need an update). So, only create indexes on columns that will be frequently searched against.

# CREATE INDEX index_name ON table_name (column1, column2, ...);
Duplicate values are allowed

# CREATE UNIQUE INDEX index_name ON table_name (column1, column2, ...);
Duplicate values are not allowed:

# Example 1: CREATE INDEX Example
The SQL statement below creates an index named "idx_lastname" on the "LastName" column in the "Persons" table:
CREATE INDEX idx_lastname ON Persons (LastName);

If you want to create an index on a combination of columns, you can list the column names within the parentheses, separated by commas:
# Example 2: 
CREATE INDEX idx_pname ON Persons (LastName, FirstName);

# Example 3:
The following statement finds employees whose job title is Sales Rep:

SELECT employeeNumber, lastName, firstName
FROM employees
WHERE jobTitle = 'Sales Rep';

We have 17 rows indicating that 17 employees whose job title is the Sales Rep.
To see how MySQL internally performed this query, you add the EXPLAIN clause at the beginning of the SELECT statement as follows:

As you can see, MySQL had to scan the whole table which consists of 23 rows to find the employees with the Sales Rep job title.
Now, let’s create an index for the  jobTitle column by using the CREATE INDEX statement:

CREATE INDEX jobTitle ON employees(jobTitle);

And execute the above statement again:

EXPLAIN SELECT employeeNumber, lastName, firstName
FROM employees
WHERE jobTitle = 'Sales Rep';

As you can see, MySQL just had to locate 17 rows from the  jobTitle index as indicated in the key column without scanning the whole table.

# To show the indexes of a table, you use the SHOW INDEXES statement, for example:
SHOW INDEXES FROM employees;	

# DROP INDEX `index_id` ON `table_name`;

------------------------------------------
# Create Index
CREATE INDEX person_first_name_idx
ON person (first_name)

# Multi Column INDEX
CREATE INDEX person_first_name_last_name_idx 
ON person (first_name, last_name)

https://www.youtube.com/watch?v=fsG1XaZEa78
Indexes in SQL are used to speed up SQL queries.  A database index works much like an index in a book.  For example, if you have a database table with a list of people, a common query would be to lookup someone by name.  Creating an index means the database will not have to scan the entire table looking for matches.  Instead, it will restrict its search to a small portion of the rows.

?>
============================================================================

~Trigger
<?php 
A SQL trigger is a set of  SQL statements stored in the database catalog. It is run just before or just after an INSERT, UPDATE or DELETE event occurs on a particular database table.

# Example
First we will create the table for which the trigger will be set:
=> CREATE TABLE people (age INT, name varchar(150));

Next we will define the trigger.It will be executed before every INSERT statement for the people table:

*************************************************
delimiter
CREATE TRIGGER agecheck BEFORE INSERT ON people FOR EACH ROW IF NEW.age < 0 THEN SET NEW.age = 0; END IF;
delimiter ;
*************************************************

INSERT INTO people VALUES (-20, ‘Sid’), (30, ‘Josh’);

We will insert two records to check the trigger functionality.

At the end we will check the result.

SELECT * FROM people;

| age | name |
+——---+---——-+
| 0   | Sid  |
| 30  | Josh |
+--——-+—---—-+

?>
=========================================================================
Stored Procedures:
<?php

It reduces the network traffic and overhead.

Stored procedure increases performance of your application sometime. When stored procedure created it complie and when it call it never go to parser and direclty execute and fetch the record whereas normal SQL query fired on database server get parse every time so using stored procedure your can save parsing time.

If your application is big or your database server on remote system then by using stored procedure you can decrease the traffic between your database server and application server.

# Advantages
- Reducing unnecessary data transfer across the network

# Disadvantage:
- Doing change in stored procedure directly effect your data so it should always be use with very carefully.

- Stored procedure are set of sql command form our logic so sometime programmer need to debug the stored procedure. In mysql stored procedure it is very hard to debug.


?>

========================================================================

Self join
<?php 
SQL self join is used to join or compare a table to itself. SQL self joins are used to compare values of a column with values of another column in the same table.

emp_id	emp_name dept_id	salary	mgr_id  reports_to
1 		Jack 		2 		1400 	2       2
2 		John 		2 		1450 	2		0			
3 		Johnny 		3 		1050 	2		2
4 		Alan 		3 		1150 	2		2
5 		Virat 		4 		850 	3		6
6 		Vina 		4 		700 	3		3
7 		joya 		4 		700 	3		6	

SELECT distinct e.emp_id, e.emp_name 
FROM employees e 
INNER JOIN employees m 
on e.emp_id=m.mgr_id 

o/p =>
emp_id	emp_name 	
2 		John
3 		Johnny

SELECT 
    e.emp_name emp,
    m.emp_name mngr
FROM
    employees e
INNER JOIN
    employees m ON m.emp_id = e.reports_to;
	
o/p =>	

(emp)  (mngr)
Jack 	John
Johnny 	John
Alan 	John
Virat 	Vina
Vina 	Johnny
joya 	Vina	

The top manager i.e., the CEO, does not report to anyone in the company, therefore, the reportTo column contains the NULL value. To query the whole organization structure including the CEO, you need to use the  LEFT JOIN clause rather than the  INNER JOIN clause as the following query:

SELECT 
    e.emp_name emp,
    m.emp_name mngr
FROM
    employees e
LEFT JOIN
    employees m ON m.emp_id = e.reports_to
ORDER BY mngr;

o/p =>

(emp)  (mngr)	
John 	NULL
Alan 	John
Johnny 	John
Jack 	John
Vina 	Johnny
joya 	Vina
Virat 	Vina
	

?>

=======================================================================================
~Difference between timestamp and datetime.
<?php 
# Range
The supported range for DATETIME type is ‘1000-01-01 00:00:00’ to ‘9999-12-31 23:59:59’.
The supported range for TIMESTAMP type is ‘1970-01-01 00:00:01’ UTC to ‘2038-01-19 03:14:07’ UTC.

That means if you want to store date which is before the year 1970 or after the year 2038 you will need to use DATETIME.

# Size
Datetime requires 5 bytes along with 3 additional bytes for fractional seconds’ data storing. On the other hand, timestamp datatype requires 4 bytes along with 3 additional bytes for fractional seconds’ data storing.

# Indexing
Indexing can be done on timestamp data but datetime data cannot be indexed.
?>

=======================================================================================
~Set Operator UNION and UNION ALL
<?php 
Union operator is used to combine two or more result sets into single result set. By default, Union operator removes duplicate rows( Use UNION ALL operator to retain duplicate rows) 

# RULES:
1. Number and orders of the column must be same.
2. Data type of the column must be same. 
?>


https://www.youtube.com/watch?v=aNyATXKNf0Q

=========================================================================================
~Cross Join
<?php 
- It`s also called as Cartesian Product.
- In this all the records of first table comes with all the records of second table.
- In this condition(Where) is not used.

SELECT * FROM TABLE1, TABLE2;
?>
==========================================================================================
~Relationship
<?php 
# One To One Relationship
Example 1: Person => Movie Ticket
A person has movie ticket.

Example 2: User => Passport
Example 3: Person => Driving License
Example 4: Person => Contact Number

# One To Many Relationship
1. A student has multiple email Ids
2. A Teacher teaches multiple students
3. A Person has multiple phone numbers
4. A Post has multiple comments

# Many To Many Realtionship
1. One author could publish many Books and any Book could be written by many Authors.

-----(author)------
author_id
author_name

-----(book)------
book_id
book_name

-----(author_book)-----
author_id
book_id

2. A student can be enrolled in multiple classes at a time (for example, they may have three or four classes per semester).
A class can have many students (for example, there may be 20 students in one class).

Student ID	Class ID
1			3
1			5
1			9
2			1
2			4
2			5
2			9

Student ID	Student name
1			John
2			Debbie

Class ID	Class name
1			English
2			Maths
3			Spanish
4			Biology
5			Science
6			Programming
7			Law
8			Commerce
9			Physical Education

?>

Group_CONCAT() Function
<?php
Used to concatenate data from multiple rows into one field. This is an aggregate (GROUP BY) function which returns a String value, if the group contains at least one non-NULL value. Otherwise, it returns NULL.
 
EMP_ID	FNAME	LNAME	DEPT_ID		STRENGTH
	1	mukesh	gupta	2			Leadership
	3	neelam	sharma	3			Hard-working
	1	mukesh	gupta	2			Responsible
	2	devesh	tyagi	2			Punctuality
	3	neelam	sharma	3			Self-motivated
	1	mukesh	gupta	2			Quick-learner
	4	keshav	singhal	3			Listening
	2	devesh	tyagi	2			Quick-learner
	5	tanya	jain	1			Hard-working
	4	keshav	singhal	3			Critical thinking
	5	tanya	jain	1			Goal-oriented
	
SELECT emp_id, fname, lname, dept_id, 
GROUP_CONCAT ( strength ) as "strengths" 
FROM employee group by emp_id;	
	
EMP_ID	FNAME	LNAME	DEPT_ID		STRENGTHS
	1	mukesh	gupta	2			Leadership, Resposible, Quick-learner
	2	devesh	tyagi	2			Punctuality, Quick-learner
	3	neelam	sharma	3			Hard-working, Self-motivated
	4	keshav	singhal	3			Listening, Critical thinking
	5	tanya	jain	1			Hard-working, Goal-oriented	
	
SELECT dept_id, 
GROUP_CONCAT ( DISTINCT strength) 
as "employees strengths"  
from employee group by dept_id;	

DEPT_ID	EMPLOYEES STRENGTHS
1		Goal-oriented, Hard-working
2		Leadership, Punctuality, Quick-learner, Responsible
3		Critical thinking, Hard-working, Listening, Self-motivated
	
	
Normalization
<?php

GOOD FOR MYSQL FUNDA => 
http://www.java67.com/2013/01/difference-between-self-and-equi-join-sql-example-inner-mysql.html
http://javarevisited.blogspot.in/2012/12/how-to-find-second-highest-or-maximum-salary-sql.html

# Mysql table engine:

MyISAM

- Default engine as of MySQL 3.23 with great performance.

- The MyISAM tables are not transaction-safe.

- Provides high-speed storage and retrieval, supports full text searching.

- From version 5.5, MySQL uses InnoDB as the default storage engine.

- MyISAM provides table-level locking.

- MYISAM occupies less memory sapce for tables rather than
InnoDB tables.

InnoDB
- This is the default storage engine for MySQL 5.5 and higher.

- The InnoDB tables fully support ACID-compliant and transactions.

- They are also optimal for performance. InnoDB table supports foreign keys, commit, rollback, roll-forward operations. The size of an InnoDB table can be up to 64TB.
(It supports row-level locking, crash recovery)

- It is the only engine which provides foreign key referential integrity constraint.

- Supports FOREIGN KEY referential-integrity constraints. It supports commit, rollback, and crash-recovery capabilities to protect data.

- Row level locking.

What is transaction safe?
- This property makes transaction-safe tables more safe compared to non transaction safe tables. When an update is performed and it fails, all changes are reverted.

- Atomicity: ensures that all operations within the work unit are completed successfully; otherwise, the transaction is aborted at the point of failure and previous operations are rolled back to their former state.



- BerkeleyDB and InnoDB are the transaction-safe table types available in the open source MySQL, version 3.23.34 and greater, 

Advantages of Transaction-Safe Tables
Safer. Even if MySQL crashes or you get hardware problems, you can get your data back, either by automatic recovery or from a backup + the transaction log.
You can combine many statements and accept these all in one go with the COMMIT command.
You can execute ROLLBACK to ignore your changes (if you are not running in auto-commit mode).
If an update fails, all your changes will be restored.
Advantages of Not Transaction-Safe Tables
Much faster as there is no transaction overhead.
Will use less disk space as there is no overhead of transactions.
Will use less memory to perform updates.
With Not Transaction-Safe Tables: If an update fails, no change will be restored as changes that have taken place are permanent.


For example, your application might store a user's settings in different tables, and when they update their information the app sends a series of update statements to the database but they're grouped as one transaction.

The difference is simple. A non-transaction engine can only fetch data from a database and display it, like a list of CDs or books in a library. An engine that supports transaction processing can execute a task using server side functions. Banking online is an example of a transaction processing engine. You access your account from the non-transacting script, the simple database. Once done the transaction engine takes over and manages your money as you choose. 


Locking:

There are two types of transaction locks – table locks and row locks. Table locks are used to avoid a table being altered or dropped by one transaction when another transaction is using the table. It is also used to prohibit a transaction from accessing a table, when it is being altered.

Locking:MYISAM provide the table level locking means if 
the data in one table has been modified by the other 
table ,the entire table will lock for the next process.But 
INNODB provide the row level locking only the row of the 
table that is being updated is locked.

-------------------------------------------------------------------------------------------------------------------------------------------------------

MySQL ON DELETE CASCADE Example

Let’s take a look at an example of using MySQL ON DELETE CASCADE .

We have two tables named buildings and rooms . Each building has one or more rooms. However, each room belongs to only one building. A room would not exist without a building.

The relationship between the buildings table and the rooms table is one-to-many (1:N) as illustrated in the following database diagram:

MySQL On Delete Cascade example

When we delete a record from the buildings table, we want the records in the rooms  table, which associates with the deleted building record to be removed e.g., when we delete a record with building no. 2 in the buildings  table as the following query:


DELETE FROM buildings
WHERE building_no = 2;
1
2
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
-------------------------------------------------------------------------------------------------------------------------------------------------------

# FIND_IN_SET:						http://webrewrite.com/concatenate-column-names-mysql/

FIND_IN_SET(argument1,argument2)


argument1 is a string.
argument2 is a string list separated by comma.

find_in_set() function returns the position of a string within second string. Returns zero when search string doesn’t exist in string list.

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

===============================================================================================
# How to concatenate columns in MySql

There are many times you need to concatenate the values of two or more columns while querying the result. To concatenate columns in MySql there is in-built function for that.

id	firstname	lastname
1	John	    Doe
2	John	    Smith

SELECT concat(firstname,' ',lastname) as user_name FROM users;

user_name
John Doe
John Smith

CONCAT_WS to Concatenate Columns with Separator

select concat_ws(',',firstname,lastname);

It returns the concatenate value of firstname and lastname with comma separated.
===============================================================================================

# IF Condition in MySql:

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

===============================================================================================

#  How to Query NULL Value in MySql:

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

===============================================================================================

# Mysql Join				https://www.sitepoint.com/understanding-sql-joins-mysql-database/

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

Since we’re using InnoDB tables and know that user.course and course.id are related, we can specify a foreign key relationship:

ALTER TABLE `user`
ADD CONSTRAINT `FK_course`
FOREIGN KEY (`course`) REFERENCES `course` (`id`)
ON UPDATE CASCADE;

In essence, MySQL will automatically:

- re-number the associated entries in the user.course column if the course.id changes
- reject any attempt to delete a course where users are enrolled.

INNER JOIN - 
The most frequently used clause is INNER JOIN. This produces a set of records which match in both the user and course tables, i.e. all users who are enrolled on a course:

SELECT user.name, course.name
FROM `user`
INNER JOIN `course` on user.course = course.id;

Result:
user.name	course.name
Alice	    HTML5
Bob	        HTML5
Carline	    CSS3
David	    MySQL


LEFT JOIN -
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


RIGHT JOIN - 
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

RIGHT JOINs are rarely used since you can express the same result using a LEFT JOIN. This can be more efficient and quicker for the database to parse:
SELECT user.name, course.name
FROM `course`
LEFT JOIN `user` on user.course = course.id;

We could, for example, count the number of students enrolled on each course:

SELECT course.name, COUNT(user.name)
FROM `course`
LEFT JOIN `user` ON user.course = course.id
GROUP BY course.id;

Result:

course.name	 count()
HTML5	     2
CSS3	     1
JavaScript	 0
PHP	         0
MySQL	     1


OUTER JOIN (or FULL OUTER JOIN) - 

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

================================================================================================

# Mysql 'BETWEEN' operator :

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


# MySQL BETWEEN with dates example: 

When you use the BETWEEN operator with date values, to get the best result, you should use the type cast to explicitly convert the type of column or expression to the DATE type.

For example, to get the orders whose required dates are from 01/01/2003 to 01/31/2003, you use the following query:

SELECT orderNumber,requiredDate,status
FROM orders
WHERE requireddate
BETWEEN CAST('2003-01-01' AS DATE)
AND CAST('2003-01-31' AS DATE);

Because the data type of the required date column is DATE so we used the cast operator to convert the literal strings ‘2003-01-01 ‘ and ‘2003-12-31 ‘ to the DATE data type.

=========================================================================================
# MySQL LIMIT clause:

The LIMIT clause accepts one or two arguments. The values of both arguments must be zero or positive integers.

SELECT column1,column2,...
FROM table
LIMIT offset , count;

The offset specifies the offset of the first row to return. The offset of the first row is 0, not 1.
The count specifies the maximum number of rows to return.
==========================================================================================

# primary key vs unique key in SQL:

primary key and unique key are two important concept in relational database, and used to uniquely identify a row in a table. Both primary key and unique key can identify a row uniquely but there are some subtle difference between them.
1) Unique key in a table can be null
2) There can be only one primary key per table in relation database e.g. MySQL,
but there can be more than one unique key per table.1234567890

# Database Transaction: 
Transaction in the database is required to protect data and keep it consistent when multiple users access the database at the same time. 

http://javarevisited.blogspot.in/2011/11/database-transaction-tutorial-example.html  --------(Very Good)

============================================================================================

# Self join

SQL self join is used to join or compare a table to itself. SQL self joins are used to compare values of a column with values of another column in the same table.


	
SELECT 
    concat(e.firstname, e.lastname) employee,
    concat(m.firstname, m.lastname) manager
FROM
    employees e
INNER JOIN
    employees m ON m.employeeid = e.reportsto;	

http://www.zentut.com/sql-tutorial/sql-self-join/
http://www.java67.com/2013/01/difference-between-self-and-equi-join-sql-example-inner-mysql.html
http://www.w3resource.com/sql/joins/perform-a-self-join.php

===============================================================================================

# Stored Procedures:

It reduces the network traffic and overhead.

Stored procedure increases performance of your application sometime. When stored procedure created it complie and when it call it never go to parser and direclty execute and fetch the record whereas normal SQL query fired on database server get parse every time so using stored procedure your can save parsing time.

If your application is big or your database server on remote system then by using stored procedure you can decrease the traffic between your database server and application server.

Advantages
* Reduce network usage between clients and servers – stored procedures perform intermediate processing on the database server reducing unnecessary data transfer across the network

Disadvantage:
- Doing change in stored procedure directly effect your data so it should always be use with very carefully.

- Stored procedure are set of sql command form our logic so sometime programmer need to debug the stored procedure. In mysql stored procedure it is very hard to debug.
=================================================================================================
# Trigger:

A SQL trigger is a set of  SQL statements stored in the database catalog.is run just before or just after an INSERT, UPDATE or DELETE event occurs on a particular database table.

Here is an example of a MySQL trigger:

First we will create the table for which the trigger will be set:

mysql> CREATE TABLE people (age INT, name varchar(150));

Next we will define the trigger. It will be executed before every INSERT statement for the people table:

mysql> delimiter //
mysql> CREATE TRIGGER agecheck BEFORE INSERT ON people FOR EACH ROW IF NEW.age < 0 THEN SET NEW.age = 0; END IF;//
mysql> delimiter ;

We will insert two records to check the trigger functionality.

mysql> INSERT INTO people VALUES (-20, ‘Sid’), (30, ‘Josh’);

At the end we will check the result.

SELECT * FROM people;

| age | name |
+——---+---——-+
| 0   | Sid  |
| 30  | Josh |
+--——-+—---—-+

==========================================================================================-

# Index

A database index is a data structure that improves the speed of operations in a table. Indexes can be created using one or more columns, providing the basis for both rapid random lookups and efficient ordering of access to records.
A database index, or just index, helps speed up the retrieval of data from tables.
Notice that all primary key columns are in the primary index of  the table automatically.
If you create an index for every column, MySQL has to build and maintain the index table. Whenever a change is made to the rows of the table, MySQL has to rebuild the index, which takes time as well as decreases the performance of the database server.

You can compare MySQL indexes with the index in a book. Within the index of a book, you can easily find the correct page that contains the subject you were looking for. If there weren’t any indexes, you had to go through the whole book, searching for pages that contain the subject.

As you can imagine, it’s way faster to search by an index than having to go through each page.

Every time your web application runs a database query containing a WHERE statement, the database servers job is to look through all the rows in your table to find those that match your request. As the table grows, an increasing number of rows need to be inspected each time.

https://blog.viaduct.io/mysql-indexes-primer/

# Create Index
CREATE INDEX person_first_name_idx
ON person (first_name)

# Multi Column INDEX
CREATE INDEX person_first_name_last_name_idx 
ON person (first_name, last_name)

https://www.youtube.com/watch?v=fsG1XaZEa78
Indexes in SQL are used to speed up SQL queries.  A database index works much like an index in a book.  For example, if you have a database table with a list of people, a common query would be to lookup someone by name.  Creating an index means the database will not have to scan the entire table looking for matches.  Instead, it will restrict its search to a small portion of the rows
==========================================================================================


# SQL query to find second maximum salary of Employee

SELECT * FROM Employee;
+--------+----------+---------+--------+
| emp_id | emp_name | dept_id | salary |
+--------+----------+---------+--------+
| 1      | James    | 10      |   2000 |
| 2      | Jack     | 10      |   4000 |
| 3      | Henry    | 11      |   6000 |
| 4      | Tom      | 11      |   8000 |
+--------+----------+---------+--------+

mysql> SELECT max(salary) FROM Employee WHERE salary NOT IN (SELECT max(salary) FROM Employee);

mysql> SELECT max(salary) FROM Employee WHERE salary < (SELECT max(salary) FROM Employee);

mysql> SELECT TOP 1 salary FROM ( SELECT TOP 2 salary FROM employees ORDER BY salary DESC) AS emp ORDER BY salary ASC

mysql> SELECT salary  FROM (SELECT salary FROM Employee ORDER BY salary DESC LIMIT 2) AS emp ORDER BY salary LIMIT 1;

# SQL query to find maximum salary of Employee
SELECT Name, Salary FROM Minions
WHERE Salary = (SELECT Max(Salary) FROM Minions)

# GROUP CONCAT

http://www.w3resource.com/mysql/aggregate-functions-and-grouping/aggregate-functions-and-grouping-group_concat.php

===========================================================================================

# ENUM in MySQL

# cursors 

# Data Definition Language dealing with database schemas as well as the description of how data resides in the database. An example is CREATE TABLE command. DML denotes Data Manipulation Language such as SELECT, INSERT etc. DCL stands for Data Control Language and includes commands like GRANT, REVOKE etc.

# The IFNULL() statement test its first argument and returns if it’s not NULL, or returns its second argument, otherwise.

# Get employee details from employee table whose joining year is “2013”
Select * from EMPLOYEE where year(joining_date)='2013'

# Get employee details from employee table whose joining month is “January”
Select * from EMPLOYEE where month(joining_date)='01'

# Get employee details from employee table who joined before January 1st 2013
Select * from EMPLOYEE where joining_date <'2013-01-01'

# employee table who joined after January 31st
Select * from EMPLOYEE where joining_date >'2013-01-31'

# Get Joining Date and Time from employee table
Select CONVERT(DATE_FORMAT(joining_date,'%Y-%m-%d-%H:%i:00'),DATETIME) from EMPLOYEE

=======================================================================================

# VIEW in Mysql

In simple language , Views are nothing but virtual tables and do not contain data in itself but display data stored in other tables. Views can be used for data abstraction i.e. to hide complexity of underlying table. 

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

=======================================================================================-

# DDL, DML and DCL ?
DDL:- DDL stands for Data Definition Language.Its deals with database schemas and descriptions of
how the data should reside in the database.Example:- CREATE TABLE or ALTER TABLE,
DML:- DML stands for data manipulation Language.Its deals with SELECT, INSERT, UPDATE ,
DELETE etc.
DCL:- DCL stand for Data Control Language.Its contain commands like GRANT,Revoke etc.


=======================================================================================

# nth highest salary in MySQL without using subquery as shown below:

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

=======================================================================================
--------------------------------------------------------------------------------------------------------------
--------------------------------------------------------------------------------------------------------------

# What happens when the column is set to AUTO INCREMENT and if you reach maximum value in the table?
=> It stops incrementing. Any further inserts are going to produce an error, since the key has been used already.
dangling pointer.

# How can you see all indexes defined for a table?
=> Indexes are defined for the table by:
SHOW INDEX FROM <tablename>;

# How many columns can be used for creating Index?
=> Maximum of 16 indexed columns can be created for any standard table

# What is the different between NOW() and CURRENT_DATE()?
=> NOW () command is used to show current year,month,date with hours,minutes and seconds.
CURRENT_DATE() shows current year,month and date only.

# The default port for MySQL server is 3306

# difference in DBMS and RDBMS. 

# What Boolean Operators Does JavaScript Support?
=> Javascript generally supports the true and false values.
How To Read And Write A File Using Javascript?

 oops concept
 
=======================================================================
======================================================================= 
 
# Select first 3 characters of FIRST_NAME from EMPLOYEE
=> select substring(FIRST_NAME,1,3) from employee 
 
# Get First_Name and Last_Name as single column from employee table separated by a '_' 
=> Select concat(FIRST_NAME,'_',LAST_NAME) from EMPLOYEE 
 
# Get employee details from employee table whose joining year is “2013” 
=> Select * from EMPLOYEE where year(joining_date)='2013'

=======================================================================

# Normalization:
A technique of organizing the data into multiple related tables, to minimize Data Redundancy.

WHAT IS DATA REDUNDANCY AND WHY SHOULD WE REDUCE IT?
=> Data redundancy means, repetation of similar data at multiple places. Unnecessary data repetition increase the size of the database.

HOW Normalization SOLVE ALL THESE PROBLEMS?
=> Normalization bracks the student table into "Student Table" + "Branch Table"
Normalization reduce the data redundancy and Make the data more meaninigful.

(student_table)
roll_no	name branch

(branch_table)
branch hod branch_tel

# 1st Normal Form : 
Table can be easily extendable and easy to use to retrive the data, It means Scalable Table design which can be easily extended.

Four basic rules:
- Each column should contain atomic value.
- A Column should contain values that are of the same type.
- Each column should have unique name.
- Order in which data is saved doesn`t matter.

# 2nd Normal Form :
Criteria :
- It should be in 1st Normal Form
- And. It should not have any partial dependencies. 

# 3nd Normal Form :
Criteria :

=====================================================================================
# Table design for "Online Store"
=> items - For storing all selling items.
=> categories - For categorizing selling items.
=> statuses - For defining object status.
=> suppliers - For storing all suppliers.
=> cutomers - For storing all customers.
=> orders - For storing all customer orders. 

(items)
Key 	Coulmn Name 		Definition
PK		id					INT(10) UNSIGNED NOT NULL AUTO_INCREMENT
		name				VARCHAR(30) NOT NULL
		price				FLOAT UNSIGNED NOT NULL
		in_stock			TINYINT(3) UNSIGNED NOT NULL DEFAULT 0
FK 		category_id			SMALLINT(5) UNSIGNED NOT NULL DEFAULT 1
FK		status_id			TINYINT(3) UNSIGNED NOT NULL DEFAULT 1
FK 		supplier_id			INT(10) UNSIGNED NOT NULL DEFAULT 1
		created_time		TIMESTAMP DEFAULT CURRENT_TIMESTAMP
		updated_time		TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP

(categories)
Key 	Coulmn Name 		Definition
PK		id					INT(10) UNSIGNED NOT NULL AUTO_INCREMENT
		name				VARCHAR(30) NOT NULL
FK 		parent_id			SMALLINT(5) UNSIGNED NOT NULL DEFAULT 1
		created_time		TIMESTAMP DEFAULT CURRENT_TIMESTAMP
		updated_time		TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP

(statuses)
Key 	Coulmn Name 		Definition
PK		id					INT(10) UNSIGNED NOT NULL AUTO_INCREMENT
		name				VARCHAR(30) NOT NULL
		created_time		TIMESTAMP DEFAULT CURRENT_TIMESTAMP
		updated_time		TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP

(suppliers)
Key 	Coulmn Name 		Definition
PK		id					INT(10) UNSIGNED NOT NULL AUTO_INCREMENT
		name				VARCHAR(30) NOT NULL
		phone				VARCHAR(20) NOT NULL
		address				VARCHAR(100) NOT NULL
		created_time		TIMESTAMP DEFAULT CURRENT_TIMESTAMP
		updated_time		TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP

(cutomers)
Key 	Coulmn Name 		Definition
PK		id					INT(10) UNSIGNED NOT NULL AUTO_INCREMENT
		name				VARCHAR(30) NOT NULL
		email				VARCHAR(50) NOT NULL
		password			VARCHAR(50) NOT NULL
		address				VARCHAR(100) NOT NULL
		created_time		TIMESTAMP DEFAULT CURRENT_TIMESTAMP
		updated_time		TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP

(orders)
Key 	Coulmn Name 		Definition
PK		id					INT(10) UNSIGNED NOT NULL AUTO_INCREMENT
		quantities			TINYINT(3) UNSIGNED NOT NULL DEFAULT 1
		item_id				INT(10) UNSIGNED NOT NULL
		customer_id			INT(10) UNSIGNED NOT NULL
		status_id			TINYINT(3) UNSIGNED NOT NULL DEFAULT 4
		order_time			TIMESTAMP DEFAULT CURRENT_TIMESTAMP



https://www.webslesson.info/2016/08/simple-php-mysql-shopping-cart.html

https://github.com/ramortegui/e-commerce-db/blob/master/export/ecommerce-db-db2.sql

https://web-cart.com/documentation/

https://www.codexworld.com/simple-php-shopping-cart-using-sessions/  ------------------------------(Good)

Minimum 4 database tables (products, customers, orders, and order_items) are needed to create a simple session-based shopping cart in PHP with MySQL

CREATE TABLE `products` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
 `description` text COLLATE utf8_unicode_ci NOT NULL,
 `price` float(10,2) NOT NULL,
 `created` datetime NOT NULL,
 `modified` datetime NOT NULL,
 `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=Active | 0=Inactive',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `customers` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `first_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
 `last_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
 `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
 `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
 `address` text COLLATE utf8_unicode_ci NOT NULL,
 `created` datetime NOT NULL,
 `modified` datetime NOT NULL,
 `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=Active | 0=Inactive',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `orders` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `customer_id` int(11) NOT NULL,
 `grand_total` float(10,2) NOT NULL,
 `created` datetime NOT NULL,
 `status` enum('Pending','Completed','Cancelled') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Pending',
 PRIMARY KEY (`id`),
 KEY `customer_id` (`customer_id`),
 CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `order_items` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `order_id` int(11) NOT NULL,
 `product_id` int(11) NOT NULL,
 `quantity` int(5) NOT NULL,
 PRIMARY KEY (`id`),
 KEY `order_id` (`order_id`),
 CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



https://www.codeofaninja.com/2015/08/simple-php-mysql-shopping-cart-tutorial.html ------------------------------(Good)

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(512) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='products that can be added to cart' AUTO_INCREMENT=41 ;

CREATE TABLE IF NOT EXISTS `product_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `name` varchar(512) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='image files related to a product' AUTO_INCREMENT=105 ;

CREATE TABLE IF NOT EXISTS `cart_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;





















































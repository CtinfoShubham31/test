<?php

# MongoDB:
It is an open-source, cross-platform, document-oriented database written in C++ programming language.MongoDB database allows functioning such as insert, update, delete, query, projection, sort () and limit () methods, create and drop collection and many to list.

Mongodb is a document-oriented NoSQL database mainly used for high volume data storage.


# To start MongoDB, open the command prompt and write the following statements there:
C:\>cd mongodb\bin
C:\mongodb\bin> mongod

Now after that start and stop the service MongoDB via command line:
net start MongoDB
net stop MongoDB


# Invoke another cmd command window to establish connection to database terminal shell
c:\mongodb\bin\mongo.exe


use DATABASE_NAME

Example:
>use mydb
switched to db mydb

To check your currently selected database, use the command db
>db
mydb

If you want to check your databases list, use the command show dbs.
>show dbs
local     0.78125GB
test      0.23012GB

Your created database (mydb) is not present in list. To display database, you need to insert at least one document into it.

>db.movie.insert({"name":"tutorials point"})
>show dbs
local      0.78125GB
mydb       0.23012GB
test       0.23012GB

In MongoDB default database is test. If you did not create any database, then collections will be stored in test database.
----------------------------------------------------------------------------------------------------
# The dropDatabase() Method
db.dropDatabase() command is used to drop a existing database

Example
First, check the list of available databases by using the command, show dbs.

>show dbs
local      0.78125GB
mydb       0.23012GB
test       0.23012GB
>
If you want to delete new database <mydb>, then dropDatabase() command would be as follows −

>use mydb
switched to db mydb
>db.dropDatabase()
>{ "dropped" : "mydb", "ok" : 1 }
>
Now check list of databases.

>show dbs
local      0.78125GB
test       0.23012GB
>
------------------------------------------------------------------------------------------------
# The createCollection() Method

db.createCollection(name, options) is used to create collection.

Examples:
>use test
switched to db test
>db.createCollection("mycollection")
{ "ok" : 1 }
>
------------------------------------------------------------------------------------------------
# The drop() Method
db.collection.drop() is used to drop a collection from the database.

db.COLLECTION_NAME.drop()

--------------------------------------------------------------------------------------

#The insert() Method:

>db.COLLECTION_NAME.insert(document)

Examples:
>db.mycol.insert({
   _id: ObjectId(7df78ad8902c),
   title: 'MongoDB Overview', 
   description: 'MongoDB is no sql database',
   by: 'tutorials point',
   url: 'http://www.tutorialspoint.com',
   tags: ['mongodb', 'database', 'NoSQL'],
   likes: 100
})

In the inserted document, if we do not specify the _id parameter, then MongoDB assigns a unique ObjectId for this document.

---------------------------------------------------------------------------

# The find() Method:

>db.COLLECTION_NAME.find()
find() method will display all the documents in a non-structured way.


# The pretty() Method:

To display the results in a formatted way, you can use pretty() method.

Syntax
>db.mycol.find().pretty()
Example
>db.mycol.find().pretty()
{
   "_id": ObjectId(7df78ad8902c),
   "title": "MongoDB Overview", 
   "description": "MongoDB is no sql database",
   "by": "tutorials point",
   "url": "http://www.tutorialspoint.com",
   "tags": ["mongodb", "database", "NoSQL"],
   "likes": "100"
}
>
Apart from find() method, there is findOne() method, that returns only one document.


# AND in MongoDB:
Syntax
>db.mycol.find(
	{
		$and: [
			{key1: value1}, {key2:value2}
		]
	}
).pretty()

Example:

>db.mycol.find({$and:[{"by":"tutorials point"},{"title": "MongoDB Overview"}]}).pretty() 
{
   "_id": ObjectId(7df78ad8902c),
   "title": "MongoDB Overview", 
   "description": "MongoDB is no sql database",
   "by": "tutorials point",
   "url": "http://www.tutorialspoint.com",
   "tags": ["mongodb", "database", "NoSQL"],
   "likes": "100"
}
For the above given example, equivalent where clause will be ' where by = 'tutorials point' AND title = 'MongoDB Overview' '.

# OR in MongoDB:

>db.mycol.find(
   {
      $or: [
         {key1: value1}, {key2:value2}
      ]
   }
).pretty()

Example
>db.mycol.find({$or:[{"by":"tutorials point"},{"title": "MongoDB Overview"}]}).pretty()
{
   "_id": ObjectId(7df78ad8902c),
   "title": "MongoDB Overview", 
   "description": "MongoDB is no sql database",
   "by": "tutorials point",
   "url": "http://www.tutorialspoint.com",
   "tags": ["mongodb", "database", "NoSQL"],
   "likes": "100"
}
>

# Using AND and OR Together

'where likes>10 AND (by = 'tutorials point' OR title = 'MongoDB Overview')'

>db.mycol.find({"likes": {$gt:10}, $or: [{"by": "tutorials point"},{"title": "MongoDB Overview"}]}).pretty()
{
   "_id": ObjectId(7df78ad8902c),
   "title": "MongoDB Overview", 
   "description": "MongoDB is no sql database",
   "by": "tutorials point",
   "url": "http://www.tutorialspoint.com",
   "tags": ["mongodb", "database", "NoSQL"],
   "likes": "100"
}
>


# MongoDB Update() Method:

>db.COLLECTION_NAME.update(SELECTION_CRITERIA, UPDATED_DATA)


Example
Consider the mycol collection has the following data.

{ "_id" : ObjectId(5983548781331adf45ec5), "title":"MongoDB Overview"}
{ "_id" : ObjectId(5983548781331adf45ec6), "title":"NoSQL Overview"}
{ "_id" : ObjectId(5983548781331adf45ec7), "title":"Tutorials Point Overview"}

Following example will set the new title 'New MongoDB Tutorial' of the documents whose title is 'MongoDB Overview'.

>db.mycol.update({'title':'MongoDB Overview'},{$set:{'title':'New MongoDB Tutorial'}})
>db.mycol.find()
{ "_id" : ObjectId(5983548781331adf45ec5), "title":"New MongoDB Tutorial"}
{ "_id" : ObjectId(5983548781331adf45ec6), "title":"NoSQL Overview"}
{ "_id" : ObjectId(5983548781331adf45ec7), "title":"Tutorials Point Overview"}
>

By default, MongoDB will update only a single document. To update multiple documents, you need to set a parameter 'multi' to true.

>db.mycol.update({'title':'MongoDB Overview'},
   {$set:{'title':'New MongoDB Tutorial'}},{multi:true})


# MongoDB Save() Method

The save() method replaces the existing document with the new document passed in the save() method.
The db.collection.save() method is used to updates an existing document or inserts a new document, depending on its document parameter.

Syntax:
Syntax
The basic syntax of MongoDB save() method is shown below −

>db.COLLECTION_NAME.save({_id:ObjectId(),NEW_DATA})
Example
Following example will replace the document with the _id '5983548781331adf45ec5'.

>db.mycol.save(
   {
      "_id" : ObjectId(5983548781331adf45ec5), "title":"Tutorials Point New Topic",
      "by":"Tutorials Point"
   }
)
>db.mycol.find()
{ "_id" : ObjectId(5983548781331adf45ec5), "title":"Tutorials Point New Topic",
   "by":"Tutorials Point"}
{ "_id" : ObjectId(5983548781331adf45ec6), "title":"NoSQL Overview"}
{ "_id" : ObjectId(5983548781331adf45ec7), "title":"Tutorials Point Overview"}
>

# The remove() Method:
MongoDBs remove() method is used to remove a document from the collection. remove() method accepts two parameters. One is deletion criteria and second is justOne flag.

deletion criteria − (Optional) deletion criteria according to documents will be removed.

justOne − (Optional) if set to true or 1, then remove only one document.

Syntax
Basic syntax of remove() method is as follows −

>db.COLLECTION_NAME.remove(DELLETION_CRITTERIA)
Example
Consider the mycol collection has the following data.

{ "_id" : ObjectId(5983548781331adf45ec5), "title":"MongoDB Overview"}
{ "_id" : ObjectId(5983548781331adf45ec6), "title":"NoSQL Overview"}
{ "_id" : ObjectId(5983548781331adf45ec7), "title":"Tutorials Point Overview"}
Following example will remove all the documents whose title is 'MongoDB Overview'.

>db.mycol.remove({'title':'MongoDB Overview'})
>db.mycol.find()
{ "_id" : ObjectId(5983548781331adf45ec6), "title":"NoSQL Overview"}
{ "_id" : ObjectId(5983548781331adf45ec7), "title":"Tutorials Point Overview"}
>

# Remove Only One
If there are multiple records and you want to delete only the first record, then set justOne parameter in remove() method.

>db.COLLECTION_NAME.remove(DELETION_CRITERIA,1)

# Remove All Documents
>db.mycol.remove()


# MongoDB - Projection
In MongoDB, projection means selecting only the necessary data rather than selecting whole of the data of a document. If a document has 5 fields and you need to show only 3, then select only 3 fields from them.

The find() Method
MongoDBs find() method, explained in MongoDB Query Document accepts second optional parameter that is list of fields that you want to retrieve. In MongoDB, when you execute find() method, then it displays all fields of a document. To limit this, you need to set a list of fields with value 1 or 0. 1 is used to show the field while 0 is used to hide the fields.

Syntax
The basic syntax of find() method with projection is as follows −

>db.COLLECTION_NAME.find({},{KEY:1})
Example
Consider the collection mycol has the following data −

{ "_id" : ObjectId(5983548781331adf45ec5), "title":"MongoDB Overview"}
{ "_id" : ObjectId(5983548781331adf45ec6), "title":"NoSQL Overview"}
{ "_id" : ObjectId(5983548781331adf45ec7), "title":"Tutorials Point Overview"}
Following example will display the title of the document while querying the document.

>db.mycol.find({},{"title":1,_id:0})
{"title":"MongoDB Overview"}
{"title":"NoSQL Overview"}
{"title":"Tutorials Point Overview"}
>
Please note _id field is always displayed while executing find() method, if you don`t want this field, then you need to set it as 0.

----------------------------------------------------------------------------------------

# The Limit() Method
The method accepts one number type argument, which is the number of documents that you want to be displayed.

Syntax:
>db.COLLECTION_NAME.find().limit(NUMBER)

Example
Consider the collection myycol has the following data.

{ "_id" : ObjectId(5983548781331adf45ec5), "title":"MongoDB Overview"}
{ "_id" : ObjectId(5983548781331adf45ec6), "title":"NoSQL Overview"}
{ "_id" : ObjectId(5983548781331adf45ec7), "title":"Tutorials Point Overview"}
Following example will display only two documents while querying the document.

>db.mycol.find({},{"title":1,_id:0}).limit(2)
{"title":"MongoDB Overview"}
{"title":"NoSQL Overview"}

If you don`t specify the number argument in limit() method then it will display all documents from the collection.

----------------------------------------------------------------------------------------

# MongoDB Skip() Method
skip() which also accepts number type argument and is used to skip the number of documents.

Syntax:
>db.COLLECTION_NAME.find().limit(NUMBER).skip(NUMBER)

{ "_id" : ObjectId(5983548781331adf45ec5), "title":"MongoDB Overview"}
{ "_id" : ObjectId(5983548781331adf45ec6), "title":"NoSQL Overview"}
{ "_id" : ObjectId(5983548781331adf45ec7), "title":"Tutorials Point Overview"}

Example:
Following example will display only the second document.

>db.mycol.find({},{"title":1,_id:0}).limit(1).skip(1)
{"title":"NoSQL Overview"}

----------------------------------------------------------------------------------------

# The sort() Method
The method accepts a document containing a list of fields along with their sorting order. To specify sorting order 1 and -1 are used. 1 is used for ascending order while -1 is used for descending order.

Syntax:
>db.COLLECTION_NAME.find().sort({KEY:1})

Example
Consider the collection myycol has the following data.

{ "_id" : ObjectId(5983548781331adf45ec5), "title":"MongoDB Overview"}
{ "_id" : ObjectId(5983548781331adf45ec6), "title":"NoSQL Overview"}
{ "_id" : ObjectId(5983548781331adf45ec7), "title":"Tutorials Point Overview"}
Following example will display the documents sorted by title in the descending order.

>db.mycol.find({},{"title":1,_id:0}).sort({"title":-1})
{"title":"Tutorials Point Overview"}
{"title":"NoSQL Overview"}
{"title":"MongoDB Overview"}

Please note, if you don`t specify the sorting preference, then sort() method will display the documents in ascending order.

------------------------------------------------------------------------------------

# The ensureIndex() Method
To create an index you need to use ensureIndex() method of MongoDB.

Syntax:
>db.COLLECTION_NAME.ensureIndex({KEY:1})
Here key is the name of the field on which you want to create index and 1 is for ascending order. To create index in descending order you need to use -1.

Example
>db.mycol.ensureIndex({"title":1})

In ensureIndex() method you can pass multiple fields, to create index on multiple fields
>db.mycol.ensureIndex({"title":1,"description":-1})

ensureIndex() method also accepts list of options (which are optional).

---------------------------------------------------------------------------------------

# Employee salary nth highest salary:

db.Employees.find({}).sort({"Emp salary":-1}).limit(1) //for first highest salary

db.Employees.find({}).sort({"Emp salary":-1}).skip(1).limit(1) // for second highest salary
Similarly you can do db.Employees.find({}).sort({"Emp salary":-1}).skip(nthVarible - 1).limit(1).

			OR 
			
Records I have

{ "_id" : ObjectId("5cc04b02536dc2e493697b4e"), "name" : "Ankit" }
{ "_id" : ObjectId("5cc0504a536dc2e493697b50"), "name" : "Ankit", "salary" : 1000, "email" : "a@b.com", "joining_date" : ISODate("2019-04-24T12:02:18.528Z") }
{ "_id" : ObjectId("5cc0504a536dc2e493697b51"), "name" : "Priya", "salary" : 1300, "email" : "p@b.com", "joining_date" : ISODate("2019-04-24T12:02:18.528Z") }
{ "_id" : ObjectId("5cc0504a536dc2e493697b52"), "name" : "Raj", "salary" : 1200, "email" : "rj@b.com", "joining_date" : ISODate("2019-04-24T12:02:18.528Z") }
{ "_id" : ObjectId("5cc0504a536dc2e493697b53"), "name" : "Vishu", "salary" : 1500, "email" : "v@b.com", "joining_date" : ISODate("2019-04-24T12:02:18.528Z") }
{ "_id" : ObjectId("5cc0504a536dc2e493697b54"), "name" : "Rahul", "salary" : 2000, "email" : "ra@b.com", "joining_date" : ISODate("2019-04-24T12:02:18.528Z") }
{ "_id" : ObjectId("5cc08b5d536dc2e493697b57"), "name" : "Tushar", "salary" : 2000, "email" : "tu@b.com", "joining_date" : ISODate("2019-04-24T16:14:21.061Z") }
Find distinct salaries and store in a variable

sal = db.employee.distinct("salary").sort()
Output: [ 1000, 1200, 1300, 1500, 2000 ]

You can get the second highest salary from this array itself. Below query will give you the record with that salary

db.employee.find({salary:{$lt:sal[sal.length-1]}}).sort({"salary":-1}).limit(1)
Output:

{ "_id" : ObjectId("5cc0504a536dc2e493697b53"), "name" : "Vishu", "salary" : 1500, "email" : "v@b.com", "joining_date" : ISODate("2019-04-24T12:02:18.528Z") }

--------------------------------------------------------------------------------
# Methods to Create MongoDB Relationships
In MongoDB, you can create a relationship using the following methods:
1. Embedded Relationships
2. Documented Reference Relationships

https://data-flair.training/blogs/mongodb-relationships/
https://docs.mongodb.com/manual/tutorial/model-embedded-one-to-many-relationships-between-documents/

--------------------------------------------------------------------------------

# Advantage:
1. Flexible Database
We know that MongoDB is a schema-less database. That means we can have any type of data in a separate document. This thing gives us flexibility and a freedom to store data of different types.

2. Sharding
horizontal scaling over multiple machines
We can store a large data by distributing it to several servers connected to the application. If a server cannot handle such a  big data then there will be no failure condition. The term we can use here is “auto-sharding”.

3. High Speed
MongoDB is a document-oriented database. It is easy to access documents by indexing. Hence, it provides fast query response. The speed of MongoDB is 100 times faster than the relational database.

4. Scalability
A great advantage of MongoDB is that it is a horizontally scalable database. When you have to handle a large data, you can distribute it to several machines.

# Disavantage:
1. Not support transaction
2. Not support join operation
3. Limited Data Size
You can have document size, not more than 16MB.










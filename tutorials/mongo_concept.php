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

>db.mycol.find({"likes": {$gt:10}, $or: [{"by": "tutorials point"},
   {"title": "MongoDB Overview"}]}).pretty()
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




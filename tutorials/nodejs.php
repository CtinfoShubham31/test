Introduction
<?php 
Node.js is a very powerful JavaScript-based framework/platform built on Google Chrome`s JavaScript V8 Engine.It is used for creating server-side and networking web applications.

# Node.js uses asynchronous programming!
A common task for a web server can be to open a file on the server and return the content to the client.
Here is how Node.js handles a file request:

> Sends the task to the computer`s file system.
> Ready to handle the next request.
> When the file system has opened and read the file, the server returns the content to the client.
Node.js eliminates the waiting, and simply continues with the next request.

# Node.js Features and Benefits
Faster code execution
Highly scalable
Non-blocking APIs
No buffering

The following are the key areas where Node.js is widely used:

I/O-bound applications(non-blocking I/O model)
Data streaming applications
Data-intensive real-time applications (DIRT)
JSON API-based applications
Single-page applications

There are many companies currently using Node.js such as eBay, General Electric, GoDaddy, Microsoft, PayPal, Uber, Wikipins, Yahoo!, IBM, Groupon, LinkedIn, Netflix and many others.
?>

Creating Web Server Using http Module
*************************
Modules - http, request which helps in processing server related requests. 
**************************
<?php 
Our application is going to create a simple server module which will listen on port no 7000. If a request is made through the browser on this port no, then server application will send a 'Hello World' response to the client.

# Example 1.)
var http=require('http');  //Calls the http library
var server=http.createServer(function(request,response) //Create the server using http library
{  
	response.writeHead(200,{"Content-Type" : "text/plain"}); //Set the content header
	response.end("Hello World\n"); 		//Send the string to the response
});
server.listen(7000);		//Make the server listen on port 7000

/*In the above example, we import the http module using require() function. The http module is a core module of Node.js, so no need to install it using NPM. The next step is to call createServer() method of http and specify callback function with request and response parameter. Finally, call listen() method of server object which was returned from createServer() method with port number, to start listening to incoming requests on port 7000. You can specify any unused port here.

Run the above web server by writing node server.js command in command prompt or terminal window and it will display message.

Now your computer will work as server so if anyone tries to access your computer with port 7000, then in return they will get a “Hello world” message like as shown below.
*/

Example 2.)
var http=require('http');
http.createServer(function(req,res){ 
	res.writeHead(200,{"Content-Type" : "text/html"}); 
	res.write("Hello From Server");
	res.end();
}).listen(3000);

# Example 3.)
var http=require('http');
http.createServer(function(req,res){ 
	res.writeHead(200,{"Content-Type" : "text/html"}); 
	res.write("Request receive at server"+ req.url +"<br/>");
	res.write("Hello From Server");
	res.end();
}).listen(3000);

url => http://localhost:3000/hi-this-just-testing
o/p => Request receive at server/hi-this-just-testing
Hello From Server
?>

# Reading Json File And Using Routing
<?php 
# STEP 1. Here we are filtering json file using filter function of javascript
------------------(D:\node_test\public\data\staff.json)---------------------

[
    {
        "name":"shubham",
        "age":30,
        "company":"Advaz101",
        "language":"Nodejs"
    },
    {
        "name":"shivam",
        "age":28,
        "company":"Capgamini",
        "language":"Phonegap"
    },
    {
        "name":"Karnish",
        "age":29,
        "company":"Just Dial",
        "language":"DB"
    },
    {
        "name":"Ankita",
        "age":25,
        "company":"Devi Ahiliya",
        "language":"C++"
    }
]

---------------(D:\node_test\public\readjson.js)---------------

var http=require('http');
var staff = require('./public/data/staff.json');

var server = http.createServer(function(req,res){ 
    if(req.url === "/"){
        res.writeHead(200,{"Content-Type" : "text/html"}); 
        res.end(JSON.stringify(staff));
    }
    
});
server.listen(3000,function(){
    console.log('Listening at port 3000');
}); 

url => http://localhost:3000/
o/p => [{"name":"shubham","age":30,"company":"Advaz101","language":"Nodejs"},{"name":"shivam","age":28,"company":"Capgamini","language":"Phonegap"},{"name":"Karnish","age":29,"company":"Just Dial","language":"DB"},{"name":"Ankita","age":25,"company":"Devi Ahiliya","language":"C++"}]

# STEP 2.

---------------(D:\node_test\public\readjson.js)---------------

var http=require('http');
var staff = require('./public/data/staff.json');

var server = http.createServer(function(req,res){ 
    if(req.url === "/"){
        res.writeHead(200,{"Content-Type" : "text/json"}); 
        res.end(JSON.stringify(staff));
    }else if(req.url === "/Phonegap"){
        var data = staff.filter(function(item){
            return item.language === "Phonegap";
        });
        res.writeHead(200,{"Content-Type" : "text/json"}); 
        res.end(JSON.stringify(data));
    }
    
});
server.listen(3000,function(){
    console.log('Listening at port 3000');
}); 

url => http://localhost:3000/Phonegap
o/p => [{"name":"shivam","age":28,"company":"Capgamini","language":"Phonegap"}]

				OR
				
	else if(req.url === "/Advaz101"){
        var data = staff.filter(function(item){
            return item.company === "Advaz101";
        });
        res.writeHead(200,{"Content-Type" : "text/json"}); 
        res.end(JSON.stringify(data));
    }
	
url => http://localhost:3000/Advaz101
o/p => [{"name":"shubham","age":30,"company":"Advaz101","language":"Nodejs"}]

# STEP 3: If No Record Found

---------------(D:\node_test\public\readjson.js)---------------

var http=require('http');
var staff = require('./public/data/staff.json');

var server = http.createServer(function(req,res){ 
    if(req.url === "/"){
        res.writeHead(200,{"Content-Type" : "text/json"}); 
        res.end(JSON.stringify(staff));
    }else if(req.url === "/Advaz101"){
        var data = staff.filter(function(item){
            return item.company === "Advaz101";
        });
        res.writeHead(200,{"Content-Type" : "text/json"}); 
        res.end(JSON.stringify(data));
    }else{
        res.writeHead(404,{"Content-Type" : "text/html"}); 
        res.end("No Record Found");
    }
    
});
server.listen(3000,function(){
    console.log('Listening at port 3000');
}); 

url => localhost:3000/Advaz1010000
o/p => No Record Found
?>

Handling Get And Post Method in Hindi
<?php 
# STEP 1: Check get and post
----------------(D:\node_test\getpost.js)-------------------

var http = require('http');

var server = http.createServer(function(req,res){ 
    if(req.method === "GET"){   //console.log("Calling via GET Method");
        
    }else if(req.method === "POST"){    //console.log("Calling via POST Method");
        
    }
});
server.listen(3000,function(){
    console.log('Listening at port 3000');
}); 

# STEP 2: Our focus to show the form

-----------------(D:\node_test\public\form.html)--------------------
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>HTML FORM</title>
</head>
<body>
	<form action="/" method="POST">
        <label>Name</label>
        <input type="text" name="dname" value="" /><br/>
        <label>Email</label>
        <input type="text" name="demail" value="" /><br/>
        <label>Address</label>
        <input type="text" name="daddress" value="" /><br/>
        <button>Submit</button>
    </form>
</body>
</html>

---------------(D:\node_test\public\getpost.js)---------------

var http = require('http');
var fs = require("fs");

var server = http.createServer(function(req,res){ 
    if(req.method === "GET"){   //console.log("Calling via GET Method");
        res.writeHead(200,{"Content-Type" : "text/html"}); 
        fs.createReadStream("./public/form.html","UTF-8").pipe(res);
    }
    else if(req.method === "POST"){    //console.log("Calling via POST Method");
        var data = "";
        req.on("data",function(chunk){
            data += chunk;
        });
        req.on("end",function () {
            res.writeHead(200,{"Content-Type" : "text/html"}); 
            res.end(`${data}`);
        });
    }
});
server.listen(3000,function(){
    console.log('Listening at port 3000');
}); 

url => http://localhost:3000/
o/p => dname=Shubham&demail=s%40gmail.com&daddress=ADDy


# GET and POST Form Request

STEP 1: Read the form
---------------(D:\node_test\public\getpostform.js)---------------

var http = require('http');
var fs = require("fs");

var server = http.createServer(function(req,res){ 
    if(req.url === "/form"){
        res.writeHead(200,{"Content-Type" : "text/html"});
        fs.createReadStream("./public/form.html","UTF-8").pipe(res);
    }
});
server.listen(3000,function(){
    console.log('Listening at port 3000');
}); 

url => http://localhost:3000/form
o/p => Form will show


STEP 2: Post form 

---------------(D:\node_test\public\getpostform.js)---------------

var http = require('http');
var fs = require("fs");
var url = require("url");
var querystring = require("querystring");

var server = http.createServer(function(req,res){ 
    if(req.url === "/form"){
        res.writeHead(200,{"Content-Type" : "text/html"});
        fs.createReadStream("./public/form.html","UTF-8").pipe(res);
    }

    if(req.method === "GET"){   //console.log("Calling via GET Method");
        var q = url.parse(req.url).query;
        console.log(q);
    }
    else if(req.method === "POST"){    //console.log("Calling via POST Method");
        var data = "";
        req.on("data",function(chunk){
            data += chunk;
        });
        req.on("end",function () {
            var formdata = querystring.parse(data);        //To get the data in object form
            console.log(formdata);
            
        });
    }

});
server.listen(3000,function(){
    console.log('Listening at port 3000');
}); 

url => http://localhost:3000/form
o/p => { dname: 'Shubham', demail: 's@gmail.com', daddress: 'ADDy' }
?>

Insert Records Into MongoDb Database
<?php 
# If we work with mongodb then we need to install one package for this.
npm install --save mongodb

# Error
=> (node:4800) DeprecationWarning: current URL string parser is deprecated, and will be removed in a future version. To use the new parser, pass option { useNewUrlParser: true } to MongoClient.connect

=> db.collection is not a function

--------------(D:\node_test\insert.js)----------------

var http = require('http');
var fs = require("fs");
var querystring = require("querystring");
var MongoClient = require("mongodb").MongoClient;
var url = "mongodb://localhost:27017/college";

var server = http.createServer(function(req,res){ 
    if(req.url === "/form"){
        res.writeHead(200,{"Content-Type" : "text/html"});
        fs.createReadStream("./public/form.html","UTF-8").pipe(res);
    }

    if(req.method === "POST"){
        var data = "";
        req.on("data",function(chunk){
            data += chunk;
        });
        req.on("end",function (chunk) {
            
            //console.log(formdata);                  //{ dname: 'Shubham', demail: 's@gmail.com', daddress: 'ADDy' }
            MongoClient.connect(url,{ useNewUrlParser: true }, function(err, client){
                if(err) throw error;
                var db = client.db('college');
                var q = querystring.parse(data);        //To get the data in object form
                db.collection('students').insertOne(q, function(err,res){
                    if(err) throw err;
                    console.log("Data Inserted Successfully.");
                    client.close();
                });
            });
        });
    }
});
server.listen(3000,function(){
    console.log('Listening at port 3000');
}); 


?>



==========================================================================================================
==========================================================================================================
Express
<?php 
# Install Express
=> npm install express --save
--save means store in local directory.

var express = require("express");
var app = express();    //instance of express

app.listen(3000, function(){
    console.log("Listening at Port 3000");
});
?>
# Express.js - Home Page Routing and Sending HTML
<?php

--------------(D:\node_test\app.js)--------------

var express = require("express");
var app = express();    //instance of express
var path = require("path");

app.get("/",function(req, res){
    //To serve the index.html
    res.
    status(200).
    sendFile(path.join(__dirname,"public","index.html"));
    //sendFile("./" + path.join("public","index.html"));
})

app.listen(3000, function(){
    console.log("Listening at Port 3000");
});

----------(D:\node_test\public\index.html)------------

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>HTML FORM</title>
</head>
<body>
    <h1>This is my heading</h1>
    <p>We are at home page and we are serving at using express.js</p>
</body>
</html>

?>

===================================================================================
								EXPRESS
								npm install express --save   //--save store in local directory
===================================================================================
# Define routes
<?php 
=> app.method(path, handler)
Path is the route at which the request will run.
Handler is a callback function that executes when a matching request type is found on the relevant route. For example,


-------------------(D:\node_test\app.js)-------------------


var express = require('express');
var app = express();

app.get('/hello', function(req, res){
   res.send("Hello World!");
});

app.listen(3000);

Run => localhost:3000/hello
o/p => Hello World!

# multiple different methods
We can also have multiple different methods at the same route. For example,

-------------------(D:\node_test\app.js)---------------------

var express = require('express');
var app = express();

app.get('/hello', function(req, res){
   res.send("Hello World!");
});

app.post('/hello', function(req, res){
   res.send("You just called the post method at '/hello'!\n");
});

app.listen(3000);

A special method, all, is provided by Express to handle all types of http methods at a particular route using the same function. To use this method, try the following.

app.all('/test', function(req, res){
   res.send("HTTP method doesn't have any effect on this route!");
});
This method is generally used for defining middleware

?>




Routers
<?php
Defining routes like above is very tedious to maintain. To separate the routes from our main one.js file, we will use Express.Router. Create a new file called things.js and type the following in it.

-------------------(D:\node_test\things.js)-------------------
var express = require('express');
var router = express.Router();		//Router Object

router.get('/', function(req, res){
   res.send('GET route on things.');
});
router.post('/', function(req, res){
   res.send('POST route on things.');
});

//export this router to use in our one.js
module.exports = router;

Now to use this router in our index.js, type in the following before the app.listen function call.

-------------------(D:\node_test\app.js)-------------------

var express = require('Express');
var app = express();

var things = require('./things.js');

//both index.js and things.js should be in same directory
app.use('/things', things);

app.listen(3000);
The app.use function call on route '/things' attaches the things router with this route. Now whatever requests our app gets at the '/things', will be handled by our things.js router. The '/' route in things.js is actually a subroute of '/things'.


Run => localhost:3000/things
o/p => GET route on things.


# Example 1:
-------------------(D:\node_test\routexamp.js)-------------------
var express = require("express");
var app = express();

//Creating Router() object

var router = express.Router();

// Provide all routes here, this is for Home page.

router.get("/",function(req,res){
  res.json({"message" : "Hello World"});
});

// Tell express to use this router with /api before.
// You can put just '/' if you don't want any sub path before routes.

app.use("/api",router);

// Listen to this Port

app.listen(3000,function(){
  console.log("Live at Port 3000");
});


Run => http://localhost:3000/api/
O/p => {message : "Hello World"}

# Basic middleware routing
Middleware – as the name implies will be executed before your routes get invoked. There are many possible usage for using Middleware for routes such as to log every request before its invoked or finding out whether request is proper or not.
Let’s define one simple Middleware which will print the type of Request ( GET, POST etc ).

-------------------(D:\node_test\routexamp.js)-------------------

var express = require("express");
var app = express();

//Creating Router() object

var router = express.Router();

// Router middleware, mentioned it before defining routes.

router.use(function(req,res,next) {
  console.log("/" + req.method);
  next();
});

// Provide all routes here, this is for Home page.

router.get("/",function(req,res){
  res.json({"message" : "Hello World"});
});

// Tell express to use this router with /api before.
// You can put just '/' if you don't want any sub path before routes.

app.use("/api",router);

// Listen to this Port

app.listen(3000,function(){
  console.log("Live at Port 3000");
});


NOTE : next() function will take your router to next routes.


# Accessing parameter in Routing :
Before explaining this scenario, let me show you how routes with params look like.

Route : http://example.com/api/:name/
Route with data : http://example.com/api/shahid/

So name – > shahid. Now we can access this params in Route as well as on Middleware. Let me show you both.

Case 1: Accessing it in Middleware.
Assuming the param name is “id”.

/ This middle-ware will get the id param
// check if its 0 else go to next router.
router.use("/user/:id",function(req,res,next){
  if(req.params.id == 0) {
    res.json({"message" : "You must pass ID other than 0"});    
  }
  else next();
});

Case 2: Accessing it in Router.

router.get("/user/:id",function(req,res){
  res.json({"message" : "Hello "+req.params.id});
});


-------------------(D:\node_test\routexamp.js)-------------------

var express = require("express");
var app = express();

//Creating Router() object

var router = express.Router();

// Router middleware, mentioned it before defining routes.

router.use(function(req,res,next) {
  console.log("/" + req.method);
  next();
});

router.use("/user/:id",function(req,res,next){
  console.log(req.params.id)
  if(req.params.id == 0) {
    res.json({"message" : "You must pass ID other than 0"});    
  }
  else next();
});

// Provide all routes here, this is for Home page.

router.get("/",function(req,res){
  res.json({"message" : "Hello World"});
});

router.get("/user/:id",function(req,res){
  res.json({"message" : "Hello "+req.params.id});
});

// Tell express to use this router with /api before.
// You can put just '/' if you don't want any sub path before routes.

app.use("/api",router);

// Listen to this Port

app.listen(3000,function(){
  console.log("Live at Port 3000");
});


Run => http://localhost:3000/api/user/shahid
O/p => {message : "Hello shahid"}


Run => http://localhost:3000/api/user/0
O/p => {message : "You must pass ID other than 0"}



# Handling 404 errors :

404 is error when nothing found for that particular route. To do this we need to put one middle-ware at then end of all routes which will get executed when none of the routes match. Here is a code to do so.

var express = require("express");
var app = express();

//Creating Router() object

var router = express.Router();

// Router middleware, mentioned it before defining routes.

router.use(function(req,res,next) {
  console.log("/" + req.method);
  next();
});

router.use("/user/:id",function(req,res,next){
  console.log(req.params.id)
  if(req.params.id == 0) {
    res.json({"message" : "You must pass ID other than 0"});    
  }
  else next();
});

// Provide all routes here, this is for Home page.

router.get("/",function(req,res){
  res.json({"message" : "Hello World"});
});

router.get("/user/:id",function(req,res){
  res.json({"message" : "Hello "+req.params.id});
});

// Handle 404 error. 
// The last middleware.
app.use("*",function(req,res){
  res.status(404).send('404');
});

// Tell express to use this router with /api before.
// You can put just '/' if you don't want any sub path before routes.

app.use("/api",router);

// Listen to this Port

app.listen(3000,function(){
  console.log("Live at Port 3000");
});


Run this code and try hitting some random route. You should get following output.

http://localhost:3000/api/user/0



?>


<?php 
# Basic router:
-------------(feedback.js)------------------
var express = require("express");

//Creating Router() object
var router = express.Router();

router.get("/feedback",function(req,res){
  res.render('feedback',{
	  pageTitle: 'Feedback',
	  pageID: 'feedback'
  });
});

module.exports = router;


-----------------(app.js)------------------
var express = require("express");
var app = express();

app.set('port', process.env.PORT || 3000);
app.set('view engine','ejs');
app.set('views','app/views');

app.use(express.static('app/public'));
app.use(require('./routers/feedback'));

var Server = app.listen(app.get('port'), function(){
  console.log('listen to port '+app.get('port'));
});


# Example to show simple json file
-----------------(api.js)------------------
var express = require("express");
var router = express.Router();
var feedbackData = require('../data/feedback.json');

router.get("/api",function(req,res){
	res.json(feedbackData);
});

module.exports = router;

Now, save router it to app.js file

-----------------(app.js)------------------
var express = require("express");
var app = express();

app.set('port', process.env.PORT || 3000);
app.set('view engine','ejs');
app.set('views','app/views');

app.use(express.static('app/public'));
app.use(require('./routers/feedback'));
app.use(require('./routers/api'));

var Server = app.listen(app.get('port'), function(){
  console.log('listen to port '+app.get('port'));
});
?>



<?php 
# nodemon
=> npm install -g nodemon

# Express Middlewares:
=> ejs (For Template and Views)

npm install --save ejs

# include 
<% include content/maincontent.ejs%>

<?php 
# forEach


?>
 
<?php 
# Socket IO: 
Through which we can connect one user to other users.
=> npm install --save socket.io

-----------------(app.js)------------------
var express = require("express");
var app = express();
var io= require('socket.io')();

app.set('port', process.env.PORT || 3000);
app.set('view engine','ejs');
app.set('views','app/views');

app.use(express.static('app/public'));
app.use(require('./routers/feedback'));
app.use(require('./routers/api'));

var Server = app.listen(app.get('port'), function(){
  console.log('listen to port '+app.get('port'));
});


io.attach(Server);

?>

=========================================================================================
# Serving static files in Express

To serve static files such as images, CSS files, and JavaScript files, use the express.static built-in middleware function in Express.

The function signature is:

express.static(root, [options])

The root argument specifies the root directory from which to serve static assets.

For example, use the following code to serve images, CSS files, and JavaScript files in a directory named public:

app.use(express.static('public'))
Now, you can load the files that are in the public directory:

http://localhost:3000/images/kitten.jpg
http://localhost:3000/css/style.css
http://localhost:3000/js/app.js
http://localhost:3000/images/bg.png
http://localhost:3000/hello.html

######################################################################################33







**********************************************
Catch the value 

***********************************************
File System Module
var fs = require("fs");


**************************************************
var http = require('http');

var server = http.createServer(function(req,res){ 
    
});
server.listen(3000,function(){
    console.log('Listening at port 3000');
}); 

*************************************************


# Packages:

- Express Handlebars
- Mongoose
Mongoose is an Object Data Modeling (ODM) library for MongoDB and Node.js. It manages relationships between data, provides schema validation, and is used to translate between objects in code and the representation of those objects in MongoDB. MongoDB is a schema-less NoSQL document database.


- body-parser
- Heroku
How to Run NodeJS Project on the cloud using Heroku

https://codeforgeek.com/2015/05/expressjs-router-tutorial/

https://www.tutorialspoint.com/expressjs/expressjs_routing.htm


https://appdividend.com/2018/09/15/express-router-tutorial-example-from-scratch/

https://www.youtube.com/watch?v=voDummz1gO0
https://github.com/CodAffection/Node.js-Expess-MongoDB-CRUD

MEAN Stack CRUD Operations - MEAN Stack Beginners Tutorial  ------------(Good 08apr2018)
https://www.youtube.com/watch?v=UYh6EvpQquw
https://github.com/CodAffection/MEAN-Stack-CRUD-Operations

Nodejs and Expressjs [A Developer`s Guide] - Modular Routing #4

CodAffection
•
61K views

https://codeforgeek.com/how-to-write-custom-middleware-for-expressjs/
https://codeforgeek.com/render-html-file-expressjs/
https://codeforgeek.com/manage-session-using-node-js-express-4/

# Cab booking project flow
https://www.youtube.com/watch?v=Hdv9xvtbci4  -------------(Good project description)

# Learning MEAN Stack by Building Real world Application
https://www.youtube.com/watch?v=SD9cS_6O4zg&feature=youtu.be&t=7508   ---------------(Good)


https://prod.packtpub.com/in//web-development/real-world-projects-mean-stack-video
https://github.com/PacktPublishing/Real-World-Projects-with-MEAN-Stack

https://www.fiverr.com/gigs/mean-stack

https://medium.mybridge.co/node-js-top-10-open-source-projects-for-the-past-month-v-mar-2018-6047fc05b1bb

Angular Employee Payroll, Salary App Free download with Source Code
https://www.youtube.com/watch?v=sWOXETusJNw   -----------(Good)
https://github.com/AmitXShukla/Employee-Payroll-Salary-App-Angular-6-MEAN-Stack/tree/master/Server


https://www.udemy.com/real-world-projects-with-mean-stack/
https://www.udemy.com/filemaker-bookings-and-reservation-system/
https://www.udemy.com/mean-project-with-angular-4-creating-a-cms/
https://www.udemy.com/learning-mean-stack-by-building-real-world-application/

Traversy Media
https://www.youtube.com/watch?v=DQ9pZ2NKXRo&list=PLillGF-RfqbZMNtaOXJQiDebNXjVapWPZ&index=2 ---------------(Good)

MEAN Stack User Registration Using Node JS - Part 1
https://www.youtube.com/watch?v=m34FCkBd7UU   ---------------(Good)

=======================================================================================

# Chat Application 

https://codecanyon.net/item/chat-application-codeigniter-socketio-nodejs/20061969

https://techalltype.com/myblog/real-time-notification-using-socket-io-in-codeigniter/



https://www.udemy.com/real-world-projects-with-mean-stack/
---------------(Good)
https://www.udemy.com/mean-project-with-angular-4-creating-a-cms/
https://www.udemy.com/angular-2-and-nodejs-the-practical-guide/
<?php
# In Node Js

var http = require('http');
var myServer = http.createServer(function(req, res){
  res.writeHead(200,{"Content-Type":"text/html"});
  res.write('<h1>connection meetups</h1>');
  res.end();
});
myServer.listen(3000);
console.log('go to port 3000');

# In Express Js

=> Example 1.)
var express = require('express');
var app = express();
app.get('/', function(req, res){
  res.send('<h1>Connection meet</h1>');
});
var Server = app.listen(3000, function(){
  console.log('listen to port 3000');
});

=> Example 2.)
var express=require('express');		//Use the express module
var app=express();					//Create an object of the express module
app.get('/',function(req,res)		// Create a call back function 
{
	res.send('Hello World!');		// Send Hello world response
});
var server=app.listen(3000,function() {});	//Make the serve listen on port 3000

Code Explanation:

1. In our first line of code, we are using the require function to include the "express module."
2. Before we can start using the express module, we need to make an object of the express module.
3. Here we are creating a callback function. This function will be called whenever anybody browses to the root of our web application which is http://localhost:3000 . The callback function will be used to send the string 'Hello World' to the web page.
4. In the callback function, we are sending the string "Hello World" back to the client. The 'res' parameter is used to send content back to the web page. This 'res' parameter is something that is provided by the 'request' module to enable one to send content back to the web page.
5. We are then using the listen to function to make our server application listen to client requests on port no 3000. You can specify any available port over here.
?>

The general syntax for a route is shown below
app.METHOD(PATH, HANDLER)
<?php 
Wherein,
1) app is an instance of the express module
2) METHOD is an HTTP request method (GET, POST, PUT or DELETE)
3) PATH is a path on the server.
4) HANDLER is the function executed when the route is matched.

=> Example 1.):
var express = require('express');
var app = express();
app.route('/Node',get(function(req,res)			//Create a Node route 
{
    res.send("Tutorial on Node");				//Send a diffrent response for the Node route
});
post(function(req,res)							//Create a Angular route 
{
    res.send("Tutorial on Angular");			//Send a diffrent response for the Angular route
});
put(function(req,res)
{
    res.send('Welcome to Guru99 Tutorials');	// Our default route
}));


?>

nodemon 
<?php
We have to restart the server everytime we make a change. That's no fun, so let's install a tool to help.

=> npm install nodemon --save

Now run nodemon server.js and you never have to restart again!

?>

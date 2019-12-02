<?php
# Run command => npm init
name:meanauthapp
description: Mean Stack Authentication App
entry point: app.js

Press Enter

=> package.json 
"main" : "app.js"
"scripts":{
	"start" : "node app" // To start npm, just write there node app, don`t need to write there node app.js
}

"dependency":""
=> npm install
Will install all dependency which we wrote in package.json

# CORS : To manage angular port and node port confliction

?>

Node.js Path Module
<?php  
The Path module provides a way of working with directories and file paths.

# path.basename() Method - Extract the filename from a file path:

Example :
var path = require('path');
var filename = path.basename('/Users/Refsnes/demo_path.js');
console.log(filename);

o/p => demo_path.js

# path.join() Method - The path.join() method joins the specified path segments into one path.

Example :
var path = require('path');
var x = path.join('Users', 'Refsnes', 'demo_path.js');
console.log(x);

o/p => Users\Refsnes\demo_path.js
?>

body-parser Module
<?php 
To get POST parameters, we`ll need to the ExpressJS body-parser package. This will allow us to grab information from the POST.

# to handle the HTTP POST request. 
# extract the entire body portion of an incoming request stream and exposes it on req.body.

Install body-parser
We`ll need to install body-parser using:

=> npm install body-parser --save

var bodyParser = require('body-parser');  //Define Body Parser

We will grab POST parameters using req.body.variable_name.

Example:
// POST http://localhost:8080/api/users
// parameters sent with 
app.post('/api/users', function(req, res) {
    var user_id = req.body.id;
    var token = req.body.token;
    var geo = req.body.geo;

    res.send(user_id + ' ' + token + ' ' + geo);
});

?>

CORS
<?php 

npm install --save cors

CORS stands for Cross Origin Resource Sharing and allows modern web browsers to be able to send AJAX requests and receive HTTP responses for resource from other domains other that the domain serving the client side application.

If you are locally developing your application and want a quick way to CORS then you can simply use a middleware with a few lines of code:

var express = require('express');
var app = express();

app.use(bodyParser.urlencoded({extended: true}))
app.use(bodyParser.json())

app.use(function(req, res, next) {
  res.header("Access-Control-Allow-Origin", "*");
  res.header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
  next();
});

app.get('/endpoint', function (req, res, next) {
  res.json({msg: 'This is CORS-enabled for all origins!'})
})

app.listen(3000, () => {
  console.log('Listenning at http://localhost:3000' )
})

The wildcard * allows resources to be accessed from any origin.

That`s it you can now send requests from any origin without getting the same origin policy problems.

# Controlling Allowed Hosts

When your are in production you don't want to allow CORS access for all origins but if you need to allow cross origin requests from some specified host(s) you can do add the following code:

server.use(cors({
  origin: 'https://techiediaries.com'
}));

This wil allow https://techiediaries.com to send cross origin requests to your Express server without the Same Origin Policy getting in the way.

You can also enable CORS for a single Express route

server.get('/endpoint', cors(), function (req, res, next) {
  res.json({msg: 'This has CORS-enabled for only this route: /endpoint'})
})
?>

Mongoose
<?php 

npm install mongoose --save

mongoose is an object modeling package for Node that essentially works like an ORM that you would see in other languages (like Eloquent for Laravel).

Mongoose allows us to have access to the MongoDB commands for CRUD simply and easily. 

Now that we have the package, we just have to grab it in our project:
var mongoose = require('mongoose');

We also have to connect to a MongoDB database (either local or hosted):
mongoose.connect('mongodb://localhost/myappdatabase');

# Defining a Model
Before we can handle CRUD operations, we will need a mongoose Model. These models are constructors that we define. They represent documents which can be saved and retrieved from our database.

Mongoose Schema The mongoose Schema is what is used to define attributes for our documents.

Mongoose Methods Methods can also be defined on a mongoose schema. These are methods

# Sample Model for Users

// grab the things we need
var mongoose = require('mongoose');
var Schema = mongoose.Schema;

// create a schema
var userSchema = new Schema({
  name: String,
  username: { type: String, required: true, unique: true },
  password: { type: String, required: true },
  admin: Boolean,
  location: String,
  meta: {
    age: Number,
    website: String
  },
  created_at: Date,
  updated_at: Date
});

// the schema is useless so far
// we need to create a model using it
var User = mongoose.model('User', userSchema);

// make this available to our users in our Node applications
module.exports = User;


This is how a Schema is defined. We must grab mongoose and mongoose.Schema. Then we can define our attributes on our userSchema for all the things we need for our user profiles. Also notice how we can define nested objects as in the meta attribute.

The allowed SchemaTypes are:

String
Number
Date
Buffer
Boolean
Mixed
ObjectId
Array
We will then create the mongoose Model by calling mongoose.model. We can also do more with this like creating specific methods. This is a good place to create a method to hash a password.


# Custom Method

// grab the things we need
var mongoose = require('mongoose');
var Schema = mongoose.Schema;

// create a schema
var userSchema ...

// custom method to add string to end of name
// you can create more important methods like name validations or formatting
// you can also do queries and find similar users 
userSchema.methods.dudify = function() {
  // add some stuff to the users name
  this.name = this.name + '-dude'; 

  return this.name;
};

// the schema is useless so far
// we need to create a model using it
var User = mongoose.model('User', userSchema);

// make this available to our users in our Node applications
module.exports = User;

# Sample Usage
Now we have a custom model and method that we can call in our code:

// if our user.js file is at app/models/user.js
var User = require('./app/models/user');

// create a new user called chris
var chris = new User({
  name: 'Chris',
  username: 'sevilayha',
  password: 'password' 
});

// call the custom method. this will just add -dude to his name
// user will now be Chris-dude
chris.dudify(function(err, name) {
  if (err) throw err;

  console.log('Your new name is ' + name);
});

// call the built-in save method to save to the database
chris.save(function(err) {
  if (err) throw err;

  console.log('User saved successfully!');
});
?>

=> create app.js which is main entry point.
<?php 
// getting port this way
port = process.env.PORT || process.argv[2] || 8080;
?>

Show simple output
<?php
# Example 1
&&&&&&&&&&&&&&&&&&(app.js)&&&&&&&&&&&&&&&&&&&&&&&&&
const express = require('express');
const path = require('path');
const bodyParser = require('body-parser');
const cors = require('cors');
const passport = require('passport');
const mongoose = require('mongoose');

const app = express();

const port = 3000;

//CORS Middleware
app.use(cors());

//Body Parser Middleware
app.use(bodyParser.json());

//Index Route
app.get('/',(req,res)=>{
    res.send('Invalid Endpoints');
});

//Start Server
app.listen(port, () => {
    console.log('Server started on part '+port);
});

o/p => Invalid Endpoints

# Example 2
**********************(app.js)**************************

const express = require('express');
const path = require('path');
const bodyParser = require('body-parser');
const cors = require('cors');
const passport = require('passport');
const mongoose = require('mongoose');

const app = express();

const users = require('./routes/users');

const port = 3000;

//CORS Middleware
app.use(cors());

//Body Parser Middleware
app.use(bodyParser.json());

app.use('/users',users);

//Index Route
app.get('/',(req,res)=>{
    res.send('Invalid Endpoints data1');
});

//Start Server
app.listen(port, () => {
    console.log('Server started on part '+port);
});

************************(D:\meanstack\routes\users.js)************************

const express = require('express');
const router = express.Router();

//Register
router.get('/register', (req, res, next) => {
    res.send('Register');
});

//Authenticate
router.get('/authenticate', (req, res, next) => {
    res.send('Authenticate');
});

//Profile
router.get('/profile', (req, res, next) => {
    res.send('Profile');
});


//Validate
router.get('/validate', (req, res, next) => {
    res.send('Validate');
});


module.exports = router;


=> http://localhost:3000/users/register
o/p => Register

# Example 3 : Serving static files in Express
**********************(app.js)**************************
const express = require('express');
const path = require('path');
const bodyParser = require('body-parser');
const cors = require('cors');
const passport = require('passport');
const mongoose = require('mongoose');

const app = express();

const users = require('./routes/users');

const port = 3000;

//CORS Middleware
app.use(cors());

//Set Static Folder
app.use(express.static(path.join(__dirname, 'public')))

//Body Parser Middleware
app.use(bodyParser.json());

app.use('/users',users);

//Index Route
app.get('/',(req,res)=>{
    res.send('Invalid Endpoints data1');
});

//Start Server
app.listen(port, () => {
    console.log('Server started on part '+port);
});

?>

nodemon
<?php 
npm install -g nodemon
?>

<?php 
npm install cors --save
?>

<?php
Make the separate folder for route

?>
"dependencies": {
    "bcryptjs": "*",
    "body-parser": "*",
    "cors": "*",
    "express": "*",
    "jsonwebtoken": "*",
    "mongoose": "*",
    "passport": "*",
    "passport-jwt": "*"
  },

======================================================================================================
Date: 10sep2019
MEAN Stack CRUD Operations - MEAN Stack Beginners Tutorial
https://www.youtube.com/watch?v=UYh6EvpQquw


<?php 
# How to start mongodb:
In Order to start the server. we have to  run this application from our command prompt.
In order to start the monogdb we have to navigate bin folder. and we have to run this mongod.exe.

# For start mean
Now run,
=> npm init
Now create package.json file

need to install package like express which will be treat here as an server. Mongooes will be act as mongodb orm. finally need body parser it allow us to send json data to node js api.


So lets intall this packages.

=> npm i express mongoose body-parser --save
Here, --save is used save this dependency inside package.json

---------------------------------------
*******(package.json)********
{
  "name": "mnodejs",
  "version": "1.0.0",
  "description": "",
  "main": "index.js",
  "scripts": {
    "test": "echo \"Error: no test specified\" && exit 1"
  },
  "author": "",
  "license": "ISC",
  "dependencies": {
    "body-parser": "^1.19.0",
    "cors": "^2.8.5",
    "express": "^4.16.4",
    "mongoose": "^5.5.5"
  }
}
-----------------------------------------------

# Connect mongodb database to nodejs project
Create "db.js". 
//Request statement for mongoose. It request mongoose package
const mongoose = require('mongoose'); 

//make the conection using mongoose object AS a parameter for this connect function we pass the mongodb connection details - 'mongodb://localhost:27017/college' and after mongodb connection we can call a callback function like this - it has a single parameter (err) it stores possible errors while connecting the database. If there is no error we will print this message in the console window like - console.log('MongoDB connection is succeeded.'). idf there is any error, we will print this message like - console.log('Error in DB connection: '+ JSON.string(err, undefined, 2)) with detail error object. 
mongoose.connect('mongoose.connect('mongodb://localhost:27017/college');

-------------------------------------
*******(db.js)*****
const mongoose = require('mongoose');
mongoose.connect('mongodb://localhost:27017/college',{ useNewUrlParser: true }, (err) => {
    if(!err)
        console.log('MongoDB connection is succeeded.');
    else 
        console.log('Error in DB connection : ' + JSON.stringify(err, undefined, 2));
});
module.export = mongoose;
-------------------------------------
Most of the case we need to establised mongodb connection outside this db.js file. so We need to export this const mongooes. "module.export = monggoose"

In order to run this db.js file the command will be.
=> node db.js
We will se the message - "MongoDB Connection is Succeded" 

# How to avoid application restart after update
Install npm package nodemon
=> npm install -g nodemon //golbally

# Now create the root file index.js
First of all we need to request statement for express and body parser.
LIKe -
const express = require('express');
const bodyParser = require('body-parser');

In order to make an connection with mongodb. we have one more request statement.
Like - 
const {mongoose} = require('./db.js'); // This is structure of ES6

In order to work with express package we have to call  core function

Like - 
var app = express();// here we call the express function
 
# Now we have to  configure express js middleware In order send json data to this node js project for that we just need to call this - 
app.use(bodyParser.json())

Now In order to start the server call the function app.listen
Like - 
app.listen(3000, () => console.log('Server started at port : 3000'))

----------------------------------------
*****(index.js)****
const express = require('express');
const bodyParser = require('body-parser');

const {mongoose} = require('./db.js');
var app = express();
app.use(bodyParser.json());

app.listen(3000, () => console.log('Server started at port : 3000'));
----------------------------------------

# Now we are going to perform crud operation lik insert, update, edit and delete

First of all we have to create a model for mongoose package -
"models/employee.js"

First of we need to create request statement for mongoose:

const mongoose = require('mongoose');

//Create model the employee for that we can call the function 
var Employee = mongoose.model('Employee'); // Inside that we pass the model name Employee here. after that we specify the schema and structure of that model.

And finally we export this employee 
Like this -
moidule.exports = Employee;

-----------------------------------------
************(models/employee.js)************
const mongoose = require('mongoose');

var Employee = mongoose.model('Employee', {
    name: { type: String },
    position: { type: String },
    office: { type: String },
    salary: { type: Number }
});

module.exports = { Employee };
------------------------------------------

Now, in order to insert new employee records into mongodb we just need to create of object of employee and call thje function save from the object. 

Mongodb automatically create the collection using our model

# Implement feature
controllers/employeeController.js

Inside this controller we need to implement router for express. for that add the request statement for express and the we have created a locall veriable for express router by calling this router function from express constant
const express = require('express');
var router = express.Router();

Inside this employee controller we need to work with mongoose model employee.js that we have created.

So lets add a request statement for this employee model also. So we have request statenet

var { Employee } = require('../models/employee'); // And Inside this Employee variable we will stored the exported employee from employee.js file

Now let me add router in order to retrive all employee from this employee collection

for that we create a get request here

router.get('/', (req,res) => {
    Employee.find((err, docs) => {
        if(!err) { res.send(docs); }
        else{ console.log('Error in Retriving Employees :' + JSON.stringify(err, undefined, 2 )) }
    });
});

module.exports = router;

-------------------------------------------
******(controllers/employeeController.js)*****
const express = require('express');
var router = express.Router();

var { Employee } = require('../models/employee');

router.get('/', (req,res) => {
    Employee.find((err, docs) => {
        if(!err) { res.send(docs); }
        else{ console.log('Error in Retriving Employees :' + JSON.stringify(err, undefined, 2 )) }
    });
});

module.exports = router;
--------------------------------------------

Now, back to index.js . 

First of all we have to add request statement for the emplyeeController.js 

var employeeController = require('./controllers/employeeController.js');

Now in order to add router from employees controller into this application we can call the middleware function - 
app.use('/employees', employeeController)

-----------------------------------------
*********(index.js)*********
const express = require('express');
const bodyParser = require('body-parser');

const {mongoose} = require('./db.js');
var employeeController = require('./controllers/employeeController.js');

var app = express();
app.use(bodyParser.json());

app.listen(3000, () => console.log('Server started at port : 3000'));

app.use('/employees',employeeController);
------------------------------------------

# Small modification in model(employee.js)

model.exports = {
	Employee
}

----------------------------------------
*****(models/employee.js)******
const mongoose = require('mongoose');

var Employee = mongoose.model('Employee', {
    name: { type: String },
    position: { type: String },
    office: { type: String },
    salary: { type: Number }
});

module.exports = { Employee };
-----------------------------------------

Now run on browser this link -
localhost:3000/employees

if no records inside in db the it will return array like - []


Now create post request in employeeController.js 

inside post request we will create object of employee model class - 
var emp = new Employee({
	name: req.body.name,
	position: req.body.position,
	office: req.body.office,
	salary: req.body.salary,
});

Now in order to insert new record into mongodb we call save function of mongoose model object - 
emp.save();

After saving the records we will called this call back function with two parameter error and doc .
emp.save((err, doc) => {
	if (!err) { res.send(doc); }
	else { console.log('Error in Employee Save :' + JSON.stringify(err, undefined, 2)); }
});

--------------------------------------
*******(employeeController.js)*********
const express = require('express');
var router = express.Router();

var { Employee } = require('../models/employee');

// localhost:3000/employees
router.get('/', (req,res) => {
    Employee.find((err, docs) => {
        if(!err) { res.send(docs); }
        else{ console.log('Error in Retriving Employees :' + JSON.stringify(err, undefined, 2 )) }
    });
});

router.post('/', (req, res) => {
    var emp = new Employee({
        name: req.body.name,
        position: req.body.position,
        office: req.body.office,
        salary: req.body.salary,
    });
    emp.save((err, doc) => {
        if (!err) { res.send(doc); }
        else { console.log('Error in Employee Save :' + JSON.stringify(err, undefined, 2)); }
    });
});

module.exports = router; 
---------------------------------------

# Now get particular records from collection
router.get('/:id', (req, res) => {
	
})
passed id should be valid mongodb id for that
we have to object id from mongoose
var ObjectId = require('mongoose').Types.ObjectId;

first will check id is valid or not. 
to get id we use "req.params.id"

router.get('/:id', (req, res) => {
    if (!ObjectId.isValid(req.params.id))
        return res.status(400).send(`No record with given id : ${req.params.id}`);

        Employee.findById(req.params.id, (err, doc) => {
            if (!err) { res.send(doc); }
            else { console.log('Error in Retriving Employee :' + JSON.stringify(err, undefined, 2)); }
        });
});


# Now for update operation:
router.put('/:id', (req, res) => {
    if (!ObjectId.isValid(req.params.id))
        return res.status(400).send(`No record with given id : ${req.params.id}`);

    var emp = {
        name: req.body.name,
        position: req.body.position,
        office: req.body.office,
        salary: req.body.salary,
    };
    Employee.findByIdAndUpdate(req.params.id, { $set: emp }, { new: true }, (err, doc) => {
        if (!err) { res.send(doc); }
        else { console.log('Error in Employee Update :' + JSON.stringify(err, undefined, 2)); }
    });
});

# Now for update operation:
router.delete('/:id', (req, res) => {
    if (!ObjectId.isValid(req.params.id))
        return res.status(400).send(`No record with given id : ${req.params.id}`);

    Employee.findByIdAndRemove(req.params.id, (err, doc) => {
        if (!err) { res.send(doc); }
        else { console.log('Error in Employee Delete :' + JSON.stringify(err, undefined, 2)); }
    });
});

-------------------(employeeController.js)--------------------------
const express = require('express');
var router = express.Router();
var ObjectId = require('mongoose').Types.ObjectId;

var { Employee } = require('../models/employee');

// localhost:3000/employees
router.get('/', (req,res) => {
    Employee.find((err, docs) => {
        if(!err) { res.send(docs); }
        else{ console.log('Error in Retriving Employees :' + JSON.stringify(err, undefined, 2 )) }
    });
});

router.get('/:id', (req, res) => {
    if (!ObjectId.isValid(req.params.id))
        return res.status(400).send(`No record with given id : ${req.params.id}`);

        Employee.findById(req.params.id, (err, doc) => {
            if (!err) { res.send(doc); }
            else { console.log('Error in Retriving Employee :' + JSON.stringify(err, undefined, 2)); }
        });
});
 
router.post('/', (req, res) => {
    var emp = new Employee({
        name: req.body.name,
        position: req.body.position,
        office: req.body.office,
        salary: req.body.salary,
    });
    emp.save((err, doc) => {
        if (!err) { res.send(doc); }
        else { console.log('Error in Employee Save :' + JSON.stringify(err, undefined, 2)); }
    });
});

router.put('/:id', (req, res) => {
    if (!ObjectId.isValid(req.params.id))
        return res.status(400).send(`No record with given id : ${req.params.id}`);

    var emp = {
        name: req.body.name,
        position: req.body.position,
        office: req.body.office,
        salary: req.body.salary,
    };
    Employee.findByIdAndUpdate(req.params.id, { $set: emp }, { new: true }, (err, doc) => {
        if (!err) { res.send(doc); }
        else { console.log('Error in Employee Update :' + JSON.stringify(err, undefined, 2)); }
    });
});

router.delete('/:id', (req, res) => {
    if (!ObjectId.isValid(req.params.id))
        return res.status(400).send(`No record with given id : ${req.params.id}`);

    Employee.findByIdAndRemove(req.params.id, (err, doc) => {
        if (!err) { res.send(doc); }
        else { console.log('Error in Employee Delete :' + JSON.stringify(err, undefined, 2)); }
    });
});

module.exports = router;
-------------------------------------------------

# Now Come to Angular 5 -- AngularApp
In order to design angular application we will use materialize css
CDN 
https://materializecss.com/getting-started.html

<!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
            
			
Go to index.html paste above style, script and <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     	
# Now generate component
=> ng g c employee

Inside app folder create new folder "shared". And inside this folder create an model

=> ng g class employee --type=model
----------(employee.model.ts)---------
export class Employee{

}	

-------------------------------

After that we need to creater an service class:
=> ng g s employee

Now inside the Employee model class we have add corresponding employee collection fields

----------(employee.model.ts)---------
export class Employee{
_id:string,
name: string,
position:string,
office:string,
salary:string
}	

-------------------------------
?>

Validation
<?php 
class="ng-pristine ng-invalid ng-touched"
 ng-pristine means We have not modified its intial value. ng-invalid indicate, this field is already invalid.
 After typing in input fields ng-pristine is replace with ng-dirty and ng-invalid is replaced with ng-valid. After clear this text now class ng-dirty ng-invalid applied this text box(red border bottom with this text box).
 
(style.css)
input .ng-invalid .ng-dirty{
	border-bottom-color: #e91e63 !important;
	box-shadow: 0 1px 0 0 #e9163 !important
}

# employee.component.ts

ngOnInit() {
    this.resetForm();
  }

  resetForm(form?: NgForm) {

    if (form)
      form.reset();
   
    this.employeeService.selectedEmployee = {
      _id: "",
      name: "",
      position: "",
      office: "",
      salary: null
    }

  }

# How to disable submit button if form is not valid.
<form #employeeForm="ngForm" (ngSubmit) = "onSubmit(employeeForm)">
	<button type="submit" [disabled]="!employeeForm.valid"></button>
</form> 
 Here, employeeForm is the local refrence of form.

?>

Install Cors
<?php 
=> npm i cors --save
It allow request from any port number and domain.

const cors = require('cors');

app.use(cors());   

In order to allow the angular application. We pass the object like this -
app.use(cors({origin: 'http://localhost:4200' }));

# index.js
const express = require('express');
const bodyParser = require('body-parser');
const cors = require("cors");

const {mongoose} = require('./db.js');
var employeeController = require('./controllers/employeeController.js');

var app = express();
app.use(bodyParser.json());
app.use(cors());    //Allow us to request any domain and port and allow only for angular application
app.use(cors({origin: 'http://localhost:4200' }));

app.listen(3000, () => console.log('Server started at port : 3000'));

app.use('/employees',employeeController);
?>




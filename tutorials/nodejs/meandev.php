<?php
# First create package.json file.
In order to create package.json file. We can use this command:
=> npm init
hit enter then it will ask configuration details about the project like package name: (nodejs), version, description, entry point.
Leave it as it is and hit enter.

So here, we now created package.json file. is it fill with some default configuation.

In order to work with this node js application. we need some npm packages, we need npm express to act as a server. we need mongoose it will act as ORM. Finally we need body-parser, it allow us to send json data to node js api.
So lets install this packages.

=> npm i express mongoose body-parser --save
i = install 
Now we need this dependency to save in package.json file.
For that we can use --save and hit enter. So we have successfully install this 3 packages mongoose, express and body-parser. 

//-----------(package.json)------------//START
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
    "express": "^4.16.4",
    "mongoose": "^5.5.5"
  }
}

//-----------(package.json)------------//END

Now lets start coding inside this application.

Before this create mongodb database name CrudDB here.
Now we r going to connect the database from this node js project.
For that, We r going to create new file name here. I will name this file name "db.js".
In order to connect mongodb we will use npm package mongoose that we have already installed

So first of all we need to add request statement for mongoose. So here it is.
=> const mongoose = require('mongoose');

After that we can make the connection using the object monggose. By calling this function connect(). As a parameter for this function we can pass the mongodb connection details. Like
=> mongoose.connect('mongodb://localhost:27017/college');

Here, we have mongodb protocol and localhost. we have install this pacakage inside this default port number "27017" after that we have database name "college".

After the mongodb connection, call a callback function like this:
=>  mongoose.connect('mongodb://localhost:27017/college',{ useNewUrlParser: true }, (err) => {
		if(!err)
			console.log('MongoDB connection is succeeded.');
		else 
			console.log('Error in DB connection : ' + JSON.stringify(err, undefined, 2));
	});
it has a single parameter liek err => it stored the possible error while connecting the database. If there is no error print this message to console window. "MongoDB connection is succeeded." If there is any error we will print this error "Error in DB connection :"+ JSON.stringify(err, undefined, 2).

We have called this JSON.stringify function in order to convert this object to a string with intendation of 2 space character,
Most of this case we need to establist mongodb connection outside with db.js connection  file. So we need to export this constant mongoose. for that we can do this :
=> module.export = mongoose

//---------------(db.js)-------------------//START
const mongoose = require('mongoose');
mongoose.connect('mongodb://localhost:27017/college',{ useNewUrlParser: true }, (err) => {
    if(!err)
        console.log('MongoDB connection is succeeded.');
    else 
        console.log('Error in DB connection : ' + JSON.stringify(err, undefined, 2));
});
module.export = mongoose
//---------------(db.js)-------------------//END

Now let me save this file and open command propmt. In order to run db.js file. we can do this. 
=> node db.js

and hit enter. So here we  can see that message => MongoDB connection is succeeded.


# nodemon
npm install -g nodemon

Now, Lets have a look how we can use nodemon.
=> nodemon db.js

we don`t want to restart this execution after any update inside node js project. nodemon aleady restarted the application for new changes.

# Now lets create the route javascript file "index.js"
const express = require('express');
const bodyParser = require('body-parser');

In order to make an connection with mongodb we have execute "db.js" module. for that we can add one more require statement 

=> const {mongoose} = require('./db.js');

it`s always recommondate to seprate local import and pacakage import like this:
const express = require('express');
const bodyParser = require('body-parser');

const {mongoose} = require('./db.js');

So here we have a constant mongoose that it will stored the mongoose that we have exported inside this "db.js" file.


In order to work with this express pacakage we have call it`s core function express like this
=> var app = express();

Now we have to configure express middleware in order to send json data to this node js project. For that we can do this. we just need to call :
=> app.use(bodyParser.json()); 
Inside that we can pass the result of this function execution bodyParser.json()

Now in order to start the express server we can call the function :
=> app.listen(3000, () => console.log('Server started at port : 3000'));
After start the server this call function will be invoked.

//---------------(index.js)-------------------//START

const express = require('express');
const bodyParser = require('body-parser');

const {mongoose} = require('./db.js');

var app = express();
app.listen(3000, () => console.log('Server started at port : 3000'));

//---------------(index.js)-------------------//END

And Now run :
=> nodemon index.js

# Now we implement CRUD Operation
First of all we have to create model using mongoose package. So Let fist "models" folder here. Inside that we create a new file employee.js

first of all we need to add mongoose request statement.

=> const mongoose = require('mongoose');
Now let`s create model employee for that we can call the function mongoose.model()
=> var Employee = mongoose.model(); 
and inside that we pass the model name "Employee" like:
=> var Employee = mongoose.model("Employee"); 

After that we need to specify the schema and structure of our model.
=> 	var Employee = mongoose.model("Employee",{
		name: {type: String},
		position: {type: String},
		office: {type:String},
		salary: {type:Number}
	});
 
Finally we export this like:
module.exports = Employee;

//---------------(employee.js)-------------------//START
const mongoose = require('mongoose');

var Employee = mongoose.model("Employee",{
    name: {type: String},
    position: {type: String},
    office: {type:String},
    salary: {type:Number}
}); 

module.exports = Employee;


//---------------(employee.js)-------------------//END

Now in order to insert new record into mongodb, we just need to create the object of employee and call the function save from the object.

# controller/employeeController.js


const express = require('express');
var router = express.Router();

We need to work mongoose model employee that we created here. lets add request statement for this employee model also.



# _id => 24 char hexlength


//---------------(index.js)-------------------//START
const express = require('express');
const bodyParser = require('body-parser');

const {mongoose} = require('./db.js');
var employeeController = require('./controllers/employeeController.js');

var app = express();
app.use(bodyParser.json());
app.listen(3000, () => console.log('Server started at port : 3000'));

app.use('/employees',employeeController);


//---------------(index.js)-------------------//END


//---------------(employee.js)-------------------//START
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

//---------------(employee.js)-------------------//END





# id what we pass in get method should be valid monodb id
first of all we have to import:
var ObjectId = require('mongoose').Types.ObjectId;










































https://www.youtube.com/watch?v=6FOq4cUdH8k
<?php 
=> npm init -y
It will generate package.json file with line of code
{
  "name": "nodejexp",
  "version": "1.0.0",
  "description": "",
  "main": "index.js",
  "scripts": {
    "test": "echo \"Error: no test specified\" && exit 1"
  },
  "keywords": [],
  "author": "",
  "license": "ISC"
}

# Install following dependency
npm i express bcryptjs passport passport-local ejs express-ejs-layouts mongoose connect-flash express-session

-------------------------(package.json)------------------------------
{
  "name": "nodejexp",
  "version": "1.0.0",
  "description": "",
  "main": "index.js",
  "scripts": {
    "test": "echo \"Error: no test specified\" && exit 1"
  },
  "keywords": [],
  "author": "",
  "license": "ISC",
  "dependencies": {
    "bcryptjs": "^2.4.3",
    "connect-flash": "^0.1.1",
    "express": "^4.16.4",
    "express-ejs-layouts": "^2.5.0",
    "express-session": "^1.15.6",
    "mongoose": "^5.4.22",
    "passport": "^0.4.0",
    "passport-local": "^1.0.0"
  }
}


# Install nodemon
npm i -D nodemon 

# Update package.json
-------------------------(package.json)------------------------------

{
  "name": "nodejexp",
  "version": "1.0.0",
  "description": "",
  "main": "app.js",
  "scripts": {
    "start": "node app.js",
    "dev": "nodemon app.js"
  },
  "keywords": [],
  "author": "",
  "license": "ISC",
  "dependencies": {
    "bcryptjs": "^2.4.3",
    "connect-flash": "^0.1.1",
    "express": "^4.16.4",
    "express-ejs-layouts": "^2.5.0",
    "express-session": "^1.15.6",
    "mongoose": "^5.4.22",
    "passport": "^0.4.0",
    "passport-local": "^1.0.0"
  },
  "devDependencies": {
    "nodemon": "^1.18.10"
  }
}

# Create app.js file
------------(app.js)------------------

const express = require('express');

const app = express();

const PORT = process.env.PORT || 5000;

app.listen(PORT, console.log(`Server started on port ${PORT}`)); 

# Run command
npm run dev

URL => http://localhost:5000/
o/p => Error Cannot GET /

Because we did not create route for that.


# ------------(app.js)------------------
const express = require('express');

const app = express();

//Routes
app.use('/',require('./routes/index'));

const PORT = process.env.PORT || 5000;

app.listen(PORT, console.log(`Server started on port ${PORT}`)); 

# ------------(index.js)------------------
const express = require('express');
const router = express.Router();

router.get("/",function(req,res){
	res.send('welcome');
});

module.exports = router;

*******************************
http://localhost:5000/
o/p => welcome
******************************


# ------------(users.js)------------------

const express = require('express');
const router = express.Router();

router.get("/login",function(req,res){
	res.send('Login');
});

router.get("/register",function(req,res){
	res.send('Register');
});

module.exports = router;


*******************************
http://localhost:5000/users/login
o/p => Login

http://localhost:5000/users/register
o/p => Register
*******************************


# Add expressLayouts

------------(app.js)------------------

const express = require('express');
const expressLayouts = require('express-ejs-layouts')

const app = express();

//EJS
app.use(expressLayouts);        //Middleware
app.set('view engine','ejs');

//Routes
app.use('/',require('./routes/index'));
app.use('/users',require('./routes/users'));

const PORT = process.env.PORT || 5000;

app.listen(PORT, console.log(`Server started on port ${PORT}`)); 

# Render Welcome message using ejs templates

------------(app.js)------------------
const express = require('express');
const router = express.Router();

router.get("/",function(req,res){
	res.render('welcome');
});

module.exports = router;


------------(welcome.ejs)------------------
<h1>Welcome</h1>


------------(layout.ejs)------------------
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://bootswatch.com/4/journal/bootstrap.min.css">
    <title>Node.js & Passport App</title>
</head>
<body>
    <div class="container">
        <%- body %>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

# Update welcome.ejs
------------(welcome.ejs)------------------

<div class="row mt-5">
    <div class="col-md-6 m-auto">
      <div class="card card-body text-center">
        <h1><i class="fab fa-node-js fa-3x"></i></h1>
        <p>Create an account or login</p>
        <a href="/users/register" class="btn btn-primary btn-block mb-2">Register</a>
        <a href="/users/login" class="btn btn-secondary btn-block">Login</a>
      </div>
    </div>
  </div>
  
  
# Update users.ejs
const express = require('express');
const router = express.Router();

router.get("/login",function(req,res){
	//res.send('Login');
	res.render('login');
});

router.get("/register",function(req,res){
	//res.send('Register');
	res.render('register');
});

module.exports = router;



  
# register.ejs  
<div class="row mt-5">
    <div class="col-md-6 m-auto">
      <div class="card card-body">
        <h1 class="text-center mb-3">
          <i class="fas fa-user-plus"></i> Register
        </h1>
       
        <form action="/users/register" method="POST">
          <div class="form-group">
            <label for="name">Name</label>
            <input
              type="name"
              id="name"
              name="name"
              class="form-control"
              placeholder="Enter Name"
              value="<%= typeof name != 'undefined' ? name : '' %>"
            />
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input
              type="email"
              id="email"
              name="email"
              class="form-control"
              placeholder="Enter Email"
              value="<%= typeof email != 'undefined' ? email : '' %>"
            />
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input
              type="password"
              id="password"
              name="password"
              class="form-control"
              placeholder="Create Password"
              value="<%= typeof password != 'undefined' ? password : '' %>"
            />
          </div>
          <div class="form-group">
            <label for="password2">Confirm Password</label>
            <input
              type="password"
              id="password2"
              name="password2"
              class="form-control"
              placeholder="Confirm Password"
              value="<%= typeof password2 != 'undefined' ? password2 : '' %>"
            />
          </div>
          <button type="submit" class="btn btn-primary btn-block">
            Register
          </button>
        </form>
        <p class="lead mt-4">Have An Account? <a href="/users/login">Login</a></p>
      </div>
    </div>
  </div>  
  
# login.ejs   
<div class="row mt-5">
    <div class="col-md-6 m-auto">
      <div class="card card-body">
        <h1 class="text-center mb-3"><i class="fas fa-sign-in-alt"></i>  Login</h1>
        
        <form action="/users/login" method="POST">
          <div class="form-group">
            <label for="email">Email</label>
            <input
              type="email"
              id="email"
              name="email"
              class="form-control"
              placeholder="Enter Email"
            />
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input
              type="password"
              id="password"
              name="password"
              class="form-control"
              placeholder="Enter Password"
            />
          </div>
          <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
        <p class="lead mt-4">
          No Account? <a href="/users/register">Register</a>
        </p>
      </div>
    </div>
  </div>  
  
# dashboard.ejs  
<h1 class="mt-4">Dashboard</h1>
<p class="lead mb-3">Welcome <%= user.name %></p>
<a href="/users/logout" class="btn btn-secondary">Logout</a>

# MongoDB Connection in app.js

// DB Config
const db = require('./config/keys').mongoURI;

// Connect to MongoDB
mongoose.connect(db,{ useNewUrlParser: true })
  .then(() => console.log('MongoDB Connected'))
  .catch(err => console.log(err));  
  
---------------------(app.js)-------------------------
const express = require('express');
const expressLayouts = require('express-ejs-layouts');
const mongoose = require('mongoose');

const app = express();

// DB Config
const db = require('./config/keys').mongoURI;

// Connect to MongoDB
mongoose.connect(db,{ useNewUrlParser: true })
  .then(() => console.log('MongoDB Connected'))
  .catch(err => console.log(err));

//EJS
app.use(expressLayouts);        //Middleware
app.set('view engine','ejs');

//Routes
app.use('/',require('./routes/index'));
app.use('/users',require('./routes/users'));

const PORT = process.env.PORT || 5000;

app.listen(PORT, console.log(`Server started on port ${PORT}`));   
  
------------(keys.js)------------------
//dbPassword = 'mongodb+srv://YOUR_USERNAME_HERE:'+ encodeURIComponent('YOUR_PASSWORD_HERE') + '@CLUSTER_NAME_HERE.mongodb.net/test?retryWrites=true';
dbPassword = 'mongodb://localhost:27017/college';
module.exports = {
    mongoURI: dbPassword
};  



# Create Users Model:
---------------------(models/User.js)-------------------------
const mongoose = require('mongoose');

const UserSchema = new mongoose.Schema({
  name: {
    type: String,
    required: true
  },
  email: {
    type: String,
    required: true
  },
  password: {
    type: String,
    required: true
  },
  date: {
    type: Date,
    default: Date.now
  }
});

const User = mongoose.model('User', UserSchema);

module.exports = User;


------------------------------------------------------






















  
?>
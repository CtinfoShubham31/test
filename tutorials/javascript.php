<?php

# Difference between var and let in JavaScript

> JavaScript Block Scope
Variables declared with the var keyword can not have Block Scope.
Variables declared inside a block {} can be accessed from outside the block.

Example (1):
{ 
  var x = 2; 
}
// x CAN be used here

Before ES2015 JavaScript did not have Block Scope.
Variables declared with the let keyword can have Block Scope.
Variables declared inside a block {} can not be accessed from outside the block:

Example (2):
{ 
  let x = 2;
}
// x can NOT be used here


> Redeclaring Variables
Redeclaring a variable using the var keyword can impose problems.
Redeclaring a variable inside a block will also redeclare the variable outside the block:
Example (3):
var x = 10;
// Here x is 10
{ 
  var x = 2;
  // Here x is 2
}
// Here x is 2


Redeclaring a variable using the let keyword can solve this problem.
Redeclaring a variable inside a block will not redeclare the variable outside the block:

Example (4):
var x = 10;
// Here x is 10
{ 
  let x = 2;
  // Here x is 2
}
// Here x is 10

Example (5):
var i = 5;
for (var i = 0; i < 10; i++) {
  // some statements
}
// Here i is 10

Example (6):
let i = 5;
for (let i = 0; i < 10; i++) {
  // some statements
}
// Here i is 5


# JavaScript Data Types

var length = 16;                               // Number
var lastName = "Johnson";                      // String
var x = {firstName:"John", lastName:"Doe"};    // Object

When adding a number and a string, JavaScript will treat the number as a string.

Example (1)
var x = 16 + "Volvo";

o/p => 16Volvo

Example (2)
var x = "Volvo" + 16;

o/p => Volvo16

JavaScript evaluates expressions from left to right. Different sequences can produce different results:

Example (3)
JavaScript treats 16 and 4 as numbers, until it reaches "Volvo".
var x = 16 + 4 + "Volvo";

o/p => 20Volvo

Example (4)
 since the first operand is a string, all operands are treated as strings.
var x = "Volvo" + 16 + 4;

o/p => Volvo164


> JavaScript Types are Dynamic
JavaScript has dynamic types. This means that the same variable can be used to hold different data types:
 
var x;           // Now x is undefined
x = 5;           // Now x is a Number
x = "John";      // Now x is a String

o/p => John


# JavaScript Strings

> Special Characters
Because strings must be written within quotes, JavaScript will misunderstand this string:

var x = "We are the so-called "Vikings" from the north.";

The string will be chopped to "We are the so-called ".
The solution to avoid this problem, is to use the backslash escape character.
The backslash (\) escape character turns special characters into string characters:

Code		Result		Description
\'			'			Single quote
\"			"			Double quote
\\			\			Backslash

Example (1)
var x = "We are the so-called \"Vikings\" from the north.";
o/p => We are the so-called "Vikings" from the north

Example (2)
var x = 'It\'s alright.';
o/p => It's alright
'
Example (3)
var x = "The character \\ is called backslash.";
o/p => The character \ is called backslash.

Example (4)
var x = "We are the so-called \"Vikings\" from the north.";


# JavaScript Arrays
var cars = ["Saab", "Volvo", "BMW"];

# JavaScript Objects
var person = {firstName:"John", lastName:"Doe", age:50, eyeColor:"blue"};

# The typeof Operator

typeof ""             // Returns "string"
typeof "John"         // Returns "string"
typeof "John Doe"     // Returns "string"

typeof 0              // Returns "number"
typeof 314            // Returns "number"
typeof 3.14           // Returns "number"
typeof (3)            // Returns "number"
typeof (3 + 4)        // Returns "number"

# Undefined

In JavaScript, a variable without a value, has the value undefined. The type is also undefined

var car;    // Value is undefined, type is undefined

Example (1)

<p id="demo"></p>

<script>
var car;
document.getElementById("demo").innerHTML =
car + "<br>" + typeof car;
</script>

o/p => undefined

Example (2)

typeof undefined           // undefined
typeof null                // object

null === undefined         // false
null == undefined          // true























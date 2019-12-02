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



# What are JavaScript Data Types?

Following are the JavaScript Data types:

Number
String
Boolean
Object
Undefined

===========================================================================
# How to Send Cross Domain AJAX Request with jQuery
Cross-domain AJAX request is possible in two ways
1). Using JSONP
2). Using CORS (Cross-origin resource sharing)

1).USING JSONP
We can send cross domain AJAX requests using JSONP. Below is the simple JSONP Request:

$.ajax({
    url : "http://hayageektest.appspot.com/cross-domain-cors/jsonp.php",
    dataType:"jsonp",
});
 
function mycallback(data)
{
    alert("Here: "+data.name);
}

jsonp.php response is:
mycallback({"name":"Ravishanker","age":32,"location":"India"})

when the JSONP request is successful, mycallback function is called.

If you want the function handling automatically, you can use the below approach. In this case, you need not have any extra function. You can get the server response in success callback


$.ajax({
	url : "http://hayageektest.appspot.com/cross-domain-cors/jsonp.php",
	dataType:"jsonp",
	jsonp:"mycallback",
	success:function(data)
	{
		alert("Name:"+data.name+"nage:"+data.age+"nlocation:"+data.location);
	}
});


jsonp.php source code:

?php 

$callback ='mycallback';

if(isset($_GET['mycallback']))
{
	$callback = $_GET['mycallback'];
}   
$arr =array();
$arr['name']="Ravishanker";
$arr['age']=32; 
$arr['location']="India";   

echo $callback.'(' . json_encode($arr) . ')';

php?

******
This works in all the browsers but the problem is: JSONP supports only GET method. POST method is not allowed.

2).USING CORS (CROSS-ORIGIN RESOURCE SHARING)
Browser does not allow cross domain AJAX requests due to security issues. Cross-domain requests are allowed only if the server specifies same origin security policy.
Read more about Cross-origin resource sharing (CORS) : Wiki

To enable CORS, You need to specify below HTTP headers in the server.
Access-Control-Allow-Origin – Name of the domain allowed for cross domain requests. * indicates all domains are allowed.
Access-Control-Allow-Methods – List of HTTP methods can be used during request.
Access-Control-Allow-Headers – List of HTTP headers can be used during request.

In PHP, you can use the below code to set the headers.

header('Access-Control-Allow-Origin: *');  
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
Below the sample code which handles Cross Domain AJAX POST requests: post.php

?php
header('Access-Control-Allow-Origin: *'); 
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
 
$_POST['extra']='POST Request from hayageek.com';
echo json_encode($_POST);
?php

CORS works fine in all the latest browsers, but IE8 and IE9 don’t support this.

=============================================================================
# jQuery - Chaining
Chaining allows us to run multiple jQuery methods (on the same element) within a single statement.

jQuery Method Chaining:
Until now we have been writing jQuery statements one at a time (one after the other).

1. EXAMPLE:
Example chains together the css(), slideUp(), and slideDown() methods. The "p1" element first changes to red, then it slides up, and then it slides down:
=> $("#p1").css("color", "red").slideUp(2000).slideDown(2000);
==============================================================================

https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/documentation/documentation-form-repeater.html

https://toolset.com/2017/08/preview-for-nested-repeating-fields-groups/

https://github.com/DubFriend/jquery.repeater

https://wordpress.stackexchange.com/questions/134348/how-do-i-setup-nested-repeatable-option-fields
https://stackoverflow.com/questions/14616194/jquery-ui-nested-accordion-with-content-in-top-level-accordion?rq=1 ----(ok)

https://www.jquery-az.com/use-jquery-append-add-html-content-examples/  ----(ok)

https://www.sanwebe.com/2013/03/addremove-input-fields-dynamically-with-jquery

https://surveyjs.io/Examples/Library/?id=survey-quiz

https://www.allphptricks.com/add-remove-input-fields-dynamically-using-jquery/


https://wordpress.stackexchange.com/questions/134348/how-do-i-setup-nested-repeatable-option-fields
----(ok)



https://stackoverflow.com/questions/20215744/how-to-create-a-mysql-hierarchical-recursive-query
mysql

https://itsolutionstuff.com/post/laravel-5-category-treeview-hierarchical-structure-example-with-demoexample.html
mysql

http://mikehillyer.com/articles/managing-hierarchical-data-in-mysql/
mysql

https://phppot.com/php/php-jquery-dynamic-textbox/
dynamic text box

http://www.infotuts.com/dynamically-add-input-fields-submit-to-database/

http://papermashup.com/dynamically-add-form-inputs-and-submit-using-jquery/


http://demo.itsolutionstuff.com/category-tree-view
laravel category

https://jsfiddle.net/r70wqav7/





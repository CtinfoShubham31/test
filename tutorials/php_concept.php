<?php
# Acess specifier

Public method or variable can be access from anywhere. I mean from inside the class, outside the class and in the child class also.
Example:
class abc{
	public $name = "Public property";
	
	public function demo(){
		echo 'Public function';
	}
	
}

$obj = new abc();
echo $obj->name;
$obj->demo();

o/p => 
Public property
Public function

Protected method, can only be access by child class.
Example:
class abc{
	protected $name = "Protected property";
	
	protected function demo(){
		echo 'Protected function';
	}
	
}

class test extends abc{
	public function xyz(){
		echo $this->name;
		echo $this->demo();
	}
}

$obj = new test();
echo $obj->xyz();

o/p => 
Protected property
Protected function


Private property can only be access inside the class.
Example:

class abc{
	private $name = "Private property";
	
	private function demo(){
		echo 'Private function';
	}
	
	public function test(){
		echo $this->name;
		echo $this->demo();
	}
}

$obj = new abc();
$obj->test();

o/p => 
private property
private function

------------------------------------------------------------------------------------------------

# Abstract Class
Means incomplete
function which is decleared but not implemented

Like,
Class ABC {
	public abstract function xyz();
}

if declear class as abstract then this class object would not be created directly.Abstract class are those classes which can not be directly initialized.Or in other words we can say that you can not create object of abstract classes. 

> Abstract class always created for inheritance purpose.
> You can only inherit abstract class in your child class.

Usually abstract class are also known as base class.

1. An Abstract Class cannot be instantiated, It means you cannot use them directly.
2. An abstract method should not be private.
3. When any child class inherits an abstract class then all the abstract methods in a parent class must be defined in a child class.


(1) Example with error
abstract class abc{
	abstract public function test(); //Abstract method.
	
	public function demo(){
		echo 'This is demo function.';
	}
}

$classobj = new abc();		//Fatal error: Cannot instantiate abstract class abc in C:\xampp\htdocs\dryveways\program.php on line 11
echo $classobj->demo();

(2) Correct above program

abstract class abc{
	abstract public function test(); //Abstract method.
	
	public function demo(){
		echo 'This is demo function.';
	}
}

class xyz extends abc{
	public function test(){
		echo 'This is test function.';
	}	
}

$classobj = new xyz();
echo $classobj->test();

O/p => This is test function.

------------------------------------------------------------------------------

# Polymorphism
Means many form

According to polymorphism principle, method in diffrent classes that do the similar things should have the same name.

interface shape{
	public function calarea();
}

class circle implements shape{
	public $radius;
	public function __construct($r){
		$this->radius = $r;
	}
	
	public function calarea(){
		return 3.14*$this->radius*$this->radius;
	}
}

class rectangle implements shape{
	public $length;
	public $breath;
	public function __construct($r){
		$this->length = $r;
		$this->breath = $r;
	}
	
	public function calarea(){
		return $this->length*$this->breath;
	}
}

$rec = new rectangle(10);
echo $rec->calarea();
echo '<br/>';
$obj = new circle(10);
$obj->calarea();

o/p=>
100
314


-----------------------------------------------------------------------------
# REVERSE THE STRING

//your string
$string = 'ABCDEFG';
 
//find string length
$len = strlen($string);
 
//loop through it and print it reverse
for ( $i = $len - 1; $i >=0;$i-- )
{
  echo $string[$i];
}

echo '<br/>';

# REVERSE THE ARRAY

$array = array('1','2','3','4','5','6','7','8','9','10');
$arr_count = COUNT($array);
$arr_result = array();
for($i = $arr_count-1; $i>=0; $i--){
	$arr_result[] = $array[$i];
}
print_r($arr_result);

# REMOVE DUPLICATE ARRAY

$inputArray = array(1, 4, 2, 1, 6, 4, 9, 7, 2, 9);
$outputArray = array();

foreach ($inputArray as $val){
 if(!in_array($val,$outputArray)){
  $outputArray[] = $val;
 }
}
print_r($outputArray);

o/p => Array ( [0] => 1 [1] => 4 [2] => 2 [3] => 6 [4] => 9 [5] => 7 ) 

# ARRAY SORTING

$array=array('2','4','8','5','1','7','6','9','10','3');

echo "Unsorted array is: ";
echo "<br />";
print_r($array);


for($j = 0; $j < count($array); $j ++) {
    for($i = 0; $i < count($array)-1; $i ++){

        if($array[$i] > $array[$i+1]) {
            $temp = $array[$i+1];
            $array[$i+1]=$array[$i];
            $array[$i]=$temp;
        }       
    }
}

echo "Sorted Array is: ";
echo "<br />";
print_r($array);


--------------------------------------------------------------------------------------

# cURL(Client Url)
is a library that lets you make http request. Allows us to receive and send information via the URL syntax. By doing so, cURL makes it easy to communicate between different websites and domains.

Process includes the following four parts: 
1. Initialization.
$handle = curl_init();

2. Setting the options. There are many options, for example, an option that defines the URL.
curl_setopt($handle, CURLOPT_URL, $url);

3. Execution with curl_exec().
$data = curl_exec($handle);

4. Releasing the cURL handle.
curl_close($handle);
---------------------------------------------------------------------------------
# PDO(PHP DATA OBJECT):
PDO is an database layer which is used for diffrent2 database layer. It means it support more than one database. It also use oop. It prevent us from sql injection using prepared statement.

--------------------------------------------------------------------------------

# Persistent connection
---------------------------------------------------------------------------------

# Google api
----------------------------------------------------------------------------------
# Push notification
How to Send Push Notifications in PHP to iOS Devices Using FCM
https://www.cumulations.com/blogs/87/how-to-send-push-notifications-in-php-to-ios-devices-using-fcm

# Firebase
https://www.youtube.com/watch?v=MYZVhs6T_W8
http://www.androiddeft.com/2017/11/18/push-notification-android-firebase-php/
http://www.codecastra.com/fcm-push-notification/
http://webrocom.net/send-fcm-push-notification-to-android-using-php/

-----------------------------------------------------------------------------------
# Difference Between Single And Double Quotes:

echo 'This is \'test\' string';
//Output: This is 'test' string

$count = 1;
echo "The count is $count";
//Output: The count is 1

$count = 1;
echo 'The count is $count';
//Output: The count is $count

$name = 'whatisdifference.com'; 
echo 'Start with a simple string<br>'; 
echo 'String\'s apostrophe<br>';
echo 'String with a php variable: '.$name;

//Output
//Start with a simple string
//String’s apostrophe
//String with a php variable: whatisdifference.com

$name = 'whatisdifference.com'; 
echo "Start with a simple string<br>";
echo "String's apostrophe<br>";
echo "String with a php variable {$name}";

//Output
//Start with a simple string
//String’s apostrophe
//String with a php variable whatisdifference.com
--------------------------------------------------------------------------------
# What is the difference between PHP's get method & post method?
(1)The GET method is restricted to send upto 1024 characters only.GET transfers limited amount of data.
The POST method does not have any restriction on data size to be sent. POST transfers the information through document body.

(2) GET is unsecured.
POST is highly secured.

(3) GET can`t upload the file.
POST can upload the files.

--------------------------------------------------------------------------------
# include() and require()
To insert the content of one PHP file into another PHP file before the server executes it.
================================================================================
https://www.javatpoint.com/php-alphabet-triangle-pattern
CODEIGNITER:


# Hook :

Some time we need some functionality before execution of our controller function or after execution of controller. For example you need to check a user is login or not before execution of any controller. Codeigniter hook is a very good functionality to solve this kind of problem, it save time to writing code multiple time. 

The list of hook points is shown below.

> pre_system
It is called much before the system execution. Only benchmark and hook class have been loaded at this point.

> pre_controller
It is called immediately prior to your controller being called. At this point all the classes, security checks and routing have been done.

> post_controller_constructo
It is called immediately after your controller is started, but before any method call.

> post_controller
It is called immediately after your controller is completely executed.

> display_override
It is used to send the final page at the end of file execution.

> cache_override
It enables you to call your own function in the output class.

> post_system
It is called after the final page is sent to the browser at the end of the system execution.


Lets have a below example for pre hook as below::

1) Open "Config.php" and change the statement

$config['enable_hooks'] = FALSE;
// Change this statement to true
$config['enable_hooks'] = TRUE;

2) Now I have created a Controller "Codeigniter/application/controllers/Hello.php" with below code::
 
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Hello extends CI_Controller {
    function index(){
        echo "My name is Vivek";
    }
}
?>

When I run this code on browser it will display "My name is Vivek"

3) Now I have created a file "application/hooks/Hookcall.php" and save this on below path ::

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Hookcall extends CI_Controller {
    public function temp(){
        echo "Good Morning, Everyone";
    }
}
?>

4) Now I open do open "Codeigniter/application/config/hooks.php" and paste code shown below::

$hook['pre_controller'] = array(
						'class'    => 'Hookcall',
						'function' => 'temp',
						'filename' => 'Hookcall.php',
						'filepath' => 'hooks'
						);
						
5) Now see the magic when you run "http://localhost/codelgniter/hello" Now it will display
*** "Good Morning, Everyone My name is Vivek"

----------------------------------------------------------------------------------------------------

# Codeigniter ( Core Classes ) 
https://www.youtube.com/watch?v=F4AcX_rfV-c

----------------------------------------------------------------------------------------------------

# Codeigniter Active Records:
It`s a design pattern which is used for dealing with database.

---------------------------------------------------------------------------------------------------
# Codeigniter URL Rewriting:

We can use two types of wildcards, namely:

1  :num –  Segment containing only numbers will be matched.
2  :any – Segment containing only characters will be matched.

Using  :num
$route['(blog/:num)'] = 'tutorial/java/$1';

As when we invoke https://www.formget.com/blog/1  or https://www.formget.com/blog/2  it will redirect to https://www.formget.com/tutorial/java/$1.

Using  :any
$route['(blog/:any)'] = 'tutorial/java';

As when we invoke https://www.formget.com/blog/css  it will redirect to https://www.formget.com/tutorial/java.


URL Suffix
To add a suffix, edit config.php which is located in  application/config. For example,

$config['url_suffix'] = '.html';

http://www.formget.com/blog/language
http://www.formget.com/blog/language.html

URL Enabled Query String
In order to use Query String URL’s, edit config.php which is located in  application/config.  Set ‘enable_query_strings’ to TRUE and define controller and function trigger.

$config['enable_query_strings'] = TRUE;
$config['controller_trigger'] = 'c';
$config['function_trigger'] = 'm';

http://www.formget.com/blog/language
http://www.formget.com/?c=blog&m=language


Note : tutorial is controller and java is controller’s function.

S/N		Route													   Corresponding URL
1		$route['default_controller'] = 'welcome';	               http://localhost:3000
2		$route['contacts'] = 'contacts';	                       http://localhost:3000/contacts
3		$route['create'] = 'contacts/create';	                   http://localhost:3000/contacts/create
4		$route['edit/:id'] = 'contacts/edit';	                   http://localhost:3000/contacts/edit/1
5		$route['update/:id'] = 'contacts/update';	               http://localhost:3000/contacts/update/1
6		$route['delete/:id'] = 'contacts/delete';	               http://localhost:3000/contacts/delete/1


===================================================================================================
===================================================================================================

# Magic Method
Magic function are used to call for specific event.

(1.) __autoload():
Use Multiple class in single file, then we use __autoload

If I want all three class

auto_load.php

//include_once("classes/abc.php");
//include_once("classes/xyz.php");
//include_once("classes/hello.php");

function __autoload($classname){
	include_once("classes/$classname.php");
}

$abc = new abc();
$abc->test();
$xyz = new xyz();
$hello = new hello();

abc.php
class abc{
	public function test(){
		echo "This is test function.";
	}
}

xyz.php
class xyz{
	public function demo(){
		echo "This is demo function.";
	}
}

hello.php
class hello{
	public function ab(){
		echo "This is ab function.";
	}
}

(2.) __toString()

When you want to $obj treat here as string

class a{
	public function __toString(){
		return "This is abc funtion";
	}
}
$obj = new a;
echo $obj;

o/p =>This is abc funtion

(3.) __invoke()

Class $obj treat here as function

class a{
	public function __invoke($a,$b){
		return $a." ".$b;
	}
}
$obj = new a;
echo $obj("shubham","shivam");

o/p =>shubham shivam

(4.) __get()
get.php

call when use to access those variable or property which is not exists in class.

class a{
	public $name = "danish";
	public function abc(){
		echo "This is abc function";
	}
}
$obj = new a;
echo $obj->name;

class a{
	public function __get($n){
		echo $n;
	}
}
$obj = new a;
echo $obj->name;

o/p=> name

class a{
	private $arr=['name'=>'shubham','last'=>'sharma'];
	public function __get($n){
		if(array_key_exists($n,$this->arr)){
			echo $this->arr[$n];
		}else{
			echo "error";
		}
	}
}
$obj = new a;
$obj->name;

o/p=> shubham


# Constructor:

If a class name and function name will be similar in that case function is known as constructor.
Constructor is special type of method because its name is similar to class name.
Constructor automatically calls when object will be initializing.

<?php
class A
{
	function testA()
	{
		echo "This is test method of class A";
	}
	function A()
	{
		echo "This is user defined constructor of class A"."<br/>";
	}
}

$obj= new A();
$obj->testA();

===============================================================================

# CRM (Customer-relationship management)
Customer-relationship management is an approach to manage a company`s interaction with current and potential customers. It uses data analysis about customer`s history with a company to improve business relationships with customers. 

==============================================================================

# COMPOSER:
COMPOSER is an software, and autoloader which is managed dependency of php(package manager) 

===============================================================================

persistent cookie
# PERSISTENT COOKIE:
Also called a permanent cookie, or a stored cookie, a cookie that is stored on a users hard drive until it expires (persistent cookies are set with expiration dates) or until the user deletes the cookie. Persistent cookies are used to collect identifying information about the user, such as Web surfing behavior or user preferences for a specific Web site.


===============================================================================

include() function does not stop execution , just give warning and continues to execute the script in case of file name not found i..e missing/misnamed files .

require() function gives fatal error if it founds any problem like file not found or misnamed files and stops the execution once get fatal error.
====================================================================================
# SESSION and COOKIE

SESSION => Data stored on server
COOKIE => Cookies Data Stored on clide side or user`s browser.

SESSION => Session Data more secure because they never travel on every HTTP Request.
COOKIE => Cookies Data are less secure because they travel with each and every HTTP Request.

SESSION => You can store the objects in session(Store large amount of data).
COOKIE => You can store only string type of data in cookies (MAX File Size-4kb)

====================================================================================
# GET and POST method

GET AND POST Both are the methods of http protocols:
Both GET and POST method is used to transfer data from client to server in HTTP protocol

GET => Data are visible in the URL string as query string.
POST => Data are not visible in the URL string as query string.

1) In case of Get request, only limited amount of data can be sent because data is sent in header.	
In case of post request, large amount of data can be sent because data is sent in body.

2) Get request is not secured because data is exposed in URL bar.	
Post request is secured because data is not exposed in URL bar.

3) Get request can be bookmarked.	
Post request cannot be bookmarked.
====================================================================================
# What is REST API?
REST stands for "REpresentational State Transfer". It is a concept or architecture for managing information over the internet. 
It is usually represented by JSON.

API stands for "Application Programming Interface". It is a set of rules that allows one piece of software application to talk to another.

Why do we need REST API?
In many applications, REST API is a need because this is the lightest way to create, read, update or delete information between different applications over the internet or HTTP protocol.
=====================================================================================
# array_merge() Function
The array_merge() function merges one or more arrays into one array.

Note: If two or more array elements have the same key, the last one overrides the others.

=> Example 1:

$a1=array("red","green");
$a2=array("blue","yellow");
print_r(array_merge($a1,$a2));

o/p => Array ( [0] => red [1] => green [2] => blue [3] => yellow )

=> Example 2:
Merge two associative arrays into one array:

$a1=array("a"=>"red","b"=>"green");
$a2=array("c"=>"blue","b"=>"yellow");
print_r(array_merge($a1,$a2));

o/p => Array ( [a] => red [b] => yellow [c] => blue )

=> Example 3:
Using only one array parameter with integer keys:
$a=array(3=>"red",4=>"green");
print_r(array_merge($a));

o/p => Array ( [0] => red [1] => green )
=======================================================================================

# array_combine()
The array_combine() function creates an array by using the elements from one "keys" array and one "values" array.

Note: Both arrays must have equal number of elements!

=> Example 1:

$fname=array("Peter","Ben","Joe");
$age=array("35","37","43");
$c=array_combine($fname,$age);
print_r($c);

o/p => Array ( [Peter] => 35 [Ben] => 37 [Joe] => 43 )

============================================================================================
# strstr()
The strstr() function searches for the first occurrence of a string inside another string.

=> Example 1:
echo strstr("Hello world!","world");

o/p => world!

======================================================================================
# strpos()
The strpos() function finds the position of the first occurrence of a string inside another string.

=> Example 1:
echo strpos("I love php, I love php too!","php");

o/p => 7

=======================================================================================
# namespace

Use for better organise of classes.
namespace is like a folder or directory.

Example 1:
namespace def {		//def namespace
	class xyz{
		public function __construct(){
			echo "XYZ from DEF namespace";
		}
	}
}

namespace {			//Global namespace
	class xyz{
		public function __construct(){
			echo "XYZ from Global namespace";
		}
	}
	
	$obj = new xyz();	//XYZ from Global namespace
	
	$obj = new def\xyz(); //XYZ from DEF namespace
}

Example 2:

namespace def {		//def namespace
	class xyz{
		public function __construct(){
			echo "XYZ from DEF namespace";
		}
	}
}

namespace {			//Global namespace
	use def\xyz;
	
	$obj = new xyz();	//XYZ from Global namespace
}

=======================================================================================

# PHP 7 Sclar Datatype Hinting:
1. Sclar Datatype means boolean(bool), integer(int), string all we can type hint, but before version this feature not avilable.

function add(string $a, string $b){
	return $a.$b;
}

echo add(3,'shubham');

2. Return Type Declaration

# Example 1:
declare(strict_type = 1);
ini_set('display_errors','1');

function test(){
	return [];
	//return 45;   => int(45)
}
var_dump(test());

o/p => array(0){}

# Example 2:
declare(strict_type = 1);
ini_set('display_errors','1');

function test() : array {
	return [];
	//return 45;   => int(45)
}
var_dump(test());

o/p => array(0){}

3. Null Coalesce Operator (??)

Ternary operator
$name = isset($_GET['name']) ? $_GET['name'] : 'Not Found';

o/p => Not Found

$name = isset($_GET['name']) ?? 'Not Found';

4. Combined Comparison / Spaceship Opeartor (<=>)


========================================================================================

# To On error:

ini_set('display_errors','1');

========================================================================================

npm install -g ionic@3.9.2






https://www.hipdf.com/txt-to-pdf
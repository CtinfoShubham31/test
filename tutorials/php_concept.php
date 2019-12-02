# Acess specifier
# Access private Variable and private Method from outside of Class in PHP
# Encapsulation
# Abstract Class
# Interface
# Polymorphism
# Dependency injection
# Method overriding:
# Method overloading:
# Understanding the ‘self’ keyword in PHP
# Static vs Non-static methods in PHP: what is faster?
# Static property and method:
# Early Binding and Late Binding:
# More Explanation late static binding.
# Traits
# Final Keyword

# cURL(Client Url)
# PDO(PHP DATA OBJECT):
# What is the difference between PHP's get method & post method?
# Hook :
# Magic Method
# Constructor:
# SESSION and COOKIE
# array_merge() Function
# array_combine()
# json_encode

# namespace
# PHP 7 Sclar Datatype Hinting:
# CSRF
# REST API

# http://www.developphp.com/video/PHP/PayPal-IPN-PHP-Instant-Payment-Notification-Script
<?php
# Access specifier

Public method or variable can be access from anywhere. It mean from inside the class, outside the class and in the child class also.
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
================================================================================================
# Access private Variable and private Method from outside of Class in PHP

1.) Example

Class Demo
{
    private $myPrivateVariable = 'I am Private Variable';
     
    public function myPublicMethod()
    {
        return 'I am Public Method';
    }
 
    private function myPrivateMethod()
    {
        return 'I am Private Method';
    }
}
 
$demo = new Demo();
 
//$reflection_class = new ReflectionClass('Demo');
$reflection_class = new ReflectionClass($demo);
 
$private_method = $reflection_class->getMethod('myPrivateMethod');
$private_method->setAccessible(true);
echo $private_method->invoke($demo);
// I am Private Method
 
$private_variable = $reflection_class->getProperty('myPrivateVariable');
$private_variable->setAccessible(true);
echo $private_variable->getValue($demo);
// I am Private Variable

-----------------------------------------------------
2.) Example

class LockedGate
{
    private function open()
    {
        return 'how did you get in here?!!';
    }
}

$object = new LockedGate();
$reflector = new ReflectionObject($object);
$method = $reflector->getMethod('open');
$method->setAccessible(true);
echo $method->invoke($object);

=================================================================================================
# Encapsulation 
Wrapping some data in single unit is called Encapsulation
Encapsulation is used to safe data and information in an object from other it means encapsulation is mainly used for protection purpose.

encapsulation is known as data hiding is the main advantage for encapsulation.

Example

class kids
{
	private $height;

	public function setHeight($height)
	{
		if ($height > 30)
		{
			$this->height= $height;
		}
	}

	public function getHeight()
	{
		echo "The child's height is " . $this->height . " inches tall";
	}
}

$kid1= new kids;
$kid1->setHeight(40);
$kid1->getHeight();
====================================================================================

# Abstract Class
Means incomplete
function which is decleared but not implemented.
Abstraction is a way of hiding information .

Like,
Class ABC {
	public abstract function xyz();
}

if declear class as abstract then this class object would not be created directly. Abstract class are those classes which can not be directly initialized.Or in other words we can say that you can not create object of abstract classes. 

> You can only inherit abstract class in your child class.
> For abstract class a method must be declared as abstract. Abstract methods doesn’t have any implementation.
> A class can Inherit only one Abstract class and Multiple inheritance is not possible for Abstract class.

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

# Interface

Difference Between Interface And Abstract Class

(1.)
Interface support multiple inheritance.
Abstract class doesn’t support multiple inheritance.

(2.)
Interface doen`t contains Data Memners
Abstract class contains Data Members

(3.)
Interface doesn’t contain Constructors
Abstract class contains Constructors

(4.)
An interface Contains only incomplete member(Signature of members)
An Abstract class can contain both incomplete(abstract) and complete member.

------------------------------------------------------------------------------

# Interface
> All methods declared in an interface must be public.
> Interfaces cannot contain variables and concrete methods except constants.
> A class can implement many interfaces and Multiple interface inheritance is possible.


Example 1.
//DeclarTION
interface abc{
	public function test();
	
	public function xyz();
}

class def implements abc{
	public function test(){
		echo 'Test function';
	}
	public function xyz(){
		echo 'Xyz function';
	}
}

Example 2.
interface a{
	public function abc();
}

interface b{
	public function xyz();
}

class c implements a,b{
	public function abc(){
		echo 'abc function';
	}
	public function xyz(){
		echo 'xyz function';
	}
}


Example 3.

interface A
{
	function f1();
}
 
interface B
{
	function f2();
}
 
class C implements A,B
{
	function f1()
	{
		echo "hi";
	}
 
	function f2()
	{
		echo "hello";
	}
 
}
 
$ob=new C();
 
$ob->f1();
$ob->f2();

Output =>
hi
hello



# Interface (Using Multiple Interface):

interface C { 
   public function insideC(); 
} 
  
interface B { 
   public function insideB(); 
} 
  
class Multiple implements B, C { 
	
    // Function of the interface B 
    function insideB() { 
        echo "\nI am in interface B"; 
    } 
  
    // Function of the interface C 
    function insideC() { 
        echo "\nI am in interface C"; 
    } 
  
    public function insidemultiple() 
    { 
        echo "\nI am in inherited class"; 
    } 
} 
  
$geeks = new multiple(); 
$geeks->insideC(); 
$geeks->insideB(); 
$geeks->insidemultiple(); 

Output:
I am in interface C
I am in interface B
I am in inherited class


In the above program multiple interfaces has been used to implement multiple inheritance. In above example there are two interfaces named “B” and “C” those are playing the role of the base classes and there is child class named “Multiple” and we are invoking all the functions using its object named “geeks”.
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

================================================================================================
# Dependency injection
If we want to use the code of one class to another class then we need to use dependency injection.

Example 1.  Here, Logger class is the dependency of UserProfile class. It means UserProfile class depend upon Logger Class.

class Logger{
	public function log($message){
		echo "Logging message: $message";
	}
}

class UserProfile{
	private $logger;
	
	public function createUser(){
		$this->logger->log("User Created");
	}
	
	public function updateUser(){
		$this->logger->log("User Updated");
	}
	
	public function __construct(Logger $logger){	//here, we r receiving logger class objectd
		//$this->logger = new Logger();
		$this->logger = $logger;		//And assign logger class object to this property.
	}
}

$logger = new Logger();
$profile =  new UserProfile($logger);
$profile->createUser();
$profile->updateUser();

o/p =>
Logging message: User Created
Logging message: User Updated

---------------------------------------------------------------------------

Example 2.

// Without dependency injection
class MyService
{
    private $myLogger;

    public function __construct()
    {
        $this->myLogger = new MyLogger();
    }
    //...
}

// With dependency injection
class MyService
{
    private $myLogger;

    public function __construct(MyLogger $myLogger)
    {
        $this->myLogger = $myLogger;
    }
    //...
}

Instead of creating the instance of MyLogger in MyService, it`s created in client code and passed in via constructor.

===============================================================================================
# Method overriding:
This method generally used in the case inheritance.

Overriding means is to replace parent class method in child class.In oop overriding is the process by which you can re-declare your parent class method in child class.

Normally method overriding required when your parent class have some method, but in your child class you want the same method with different behavior.

1.) Example 

class abc{
	public function __construct(){
		echo 'first class constructor.';
	}
}

class xyz extends abc{
	public function __construct(){
		echo 'second class constructor.'; //this function override class abc function
	}
	
	public function test(){
		echo "this is test function."
	}
	
}

$obj = new xyz;
$obj->test();

O/P=>
second class constructor.
this is test function.

-------------------------------------------------------------

2.) Example

class Book {
	public $name = 'Sarthak';
	
	public function author(){
		return "The author name is: ".$this->name;
	}
}

class newBook extends Book {
	public function author(){
		return "The author name are: ".$this->name." and Ankur ";
	}
}

$book = new newBook();
echo $book->author();

o/p => The author name are: Sarthak and Ankur 

===============================================================================================

# Method overloading:

Function overloading is a feature of object oriented programming that allows creating methods with the same name but differ in the type of input parameter.

Overloading in PHP creates properties and methods dynamically. These dynamic properties and method are processes using magic method.

(1.) Example: return fatal error

class text {
	public function display($parameter1) {
		echo "Hello world!!";
	}
	public function display($parameter1,$parameter2) {
		echo "Hello India!!";
	}
}
$obj = new text;
$obj->display('Hello');       // It will show fatal error


Output: 
Fatal error: Cannot redeclare text::display() 

As from above example we can say that in PHP overloading with same name function can’t be possible. Therefore, with the help of magic function overloading is done in PHP.

Following is an example of overloading with the help of magic methods:

(2.) Example:

class TDshape {
const Pi = 3.142 ;  // constant value
 function __call($fname, $argument){
    if($fname == 'area')
        switch(count($argument)){
            case 0 : return 0 ;
            case 1 : return self::Pi * $argument[0] ; // 3.14 * 5
            case 2 : return $argument[0] * $argument[1];  // 5 * 10
        }

    }

}
$circle = new TDshape();
echo "Area of circle:".$circle->area(5)."</br>"; // display the area of circle
 $rect = new TDshape();
echo "Area of rectangle:".$rect->area(5,10); // display area of rectangle

Output :

Area of circle:15.71
Area of rectangle:50

In the above example __call is a magic method. This method is automatically called behind the scene.
-------------------------------------------------------------------

(3.) Example:

class abc{
	public function __call($method,$parameter){		//Magic method
		if($method=="test"){
			$count = count($parameter);
			if($count == 2){
				echo "You have to provide a two paramter";
			}
		}else{
			echo "not match";
		}
	}
}

$obj=new abc;
$obj->test("shubham","shivam");


o/p => You have to provide a two paramter


===============================================================================================

# Understanding the ‘self’ keyword in PHP
In PHP, you use the self keyword to access static properties and methods.

The problem is that you can replace $this->method() with self::method() anywhere, regardless if method() is declared static or not. So which one should you use?

Consider this code:

class ParentClass {
	function test() {
		self::who();	// will output 'parent'
		$this->who();	// will output 'child'
	}

	function who() {
		echo 'parent';
	}
}

class ChildClass extends ParentClass {
	function who() {
		echo 'child';
	}
}

$obj = new ChildClass();
$obj->test();

In this example, self::who() will always output ‘parent’, while $this->who() will depend on what class the object has.

Now we can see that self refers to the class in which it is called, while $this refers to the class of the current object.

So, you should use self only when $this is not available, or when you don’t want to allow descendant classes to overwrite the current method.

=============================================================================================
# Static vs Non-static methods in PHP: what is faster?

================================================================================================

# Static property and method:
Static properties and method in php can directly accessible without creating object of class. Like using scope resolution(::) operator. 

class abc{
	public static $table="login";
	
	public static function demo(){
		echo "This is satic function ".self::$table;
	}
}

abc::$table; //For accessing static property without making an object.
abc::demo();

o/p => This is satic function login

==============================================================================================

# Early Binding and Late Binding:

Early Binding => Binding everything before running or at compile time.

class Book {
	public $name = 'Sarthak';
	
	public function author(){
		return "The author name is: ".$this->name;
	}
}

class newBook extends Book {
	public function author(){
		return "The author name are: ".$this->name." and Ankur ";
	}
}

$book = new newBook();
echo $book->author();

o/p => The author name are: Sarthak and Ankur 
-------------------------------------------------
Late Binding => Binding everything after compiling.

class Book {
	public $name = 'Sarthak';
	
	public function author(){
		return "The author name is: ".$this->name;
	}
	
	public function getAuthor(){ //depends upon object
		echo $this->author();
	}
}

class newBook extends Book {
	public function author(){
		return "The author name are: ".$this->name." and Ankur ";
	}
}

$book = new newBook();
echo $book->getAuthor();

o/p => The author name are: Sarthak and Ankur 

-------------------------------------------------

class Book {
	public static $name = 'Sarthak';
	
	public static function author(){
		return "The author name is: ".self::$name;
	}
	
	public function getAuthor(){
		echo self::author();
	}
}

class newBook extends Book {
	public static function author(){
		return "The author name are: ".self::$name." and Ankur ";
	}
}

Book::getAuthor();
echo '<br/>';
newBook::getAuthor();

o/p => 
The author name is: Sarthak
The author name is: Sarthak

=> To solve this problem : It`s the example of late static binding.

class Book {
	public static $name = 'Sarthak';
	
	public static function author(){
		return "The author name is: ".self::$name;
	}
	
	public function getAuthor(){
		echo static::author();
	}
}

class newBook extends Book {
	public static function author(){
		return "The author name are: ".self::$name." and Ankur ";
	}
}

Book::getAuthor();
echo '<br/>';
newBook::getAuthor();

o/p =>
The author name is: Sarthak
The author name are: Sarthak and Ankur


====================================================================================

# More Explanation late static binding.

class Model{
 protected static $tableName = 'Model';
 public static function getTableName(){
 return self::$tableName;
 }
}
 
class User extends Model{
 protected static $tableName = 'User'; 
}
 
echo User::getTableName(); // Model, not User

How it works.

First, we created a Model class that has $tableName static property with value Model and a getTableName() static method that returns the value of the $tableName.  Notice that we used the self and the operator :: to access static property inside the Model class.

Second, we created another class named User that extends the Model class. The User class also has $tableName static attribute.

Third, we called the getTableName() method of the User class. However, it returns Model instead of User. The reason is that self is always resolved to the class in which the method belongs. It means that if you define a method in a parent class and call it from a subclass, the self does not reference to the subclass as we expect.
To overcome this issue, as of version 5.3, PHP introduced a new feature called PHP static late binding. Basically, instead of using the self, you use the static keyword that references to the exact class that was called at runtime.

Let’s modify our example above:
 
class Model{
 protected static $tableName = 'Model';
 public static function getTableName(){
 return static::$tableName;
 }
}
 
class User extends Model{
 protected static $tableName = 'User'; 
}
 
echo User::getTableName(); // User
Now we get the expected result.

Notice that the static:: can only refer to static properties and static methods.

=========================================================================================

# Traits
A Trait is simply a group of methods that you want include within another class. A Trait, like an abstract class, cannot be instantiated on it’s own.
An example of a Trait could be:

trait SharePost { 
  public function share($item)
  {
    return 'share this post';
  }
}

You could then include this Trait within other classes like this:

class Post {
  use SharePost;
}
 
class Comment {
  use SharePost;
}

Now if you were to create new objects out of these classes you would find that they both have the share() method available:

$post = new Post;
echo $post->share(''); // 'share this post' 
 
$comment = new Comment;
echo $comment->share(''); // 'share this post'

Benefit: help you stop repeating the same code over and over again.

# Now how to use traits in laravel?
I have Create a Traits directory in my Http directory with a Trait called BrandsTrait.php

<?
namespace App\Http\Traits;
use App\Brand;		//model
trait BrandsTrait {
    public function brandsAll() {
        // Get all the brands from the Brands Table.
        $brands = Brand::all();
        return $brands;
    }
}

and use it like:

use App\Http\Traits\BrandsTrait;

class YourController extends Controller {
	use BrandsTrait;
	public function addProduct() {
        $brands = $this->brandsAll();
    }
}
?>
=========================================================================================
# Final Keyword
The final keyword is used only for methods and classes.
Final methods: 
When a method is declared as final then overriding on that method can not be performed.

1. EXAMPLE:
class A	
{
	final function show($x,$y)
	{
		$sum=$x+$y;
		echo "Sum of given no=".$sum;
	}
} 
class B extends A
{
	function show($x,$y)
	{
	$mult=$x*$y;
	echo "Multiplication of given no=".$mult;
	}
}	 
$obj= new B();
$obj->show(100,100);

o/p =>  Fatal error: Cannot override final method A::show()

Final Classes:
A class declared as final can not be extended in future.

final Class A
{
	function show($x,$y)
	{
		$sum=$x+$y;
		echo "Sum of given no=".$sum;
	}
} 

class B extends A
{
	function show($x,$y)
	{
		$mult=$x*$y;
		echo "Multiplication of given no=".$mult;
	}
} 
	
$obj= new B();

$obj->show(100,100);

o/p => Fatal error: Class B may not inherit from final class (A)
==========================================================================================

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

j=0, 0<10  i = 0, 0<9   2>4

# Swap two numbers using a third variable

$a = 15;
$b = 27;
 
// Swap Logic

echo "\nThe number before swapping is:\n";
echo "Number a =".$a." and b=".$b;

$temp = $a;
$a = $b;
$b = $temp;
 
echo "\nThe number after swapping is: \n";
echo "Number a =".$a." and b=".$b."\n";

# Swap two variables value without using third variable

$a = 15;
$b = 276;
echo "\nBefore swapping:  ". $a . ',' . $b;
list($a, $b) = array($b, $a);
echo "\nAfter swapping:  ". $a . ',' . $b."\n";

Another simple way (which only works for numbers, not strings/arrays/etc) is

$a =  $a + $b;  // 5 + 6 = 11
$b = $a - $b;   // 11 - 6 = 5
$a = $a - $b;  // 11 - 5 = 6
print $a . ',' . $b;


# More PHP program
https://www.geeksforgeeks.org/programs-printing-pyramid-patterns-php/
--------------------------------------------------------------------------------------

# cURL(Client Url)
is a library that lets you make http request. Allows us to receive and send information via the URL syntax. 
, cURL makes it easy to communicate between different websites and domains.

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

# Codeigniter Header & Footer
https://www.youtube.com/watch?v=pg-4V54Rz8k

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

Core − This folder will contain base class of your application. 

----------------------------------------------------------------------------------------------------

# Codeigniter Active Records:
It`s a design pattern which is used for dealing with database.

---------------------------------------------------------------------------------------------------
# Difference Between Library And Helper:

A CodeIgniter helper is a set of related functions (Common functions) which you could use them within Models, Views, Controllers,.. everywhere.

Once you load (include) that file, you can get access to the functions.

But a Library is a class, which you need to make an instance of the class (by $this->load->library()). And you`ll need to use the object $this->... to call the methods.

As a thumb rule: A library is used in object oriented context (Controller, ...), while a helper is more suitable to be used within the Views (non object oriented).
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

(4.) __call()

call those function which is not exist in the class

class a{
	public function __call($function,$param){
		echo $function."<br/>";
		print_r($param)
	}
}
$obj = new a;
$obj->abc("shubham","shivam");

o/p => abc
Array([0]=>shubham,[1]=>shivam)

(5.) __get()
get.php

call when use to access those variable or property which is not exists in class.

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

===============================================================================================
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

o/p =>
This is user defined constructor of class A
This is test method of class A
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
COOKIE => Cookies Data Stored on client side or user`s browser.

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
uses HTTP Protocol for exchanging data between applications or systems. In RESTFUL web service HTTP methods like GET, POST, PUT and DELETE can be used to perform CRUD operations

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
	
	$obj = new xyz();	//o/p => XYZ from Global namespace
	
	$obj = new def\xyz(); //o/p => XYZ from DEF namespace
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
	
	$obj = new xyz();	//XYZ from DEF namespace
}

Example 3:

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
	
	use def\xyz as def;
	
	$obj = new def();	//XYZ from DEF namespace
}
=======================================================================================

# PHP 7 Sclar Datatype Hinting:
1. Sclar Datatype means boolean(bool), integer(int), string all we can type hint, but older version this feature not avilable.

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

# .htaccess
htaccess files are configuration files of Apache Server.

For instance, 
- htaccess file is used for url rewrite.
- It is used to make the site password protected.
- .htaccess file can restrict some ip addresses so that on restricted ip addresses, the site will not open.
- img hotlink prevention.
========================================================================================
# php.ini
The php.ini file is the default configuration file for running applications that require PHP. It is used to control variables such as upload sizes, file timeouts, and resource limits.

safe_mode
register_globals
upload_max_filesize
post_max_size
max_execution_time

Find:
post_max_size = 8M
upload_max_filesize = 2M
max_execution_time = 30
max_input_time = 60
memory_limit = 8M

Change to:
post_max_size = 750M
upload_max_filesize = 750M
max_execution_time = 5000
max_input_time = 5000
memory_limit = 1000M

=======================================================================================
# CSRF =>

CSRF stands for Cross Site Request Forgery. It`s basically cheating a server that a request sent to it is legitimate while it actually is a hacking attempt.
CSRF attacks specifically target state-changing requests, not theft of data, since the attacker has no way to see the response to the forged request. With a little help of social engineering (such as sending a link via email or chat), an attacker may trick the users of a web application into executing actions of the attacker`s choosing. If the victim is a normal user, a successful CSRF attack can force the user to perform state changing requests like transferring funds, changing their email address, and so forth.

In order for perform a Cross-Site Request Forgery attack, the victim must be authenticated with the target website. The attacker includes a script in a third-party website that the victim visits. When the victim visits that website, the script will be executed without the victim noticing.

<form target="frame" id="formid" action="http://www.mybank.com/transfer" method="post">
	<input type="hidden" name="toAccount" value="55555555555555555555"/>
	<input type="hidden" name="amount" value="666"/>
	<input type="hidden" name="fee" value="5.0"/>
	<input type="hidden" name="description" value="EVIL ACCOUNT"/>
	<input type="submit" value="View"/>
</form>

<script>document.getElementById("formid").submit();</script>
Even if HTTP POST is disabled, the same attack could be performed with HTTP GET request.
<img src="http://www.mybank.com/transfer?toAccount=55555555555555555555&amount=1000000&fee=5&description=EVIL">
=======================================================================================
# php://input

=> php://input: This is a read-only stream that allows us to read raw data from the request body. It returns all the raw data after the HTTP-headers of the request, regardless of the content type.

=> file_get_contents() function: This function in PHP is used to read a file into a string.

=> json_decode() function: This function takes a JSON string and converts it into a PHP variable that may be an array or an object.

To receive JSON string as post data we can use the “php://input” along with the function file_get_contents() which helps us receive JSON data as a file and reads it into a string.

// Takes raw data from the request
$json = file_get_contents('php://input');

// Converts it into a PHP object
$data = json_decode($json);

======================================================================================
# json_encode

=> Converting a PHP array to JSON:
1. Example : 
$arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
echo json_encode($arr);
This will produce the following results on executing:

{"a":1,"b":2,"c":3,"d":4,"e":5}

2. Example : 
class Employee {
    public $name = '';
    public $age  = '';
    public $role = '';
}

$obj = new Employee();
$obj->name = 'Alex';
$obj->age  = 24;
$obj->role = 'PHP Developer';

echo json_encode($obj);

This will produce the following results on executing:

{"name":"Alex","age":24,"role":"PHP Developer"}

3. Example :

if(!empty($getweeks))
{
	$response['status'] = 1;
	$response['progress_icon'] = $progress_pic;
	$response['responce'] = $result;
}
else{
	$response['status'] = 0;
	$response['responce'] = 'Not exists.';
}
echo json_encode($response);
die;

# REST API
function validformdata_parameter()
    {
        if(empty($_POST)){
            $response = array("status" => array(),"responce" => array());
            $response['status'] = 0;
            $response['responce'] = 'Invalid request';
            echo json_encode($response);
            die;
        }
        if(empty($_POST['authkey']) || $_POST['authkey'] != "machupicchuu"){
            $response['status'] = 0;
            $response['responce'] = 'Not Authorized';
            echo json_encode($response);
            die;
        }

    }
    
    function validrawdata_parameter()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $response = array("status" => array(),"responce" => array());
        if(!isset($data) || count($data) == 0) {
            $response['status'] = 0;
            $response['responce'] = 'Invalid request';
            echo json_encode($response);
            die;
        }
        else if(empty($data['authkey']) || $data['authkey'] != "machupicchuu"){
            $response['status'] = 0;
            $response['responce'] = 'Not Authorized';
            echo json_encode($response);
            die;
        }else{
            return $data;
        }
    }
========================================================================================
npm install -g ionic@3.9.2



We have Expert in AWS(Amazon Web Service) such as AWS Configuration, Environment and Implementation, AWS Development in all core service such as AWS EC2 (Server), AWS EBS, S3(Backup), RDS (Database), Cloud Front, VPC( Virtual Cloud Computing) Configuration, VPN Connection, Security Group, Subnets, Route Table, Internet Gateway, Network ACL’s, Elastic IP’s, AWS Lambda (Server Less), AWS API Gateway, AWS IoT, AWS Big Data, AWS Load balancer, AWS Auto Scaling Group, AWS Route53 (DNS/ Domain), AWS Mobile Hub, AWS Congito Services, AWS IAM role and Policy.,etc.

We are open to work, Maintenance and Monitoring any service or any part of in Amazon Web Service.


https://www.hipdf.com/txt-to-pdf
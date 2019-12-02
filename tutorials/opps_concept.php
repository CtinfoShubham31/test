<?php

# Abstract Class:
Means incomplete
function which is decleared but not implemented

Like,
Class ABC {
	public abstract function xyz();
}

if declear class as abstract then this class object would not be created directly. which is class would extend it then it has object could be created.
Second feature is enforcement.

Abstract class are those classes which can not be directly initialized. Or in other words we can say that you can not create object of abstract classes. 
Abstract class always created for inheritance purpose.
You can only inherit abstract class in your child class.

But your any class has at least one  method abstract than your class is abstarct class 

Usually abstract class are also known as base class.

1. An Abstract Class cannot be instantiated, It means you cannot use them directly.

2. An abstract method should not be private.

3. When any child class inherits an abstract class then all the abstract methods in a parent class must be defined in a child class.

abstract class abc{
	public abstract function test();  //Declare but not defined. It must be define in child class.
	
	public function demo(){
		echo 'This is demo function.';
	}
}

class xyz extends abc{
	public function test(){
		echo 'This test function coming from base class';
	}
}
$obj = new xyz();
$obj->test();



# Interface:

Interface just like abstract class. Which one is decleared must be implemented.
i) An Interface can be created through interface keyword followed by an interface name.

ii) In an interface, methods are not defined, the class which implements must define all the methods of an interface. In short, All the methods in an interface is abstract.

iii) All the methods declare in an interface should be public.  A class can implement multiple interfaces whereas a class can extend only one abstract class.

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


interface a{
	public function abc();
}

class b{
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

In abstract class we can define variables but in interface we can not define member variables.

In interface can not make constructor function.

In interface we can only public function declred. But in absrtact class we can declare public, private or protected function.

----------------------------------------------------------------------------------------------
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

-----------------------------------------------------------------------------------

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
----------------------------------------------------------------------------------------

# Magic Method

Magic function are used to call for specific event.

Use Multiple class in single file, then we use __autoload

(1.) __autoload()

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


(2.) __get()
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

(3.) __set()
Call when we want to change the value of property.

class a{
	private $arr=['name'=>'shubham','last'=>'sharma'];
	public function __set($n,$value){
		if(array_key_exists($n,$this->arr)){
			echo $this->arr[$n]=$value;
		}else{
			echo "error";
		}
	}
}
$obj = new a;
$obj->name="shivam";

o/p=> shivam

(4.) __isset()

class a{
	$private $arr=['name'=>'shubham','last'=>'sharma'];
	public function __isset($n){
		if(isset($n,$this->arr[$n])){
			return true;
			//echo $this->arr[$n];
		}else{
			return false;
		}
	}
}
$obj = new a;
var_dump(isset($obj->name));

o/p=> bool(true


(5.) __toString()

When you want to $obj treat here as string

class a{
	public function __toString(){
		return "This is abc funtion";
	}
}
$obj = new a;
echo $obj;

o/p =>This is abc funtion

(6.) __invoke()

Class $obj treat here as function

class a{
	public function __invoke($a,$b){
		return $a." ".$b;
	}
}
$obj = new a;
echo $obj("shubham","shivam");

o/p =>shubham shivam

(7.) __call()

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
-----------------------------------------------------------------------------------------

# Dependency injection
If we want to use the code of one class to another class then we need to use dependency injection.

Example 1.

Class ABC{
	private $xyz;
	public function __construct($xyz){
		
	}
}
class XYZ {

}

$xyz = new XYZ();
$abc = new ABC($xyz);

Example 2.  Here, Logger class is the dependency of UserProfile class.

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

Example 3.

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
========================================================================================================

# Method overriding:
This method generally used in the case inheritance.

Overriding means is to replace parent class method in child class. or simple technical method changing the behavior of method. In oop overriding is the process by which you can re-declare your parent class method in child class.

Normally method overriding required when your parent class have some method, but in your child class you want the same method with diffrent behavior.

1.) Example 

class ParentClass {
    public function test($param) {
        return "\n Parent - the parameter value is $param";
    }
}
class ChildClass extends ParentClass {
    public function test($param) {
        echo "\n Child - the parameter value is $param";
    }
}
$objParentClass = new ParentClass;
$objChildClass = new ChildClass;
$objParentClass->test('class ParentClass');
$objChildClass->test('class ChildClass');

o/p => Child - the parameter value is class ChildClass
------------------------------------------------------------
2.) Example 

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

--------------------------------------------

3.) Example

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

===================================================================================================

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
  }}
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
    if($name == 'area')
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
...................................................

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

-----------------------------------------------------------------------------------
# Encapsulation 
is used to safe data and information in an object from other it means encapsulation is mainly used for protection purpose.  

---------------------------------------------------------------------------------
# PHP 7
Performance boost up.

---------------------------------------------------------------------------------

# PHP.INI important configuration settings...

upload_max_filesize

max_execution_time

short_open_tag

display_errors

php_curl

=============================================================================================

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
	
	public function getAuthor(){ //depends upon object
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

--------------------------------------------------------

=> More Explanation late static binding.

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











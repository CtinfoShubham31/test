~php 7
~Use array_column() to Get Values from Multidimensional Arrays
~Deprecated features in PHP 7.0.x
~What is difference between API and web service?

~php 7
<?php

1.) Scalar Type Declarations

a) Default or Coercive Type:
function returnsum(float $x, float $y) 
{
	return $x + $y;
}
returnsum(6, "8 days");
//output float(14)
returnsum(4.1, "4.2");
//output float(8.3)

b.) Strict Type:
declare(strict_types=1);
function returnsum(float $a, float $b)
{
	return $a + $b;
}
returnsum(3.1, 2.1);
// output float(5.2)
returnsum(3, "2 days");
// Fatal error

2.) You can declare the return type.
Example –
public function productName (int $id) : String {
	return "default";
}

3.) Three-way comparison operator (spaceship operator <==>) 
This operator <==> can compare greater, less than, equal comparisons at the same time.
Example –
// Integers
echo 1 <=> 1; // 0
echo 1 <=> 2; // -1
echo 2 <=> 1; // 1

5. ) Null Coalesce Operator:
Example -
Ternary operator
$name = isset($_GET['name']) ? $_GET['name'] : 'Not Found';

o/p => Not Found

$name = isset($_GET['name']) ?? 'Not Found';

5.) Constant Arrays Using define()
Example: 

define('NAME', array('Chandar','Ram','Gugu'));
echo NAME[1]; // outputs "Chandar

6.) Anonymous classes



?>

~Deprecated features in PHP 7.0.x
<?php 
# PHP 4 style constructors 
class foo {
    function foo() {
        echo 'I am the constructor';
    }
}

output:

Deprecated: Methods with the same name as their class will not be constructors in a future version of PHP; foo has a deprecated constructor in example.php on line 3

# Static calls to non-static methods 
 
class foo {
    function bar() {
        echo 'I am not static!';
    }
}

foo::bar();

output:

Deprecated: Non-static method foo::bar() should not be called statically in - on line 8
I am not static!
?>

<?php 

Name			Stock	Sold
Volvo			22		18
BMW				15		13
Saab			5		2
Land Rover		17		15
$cars = array
  (
  array("Volvo",22,18),
  array("BMW",15,13),
  array("Saab",5,2),
  array("Land Rover",17,15)
  );
  
echo $cars[0][0].": In stock: ".$cars[0][1].", sold: ".$cars[0][2].".<br>";
echo $cars[1][0].": In stock: ".$cars[1][1].", sold: ".$cars[1][2].".<br>";
echo $cars[2][0].": In stock: ".$cars[2][1].", sold: ".$cars[2][2].".<br>";
echo $cars[3][0].": In stock: ".$cars[3][1].", sold: ".$cars[3][2].".<br>";

for ($row = 0; $row < 4; $row++) {
  echo "<p><b>Row number $row</b></p>";
  echo "<ul>";
  for ($col = 0; $col < 3; $col++) {
    echo "<li>".$cars[$row][$col]."</li>";
  }
  echo "</ul>";
}
?>

~Use array_column() to Get Values from Multidimensional Arrays
<?php 
1. Example:

$users = array (
     'Imtiaz Rayhan' => array ( 
                        "id" => 10, 
                        "Address" => 'Bangladesh', 
                        "Occupation" => 'Student' 
                        ),
     'John Doe'      => array ( 
                        "id" => 20, 
                        "Address" => 'Earth', 
                        "Occupation" => 'Freelancer'
                        ),
     'Istiak Rayhan' => array ( 
                        "id" => 30, 
                        "Address" => 'Bangladesh', 
                        "Occupation" => 'Blogger')  
  );
 
$address = array_column($users, 'Address');
 
print_r($address);

o/p => Array ( [0] => Bangladesh [1] => Earth [2] => Bangladesh )

2. Example:
$occupation = array_column($users, 'Occupation', 'id');
 
print_r($occupation);

o/p =>
Array ( [10] => Student [20] => Freelancer [30] => Blogger )
?>


~What is difference between API and web service?
<?php 

?>

~Differences between SOAP and REST
<?php 
SOAP								REST
- SOAP is a protocol.				- REST is an architectural style.
- SOAP only permits XML.			- REST permits many different data formats including plain text, HTML, XML, and JSON…
- SOAP requires more bandwidth 		- REST requires less bandwidth and less resources.
and more resources.
- SOAP supports both SMTP 			- REST requires the use of HTTP only.
and HTTP protocols.
- SOAP defines its own security.	- RESTful web services inherit security measures from the underlying transport.
?>

~Inheritance
<?php 
# Single Inheritance
Class A    =========> Base Class 
  |
Class B    =========> Derived Class

# Multilevel Inheritance
Class A    =========> Base Class 
  |
Class B    =========> Derived Class
  |
Class C    =========> Derived Class

# Multiple Inheritance
Class B1(Base Class)   Class B2(Base Class)
		|			    |
	    |		        |
		------------------
				|
			Class D(Derived Class)
		
# Hierarchical Inheritance
			Class B(Base Class)
					 |
					 |
		  ------------------------
		  |						 |
		  |						 |
Class D1(Derived Class)    Class D2(Derived Class)
	
	
# Hybrid Inheritance	
	Class B1(Base Class)
		|						|
		|			    		|
--------|--------Multlevel-------------------------------------
		|						|
	Class D1(Derived Class)		|			Class B2(Base Class)
		|			    		|				|
	    |			---------Multiple-----------|
		|			|			|
		|			|			|
	Class D2(Derived Class)		|
								|
	
Example : 
Class Car {
	public $model;
	
	public function setModel($model){
		$this->model = $model;
	}
	
	public function getModel(){
		return $this->model;
	}
}

Class Sportscar extends car{
	
}

$Sportscar_obj = new Sportscar();
$Sportscar_obj->setModel("Maruti");
echo $Sportscar_obj->getModel();

o/p => Maruti

?>


















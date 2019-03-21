<?php

# Via Composer Create-Project
Alternatively, you may also install Laravel by issuing the Composer create-project command in your terminal:

composer create-project --prefer-dist laravel/laravel blog "5.3.*"


# php artisan serve

Path => routes/web.php

Route::get('/admin', function () {
    return "Admin URL.";
});

http://localhost/larav/admin
o/p => Admin URL.

if we want to call an controller.
Route::get('/admin', 'AdminController@index');

here, Admin is controller name and index is the method.

Bydefault the namespace of the controller is "App\Http\Controllers".
namespace App\Http\Controllers;


**********(AdminController.php)***********
namespace App\Http\Controllers;

Class AdminController extends Controller{
	public function index(){
		echo "Index method from admin controller.";
	}
}

Url hit => http://localhost/larav/admin
o/p => Index method from admin controller.


# Paramerter passing in url

Route::get('/admin/{number}', 'AdminController@index');

public function index($number){
	echo "Number Passed is: $number";
}


Url hit => http://localhost/larav/admin/123
o/p => Number Passed is: 123

			OR
			
Route::get('/admin/{number}', function($number){
	echo "Number Passed is: $number";
});			

Route::get('/admin/{number}/{$second}', function($number,$second){
	echo "Number Passed is: $number";
	echo "Second Number Passed is: $second";
});	

# MAKE LAST PARAMETER OPTIONAL:
Route::get('/admin/{number}/{$second?}', function($number,$second=''){
	echo "Number Passed is: $number";
	echo "Second Number Passed is: $second";
});	

# APPLY REGX
If we want pass our parameter strictly as number
Route::get('/admin/{number}', function($number){
	echo "Number Passed is: $number";
})->where(['number'=>"[0-9]+"]);	


?>

Commands
<?php
# Get created routes lists:
php artisan route:list

# Create middleware using cli
php artisan make:middleware LoggerMiddleware

(app/Http/Middleware/LoggerMiddleware.php)
?>


Named Routes & Route Groups
<?php
Route::get('/', function(){
	echo url('admin',[234]);
});

Url hit => http://localhost/larav/
o/p => http://localhost/larav/admin/234

?>

Routes
<?php 
any = any method get, post...
Route::any('admin',function(){
	
});


Route::match(['put','patch'],'admin',function(){
	
});

# Get created routes lists:
php artisan route:list

# Route Controllers:
Route::controller('admin','AdminController');

# Create Controller using command prompt
php artisan make:controller AdminController

# Create Model using command prompt
php artisan make:model Test



?>
Passing data to view
<?php
# (1)Method compact
Path => routes/web.php

Route::get('/', function(){
	$data = [
		'Rahul','Amit','Gaurav','Abhishek'
	];
	return view('test-data' ,compact('data'));
});

(resources\views\test-data.blade.php)
<h1>Hello</h1>

print_r($data);

o/p => Array ( [0] => Rahul [1] => Amit [2] => Gaurav [3] => Abhishek ) 

# (2)Method with
Route::get('/', function(){
	$data = [
		'Rahul','Amit','Gaurav','Abhishek'
	];
	return view('test-data')->with('names',$data);
});
print_r($names);

o/p => Array ( [0] => Rahul [1] => Amit [2] => Gaurav [3] => Abhishek )

# (3)Method Chaining(Multiple with) 
Route::get('/', function(){
	$data = [
		'Rahul','Amit','Gaurav','Abhishek'
	];
	return view('test-data')->with('names',$data)
	->with('addresses',$addresses);
});

# (4)Method pass as array keys
Route::get('/', function(){
	$data = [
		'Rahul','Amit','Gaurav','Abhishek'
	];
	return view('test-data')->with([
		'name'=>$data,
		'address'=>$address,
	]);
});

# (5)Method withNames
Route::get('/', function(){
	$data = [
		'Rahul','Amit','Gaurav','Abhishek'
	];
	return view('test-data')->withNames($data);//print_r($names);
				
				OR
				
	return view('test-data')->withData($data)->withNames($data);	//print_r($data);		
	
});
?>

Removing public from URL
<?php

cut .htacces file from public folder and paste it into root directory. and rename server.php file to index.php.
And apache rewrite mode must be on.

?>

Middlewares
<?php
Firtly Middlewares need to registered in kernel.php
one kernel.php exits inside Http folder and another one is console folder.

(app/Http/kernel.php)
protected $middleware[] ,it is global middleware, it will run on every request.

# Create middleware using cli
php artisan make:middleware LoggerMiddleware


Route::get('/', function(){
	return "<h1>Hello world!</h1>";
})->middleware();

(app/Http/Middleware/LoggerMiddleware.php)

public function handle($request, Closure $next)
{
	Log::info("Log entry from LoggerMiddleware");
	return $next($request);
}

# Another option to define middleware:
Route::controller('admin-panel',[
	'uses' => 'AdminController',
	'middleware' => ['web','auth'],
]);

# Add middleware in controller:
(1) this middleware run on every method of controller.
public function __construct()
{
	$this->middleware(['web','auth']);
}

(2) this middleware call on only dashboard and index method
public function __construct()
{
	$this->middleware(['web','auth'],[
		'only' => ['dashboard','index'],
	]);
}

(3) this middleware call every method except dashboard and index method
public function __construct()
{
	$this->middleware(['web','auth'],[
		'except' => ['dashboard','index'],
	]);
}

(4) we make one middleware admin, which check user is admin or not. 
Meaning : Admin who is middleware only check on postMethod.

public function __construct()
{
	$this->middleware('admin',[
		'only' => ['postMethod']
	]);
}

?>

Dependency Injection
<?php
*******************************************
# Create Controller using command prompt
php artisan make:controller AdminController

# Create Model using command prompt
php artisan make:model Test
*******************************************

# Dependency Injection On Constructor
------------(app/Test.php)----------
namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    public function __construct(){
		echo "Constructor function from test model";
	}
}

--------(app/Http/Controller/AdminController.php)---------
namespace App\Http\Controllers;

use App\Test;
Class AdminController extends Controller{
	
	private $test;
	public function dashboard(){
		
	}
	
	public function __construct(Test $test){
		$this->test = $test;
	}
}

o/p => Constructor function from test model

# Dependency Injection Apply on controller method:
public function dashboard(Test $test,$name){
	echo "<h1>{$name}</h1>";
}

***********************************
dd($test) = var_dump($test)
get_class($test)   // Return class object
**********************************
Route::get('/{name}', AdminController@dashboard);
	
	
url => http://localhost/larav/shubham

o/p =>	Shubham
?>

Blade Intro & Master Layout
<?php
Blade basically templating engine of laravel.
It convert data into raw php.

# Example (1)

Route::get('/', 'AdminController@dashboard');

------(app/Http/Controller/AdminController.php)--------
namespace App\Http\Controllers;

Class AdminController extends Controller{
	
	public function dashboard(){
		return view('layout/master'); //OR return view('layout.master');
	}
}

------(resources/view/layout/master.blade.php)-----
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel 5.2 and 5.3</title>
</head>
<body>
	<div class="container">
		<h1>Master Layout</h1>
	</div>
</body>
</html>

url => http://localhost/larav

o/p =>	Master Layout

# Example (2): How to make default layout
Route::get('/', 'AdminController@dashboard');

------(app/Http/Controller/AdminController.php)--------
namespace App\Http\Controllers;

Class AdminController extends Controller{
	
	public function dashboard(){
		return view('test-data');
	}
}

------(resources/view/layout/master.blade.php)-----
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel 5.2 and 5.3</title>
</head>
<body>
	<div class="container">
		<h1>Master Layout</h1>
		@yield('content')
	</div>
</body>
</html>

------(resources/view/test-data.blade.php)-----
@extends('layout.master')
@section('content')
<h1>
	Test Data View.
</h1>
@endsection
?>

Pass Data From Controller To View And Why
<?php 

# Method (1.) Simple PHP Procedure

------(app/Http/Controller/AdminController.php)--------
public function dashboard(){
	return view('test-data')
	->with('data',"Some Test Data.");
}

------(resources/view/test-data.blade.php)-----
@extends('layout.master')
@section('content')
<h1>
	'<?= $data ?>'
</h1>
@endsection


# Method (2.) In case of Blade Templating Engine, Benefit is, It escape the data and make it secure
------(resources/view/test-data.blade.php)-----
@extends('layout.master')
@section('content')
<h1>
	{{$data}}
</h1>
@endsection

# If don`t want to escape then 
{!! $data !!}

# Method (3.) What we want to echo
<h1>
{{ date('d M y') }}
</h1>

# If we do not want to  parse data
<h1>
	@{{ data }}		
</h1>

# If variable not exists or no value have then
<h1>
	{{ isset($data) ? $data : 'Not Available' }}
	{{ $data or 'Not Available' }}	
</h1>

?>

Section Overriding in blade template
<?php 
------(routes/web.php)--------
Route::get('/', 'AdminController@dashboard');

------(app/Http/Controller/AdminController.php)--------
public function dashboard(){
	return view('child');
}
	
------(resources/view/test-data.blade.php)-----
@extends('layout.master')
@section('content')
<h1>
	Test Data View
</h1>
@endsection

------(resources/view/child.blade.php)-----
@extends('test-data')
@section('content')
<h1>Content Section on child view</h1>
@endsection

o/p=> 
Master Layout
Content Section on child view

# CONCLUSION : Child-data.blade.php override test-data.blade.php

# if @parent
@extends('test-data')
@section('content')
@parent
<h1>Content Section on child view</h1>
@endsection

o/p=> 
Master Layout
Test Data View
Content Section on child view

?>

@include with Blade
<?php 
@include() compulsory use in blade file

# Example 
------(app/Http/Controller/AdminController.php)--------
public function dashboard(){
	$data = [
		['name'=>'Rahul'],
		['name'=>'Amit'],
		['name'=>'Sandesh'],
	];
	return view('child', compact('data'));
}


------(resources/view/child.blade.php)-----
@extends('layout.master')
@section('content')
	@include('table')
@endsection

------(resources/view/table.blade.php)-----
<table>
@foreach($data as $d)
	<tr>
		<td>
			<h1>{{$d['name']}}</h1>
		</td>
	</tr>
@endforeach
</table>

o/p => 
Master Layout
Rahul
Amit
Sandesh

?>

@each in Blade
it  performs include as well as loop
<?php 
public function dashboard(){
		$data = [
			//['name'=>'Rahul'],
			//['name'=>'Amit'],
			//['name'=>'Sandesh'],
		];
		return view('child', compact('data'));
	}

------(resources/view/child.blade.php)-----
@extends('layout.master')
@section('content')
	@each('div',$data,'d','empty')
@endsection

------(resources/view/div.blade.php)-----
<h1>
{{$d['name']}}
</h1>

------(resources/view/empty.blade.php)-----
<h1>
Empty View Loaded
</h1>

o/p => Empty View Loaded
?>

@stack
<?php 

# Example

------(resources/view/layout/master.blade.php)-----
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel 5.2 and 5.3</title>
	@stack('css')
</head>
<body>
	<div class="container">
		<h1>Master Layout</h1>
		@yield('content')
	</div>
	@stack('js')
</body>
</html>

------(resources/view/child.blade.php)-----
@extends('layout.master')
@section('content')

@endsection
@push('css')
	<link rel="stylesheet" href="login.css">
@endpush
@push('css')
	<link rel="stylesheet" href="logout.css">
@endpush
@push('css')
	<style>
		
	</style>
@endpush

@push('js')
	<script type = "text/javascript" src="jquery.js"></script>
@endpush

o/p => VIEW SOURCE

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel 5.2 and 5.3</title>
		<link rel="stylesheet" href="login.css">
	<link rel="stylesheet" href="logout.css">
	<style>
		
	</style>
</head>
<body>
	<div class="container">
		<h1>Master Layout</h1>
		
	</div>
		<script type = "text/javascript" src="jquery.js"></script>
</body>

?>

Comments on blades
<?php
{{-- comment in line in blade syntax --}}
?>

Models (Path -> app/User.php by default model)
<?php 
If use user.php model in controller then it`s namespce will be:
use App\User; 

To intrect with database we can use query directly. Otherwise active records library is available for this.

Here, Active records library name is flouent.

And another new things is Eloquent, It is ORM(Object Relation Mapping) it is database specific.

If we want to use active records of laravel. Then we need to add:
use DB;

public function dashboard(){
	//By using active records(Eloquent)
	DB::table('users')->insert(['username'=>'','password']);
	
	//OR ORM
	$user = new User;
	$user->username = 'rahul';
	$user->password = 'password';
	$user->save();
	$user->delete();
	
	return view('child');
}

If we want to follow ORM process then we need to create new model or class for every table.



************************************************
Laravel provide us authentication and authorization.
************************************************

# To Create Model using CLI
************************************************
php artisan make:model Customer
************************************************

# Connecting to database
To configure the database .env

To use customer model in our AdminController we have to add namespace:
use App\Customer;

Suppose we want fetch all records,
public function dashboard(){
	$customers = Customer::all();
	dd($customers); //var_dump
	return view('child');
}


# Model Conventions & Overriding 
If we want to rename or override id primary key to new name like cutomer_id or whatever I want then we use overriding. 
Don`t want created_date and updated_date.

# Override cutomers table
class Customer extends Model
{
    //
	protected $table = 'customers_list'; //Override customers table
	protedted $primaryKey = 'customer_id' // Override primary key of cutomers table
	
	public $timestamps = false;

}

# Insert New Record
Example:
namespace App\Http\Controllers;

use App\Test;
use App\Customer;

Class AdminController extends Controller{
	
	public function dashboard(){
		$customer = new Customer;
		$customer->name = 'Rahul';
		$customer->address = 'AB,XYZ';
		$customer->phone = '123456789';
		$customer->save();
		
		return view('child');
	}
	
}

# Mass Assignment:
	
Example:
In case of mass assignment.
(1) protected $fillable = ['name','address','phone']
$fillable is used to allow only those value which is it contain in it`s array. No other value will save.

(2) protected $fillable = [];
=> No value will pass into db.

(3) protected $guarded = ['is_admin','id','created_at'];
=> Allow all array to save except to is_admin, id, created_at

(4) protected $guarded = [];
=> If we want to allow all fields. No restriction.


Class AdminController extends Controller{
	
	public function dashboard(){
		$input = Input::all();
		$cust = new Customer($input);
		$cust->save();
		
		$customer = new Customer([
			'name' => 'Rahul',
			'address' => 'AB,XYZ',
			'phone' => '123456789'
		]);
		$customer->save();
		
		return view('child');
	}
	
}
public function dashboard(){
	$customer = new Customer([
		'name' => 'Rahul',
		'address' => 'AB,XYZ',
		'phone' => '123456789'
	]);
	
	$customer->save();
	
	return view('child');
}	


namespace App;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	//$fillable = [];
	//protected $fillable = ['name','address','phone']
	//protected $fillable = ['name','address','phone'];
	//protected $guarded = ['is_admin','id','created_at'];
    public $timestamps = false;
}

# More About Creating New Model
Example : Save product id into customer table
public function dashboard(){
	$customer = new Customer([
		'name' => 'Rahul',
		'address' => 'AB,XYZ',
		'phone' => '123456789'
	]);
	
	$product = new Product;
	$product->save();
	
	$customer->product_id = $product->id;
	$customer->save();
	
	return view('child');
}	

Example : More appropriate way:
public function dashboard(){
	$customer = new Customer([
		'name' => 'Rahul',
		'address' => 'AB,XYZ',
		'phone' => '123456789'
	]);
	
	//If we want to assign more value of $customer object above
	$customer->product_id = 123;
	
	//First save and then return object
	$product = Product::create([
		'name' => 'abc',
		'price' => 12345
	]);
	
	//echo $product->product_id;
	$customer->product_id = $product->id;
	$customer->save();
	
	return view('child');
}	

Example: If we want multiple value on based on if else condition
	$customer = new Customer([
		'name' => 'Rahul'
	]);
	
	//------Some Condition
	//Additional value
	$customer->fill([
		'address' => 'AB,XYZ',
		'phone' => '123456789'
	]);
	
	$customer->save();

?>

Update & Delete
<?php
# Update Operation
public function dashboard(){
	//Retrive model from db
	$customer = Customer::find(1); //If we want to fetch our data using id(autoincrement id)
	
	$customer->fill([
		'address' => 'AB,XYZ',
		'phone' => '123456789'
	]);
	$customer->save();
	
	return view('child');
}	

# Delete Operation
public function dashboard(){
	$customer = Customer::find(1); 
	$customer->delete(); 
	return view('child');
}

# More short way to delete
public function dashboard(){
	Customer::destroy(1);
	return view('child');
}

# If we want to store customer history even after delete the customer.
public function dashboard(){
	$customer = Customer::find(1); 
	$trail = new  Trail([
		'username' => $customer->username,
	]);
	$trail->save();
	$customer->delete(); 
	
	return view('child');
}
?>

Importing HTML/Form Package

<?php 
----------(composer.json)----------
"require": {
        "php": ">=5.6.4",
        "laravel/framework": "5.3.*",
		"illuminate/html":"5.*" 	//<=====
    },
	
	run command : composer update
	
*****************************************	
	When we intall new packages then inside the laravel, we must need to entry in "config/app.php"
	'providers' => [ Illuminate\Html\HtmlServiceProvider::class]
	
	'aliases' => ['HTML' => Illuminate\HTML\HtmlFacade::class,
	'Form' => Illuminate\Html\FormFacade::class]
*****************************************
?>


Creating Form View
<?php 

# FatalErrorException in HtmlServiceProvider.php line 36: Call to undefined method Illuminate\Foundation\Application::bindShared()
=> vendor\illuminate\html\HtmlServiceProvider.php
and replaced bindShared by singleton method

# Form Action Different-2 Methods 
(1.) {!! Form::open(['url'=>'admin/form-submit']) !!}
(2.) {!! Form::open(['action'=>'AdminController@formSubmit']) !!}
(3.) {!! Form::open(['route'=>'f.submit']) !!}

# Simple Form Show Process
---------(routes\web.php)----------
Route::post('form-submit',[
	'uses' => 'AdminController@formSubmit',
	'as' => 'f.submit'
]);

---------(AdminController.php)----------
namespace App\Http\Controllers;

use App\Test;
use App\Customer;

Class AdminController extends Controller{
	
	public function dashboard(){
		return view('child');
	}
	
	public function formSubmit(){ //Url would be admin/form-submit
		echo "Form Submit Method";
	}
	
}

---------(child.blade.php)----------
@extends('layout.master')
@section('content')
	{!! Form::open(['route'=>'f.submit']) !!}
	
	{!! Form::text('field_one') !!}
	{!! Form::submit('submit') !!}
	{!! Form::close() !!}
@endsection

AFTER CLICK ONSUBMIT 
o/p => Form Submit Method
?>

Receiving Input from User:
<?php 
# Old method
Need to add facade in config/app.php
'aliases' => ['Input' => Illuminate\Support\Facades\Input::Class]

And In Controller Add at the top:
use Input;
	OR
use Illuminate\Support\Facades\Input; //If don`t want to add on aliases.

----------(AdminController.php)--------------
namespace App\Http\Controllers;

use App\Test;
use App\Customer;
use Input;

Class AdminController extends Controller{
	
	public function dashboard(){
		return view('child');
	}
	
	public function formSubmit(){ //Url would be admin/form-submit
		$field_one = Input::get('field_one');// get value
		echo "<h1>{$field_one}</h1>";
	}
	
}

# If field_one not exists in form, then 
$field_one = Input::get('field_two','Not Found.');

# $field_one = Input::all();
public function formSubmit(){
		$field_one = Input::all();
		dd($field_one);
		echo "<h1>{$field_one}</h1>";
	}
	
o/p=>	
array:2 [▼
  "_token" => "qTsQDrNe0pVaLWYD4NHbspK8L10fwxf6yOH1Hbjc"
  "field_one" => "shubham"
]

# $field_one = Input::only('field_one','field_two');
	OR
# $field_one = Input::only(['field_one','field_two']);
=> Only specified field will received - field_one & field_two

# $field_one = Input::except(['field_one','field_two']);
=> Except this fields

# New method 5.2
Here, We will use request class and dependency injection.
use Illuminate\Http\Request

----------(AdminController.php)--------------
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Test;
use App\Customer;
use Input;

Class AdminController extends Controller{
	
	public function dashboard(){
		return view('child');
	}
	
	public function formSubmit( Request $request){ 
		//$field_one = $request->get('field_one');
		//$field_one = $request->all();		
		echo $request->field_one;  //Short Cut
		dd($field_one);
		
	}
	
}
?>

Form Validation the old way
<?php
Using Facades, Need Validator Facades.

*************************************
All facacdes r exists in global namespce
*************************************

----------(AdminController.php)--------------
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Test;
use App\Customer;
use Input;
use Validator;

Class AdminController extends Controller{
	
	public function dashboard(){
		return view('child');
	}
	
	public function formSubmit( Request $request){ 
		$v = Validator:make($request->all(),[
			'field_one'=> ['required']
		]);
		
		//if($v->fails())
		if($v->passes()){
			echo $request->field_one;
		}
		//-----OR------
		if($v->fails()){
			return \Redirect::back();
			return back(); //5.2
		}
		echo $request->field_one;
		
	}
	
}

?>

Form Validation the new way
<?php 
----------(AdminController.php)--------------

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Test;
use App\Customer;
use Input;
use Validator;

Class AdminController extends Controller{
	
	public function dashboard(){
		return view('child');
	}
	
	public function formSubmit( Request $request){ 
		//Here don`t need to check if else condition using passes and fails method
		$this->validate($request,[
			'field_one' => 'required'
		]);
		echo $request->field_one;
		
	}
	
}
?>

Preserving User Input Data
<?php 
******************************8
Maintain value after submit wrong value in text field
*******************************

----------(routes/web.php)------------
Route::group(['middleware'=>'web'], function(){
	Route::get('/', 'AdminController@dashboard');

	Route::post('form-submit',[
		'uses' => 'AdminController@formSubmit',
		'as' => 'f.submit'
	]);
});

public function formSubmit( Request $request){ 
	//Here don`t need to check if else condition using passes and fails method
	$this->validate($request,[
		'field_one' => 'alpha'
	]);
	echo $request->field_one;
	
}

?>

Form Validation with Request Class
<?php 
*********************************
php artisan make:request TestRequest

Created Request class File path: app/Http/Requests/TestRequest.php

use App\Http\Requests\TestRequest;
*********************************
-------------(AdminController.php)---------------
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\TestRequest;
use App\Http\Controllers\Controller;
use App\Test;
use App\Customer;
use Input;
use Validator;

Class AdminController extends Controller{
	
	public function dashboard(){
		return view('child');
	}
	
	public function formSubmit( TestRequest $request){ 
		
		echo $request->field_one;
		
	}
	
}

-----(app/Http/Requests/TestRequest.php)--------
public function rules()
{
	return [
		'field_one' => 'required|alpha'
	];
}
?>

Display Validation Error Message
<?php 
@extends('layout.master')
@section('content')
	{!! Form::open(['route'=>'f.submit']) !!}
	
	{!! Form::text('field_one') !!}
	{!! Form::submit('submit') !!}
	{!! Form::close() !!} 
	
	dd($errors);
	
@endsection

on refresh we get:
ViewErrorBag {#147 ▼
  #bags: []
}

# If we want to show all error
dd($errors->all());
foreach($errors->all() as $error)

# Show error for particular field
foreach($errors->get('field_one') as $error)

	and 
Show only one message

dd($errors->first('field_one'));	
echo ($errors->first('field_one',"<li class='error'>:message</li>"));	
?>

Customized Error Message:
<?php 
---------(child.blade.php)----------
@extends('layout.master')
@section('content')
	{!! Form::open(['route'=>'f.submit']) !!}
	
	{!! Form::text('text1') !!}
	{!! Form::text('text2') !!}
	{!! Form::submit('submit') !!}
	{!! Form::close() !!} 
	
	?php
	echo ($errors->first('text1',"<li class='error'>:message</li>"));
	echo ($errors->first('text2',"<li class='error'>:message</li>"));
	?
@endsection


-----(app/Http/Requests/TestRequest.php)--------
public function rules()
{
	return [
		'text1' => 'required|alpha',
		'text2' => 'required'
	];
}

public function messages(){
	return [
		'required'=>'Field :attribute cannot be left blank'
	];
}

o/p => Field text1 cannot be left blank
Field text2 cannot be left blank


# Now the case arise, we want different message for text1 field and text2 field

-----(app/Http/Requests/TestRequest.php)--------
public function rules()
{
	return [
		'text1' => 'required|alpha',
		'text2' => 'required'
	];
}

public function messages(){
	return [
		'text1.required'=>'Field :attribute cannot be left blank',
		'text2.required'=>':attribute field must be filled.'
	];
}
?>


Sessions
<?php
public function formSubmit( TestRequest $request){ 
		
	$session = $request->session(); //session object
	$session->get('data');// Retrive session data
	$session->put('data','Some data on session.'); // Set session data
	
	$request->session()->put('data','Some data on session'); // Through Method channing
	$request->session()->get('data','Some data on session'); // Through Method channing
	
}


# In some cases what happend if $request object is not available
public function dashboard(Request $request){
	$request->session()->put();
	return view('child');
}

# Use session without dependency injection.
public function dashboard(Request $request){
	session()->put('data','Some data on session');
	return view('child');
}

public function formSubmit(){ 
	echo session()->get('data');	
}

# Suppose if some session data not set but we use it, then we can set some default value like:
session()->get('data1','Default Value');

# We also perform some calculation on defult value part:

session()->get('data1',function(){
	return 2+3;
});

# If we want to delete the session data
public function formSubmit(){ 
	session()->forget('data');	
}

# If want data for only next request, like codeigniter flash data
public function dashboard(Request $request){
	session()->flash('data','Some data on session');
	return view('child');
}

# Redirect in laravel:
public function formSubmit(){ 
	session()->flash('data','Some data on session');
	
	return redirect()->to('dashboard');
}
?>

# Database Migrations (path => database\migrations)
<?php 
# How to create table using laravel schemas
php artisan migrate

when we migrate then up() function will run.

# If reverse it
php artisan migrate:rollback

when we rollback then down() function will run.

# Suppose we written email instead of email_address at the creation of schema
For this we will change it from email to email_address and run the command:

php artisan migrate:refresh

This will first rollback and then migrate it.

*************************************
php artisan migrate:refresh

Above not run at the time of production, beacuse this command will deleted all schemas and then created again , so any user entry will become removed.
*************************************

# Create new column like phone no
php artisan make:migration add-phone-number

> When we have to create new table then we run create() method, and when need to change in existing table use table() method

-----(database\migrations\2019_03_06_142930_add-phone-number.php)---------

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPhoneNumber extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users',function(Blueprint $table){
			$table->string('phone_number')->nullable(); 
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users',function(Blueprint $table){
			$table->engine = 'InnoDB';
			$table->dropColumn('phone_number');
		});
    }
}

Now run command:
php artisan migrate

*********************************
When we run migration table must be innodb
*********************************

?>

Database Query Builder
<?php 
If we want to use another database - mysql, postgre and mssql. We can perform it also.

*********************************
Fetch records using model or query builders.

By using query builder we have facedes "DB"

Whatever facades is exits in public namespace
then,
use DB or inside method write it as \DB::table()
**********************************88

# Fetch all records from table
public function dashboard(){
	//select * from customers
	Customer::all();
	//-------OR------
	\DB::table('customers')->get(); 
	
	return view('child');
}

class Customer extends Model
{
	protected $table = 'another_table_for_customers';
    public $timestamps = false;
}
?>

Query Builder Condition
<?php 
public function dashboard(){
	//select * from customers
	Customer::all();
	
	//Method chaning
	$result = \DB::table('customers')
			->select()
			->where()
			->get(); //get method execute the query
			
	//Without using method chaining(generally use when we doing pagination or searching) condition based is very useful	
	$queryObject = \DB::table('customers');		
	$queryObject->select();
	$queryObject->where();
	
	$result = $queryObject->get();
	
	return view('child');
}
?>

Select Columns with Query Builder
<?php
# Method (1.) Select With Array Form
public function dashboard(){
	//select * from customers
	//Method chaning (Query Builder)
	$result = \DB::table('customers')
		->select(['name','email','password'])
		->where()
		->get(); 
		
	return view('child');
}

# Method (2.)
public function dashboard(){
	$result = \DB::table('customers')
		->select('name','email','password')
		->where()
		->get(); 
		
	return view('child');
}

# Method (3.) To add more select column use addSelect()
$q = \DB::table('customers as c')
			->select('c.name','c.address','c.id');
			
			if(){
				$q->join('produts as p');
				$q->addSelect('email','p.id as product_id');
			}
*************************
func_get_args() => return array
*************************
?>

Database Query Log
<?php 
Laravel stored the query in memory, how many queries has been run.

//To check the query, how much time taking by
use DB;
public function dashboard(){
	DB::enableQueryLog(); //Laravel Store the query in variable
	DB::table('customers')->get(); 
	
	//To access how much time and query
	$log = DB::getQueryLog();
	dd($log);
		
	return view('child');
}
?>

fluent query where clause
<?php 
# Method (1.)
use DB;
public function dashboard(){
	DB::enableQueryLog(); 
	DB::table('customers')
		->where('id',1)
		->get(); 
	
	//To access how much time and query
	$log = DB::getQueryLog();
	dd($log);
		
	return view('child');
}

# Method (2.)
DB::table('customers')
		->where('id','=',1)
		->get(); 
		
# Method (3.)
DB::table('customers')
		->where('id','<',1)
		->get(); 
		
# Method (4.)
DB::table('customers')
		->where('name','like','rah%')
		->get();
		
		
# Method (5.) And Condition
(a.)		
DB::table('customers')
		->where('name','rahul')
		->where('phone','123456')
		->get();		
		
(b.)		
DB::table('customers')
	->where(['name'=>'rahul','phone'=>'123456'])
	->get();

# Method (5.) Or Condition
DB::table('customers')
		->where('name','rahul')
		->orwhere(['phone'=>'123456'])
		->get();	
		
		
?>

Additional Where Clauses
<?php 
# whereIn
DB::table('customers')
	->whereIn('id',[23,54,56])
	->get();
	
# whereNotIn
DB::table('customers')
	->whereNotIn('id',[23,54,56])
	->get();
	
# whereBetween	
DB::table('customers')
	->whereBetween('id',[10,23])
	->get();
	
# whereNotBetween	
DB::table('customers')
	->whereNotBetween('id',[10,23])
	->get();

# whereNull
select * from customers where updated_at is null 
(Records which is never updated)	

DB::table('customers')
	->whereNull('updated_at')
	->get();

# whereNotNull	
select * from customers where updated_at is not null (Records which is updated)
DB::table('customers')
	->whereNotNull('id',[10,23])
	->get();

# whereColumn	
select * from customers where `first_name` = `last_name`
Example 1: 
DB::table('customers')
	->whereColumn('first_name','last_name')
	->get();
	
Example 2: 
DB::table('customers')
	->whereColumn(['created_at','<','updated_at'])
	->get();

	
?>
	
Model Relationships - Intro
<?php 
# Eloquent:Relationships
> One To One => One user has one profile
> One To Many => One user has many blog posts
> Many To Many => 
> Has Many Through => 
> Polymorphic Relations => 
> Many To Many Polymorphic Relations => 
?>

# One To One Relationships
<?php 
# Simple way
public function dashboard(){
	$username = 'rahul';
	$customer = Customer::where('username',$username)->first();
	
	$profile = CustomerProfile::where('customer_id',$customer->id)->first();
	
	dd($profile->toArray());
	
	return view('child');
}

# hasOne
---------(AdminController.php)-----------
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\TestRequest;
use App\Http\Controllers\Controller;
use App\Test;
use App\Customer;
use App\CustomerProfile;
use Input;
use Validator;

Class AdminController extends Controller{
	
	public function dashboard(){
		$username = 'rahul';
		$customer = Customer::where('username',$username)->first();
		
		
		dd($customer->profile);
		
		return view('child');
	}
}

---------(app\Customer.php)-----------
namespace App;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	protected $guarded = [];
    public $timestamps = false;
	
	public function profile(){
		return $this->hasOne('App\CustomerProfile');
	}
}

---------(app\CustomerProfile.php)-----------
namespace App;
use Illuminate\Database\Eloquent\Model;

class CustomerProfile extends Model
{
	protected $guarded = [];
    public $timestamps = false;
}
?>


############################
bitfumes webnologies laravel
############################

sayHello
<?php
Route::get('/sayhello', 'HelloController@index');

-------(HelloController.php)---------
namespace App\Http\Controllers;

Class HelloController extends Controller{
	public function index(){
		echo "Index method from hello controller.";
	}
}

Hit Url => http://localhost/larav/sayhello
o/p => Index method from hello controller
?>

Middleware => After request send and before page load, in the middle Middleware is run.
Whatever http request are coming, we just authenticate it.
<?php 
# Make middleware
php artisan make:middleware test

Route::get('hello', function(){
	return view('hello');
})->middleware('test');

--------(app/Http/Middleware/test.php)--------
namespace App\Http\Middleware;

use Closure;

class test
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
		$ip = $request->ip(); //return ip
		if($ip == '::1'){ //127.0.0.1
			return redirect('/');
		}
        return $next($request);
    }
}

--------(app/Http/Kernel.php)--------
protected $routeMiddleware = [ 'test' =>
		\App\Http\Middleware\test::class,]al
		
Now run, http://localhost/larav/hello

?>

Route
<?php 
# Example 1.)
Route::get('sayHello', 'HelloController@index');

Why we make controller if want to load just hello view we can do this by making closure function in routing file(web.php)

Route::get('sayHello', function(){
	return view('hello');
})

# Example 2.)
Route::get('test/{fname}', 'HelloController@index');

namespace App\Http\Controllers;

Class HelloController extends Controller{
	public function index($fname){
		echo "Hello ".$fname;
	}
}

Hit url => http://localhost/larav/test/shubham
o/p => Hello shubham

# Example 3.)
Route::get('demo/{price}', function($price){
	echo $price;
})->where(['price'=>"[0-9]+"]);

Hit url => http://localhost/larav/demo/40
o/p => 40

# Example 4.) Required and Optional Parameter
Route::get('demo/{price}', function($price){
	echo $price;
})->where(['price'=>"[0-9]+"]);

here, price parameter is compulsury

So, How to make parameter as optional
Route::get('pricefilter/{max}/{min?}', function($max,$min='0'){
	echo "max = ".$max." min = ".$min;
})

? = mean optional

Hit url => http://localhost/larav/pricefilter/33
o/p => max = 33 min = 0

Hit url => http://localhost/larav/pricefilter/33/8
o/p => max = 33 min = 8
?>

Controller
<?php 
php artisan make:controller TestController
?>

How to send data on view using Controller
<?php 
# Send array to view
Route::get('sayHello', 'HelloController@index');
---------(HelloController.php)----------
namespace App\Http\Controllers;

Class HelloController extends Controller{
	public function index(){
		$subjects = ['maths','physics','chemistry'];
		return view('hello')->with(['mysub'=>$subjects]);
	}
}

---------(hello.blade.php)----------
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel 5.2 and 5.3</title>
</head>
<body>
	<div class="container">
		<h1>Hello I am here.</h1>
		<p> print_r($mysub);</p>
	</div>
</body>
</html>

Hit url => http://localhost/larav/sayHello
o/p =>
Hello I am here.

Array ( [0] => maths [1] => physics [2] => chemistry )

# Suppose we have lots of array to pass:
public function index(){
	$subjects = ['maths','physics','chemistry'];
	$marks = [50,30,40];
	return view('hello')->with(['mysub'=>$subjects,'marks'=>$marks]);
}

Hit url => http://localhost/larav/sayHello
o/p =>

Hello I am here.

Array ( [0] => maths [1] => physics [2] => chemistry )
Array ( [0] => 50 [1] => 30 [2] => 40 )

# Another way to send
public function index(){
	$subjects = ['maths','physics','chemistry'];
	$marks = [50,30,40];
	return view('hello')->withmysub($subjects)->withmarks($marks);

}
?>

Blade
<?php
--------(layout/master.blade.php)--------
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel 5.2 and 5.3</title>
	@stack('css')
</head>
<body>
	<h3>Navbar in Master head</h3>
	@yield('body')
</body>
</html>

--------(hello.blade.php)--------
//It extends our master.blade.php
@extends('layout/master')

@section('body')
	<h1>Hello I am here.</h1>
	{{-- @yield('content') --}}
	<p> print_r($mysub);</p>
	<p> print_r($marks);</p>
@endsection	

?>

Diffrent ways to print data on view using blade syntax:{{}} for secuity purpose
<?php 
public function index(){
		$subjects = 'Subject Test';
		$marks = [50,30,40];
		return view('hello')->withmysub($subjects)->withmarks($marks);
	}
	
<p>{{$mysub}}</p>	

public function index(){
		$subjects = "<script>alert('Hello');</script>";
		$marks = [50,30,40];
		return view('hello')->withmysub($subjects)->withmarks($marks);
	}
	
<p>{{$mysub}}</p>	
	
Hit url => http://localhost/larav	
o/p => <script>alert('Hello');</script>

# {{$data}}
=> When laravel read it, then it convert into php code  and then displays it.

# @{{$data}} in case of angulr framework
o/p => {{$data}}

# If we want to run the script(javascript)	
=> {!! $data !!}
?>

Conditional coding using blade in laravel (if else using blade)
<?php 
# Example 1.)
public function index(){
	$subjects = 'Hello';
	return view('hello')->with('data',$subjects);
}

<p>{{ isset($data) ? $data : 'Data not Found' }}</p>

o/p => Hello

# Example 2.)
public function index(){
	$subjects = 'Hello';
	return view('hello')->with('data');
}

<p>{{ isset($data) ? $data : 'Data not Found' }}</p>

o/p => Data not Found

# Example 3.) Laravel way
<p>{{ $data or 'Data not Found' }}</p>

# If Else Condition

----------(HelloController.php)---------
namespace App\Http\Controllers;

Class HelloController extends Controller{
	public function index(){
		$subjects = 'Hello';
		return view('hello')->with('data',$subjects);
	}
}

----------(hello.blade.php)---------
@extends('layout/master')

@section('body')
	<h1>
	?php $u = "Data Not Found.";?
	@if($data == "Hello")
		{{$data}}
	@elseif($data == "Hi")
		{{$data}}
	@else
		{{$u}}
	@endif
	</h1>
	
@endsection
?>

How to create model and configure database in laravel
<?php
# Create model
php artisan make:model Student

# Insert Data into Database using Model with Depth Concept

-----------(HelloController.php)-----------
namespace App\Http\Controllers;
use App\Student;

Class HelloController extends Controller{
	public function index(){
		$student = new Student;
		$student->sname = "Addu";
		$student->standard = "12";
		
		$student->save();
		
		return view('hello');
	}
}

And refresh index method. Student value become inserted.

And If remove created_at and updated_at column from table and refresh the browser, then we will get an error like:

SQLSTATE[42S22]: Column not found: 1054 Unknown column 'updated_at' in 'field list' (SQL: insert into `students` (`sname`, `standard`, `updated_at`, `created_at`) values (Shubham, 12, 2019-03-07 12:08:17, 2019-03-07 12:08:17))

To Solve this problem: public $timestamps = false;

-----------(Student.php)-----------
namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $timestamps = false; //by default it`s ture
}

# Another Way(Insert) Use Constructor
namespace App\Http\Controllers;
use App\Student;

Class HelloController extends Controller{
	public function index(){
		$student = new Student([
			'sname'=>'Limca',
			'standard'=>'6'
		]);
		
		$student->save();
		
		return view('hello');
	}
}

ERROR:
MassAssignmentException in Model.php line 444:

Because laravel prevent it security for purpose. 

To sort out this problem add variable in model:
protected $fillable = ['sname','standard'];

-----------(Student.php)-----------
namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	protected $fillable = ['sname','standard'];
    public $timestamps = false; //by default it`s ture
}
?> 


Create model class with different name then the table name in database
<?php 
php artisan make:model Teacher

# Through Teacher Model insert into student

-----------(Teacher.php)-----------
namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = ['sname','standard'];
    public $timestamps = false; //by default it`s ture
	
	protected $table = 'students';
}

-----------(HelloController.php)-----------
namespace App\Http\Controllers;
use App\Student;
use App\Teacher;

Class HelloController extends Controller{
	public function index(){
		$student = new Teacher([
			'sname'=>'Kitta',
			'standard'=>'121'
		]);
		
		$student->save();
		
		return view('hello');
	}
}
?>

What is Request Object? Most important to understand before form submission
<?php

# For Requesting add:
use Illuminate\Http\Request;

-----------(HelloController.php)-----------
namespace App\Http\Controllers;
use App\Student;
use App\Teacher;
use Illuminate\Http\Request;

Class HelloController extends Controller{
	public function index(Request $request){
		
		dd($request->name);
		return view('hello');
	}
} 

http://localhost/larav/?name=hi
o/p => "hi"

# dd($request->all());
o/p => 
array:1 [▼
  "name" => "hi"
]

# $request->get('name')
o/p => hi

# $request->get('name','Name Not Entered')
http://localhost/larav/?name=
o/p => Name Not Entered
?>

CSRF(Cross Site Request Forgery) Token with Form
<?php
php artisan make:controller ContactController

Route::get('/', 'ContactController@index');

Route::post('/contact', 'ContactController@store')->name('contactstore');


-----------(ContactController.php)-----------
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
		
		return view('contact');
	}
	
	public function store(Request $request){
		dd($request->all());
	}
}

---------(contact.blade.php)------------
<form action="{{ route('contactstore') }}" method="post">
	{{ csrf_field() }}
	<label for="Name">Name:</label>
	<input type="text" name="name">
	<input type="submit">
</form>

After Submit Form
o/p => array:2 [▼
  "_token" => "GZrQKyLfAjYMFEecP0w36TIEAGtr8CB5ZpEMzXeU"
  "name" => "sss"
]

# If we don`t want csrf token

-----(app/Http/Middleware/VerifyCsrfToken.php)-----
protected $except = [
        '/contact'
    ];
	
---------(contact.blade.php)------------
<form action="{{ route('contactstore') }}" method="post">
	<label for="Name">Name:</label>
	<input type="text" name="name">
	<input type="submit">
</form>	

http://localhost/larav/contact
o/p =>
array:1 [▼
  "name" => "sss"
]
?>

Validation in Laravel, How to validate email address
<?php 
Route::get('/', 'ContactController@index');

Route::post('/contact', 'ContactController@store')->name('contactstore');

---------(ContactController.php)------------
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
		
		return view('contact');
	}
	
	public function store(Request $request){
		$this->validate($request,['email'=>'required|email']);
	}
}

---------(contact.blade.php)------------
@if($errors->any())
	@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
	@endforeach
@endif	
<form action="{{ route('contactstore') }}" method="post">
	
	<label for="Email">Email:</label>
	<input type="text" name="email">
	<input type="submit">
</form>
?>
 
How to make Custom Validation Message
<?php 
# 1.) Method: This message apply only in contact controller
public function store(Request $request){
	$this->validate($request,['email'=>'required|email'],
	[
		'email.required' => 'Email cannot be empty',
		'email' => 'Email is not valid'
	]);
}

# 2.) Method: This message apply Globally not only for particular controller

-------(resources/lang/en/validation.php)
'custom' => [
        //'attribute-name' => [
        //    'rule-name' => 'custom-message',
        //],
		'email' => [
            'required' => 'It is required',
			'email' => 'This is not right'
        ],
    ],
	
# Another option
'custom' => [
		'email' => [
            'required' => 'This :attribute required',
			'email' => 'This is not right :attribute'
        ],
    ],	
?>

############################
Online Web Tutor     Laravel v5.4
############################

Laravel creator Taylor Otwel.
> It provide features such as built-in support for user authentication and authorization	
> php artisan
> Eloquent ORM(Object Relation Mapping)
 - one to one relationship
> CSRF Token
> MVC
> Migration

<?php 
# Migration
public function up()
{
	//For drawing table
}

public function down()
{
	//Going to table drop
}

php artisan make:migration create_post_table
php artisan make:model post

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
			$table->increments('id');
            $table->string('title');
			$table->text('body');
			$table->timestamps();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}

Now run,
php artisan migrate

Suppose, we want to change our table name from posts to blogs

php artisan migrate:rollback
?>

User Authentication, Login and Register
<?php
php artisan make:auth
The above command will create database table, model, views, controller.


php artisan migrate:refresh

*******************************
To Get the lists of route:
php artisan route:list

*******************************
?>

######################################

Possible ways to Pass Data to Views
<?php 
1. Using array function: array()
2. Using compact function: compact()
3. Using with : with([])
4. Using withVariablename: withName()

1. Using array function: array()
public function call(){
	$users = ["Shubham","Shivam","Karnish","Gaurav"];
	$name = "Online Web Tutor";
	return view("call",array("users",$users,"name",$name));
}

Here, users = key

---------(call.blade.php)-----------
@foreach($users as $user)
	{{$user}}
@endforeach

Channel name: {{$name}}

2. Using compact function: compact()
public function call(){
	$users = ["Shubham","Shivam","Karnish","Gaurav"];
	$name = "Online Web Tutor";
	return view("call",compact("users","name"));
}

3. Using with : with([])
public function call(){
	$users = ["Shubham","Shivam","Karnish","Gaurav"];
	$name = "Online Web Tutor";
	return view("call")->with(["users"=>$users,"name"=>$name]);
}

4. Using withVariablename: withName()
public function call(){
	$users = ["Shubham","Shivam","Karnish","Gaurav"];
	$name = "Online Web Tutor";
	return view("call")->withUsers($users)->withName($name);
}
?>


Master / Fixed Layout for Views
<?php 
****************************
Inherit master.blade.php in service.blade.php
----(service.blade.php)-----
@extends("layouts.master")
****************************

@yield() are used to render our values.
@section() are used to render our HTML.

Route::get("services","HomeController@services");

------(master.blade.php)-------
<title>@yield("title")</title>

<div class="title m-b-md">
	@section("body")
	@show
</div>

------(services.blade.php)-------
@extends("layouts.master")

@section("title","Services Laravel View")

@section("body")
	Services<br/>
	<p>This is my services page view</p>
@endsection
?>

Add assets(css,image,js) to layout files
<?php 
# If we don`t run using php artisan serve command
8000 port
------(master.blade.php)-------
<link href="{{ URL ::to('/') }}/public/css/master.css" rel="stylesheet" type="text/css">

<script src="{{ URL ::to('/') }}/public/js/master.js"></script>
?>

HTML THEME Conversation to Laravel Site
<?php 
# Download onePage Template
https://www.free-css.com/free-css-templates/page223/onepage

php artisan make:controller HtmlController


Route::get('home', 'HtmlController@home');
Route::get('about', 'HtmlController@about');
Route::get('portfolio', 'HtmlController@portfolio');
Route::get('features', 'HtmlController@features');

----(HtmlController.php)-----
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HtmlController extends Controller
{
    public function home(){
		return view("html.home");
	}
	
	public function about(){
		return view("html.about");
	}
	
	public function portfolio(){
		return view("html.portfolio");
	}
	
	public function features(){
		return view("html.features");
	}
	
	public function contact(){
		return view("html.contact");
	}
}
?>


Migration in laravel
<?php 
# What is migration
Migration are like version control for your database, allowing yout team to easily modify and share the applications database schema.

php artisan help make:migration

php artisan make:migration create_players_table

o/p => 
database/migrations/2019_03_09_072152_create_players_table.php

//Method run through migrate command i.e.
// php artisan migrate
public function up()
{
	//
}

//Method run through rollback command i.e.
//php artisan migrate:rollback
public function down()
{
	//
}

database/migrations/2019_03_09_072152_create_fruits_table.php

php artisan make:migration create_fruits_table --create=fruits

    public function up()
    {
        Schema::create('fruits', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fruits');
    }
	
Now, 

public function up()
    {
        Schema::create('fruits', function (Blueprint $table) {
            $table->increments('id');
			$table->string("name");
            $table->timestamps();
        });
    }
	
php artisan migrate

php artisan make:migration create_books_table --create=books

public function up()
{
	Schema::create('books', function (Blueprint $table) {
		$table->increments('id');
		$table->string("book");
		$table->text("desc");
		$table->timestamps();
	});
}

php artisan migrate
?>

Delete table structure or modify
Rolling Back Migration
<?php 
php artisan migrate:rollback

php artisan make:migration create_teams_table --create=teams

php artisan migrate

php artisan make:migration create_authers_table --create=authers

php artisan migrate

php artisan migrate:rollback

php artisan migrate

# We want to delete all the table using one command

For example, the following command will rollback the last three migrations:

php artisan migrate:rollback --step=3

# To roll back all of your application's migrations:
php artisan migrate:reset


php artisan migrate

# php artisan migrate:refresh
The migrate:refresh command will roll back all of your migrations and then execute the  migrate command. This command effectively re-creates your entire database:

php artisan make:migration create_students_table --create=students

php artisan migrate:refresh

?>

Schema Builder | Table Schema
<?php 
# Update Table Schema
1. Difference between --create and --table
2. Adding Table Column

php artisan make:migration create_mobiles_table --create=mobiles

php artisan migrate

php artisan migrate:rollback

# If we don`t want timestamp column then comment out in file and then migrate
php artisan migrate

# If want more column in "mobiles" table
php artisan migrate:rollback

public function up()
{
	Schema::create('mobiles', function (Blueprint $table) {
		$table->increments('id');
		$table->string("name");
		$table->string("brand",100);
		$table->string("category",150);
		$table->integer("mobile_id");
		$table->text("description");
		$table->dateTime("created_at");
		//$table->timestamps();
	});
}

php artisan migrate


# Now we will not rollback our table, now we create the table
php artisan migrate:rollback

public function up()
{
	Schema::create('mobiles', function (Blueprint $table) {
		$table->increments('id');
		$table->string("name");
		$table->text("description");
		$table->dateTime("created_at");
		//$table->timestamps();
	});
}

We need to add more column, then

php artisan make:migration update_mobiles_table --table=mobiles

database/migrations/2019_03_09_072152_update_mobiles_table.php
public function up()
{
	Schema::table('mobiles', function (Blueprint $table) {
		$table->string("brand",100);
		$table->string("category",150);
		$table->integer("mobile_id");
	});
}
	
php artisan migrate

# If we want to add column after any column
$table->string('name')->after('email');

# To rename the table
Schema::rename($from,$to);

?>

php artisan tinker (Complete Command)
<?php 
1. Create a Migration file and set some fields and also set default values to them.
2. Migrate created migration file
3. got to "php artisan tinker"
4. CRUD Operation

AS well as when we perform create operation then, we will do
1. Single Row Insertion
2. Multi Row Insertion

php artisan migrate:reset

Delete all file previously generated.

php artisan make:migration create_companies_table --create=companies

-------(create_companies_table.php)-------
public function up()
{
	Schema::create('companies', function (Blueprint $table) {
		$table->increments('id');
		$table->string('name')->default("Online Web Tutor");
		$table->string('email')->default("onlineeebtutor@gmail.com");
		$table->string('location')->default("xyz Location");
		$table->timestamp('created_at')->default(DB::raw("CURRENT_TIMESTAMP"));
		//$table->timestamp();
	});
}
	
php artisan migrate

php artisan tinker

# Single line insertion using : php artisan tinker
DB::table("companies")->insert(["name"=>"Hello Comapnies","email"=>"abc@gmail.com","location"=>"Demo Test Location","created_at"=>new DateTime]);

True

DB::table("companies")->insert(["email"=>"test@gmail.com"])

# Multiple line insertion using : php artisan tinker
DB::table("companies")->insert([["name"=>"First Row Inserion","email"=>"first@gmail.com"],["name"=>"Second Row Inserion","email"=>"second@gmail.com"],["name"=>"Third Row Inserion","email"=>"third@gmail.com"]])

# SELECT
DB::table("companies")->get()

# SELECT Particular Row
DB::table("companies")->where("email","test@gmail.com")->get()

DB::table("companies")->where("email","test@gmail.com")->first()

DB::table("companies")->where(["email","test@gmail.com"])->first()

# SELECT name Column value
DB::table("companies")->pluck("name")

# SELECT name and email Column value
DB::table("companies")->select("name","email")->get()

# SELECT with order
DB::table("companies")->order("id","desc")->get()

# Aggregate function
DB::table("companies")->count()

DB::table("companies")->max("id")

DB::table("companies")->min("id")

DB::table("companies")->avg("id")

# Update
DB::table("companies")->where("id",2)->update(["email"=>"update@gmail.com"])

# Delete
DB::table("companies")->where("id",2)->delete()
?>

Database: Query Builder in Laravel | use DB
<?php
*************************
If we want to use query Builder then in controller file we need to add:
use DB
in out controller file
*************************

# Insert(Single Row) Into Table(companies)
Route::get('queryrun', 'TestController@queryrun');

-------(TestController.php)---------
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TestController extends Controller
{
    public function queryrun(){
		$data = DB::table("companies")->insert(["name"=>"Facebook","email"=>"facebook@test.com"]);
		
		echo $data;
	}
}

# Insert(Multiple Row) Into Table(companies)
public function queryrun(){
		$data = DB::table("companies")->insert([["name"=>"Youtube","email"=>"youtube@test.com"],["name"=>"Google","email"=>"google@test.com"]]);
		
		echo $data;
	}
	
# To fetch the records	
 public function queryrun(){
		$data = DB::table("companies")->get();
		print_r($data);
	}
	
# Display the fetch data into view.	
public function queryrun(){
	$data = DB::table("companies")->get();
	
	return view("query",compact("data"));
}

-------(query.blade.php)----
@foreach($data as $key=>$value)
	{{$value->name}} and {{$value->email}}<br/>
@endforeach

# Order By Descending By Id
public function queryrun(){
	$data = DB::table("companies")->orderBy("id","desc")->get();
	
	return view("query",compact("data"));
}

# Where Condition
public function queryrun(){
	$data = DB::table("companies")->where(["id"=>5])->get();
	
	return view("query",compact("data"));
}

-------(query.blade.php)----
@php 
	print_r($data);
@endphp

@foreach($data as $key=>$value)
	{{$value->name}} and {{$value->email}}<br/>
@endforeach

# Where Condition With first()
public function queryrun(){
	$data = DB::table("companies")->where(["id"=>5])->first();
	
	return view("query",compact("data"));
} 

-------(query.blade.php)----
@php 
	print_r($data);
@endphp

{{$data->name}}<br/> {{$data->email}}

#  Delete Query:
echo $data = DB::table("companies")->where(["id"=>6])->delete();

# Update Query:
echo $data = DB::table("companies")->where(["id"=>5])->update(["name"=>"updated name","email"=>"updated_email@gmail.com"]);

# Aggregate Function
echo $data = DB::table("companies")->count();

# pluck()
$data = DB::table("companies")->pluck("email");
print_r($data)

# select()
$data = DB::table("companies")->select("name","email");
print_r($data)

# Alias
$data = DB::table("companies")->select("name","email as email_id");
print_r($data)
?>

Complete Concept Of Eloquent ORM & Model
<?php 
ORM(Object Relational Mapping) Active Record implementation working with our database.
Each database table has a corresponding "Model" which is used to interact with that table.

Here, Model is singular form. Like "User" is Model and table name is "users"

Model Location inside app folder.

php artisan make:model Product
Model Path => app/Product.php


# Load this model to our controller
use App\Product;

# Now generate table using cmd
php artisan make:migration create_products_table --create=products
--(2019_03_09_155029_create_products_table.php)---
public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name')->default('Test Product');
			$table->integer('quantity')->default(0);
			$table->text('description')->default(null);
            $table->timestamps();
        });
    }
	
=> php artisan migrate

Now, if want to work with Product model, then we have to create an object, using with this we can create, update and delete operation perform(CRUD).

Route::get('orm', 'TestController@insertorm');
----------(TestController.php)---------
public function insertorm(){
	$product = new Product();
	$product->name = "Demo Product 2";
	$product->quantity = 15;
	$product->description = "This is my sample description for this text";
	
	$data = $product->save();
	print_r($product['id']); //return inserted id
	
	//return view("query",compact("data"));
}

# Another method to insert recods(mass assignment exception problem)
public function insertorm(){
	$product = new Product([
		"name" => "Demo Product 5";
		"quantity" => 20;
		"description" => "Hi test description";
	]);
	
	$product->save();
	print_r($product['id']); //return inserted id
	
	//return view("query",compact("data"));
}

Error: MassAssignmentException

To solve this use protected $fillable = ["name","email","description"];

-----(Product.php)------
namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ["name","email","description"];
}

Now, error remove. and only name, email and description field will save into table.

# Guarded property : protected $guarded = ["quantity"];
=> those field do not want to insert then write that into guarded variable. 
protected $guarded = ["quantity"]; //quantity will not insert.
protected $guarded = []; //All value will be inserted

# Another method to insert:
$product = Product::create([
	"name" => "Demo Product 15";
	"quantity" => 30;
	"description" => "Hi test description";
]);

$product->save();

# Custom table name
protected $table = "my_product";

-----(Product.php)------
namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //protected $fillable = ["name","email","description"];//to be inserted
	
	protected $guarded = []; to not be inserted
	
	protected $table = "my_product"; //Override the table
}


# Suppose we create migration file, and what happend we don`t create timestamp

******************************8
Command by which we can create model and table

php artisan make:model Author -m
*******************************

---(2019_03_09_174828_create_authors_table.php)----
public function up()
{
	Schema::create('authors', function (Blueprint $table) {
		$table->increments('id');
		$table->string("name");
		$table->string("email");
		//$table->timestamps();
	});
}

php artisan migrate

No created_at and updated_at column migrate into author table

----------(TestController.php)---------
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Product;
use App\Author;

class TestController extends Controller
{
	public function insertorm(){
		$product = Author::create([
			"name" => "Demo Product 15",
			"email" => 30
		]);
	
		$product->save();
		print_r($product);
		//return view("query",compact("data"));
	}
	
}

Run Url => http://localhost:8000/orm
o/p => QueryException Error
SQLSTATE[42S22]: Column not found: 1054 Unknown column 'updated_at' in 'field list'

Because created_at and updated_at compulsury. So we have to tell laravel we are not using timestamp

for this , 
public $timestamps = false;

in Author model.

-------(Author.php)-------
namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $guarded = []; //to not be inserted
	public $timestamps = false;
}
?> 

Select, Update, Delete Statements in Model
<?php 
# Select all records
public function selectmodel(){
	$author = new Author;
	$data = $author->all();
	
	foreach($data as $key=>$value){
		echo $value['name']." ".$value['email']."<br/>";
	}
}

# Select only one record:
public function selectmodel(){
	$author = new Author;
	$data = $author->first(); //By default order by asc
	
}

# Select only one record desc
$author = new Author;
$data = $author->orderBy("id","desc")->first();
	
# Select where 
$data = $author->where(["id"=>2])->first();

# Select multiple records using find methods
$data = $author->find([3,4,5])->first(); //here 3,4,5 is the ids

# Update

public function selectmodel(){
	$author = new Author;
	
	$data = $author->find(3);	//Update id = 3
	
	$data->name = "Rakesh Kumar";
	$data->email = "rk@gmail.com";
	$data->save();
}

# Delete
public function selectmodel(){
	$author = new Author;
	
	$data = $author->find(3);	//Delete id = 3
	
	$data->delete();
}

?>

Request Validation using ValidateRequest
<?php 
1. By Using ValidateRequest trait
validate method 

2. By Creating Form Requests
php artisan make:request <request_name>

3. Creating Validator Manually
Create a "validator" instance manually using the Validator facade

1. By Using ValidateRequest trait
validate method

Route::get('form', 'TestController@myform');
Route::post('submitmyform', 'TestController@submitmyform');

--------(TestController.php)-------
use Illuminate\Http\Request;

class TestController extends Controller
{
	public function myform(){
		return view("form.myform");
	}
	
	public function submitmyform(Request $request){
		print_r($request->all());//Get all field value
	}
}

-----(myform.blade.php)------
<form method="post" action="/submitmyform">

	{{csrf_field()}}
	<p>
		<label>Name</label>
		<input type="text" name="name"/>
	</p>
	<p>
		<label>Email</label>
		<input type="text" name="email"/>
	</p>
	<p>
		<label>Age</label>
		<input type="text" name="age"/>
	</p>
	<p>
		<input type="submit" value="Submit"/>
	</p>

</form>

After submit form we will get error TokenMismatchException in VerifyCsrfToken.php line 68

To solve this we have to attach csrf token.
{{csrf_field}}

Now, Validate fields

public function submitmyform(Request $request){
	$this->validate($request,[
		"name"=>"required",
		"email"=>"required",
		"age"=>"required",
	]);
	print_r($request->all());
}

-----(myform.blade.php)------
@if($errors->any())
	@foreach($errors->all() as $error)
	<p>{{$error}}</p>
	@endforeach
@endif
<form method="post" action="/submitmyform">
	{{csrf_field()}}
	<p>
		<label>Name</label>
		<input type="text" name="name"/>
	</p>
	<p>
		<label>Email</label>
		<input type="text" name="email"/>
	</p>
	<p>
		<label>Age</label>
		<input type="text" name="age"/>
	</p>
	<p>
		<input type="submit" value="Submit"/>
	</p>

</form>

# Custom validation message
public function submitmyform(Request $request){
	$this->validate($request,[
		"name"=>"required",
		"email"=>"required",
		"age"=>"required",
	],[
		"name.required"=>"Name should be filled",
		"email.required"=>"Email should be filled",
	]);
	print_r($request->all());
}

AND

public function submitmyform(Request $request){
		$this->validate($request,[
			"name"=>"required",
			"email"=>"required|max:20|min:10|email",
			"age"=>"required",
		],[
			"name.required"=>"Name should be filled",
			"email.required"=>"Email should be filled",
			"email.min"=>"Length should be more than 10"
		]);
		print_r($request->all());
	}

# Preserve the field value after form submit:value="{{ old('name') }}"
<input type="text" name="name" value="{{ old('name') }}"/>

# Make email id unique in Table
$this->validate($request,[
			"name"=>"required",
			"email"=>"required|max:20|min:10|email|unique:authors",
			"age"=>"required",
		]);
		
		Here, authors is table name
?>

Request Validation using Form Request
<?php 
First we have to make request(inside Http/Request folder) using php artisan command

php artisan help make:request

php artisan make:request MyForm

path => Http/Request/MyForm.php

First load our form request in our controller
use App\Http\Requests\MyForm;

Now our request come through MyForm instead of Request

public function submitmyform(MyForm $request){
	
}

on submit get an error :
 HttpException
This action is unauthorized.

# How to remove HttpException error
Got to the MyForm.php file and make authorize return to true by replacing false.
public function authorize()
    {
        return true;
    }
	
# Now customize message using this method	

C:\xampp\htdocs\lavtut\vendor\laravel\framework\src\Illuminate\Foundation\Http\FormRequest.php

copy function: and paste it, path => Http/Request/MyForm.php

public function messages()
    {
        return [];
    }
	
Now,

---------(Http/Request/MyForm.php)-------
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MyForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name"=>"required",
			"email"=>"required|max:20|min:10|email|unique:authors",
			"age"=>"required"
        ];
    }
	
	public function messages()
    {
        return [
			"name.required"=>"Name should be filled",
			"email.required"=>"Email should be filled",
			"email.email"=>"Your email id is not valid"
		];
    }
}	

----(TestController.php)-----
public function submitmyform(MyForm $request){
	
}
?>

Request Validation using Validator
<?php 
# Create custom validator
Add or load in TestController: 
use Validator; 

it extends the facades. and facade reside inside: C:\xampp\htdocs\lavtut\vendor\laravel\framework\src\Illuminate\Support\Facades\Validator.php

This class extend the facades
by using this we can make our custom validator

--------(TestController.php)-------
public function submitmyform(Request $request){
		
		$validator = Validator::make($request->all(),[
			"name"=>"required",
			"email"=>"required|max:20|min:10|email|unique:authors",
			"age"=>"required",
		]);
		
		if($validator->fails()){
			//error
			return redirect("form")->withErrors($validator);
		}else{
			//pass
			print_r($request->all());
		}
		
		
	}
	
# Now If we want to customize or overwrite the message:	

--------(TestController.php)-------
public function submitmyform(Request $request){
		
		$validator = Validator::make($request->all(),[
			"name"=>"required",
			"email"=>"required|max:20|min:10|email|unique:authors",
			"age"=>"required",
		],[
		"name.required"=>"Name should be filled",
			"email.required"=>"Email should be filled",
			"email.min"=>"Length should be more than 10"
		]);
		
		if($validator->fails()){
			//error
			return redirect("form")->withErrors($validator);
		}else{
			//pass
			print_r($request->all());
		}
		
		
	}
	
# Cuurently we are manually redirecting our error withErrors, What if we wanted to automatically redirection

=>Just add validate() -> method

--------(TestController.php)-------
public function submitmyform(Request $request){
		
		$validator = Validator::make($request->all(),[
			"name"=>"required",
			"email"=>"required|max:20|min:10|email|unique:authors",
			"age"=>"required",
		],[
		"name.required"=>"Name should be filled",
			"email.required"=>"Email should be filled",
			"email.min"=>"Length should be more than 10"
		])->validate();
		
		
		
		
	}	
?>

Resource Controller in Laravel Setup
<?php 
Suppose we are working on movie section of any project. then we have to perform at least three routing operation. Such as -
//Movie Lists
Route::get("movies","MovieController@index");
//Movie Create
Route::get("movies/create","MovieController@create");
//Movie Edit
Route::get("movies/{movie_id}/edit","MovieController@edit");

So, according to laravel, if u are doing CRUD operation by assigning different2 routes. It`s not called good practices.

this can be achieved by only single routes.

# Example: php artisan make:controller MovieController --resource
We can says that it`s a resource controller. 
which contain following methods:
index(), create(), store(Request $request), show($id), edit($id), update(Request $request, $id), destroy($id)

Now create those rouete, which have use with our resource controller.

Route::resource("movie","MovieController");

And check by, 
*****************************8
php artisan route:list
*****************************
will show all routes.
?>

Demonstration of Simple App using all concept
<?php 
Demonstration of StudentManagement Application

?>
Layout and Basic Settings of Simple App
<?php
1. Setup for Resource Controller, migration, route.
2. Layout for List Student
3. Layout for Add Student

# php artisan make:controller StudentController --resource

Route::resource("student","StudentController");

Now create Model and Migration file.

php artisan make:model Student -m


----(app/Student.php)----
namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $timestamps = false;
}

-(2019_03_11_112309_create_students_table.php)-
public function up()
{
	Schema::create('students', function (Blueprint $table) {
		$table->increments('id');
		$table->string("name");
		$table->string("email");
		$table->timestamps("created_dt");
		//$table->timestamps();
	});
}

=> php artisan migrate

-----(resources\views\student\layout\master.blade.php)----
<html>
	<head>
		<title>@yield("title")</title>
		<link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}" />
		<style>
			.owtcontainer{margin-top:50px;}
			.owtbtn{margin-top:-6px;}
		</style>
	</head>
	<body>
		<div class="container owtcontainer">
			<div class="row">
				@section("body")
				@show
			</div>
		</div>
	</body>
</html>

-----(resources\views\student\index.blade.php)----

@extends("student.layout.master")

@section("title","Student Application 
| Listing")

@section("body")
	<div class="panel panel-primary">
	  <div class="panel-heading">Student Lists
		<a href="{{ url('student/create') }}" class="btn btn-success pull-right owtbtn">Add Student</a>
	  </div>
	  <div class="panel-body">
		<table class="table">
			<thead>
			  <tr>
				<th>Sr No</th>
				<th>Name</th>
				<th>Email</th>
				<th>Action</th>
			  </tr>
			</thead>
			<tbody>
			  <tr>
				<td>1</td>
				<td>Sanjay /Kumar</td>
				<td>aanjay@somemail.com</td>
				<td>
					<a href="" class="btn btn-info">Edit</a>
					<a href="" class="btn btn-danger">Delete</a>
				</td>
				</tr>      
			  
			</tbody>
		  </table>
	  </div>
	</div>
@endsection

-----(resources\views\student\create.blade.php)----
@extends("student.layout.master")

@section("title","Student Application 
| Create Form")

@section("body")
	<div class="panel panel-primary">
	  <div class="panel-heading">
		Create Student
		<a href="{{ url('student') }}" class="btn btn-info pull-right owtbtn">< Back</a>
	  </div>
	  <div class="panel-body">
		<form class="form-horizontal" action="/student" method="post">
		{{ csrf_field() }}
		  <div class="form-group">
			<label class="control-label col-sm-2" for="email">Name:</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" id="name" name=""name placeholder="Enter name">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label class="control-label col-sm-2" for="email">Email:</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" id="email" name="email" placeholder="Enter email">
			</div>
		  </div>
		  
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" class="btn btn-success">Submit</button>
			</div>
		  </div>
		</form> 
	  </div>
	</div>
@endsection


?>

Handling Listing, Validation & Save functions
<?php 
1. List Student by Table

2. Validate student data and save to table


=> Load student model
use App\Student;


1. List Student by Table

-----(StudentController.php)----

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$students = Student::orderBy("id","desc")->get();
        return view("student.index",compact("students"));
    }
}

-----(resources\views\student\index.blade.php)----
@extends("student.layout.master")

@section("title","Student Application 
| Listing")

@section("body")
	<div class="panel panel-primary">
	  <div class="panel-heading">Student Lists
		<a href="{{ url('student/create') }}" class="btn btn-success pull-right owtbtn">Add Student</a>
	  </div>
	  <div class="panel-body">
		<table class="table">
			<thead>
			  <tr>
				<th>Sr No</th>
				<th>Name</th>
				<th>Email</th>
				<th>Action</th>
			  </tr>
			</thead>
			<tbody>
			php $i=1;
			@foreach($students as $student)
			  <tr>
				<td>{{ $i++ }}</td>
				<td>{{ $student->name }}</td>
				<td>{{ $student->email }}</td>
				<td>
					<a href="" class="btn btn-info">Edit</a>
					<a href="" class="btn btn-danger">Delete</a>
				</td>
				</tr>      
			@endforeach  
			</tbody>
		  </table>
	  </div>
	</div>
@endsection

2. Validate student data and save to table

use Validator;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$students = Student::orderBy("id","desc")->get();
        return view("student.index",compact("students"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("student.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator :: make($request->all(),[
			"name"=>"required|max:255",
			"email"=>"required|max:255|unique:students|email",
		],[
			"name.required" => "Name is needed",
			"email.required" => "Email is needed",
			"email.email" => "Email should be valid email",
		])->validate(); //For auto redirection purpose validate()
		
		$obj = new Student;
		$obj->name = $request->name;
		$obj->email = $request->email;
		$obj->created_dt = date("Y-m-d h:i:s");
		$is_saved = $obj->save();
		if($is_saved){	//If row inserted
			session()->flash("studentMessage","Student has been inserted");
			return redirect("student/create");
		}
    }
	
}

---------(master.blade.php)-------
<html>
	<head>
		<title>@yield("title")</title>
		<link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}" />
		<style>
			.owtcontainer{margin-top:50px;}
			.owtbtn{margin-top:-6px;}
		</style>
	</head>
	<body>
		<div class="container owtcontainer">
			<div class="row">
				@if($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif
				@if(session()->has("studentMessage"))
					<div class="alert alert-success">
						<p>{{ session()->get("studentMessage") }}</p>
					</div>
				@endif	
				@section("body")
				@show
			</div>
		</div>
	</body>
</html>


?>

Edit/Delete Student data | App finalization
<?php 
1. Edit Student
2. Delete Student

*****************
Operation is performed by eloquent method
*****************

---(StudentController.php)---
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$students = Student::orderBy("id","desc")->get();
        return view("student.index",compact("students"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("student.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Validator :: make($request->all(),[
			"name"=>"required|max:255",
			"email"=>"required|max:255|unique:students|email",
		],[
			"name.required" => "Name is needed",
			"email.required" => "Email is needed",
			"email.email" => "Email should be valid email",
		])->validate(); //For auto redirection purpose validate()
		
		$obj = new Student;
		$obj->name = $request->name;
		$obj->email = $request->email;
		$obj->created_dt = date("Y-m-d h:i:s");
		$is_saved = $obj->save();
		if($is_saved){	//If row inserted
			session()->flash("studentMessage","Student has been inserted");
			return redirect("student/create");
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$student = Student::find($id); 
        return view("student.edit",compact("student"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Validator :: make($request->all(),[
			"name"=>"required|max:255",
			"email"=>"required|max:255|unique:students|email",
		],[
			"name.required" => "Name is needed",
			"email.required" => "Email is needed",
			"email.email" => "Email should be valid email",
		])->validate(); //For auto redirection purpose validate()
		http://localhost/phpmyadmin/sql.php
		$student = Student::find($id);
		$student->name = $request->name;
		$student->email = $request->email;
		$is_saved = $student->save();
		if($is_saved){	//If row inserted
			session()->flash("studentMessage","Student has been updated");
			return redirect("student/".$id."/edit");
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
		$is_deleted = $student->delete();
		if($is_deleted){	//If row inserted
			session()->flash("studentMessage","Student has been deleted");
			return redirect("student");
		}
    }
}

-----(resources\views\student\layout\master.blade.php)------
<html>
	<head>
		<title>@yield("title")</title>
		<link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}" />
		<style>
			.owtcontainer{margin-top:50px;}
			.owtbtn{margin-top:-6px;}
		</style>
	</head>
	<body>
		<div class="container owtcontainer">
			<div class="row">
				@if($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif
				@if(session()->has("studentMessage"))
					<div class="alert alert-success">
						<p>{{ session()->get("studentMessage") }}</p>
					</div>
				@endif	
				@section("body")
				@show
			</div>
		</div>
	</body>
</html>

-----(resources\views\student\index.blade.php)------
@extends("student.layout.master")

@section("title","Student Application 
| Listing")

@section("body")
	<div class="panel panel-primary">
	  <div class="panel-heading">Student Lists
		<a href="{{ url('student/create') }}" class="btn btn-success pull-right owtbtn">Add Student</a>
	  </div>
	  <div class="panel-body">
		<table class="table">
			<thead>
			  <tr>
				<th>Sr No</th>
				<th>Name</th>
				<th>Email</th>
				<th>Action</th>
			  </tr>
			</thead>
			<tbody>
			php $i=1;
			@foreach($students as $student)
			  <tr>
				<td>{{ $i++ }}</td>
				<td>{{ $student->name }}</td>
				<td>{{ $student->email }}</td>
				<td>
					<a href="{{ url('student/'.$student->id.'/edit') }}" class="btn btn-info">Edit</a>
					<form class="pull-right" action="/student/{{ $student->id }}" method="post">
						{{ csrf_field() }}
						{{ method_field("DELETE") }}
						<button class="btn btn-danger" type="submit">Delete</button>
					</form>
				</td>
				</tr>      
			@endforeach  
			</tbody>
		  </table>
	  </div>
	</div>
@endsection


-----(resources\views\student\create.blade.php)------
@extends("student.layout.master")

@section("title","Student Application 
| Create Form")

@section("body")
	<div class="panel panel-primary">
	  <div class="panel-heading">
		{{ ucfirst(substr(Route::currentRouteName(),8)) }} Student
		
		<a href="{{ url('student') }}" class="btn btn-info pull-right owtbtn">< Back</a>
	  </div>
	  <div class="panel-body">
		<form class="form-horizontal" action="/student/@yield('studentId')" method="post">
		{{ csrf_field() }}
		@section("editMethod")
		@show
		  <div class="form-group">
			<label class="control-label col-sm-2" for="name">Name:</label>
			<div class="col-sm-10">
			  <input type="text" value="@yield('studentName')" class="form-control" id="name" name="name" placeholder="Enter name">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label class="control-label col-sm-2" for="email">Email:</label>
			<div class="col-sm-10">
			  <input type="text" value="@yield('studentEmail')" class="form-control" id="email" name="email" placeholder="Enter email">
			</div>
		  </div>
		  
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" class="btn btn-success">Submit</button>
			</div>
		  </div>
		</form> 
	  </div>
	</div>
@endsection


-----(resources\views\student\edit.blade.php)------
@extends("student.create")

@section("studentId",$student->id)

@section("studentName",$student->name)

@section("studentEmail",$student->email)

@section("editMethod")
	{{ method_field('PUT') }}
@endsection


?>

Laravel Accessors and Mutators
<?php 
We can change field name at run time, using Laravel Accessors and Mutators.

Accessors and mutators allow you to format Eloquent attribute values when you retrieve or set then on model instance.

Like,
$obj = new Student;
$obj->name = $request->name;
$obj->email = $request->email;
$obj->created_dt = date("Y-m-d h:i:s");
$is_saved = $obj->save();

<td>{{ $i++ }}</td>
<td>{{ $student->name }}</td>
<td>{{ $student->email }}</td>

# Accessors

class Student extends Model
{
    public $timestamps = false;
	
	public function getVariableAttribute($value){
			
	}
	
	public function getNameAttribute($value){
		return strtoupper($value);	
	}
	
	public function getEmailAttribute($value){
		return strtoupper($value);	
	}
	
	//Virtual Property
	public function getNameEmailAttribute($value){ //name_email
		return $this->name." , ".$this->email;	
	}
}

<td>{{ $i++ }} . {{ $student->name_email }}</td>
<td>{{ $student->name }}</td>
<td>{{ $student->email }}</td>

# Mutators
$obj = new Student;
$obj->name = $request->name;
$obj->email = $request->email;
$obj->created_dt = date("Y-m-d h:i:s");
$is_saved = $obj->save();

Change value run time

public function setNameAttribute($value){
	return $this->attribute['name'] = strtoupper($value);	 //$obj->name to uppercase to save in db
}
?>

File Upload in Laravel
<?php 
# File Read Methods in Laravel:

1. getClientOriginalName
2. getClientOriginalExtension
3. getRealPath
4. getSize
5. getMimeType

1. getClientOriginalName => get the name of file(Koala.jpg)
$file = $request->file("image");
		echo $file->getClientOriginalName();
		
2. getClientOriginalExtention => get file extention(jpg)	
$file = $request->file("image");
		echo $file->getClientOriginalExtension();	
		
3. getRealPath => File Real Path (C:\xampp\tmp\phpCDC1.tmp)
$file = $request->file("image");
		echo $file->getRealPath();
		
4. getSize => Get file size(780831) in byte. divided by 1024 to convert into kb.

5. getMimeType => 	image/jpeg

Now,

# hasFile method to check file is come by file name

# Upload the file into folder
if($request->hasfile("image")){
			$file = $request->file("image");
			
			$file->move("upload/",$file->getClientOriginalName()); //To upload in destination folder
		}
		//die;
		
# Save into db
$obj = new Student;
$obj->name = $request->name;
$obj->email = $request->email;
$obj->st_image = $file->getClientOriginalName();
$obj->created_dt = date("Y-m-d h:i:s");
$is_saved = $obj->save();
if($is_saved){	//If row inserted
	session()->flash("studentMessage","Student has been inserted");
	return redirect("student/create");
}		

# Now read file
----(index.blade.php)------
<td><img src="{{ url('upload/'.$student->st_image) }}" style="height:50px;width:50px;"></td>
				<td>
				
				

				
-------(StudentController.php)------				
public function store(Request $request)
    {
		$file = $request->file("image");
		if($request->hasfile("image")){
			//$file = $request->file("image");
			
			$file->move("upload/",$file->getClientOriginalName()); //To upload in destination folder
		}
		//die;
	
        $data = Validator :: make($request->all(),[
			"name"=>"required|max:255",
			"email"=>"required|max:255|unique:students|email",
		],[
			"name.required" => "Name is needed",
			"email.required" => "Email is needed",
			"email.email" => "Email should be valid email",
		])->validate(); //For auto redirection purpose validate()
		
		$obj = new Student;
		$obj->name = $request->name;
		$obj->email = $request->email;
		$obj->st_image = $file->getClientOriginalName();
		$obj->created_dt = date("Y-m-d h:i:s");
		$is_saved = $obj->save();
		if($is_saved){	//If row inserted
			session()->flash("studentMessage","Student has been inserted");
			return redirect("student/create");
		}
    }
	
-------(create.blade.php)---------	
@extends("student.layout.master")

@section("title","Student Application 
| Create Form")

@section("body")
	<div class="panel panel-primary">
	  <div class="panel-heading">
		{{ ucfirst(substr(Route::currentRouteName(),8)) }} Student
		
		<a href="{{ url('student') }}" class="btn btn-info pull-right owtbtn">< Back</a>
	  </div>
	  <div class="panel-body">
		<form class="form-horizontal" action="/student/@yield('studentId')" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		@section("editMethod")
		@show
		  <div class="form-group">
			<label class="control-label col-sm-2" for="name">Name:</label>
			<div class="col-sm-10">
			  <input type="text" value="@yield('studentName')" class="form-control" id="name" name="name" placeholder="Enter name">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label class="control-label col-sm-2" for="email">Email:</label>
			<div class="col-sm-10">
			  <input type="text" value="@yield('studentEmail')" class="form-control" id="email" name="email" placeholder="Enter email">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label class="control-label col-sm-2" for="image">Image:</label>
			<div class="col-sm-10">
			  <input type="file" class="form-control" id="image" name="image" placeholder="Enter Image">
			</div>
		  </div>
		  
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" class="btn btn-success">Submit</button>
			</div>
		  </div>
		</form> 
	  </div>
	</div>
@endsection

	
-----(index.blade.php)----
@extends("student.layout.master")

@section("title","Student Application 
| Listing")

@section("body")
	<div class="panel panel-primary">
	  <div class="panel-heading">Student Lists
		<a href="{{ url('student/create') }}" class="btn btn-success pull-right owtbtn">Add Student</a>
	  </div>
	  <div class="panel-body">
		<table class="table">
			<thead>
			  <tr>
				<th>Sr No</th>
				<th>Name</th>
				<th>Email</th>
				<th>Image</th>
				<th>Action</th>
			  </tr>
			</thead>
			<tbody>
			php $i=1;
			@foreach($students as $student)
			  <tr>
				<td>{{ $i++ }}</td>
				<td>{{ $student->name }}</td>
				<td>{{ $student->email }}</td>
				<td>
				@php 
				if(!empty($student->st_image)){
				@endphp
					<img src="{{ url('upload/'.$student->st_image) }}" style="height:50px;width:50px;">
				@php 
				}else{
				@endphp
				
					<h3>No Image Found</h3>
				@php 
				}
				@endphp
				</td>
				<td>
					<a href="{{ url('student/'.$student->id.'/edit') }}" class="btn btn-info">Edit</a>
					<form class="pull-right" action="/student/{{ $student->id }}" method="post">
						{{ csrf_field() }}
						{{ method_field("DELETE") }}
						<button class="btn btn-danger" type="submit">Delete</button>
					</form>
				</td>
				</tr>      
			@endforeach  
			</tbody>
		  </table>
	  </div>
	</div>
@endsection				
?>

 
Upload by storeAs() & Storage class Laravel
<?php
1. Another way to File Upload in Laravel
2. About Storage Class

1. Another way to File Upload in Laravel
$file->storeAs("upload/",$file->getClientOriginalName());

And submit form. It store image inside C:\xampp\htdocs\lavtut\storage\app\upload by making folder automatically create folder name upload. 

And If,
$file->storeAs("public/",$file->getClientOriginalName());
then upload inside C:\xampp\htdocs\lavtut\storage\app\public

Now, How to read the file from this path
We need storage link

php artisan storage:link
and allow and then one folder storage is created
C:\xampp\htdocs\lavtut\public\storage  with image

{{ url('storage/Desert.jpg') }}
http://localhost:8000/storage/Desert.jpg 

2. About Storage Class
Firtly need to import it : 
use Illuminate\Support\Facades\Storage

by which we can do multiple operation like, directory creation and deletion and image uploading and read the image. So mutiple operation can do with use of Storage class.

Storage:putFile("public/",$request->file("image"));
using this method file will store in Storage(C:\xampp\htdocs\lavtut\public\storage) folder

Storage method generate an unique key according to method. i.e. unique.png

Now, How to read that file
{{ url('storage/IzWVrXlJnWs0ZexGSRfmARwxtuxeXuEW6Pkte2Il.jpg') }}
http://localhost:8000/storage/Yqvb0s0qdzSwLhuBH4oAqoLbnFTWGggJLXByXY60.jpeg

Actually they have own method we reading to url
echo Storage::url("public/Yqvb0s0qdzSwLhuBH4oAqoLbnFTWGggJLXByXY60.jpeg");

/storage/storage/Yqvb0s0qdzSwLhuBH4oAqoLbnFTWGggJLXByXY60.jpeg 

# Using the storage class create directory
Storage::makeDirectory("public/owt");

owt, is the public folder which we want to create.

# Remove Folder using storage class
Storage::deleteDirectory("public/owt");

# Return timestamps of stored image
echo Storage::lastModified("public/Yqvb0s0qdzSwLhuBH4oAqoLbnFTWGggJLXByXY60.jpeg");

o/p => 1552416279 

We can convert our timestamp in our format
date('Y-m-d',$timestamp);

# Read image size
echo Storage::size("public/Yqvb0s0qdzSwLhuBH4oAqoLbnFTWGggJLXByXY60.jpeg"); 
in byte

# Copy the image
Storage::copy("public/Yqvb0s0qdzSwLhuBH4oAqoLbnFTWGggJLXByXY60.jpeg","public/owt.png"); 


public function index()
    {
		//echo Storage::url("public/Yqvb0s0qdzSwLhuBH4oAqoLbnFTWGggJLXByXY60.jpeg");
		//Storage::makeDirectory("public/owt");
		//Storage::deleteDirectory("public/owt");
		//echo Storage::lastModified("public/Yqvb0s0qdzSwLhuBH4oAqoLbnFTWGggJLXByXY60.jpeg");
		//echo Storage::size("public/Yqvb0s0qdzSwLhuBH4oAqoLbnFTWGggJLXByXY60.jpeg");
		Storage::copy("public/Yqvb0s0qdzSwLhuBH4oAqoLbnFTWGggJLXByXY60.jpeg","public/owt.png"); 
		$students = Student::orderBy("id","desc")->get();
        return view("student.index",compact("students"));
    }
?>

Upload Multiple file
<?php 
//To upload in destination folder
$file->storeAs("public/",$file->getClientOriginalName());
And
# To read the file index.blade.php in case of storage class method
<img src="{{ url('storage/'.$student->st_image) }}" style="height:50px;width:50px;">

# For multiple file upload
---(create.blade.php)----
<div class="form-group">
	<label class="control-label col-sm-2" for="image">Image:</label>
	<div class="col-sm-10">
	  <input type="file" class="form-control" id="image" name="image[]" multiple placeholder="Enter Image">
	</div>
  </div>

 public function store(Request $request)
    {
		$files = $request->file("image");
		foreach($files as $file){
			//echo $file->getClientOriginalName()."<br/>";
			$file->storeAs("public/",$file->getClientOriginalName());
		}
		
	}

?>

Database Seeding | Using Faker | db:seed
<?php 
1. Database Seeding
Simplay Say: Dummy values for test cases
Used for create dummy values in database

Laravel includes a simple method of seeding your database with test data using seed classes. All seed clssses are stored in the database/seeds directory.

DatabaseSeeder is the default class inside seeds folder.

php artisan migrate

# Error when migrate table
SQLSTATE[42000]: Syntax error or access violation: 1071 Specified key was t
oo long; max key length is 767 bytes (SQL: alter table `users` add unique `
users_email_unique`(`email`))

Solved:

According to the official documentation, you can solve this quite easily.
Add following code to AppServiceProvider.php (/app/Providers/AppServiceProvider.php)

use Illuminate\Support\Facades\Schema; //NEW: Import Schema
function boot()
{
    Schema::defaultStringLength(191); //NEW: Increase StringLength
}


-----(database\seeds\DatabaseSeeder.php)------
use Illuminate\Database\Seeder;
use Faker\Factory as Faker

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
		DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}

To run it using command-
=> php artisan db:seed

But suppose we want to add thousands of dummy records, then we can run foreach loop, factory or database seeder method

# Using foreach loop:
use Faker\Factory as Faker

-----(database\seeds\DatabaseSeeder.php)------
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$faker = Faker::create();
        // $this->call(UsersTableSeeder::class);
		foreach(range(1,10) as $index){
			DB::table('users')->insert([
				'name' => $faker->name,
				'email' => $faker->email,
				'password' => bcrypt('secret'),
			]);
		}
		
    }
}

And run
=> php artisan db:seed

# Now using factory method
=> database\factories\ModelFactory.php
and using our user model we can add value in users table

----(database\factories\ModelFactory.php)----
public function run()
{
	factory(App\User::class,50)->create(); // 50 records will insert
}

And run
=> php artisan db:seed

# 
=> php artisan make:model Employees -m // Model as well as migration file

----(database\migrations\2019_03_13_084716_create_employees_table.php)----

public function up()
{
	Schema::create('employees', function (Blueprint $table) {
		$table->increments('id');
		$table->string('employee_id');
		$table->string('name');
		$table->string('email');
		$table->timestamps();
	});
}

=> php artisan migrate

----(database\factories\ModelFactory.php)----
$factory->define(App\Employee::class, function (Faker\Generator $faker) {
    static $password;

    return [
		'employee_id'=>str_random(10),
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail
    ];
});

-----(database\seeds\DatabaseSeeder.php)------

public function run()
{
	//factory(App\User::class,50)->create();
	factory(App\Employees::class,20)->create();
}

And run
=> php artisan db:seed

# If we seeds more than one model

?>


https://www.youtube.com/watch?v=FTXUpSfFpCE&list=PLT9miexWCpPXuMenRSnpek96ncK3dXf90&index=30



























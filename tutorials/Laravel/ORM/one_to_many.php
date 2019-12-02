<?php 
https://appdividend.com/2018/01/04/laravel-one-to-many-relationship-tutorial/

# Laravel One To Many Relationship With Example
1. Employee Model
2. Transaction Model 

An employee has multiple transaction.

we will create One model, schema and controller file inside our project.

=> php artisan make:controller EmployeeController

=> php artisan make:model Employee -m
Here, we will see that total three files are created inside the project.

C:\xampp\htdocs\lavtut\database\migrations\2019_03_13_084716_create_employees_table.php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id');
            $table->string('employee_name');
            $table->integer('amount');
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
        Schema::dropIfExists('employees');
    }
}


Now, run this migration by the following command.

=> php artisan migrate

Make a view file to enter the details of an employee. So go the resources  >>  views and inside that folder, create one view file called createEmployee.blade.php.

C:\xampp\htdocs\lavtut\resources\views\createEmployee.blade

<!doctype html>
<html>
   <head>
      <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css" />
   </head>
   <body>
      <div class="container">
         <br/>
           <div class="panel panel-primary">
            <div class="panel-heading">
                 Add Employee Details
            </div>
            <div class="panel-body">
               <form method="post" action="{{ route('emplyee.store') }}">
                  {{csrf_field()}}
                  <div class="form-group">
                     <label class="col-md-4">Employee Name</label>
                       <input type="text" class="form-control" name="employee_name"/>
                  </div>
                  <div class="form-group">
                     <label class="col-md-4">Employee Salary</label>
                     <input type="text" class="form-control" name="employee_salary"/>
                  </div>
                  <div class="form-group">
                     <button type="submit" class="btn btn-primary">Add</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </body>
</html>


Now, add the routes in the web.php file.

Route::get('employee', 'EmployeeController@create')->name('employee.create');
Route::post('employee', 'EmployeeController@store')->name('employee.store');


C:\xampp\htdocs\lavtut\app\Http\Controllers\EmployeeController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class EmployeeController extends Controller
{
    public function create()
    {
    	return view('createEmployee');
    }
    
    public function store(Request $request)
    {
    	$employee = new Employee;
    	$employee->employee_name = $request->get('employee_name');
    	$employee->amount = $request->get('employee_salary');

    	$employee->save();

    	return 'Success';
    }
}

________________________________________________________________________________________
_________________________________________________________________________________________

# Fetch a record of all the post of user 1.
> Consideration:
user_id is the foreign key in the posts table

> Raw SQL:
Select * from posts join users on posts.user_id = users.id where users.id = 1

> Eloquent Approach:
User::find(1)->posts();

_________________________________________________________________________________________
_________________________________________________________________________________________
Example :


------(authors)-------
id | name 

-----(books)-------
id | author_id | title | release_date


Every book belongs to one author, and one author can have many books written.

# belongsTo function

class Book extends Model
{
    function author() {
        return $this->belongsTo('App\Author');
    }
}

$book = Book::find(1);
echo $book->author->name;

# hasMany function

class Author extends Model
{
    function books() {
        return $this->hasMany('App\Book');
    }
}

$books = Author::find(1)->books;
foreach ($books as $book) {
    //
}

Also we can use relationships to create the data, not only query it.

$author = Author::find(1);

// Saving one book
$author->books()->create([
    'title' => 'Harry Potter',
]);

$author->books()->createMany([
    [
        'title' => 'Harry Potter'
    ],
    [
        'title' => 'Harry Potter Returns'
    ]
]);




































































































































































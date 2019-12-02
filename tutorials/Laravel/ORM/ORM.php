<?php

# ORM:
An ORM stands for object-relational mapper. Laravel allows us to work with database objects and relationships using an eloquent. Each table has a particular Model which are used to interact with that table in laravel application.

https://quickadminpanel.com/blog/eloquent-relationships-the-ultimate-guide/

https://blog.hashvel.com/posts/laravel-eloquent-relationships/

https://programmingpot.com/laravel/laravel-eloquent-one-to-one-relationships/

https://itsolutionstuff.com/post/laravel-one-to-many-eloquent-relationship-tutorialexample.html

https://kode-blog.io/laravel-5-eloquent-relationships

==================================================================
# One To One Relationship
----------------Model(Person.php)--------------------
class Person extends Model
{
    public function ticket(){	//Person => Ticket   Realtionship
        return $this->hasOne("App\Ticket"); //App\Ticket => Ticket::class
    }
}

----------------Model(Ticket.php)--------------------
class Ticket extends Model
{
    public function person(){	//Ticket => Person   Realtionship (Inverse Realtionship)
        return $this->belongsTo(Person::class);
    }
}

$movie_detail = Person::find($user['id'])->ticket->toArray();
$people_detail = Ticket::find($ticket['person_id'])->person->toArray();

# One To Many
----------------Model(Student.php)--------------------
class Student extends Model
{
    public function email(){
        return $this->hasMany("Email::class"); //App\Email Or Email::class
    }
} 
 
----------------Model(Email.php)--------------------
class Email extends Model
{
    public function student(){
        return $this->belongsTo("Student::class"); //App\Student Or Student::class
    }
}

$email_ids = Student::find($student['id'])->email->toArray();

$comment = App\Comment::find(1);
echo $comment->post->title;

# Many To Many
----------------Model(Author.php)--------------------
class Author extends Model
{
    public function books(){
        return $this->belongsToMany("Book::class"); 
    }
} 

$author_books = Author::find(1)->books->toArray();	// Create by author id = 1

----------------Model(Book.php)--------------------
class Book extends Model
{
    public function authors(){
        return $this->belongsToMany("Author::class"); //App\Student Or Student::class
    }
}  

$author_books = Book::find(1)->authors->toArray();	// Create by author id = 1
===================================================================




# One To One Relationship
Example 1: Person => Movie Ticket.
A person has movie ticket.
Inverse Relationship => 
Ticket is belong to a person.

Example 2: Passenger => Flight Ticket 
Example 3: User => Passport

For more example User model might be associated with one Phone. To define this relationship, we place a phone method on the user model. The phone method should call the hasOne method and return it`s result.


----------------(create_people_table.php)--------------------
Schema::create('people', function (Blueprint $table) {
	$table->increments('id');
	$table->string('name');
	$table->timestamps();
});

----------------(create_tickets_table.php)--------------------
Schema::create('tickets', function (Blueprint $table) {
	$table->increments('id');
	$table->string('movie_ticket_id');
	$table->integer('person_id')->unsigned();
	$table->timestamps();
});
		
----------------Model(Person.php)--------------------
class Person extends Model
{
    //Person => Ticket   Realtionship
    public function ticket(){
        return $this->hasOne("App\Ticket"); //App\Ticket => Ticket::class
    }
}

----------------Model(Ticket.php)--------------------
class Ticket extends Model
{
     //Ticket => Person   Realtionship (Inverse Realtionship)
    public function person(){
        return $this->belongsTo(Person::class);
    }
}

------------------(web.php)------------------
Route::get("/movie","TestController@getdetails");


---------------(TestController.php)------------------
public function getdetails(){
	$user_details = Person::all()->toArray();    //print_r($user_details);
	foreach ($user_details as $key => $user) {
		$movie_detail = Person::find($user['id'])->ticket->toArray();
		print_r($movie_detail);
	}
}


o/p => 
Array
(
    [id] => 1
    [movie_ticket_id] => MOVHULK1001
    [person_id] => 1
    [created_at] => 2019-05-13 09:02:30
    [updated_at] => 2019-05-13 09:02:30
)
Array
(
    [id] => 2
    [movie_ticket_id] => MOVSPDER1001
    [person_id] => 2
    [created_at] => 2019-05-13 09:03:17
    [updated_at] => 2019-05-13 09:03:17
)

------------------(web.php)------------------
Route::get("/people","TestController@getpeople");

---------------(TestController.php)------------------
public function getpeople(){
	$ticket_details = Ticket::all()->toArray();    //print_r($ticket_details);die;
	foreach ($ticket_details as $key => $ticket) {
		$people_detail = Ticket::find($ticket['person_id'])->person->toArray();
		print_r($people_detail);
	}
}

o/p => 
Array
(
    [id] => 1
    [name] => Sanjay
    [created_at] => 2019-05-13 08:55:36
    [updated_at] => 2019-05-13 08:55:36
)
Array
(
    [id] => 2
    [name] => Aman
    [created_at] => 2019-05-13 08:56:13
    [updated_at] => 2019-05-13 08:56:13
)


***********************************************
$ticket = Person::find(1)->ticket;
$person = Ticket::find(1)->person;
***********************************************


 # One To Many
 1. Example : A student has multiple email Ids
	Student(ONE) => Email Ids(MANY)  : hasMany(Email Class)
	
	Inverse Relationship:	
	Email Ids(MANY) => Student(ONE)	 : belongsTo(Student Class)	
 
 2. A Teacher teaches multiple students
 3. A Person has multiple phone numbers
 4. A Post has multiple comments		//$comments = App\Post::find(1)->comments;
 
 => php artisan make:model Student -m
 It will create migration files as well as Model file.
 
 => php artisan make:model Email -m
 
 ----------------(create_emails_table.php)--------------------
Schema::create('emails', function (Blueprint $table) {
	$table->increments('id');
	$table->string('email_id');
	$table->integer('student_id')->unsigned();
	$table->timestamps();
});
 
 ----------------(create_students_table.php)--------------------
Schema::create('students', function (Blueprint $table) {
	$table->increments('id');
	$table->string('name');
	$table->timestamps();
}); 
 
php artisan migrate 
 
----------------Model(Student.php)--------------------
class Student extends Model
{
    public function email(){
        return $this->hasMany("Email::class"); //App\Email Or Email::class
    }
} 
 
----------------Model(Email.php)--------------------
class Email extends Model
{
    public function student(){
        return $this->belongsTo("Student::class"); //App\Student Or Student::class
    }
}  

---------------(TestController.php)------------------
use App\Student;
use App\email;

public function getdetails(){
	$student_details = Student::all()->toArray();    //print_r($student_details);
	foreach ($student_details as $key => $student) {
		$email_ids = Student::find($student['id'])->email->toArray();
		print_r($email_ids);
	}
}
 
 
# Many To Many 
1. Example : 
A Book has been written by many author where as also 
A author can write many books	

Book => A1, A2, A3
Author => B1, B2, B3

authors => Contains all author data
books => Contains all book data 
author_book => Contain relationship between author and book

*NOTE: author_book table name like in alphabatical order according to laravel Table Naming Convention.

=> php artisan make:model Author -m
=> php artisan make:model Book -m
=> php artisan make:migration create_author_book --create=author_books

 ----------------(create_authors_table.php)--------------------
Schema::create('authors', function (Blueprint $table) {
	$table->increments('id');
	$table->string('name');
	$table->timestamps();
});
 
 ----------------(create_books_table.php)--------------------
Schema::create('books', function (Blueprint $table) {
	$table->increments('id');
	$table->string('name');
	$table->timestamps();
}); 

 ----------------(create_author_book.php)--------------------
Schema::create('books', function (Blueprint $table) {
	$table->increments('id');
	$table->integer('author_id');
	$table->integer('book_id');
	$table->timestamps();
});

=> php artisan migrate

----------------Model(Author.php)--------------------
class Author extends Model
{
    public function books(){
        return $this->belongsToMany("Book::class"); //App\Email Or Email::class
    }
} 

---------------(TestController.php)------------------
use App\Author;
use App\Book;

public function getdetails(){
	$authors = Author::all()->toArray();    //print_r($authors);
	$author_books = Author::find(1)->books->toArray();	// Create by author id = 1
	
}
 
----------------Model(Book.php)--------------------
class Book extends Model
{
    public function authors(){
        return $this->belongsToMany("Author::class"); //App\Student Or Student::class
    }
}  

---------------(TestController.php)------------------
use App\Author;
use App\Book;

public function getdetails(){
	$authors = Author::all()->toArray();    //print_r($authors);
	$author_books = Book::find(1)->authors->toArray();	// Create by author id = 1
	
}


# Has Many Through

1. Example
countries (id, name)
users (id, country_id, name)
posts (id, user_id, title)

----------------Model(Country.php) START--------------------
namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * Get all of the posts for the country.
     */
    public function posts()
    {
        return $this->hasManyThrough('App\Post', 'App\User');
    }
}

----------------Model(Country.php) END--------------------

2. Example 
countries (id, country_name)
state (id, state_name, country_id)
city (id, city_name, state_id)

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public $timestamps = false;

    public function states()
    {
        return $this->hasMany(State::class);
    }

    public function cities()
    {
        return $this->hasManyThrough(City::class, State::class);
    }
}


Country (id, country_name)
Learner (id, name, country_id)
Courses (id, course_name, student_id)

=> php artisan make:model Country -m
=> php artisan make:model Learner -m
=> php artisan make:model Course -m

 ----------------(create_learners_table.php)--------------------
Schema::create('learners', function (Blueprint $table) {
	$table->increments('id');
	$table->string('name');
	$table->integer('country_id');
	$table->timestamps();
});
 
 ----------------(create_countries_table.php)--------------------
Schema::create('countries', function (Blueprint $table) {
	$table->increments('id');
	$table->string('country_name');
	$table->timestamps();
}); 

 ----------------(create_courses_table.php)--------------------
Schema::create('books', function (Blueprint $table) {
	$table->increments('id');
	$table->string('course_name');
	$table->integer('student_id');
	$table->timestamps();
});
 
=> php artisan migrate

 
----------------Model(Country.php) START--------------------
namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * Get all of the posts for the country.
     */
    public function posts()
    {
		//return $this->hasManyThrough($related, $through);
        //return $this->hasManyThrough('App\Course', 'App\Learner');
		return $this->hasManyThrough('Course::class', 'Learner::class');
    }
}

----------------Model(Country.php) END-------------------- 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 

# Facade:
<?php 
In Laravel, all services have a facade class. These facade classes extend the base Facade class.

Laravel Facades provides a static like interface to classes that are available in the application`s service container. 
All of Laravel`s facades are defined in the Illuminate\Support\Facades namespace.

Example:
DB::table('table_name')->get();  
In this example, the DB is the facade. it is calling the table() static method on the DB facade. 
?>

# Middleware
<?php
Middleware are the easiest way of verifying HTTP requests before they are passed to the controller. All middleware in Laravel are created in the Middleware folder, located inside the `app/HTTP` folder.

# STEP 1: Make one basic Laravel Middleware.

Create one middleware by typing following Laravel Command.
=> php artisan make:middleware Admin

Navigate to the following directory.  app  >>  Http  >>  Middleware  >>  Admin.php

You can see there is some boilerplate provided by Laravel.  There is mainly one function you have to deal with, and that is handle()

// Middleware Admin.php

  /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }

We need to write logic in this function so that we can filter the request and if it satisfies then go to destination page otherwise back to login or whatever redirect page, you will provide.

I am writing one logic in this function.

  /**  Admin.php
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      if(auth()->user()->isAdmin == 1){
        return $next($request);
      }
        return redirect('home')->with('error','You have not admin access');
    }

Now, I need to register this route in app  >>  Http  >>  Kernel.php

You can register this route in two separate ways.

1. You can register as a global middleware.
2. You can register as a particular route called route middleware.

We are registering as a route middleware so, go to the protected $routeMiddleware property.


// Kernel.php

protected $routeMiddleware = [
	'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
	'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
	'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
	'can' => \Illuminate\Auth\Middleware\Authorize::class,
	'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
	'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
	'admin' => \App\Http\Middleware\Admin::class,
];


Here as you can see, I have added our custom middleware called admin.

Now, if we want to assign any route to this middleware admin then this routes now protected and only accessible when an authorized user is admin otherwise it will redirect to the homepage.

# STEP 2: Admin protected route middleware.

Create one route, which needs to be admin protected, and if the user is not an admin, then it will redirect to the home page otherwise he can access this page.

// web.php

Route::get('admin/routes', 'HomeController@admin')->middleware('admin');

Now, we just need to put this link on the home page after the user has signed in.

<!-- home.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
  @if(\Session::has('error'))
    <div class="alert alert-danger">
      {{\Session::get('error')}}
    </div>
  @endif
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <a href="{{url('admin/routes')}}">Admin</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


Now, all we need is to code the admin function resides in HomeController.



// HomeController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function admin()
    {
        return view('admin');
    }

}

# Step 3: Make one blade file.

Create one view called admin.blade.php in the root of the views folder.

<!-- admin.blade.php -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ADMIN PAGE</title>
  </head>
  <body>
    WELCOME TO ADMIN ROUTE
  </body>
</html>
Now, go to login page  and logged in with the isAdmin field 1

?>


































































































<?php 

(vGood)
https://medium.com/justlaravel/how-to-use-middleware-for-content-restriction-based-on-user-role-in-laravel-2d0d8f8e94c6
https://justlaravel.com/middleware-laravel-content-restriction-user-role/?source=post_page---------------------------


# Middleware:
Middleware acts as a bridge between a request and a response. It is a type of filtering mechanism.
Middleware that verifies whether the user of the application is authenticated or not. If the user is authenticated,it redirects to the home page otherwise, if not, it redirects to the login page.

Middleware can be created by executing the following command −

=> php artisan make:middleware <middleware-name>

Replace the <middleware-name> with the name of your middleware. The middleware that you create can be seen at app/Http/Middleware directory.

Example:

STEP 1:
=> php artisan make:middleware AgeMiddleware

STEP 2:
AgeMiddleware will be created at app/Http/Middleware. The newly created file will have the following code already created for you.

....................................
namespace App\Http\Middleware;
use Closure;

class AgeMiddleware {
   public function handle($request, Closure $next) {
      return $next($request);
   }
}
....................................

STEP 3: Registering Middleware
We need to register each and every middleware before using it. There are two types of Middleware in Laravel.

> Global Middleware
> Route Middleware

The Global Middleware will run on every HTTP request of the application, whereas the Route Middleware will be assigned to a specific route.
The middleware can be registered at app/Http/Kernel.php. This file contains two properties $middleware and $routeMiddleware. $middleware property is used to register Global Middleware and $routeMiddleware property is used to register route specific middleware.

To register the global middleware, list the class at the end of $middleware property.
protected $middleware = [
   \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
   \App\Http\Middleware\EncryptCookies::class,
   \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
   \Illuminate\Session\Middleware\StartSession::class,
   \Illuminate\View\Middleware\ShareErrorsFromSession::class,
   \App\Http\Middleware\VerifyCsrfToken::class,
];

To register the route specific middleware, add the key and value to $routeMiddleware property.
protected $routeMiddleware = [
   'auth' => \App\Http\Middleware\Authenticate::class,
   'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
   'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
];

We have created AgeMiddleware in the previous example. We can now register it in route specific middleware property. The code for that registration is shown below.

The following is the code for app/Http/Kernel.php −
.......................................................
namespace App\Http;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel {
   protected $middleware = [
      \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
      \App\Http\Middleware\EncryptCookies::class,
      \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
      \Illuminate\Session\Middleware\StartSession::class,
      \Illuminate\View\Middleware\ShareErrorsFromSession::class,
      \App\Http\Middleware\VerifyCsrfToken::class,
   ];
  
   protected $routeMiddleware = [
      'auth' => \App\Http\Middleware\Authenticate::class,
      'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
      'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
      'Age' => \App\Http\Middleware\AgeMiddleware::class,
   ];
}
............................................................


# Middleware Parameters

We can also pass parameters with the Middleware. For example, if your application has different roles like user, admin, super admin etc. and you want to authenticate the action based on role, this can be achieved by passing parameters with middleware. The middleware that we create contains the following function and we can pass our custom argument after the $next argument.

public function handle($request, Closure $next) {
   return $next($request);
}

Example:
STEP 1: Create RoleMiddleware by executing the following command −
=> php artisan make:middleware RoleMiddleware

STEP 2: Add the following code in the handle method of the newly created RoleMiddlewareat app/Http/Middleware/RoleMiddleware.php.
...................................
namespace App\Http\Middleware;
use Closure;

class RoleMiddleware {
   public function handle($request, Closure $next, $role) {
      echo "Role: ".$role;
      return $next($request);
   }
}
....................................

STEP 3 − Register the RoleMiddleware in app\Http\Kernel.php file. 

protected $routeMiddleware = [
  'auth' => \App\Http\Middleware\Authenticate::class,
  'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
  'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
  'Age' => \App\Http\Middleware\AgeMiddleware::class,
  'Role' => \App\Http\Middleware\RoleMiddleware::class,
];

STEP 4: Execute the following command to create TestController −
=> php artisan make:controller TestController --plain

STEP 5:  app/Http/TestController.php
....................................
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TestController extends Controller {
   public function index() {
      echo "<br>Test Controller.";
   }
}

........................................

STEP 6: Add the following line of code in app/Http/routes.php file.
Route::get('role',[
   'middleware' => 'Role:editor',
   'uses' => 'TestController@index',
]);

STEP 7: Visit the following URL to test the Middleware with parameters

http://localhost:8000/role

STEP 10: The output will appear as shown in the following image.

Role:editor
Test Controller


# Terminable Middleware

Terminable middleware performs some task after the response has been sent to the browser. This can be accomplished by creating a middleware with terminate method in the middleware. Terminable middleware should be registered with global middleware. The terminate method will receive two arguments $request and $response. Terminate method can be created as shown in the following code.


Example
STEP 1: Create TerminateMiddleware by executing the below command.
=> php artisan make:middleware TerminateMiddleware

STEP 2: Copy the following code in the newly created TerminateMiddleware at app/Http/Middleware/TerminateMiddleware.php.
........................................................................
namespace App\Http\Middleware;
use Closure;

class TerminateMiddleware {
   public function handle($request, Closure $next) {
      echo "Executing statements of handle method of TerminateMiddleware.";
      return $next($request);
   }
   
   public function terminate($request, $response) {
      echo "<br>Executing statements of terminate method of TerminateMiddleware.";
   }
}
.........................................................................

STEP 3:
Register the TerminateMiddleware in app\Http\Kernel.php file.

protected $routeMiddleware = [
  'auth' => \App\Http\Middleware\Authenticate::class,
  'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
  'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
  'Age' => \App\Http\Middleware\AgeMiddleware::class,
  'terminate' => \App\Http\Middleware\TerminateMiddleware::class,
];

STEP 4:
=> php artisan make:controller ABCController --plain

STEP 5: app/Http/ABCController.php
.................................................
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ABCController extends Controller {
   public function index() {
      echo "<br>ABC Controller.";
   }
}
.................................................

STEP 6 − Add the following line of code in app/Http/routes.php file.

Route::get('terminate',[
   'middleware' => 'terminate',
   'uses' => 'ABCController@index',
]);

STEP 7: Visit the following URL to test the Terminable Middleware.
http://localhost:8000/terminate

STEP 8: The output will appear as shown in the following image.

Executing statements of handle method of TerminateMiddleware.
ABC Controller.
Executing statements of terminate method of TerminateMiddleware.













































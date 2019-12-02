<?php
Example 1.)
=> php artisan make:middleware CheckAge

_______(app/Http/Middleware/CheckAge.php)__________

namespace App\Http\Middleware;

use Closure;

class CheckAge
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
        return $next($request);
    }
}


_______(app/Http/kernel.php)__________

/*Global....These middleware are run during every request to your application.*/
protected $middleware = [
	\Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
	\App\Http\Middleware\CheckAge::class,
];


________________________________________________________________________________


Example 2.)
=> php artisan make:middleware test

_______(app/Http/Middleware/test.php)__________

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
		$ip = $request->ip();
		if($ip == '::1'){
			return redirect('/');
		}
        return $next($request);
    }
}


_______(app/Http/kernel.php)__________

/*These middleware may be assigned to groups or used individually.*/
protected $routeMiddleware = [
	'test' => \App\Http\Middleware\test::class,
];


_______(routes/web.php)__________

Route::get('hello',function(){
	return view('hello');
})->middleware('test');

















Route::get('/', function(){
	return "<h1>Hello World!<h1>";
})->middleware();
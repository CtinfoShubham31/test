Facade 
<?php
In Laravel, all services have a facade class. These facade classes extend the base Facade class.

Laravel Facades provides a static like interface to classes that are available in the application`s service container. 
All of Laravel`s facades are defined in the Illuminate\Support\Facades namespace.

Example:
DB::table('table_name')->get();  
In this example, the DB is the facade. it is calling the table() static method on the DB facade.


-----(web.php)---
cache()->set('name','sarthak');
dd(cache()->get('name'));

o/p => sarthak

set is non-static function

use Illuminate\Filesystem\Cache

Cache::set('name','sarthak');
dd(cache::get('name'));
?>
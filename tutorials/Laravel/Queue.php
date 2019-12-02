# https://www.youtube.com/watch?v=z_RZAHsQnDk


*****************************************************************
Using queue we can send mail in background.

Step 1. change the queue driver to the database.
Step 2. php artisan queue:table
The above command creates a migration file at database/migrations directory. The created file contains a schema for the jobs table.then we need to migrate the database.
It will create the jobs table in the database.
Step 3. create the job that purpose is to send the actual email to the user.
=> php artisan make:job 

public function handle()
{
	Mail::to('mail@appdividend.com')->send(new SendMailable());
}
Step 4. In EmailController.php file, we will need to trigger this job.
So we need to dispatch the newly created job from the EmailController

----------(EmailController.php)---------
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendEmailJob;

class EmailController extends Controller
{
    public function sendEmail()
    {
        dispatch(new SendEmailJob());

        echo 'email sent';
    }
}
*****************************************************************
	
Queue:
<?php 
Sending an email is a time-consuming task, so what we will do is, we will create a job that’s the only task is to send an email to the user in the background. 
?>
# Step 1: Configure the Laravel
<?php
For email sending, I have used https://mailtrap.io. So if you want that use, go to the website and signup, and you will see your username and password, grab it and put in the .env file, and you are good to go.

Also, we need to change the queue driver to the database. By default laravel uses sync.
?>

# Step 2: Create a route for sending mail.
<?
We will create one route to send an email and also create one controller called EmailController.

=> php artisan make:controller EmailController

In routes >> web.php >> file, add the following code.
Route::get('email', 'EmailController@sendEmail');

Okay, now we need to create one mailable class, so in the terminal, type the following command.
=> php artisan make:mail SendMailable

So, it will create this file inside App\Mail\SendMailable.php.

Now, write the sendMail function inside the EmailController.php file.


---------------(EmailController.php) START-----------------------

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;

class EmailController extends Controller
{
    public function sendEmail()
    {
        Mail::to('mail@appdividend.com')->send(new SendMailable());
        echo 'email sent';
    }
}
---------------(EmailController.php) END-----------------------




---------------(SendMailable.php) START-----------------------


namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('view.name');
		return $this->view('welcome');
    }
}


---------------(SendMailable.php) END-----------------------


Now, start the server with the following command.

=> php artisan serve

You will see, there is a delay and then we can get the mail. So here is the solution and that is a queue.

?>

Step 3: Configure Queue.
<?
We can use queue with the Database, Redis, and other drivers as mentioned  in Laravel 5.5 Queues.

We will use Database and so we need to create a migration for Jobs table.

=> php artisan queue:table
The above command creates a migration file at database/migrations directory. The created file contains a schema for the jobs table.then we need to migrate the database.

=> php artisan migrate

It will create the jobs table in the database.


?>

Step 4: Create a job
<? 
Now, we will need to create the job that purpose is to send the actual email to the user.

=> php artisan make:job SendEmailJob
After executing the above command, New job class is created at app/Jobs directory. By default, this directory is not available in the Laravel application. It is created when we create a job class.

Now, the send email function will reside in the job file. So that job file looks like this.

---------------(C:\xampp\htdocs\lavtut\app\Jobs\SendEmailJob.php) START-----------------------

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to('mail@appdividend.com')->send(new SendMailable());
    }
}

---------------(C:\xampp\htdocs\lavtut\app\Jobs\SendEmailJob.php) END-----------------------

In EmailController.php file, we will need to trigger this job.

So we need to dispatch the newly created job from the EmailController. So that code will look like this.


---------------(EmailController.php) START-----------------------

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendEmailJob;

class EmailController extends Controller
{
    public function sendEmail()
    {
        dispatch(new SendEmailJob());

        echo 'email sent';
    }
}

---------------(EmailController.php) END-----------------------

Now, again hit that email URL.

Still, the delay is there; we have just moved the logic to the job file. We need to send the mail in the background. So we need to delay our queue.



=> php artisan queue:work



?>




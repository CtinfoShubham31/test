<?php 

https://www.codovel.com/send-email-notification-in-laravel-55-step-by-step-tutorial.html

http://miftyisbored.com/tutorial-email-notifications-laravel-5-3/  ------(Good)
https://itsolutionstuff.com/post/laravel-57-new-notification-system-tutorial-for-beginnerexample.html
https://dev.to/rizwan_saquib/creating-a-laravel-notification-system-6mb
https://mattstauffer.com/blog/the-new-notification-system-in-laravel-5-3/
https://appdividend.com/2018/06/09/laravel-desktop-notification-implementation-tutorial/
https://medium.com/justlaravel/how-to-use-middleware-for-content-restriction-based-on-user-role-in-laravel-2d0d8f8e94c6
https://devdojo.com/tutorials/laravel-notifications

https://code.tutsplus.com/tutorials/notifications-in-laravel--cms-30499  ------(Good)


# Notifications
Sending email, Laravel provides support for sending notifications across a variety of delivery channels, including mail, SMS (via Nexmo), and Slack.
Notifications may also be stored in a database so they may be displayed in your web interface.

****************************************
 trait called Notifiable. This trait can be used on any model. You simply have to make sure that the model uses the trait and then you can use the notify() method.
****************************************

=> php artisan make:notification LightsaberUpdated

After running this, you will now notice a notifications folder inside the App folder and this new folder will contain our new notification. If you open the file, you will see that it comes pre-installed with 3 mehtods along with the constructor: via(), toMail() and toArray().

The via() method defines all the channels that the nofication should use. By default, it is setup as ‘mail’
....................................
public function via($notifiable)
{
    return ['mail'];
}
....................................

Our constructor should know which user we are sending the notification to. So, I am going to add the user as a parameter for the constructor.
....................................
public function __construct(User $jedi)
{
   $this->jedi = $jedi;
}
....................................

We are now ready to notify our jedis about the status of their lightsaber. Let’s go back to our notifyJedi() method in the UseController and send the LightsaberUpdated notification via:

$jedi = User::findOrFail($id);
$jedi->notify(new LightsaberUpdated($jedi));





php artisan make:controller NotificationController


































































































































































~What is ECMAScript 6?
<?php 
ECMAScript (ES) is a scripting language specification standardized by ECMAScript International. 
ECMAScript 6 is also known as ES6 and ECMAScript 2015.
Some people call it JavaScript 6.
New features in ES6.

- JavaScript let
- JavaScript const
- JavaScript Arrow Functions
- JavaScript Classes
- Default parameter values
- Array.find()
- Array.findIndex()
- Exponentiation (**)


# var
In ES5, when you declare a variable using the var keyword, the scope of the variable is global-scoped if you declare it outside of a function or function-scoped in case you declare it inside a function.
EX:
		var tester = "hey hi";
		function newFunction() {
			var hello = "hello";
		}
		console.log(hello); // error: hello is not defined

		=> Problem with var:
		var greeter = "hey hi";
		var times = 4;

		if (times > 3) {
			var greeter = "say Hello instead"; 
		}

		console.log(greeter) //"say Hello instead"
		
=>  var variables can be re-declared and updated
=> 	var variables are initialized with undefined, let and const variables are not initialized.

_________________________________________________________________
# let
ES6 provides a new way of declaring a variable by using the let keyword. The let keyword works similar to the var keyword, except that the variables it declares are block-scoped.

1. EX:
	let greeting = "say Hi";
	let times = 4;

	if (times > 3) {
		let hello = "say Hello instead";
		console.log(hello);//"say Hello instead"
	}
	console.log(hello) // hello is not defined

	=> let can be updated but not re-declared.
	
2. EX: let can be updated but not re-declared.

	let greeting = "say Hi";
	greeting = "say Hello instead";
	console.log(greeting);		// o/p => say Hello instead
	
	BUT, If redeclared, will gettng error.
	
	let greeting = "say Hi";
    let greeting = "say Hello instead";//error: Identifier 'greeting' has already been declared
_________________________________________________________________	

# const
Like let declarations, const declarations can only be accessed within the block it was declared.

=> const cannot be updated or re-declared
1. EX:
	const greeting = "say Hi";
	greeting = "say Hello instead";//error : Assignment to constant variable. 
	
2. EX:
	const greeting = "say Hi";
    const greeting = "say Hello instead";//error : Identifier 'greeting' has already been declared	
	
_________________________________________________________________

# Arrow Functions
The arrow function provides you with an alternative way to write a shorter syntax compared to the function expression. See the following example.

EX:
var add = function(x,y) {
  return x + y;
}
console.log(add(10,20)); // 30

In this example, the add() function expression returns the sum of two numbers. The following example uses the arrow function that is equivalent to the add() function expression above.

var add = (x,y) => x + y;
console.log(add(10,20)); // 30;	
?>
============================================================================================
Cross-domain AJAX request is possible in two ways
1). Using JSONP
2). Using CORS (Cross-origin resource sharing)
<?php 
JSONP or “JSON with padding” is a complement to the base JSON data format which provides a method to request data from a server in a different domain, something prohibited by typical web browsers.

1.)USING JSONP
We can send cross domain AJAX requests using JSONP. Below is the simple JSONP Request:

$.ajax({
    url : "http://hayageektest.appspot.com/cross-domain-cors/jsonp.php",
    dataType:"jsonp",
});
 
function mycallback(data)
{
    alert("Here: "+data.name);
}
jsonp.php response is:


mycallback({"name":"Ravishanker","age":32,"location":"India"})
when the JSONP request is successful, mycallback function is called.

If you want the function handling automatically, you can use the below approach. In this case, you need not have any extra function. You can get the server response in success callback

$.ajax({
        url : "http://hayageektest.appspot.com/cross-domain-cors/jsonp.php",
        dataType:"jsonp",
        jsonp:"mycallback",
        success:function(data)
        {
            alert("Name:"+data.name+"nage:"+data.age+"nlocation:"+data.location);
        }
    });
jsonp.php source code:


<php
    $callback ='mycallback';
 
    if(isset($_GET['mycallback']))
    {
        $callback = $_GET['mycallback'];
    }   
    $arr =array();
    $arr['name']="Ravishanker";
    $arr['age']=32; 
    $arr['location']="India";   
 
    echo $callback.'(' . json_encode($arr) . ')';
 
php>
This works in all the browsers but the problem is: JSONP supports only GET method. POST method is not allowed.

2.)USING CORS (CROSS-ORIGIN RESOURCE SHARING)
Browser does not allow cross domain AJAX requests due to security issues. Cross-domain requests are allowed only if the server specifies same origin security policy.

To enable CORS, You need to specify below HTTP headers in the server.
# Access-Control-Allow-Origin – Name of the domain allowed for cross domain requests. * indicates all domains are allowed.
# Access-Control-Allow-Methods – List of HTTP methods can be used during request.
# Access-Control-Allow-Headers – List of HTTP headers can be used during request.

In PHP, you can use the below code to set the headers.

header('Access-Control-Allow-Origin: *');  
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');

Below the sample code which handles Cross Domain AJAX POST requests: post.php

<php
header('Access-Control-Allow-Origin: *'); 
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
 
$_POST['extra']='POST Request from hayageek.com';
echo json_encode($_POST);
php>

CORS works fine in all the latest browsers, but IE8 and IE9 don’t support this.

?>
============================================================================================
~Component Communication
<?php 
# How to pass data from Parent to Child Component using Input properties 
@Input decorator or input properties are used to pass data from parent to child component.

Example:

|-------(child.component.ts)--------|
import { Component, OnInit, Input } from '@angular/core';

export class ChildComponent implements OnInit {
  @Input() count: number;
}

|-------(child.component.html)--------|
<h2>Child Component</h2>
current count is {{ count }}

|-------(app.component.ts)--------|
export class AppComponent {
  Counter = 5;
  increment() {
    this.Counter++;
  }
  decrement() {
    this.Counter--;
  }
}

|-------(app.component.html)--------|
<button (click)="increment()">Increment</button>
<button (click)="decrement()">decrement</button>
<app-child [count]=Counter></app-child>

# How to pass data from Child to Parent using @Output properties(EventEmitter) 
Child component exposes an event emitter property with which emit event when something happening. and parent bind to event property and reacts to those events. So this event emitter nothing it is an output property.
First step is to import EventEmitter and Output from the angular core.

Example:

|-----(child.component.ts)-----|
import { Component, Output, EventEmitter } from '@angular/core';

export class ChildComponent {
	message: string = "Hola Mundo!";
	@Output() messageEvent = new EventEmitter<string>();
	
	sendMessage() {
		this.messageEvent.emit(this.message)
	}
}

|-----(child.component.html)-----|
<button (click)="sendMessage()">Send Message</button>

|-------(parent.component.html)--------|
Message: {{message}}
<app-child (messageEvent)="receiveMessage($event)"></app-child>

|-------(parent.component.ts)--------|
export class ParentComponent {
  message:string;

  receiveMessage($event) {
    this.message = $event
  }
}
?>

Subject
<?php
you can use a Subject in a service to fetch some data, and send the result to all components that subscribed to that Subject.
*******************************************************************************8
We set up service 1, which offers a Subject object.
The Subject of Service 1 is used in component A to emit an event.
The Subject of Service 1 is used in component B to listen to the event.
*********************************************************************************

-----------------------(src\app\service\message.service.ts)-----------------------
import { Injectable } from '@angular/core';
import { Subject } from 'rxjs';
@Injectable()
export class MessageService {
  public message = new Subject<string>();
  setMessage(value: string) {
    this.message.next(value); //it is publishing this value to all the subscribers that have already subscribed to this message
  }
}

-------------(home.component.html)------------
<input type="text" placeholder="Enter message" #message>
<button type="button" (click)="setMessage(message)" >Send message</button>

---------------------(home.component.ts)----------------------
import { Component } from '@angular/core';
import { MessageService } from '../../service/message.service';

export class HomeComponent {
  constructor(public messageService:MessageService) { }
  setMessage(event) {
    console.log(event.value);
    this.messageService.setMessage(event.value); //Use this service instance for passing the value of #message to the service function setMessage:
  }
}

----------------(app.component.ts)---------------
import { Component, OnDestroy } from '@angular/core';
import { MessageService } from './service/message.service';
import { Subscription } from 'rxjs';

export class AppComponent {
  message: string;
  subscription: Subscription;
  constructor(public messageService: MessageService) { }
  ngOnInit() {
    this.subscription = this.messageService.message.subscribe(
      (message) => {
        this.message = message;
      }
    );
  }
														//Inside app.component.ts, subscribe and unsubscribe (to prevent memory leaks) to the Subject:
  ngOnDestroy() {
    this.subscription.unsubscribe();
  }
}

That’s it.
Now, any value entered inside #message of home.component.html shall be printed to {{message}}inside app.component.html
?>

~Behaviour Subject
<?php 
Diffrence between subject and behaviorsubject is behaviorsubject support late subscription.

-------------(users.service.ts)---------------
import { BehaviorSubject } from 'rxjs';
@Injectable({
  providedIn: 'root'
})

export class UsersService { 
	private user = new BehaviorSubject<string>('john');
	//Need to brodcast messages as observable
	cast = this.user.asObservable();
	
	editUser(newUser){
		this.user.next(newUser);	//Basically replaces the value of the user
	}
}

---------------(one.component.html)----------------
<h2>one : {{user}}</h2>
<input type="text" [(ngModel)] = "editUser">
<button (click)="editTheUser()">Change</button>

-------------(one.component.ts)---------------
import { UserService } from '../../services/users.service';

export class OneComponent implements OnInit {
	user:string;
	editUser:string;
	constructor(private usersService: UsersService){}
	
	ngOnInit() {
		this.usersService.cast.subscribe(user => this.user = user)
	}
	
	editTheUser(){
		this.usersService.editUser(this.editUser);
	}
}


# Subject VS BehaviorSubject
> A BehaviorSubject holds one value. When it is subscribed it emits the value immediately. A Subject doesn`t hold a value.

> BehaviourSubject will return the initial value or the current value on Subscription
?>
=========================================================================
Interceptors
<?php 
Interceptors provide a mechanism to intercept and/or mutate outgoing requests or incoming responses.
The HttpInterceptor interface provides an easy way to modify the incoming/outgoing HTTP requests in Angular. You can implement the HttpInterceptor interface to modify request headers, cache requests, log information, and more.

# Use Of Interceptors
- Ensure the outgoing request is https instead of http.
- Set an authorization header on each request.
- We can create a global error catch in case http request fail.

https://www.youtube.com/watch?v=-G7kStvqgcg
?>
==========================================================================
Lazy Loading
<?php 
In Lazy loading only that module or component is loaded which is required on that point of time, this makes an application very fast and economic on memory consumption factors.
?>
=============================================================================
Angular dev build vs prod build
<?php
To generate the development build we use "ng build --dev" and for production we use "ng build --prod"
> By default a Dev Build produce Source Maps Where as a Prod Build does not

> To generate a Dev Build without source map
ng build --dev -sm false

> To generate the Prod Build with source maps
ng build --prod -sm true

> Minification AND Uglification:
A Prod Build is minified and uglified where as a Dev Build not.
Minification => is the process of removing of excess whitespace, comments and option tokens like curly brackets and semicolons.
Uglification => is the process of trnasforming code to use short variable and function name.

We use both the technic to reduce bundle sizes.

> Tree Shaking : A Prod build is Tree Shaked , Where as Dev Build is not.
Tree Shaking => is the process of removing any code that we are not actually using in our application from the final bundle.

> AOT(Ahead of time) Compilation:  With the Prod Build we get AOT comilation, i.e. the angular component templates are pre-compiled, where as with a development build they are not.
?>
==============================================================================
AOT(Ahead-Of-Time) VS JIT(Just-in-Time) Compilation
<?php 


?>






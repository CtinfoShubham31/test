<?php
# 1. Install Angular
To set up the project run the following two commands in the terminal:

> npm install -g @angular/cli
> ng new cars

The first command installs the Angular/CLI working environment, and the second generates a new Angular app with the name of cars.

Once the installation has finished, cd into the app`s folder and then serve the app:

> cd cars/
> ng serve --o

It may take a while until the installation finishes and the app launches

To give the app a nice look, include the link to the Bootstrap`s (CSS framework) stylesheet in the index.html header.

src/index.html

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Cars</title>
  <base href="/">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<body>
  <app-root></app-root>
</body>
</html>


# 2. Add the HttpClientModule to the project

Angular''s preferred way to communicate with the server side is through the HttpClientModule module.

To be able to use the HttpClientModule, you need to import it into the root module of the application:

src/app/app.module.ts

import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HttpClientModule } from '@angular/common/http';

import { AppComponent } from './app.component';

@NgModule({
  declarations: [
    AppComponent
  ],
  imports: [
    BrowserModule,
    HttpClientModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }

It is not enough to import the module you should also add it''s symbol to the imports array.

After importing, you will be able to use the module in the various parts of the application, such as in the components and services.


# 3. Add the Car class

A car is not just a thing, and since you work with TypeScript, you better define the type. You will do this with the Car class, which you need to add to the app. For this, manually create a car.ts file in the src/app folder, and put the following code inside:

src/app/car.ts

export class Car {
  constructor(
    model: string,
    price: number,
    id?:   number) {}
}

Besides the price and model name, the class contains an id which is an optional field, hence the question mark


=========================================================================================



You always import the Component symbol from the Angular core library and annotate the component class with @Component.

@Component is a decorator function that specifies the Angular metadata for the component.

The CLI generated three metadata properties:

selector— the component's CSS element selector
templateUrl— the location of the component's template file.
styleUrls— the location of the component's private CSS styles.
'
The CSS element selector, 'app-heroes', matches the name of the HTML element that identifies this component within a parent component's templat
'
The ngOnInit is a lifecycle hook. Angular calls ngOnInit shortly after creating a component. It's a good place to put initialization logic.
'
Always export the component class so you can import it elsewhere ... like in the AppModule.

# Pipe
<h2>{{hero.name | uppercase}} Details</h2>
The word uppercase in the interpolation binding,
Pipes are a good way to format strings, currency amounts, dates and other display data. Angular ships with several built-in pipes and you can create your own.

# [(ngModel)] is Angular's two-way data binding syntax.
The textbox should both display the hero''s name property and update that property as the user types. That means data flow from the component class out to the screen and from the screen back to the class.

To automate that data flow, setup a two-way data binding between the <input> form element and the hero.name property.

<input [(ngModel)]="hero.name" placeholder="name">
Here it binds the hero.name property to the HTML textbox so that data can flow in both directions: from the hero.name property to the textbox, and from the textbox back to the hero.name.

Although ngModel is a valid Angular directive, it isn''t available by default.


# imported the FormsModule in the AppModule so that Angular would recognize and apply the ngModel directive.

Every component must be declared in exactly one NgModule.

# The *ngFor is Angular's repeater directive


# Observable is one of the key classes in the RxJS library.


https://www.udemy.com/angular-5/learn/v4/overview
https://www.udemy.com/angular-5/


https://dzone.com/articles/building-angular5-application-step-by-step

https://phpenthusiast.com/blog/develop-angular-php-app-getting-the-list-of-items


https://www.thetechieshouse.com/angular-4-with-php-backend-angular-4-php-mysql/

https://seegatesite.com/angular-4-tutorial-for-beginner-with-simple-app-project/

https://www.concretepage.com/angular-2/angular-4-crud-example
-------(Good)

https://github.com/eboominathan/Basic-Crud-in-Angular-4-using-Codeigniter-3.1.6/tree/master/api
https://github.com/mohittanwani/angular4-php-mysql/tree/master/src


-------------------------------------------------------------------------------------------------------
										ANGULAR 5
-------------------------------------------------------------------------------------------------------

HttpClient

export Class AppComponent{
	posts:Post[];
	constructor(private http: HttpClient){}
	
	this.http.get<Post[]>('https://jsonplaceholder.typicode.com/posts').subscribe(x => {
		this.posts = x;
		console.log(this.posts);
	})
}


interface Post{
	userId:number;
	id:number;
	title:string;
	body:string;
}



# Use HttpClient without Observable:

export Class AppComponent implents OnInit{
	constructor(private apitest: ApitestService){}
	
	ngOnInit(){
		this.getLanguages();
	}

	getLanguages(){
		this.apitest.getLanguages().subscribe(function(data){
			console.log("Languages",data);
		});
	}
}


export Class ApitestService{
	languages:string = '';
	constructor(private httpClient: HttpClient){}
	
	getLanguages(){
		return this.httpClient.get(this.languages);
	}
}

# Using Observable: For Performance inhancement. Now recommand observable.
import{Observable}from 'rxjs/Observable';
export Class ApitestService{
	languages:string = '';
	constructor(private httpClient: HttpClient){}
	
	getLanguages():Observable<any>{
		return this.httpClient.get(this.languages);
	}
}

# Observable, model, interface
https://www.youtube.com/watch?v=xvLsvyrAMNk
https://github.com/typicode/json-server
https://github.com/umairjameel321/observablesangular

https://blog.angularindepth.com/the-new-angular-httpclient-api-9e5c85fe3361
https://www.concretepage.com/angular/angular-httpclient-post
https://www.concretepage.com/angular-2/angular-httpclient-get-example

https://alligator.io/angular/httpclient-intro/

https://phpenthusiast.com/blog/develop-angular-php-app-getting-the-list-of-items

https://www.tektutorialshub.com/angular/angular-httpclient/  -----------(Very Well Explaination of HttpClient and Observable)

Observable as HTTP response (an array) whose items arrive asynchronously over time. Observable help you manage asynchronous data, such as data coming from a backend service. ToExtention( use Observable, Angular uses a third-party library called Reactive Extentions(RxJs). It enables us to work with Observable.
In real world example, we can say that the internet service offered by mobile devices is an observable. It is available only to the people who have subscribed to it.
Observable r a proposed feature for ES2016, the next version of JavaScript.

Steps1. We have to request to the server using HTTP get.
Steps2. We will get/receive response(Observable) from server and we need to cast it into an array form, so component can use it.
Steps3. We need to subscribe the observable from the component classes to use it.
Steps4. We need to assign the value to the local variable of the component to display. 	

# Angular HttpClient with RxJS Observable Example
https://howtodoinjava.com/angular/rxjs-observable-httpclient/
----(Good)


# Template driven form
Using this method, you first create html-input-elements and then use directives like ngModel to bind their value to a components variable.

https://sibeeshpassion.com/validation-using-template-driven-forms-in-angular-5/
https://alligator.io/angular/template-driven-forms/


# Angular CRUD:
http://www.dotnetmob.com/angular-5-tutorial/angular-5-crud-operations-with-firebase/

MONGODB EXPRESS
https://appdividend.com/2018/01/21/angular-5-crud-tutorial-example-scratch/


# How to Pass URL Parameters (Query Strings) in Angular (HttpParams)


# Behavior Subjects
When you subscribe to a behavior subject, it will give you the last emitted value right away.
Imagine subscribing to a magazine, and right away you receive the latest published issue of it. Wouldn’t that be awesome? Welcome to the world of behavior subjects!

// Behavior subjects need a first value
let subject = new BehaviorSubject<string>("First value");

subject.asObservable().subscribe((data) => {
  console.log("First subscriber got data >>>>> "+ data);
});

subject.next("Second value")

// Console result:
// First subscriber got data >>>>> First value
// First subscriber got data >>>>> Second value
With behavior subjects, it does not matter when you subscribe, you always get the latest value right away, which can be very useful.


Subject is also an Observer so we can use the Observer methods next(), error(), complete().


Share data between sibling components in Angular 5 using Rxjs BehaviorSubject


Behavior subjects holds value which need to be share with other component.
For example home component and about component.

https://www.arroyolabs.com/2018/01/a-real-world-example-of-an-angular-observable/
https://coursetro.com/posts/code/149/RxJS-Subjects-Tutorial---Subjects,-BehaviorSubject,-ReplaySubject-&-AsyncSubject
https://www.technouz.com/4776/custom-angular-application-state-service-with-behavioursubject/

The BehaviorSubject holds the value that needs to be shared with other components. These components subscribe to data which is simple returning the BehaviorSubject value without the functionality to change the value. 


https://pillar-soft.com/2018/07/02/behavior-subjects-in-angular-6/
https://hassantariqblog.wordpress.com/2016/12/03/angular2-difference-between-a-behavior-subject-and-an-observable/

The asObservable operator can be used to transform a subject into an observable. This can be useful when you’d like to expose the data from the subject, but at the same time prevent having data inadvertently pushed into the subject:

https://alligator.io/rxjs/subjects/


private caseListSource = new BehaviorSubject({}); Is an Observable;

caseList$ = this.caseListSource.asObservable(); Is an Observable;

A great way of sharing data between components is to use the Rxjs BehaviorSubject library. 
import { Injectable } from '@angular/core';
import { BehaviorSubject } from 'rxjs/BehaviorSubject';

@Injectable()

export class DataService {

  private goals = new BehaviorSubject<any>(['The initial goal', 'Another silly life goal']);
  goal = this.goals.asObservable();

  constructor() { }

  changeGoal(goal) {
    this.goals.next(goal)
  }

}
This allows us to set the initial goal through goals as a BehaviorSubject, and then define a goal property as an observable.
We also created a changeGoal method that we will call in order to update the goals property.

https://coursetro.com/posts/code/110/Creating-and-Using-Angular-5-Services
----(Good)


BehaviorSubject solves our last problem; it is a type of Subject which always emits the last emitted value to any new subscriber. Unfortunately, BehaviorSubject needs an initial value. 

BehaviorSubjects have all the functionality of Subject, but also

output the last value received to all observers upon subscription. (The main reason I choose it)
allow for an initial value to be set
....................................................................................
I used BehaviorSubject() in angular to two things on the project Angular + Drupal. 

Connecting two components to the same function. If that function change, the data change in both.  
Send a variable that I get from one component to another.

----------------------------------------------------------------------------

BehaviorSubject is a type of subject, a subject is a special type of observable so you can subscribe to messages like any other observable. The unique features of BehaviorSubject are:

It needs an initial value as it must always return a value on subscription even if it hasnt received a next()
Upon subscription, it returns the last value of the subject. A regular observable only triggers when it receives an onnext
at any point, you can retrieve the last value of the subject in a non-observable code using the getValue() method.
Unique features of a subject compared to an observable are:

It is an observer in addition to being an observable so you can also send values to a subject in addition to subscribing to it.
In addition, you can get an observable from behavior subject using the asObservable() method on BehaviorSubject.

Observable is a Generic, and BehaviorSubject is technically a sub-type of Observable because BehaviorSubject is an observable with specific qualities.

An observable can be created from both Subject and BehaviorSubject using subject.asObservable().


--------------------------------------------------------------------------------------------

Behavior Subjects are another cool thing about subjects. When you subscribe to a behavior subject, it will give you the last emitted value right away.

Imagine subscribing to a magazine, and right away you receive the latest published issue of it. Wouldn’t that be awesome? Welcome to the world of behavior subjects!

// Behavior subjects need a first value
let subject = new BehaviorSubject<string>("First value");

subject.asObservable().subscribe((data) => {
  console.log("First subscriber got data >>>>> "+ data);
});

subject.next("Second value")

// Console result:
// First subscriber got data >>>>> First value
// First subscriber got data >>>>> Second value
With behavior subjects, it does not matter when you subscribe, you always get the latest value right away, which can be very useful.

-------------------------------------------------------------------------------------------

share data between sibling components using rxjs behavior subject in angular 5 application.

http://www.mukeshkumar.net/articles/angular5/share-data-between-sibling-components-in-angular-5-using-rxjs-behaviorsubject
----(Good)

----------------------------------------------------------------------
EXAMPLE: Behavior Subjects

Lets say we want to store what a user's name is, but we also want them to be able to change it. We'd want to store an initial name, have the ability to update it, and also be able to access whatever the current name is set to at any given time.

This is precisely what BehaviorSubject allows you to do. 
Instantiate a new BehaviorSubject with an initial value

In this example, the initial value will be a string (Eric)
let currentNameSubject = new BehaviorSubject('Eric');

To get the current value, invoke the getValue method:
currentNameSubject.getValue();
// => 'Eric'

To change the value of an existing BehaviorSubject, call the next method with a new value:
currentNameSubject.next('Obama');

And if we were to call getValue again:
currentNameSubject.getValue();
// => 'Obama'

Subscribing to value changes
The whole point of using RxJS is to asynchronously update & share data across your application. This is done by subscribing to the Observable instead of calling getValue synchronously:

let currentNameSubject = new BehaviorSubject('Eric');

currentNameSubject.subscribe((val) => {
    console.log(val);
})
// => 'Eric'

currentNameSubject.next('Obama');
// => 'Obama'

currentNameSubject.next('Jacob');
// => 'Jacob'


https://thinkster.io/tutorials/learn-rxjs-observables/creating-an-observable-from-a-subject


{"videoKey":"ch/145/Zd42LaqQmbDUtAkxqMv8QA","videoThumbnail":"https://thumbs.thinkster.io/ch/145/Zd42LaqQmbDUtAkxqMv8QA/00001.png","pro":true}


https://www.youtube.com/watch?v=UfHnf6-2IZU ......vgood
https://github.com/fabioguelfi/Angular-6-Components-Data-Sync-with-Observable-and-Behavior-/tree/master/src/app

https://www.youtube.com/watch?v=vl5C3eMeHbY

https://www.youtube.com/watch?v=Fl0vqO371Mg ------------vgooood

# How to create cookies in Angular 6?
    npm install ngx-cookie-service --save
    Add to your module: import { CookieService } from ngx-cookie-service;
    Add CookieService to modules providers.
    Inject it into your constructor.
    Use cookie.get(nameOfCookie) for getting a specific cookie, use cookie.set(nameOfCookie,cookieValue) for adding a new cookie.


https://github.com/only2dhir/angular6-example/blob/master/src/app/service/user.service.ts
https://maneeshaindrachapa.wordpress.com/2017/11/24/angular-4-connect-with-php-backend/
https://seegatesite.com/tutorial-simple-crud-angular-5-and-lumen-5-6-for-beginners/
https://github.com/eboominathan/Basic-Crud-in-Angular-4-using-Codeigniter-3.1.6


https://www.truecodex.com/course/angular-project-training/crud-1-admin-can-view-blog-list-angular
https://www.youtube.com/watch?v=DbDNCMrAFjo
---------(Good)




*******************************************************************************

https://www.truecodex.com/course/angular-project-training/service-and-http-client-for-create-static-pages-angular
*******************************************************************************
~Interpreters and compilers
~TypeScript
Install Angular
Why use angular
Angular Command
~Routing
~Child Routes
~Angular Forms
~Observables
~RxJS operators in angular services
~Component Communication
~Two way data binding:
~Difference between angular js and angular2
~Angular component life cycle hooks
~Create a Custom Attribute Directive
~Angular Error Handling
~Cascading / Dependent Dropdown List (Country/State/City)
~Angular - Http vs HttpClient

~setValue() & patchValue()
~Router Guards

~Behaviour Subject

~Lazy Loading


~Subject

~ActivatedRouteSnapshot
~RouterStateSnapshot
~Interceptors

~Angular dev build vs prod build

~Angular reactive forms edit example

~Async Pipe
~Observable map()
<?php 

?>


~Interpreters and compilers
<?php
The simplest definition of a compiler is a program that translates code written in a high-level programming language (like JavaScript or Java) into low-level code (like Assembly) directly executable by the computer or another program such as a virtual machine.

For example, the Java compiler converts Java code to Java Bytecode executable by the JVM (Java Virtual Machine). Other examples are V8, the JavaScript engine from Google which converts JavaScript code to machine code or GCC which can convert code written in programming languages like C, C++, Objective-C, Go among others to native machine code.

Interpreter directly executes the instructions in the source programming language while a compiler translates those instructions into efficient machine code
A compiler first takes in the entire program, checks for errors, compiles it and then executes it.
?>


~TypeScript
<?php
TypeScript Code is converted into Plain JavaScript Code

TypeScript is an object-oriented programming language developed and maintained by Microsoft. It is a superset of JavaScript and contains all of its elements.
Type checking at compile time is one of the great features in Typescript.

# Advantages of using TypeScript over JavaScript

- TypeScript always point out the compilation errors at the time of development only. Because of this at the run-time the chance of getting errors are very less whereas JavaScript is an interpreted language.Features of TypeScript:

Here is static typing(We can declare a variable in multiple ways). ex: var num : number;

It has  Interfaces.
It has  optional parameter feature .
Supports Modules . 

Suppose you want to create an add function which takes 2 numbers and return their sum

In Javascript

function add(num1 ,num2) {
 return num1 + num2 
}
add(1,2) // 3 // works fine

add(1 , “Hello”) // 1Hello 

yikes,no compile error.Can cause unexpected results during “Run time” of the program. You don’t want num2 to accept anything other than a number.

Typescript solves such problems by using “types” in variables declaration

In Typescript

 function add(num1: number ,num2:number) {
    //num1 & num2 should be only and only  of type "number"
  return num1 + num2  
}
add(1,2) // works fine

add(1,"two") // Compile time error in typescript.Easier Testing

Type checking at compile time is one of the great features in Typescript(other great feature -Generics, decorator etc).

Typescript = Javascript + type checking + decorator + Generics etc
?>

Install Angular
<?php
To set up the project run the following two commands in the terminal:

> npm install -g @angular/cli
> ng new cars

The first command installs the Angular/CLI working environment, and the second generates a new Angular app with the name of cars.

Once the installation has finished, cd into the app`s folder and then serve the app:

> cd cars/
> ng serve --o

It may take a while until the installation finishes and the app launches
?>

Why use angular
<?php
Angular allow to create single page application.
Never see the refresh.

- Give our applications a clean structure.(Easy to understand and easy to maintain)
- Includes a lot of re-usable code.
- TypeScipt code analyzer warns you about the errors as you type
- Using TypeScript classes and interfaces makes the code more concise(brief) and easy to read and write

# Angular 7 is based on MVM Model view model pattern.
# The current version of rxjs (6.3.3) is also added in angular 7.
# Angular 7 has extended a new life-cycle hook (ngDoBootstrap)

# Angular 6  use rxjs 6.0.0.
# No more support for the <template> tag . <ng-template> tag should be used instead.
?>

Angular Command
<?php 
# To Create Component
Example : Create the heroes component
=> ng generate component heroes
		OR
=> ng g c heroes
The CLI creates a new folder, src/app/heroes/, and generates the three files of the HeroesComponent.

# Component generatation time if do not want spec file then the command should.
ng g c employees/listEmployees --spec false --flat true

# To Create Service
Example: Create the book service
=> ng g service book

# Generate Class
ng generate class Contact

# Generate Service
ng g service blogs

# Generate separate routing module
ng generate module app-routing --module app --flat

# To generate custom directive
ng generate directive highlight
?>



# Interpolation {{}} : Use only when component property is string.

# Property Binding [] :

# Event Binding ()


~Routing
<?php 
Routing is the mechanism used by angular for navigating between page and displaying appropriated component/page on browser.

Router is an official angular routing library.
@angular/router

a) Router Outlet:
It is dynamic component that router uses to display views based on router navigation [routerLink].
<router-outlet></router-outlet>

b) Router Link:
<a [routerLink]="['/student']">Student</a>

# Routing example:

=> Example (1):
-------(app.routing.module.ts)-----------

import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { StudentComponent } from './student/student.component';
import { StudentdetailsComponent } from './studentdetails/studentdetails.component';

const routes: Routes = [
  {
    path:'student',component:StudentComponent
  },
  {
    path:'studentdetails',component:StudentdetailsComponent
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }


-----------(app.module.ts)------------

import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { MypipePipe } from './mypipe.pipe';
import { StudentComponent } from './student/student.component';
import { StudentdetailsComponent } from './studentdetails/studentdetails.component';

@NgModule({
  declarations: [
    AppComponent,
    MypipePipe,
    StudentComponent,
    StudentdetailsComponent
  ],
  imports: [
    BrowserModule,
    FormsModule,
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }

(app.component.html)   ***************Client Side Navigation***************
<a [routerLink]="['/student']">Student</a>
<a [routerLink]="['/studentdetails']">Student Details</a>

<div>
  <router-outlet></router-outlet>
</div>

=> Example (2): Server Side Navigation
--------------(app.component.html)-------------

<a [routerLink]="['/student']">Student</a>
<a [routerLink]="['/studentdetails']">Student Details</a>
<button (click)="student()">Student Status</button>
<div>
  <router-outlet></router-outlet>
</div>


----------(app.component.ts)-----------
import { Component , NgModule } from '@angular/core';
import { Router } from '@angular/router';
//import { StudentComponent } from './student/student.component';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'myyy-app';

  constructor(private router:Router){}
  student(){
    this.router.navigate(['/student']);
  }
  
}

=> Example (3): How to use redirection in routing
here, pathMatch: 'full' means, that the whole URL path needs to match 

const routes: Routes = [
  {
    path:'',redirectTo:'student',pathMatch:'full'
  },
  {
    path:'student',component:StudentComponent
  },
  {
    path:'studentdetails',component:StudentdetailsComponent
  }
];

=> Example (4): Wildcard Route: When no path is matched.
Wildcard route to intercept invalid URLs and handle them gracefully.
{path:'**',component:PageNotFoundComponent}

----------(app.component.html)--------------
<a [routerLink]="['/pagenot']">Page Not</a>

----------(app-routing.module.ts)----------------
import { PagenotfoundComponent} from './pagenotfound/pagenotfound.component'
const routes: Routes = [
  {
    path:'',redirectTo:'student',pathMatch:'full'
  },
  {
    path:'student',component:StudentComponent
  },
  {
    path:'studentdetails',component:StudentdetailsComponent
  },
  {
    path:'**',component:PagenotfoundComponent
  }
];

# Parameterised Route
const routes: Routes = [
 { path: 'blog/:id', component: BlogComponent } 
];

# Non-parameterised
Non-parameterised routes always take priority over parameterised routes, so in the below config:
const routes: Routes = [
 { path: 'blog/:id', component: BlogComponent },	// Parameterised routes
 { path: 'blog/moo', component: MooComponent },		// Non-Parameterised routes
];

If we visited /blog/moo we would show MooComponent even though it matches the path for the first blog/:id route as well.

# Activated route
If we visited /blog/1 how does BlogComponent know the id is 1 and therefore to show the appropriate article.
To do that we use something called an ActivatedRoute.

We import it first and then inject it into the constructor of BlogComponent. It exposes an Observable which we can subscribe to, like so:

import {ActivatedRoute} from "@angular/router";

constructor(private route: ActivatedRoute) {
    this.route.params.subscribe( params => console.log(params) );
}

Now if we navigated to /blog/1 the number 1 would get emitted on the observable and this would get printed to the console as:

{ id: 1 }

# Example Activated route, Parameterised, Snapshot
-----------(app.component.ts)-------------

import { Component } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent{
  
    message:string = "Hi, I am From App Component";
    constructor(private router:Router){}
  student(){
    this.router.navigate(['/student']);
  }
}


-----------(app.component.html)-------------
<h1>{{message}}</h1>

<button (click)="student()">Student Status</button>

<nav>
	<a [routerLink]="['/student']">Student</a> <br/>
	<a [routerLink]="['/studentdetails']">Student Details</a> <br/>
	<a [routerLink]="['/pagenot']">Page Not</a> <br/>
	<a [routerLink]="['/departments']" routerLinkActive="active">Departments</a>
</nav>

<div>
    <router-outlet></router-outlet>
</div>


---------------(department-list.component.ts)-------------------
import { Component, OnInit } from '@angular/core';
import { Router} from '@angular/router';
@Component({
  selector: 'app-department-list',
  //templateUrl: './department-list.component.html',
  template: `<h3>Department List</h3>
              <ul class="items">
                <li (click)="onSelect(department)" *ngFor="let department of departments">
                  <span class="badge">{{department.id}}</span>{{department.name}}
                </li>
                <li *ngFor="let department of departments">
                    <a [routerLink]="['/departments/',department.id]">{{department.name}}</a> 
                </li>
              </ul>`,
  styleUrls: ['./department-list.component.css']
})
export class DepartmentListComponent {

  constructor(private router: Router) { }
  departments = [
    {"id":1,"name":"Angular"},
    {"id":2,"name":"Node"},
    {"id":3,"name":"MongoDB"},
    {"id":4,"name":"Ruby"},
    {"id":5,"name":"Bootstrap"},
  ];

  onSelect(department){
    this.router.navigate(['/departments',department.id]);
  }

}

---------------(department-details.component.ts)-------------------
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router, ParamMap } from '@angular/router';

@Component({
  selector: 'app-department-detail',
  //templateUrl: './department-detail.component.html',
  template:`<h3>You selected department with id = {{departmentId}}</h3>`,
  styleUrls: ['./department-detail.component.css']
})
export class DepartmentDetailComponent implements OnInit {

  public departmentId;
  constructor(private route: ActivatedRoute) { }

  ngOnInit() {
    let id = this.route.snapshot.params['id'];
    this.departmentId = id;
  }

}

----------------(app-routing.module.ts)---------------
const routes: Routes = [
  {
    path:'',redirectTo:'student',pathMatch:'full'
  },
  {
    path:'student',component:StudentComponent
  },
  {
    path:'studentdetails',component:StudentdetailsComponent
  },
  {
    path:'settings',component:SettingsComponent,
    children:[
      {path:'', redirectTo:'profile', pathMatch:'full'},
      {path:'profile',component:SettingsProfileComponent},
      {path:'contact',component:SettingsContactComponent}
    ]
  },
  {path:'departments',component:DepartmentListComponent},
  {path:'departments/:id',component:DepartmentDetailComponent},
  {
    path:'**',component:PagenotfoundComponent
  },
  
];
?>



~Child Routes
<?php 
ng g c settings
ng g c settings-contact
ng g c settings-profile

----------(app-routing.module.ts)----------------

const routes: Routes = [
  {
    path:'',redirectTo:'student',pathMatch:'full'
  },
  {
    path:'student',component:StudentComponent
  },
  {
    path:'studentdetails',component:StudentdetailsComponent
  },
  {
    path:'settings',component:SettingsComponent,
    children:[
      {path:'profile',component:SettingsProfileComponent},
      {path:'contact',component:SettingsContactComponent}
    ]
  },
  {
    path:'**',component:PagenotfoundComponent
  },
  
];

----------(settings.component.html)----------------
<p>
  settings works!
</p>
<div>
  <router-outlet></router-outlet>
</div>

URL => http://localhost:4200/settings
o/p => settings works! 

URL => http://localhost:4200/settings/contact
o/p =>  
settings works!

settings-contact works! 

URL => http://localhost:4200/settings/profile
o/p =>  
settings works!

settings-profile works! 

# Child Route(set default path)
const routes: Routes = [
  {
    path:'',redirectTo:'student',pathMatch:'full'
  },
  {
    path:'student',component:StudentComponent
  },
  {
    path:'studentdetails',component:StudentdetailsComponent
  },
  {
    path:'settings',component:SettingsComponent,
    children:[
      {path:'', redirectTo:'profile', pathMatch:'full'},
      {path:'profile',component:SettingsProfileComponent},
      {path:'contact',component:SettingsContactComponent}
    ]
  },
  {
    path:'**',component:PagenotfoundComponent
  },
  
];

if, http://localhost:4200/settings
it will redirected to http://localhost:4200/settings/profile
?>

==========================================================================

~Two way data binding:
<?php
Two way data binding is the combination of both Property binding and Event binding.
using [(ngModel)] directive.
<input [(ngModel)]='data'>

a.) Without ngModel
(app.component.html)
Enter Your Name:<input type="text" [value]='data' (input)='data=$event.target.value'>
Your Name:{{data}}

(app.component.ts)
data:string='';

b.) With ngModel
(app.componenet.ts)
import {Component, NgModule} from '@angular/core';
data:string='Shubham';

(app.module.ts)
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
@NgModule({
  declarations: [
    AppComponent
  ],
  imports: [
    BrowserModule,
    FormsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})


(app.component.html)
Enter Your <input [(ngModel)] = 'data'>
Entered values: HI {{data}}

?>

~Difference between angular js and angular2
<?php
Angular 2 is not an upgrade of Angular 1 but it is completely rewritten.
Angular 2 uses TypeScript which is a superset of JavaScript
Angular 1.x was not built with mobile support in mind, where Angular 2 is mobile-oriented.
Angular 2 is entirely component based. Controllers and $scope are no longer used. 

?>
===========================================================================

~Angular Forms
<?php 
a.) Template driven form
b.) Model-driven form(Reactive forms)

# Template driven form
These are called Template driven form as everything that we r going to use in an application is defined into the template that we r defining along with component.

Prerequisite(condition)शर्त:
- We need to import FormsModule in an Application module file(i.e. app.module.ts)
import {FormsModule} from "@angular/forms";

Features:
- Two way data binding (using [(ngModel)] syntax) 
- Minimal component code, 
- Automatic track of the form and its data
ngForm Directive keeps the track of all form control, that we create and moniter their property like value, valid, touched, dirty, pristine etc.

(html)
<form #employeeForm = "ngForm" (ngSubmit)="saveEmployee(employeeForm)">
	<input id="fullName" name="fullName" [(ngModel)]="fullName" type="text">
	<input id="email" name="email" [(ngModel)]="email" type="text">
</form>

{{employeeForm.value | json}}


(Component)
import { NgForm } from '@angular/core';
saveEmployee(empForm:NgForm):void{
	console.log(empForm.value);
}
#employeeForm(Template reference variable) holds the reference of entire form. and set it to ngForm

=> Angular form validation properties
touched 
untouched

pristine - Form field has not been change
dirty - Whereas dirty has been change

valid
Invalid	

Local template variable #fullNameControl = "ngModel"

<form #employeeForm = "ngForm" (ngSubmit)="saveEmployee(employeeForm)">
	<input required id="fullName" name="fullName" [(ngModel)]="fullName" type="text" #fullNameControl = "ngModel">
	<input id="email" name="email" [(ngModel)]="email" type="text">
</form>


*****Full Name Field*****
<div>tocuched: {{fullNameControl.tocuched}}</div>
<div>untocuched: {{fullNameControl.untocuched}}</div>

<div>pristine: {{fullNameControl.pristine}}</div>
<div>dirty: {{fullNameControl.dirty}}</div>

<div>valid: {{fullNameControl.valid}}</div>
<div>Invalid: {{fullNameControl.Invalid}}</div>

****Employee Form****
<div>tocuched: {{employeeForm.tocuched}}</div>
<div>untocuched: {{employeeForm.untocuched}}</div>

<div>pristine: {{employeeForm.pristine}}</div>
<div>dirty: {{employeeForm.dirty}}</div>

<div>valid: {{employeeForm.valid}}</div>
<div>Invalid: {{employeeForm.Invalid}}</div>

# Conclusion: 
TO CHECK FORM FIELD IS VAILD
> Include the HTML5 validation attributes such as required for example.
  <input required id="fullName" type="text">

> Export ngModel directive to a local template variable
  <input required id="fullName" type="text" #fullNameControl = "ngModel">	

> Use the local template variable to access the validation properties(touched, dirty, valid etc.)

TO CHECK IF ENTIRE FORM IS VAILD
> Export ngForm directive to a local template reference variable
<form #employeeForm = "ngForm" (ngSubmit)="saveEmployee(employeeForm)">

> Use the template reference variable to access the validation properties at the form level
<div>tocuched: {{employeeForm.tocuched}}</div>
<div>untocuched: {{employeeForm.untocuched}}</div>

<div>pristine: {{employeeForm.pristine}}</div>
<div>dirty: {{employeeForm.dirty}}</div>

<div>valid: {{employeeForm.valid}}</div>
<div>Invalid: {{employeeForm.Invalid}}</div>
?>

Template Driven vs Reactive Forms
<?php 
# Template Driven
As the name implies, template-driven forms host most of the logic in the template code; working with a template-driven forms means to build the form in the .html template file. use a dedicated  ngForm object, related to the whole form and containing all the inputs, each one of them being accessible through their name, to perform the required validity checks.

- FormsModule is required for template driven forms

- Two way data binding(using [(NgModel)] syntax)

- <form #myForm="ngForm" (ngSubmit) = "submitForm()">
   #myForm="ngForm" gives us a reference to the form
   <input type="text" [(ngModel)]="user.name" name="name" #nameField="ngModel" required />
   <p>Name: {{user.name}}</p>
	<p>Age: {{user.age}}</p>

# Reactive Forms 
- ReactiveFormsModule for our reactive form example.

- No data binding is done

- import { FormGroup, FormControl, Validators} from '@angular/forms'
- import { FormGroup, FormControl, FormBuilder} from '@angular/forms'

- myForm = new FormGroup({
    name: new FormControl('', Validators.required),
    age: new FormControl('')
  })
  
  <form [formGroup]="myForm" (ngSubmit) = "submitForm()">
  <input type="text" formControlName="name" />
  <p>Name: {{myForm.controls.name.value}}</p>
  <p>Age: {{myForm.controls.age.value}}</p>
  
  -  The "myForm" property is an instance of "FormGroup" and represents the form itself.
  
  - "FormGroup", as the name suggests, is a container of form controls sharing the same purpose; as we can see, the "myForm" itself acts as a FormGroup, which means that we can nest FormGroup objects inside other "FormGroup"
  
  - Each data input element in the form template–in the preceding code, "name"–is represented by an instance of "FormControl".
  - Also note that we have no way to access the FormControls directly, like we were doing in Template-Driven forms; we have to retrieve them using the  .get() method of the main FormGroup, which is the form itself.
  
- It manage form and validation from our component itself.  

# Example
----------------(app.component.ts)-------------------------
export class AppComponent{
	signupForm: FormGroup;
	FirstName: string="";
	LastName: string="";
	Email: string="";
	Password: string="";
	
	constructor(private formBuilder: FormBuilder){
		this.signupForm = formBuilder.group({
			fname: new FormControl(),
			lname: new FormControl(),
			Emailid: new FormControl(),
			userpassword: new FormControl(),
		});
	}
	
	PostData(signForm:NgForm){
		this.FirstName = signForm.controls.fname.value;
		this.LastName = signForm.controls.lname.value;
		this.Email = signForm.controls.Emailid.value;
		this.Password = signForm.controls.userpassword.value;
		console.log(signForm.controls);
	}
	
}

----------------(app.component.html)-------------------------
<div [formGroup]='signupForm' (ngSubmit) = "PostData(signupForm)">
	<div class="form-group">
		<input type="text" formControlName="fname">
	</div>
	<div class="form-group">
		<input type="text" formControlName="lname">
	</div>
	<div class="form-group">
		<input type="text" formControlName="Emailid">
	</div>
	<div class="form-group">
		<input type="text" formControlName="userpassword">
	</div>
	
	<input type="submit" value="Post Data">
</div>

# Reactive form with validation

----------------(app.component.ts)-------------------------
- import { FormGroup, FormControl, FormBuilder, validators} from '@angular/forms'

export class AppComponent{
	signupForm: FormGroup;
	FirstName: string="";
	LastName: string="";
	Email: string="";
	Password: string="";
	
	constructor(private formBuilder: FormBuilder){
		this.signupForm = formBuilder.group({
			fname: ['',Validators.required],
			lname: ['',Validators.required, Validators.maxLength(10)],
			Emailid: ['',Validators.required, Validators.email],
			userpassword: ['',Validators.required],
		});
	}
	
	PostData(signupForm:NgForm){
		this.FirstName = signupForm.controls.fname.value;
		this.LastName = signupForm.controls.lname.value;
		this.Email = signupForm.controls.Emailid.value;
		this.Password = signupForm.controls.userpassword.value;
		console.log(signupForm.controls);
	}
	
}

----------------(app.component.html)-------------------------
<div [formGroup]='signupForm' (ngSubmit) = "PostData(signupForm)">
	<div class="form-group">
		<input type="text" formControlName="fname">
		<span *ngFor="signupForm.control['fname'].haserror(required)">
			First name required !
		</span>
	</div>
	<input type="submit" [disabled] = '!signupForm.valid' value="Post Data">
</div>

----------------(app.component.css)-------------------------
input.ng-invalid.ng-touched{
	border-color:red;
}

# FormGroup
?>

Service
<?php

A service in Angular is generally used when you reuse the data or logic across multiple components.
Services are accessible on:
> Root level
> Module Level
> Component Level

----------(employee.ts)----------
export interface IEmployee{
	code:string;
	name:string;
	gender:string;
	salary:string;
	dateofbirth:string;
}

----------(employee.service.ts)----------
import {Injectable} from '@angular/core';
import {IEmployee} from './employee';

@Injectable()
export class EmployeeService{
	getEmployee():IEmployee[]{
		return [
		{
		  code:'emp001',name:'Shubham',salary:42000,gender:'Male',dateofbirth:'31/05/1988'
		},
		{
		  code:'emp002',name:'Shivam',salary:40000,gender:'Male',dateofbirth:'29/05/1990'
		},
		{
		  code:'emp003',name:'Anshul',salary:55000,gender:'Female',dateofbirth:'31/08/1988'
		},
		{
		  code:'emp004',name:'Kamal',salary:47000,gender:'Female',dateofbirth:'31/05/1991'
		}
	  ];
	}
}


----------(employeeList.component.ts)----------
import {EmployeeService} from './employee.service';

export class EmployeeListComponent{
	employees:IEmployee[];
	
	constructor(private _employeeService:EmployeeService){
		this.employees = this._employeeService.getEmployee()
	}
}


 
?>

***************************************
By default, ajax is asynchronous call, you can make it as synchronous call by using async: false. Asynchronous ajax call allow the next line of code to execute, but synchronous call stop JavaScript execution until the response from server.
***************************************

~Observables
<?php
observables to handle HTTP requests
Observables help you manage asynchronous data, such as data coming from a backend service.To use observables, Angular uses a third-party library called Reactive Extensions (RxJS). Observables are a proposed feature for ES 2016, the next version of JavaScript.

To deal with data asynchronously use Observables.

# Difference between Promises and Observables:
(1) Promises emits single value
Observables emits multiple value over a period of time

(2) Promises cannot be cancel
Observables can be cancelled by using the unsubscibe() method

(3) Promise Not Lazy
Observable is Lazy. An observable is not called untill we subscribe to the observable. 


getBookListFromStore():Observable<Book[]>{
	return this.http.get<Book[]>(this.bookUrl);
}

- Observable is a class of Rxjs library.
- Observable provide support for passing messages between publishers and subscribers in any application.
- Observable provides support event handling, asynchronous programming and handling multiple values.
- Some method of observable class are subscribe, map , mergeMap, switchMap, exhaustMap, debounceTime, of, retry, catch, throw etc.
- Observable are not executed until its subscribed.

Example:
Category function return an observable which the AppComponent is going to subscribe to, like so: 

import {Observable} from 'rxjs';

---------
---------
search(term:string):Observable<Categories[]>{
	
}

// The return type is Observable<Categories[]>, it`s going to return an observable where each item in the observable is Categories[]

# Promise:
- Promises work with asynchronous operation and they either run  us a single value (i.e. promise resolve) Or an error message(i.e. promise reject).
- Another important thing to remember regarding promises is that a request initiated from a promises is not cancellable. What if we want to retry a failed call?

# Example: Promise
 ---------------(app.component.ts)-------------
export class AppComponent{
	private results = [];
	constructor(private http: HttpClient){}
	
	priavte search(term:any){
		console.log(term);
		this.http.get(`https://restcountries.eu/rest/v2/name/${term}`).toPromise()
		.then((data: any) => {
			console.time('request-length');
			console.log(data);
			console.timeEnd('request-length');
			this.results = data;
		});
	}
}


---------------(app.component.html)-------------
<input #term type="text" (keyup)="search(term.value)">
<hr>
<div *ngIf="results.length > 0">
	<li *ngFor = "let result of results">
		{{result.name}}
	</li>
</div>

# Example: Observable

---------------(app.component.html)-------------
<input [formControl="term"]>
<hr>
<div *ngIf="results.length > 0">
	<li *ngFor = "let result of results">
		{{result.name}}
	</li>
</div>

 ---------------(app.component.ts)-------------
export class AppComponent{
	private results = [];
	constructor(private http: HttpClient){}
	
	private term = new FormControl();
	
	ngOnInit(term:any){
		this.term.valueChanges
		.debounceTime(400)					//cancel request for 4 sec.
		.distinctUntilChanged()
		.subscribe(searchTerm => {
			this.http.get(`https://restcountries.eu/rest/v2/name/${searchTerm}`).subscribe((data:any) => {
				debugger;
				
				console.time('request-length');
				console.log(data);
				console.timeEnd('request-length');
				this.results = data;
			})
		})
		
		
	}
}

===================================================

- With a Promise you can only handle one event.
- With an Observable you can handle multiple events.


# Observable and Rxjs
1) Make the http call from EmpService
2) Receive the observable
3) Subscribe to the observable
4) Assign the Emp Data to local variable in view

# Promise
- promise emits a single value
- A promise is Not Lazy
- A Promise cannot be cancelled
- Observable is Lazy. The "Observable" is slow. It isn`t called until we are subscribed to it. 
- An Observable can be cancelled by using the unsubscribe() method
- An addition Observable provides many powerful operators like map, foreach, filter, reduce, retry, retryWhen etc.
 

For example: 

const numberPromise = new Promise((resolve) => {
    resolve(5);
    resolve(10);
});

numberPromise.then(value => console.log(value));
// still prints only 5
------------------------------------------------------------------------------------------------------
# Observable: 
Emits multiple values over a period of time

For example:

const numberObservable = new Observable((observer) => {
    observer.next(5);
    observer.next(10);
});

numberObservable.subscribe(value => console.log(value));
// prints 5 and 10
------------------------------------------------------------------------------------------------------

# Rxjs
Reactive extension for javascript
- External Library to work with Observable

ngOnInit() {
	new Observable( observer => {
		setTimeout( () => {
			observer.next(1);
		}, 1000);
		
		setTimeout( () => {
			observer.next(2);
		}, 5000);
		
		setTimeout( () => {
			observer.complete();
		}, 6000);
		
	}).subscribe(value => {
		console.log(value)
	}, error => {
		console.log(error)
	})
	
	
}





?>

~RxJS operators in angular services
<?php 
//RxJS 5
import {Observable} from 'rxjs/Observable';
import {Subject} from 'rxjs/Subject';
import {catchError} from 'rxjs/operators/catchError';

new ErrorObservable('Your error message');
// OR
ErrorObservable.create('Your error message');

//RxJS 6
import {Observable, Subject, throwError} from 'rxjs';
import {catchError} from 'rxjs/operators';

return throwError('your error message');

=> npm install -g json-server

=> db.json

# Fake rest api server
=> json-server --watch db.json

# import {ISkill} from './ISkill';
export interface IEmployee{
	id: number;
	fullName: string;
	email: string;
	phone?: number;
	contactPreference: string;
	skills: ISkill[];
}

export interface ISkill{
	skillName: string;
	experienceInYears: number;
	proficiency: string;
}
?>

~Component Communication
<?php
# How to pass data from Parent to Child Component using Input properties 
Our application will have a counter which is incremented by the Parent Component. The Parent Component then passes this counter to the child component for display in its template.

@Input decorator or input properties are used to pass data from parent to child component.

First, we import the @Input decorator from @angular/core
-------(child.component.ts)--------
import { Component, Input  } from '@angular/core';

We have defined the inline template for the child component, where it displays the current count.
-------(child.component.ts)--------
@Component({
    selector: 'child-component',
    template: `<h2>Child Component</h2>
               current count is {{ count }}
   `
})

The Child Component expects the count to come from the Parent Component. Hence in ChildComponent decorate the count property with @Input decorator

-------(child.component.ts)--------
export class ChildComponent {
    @Input() count: number;
}

Now, time to pass the Count values to the Child Component from the Parent
-------(app.component.ts)--------
import { Component} from '@angular/core';
 
@Component({
  selector: 'app-root',
  template: `
        <h1>Welcome to {{title}}!</h1>
        <button (click)="increment()">Increment</button>
        <button (click)="decrement()">decrement</button>
        <child-component [count]=Counter></child-component>` ,
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'Component Interaction';
  Counter = 5;
 
  increment() {
    this.Counter++;
  }
  decrement() {
    this.Counter--;
  }
}
 
we are invoking the child component inside
<child-component [count]=Counter></child-component>
Here, we are using count property, which is a property of the child Component inside the square bracket. We bind it to Counter property of the Parent Component.

Finally, we will add counter in Parent component and set it to 5 as shown below.
-------(app.component.ts)--------
export class AppComponent {
  title = 'Component Interaction';
  Counter = 5;
 
  increment() {
    this.Counter++;
  }
  decrement() {
    this.Counter--;
  }
}

FINAL CODE
|-------(app.component.ts)--------|
import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  //templateUrl: './app.component.html',
  template: `
        <h1>Welcome to {{title}}!</h1>
        <button (click)="increment()">Increment</button>
        <button (click)="decrement()">decrement</button>
        <app-child [count]=Counter></app-child>` ,
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'Component Interaction';
  Counter = 5;
  increment() {
    this.Counter++;
  }
  decrement() {
    this.Counter--;
  }
}

|-------(child.component.ts)--------|
import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'app-child',
  //templateUrl: './child.component.html',
  template: `<h2>Child Component</h2>
               current count is {{ count }}
    `,
  styleUrls: ['./child.component.css']
})
export class ChildComponent implements OnInit {
  @Input() count: number;
  constructor() { }

  ngOnInit() {
  }

}


# How to pass data from Child to Parent using @Output properties(EventEmitter) 
Child component exposes an event emitter property with which emit event when something happening. and parent bind to event property and reacts to those events. So this event emitter nothing it is an output property.
First step is to import EventEmitter and Output from the angular core.



<button (click)="NotificationToParent(childname)">Set Value To Parent</button>

---------------(employee.child.component.ts)-------------
export class EmpChild
{
	@Output() outputToParent = new EventEmitter<string>();
	NotificationToParent(selected:string){
		this.outputToParent.emit(selected);
	}
}

---------------(employee.parent.component.ts)-------------
{{ChildCurrentVal}}
<emp-child (outputToParent)="GetOutputVal($event)"></emp-child>

ChildCurrentVal:string;
export class EmpParent
{
	GetOutputVal(selected:string){
		if(selected){
			this.ChildCurrentVal = "Value received from child: "+selected;
		}
	}
}

?>

===========================================================================
~Subject
<?php 
- Observable is unicast and Subject is multicast.
The second super power of subjects is that they support multiple subscriptions. In other words, they are multicast.

- An RxJS Subject is a special type of Observable that allows values to be multicasted to many Observers. 

- To feed a new value to the Subject, just call next(theValue), and it will be multicasted to the Observers registered to listen to the Subject.

*************************************************************************
- Subjects are like EventEmitters: They maintain a registry of many listeners.
let subject = new Subject<string>();

subject.subscribe((data) => {
  console.log("Subscriber 1 got data >>>>> "+ data);
});
subject.subscribe((data) => {
  console.log("Subscriber 2 got data >>>>> "+ data);
});

subject.next("Eureka");

// Console result:
// Subscriber 1 got data >>>>> Eureka
// Subscriber 2 got data >>>>> Eureka
As a result, you can use a Subject in a service to fetch some data, and send the result to all components that subscribed to that Subject.
**********************************************************************


*******************************************************************************8
We set up service 1, which offers a Subject object.
The Subject of Service 1 is used in component A to emit an event.
The Subject of Service 1 is used in component B to listen to the event.
*********************************************************************************


- An observable allows you to subscribe only whereas a subject allows you to both publish and subscribe.
So a subject allows your services to be used as both a publisher and a subscriber

# Example 1

-------------(backend.service.ts)---------------
import { Subject } from 'rxjs/Subject';

export class BackendService { 
	subjectObj = new Subject<any>();	
	
	createObservable(){
		return this.subjectObj.asObservable();
	}
}


--------------------(footer.component.html)---------------

<input type="text" [(ngModel)] = "val">
<button (click)="passToSubject(val)">Pass value to parent</button>


--------------------(footer.component.ts)---------------Child Comp
import { BackendService } from './../backend.service';

constructor(private backendService:BackendService) {}

passToSubject(val){
	this.backendService.subjectObj.next(val);
}


--------------------(app.component.ts)---------------Parent Comp

export class AppComponent{
	developer : any = ['shubham', 'Jack', 'Mac'];
	
	constructor(private backendService:BackendService) {
		this.backendService.createObservable().subscribe( (data) => {
				console.log(data);
				this.developer.push(data);
		})
	}

}


--------------------(app.component.html)---------------
<h3 *ngFor = let dev of developer>
	{{dev}}
</h3>

# Example 2

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

#message is the local variable here

---------------------(home.component.ts)----------------------
import { Component } from '@angular/core';
import { MessageService } from '../../service/message.service';
@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent {
  constructor(public messageService:MessageService) { }
  setMessage(event) {
    console.log(event.value);
    this.messageService.setMessage(event.value);			//Use this service instance for passing the value of #message to the service function setMessage:
  }
}


-------------(app.component.html)-------------
<div *ngIf="message">
  {{message}}
</div>
<app-home></app-home>



----------------(app.component.ts)---------------
import { Component, OnDestroy } from '@angular/core';
import { MessageService } from './service/message.service';
import { Subscription } from 'rxjs';
@Component({
  selector: 'app-root',
  templateUrl: './app.component.html'
})
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
=================================================================================================
~Behaviour Subject:
<?php 
When you subscribe to a behavior subject, it will give you the last emitted value right away.
**************************************************
The BehaviorSubject holds the value that needs to be shared with other components.
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
***************************************************


We r create user that r going to share.

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
	
	constructor() { }
	
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


?>

============================================================================
~ Subject VS BehaviorSubject
<?php 
# BehaviourSubject
A BehaviorSubject holds one value. When it is subscribed it emits the value immediately. A Subject doesn`t hold a value.
1) example:
const subject = new Rx.BehaviorSubject();
subject.next(1);
subject.subscribe(x => console.log(x));

=> o/p : 1


BehaviourSubject will return the initial value or the current value on Subscription
2) example:
var subject = new Rx.BehaviorSubject(0);  // 0 is the initial value

subject.subscribe({
  next: (v) => console.log('observerA: ' + v)  // output initial value, then new values on `next` triggers
});

subject.next(1);  // output new value 1 for 'observer A'
subject.next(2);  // output new value 2 for 'observer A', current value 2 for 'Observer B' on subscription

subject.subscribe({
  next: (v) => console.log('observerB: ' + v)  // output current value 2, then new values on `next` triggers
});

subject.next(3);

=> o/p : 
observerA: 0
observerA: 1
observerA: 2
observerB: 2
observerA: 3
observerB: 3



# Subject
Subject doesnot return the current value on Subscription. It triggers only on .next(value) call and return/output the value
1) example:

const subject = new Rx.Subject();
subject.next(1);
subject.subscribe(x => console.log(x));

=> o/p :

2) example:
var subject = new Rx.Subject();

subject.next(1); //Subjects will not output this value

subject.subscribe({
  next: (v) => console.log('observerA: ' + v)
});
subject.subscribe({
  next: (v) => console.log('observerB: ' + v)
});

subject.next(2);
subject.next(3);

=> o/p :
observerA: 2
observerB: 2
observerA: 3
observerB: 3
?>

============================================================================



~Angular component life cycle hooks
<?php
> Create the component
> Renders the component
> Creates and renders the component childern
> Check when the component data-bound properties change, and
> Destroy the component before removing it from DOM.

The 3 most commonly used hooks
> ngOnchages => Executes, every time the value of an input property changes. The hook method receives a SimpleChanges object containing current and previous property values. This is called before ngOnInit. 

> ngOnInit => Executes, after the constructor and after ngOnchage hook for the first time. It is most commonly used for component intialisation and retrieving data from a database.

> ngDoCheck: Use this hook instead of ngOnChanges for changes that Angular doesn’t detect. It gets called at every change detection cycle, so keeping what it does to a minimum is important for performance.

ngAfterContentInit: Called after content is projected in the component.
ngAfterContentChecked: Called after the projected content is checked.
ngAfterViewInit: Called after a component’s view or child view is initialized.
ngAfterViewChecked: Called after a component’s view or child view is checked.

> ngOnDestroy => Executes just before angular destroys the componenet and gernerally used for performing cleanup.and unsubscribe from observables.

There are 3 simple steps to use the Life Cycle Hooks
Step 1 : Import the Life Cycle Hook interface. For example, to use ngOnInit() life cycle hook, import OnInit interface.

import { OnInit } from '@angular/core';

Step 2 : Make the component class implement the Life Cycle Hook interface, using the implements keyword as shown below. This step is optional, but good to have so you will get editor support and flags errors at compile time if you incorrectly implement the interface method or make any typographical errors.

export class SimpleComponent implements OnInit { }

Step 3 : Write the implementation code for the life cycle interface method. Each interface has a single hook method whose name is the interface name prefixed with ng.

ngOnInit() {
    console.log('OnInit Life Cycle Hook');
}

Let`s understand ngOnChanges life cycle hook with a simple example. Here is what we want to do. As soon as the user starts typing into the text box, we want to capture the current and previous value and log it to the browser console. We can very easily achieve this by using the ngOnChanges life cycle hook.

ngOnChanges, is called every time the value of an input property of a component changes. So first let`s create a SimpleComponent with an input property as shown below. We will continue with the example we worked with in our previous video. Add a new folder in the App folder and name it Others. Add a new TypeScript file to this folder and name it - simple.component.ts. Copy and paste the following code which is commented and self explanatory.

// Step 1 : Import OnChanges and SimpleChanges 
import { Component, Input, OnChanges, SimpleChanges } from '@angular/core';

// The selector "simple" will be used as the directive 
// where we want to use this component. Notice we are
// also using the simpleInput property with interpolation
// to display the value it receives from the parent
// component
@Component({
    selector: 'simple',
    template: `You entered : {{simpleInput}}`
})
// Step 2 : Implement OnChanges Life Cycle Hook interface
export class SimpleComponent implements OnChanges {
    // Input property. As and when this property changes
    // ngOnChanges life cycle hook method is called
    @Input() simpleInput: string;

    // Step 3 : Implementation for the hook method
    // This code logs the current and previous value
    // to the console.
    ngOnChanges(changes: SimpleChanges) {
        for (let propertyName in changes) {
            let change = changes[propertyName];
            let current = JSON.stringify(change.currentValue);
            let previous = JSON.stringify(change.previousValue);
            console.log(propertyName + ': currentValue = '
                + current + ', previousValue = ' + previous);
            // The above line can be rewritten using 
            // placeholder syntax as shown below
            // console.log(`${propertyName}: currentValue 
            // = ${current }, previousValue = ${previous }`);
        }
    }
}

?>
=============================================================================================
~Create a Custom Attribute Directive
<?php 
# Example 1.

!!!!!!!!!!!!(highlight.directive.ts)!!!!!!!!!!

import { Directive, ElementRef } from '@angular/core';

@Directive({
  selector: '[appHighlight]'
})
export class HighlightDirective {

  constructor(el:ElementRef) {
    el.nativeElement.style.backgroundColor = 'yellow';
  }

}

!!!!!!!!!(html)!!!!!!!!!!!!!
<h2 appHighlight>Create Account</h2>

# Example 2.
!!!!!!!!!!!!(highlight.directive.ts)!!!!!!!!!!

import { Directive, ElementRef, HostListener } from '@angular/core';

@Directive({
  selector: '[appHighlight]'
})
export class HighlightDirective {

  constructor(private el:ElementRef) {}


  @HostListener('mouseenter') onmouseenter(){
    this.highlight('yellow','red');
  }

  @HostListener('mouseleave') onmouseleave(){
    this.highlight(null,null);
  }

  private highlight(bgcolor: string, txtcolor:string){
    this.el.nativeElement.style.backgroundColor = bgcolor;
    this.el.nativeElement.style.color = txtcolor;
  }

}

?>
====================================================================================
~Angular Error Handling:
<?php 
When we use httpclient service to call a server side service error may occur.when they do occur we need to handle this.

httpclient handle both the error server side response error code like 404 or 500 and client side error network regarding. 
httpclient wrap  both the http error respnose.
So our handleError error method is going to receive parameter.

Distinguish server error response and client error event.

import { HttpClient, HttpErrorResponse } from '@angular/common/http';
import 'rxjs/add/operator/catch';

export class EmployeeService {
	getEmployee():Observable<Employee[]>{
		return this.httpClient.get<Employee[]>('http://localhost:3000/employee').catch(this.handleError);
	}
	
	private handleError(errorResponse:HttpErrorResponse){
		if(errorResponse.error instanceof ErrorEvent){		//It is client side or network error
			console.log('Client side error', errorResponse.error.message);
		}else{
			console.log('Server side error', errorResponse);
		}
		
		return new ErrorObservable('There is a problem with the service. We r notified and working on it.');
	}
}	

Now with RXJS 5.5 we have new operator called Pipeable Operator also called Lettable Operators.

import { catchError } from 'rxjs/operators';

getEmployee():Observable<Employee[]>{
		return this.httpClient.get<Employee[]>('http://localhost:3000/employee').pipe(catchError(this.handleError));
	}
	
?>
====================================================================================

~Cascading / Dependent Dropdown List (Country/State/City)
<?php 
https://www.truecodex.com/course/angular-6/cascading-or-dependent-dropdown-list-country-state-city-in-angular-6-7


!!!!!!!!!!(csc.service.ts)!!!!!!!!!!!!

import { Injectable } from '@angular/core';
import { HttpClient, HttpErrorResponse } from '@angular/common/http';
import { throwError } from 'rxjs';
import { catchError } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class CscService {

  apiBaseUrl = 'http://localhost/ang6/';

  constructor(private http: HttpClient) { }

  getCountries() {
    return this.http.get(`${this.apiBaseUrl}api/countries`).pipe(
      catchError(this.handleError)
    );
  }

  getStates(countryId: number) {
    return this.http.get(`${this.apiBaseUrl}api/states/${countryId}`).pipe(
      catchError(this.handleError)
    );
  }

  getCities(stateId: number) {
    return this.http.get(`${this.apiBaseUrl}api/cities/${stateId}`).pipe(
      catchError(this.handleError)
    );
  }

  private handleError(error: HttpErrorResponse) {
    if (error.error instanceof ErrorEvent) {
      // A client-side or network error occurred. Handle it accordingly.
      console.error('An error occurred:', error.error.message);
    } else {
      // The backend returned an unsuccessful response code.
      // The response body may contain clues as to what went wrong,
      console.error(`Backend returned code ${error.status}, ` + `body was: ${error.error}`);
    }
    // return an observable with a user-facing error message
    return throwError('Something bad happened. Please try again later.');
  }
}

!!!!!!!!!!!!(create-account.component.ts)!!!!!!!!!!!!!!

import { Component, OnInit } from '@angular/core';
import { FormGroup, FormControl } from '@angular/forms';
import { CscService } from '../csc.service';

@Component({
  selector: 'app-create-account',
  templateUrl: './create-account.component.html',
  styleUrls: ['./create-account.component.css']
})
export class CreateAccountComponent implements OnInit {

  createAccountForm: FormGroup;
  countries: {};
  states: {};
  cities: {};

  constructor(private cscService: CscService) { }

  ngOnInit() {
    this.cscService.getCountries().subscribe(
      data => this.countries = data
    );

    this.createAccountForm = new FormGroup({
      country: new FormControl(''),
      state: new FormControl(''),
      city: new FormControl('')
    });   

  }

  onChangeCountry(countryId: number) {
    if (countryId) {
      this.cscService.getStates(countryId).subscribe(
        data => {
          this.states = data;
          this.cities = null;
        }
      );
    } else {
      this.states = null;
      this.cities = null;
    }
  }

  onChangeState(stateId: number) {
    if (stateId) {
      this.cscService.getCities(stateId).subscribe(
        data => this.cities = data
      );
    } else {
      this.cities = null;
    }
  }



}

!!!!!!!!!!!(create-account.component.html)!!!!!!!!!!!!!!!

<div class="create-account">
  <h2>Create Account</h2>
  <div class="row">
    <div class="col-md-6">
      <form [formGroup]="createAccountForm">
        <div class="form-group">
          <select formControlName="country" class="form-control" (change)="onChangeCountry($event.target.value)">
            <option value="">Select country...</option>
            <option *ngFor="let country of countries" [value]="country.id">{{country.country_name}}</option>
          </select>
        </div>
        <div class="form-group">
          <select formControlName="state" class="form-control" (change)="onChangeState($event.target.value)">
            <option value="">Select state...</option>
            <option *ngFor="let state of states" [value]="state.id">{{state.state_name}}</option>
          </select>
        </div>
        <div class="form-group">
          <select formControlName="city" class="form-control">
            <option value="">Select city...</option>
            <option *ngFor="let city of cities" [value]="city.id">{{city.city_name}}</option>
          </select>
        </div>
      </form>
    </div>
  </div>
</div>

?>

~Angular - Http vs HttpClient
<?php 
If the Angular version is greater than 4.3 we can use the new HttpClient which has some interesting changes.

import { HttpClient } from '@angular/common/http';

1. JSON data returned by default
The new HttpClient by default formats the response to JSON so we no longer need to parse it using response.json():

constructor(private http: HttpClient) {
  this.http.get('http://my.api/data')
      .subscribe(response => console.log(response));
}
In older versions of Angular (< 4.3.x) we had to import the RXJS map method and parse the response as JSON:

// more code
import 'rxjs/add/operator/map';
// more code
constructor(private http: HttpClient) {
  this.http.get('http://my.api/data')
      .map((response: any) => response.json())
      .subscribe(response => console.log(response));
}

2. Interceptors and middlewares
Interceptors allow us to intercept or mutate HTTP requests and responses. An interceptor is really just a TypeScript class (an injectable service) that implements the HttpInterceptor:

3. Progress events
The new HttpClient allows for capturing progress events such as the Upload and Download progress events. In order to access such events, the HttpRequest needs to be created manually:

?>
=======================================================================================================
# There many RxJS operators such as:

https://angular.io/guide/rx-library

# Pipes: Combining Multiple Operators
<?php
.pipe method which is a member of the RxJS Observable for chaining operators
You can use the pipe() function/method to combine multiple Operators. For example:

import { filter, map } from 'rxjs/operators';
const squareOf2 = of(1, 2, 3, 4, 5,6)
  .pipe(
    filter(num => num % 2 === 0),
    map(num => num * num)
  );
squareOf2.subscribe( (num) => console.log(num));

The of() method will create and return an Observable from the 1, 2, 3, 4, 5,6 numbers and the pipe() method will apply the filter() and map() operators on each emitted value.
?>

1) Pipes in Angular: A pipe takes in data as input and transforms it to the desired output
https://angular.io/guide/pipes

2) pipe() function in RxJS: You can use pipes to link operators together. Pipes let you combine multiple functions into a single function.

The pipe() function takes as its arguments the functions you want to combine, and returns a new function that, when executed, runs the composed functions in sequence.
https://angular.io/guide/rx-library (search for pipes in this URL, you can find the same)


# Using the map() Operator
<?php
Map’s job is to transform things.
The map() operator is similar to the Array.map() method. It lets you map observable responses to other values. For example:

import { Observable} from 'rxjs';
import { map } from 'rxjs/operators';
getItems(): Observable> {
  return this.aService.getItems().pipe(map(response => response.data));
}

The getItems() method returns an Observable. We`re using the map() operator to return the data property of the response object.

The operator enables us to map the response of the Observable stream to the data value.

We import the pipeable operator map() from the rxjs/operators package and we use the pipe() method (which takes a variable number of pipeable operators) to wrap the operator.
?>

Angular catchError
<?php 
RxJS catchError operator catches the error thrown by Observable and handles it by returning a new Observable or throwing user defined error.catchError is the pipeable operator and it is used within pipe function of Observable. The parameter of catchError is a function that takes error as argument and returns Observable instance. catchError is imported as following.

import { catchError } from 'rxjs/operators'; 
?>

switchMap operator
<?php 

?>
import { Router, ActivatedRoute, ParamMap} from '@angular/router';
<?php 

?>

various types of Observables such as:
<?php 
- Subject,
- BehaviorSubject and ReplaySubject,
- unicast and multicast Observables,
- cold and hot Observables etc.
?>

# Remember, operators always return observables.

examples of some popular operators such as tap(), map(), filter(), share()
<?php 

# Observable and map    https://www.concretepage.com/angular/angular-rxjs-map
map is a RxJS pipeable operator. map applies a given function to each element emitted by the source Observable and emits the resulting values as an Observable. map is imported as following.

import { map } from 'rxjs/operators'; 
map is used with pipe which is an instance method of Observable. 

Suppose we have an Observable of a string that contains comma separated names

getStdNames(): Observable<string> {
   return of("Mahesh, Krishna, Ram");
} 

Now we will map this string into array and return result into Observable of array of names.

stdNames$: Observable<string[]>; 
getStdNames() { 
 this.stdNames$ = this.bookService.getStdNames().pipe(
    map(res => res.split(","))
 ); 
}

We can iterate stdNames$ as following.
<ul>
  <li *ngFor="let name of stdNames$ | async" >
    {{name}}
  </li>
</ul> We can also subscribe the Observable instance.
this.bookService.getStdNames().pipe(
     map(res => res.split(","))
)
.subscribe(names=> names.forEach(name => console.log(name))); 
?>

================================================================================================
~setValue() & patchValue() 
<?php 
In this blog, I will explain the difference between setValue() and patchValue() which are frequently used in Angular2 reactive forms. 
 
Updating Form controls from a model is very easy and flexible in Reactive Form API of Angular v2. So, setValue() and patchValue() are the methods by which we can update the Reactive forms controls from our model. Let us see the difference between these two in the following example.
 
# setValue()
 
setValue() will set the value of all form controls of the form group.  

    this.profileForm = new FormGroup({  
      
		FirstName: new FormControl(''),  
		LastName: new FormControl(''),  
		UserName: new FormControl(''),  
		Email: new FormControl(''),  
		MobileNumber: new FormControl('')  
      
    })   
	
	We have the above FormGroup controls. Now, we will use setValue() methods to update all FormControl values. 

    profileForm.setValue({  
		"FirstName":"Ajay",  
		"LastName":"Panda",  
		"UserName":"ajay33",  
		"Email":"ajay.panda@gmail.com",  
		"MobileNumber":"8745212589"  
    });   
	
	As you can see from the above code, setValue() method will set all fromcontrol values from model. If you do not mention any of the formcontrol values in model, then it will throw an exception.
	
# patchValue() 
patchValue() method will also set Formcontrol values from a model but only for those which we have mentioned in the model. So,  it is not necessary to pass all the model info in patchValue() method. 

    profileForm.patchValue({    
		"FirstName":"Ajay",    
		"LastName":"Panda"  
    });   

As you can see from the above code, I am only passing two properties to my formgroup control, so patchValue() will set these two properties in form. Unlike to setValue(), it is not necessary to pass all models, we can only pass required models to the from group control.

?>
=================================================================================================
~Router Guards 
=> https://www.youtube.com/watch?v=mt0VFlqrW6k
=> https://codecraft.tv/courses/angular/routing/router-guards/#_canactivate
<?php
With Router Guards we can prevent users from accessing areas that they’re not allowed to access, or, we can ask them for confirmation when leaving a certain area.

- Maybe the user must login (authenticate) first.
- Perhaps the user has logged in but is not authorized to navigate to the target component.
- We might ask the user if it’s OK to discard pending changes rather than save them.

# CanActivate
A CanActivate guard is useful when we want to check on something before a component gets used.

This is extremely useful for scenarios like:

> checking if a user is authenticated
> checking if a user has permission

Checks to see if a user can visit a route.


# CanActivateChild
The CanActivateChild guard is similar to the CanActivate guard. The key difference is that it runs before any child route is activated.

Checks to see if a user can visit a routes children.

# CanDeactivate
Checks to see if a user can exit a route.
https://www.youtube.com/watch?v=WveRq-tlb6I

# Resolve

# CanLoad

# Example
=> ng g guard auth
=> ng g guard guards/auth
Inject the guard in "app.moule.ts" 
import { Authguard } from './guards/auth-guard'
providers : [Authguard]

----------(app-routing.module.ts)------------
News route is protected by auth guard.  if auth guard canAactivate function return true then only can go to news route. if return false then can not access news route.

{
	path : 'news',
	component : NewsComponent,
	canAactivate: [Authguard],
	childern : [
		{
			path: 'latest',
			component: LatestComponent	
		},
		{
			path: 'upcoming',
			component: UpcomingComponent
		}
	]
}

# Role based routing guard

CanActivate function return true or false. Or it can be observable or promise but in boolean form.
CanDeactivate, Try to leave the page.

=> ng g module project --routing

# Angular Lazy Load Routing with Route Guards Part-1
https://www.youtube.com/watch?v=nH2S2LV8k0I



?>

~ActivatedRouteSnapshot
<?php 

?>

~RouterStateSnapshot
<?php 

?>




[innerHTML]
<?php 
<div class="blog-desc" [innerHTML]="blog.description"></div>
?>

~Interceptors
<?php 
# Interceptors: 
https://ryanchenkie.com/angular-authentication-using-the-http-client-and-http-interceptors
https://www.tektutorialshub.com/angular/angular-httpclient-http-interceptor/  -------(good)
https://www.stackchief.com/tutorials/HTTP%20Interceptor%20Angular  --------(good)
https://codinglatte.com/posts/angular/building-http-interceptor-angular-5/  --------(good)
https://www.codingforentrepreneurs.com/blog/jwt-token-interceptor-for-http-angular/

http://www.angulartutorial.net/2018/03/set-headers-for-all-http-request-using.html  --------(good)
http://www.angulartutorial.net/2018/03/catch-all-http-errors-using.html   --------(good)

Interceptors provide a mechanism to intercept and/or mutate outgoing requests or incoming responses. They are very similar to the concept of middleware with a framework like Express,

The HttpInterceptor interface provides an easy way to modify the incoming/outgoing HTTP requests in Angular. You can implement the HttpInterceptor interface to modify request headers, cache requests, log information, and more.

# Use Of Interceptors
- Ensure the outgoing request is https instead of http.
- Set an authorization header on each request.
- We can create a global error catch in case http request fail.




# Example 1.
Lets create a class called authentication , authheader  for authenticating the for sending authenticating header for each time when you send the request.

---------(/opt/lampp/htdocs/angtest/src/app/http-interceptors/auth-header-interceptor.ts)--------------
import { Injectable } from '@angular/core';
import { HttpInterceptor, HttpRequest, HttpHandler } from '@angular/common/http';

@Injectable()

export class AuthHeaderInterceptor implements HttpInterceptor {
    intercept(request: HttpRequest<any>, next: HttpHandler){
        return next.handle(request);
    }
}

Attach extra header for authorization, So interceptors comes in.

---------------(/opt/lampp/htdocs/angtest/src/app/http-interceptors/index.ts)-----------------
import { HTTP_INTERCEPTORS } from '@angular/common/http';
import { AuthHeaderInterceptor } from './auth-header-interceptor';

export const httpInterceptProviders = [
    { provide: HTTP_INTERCEPTORS, useClass: AuthHeaderInterceptor, multi: true }
];


--------(/opt/lampp/htdocs/angtest/src/app/http-interceptors/auth-header-interceptor.ts)-------------
import { Injectable } from '@angular/core';
import { HttpInterceptor, HttpRequest, HttpHandler } from '@angular/common/http';

@Injectable()

export class AuthHeaderInterceptor implements HttpInterceptor {

    intercept(request: HttpRequest<any>, next: HttpHandler){
        console.log('Auth Intercept Provider'); 
        console.log(request.url);  
        const authToken = "My Auth Token";
        const authReq = request.clone({
            setHeaders: { Authorization: authToken }
        }); 
        //return next.handle(request);
        return next.handle(authReq);
    }

}

----------------(/opt/lampp/htdocs/angtest/src/app/test.service.ts)-------------
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class TestService {

  constructor(private http: HttpClient) { }

  fetch(){
    return this.http.get("https://jsonplaceholder.typicode.com/todos/1");
  }
}


-----------------(/opt/lampp/htdocs/angtest/src/app/app.component.html)-------------------
<button (click)="fetch()">Fetch</button>

<router-outlet></router-outlet>


-------------------(/opt/lampp/htdocs/angtest/src/app/app.component.ts)---------------------
import { Component } from '@angular/core';
import { TestService } from './test.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'HttpInterceptDemo';

  constructor(private testService:TestService){}

  fetch(){
    this.testService.fetch().subscribe(data => console.log(data));
  }
}


------------------(/opt/lampp/htdocs/angtest/src/app/app.module.ts)--------------------
import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HttpClientModule } from '@angular/common/http';
import { httpInterceptProviders } from './http-interceptors';

@NgModule({
  declarations: [
    AppComponent
  ],
  imports: [
    BrowserModule,
    HttpClientModule,
    AppRoutingModule
  ],
  providers: [httpInterceptProviders],
  bootstrap: [AppComponent]
})
export class AppModule { }

=============================================================================

# Example 2.
--------------------(app.service.ts)------------------
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class AppService {

  constructor(private http: HttpClient) { }

  getAllPosts(){
    return this.http.get("https://jsonplaceholder.typicode.com/posts");
  }
}

--------------------(app.component.ts)------------------
import { Component } from '@angular/core';
import { AppService } from './app.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'HttpInterceptDemo';

  constructor(private appService:AppService){}

  ngOnInit(){
    this.appService.getAllPosts().subscribe(data => console.log(data));
  }
}



=============================================================

# Example 3.
?>

HttpBackend 
<?php 

?>

AOT(Ahead-Of-Time) VS JIT(Just-in-Time) Compilation
<?php 
An Angular application consists mainly of components and their HTML templates. Because the components and templates provided by Angular cannot be understood by the browser directly, Angular applications require a compilation process before they can run in a browser.

The Angular Ahead-of-Time (AOT) compiler converts your Angular HTML and TypeScript code into efficient JavaScript code during the build phase before the browser downloads and runs that code. Compiling your application during the build process provides a faster rendering in the browser.

This guide explains how to specify metadata and apply available compiler options to compile your applications efficiently using the AOT compiler.

Angular offers two ways to compile your application:

> Just-in-Time (JIT), which compiles your app in the browser at runtime.
> Ahead-of-Time (AOT), which compiles your app at build time.

JIT compilation is the default when you run the ng build (build only) or ng serve (build and serve locally) CLI commands:


ng build
ng serve
For AOT compilation, include the --aot option with the ng build or ng serve command:

ng build --aot
ng serve --aot

# Why compile with AOT?
Faster rendering

With AOT, the browser downloads a pre-compiled version of the application. The browser loads executable code so it can render the application immediately, without waiting to compile the app first.

Fewer asynchronous requests

The compiler inlines external HTML templates and CSS style sheets within the application JavaScript, eliminating separate ajax requests for those source files.

Smaller Angular framework download size

There`s no need to download the Angular compiler if the app is already compiled. The compiler is roughly half of Angular itself, so omitting it dramatically reduces the application payload.

Detect template errors earlier

The AOT compiler detects and reports template binding errors during the build step before users can see them.

Better security

AOT compiles HTML templates and components into JavaScript files long before they are served to the client. With no templates to read and no risky client-side HTML or JavaScript evaluation, there are fewer opportunities for injection attacks.

(AoT Compilation is the process of compiling components and their HTML templates during a build process, so that the application, its components and their templates are converted to executable JavaScript code before the browser renders them.The AoT compilation is done by the Angular compiler.)
?>

************************************************************************************************
<a routerLink="./" routerLinkActive="active" [routerLinkActiveOptions]="{ exact: true }">Dashboard</a>
<a routerLink="./blogs" routerLinkActive="active">Blogs</a>
<a [routerLink]="['/login']">Logout</a>
************************************************************************************************
=================================================================================================
~Lazy Loading
<?php 
In Lazy loading only that module or component is loaded which is required on that point of time, this makes an application very fast and economic on memory consumption factors.
Lazy loading helps us to download the web pages in chunks instead of downloading everything in a big bundle.
To implement the Lazy Loading in Angular we need to create a routing module and a module.ts file for the component we need to lazy load.

- Lazy loading helps decrease load time (faster download speeds).
- Modules are loaded on demand.
- Modules are loaded when the user navigates to their routes.
- Lazy loading decreases resources consumption (lower resource costs).
- Lazy loading doesn’t load everything once, it loads only what the user expects to see first.

Lazy loading may prove helpful when the application grows and have a number of components, this design makes application loading fast.

https://www.techiediaries.com/angular-routing-lazy-loading-loadchildren/
https://dev.to/saigowthamr/how-to-implement-lazy--loading-in-angular-6-3ple
https://medium.com/@thiago.reis/how-to-implement-lazy-loading-in-angular-c8dcbf165561
https://alligator.io/angular/lazy-loading/
http://www.advancesharp.com/blog/1233/angular-6-lazy-loading-with-demo
https://angularfirebase.com/lessons/how-to-lazy-load-components-in-angular-4-in-three-steps/
https://blog.angular-university.io/angular2-ngmodule/
https://www.freakyjolly.com/angular-6-lazy-loading-example/		-------------------(Good Example)
 

# Example 1

(app.module.ts)

import { AppComponent } from './app.component';
import { HomeComponent } from './home/home.component';

------------------------------------------------------------------
(app-routing.module.ts)
import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { HomeComponent } from './home/home.component';

const routes: Routes = [
  {path: '', redirectTo: 'home', pathMatch: 'full'},
  {path: 'home', component: HomeComponent},
  {path: 'lazy', loadChildren: './lazy/lazy.module#LazyModule'}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

-------------------------------------------------------
(app.component.html)
<nav >
  <a routerLink="home">Home Component</a>
  <a routerLink="lazy" >Lazy Module</a>
</nav>
<div id="content">
  <router-outlet></router-outlet>
</div>
---------------------------------------------------------------
(app/lazy/lazy-routing.module.ts)
import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { SobreComponent } from './sobre/sobre.component';

const routes: Routes = [
  {path: '', component: SobreComponent}
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class LazyRoutingModule { }
---------------------------------------------------------

(app/lazy/lazy.module.ts)
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { LazyRoutingModule } from './lazy-routing.module';
import { SobreComponent } from './sobre/sobre.component';

@NgModule({
  imports: [
    CommonModule,
    LazyRoutingModule
  ],
  declarations: [SobreComponent]
})
export class LazyModule { }

=====================================================================================
# Example 2
=> ng g module admin --flat --routing
=> ng g module user --flat --routing

=> ng g c home --module app

-----------(app-routing.module.ts)-------------
import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { HomeComponent } from './home/home.component';

const routes: Routes = [
  { 
    path: '',
	component: HomeComponent
  },
  { 
    path: 'admin',
	loadChildren: './admin/admin.module#AdminModule'
  },
  { 
    path: 'user',
	loadChildren: './user/user.module#UserModule'
  },
  {path: '**', redirectTo: '/', pathMatch: 'full'}
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }


=> ng g c user --module user
=> ng g c login --module user
=> ng g c register --module user
=> ng g c profile --module user

-----------(user-routing.module.ts)-------------


import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { UserComponent } from './user.component';
import { LoginComponent } from './login/login.component';
import { RegisterComponent } from './register/register.component';
import { ProfileComponent } from './profile/profile.component';

const routes: Routes = [
  { 
    path: '',
	component: UserComponent,
	children: [
      {
		  path: 'login',
		  component: LoginComponent
	  },
	  {
		  path: 'register',
		  component: RegisterComponent
	  },
	  {
		  path: 'profile',
		  component: ProfileComponent
	  },
  },
  
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class UserRoutingModule { }



=> ng g c admin --module admin
=> ng g c dashboard --module admin
=> ng g c settings --module admin
=> ng g c mange-user --module admin

-----------(admin-routing.module.ts)-------------

import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { AdminComponent } from './admin/admin.component';
import { DashboardComponent } from './dashboard/dashboard.component';
import { SettingsComponent } from './settings/settings.component';
import { ManageUsersComponent } from './manage-users/manage-users.component';

const routes: Routes = [
  { 
    path: '',
	component: AdminComponent,
	children: [
      {
		  path: 'dashboard',
		  component: DashboardComponent
	  },
	  {
		  path: 'settings',
		  component: SettingsComponent
	  },
	  {
		  path: 'manage',
		  component: ManageUsersComponent
	  },
  },
  
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class AdminRoutingModule { }


-------------(app.component.html)---------------
<ul>
	<li><a routerLink="/">Home</a></li>
	<li><a routerLink="/user">User</a></li>
	<li><a routerLink="/user/login">Login</a></li>
	<li><a routerLink="/user/register">Register</a></li>
	<li><a routerLink="/user/profile">Profile</a></li>
	<hr/>
	<li><a routerLink="/admin">Admin</a></li>
	<li><a routerLink="/admin/dashboard">Dashboard</a></li>
	<li><a routerLink="/admin/settings">Settings</a></li>
	<li><a routerLink="/admin/manage">Manage Users</a></li>
</ul>
<hr/>
<router-outlet></router-outlet>
============================================================================

?>
RxJS 5  
<?php 
import { Observable } from 'rxjs/Observable';
import { Subject } from 'rxjs/Subject';
?>

RxJS 6
<?php
import { Observable, Subject } from 'rxjs';
?>

==========================================================================
Angular Bootstrap Process step by step
<?php 
main.ts is the main entry point of application.
?>

===========================================================================

<?php 
To deal with asyncronous data we either use promises or observable.
?>

===========================================================================

=> npm install -g json-server

==========================================================================
(services.component.ts)
<?php 
public data;
public showBiodata = [];

constructor( private biodataService: BioDataService){  }

ngOnInit(){
	this.biodataService.bioData().subscribe(data => this.showBiodata = data);
}
?>

(bio-data.service.ts)
<?php 
@Injectable()
export class BioDataService{
	constructor(private http: HttpClient){}
	
	bioData():Observable<IBiodatas[]>{
		return this.http.get<IBiodatas[]>('https://jsonplaceholder.typicode')
	}
	
}
?>
======================================================================================================
Pagination
<?php 
https://www.javacodegeeks.com/2019/04/angular-pagination-example.html
https://ciphertrick.com/search-sort-pagination-angular/
https://code-maze.com/angular-material-table/
https://stackoverflow.com/questions/40528329/searching-sorting-and-pagination-in-angularjs-2-using-angular-cli
?>

======================================================================================================


~Angular dev build vs prod build
<?php
To generate the development build we use "ng build --dev" and for production we use "ng build --prod"

> By default a Dev Build produce Source Maps Where as a Prod Build does not

> To generate a Dev Build without source map
ng build --dev -sm false

> To generate the Prod Build with source maps
ng build --prod -sm true

> Extracts CSS:
With the Dev Build by default global styles are extracted to .js files where as with Prod Build they are extracted to .css files
To change this default behavior, To generate a Dev Build with global styles extracted to .css files instead of .js ones
ng build --dev -ec true 

> Minification AND Uglification:
A Prod Build is minified and uglified where as a Dev Build not.
Minification => is the process of removing of excess whitespace, comments and option tokens like curly brackets and semicolons.
Uglification => is the process of trnasforming code to use short variable and function name.

We use both the technic to reduce bundle sizes.

> Tree Shaking : A Prod build is Tree Shaked , Where as Dev Build is not.
Tree Shaking => is the process of removing any code that we are not actually using in our application from the final bundle.

> AOT(Ahead of time) Compilation:  With the Prod Build we get AOT comilation, i.e. the angular component templates are pre-compiled, where as with a development build they are not. 
?>
========================================================================================================
Material
<?php 
# To install angular material
ng add @angular/material

# app.module.ts
The app.module.ts is like the Central Processor unit of an angular application. All the components, modules, services, filters and libraries all link to it.
?>

https://www.encodedna.com/angular/autocomplete-textbox-in-angular-6-using-web-api.htm
https://codinglatte.com/posts/angular/ng-material-autocomplete-http-lookup/

https://dzone.com/articles/how-to-create-a-multi-field-data-filters-innbspang-1
https://angularfirebase.com/lessons/multi-property-data-filtering-with-firebase-and-angular-4/

https://www.dotnetcurry.com/angularjs/1438/http-client-angular

https://www.techiediaries.com/angular-httpclient/

https://medium.com/@webteamu/angular-4-third-party-apis-50ad4d18fe2b

https://www.djamware.com/post/5b87894280aca74669894414/angular-6-httpclient-consume-restful-api-example  ----------(good)
https://codingthesmartway.com/angular-4-3-httpclient-accessing-rest-web-services-with-angular/  ------------(good)
========================================================================================================
Employee Management System
<?php 
https://overflowjs.com/posts/Angular-8-Understanding-Directory-Structure-and-Creating-CRUD-App

?>



ng-template
custom directive




http://www.eduforbetterment.com/sharing-data-with-a-service-in-angular/   ------------(Good)

http://www.mukeshkumar.net/articles/angular5/share-data-between-sibling-components-in-angular-5-using-rxjs-behaviorsubject


https://www.9lessons.info/2019/05/angular-routing-with-lazy-loading.html?utm_source=feedburner&utm_medium=email&utm_campaign=Feed%3A+9lesson+%289lessons%29
------------(Good)

=======================================================================================

# Admin
Create your first website using angular 6 -- Part 10 -- User Dashboard Module
https://www.youtube.com/watch?v=lYd_z1fvM20
https://github.com/admister/angular-6-website/tree/master/src/app/pricing


========================================================================================

<?php 
=> npm install bootsrap --save
?>

=============================================================================================

~Angular reactive forms edit example
<?php 

-------------------(list-employees.component.html)---------------
<tbody>
	<tr *ngFor = "let employee of employees">
		<td><button (click)="editButtonClick(employee.id)">Edit</button></td>
	</tr>
</tbody>

-------------------(list-employees.component.ts)---------------
import { Router } from '@angular/router';
import {EmployeeService} from './employee.service';

export class ListEmployeesComponent implements OnInit{
	
	constructor (private _employeeService: EmployeeService,private _router: Router){}
	
	editButtonClick(employeeId: number){
		this._router.navigate(['/edit',employeeId]);
	}

}

-------------------(create-employees.component.ts)---------------
import { ActivatedRoute } from '@angular/router';
import {EmployeeService} from './employee.service';
import {IEmployee} from './employee';
import {ISkill} from './ISkill';

export class CreateEmployeesComponent implements OnInit{
	
	constructor (private fb: FormBuilder,private route: ActivatedRoute, private employeeService: EmployeeService){}
	
	ngOnInit(){
		this.route.paramMap.subscribe(params => {
			const empId = +params.get('id');
			if(empId){
				this.getEmployee(empId);
			}
		})
	}
	
	getEmployee(id: number){
		this.employeeService.getEmployee(id).subscribe();
	}
	
}

-------------------(employee.service.ts)---------------

getEmployee(id: number): Observable<IEmployee>{
	return this.httpClient.get<IEmployee>(`${this.baseUrl}/${id}`)
		.pipe(catchError(this.handleError));
}

private handleError(errorResponse: HttpErrorResponse){
	if(errorResponse.error instanceof ErrorEvent){
		console.error('Client Side Error: ', errorResponse.error.message);
	}else{
		console.error('Server Side Error: ', errorResponse);
	}
	
	return throwError('There is a problem with the service. We are notified & working on it.')
}

?>

=========================================================================
~Async Pipe
<?php

Angular AsyncPipe subscribes to Observable and returns the emitted data. For example. Let`s suppose we have this method:

getItems(): Observable {
  this.items$ = this.httpClient.get(this.itemUrl);
}
The items$ variable is of type Observable`.



 we can use the async pipe in the component template to subscribe to the returned Observable:


https://www.youtube.com/watch?v=ZjPhSvhABNY

So normally to render the result of a promise or an observable. We have to:
1) Wait for a callback
2) Store the result in the variable
3) Bind to that variable in the template.

But with async pipe we can use promises and observable directly in our template without having to store result on an intermidate property or variable.

By using async pipe we don’t need to perform subscribe function we don’t need to store any intermidate data our component.
async pipe will keep a track whether the observable is nedded any more. and automatically unsubscibe.

- async pipe makes rendering data from observables and promises easier.
- For promises automatically calls then.
- For observable automatically calls subscribe and unsubscibe.

# Example : Without Async Pipe (Promises)
Class AsyncPipeComponent {
	promiseData: string; //local variable 
	
	construction(){
		this.getPromise().then(v => this.promiseData =v);
	}
	
	getPromise(){
		return new Promise((resolve, reject) => {
			setTimeout(() => resolve("Promise Complete!"),3000);
		}) 
	}
	
}

<p>{{promiseData}}</p>

# Example : With Async Pipe - Bind to promise directly (Promises)
Class AsyncPipeComponent {
	promise: promise<string>; //Ref to the promise itself
	
	construction(){
		this.promise = this.getPromise();		//Don`t subscribe then handler. Store the promise in our promise property
	}
	
	getPromise(){
		return new Promise((resolve, reject) => {						//Return promise
			setTimeout(() => resolve("Promise Complete!"),3000);
		}) 
	}
	
}

<p>{{ promise | async }}</p>

# Example : Without Async Pipe (Observable)
import {NgModule, Component, OnDestroy} from '@angular/core';
import {Observable} from 'rxjs/Rx';

Class AsyncPipeComponent implements OnDestroy{
	
	observableData: number;
	subscription: Object = null; //Holds observable subscription itself
	
	construction(){
		this.subscribeObservsle();
	}
	
	subscribeObservsle(){
		this.subscription = this.getObservable().subscribe(v => this.observableData = v);
	}
	
	getObservable(){
		return Observable.interval(1000).take(10).map((v) => v * v);
	}
	
	ngOnDestroy(){
		if(this.subscription){
			this.subscription.unsubscibe();
		}
	}
	
}

<p>{{observableData}}</p>

# Example : With Async Pipe (Observable)

import {NgModule, Component, OnDestroy} from '@angular/core';
import {Observable} from 'rxjs/Rx';

Class AsyncPipeComponent implements OnDestroy{
	
	observable: Observable<number>;
	
	construction(){
		this.observable = this.getObservable();
	}
	
	getObservable(){
		return Observable.interval(1000).take(10).map((v) => v * v);
	}
	
	
}

<p>{{observable | async }}</p>

# Example : With Async Pipe (Observable)

----------------(app.component.ts)----------------
export class AppComponent{
	softBooks:Observable<book[]>;
	constructor( private bookService: BookService ){}
	
	ngOnInit(){
		this.getsoftBooks();
	}
	
	getsoftBooks(){
		this.softBooks = this.bookService.getBooksFromStore();
	}
	
}

----------------(app.component.html)----------------
<ul>
	<li *ngFor = "let bk of softBooks | async"></li>
</ul>

?>

==========================================================================

~Observable map():
<?php 
The map() operator transforms one value to another. It takes given value from the observable stream and applies the provided transforming function to it.
# Example 
favBookName: Observable<string>

getBookName(){
	this.favBookName = this.bookService.getFavBookFromStore(101).map(book => book.name);
}
?>








































































































<?php 
# bootstrap-modal  NgbModule 
https://www.npmjs.com/package/ng6-bootstrap-modal

https://ng-bootstrap.github.io/#/components/modal/examples
https://stackblitz.com/angular/brrobnxnooox?file=app%2Fmodal-basic.ts
https://itnext.io/creating-forms-inside-modals-with-ng-bootstrap-221e4f1f5648
-----------------------------------------------------------------------------------------------------------
Angular 5 - Login and Logout with Web API using Token Based Authentication
https://www.youtube.com/watch?v=e8BlURn6SFk
https://github.com/CodAffection/Angular-5-Login-and-Logout-in-Web-API-Using-Token-Based-Authentication

-------------------------------------------------------------------------------
# Stripe
https://blog.mgechev.com/2016/07/05/using-stripe-payment-with-angular-2/




admin

https://codecanyon.net/item/ekattor-school-management-system-pro/6087521?s_rank=5




---------------------------------------------------------------------------------






















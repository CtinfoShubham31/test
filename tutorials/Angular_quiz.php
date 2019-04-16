*******************************************************************************

https://www.truecodex.com/course/angular-project-training/service-and-http-client-for-create-static-pages-angular
*******************************************************************************

TypeScript
<?php
TypeScript Code is converted into Plain JavaScript Code

TypeScript is an object-oriented programming language developed and maintained by Microsoft. It is a superset of JavaScript and contains all of its elements.

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
- Using TypeScript classes and interfaces makes the code more concise and easy to read and write
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


Routing
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



Child Routes
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


Angular Forms
<?php 
a.) Template driven form
b.) Model-driven form(Reactive forms)

# Template driven form
These are called Template driven form as everything that we r going to use in an application is defined into the template that we r defining along with component.

Prerequisite:
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

Observables
<?php
observables to handle HTTP requests
Observables help you manage asynchronous data, such as data coming from a backend service.To use observables, Angular uses a third-party library called Reactive Extensions (RxJS). Observables are a proposed feature for ES 2016, the next version of JavaScript.

To deal with data asynchronously use Observables

# Difference between Promises and Observables:
(1) Promises emits single value
Observables emits multiple value over a period of time

(2) Promises cannot be cancel
Observables can be cancelled by using the unsubscibe() method

?>

Component Communication
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
Child component exposes an event emitter property with which emit event when something happening. and parent bind to event property and reacts to those events. So thit event emitter nothing it is an output property.
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

Two way data binding:
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

Difference between angular js and angular2
<?php
Angular 2 is not an upgrade of Angular 1 but it is completely rewritten.
Angular 2 uses TypeScript which is a superset of JavaScript
Angular 1.x was not built with mobile support in mind, where Angular 2 is mobile-oriented.
Angular 2 is entirely component based. Controllers and $scope are no longer used. 

?>

Angular component life cycle hooks
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

Create a Custom Attribute Directive
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
# Angular Error Handling:
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

Cascading / Dependent Dropdown List (Country/State/City)
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

Angular - Http vs HttpClient
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

Map
<?php
Map’s job is to transform things
?>

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

Observable and map
<?php 

?>

Router Guards 
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
?>

ActivatedRouteSnapshot
<?php 

?>

RouterStateSnapshot
<?php 

?>


Using Observable with AsyncPipe
<?php 
Angular AsyncPipe subscribes to Observable and returns the emitted data. For example. Let`s suppose we have this method:

getItems(): Observable {
  this.items$ = this.httpClient.get(this.itemUrl);
}
The items$ variable is of type Observable`.

After calling the getItems() method on the component we can use the async pipe in the component template to subscribe to the returned Observable:
?>

[innerHTML]
<?php 
<div class="blog-desc" [innerHTML]="blog.description"></div>
?>

AuthInterceptor
<?php 

?>

HttpBackend 
<?php 

?>

************************************************************************************************
<a routerLink="./" routerLinkActive="active" [routerLinkActiveOptions]="{ exact: true }">Dashboard</a>
<a routerLink="./blogs" routerLinkActive="active">Blogs</a>
<a [routerLink]="['/login']">Logout</a>
************************************************************************************************


Angular dev build vs prod build
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

ng-template
custom directive




http://www.eduforbetterment.com/sharing-data-with-a-service-in-angular/   ------------(Good)

http://www.mukeshkumar.net/articles/angular5/share-data-between-sibling-components-in-angular-5-using-rxjs-behaviorsubject































































































































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










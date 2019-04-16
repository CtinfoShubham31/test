<?php

----------------------------------------------------------------------------------------------------

# Small projects:

https://medium.com/aviabird/10-amazing-open-source-angular-2-x-apps-825fb169dce3
https://github.com/orizens/echoes-player

https://codecanyon.net/item/angular-2-shopping-cart-angular-2-codeigniter-rest-api/19981987


==================================================================================================
Why use angular:

Angular allow to create single page application.
Never see the refresh.

- Give our applications a clean structure.(Easy to understand and easy to maintain)
- Includes a lot of re-usable code.
- Make our applications more testable.

# Application Architecture:

FRONT END(Also called the clients, run on web browser) - HTML, CSS, TypScript, Angular to build the front end. User Interface(UI). What the user sees and intereact it.

BACK END - Web server or multiple webserver in the cloud and it is responsible to storing the data and doing any kind of processing.

Front end or client end talks to the Back end to get and save the data.

# HTTP Services/ APIs
Endpoints that are accessible via the HTTP protocol.

# Check that you have node and npm installed
To check if you have Node.js installed, run this command in your terminal:

node -v   //v10.13.0
To confirm that you have npm installed you can run this command in your terminal:

npm -v	//6.4.1

# npm - use to install third party libraries

# Check angular cli intalles or not
ng --version


......................................
Date : 18nov2018

To generate a new project, using the angular CLI
ng new <specified the name of project>

ng new AngularCrud

if we don't want to test generated file for component
'
ng new AngularCrud --skip-tests true

code .

The Angular CLI installs the necessary Angular npm packages and other dependencies. This can take a few minutes.

Angular includes a server, so that you can easily build and serve your app locally.

Go to the workspace folder (my-app).

Launch the server by using the CLI command ng serve, with the --open option.
The ng serve command launches the server, watches your files, and rebuilds the app as you make changes to those files.

The --open (or just -o) option automatically opens your browser to http://localhost:4200/.


All NPM (Node Package Manager) packages contain a file, usually in the project root, called package.json file. package.json contains all the information of your web app.It contains all the metadata{set of data which describes and gives info about all other data}.

dependency section in package.json file lets you keep track of project dependencies.

npm install bootstrap@3 --save  //To Install bootstrap

..............................................

# Angular components

Components are the fundamental building blocks of Angular applications. They display data on the screen, listen for user input, and take action based on that input.

<h1>{{title}}</h1>
The double curly braces are Angular's interpolation binding syntax. This interpolation binding presents the component's title property value inside the HTML header tag.


# Create the heroes component

ng generate component heroes

The CLI creates a new folder, src/app/heroes/, and generates the three files of the HeroesComponent.


# first of all ngOnInit is part of Angular lifecycle, ngOnInit is happening after the constructor is ready and ngOnChnages and get fired after the component is ready for us.

sample code for you to look, see how we get use of ngOnInit and constructor in the code below:

import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';


@Component({
 selector: 'my-app',
 template: `<h1>App is running!</h1>
  <my-app-main [data]=data></<my-app-main>`,
  styles: ['h1 { font-weight: normal; }']
})
class ExampleComponent implements OnInit {
  constructor(private router: Router) {} //Dependency injection in the constructor

  // ngOnInit, get called after Component initialised! 
  ngOnInit() {
    console.log('Component initialised!');
  }
}


The ngOnInit is a lifecycle hook. Angular calls ngOnInit shortly after creating a component. It's a good place to put initialization logic.
'Always export the component class so you can import it elsewhere ... like in the AppModule.

ngOnInit called by Angular when component is initialized
Actual business logic performed ngOnInit method

ngOnInit() called by Angular to indicate that Angular is done with initializing the component.
To use ngOnInit() we have to import OnInit from @angular/core (Actually it is not required but as a good practice import the OnInit)
Whenever you create a new component using angular-cli ngOnInit being added by default.

Go through the sample example:

import { Component, OnInit } from '@angular/core';

@Component({
selector:'app-checkbox',
templateUrl:'./checkbox.component.html',
styleUrls: ['./checkbox.component.css']
})

export class CheckboxComponent implements OnInit {
constructor() {
console.log('Called Constructor');
}

ngOnInit() {
console.log('Called ngOnInit method');
}

}



https://adrianmejia.com/blog/2016/10/01/angular-2-tutorial-create-a-crud-app-with-angular-cli-and-typescript/
https://phpenthusiast.com/blog/develop-angular-php-app-getting-the-list-of-items



What's New in Angular 5
Angular 5 applications are faster, lighter, and easy to use. They have material design capabilities to build beautiful and intuitive UIs. A new HttpClientModule was introduced which is a complete rewrite of the existing HttpModule. It now supports TypeScript 2.4.


------------------------------------------------------------------

import 'rxjs/add/operator/map'

Or more generally:

import 'rxjs/Rx';

Notice: For versions of RxJS 6.x.x and above, you will have to use pipeable operators as shown in the code snippet below:

import { map } from 'rxjs/operators';
import { HttpClient } from '@angular/common/http';

// ...
export class MyComponent {
  constructor(private http: HttpClient) { }
  getItems() {
    this.http.get('https://example.com/api/items').pipe(map(data => {})).subscribe(result => {
      console.log(result);
    });
  }
}

-------------------------------------------------------------------------------------------------------

Date: 23jan2019

https://www.youtube.com/watch?v=GBRUYiYp0xs
https://www.youtube.com/watch?v=SuZa2nv24HE

https://www.youtube.com/watch?v=RmNzg9FXa6A&list=PL_qizAfcpJ-MgW3dR97jFSCA3zJsDhwUa﻿
The main motive of angular 5 is to smaller code and faster to use . It's javascript framework.


ng serve, means going to create server.


Speed and perfprmance, bcoz it's componenet based.
Smaller application
Modular application , Code resubility approach.
Cross-platform(Web, Mobile and Desktop)


Node js is open source, cross platform javascript runtime environment.
npm is a node js package manager for javascript programming language.
Angulat cli is tool that allow us to create a project, build and run it development server directly using command line.

angular-cli.json => it configure the application name.
main.ts main entry point

package.json => which of this module we add in our application, it will also add in package.json file.


Modules
Decorators
Components
Templates
Directives
Data binding
Pipes
Routing
Input and Output
Services and dependency injection



app.module.ts, is the default module


https://www.youtube.com/watch?v=Syj-TrB250Y

# Interpolation {{}} : Use only when component property is string.

# Property Binding [] :

# Event Binding ()

Example:

pageTitle:string = 'Data binding in Angular';
imageUrl:string = 'assets/header.png';
btnStatus:boolean = true;

changeTitle(){
	this.pageTitle = "Data Binding";
}


<h1>{{pageTitle}}</h1>
<img src = {{imageUrl}} />
<button disabled={{btnStatus}} >Click</button>

<h1>Property Binding</h1>
<img [src] = "imageUrl" />
<button [disabled]="btnStatus" >Click</button>

<button (click)="changeTitle()">Change Title</button>

<input type="text" [(ngModel)]="username" />
<h4>{{username}}</h4>


# Two way data binding [()]:
Two way data binding uses the ngModel directive, which is included in FormModule. Two way data binding represtented by 
[(ngModel)].

(bindingtwoway.component.ts)
@Component({
	selector:'app-bindingtwoway',
	template:`
	<p>
	Binding Two Way Works!
	</p>
	<input [(ngModel)]="title"/>
	<p>{{title}}</p>
	`,
	styles:[]
})

export class BindingtwowayComponent implements OnInit{
	title:string='';
	
	constructor(){
	}

	ngOnInit(){
	}	
}


# Template driven form :

For use template driven form, we need to import (FormsModule) in our "app.module.ts" file.It enable template driven form. 

app.module.ts

import {FormModule} from '@angular/forms';

app.component.ts

export class Appcomponent{
	user = {
		firstName:'',
		lastName:'',
		language:''
	};
	
	constructor()
	{
		
	}
	
	onSubmit = function(user){
		console.log(user);
	}
}

app.component.html

<form #userForm = "ngForm" (ngSubmit) = "onSubmit(userForm.value)">
	<input type="text" name="firstName" [(ngModel)] = "user.firstName">
</form>

							OR
							
							
Create new model

(user.ts)

export class User{
	id: number;
	email: string;
	/*Both the passwords r in single object*/
	password:{
		pwd:string;
		confirmpwd:string;
	};
	gender:string;
	terms:boolean;
	
	constructor(values:Object={}){
		Object.assign(this.values);
	}
}	

(templatedrivenform.component.ts)
import {Component, OnInit} from '@angular/core';
import {User} from '../user';


@Component({
	selector:'app-templatedrivenform',
	templateUrl:'./templatedrivenform.component.html',
	styleUrls:'./templatedrivenform.component.css'
})

export class TemplatedrivenformComponent implements OnInit{
	user: User;
	gender:any[];
	
	constructor(){
		this.gender = ['Male','Female','Others'];
		this.user = new User(values:{
			email:'',
			password:{pwd:'',confirmpwd:''},
			gender:this.gender[0],
			terms:false
		});
	}

	ngOnInit(){
	}		
}


(templatedrivenform.component.html)
<form (ngSubmit) = "onFormSubmit(signupForm)" #signupForm="ngForm">
	<input type="text" [ngModel] = "user.email" name="email"
</form>

https://dzone.com/articles/building-angular5-application-step-by-step
https://phpenthusiast.com/blog/develop-angular-php-app-getting-the-list-of-items


------------------------------------------

# *ngIf

(app.component.html)

<div>
	<input type="radio" name="rad1" (click)="changeValue(true)">True
	<input type="radio" name="rad1" (click)="changeValue(false)">False
</div>

<div *ngIf="isValid">
	<b>Data is valid.</b>
</div>
<div *ngIf="!isValid">
	<b>Data is not valid.</b>
</div>

(app.component.ts)
export class AppComponent {
	title = 'myyy-app';
	isValid:boolean=true;

	changeValue(Valid:boolean){
		this.isValid = Valid;
	}

}

# *ngIf with else

<div>
	<input type="radio" name="rad1" (click)="changeValue(true)">True
	<input type="radio" name="rad1" (click)="changeValue(false)">False
</div>

<div *ngIf="isValid; else elseblock">
	<b>Data is valid.</b>
</div>


<ng-template #elseblock>
<div>
	<b>Data is not valid.</b>
</div>
</ng-template>

# *ngIf else with then

<div>
	<input type="radio" name="rad1" (click)="changeValue(true)">True
	<input type="radio" name="rad1" (click)="changeValue(false)">False
</div>

<div *ngIf="isValid; then thenblock; else elseblock">

</div>
<ng-template #thenblock>
	<div><b>Data is validd.</b></div>
</ng-template>

<ng-template #elseblock>
<div>
	<b>Data is not validdd.</b>
</div>
</ng-template>


# ngSwitch
(app.component.html)
<select (change) = "setValue($event)">
  <option value="">Select</option>
  <option value="one">one</option>
  <option value="two">two</option>
  <option value="three">three</option>
  <option value="another">another</option>
</select>
<div [ngSwitch]="choice">
  <h3 *ngSwitchCase="'one'">First</h3>
  <h3 *ngSwitchCase="'two'">Second</h3>
  <h3 *ngSwitchCase="'three'">Third</h3>
  <h3 *ngSwitchDefault>Default</h3>
</div>

(app.component.ts)
export class AppComponent {
  public choice='';

  setValue(drpcontrol:any){
    this.choice = drpcontrol.target.value;
  }
}


# ngFor
(app.component.html)
<div>
  <ul>
    <li *ngFor="let person of people">
      {{person.name}}
    </li>
  </ul>
</div>

(app.component.ts)
people:any[]=[
    {
      "name":"Happy"
    },
    {
      "name":"Laugh"
    },
    {
      "name":"Love"
    },
    {
      "name":"Help"
    },
    {
      "name":"God"
    },
    {
      "name":"Positive"
    },
  ];


# ngFor with index
index return our current element poision.
(app.component.html)
<div>
  <ul>
    <li *ngFor="let person of people; let i=index">
      {{i+1}} - {{person.name}}
    </li>
  </ul>
</div>


# ngFor with odd and event
(app.component.html)
<div>
  <ul>
    <li *ngFor="let person of people; let i=index; let ev = even; let od = odd">
      {{i+1}} - {{person.name}} - {{ev}} - {{od}}
    </li>
  </ul>
</div>

# ngFor with first and last
(app.component.html)
<div>
  <ul>
    <li *ngFor="let person of people; let i=index; let ev = even; let od = odd; let f = first; let l = last">
      {{i+1}} - {{person.name}} - {{ev}} - {{od}} - {{f}} - {{l}}
    </li>
  </ul>
</div>


# ngFor with TrackBy 
TrackBy use when purformance issue come. it identify which data is old one and which data is new one.

(app.component.TS)
students:any[];

  constructor(){
    this.students=[
      {
        studentID:1,
        studentName:'Shubham',
        gender:'Male',
        age:30,
        course:'BE'
      },
      {
        studentID:2,
        studentName:'Shivam',
        gender:'Male',
        age:28,
        course:'MCA'
      },
      {
        studentID:3,
        studentName:'Ankita',
        gender:'Female',
        age:25,
        course:'MSC'
      },
      {
        studentID:4,
        studentName:'Karnish',
        gender:'Male',
        age:29,
        course:'BE'
      },
      
    ]
  }

  getStudent():void{
    this.students=[
      {
        studentID:1,
        studentName:'Shubham',
        gender:'Male',
        age:30,
        course:'BE'
      },
      {
        studentID:2,
        studentName:'Shivam',
        gender:'Male',
        age:28,
        course:'MCA'
      },
      {
        studentID:3,
        studentName:'Ankita',
        gender:'Female',
        age:25,
        course:'MSC'
      },
      {
        studentID:4,
        studentName:'Karnish',
        gender:'Male',
        age:29,
        course:'BE'
      },
      {
        studentID:5,
        studentName:'Gaurav',
        gender:'Male',
        age:31,
        course:'BE'
      },
    ]
  }

  trackByStudentID(index:number,employee:any):string{
    return employee.studentID;
  }

(app.component.html)
<table border="1">
  <tr *ngFor="let s of students; let i=index; trackBy:trackByStudentID ">
    <td>{{i}}</td>
    <td>{{s.studentID}}</td>
    <td>{{s.studentName}}</td>
    <td>{{s.gender}}</td>
    <td>{{s.age}}</td>
    <td>{{s.course}}</td>
  </tr>
</table>
<br/>

<button (click) = "getStudent()">Get More Student</button>

# ngFor with grouping:
(app.component.ts)
peoplebyCountry:any[]=[
    {
      'Country':'India',
      'people':[
        {
          "name":"Ankur Jain"
        },
        {
          "name":"Rohit Jain"
        },
        {
          "name":"Sumkit Jain"
        },
        {
          "name":"Rahul Jain"
        },
      ]
    },
    {
      'Country':'USA',
      'people':[
        {
          "name":"Robert Potter"
        },
        {
          "name":"Henery Misty"
        },
        {
          "name":"John Kim"
        },
        {
          "name":"Jack Sparrow"
        },
      ]
    }

  ];

(app.component.html)
<div>
  <ul *ngFor = "let group of peoplebyCountry">
    <li>{{group.Country}}</li>
    <ul>
      <li *ngFor = "let person of group.people">
        {{person.name}}
      </li>
    </ul>
  </ul>
</div>


# ngStyle
(app.component.ts)
people:any[]=[
    {
      "name":"Happy",
      "country":"India" 
    },
    {
      "name":"Laugh",
      "country":"USA"
    },
    {
      "name":"Love",
      "country":"UK"
    },
    {
      "name":"Help",
      "country":"India"
    },
    {
      "name":"God",
      "country":"India"
    },
    {
      "name":"Positive",
      "country":"AUS"
    },
  ];

getColor(country){
    switch(country){
      case 'India':
        return 'green'
      case 'AUS':
        return 'blue'
      case 'UK':
        return 'red'
      case 'USA':
        return 'yellow'
    }

  }

(app.component.html)
<div>
  <ul *ngFor = "let person of people">
    <li [ngStyle]="{'color': getColor(person.country)}">
     {{person.name}} {{person.country}}
    </li>
  </ul>
</div>

		OR

<div>
  <ul *ngFor = "let person of people">
    <li [style.color]="getColor(person.country)">
     {{person.name}} {{person.country}}
    </li>
  </ul>
</div>


# ngClass

(app.component.html)
<p [ngClass]="'one two'">
  Using ngClass with string.
</p>



(app.component.css)
.one{
    color:green;
}
.two{
    font-size: 20px;
}
.three{
    color: red
}
.four{
    font-size: 15px;
}



OR
(app.component.ts)
users = [
    'ABC',
    'DEF',
    'GHI',
    'JKL'
  ]

(app.component.html)
<div *ngFor = "let user of users" [ngClass] = "'one two'">
  {{user}}
</div>

OR
(app.component.html)
<p [ngClass]="['three','two']">
  Using ngClass with string.
</p>


# ngClass as object

(app.component.html)
<p [ngClass]="{'one':true,'three':false}">
  Using ngClass with object
</p>


# ngClass using method in component
(app.component.ts)
getCssClass(flag:string){
      let cssclass;
      if(flag=='nightmode'){
        cssclass={
          'one':true,
          'two':true
        }
      }else{
        cssclass={
          'four':false,
          'two':true
        }
      }
      return cssclass;
  }



(app.component.html)
<div [ngClass]="getCssClass('nightmode')">
  Using ngClass with component method.
</div>


# HostListener()

# Interpolation : {{}}
Interpolation is a technique that allow the user to bind a value to a UI element. It bind the data one-way.Component to view.

# Property Binding:
firstName: string="Rahul";

<span [innerHTML]='firstName'></span>

# Attribut Binding:
colspan:number = 3;
<td [attr.colspan]="colspan">Employee details</td>

bdr:number = 5;
<table [attr.border]="bdr">

# Event Binding:
Event Binding flows or binds the data from an HTML element to a component.
(app.component.html)
<button (click) = "onClick()">Click Me</button>
<button (click) = "alert()">Click</button>

(app.component.ts)
onClick():void{
	console.log('You clicked me!!');
}

alert(){
	alert('Hello');
}

# Two way data binding:
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
data1:string='Shivam';

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
Enter Your <input [(ngModel)] = 'data1'>
Entered values: HI {{data1}}


# Angular Pipe(|):
Pipes takes in a data input and tranforms data to a different output. 	
(app.componenet.ts)
employees:any[]=[
    {
      code:'emp001',name:'Shubham',salary:42000,dateofbirth:'31/05/1988'
    },
    {
      code:'emp002',name:'Shivam',salary:40000,dateofbirth:'29/05/1990'
    },
    {
      code:'emp003',name:'Anshul',salary:55000,dateofbirth:'31/08/1988'
    },
    {
      code:'emp004',name:'Kamal',salary:47000,dateofbirth:'31/05/1991'
    }
  ]


(app.componenet.html)
<table border="2">
  <tr>
    <th>Emp Code</th>
    <th>Emp Name</th>
    <th>Emp Salary</th>
    <th>Emp Dob</th>
  </tr>
  <tr *ngFor = "let emp of employees">
    <td>{{emp.code}}</td>
    <td>{{emp.name | uppercase}}</td>
    <td>{{emp.salary}}</td>
    <td>{{emp.dateofbirth}}</td>
  </tr>
</table>


# Angular Parameterized	Pipe(|):
(app.componenet.ts)
DOB = new Date(1947,8,15);
Salary:number = 42000;

(app.componenet.html)
<div>
  Without Parameter - {{DOB}}<br/>
  Medium: - {{DOB|date:"medium"}}<br/>
  Specific format: - {{DOB|date:"dd/MM/yyyy"}} <br/>
  Mediumtime: - {{DOB|date:"mediumTime"}}<br/>
  Annual Salary:- {{Salary|currency:'USD':true}}
</div>


# Angular chaining(multiple) pipe
Full Date:- {{DOB|date:"fullDate"|uppercase}}

# Pipe more examples
<h3>{{position|uppercase}}:{{name}}</h3>
<h3>Article: {{article|titlecase}}</h3>
<h3>{{article|slice:5}}</h3>
<h3>{{article|slice:5:8}}</h3>

# Pipe-date:
shortDate - It convert the date to short date.
longDate - Provide long date. Provide full month name then day and year.
fullDate

currentdate = new Date();

<h3>{{currentdate}}</h3>
<h3>{{currentdate|date:'shortDate'}}</h3>
<h3>{{currentdate|date:'longDate'}}</h3>
<h3>{{currentdate|date:'fullDate'}}</h3>

# JsonPipe:
Convert a value into json string.

<div>
 {{countries|slice:1:3|json}}
</div>

public countries=[
    {
      "id":1,"country":"India"
    },
    {
      "id":2,"country":"Swiss"
    },
    {
      "id":3,"country":"UK"
    },
    {
      "id":4,"country":"Indonesia"
    },
  ];
  
  
# Custom Pipe:

ng g pipe mypipe --flat

(mypipe.pipe.ts)
import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'mypipe'
})
export class MypipePipe implements PipeTransform {

  transform(value: string, gender:string): string {
    if(gender=='Male'){
      return "Mr. " +value;
    }else{
      return "Miss. "+value;
    }
  }

}

(app.component.html)
<table border="1">
  <tr *ngFor = "let emp of employees">
    <td>{{emp.code}}</td>
    <td>{{emp.name|mypipe:emp.gender}}</td>
    <td>{{emp.salary}}</td>
    <td>{{emp.dateofbirth}}</td>
    <td>{{emp.gender}}</td>
  </tr>
</table>


(app.component.ts)
employees:any[]=[
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

  (app.module.ts)
  import { MypipePipe } from './mypipe.pipe';
  
  @NgModule({
  declarations: [
    AppComponent,
    MypipePipe
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

 
# Routing
Routing is the mechanism used by angular for navigating between page and displaying appropriated component/page on browser.

Router is an official angular routing library.
@angular/router

a) Router Outlet:
It is dynamic component that router uses to display views based on router navigation.
<router-outlet></router-outlet>

b) Router Link:
<a [routerLink]="['/student']">Student</a>


# Routing example:
#1.)
(app.routing.module.ts)
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

(app.module.ts)
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

#2.) Server Side Navigation
(app.component.html)   **Server Side**
<a [routerLink]="['/student']">Student</a>
<a [routerLink]="['/studentdetails']">Student Details</a>
<button (click)="student()">Student Status</button>
<div>
  <router-outlet></router-outlet>
</div>


(app.component.ts)
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

#3.) How to use redirection in routing

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

#4.) Wildcard Route: When no path is matched.
Wildcard route to intercept invalid URLs and handle them gracefully.
{path:'**',component:PageNotFoundComponent}

(app.component.html)
<a [routerLink]="['/pagenot']">Page Not</a>

(app-routing.module.ts)
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


# Child Routes:
(app.component.html)
<a [routerLink]="['/student']">Student</a>
<div>
  <router-outlet></router-outlet>
</div>

(app.routing.module.ts)
import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { StudentComponent } from './student/student.component';
import { StudentdetailsComponent } from './studentdetails/studentdetails.component';
import { PagenotfoundComponent} from './pagenotfound/pagenotfound.component'
import { StudentRegistrationComponent } from './student-registration/student-registration.component';

const routes: Routes = [
  //{path:'',redirectTo:'student',pathMatch:'full'},
  //{path:'student',component:StudentComponent},
  //{path:'studentdetails',component:StudentdetailsComponent},
 // {path:'**',component:PagenotfoundComponent}
 {path:'student',
  children:[
    {path:'',component:StudentComponent},
    {path:'studentdetails',component:StudentdetailsComponent},
    {path:'studentregistration',component:StudentRegistrationComponent},
	{path:'**',component:PagenotfoundComponent}
  ]
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }


(student.component.html)
<p>
  student works!
  <br/>
  <a [routerLink]="['studentdetails']">Student Details</a>
  <a [routerLink]="['studentregistration']">Student Registration</a>
  <a [routerLink]="['pagenot']">Page Not</a>
</p>

# Child Route(set default path)
(app-routing.module.ts)
const routes: Routes = [
  //{path:'',redirectTo:'student',pathMatch:'full'},
  //{path:'student',component:StudentComponent},
  //{path:'studentdetails',component:StudentdetailsComponent},
 // {path:'**',component:PagenotfoundComponent}
 {path:'student',
  children:[
    //{path:'',component:StudentComponent},
    {path:'',redirectTo:'studentdetails',pathMatch:'full'},
    {path:'studentdetails',component:StudentdetailsComponent},
    {path:'studentregistration',component:StudentRegistrationComponent},
    {path:'**',component:PagenotfoundComponent}
  ]
  }
];


# Services:
Services are piece of code that are used to perform a specifc task, a service can contain a value or function or combination of both. Services are injected into application using dependency injection mechanism. Services prevent us from writing the same code at multiple section of our application. The best solution is to write services are inject in application where we need it. Services provide, store, and interact with data, and a communication b/w classes. Service is a mechanism used to share the functionality b/w the component.

Step1: Create service
ng generate service service_name

Step2: Import the Injectable Member
At the top of your new services file, add:
import {injectable} from '@angular/core';

Step3: Add Injectable Decorator
@Injectable()

Step4: Export the service Class
export class ExampleService{
	someMethod(){
		return 'Hey!';
	}
}

Step5: Import the service to your component
Choose the component file and at the top, you must include the service member(line 2 below)

import {Componenet} from '@angular/core';
import {ExampleService} from './example.service';

Step6: Add it as a provider
Now you must add it to the provider array in the Componenet decorator metadata(line 4 below)
@Component({
	selector:'my-app',
	template: '<h1>{{title}}</h1>',
	providers:[ExampleService]
})

Step7: Include it through dependency injection
constructor(private _exampleService:ExampleService){}

Step8: Using the service
Now we can access the services method and properties by referencing the private _exampleService. For example

ngOnInit(){ this.title = this._exampleService.someMethod();}

(app.component.ts)
import { Component , NgModule } from '@angular/core';
import{MyservicenameService} from './myservicename.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css'],
  providers:[MyservicenameService]
})
export class AppComponent {
  title:string;

  constructor(private _service:MyservicenameService){}

  ngOnInit(){
    this.title = this._service.display();
  }


}

(myservicename.service.ts)
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class MyservicenameService {

  constructor() { }

  display(){
    return 'hello';
  }
}


# Dependency Injection:
When module A is an application needs module B to Run, Then Module B is a dependency of module A.
Dependency is an object or service that can be used in any another object.
Injection is a process of passing dependency to a dependent object.

Dependency Injection happed in two level app(Globally) level and component level.

The Dependency that we are injectineg in a constructor is an object of the class that we want to use.
(myservicename.service.ts)
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class MyservicenameService {
  dept:any[];
  constructor() { 
    this.dept=[
      {id:1,name:'Account'},
      {id:2,name:'Admin'},
      {id:3,name:'Staff'},
    ]
  }

  display(){
    return 'hello';
  }
}

(app.component.html)
<div>
  <table>
    <tr *ngFor = "let obj of deptobj">
      <td>{{obj.id}}</td>
      <td>{{obj.name}}</td>
    </tr>
  </table>
</div>


(app.component.ts)
export class AppComponent {
  title:string;
  deptobj:any[];

  constructor(private _service:MyservicenameService){}

  ngOnInit(){
    //this.title = this._service.display();
    this.deptobj = this._service.dept;
  }

  
}


# Bootstraping
npm install bootstrap --save

(angular.json)
"styles": [
  "src/styles.css",
  "node_modules/bootstrap/dist/css/bootstrap.min.css"
],

(app.component.html)
<button class="btn btn-primary">Check Bootstrap</button>


# Angular Forms
a.) Template driven form
b.) Model-driven form(Reactive forms)

a.) Template driven form
These are called Template driven form as everything that we r going to use in an application is defined into the template that we r defining along with component.

Prerequisite:
- We need to import FormsModule in an Application module file(i.e. app.module.ts)

Features:
- Two way data binding (using [(NgModel)] syntax) 
- Minimal component code, 
- Automatic track of the form and its data


b.) Model-driven form(Reactive forms)
In a Model-driven form(Reactive forms) approch, the model which is created in the .ts file is responsible for handling all the user interaction/validations. For this, first, we need to create the Model using Angulars inbuilt classes like formGroup and formControl and then we need to bind that model to the html form.  

Prerequisite:
- We need to import ReactiveFormsModule in an Application module file(i.e. app.module.ts)

Features:
- More flexible, nut needs lot of pracice
- Handle any complex scenarios
- No data binding is done
- More component code and less HTML markup
- Easier unit testing


# Template Driven Form Examples
(app.module.ts)
import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';

@NgModule({
  declarations: [
    AppComponent,
    MypipePipe,
    StudentComponent,
    StudentdetailsComponent,
    PagenotfoundComponent,
    StudentRegistrationComponent
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

(app.component.html)
<div class="container">
  <div class="row">
    <div class="form-bg">
      <form #regForm='ngForm' (ngSubmit)="Register(regForm)">
        <h2 class="text-center">Registration Page</h2>
        <br/>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="First Name" name="firstname" ngModel>
        </div>

        <div class="form-group">
          <input type="text" class="form-control" placeholder="Last Name" name="lastname" ngModel>
        </div>

        <div class="form-group">
          <input type="text" class="form-control" placeholder="Email" name="email" ngModel>
        </div>
        <br/>

        <div class="align-center">
          <button type="submit" class="btn btn-primary" id="Register">Register</button>
        </div>

      </form>
    </div>
  </div>
</div>


(app.component.ts)
  Register(regForm:any){
    debugger;
    var firstname = regForm.controls.firstname.value;
    var lastname = regForm.controls.lastname.value;
    var email = regForm.controls.email.value;
    console.log(regForm);
  }

  
  
  Example2:
  (app.component.html)
  <div class="container">
  <div class="row">
    <div class="form-bg">
      <form #regForm='ngForm' (ngSubmit)="Register(regForm)">
        <h2 class="text-center">Registration Page</h2>
        <br/>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="First Name" name="firstname" required ngModel>
        </div>

        <div class="form-group">
          <input type="text" class="form-control" placeholder="Last Name" name="lastname" required ngModel>
        </div>

        <div class="form-group">
          <input type="text" class="form-control" placeholder="Email" name="email" email required ngModel #email="ngModel">
          <span class="help-bpx" *ngIf="email.touched && !email.valid">Please enter email value</span>
        </div>

        <br/>

        <div class="align-center">
          <button type="submit" class="btn btn-primary" id="Register" [disabled]="!regForm.valid">Register</button>
        </div>

      </form>
    </div>
  </div>
</div>

(app.component.css)
input.ng-invalid.ng-touched{
    border-color: red;
}

# Model-driven form(Reactive form)
In Model-driven form(Reactive form) approach, the model which is created in .ts file is responsible for handling all the user interactions/validation. For this, first we need to create the Model using Angulars inbuilt classes like formGroup and formControl and then we need to bind that model to the HTML form.

There are something that we can not do with template driven form but with model driven form we can perform those things. Like if we want to detect if any change occur in any variable we can do it with model driven form, we can do easily two-way data binding with model driven form and that is very important in large application.

Primarily it is also called "Model Driven Form", because model acts as a mediator b/w component and template.

Prerequisite:
we need to import ReactiveFormsModule in our app.module.ts file.

In app.component.ts file , we need to import three more libraries.
import{FormGroup,FormControl,FormBuilder} from '@angular/forms';

ngOnInit(){
	this.form = new FormGroup({
		firstname: new FormControl("");
		lastname: new FormControl("");
		languages: new FormControl("");
	})
}

a.)FormControl
It tracks the value of controls and validate the individual control in the form.

b.)FormGroup
Tracks the validity and state of the group of FormControl Instance or moreover. we can say the formgroup to be a collection of 	FormControl.
Like: validations, name of input controls.

c.)FormBuilder
This helps us to develop the forms along with their intial value and their validations.

# Reactive Form example 1
(app.comonent.ts)
import { Component , NgModule } from '@angular/core';
import { Router } from '@angular/router';
//import { StudentComponent } from './student/student.component';
import{MyservicenameService} from './myservicename.service';
import{ FormGroup, FormControl, FormBuilder, NgForm} from '@angular/forms';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css'],
  providers:[MyservicenameService]
})


export class AppComponent {
  title:string;
  deptobj:any[];
  signupForm:FormGroup;
  Firstname:string="";
  Lastname:string="";
  Email:string="";
  Password:string="";

  constructor(private formbuilder:FormBuilder){
    this.signupForm = formbuilder.group({
      fname:new FormControl(),
      lname:new FormControl(),
      Emailid:new FormControl(),
      userpassword:new FormControl(),
    })
  }

  ngOnInit(){

  }

  PostData(signupForm:any){ 
    this.Firstname = signupForm.controls.fname.value;
    this.Lastname = signupForm.controls.lname.value;
    this.Email = signupForm.controls.Emailid.value;
    this.Password = signupForm.controls.userpassword.value;

    console.log(this.Firstname);
    console.log(signupForm.controls);
  }
  
}


(app.component.html)
<div class="container">
  <div class="row">
    <div class="form-bg">
      <form [formGroup]='signupForm' (ngSubmit)="PostData(signupForm)">
        <h2 class="text-center">Registration Page</h2>
        <br/>
        <div class="form-group">
          <input type="text" class="form-control" formControlName='fname' placeholder="First Name">
        </div>

        <div class="form-group">
          <input type="text" class="form-control" formControlName='lname' placeholder="Last Name">
        </div>

        <div class="form-group">
          <input type="text" class="form-control" formControlName='Emailid' placeholder="Email">
        </div>

        <div class="form-group">
          <input type="password" class="form-control" formControlName='userpassword' placeholder="Password">
        </div>

        <br/>

        <div class="align-center">
          <input type="submit" value="Post Data">
        </div>

      </form>
    </div>
  </div>
</div>
  

(app.module.ts)
import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import {ReactiveFormsModule} from '@angular/forms';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { MypipePipe } from './mypipe.pipe';
import { StudentComponent } from './student/student.component';
import { StudentdetailsComponent } from './studentdetails/studentdetails.component';
import { PagenotfoundComponent } from './pagenotfound/pagenotfound.component';
import { StudentRegistrationComponent } from './student-registration/student-registration.component';

@NgModule({
  declarations: [
    AppComponent,
    MypipePipe,
    StudentComponent,
    StudentdetailsComponent,
    PagenotfoundComponent,
    StudentRegistrationComponent
  ],
  imports: [
    BrowserModule,
    FormsModule,
    ReactiveFormsModule,
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
 
  
# Observable And Subscribe:
Observable belongs to RxJS library. To perform asynchronous progrmming in Angular application we can use Observable or promise. When we send and receive data over HTTP, we need to deal it asynchronously bcoz fetching data over HTTP may take time. Observable is subscribed by using async pipe or by using subscribe method.

Some methods of Observable class are subscribe, map, mergeMap, switchMap, exhaustMap, debounceTime, of, retry, catch, throw etc.

To use RxJS library in Angular programming we need to ensure that we have installed RxJS. We can ensure it by checking package.json.
npm install rxjs save

To use the Observable in Our Angular Application, we need to import it as following.
import{Observable}from 'rxjs/Observable';

getBooksFromStore():Observable<Book[]>{
	return this.http.get<Book[]>(this.bookUrl
	)
}

getsoftBooks(){
	this.bookService.getBookFromStore().subscribe(books => this.softBooks = books);
}


a.)Angular In-Memory Web API:
To test our apllication we need web service URL. Angular provides In-Memory Web API that will provide web service URL. We can configure dummy URLs with dummy data using In-Memory Web API.

To install In-Memory Web API, run following command.
npm i angular-in-memory-web-api@0.5.3 --save
npm install angular-in-memory-web-api --save

Create a class that will implement InMemoryDbService. Define createDb() method with some dummy data.
import {InMemoryDbService} from 'angular-in-memory-web-api';

export class TestData implements InMemoryDbService{
	createDb(){
		let bookDetails = [
			{id:101,name:'Angular by Sahosoft',category:'Angular'},
			{id:102,name:'.net core by Sahosoft',category:'Java'},
			{id:103,name:'NgRx by Sahosoft',category:'Angular'},
		];
		return {books:bookDetails};
	}
}

create service => ng g service book

npm install rxjs-compat --save

npm install @angular/http

subscribe is a method of Observable class. subscribe is used to invoke Observable to execute and then it emits the result. If We have an Observable variable that fetches data over an HTTP then actal hit to server take place only when we subscibe to Observable using subscribe method or async pipe.

Example:
(app.component.ts)
import { Component , NgModule } from '@angular/core';
import {BookService} from './book.service';
import {Book} from './book'

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css'],
  //providers:[MyservicenameService]
})


export class AppComponent {
  title:string;
  softBooks:Book[];

  constructor(private bookservice:BookService){}

  ngOnInit(){
    this.getsoftBook();
  }

  getsoftBook(){
    console.log('TTT');
    this.bookservice.getBookFromStore().subscribe(books=>this.softBooks=books);
  }

  
}


(app.component.html)
<h1>
  Welcome tos {{title}}
</h1>

<ul>
  <li *ngFor = "let bk of softBooks">
    Id:{{bk.id}}, Name:{{bk.name}}, Category:{{bk.category}}
  </li>
</ul>

<div>
  <router-outlet></router-outlet>
</div>

(testdata.ts)
import {InMemoryDbService} from 'angular-in-memory-web-api';

export class TestData implements InMemoryDbService{
    createDb(){
        let bookDetails = [
			{id:100,name:'Angular by Sahosoft',category:'Angular'},
			{id:101,name:'.net core by Sahosoft',category:'Java'},
			{id:102,name:'NgRx by Sahosoft',category:'Angular'},
		];
		return {books:bookDetails};
    }
} 


(book.service.ts)
import { Injectable } from '@angular/core';
import {HttpClient} from '@angular/common/http'
import {Observable} from 'rxjs/observable'  //npm install rxjs-compat --save
import {Book} from './book'

@Injectable({
  providedIn: 'root'
})
export class BookService {
  bookUrl="/api/books";
  constructor(private http:HttpClient) { }

  getBookFromStore():Observable<Book[]>{
    return this.http.get<Book[]>(this.bookUrl);
  }
}


(book.ts)
export interface Book{
    id:number;
    name:string;
    category:string;
}


(app.module.ts)
import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import {ReactiveFormsModule} from '@angular/forms';
import { AppRoutingModule } from './app-routing.module';

import {HttpClientModule} from '@angular/common/http'

import { AppComponent } from './app.component';
import { MypipePipe } from './mypipe.pipe';
import { StudentComponent } from './student/student.component';
import { StudentdetailsComponent } from './studentdetails/studentdetails.component';
import { PagenotfoundComponent } from './pagenotfound/pagenotfound.component';
import { StudentRegistrationComponent } from './student-registration/student-registration.component';

import {BookService} from './book.service';
import {InMemoryWebApiModule} from 'angular-in-memory-web-api';
import {TestData} from './testdata';

@NgModule({
  declarations: [
    AppComponent,
    MypipePipe,
    StudentComponent,
    StudentdetailsComponent,
    PagenotfoundComponent,
    StudentRegistrationComponent
  ],
  imports: [
    BrowserModule,
    HttpClientModule,
    InMemoryWebApiModule.forRoot(TestData),
    FormsModule,
    ReactiveFormsModule,
    AppRoutingModule
  ],
  providers: [BookService],
  bootstrap: [AppComponent]
})
export class AppModule { }


# Observable + Async Pipe + NgFor  (Without subscribe method)
Angular async pipe subscribe to Observable and returns its last emitted value.

(app.component.ts)
import { Component , NgModule } from '@angular/core';
import {BookService} from './book.service';
import {Book} from './book'
import { Observable } from 'rxjs/Observable';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css'],
})

export class AppComponent {
  title:string;
  softBooks:Observable<Book[]>;

  constructor(private bookservice:BookService){}

  ngOnInit(){
    this.getsoftBook();
  }

  getsoftBook(){
    console.log('TTT');
    //this.bookservice.getBookFromStore().subscribe(books=>this.softBooks=books);
    this.softBooks = this.bookservice.getBookFromStore();
  }

  
}

(app.component.html)
<ul>
  <li *ngFor = "let bk of softBooks | async">
    Id:{{bk.id}}, Name:{{bk.name}}, Category:{{bk.category}}
  </li>
</ul>


# Observable + Async Pipe + NgIf
(app.component.ts)
import { Component , NgModule } from '@angular/core';
import {BookService} from './book.service';
import {Book} from './book'
import { Observable } from 'rxjs/Observable';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css'],
  //providers:[MyservicenameService]
})


export class AppComponent {
  title:string;
  softBooks:Observable<Book>;

  constructor(private bookservice:BookService){}

  ngOnInit(){
    this.getsoftBook();
  }

  getsoftBook(){
    console.log('TTT');
    //this.bookservice.getBookFromStore().subscribe(books=>this.softBooks=books);
    this.softBooks = this.bookservice.getBookFromStore(100);
  }

  
}


(app.component.html)
<div *ngIf = "softBooks|async as bk;else loading">
  Id:{{bk.id}}, Name:{{bk.name}}, Category:{{bk.category}}
</div>

<ng-template #loading>
  <img src="assets/images/ajax-loader.gif">
</ng-template>

(book.service.ts)
import { Injectable } from '@angular/core';
import {HttpClient} from '@angular/common/http'
import {Observable} from 'rxjs/observable'  //npm install rxjs-compat --save
import {Book} from './book'

@Injectable({
  providedIn: 'root'
})
export class BookService {
  bookUrl="/api/books";
  constructor(private http:HttpClient) { }

  getBookFromStore(id:number):Observable<Book>{
    return this.http.get<Book>(this.bookUrl+"/"+id);
  }
}


# Observable map()
Some methods or operator of Observable class
subscribe, map, mergeMap, switchMap, exhaustMap, debounceTime, of, retry, catch, throw etc.

The map() operator transforms one value to another. It takes a given value from the observable stream and applies the provided transforming function to it.

map is a method of Observable class. map applies a given function to the value of its source Observable and then returns result as Observable.

import 'rxjs/add/operator/map';

use map in our Angular Application  

favBookName():Observable<string>

getBookName(){
	this.favBookName = this.bookService.getFavBookFromStore(101).map(book=>book.name);
}

Example:

(app.component.ts)
import { Component , NgModule } from '@angular/core';
import {BookService} from './book.service';
import {Book} from './book'
import { Observable } from 'rxjs/Observable';
import 'rxjs/add/operator/map';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css'],
  //providers:[MyservicenameService]
})


export class AppComponent {
  title:string;
  softBooks:Observable<string>;

  constructor(private bookservice:BookService){}

  ngOnInit(){
    this.getsoftBook();
  }

  getsoftBook(){
    console.log('TTT');
    //this.bookservice.getBookFromStore().subscribe(books=>this.softBooks=books);
    this.softBooks = this.bookservice.getBookFromStore(100).map(book=>'Name:'+book.name);
  }

  
}

(app.component.html)
<div *ngIf = "softBooks|async as bookname">
{{bookname}}
</div>


# Example: Map with subscribe

(app.component.html)
<div *ngIf = "softBooks">
{{softBooks}}
</div>

(app.component.ts)
import { Component , NgModule } from '@angular/core';
import {BookService} from './book.service';
import {Book} from './book'
import { Observable } from 'rxjs/Observable';
import 'rxjs/add/operator/map';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css'],
  //providers:[MyservicenameService]
})


export class AppComponent {
  title:string;
  softBooks:string;

  constructor(private bookservice:BookService){}

  ngOnInit(){
    this.getsoftBook();
  }

  getsoftBook(){
    console.log('TTT');
    //this.bookservice.getBookFromStore().subscribe(books=>this.softBooks=books);
    //this.softBooks = this.bookservice.getBookFromStore(100).map(book=>'Name:'+book.name);
        this.bookservice.getBookFromStore(100).map(book=>book.name).subscribe(name=>{
        this.softBooks = name;
    });
  }

  
}

18601207777

# HttpClient in Angular
HttpClient is performing HTTP requests and response.

- The new HttpClient service is included in the HTTP Client Module that used to initiate HTTP request and responses in angular apps.
- The HttpClientModule is a replacement of HttpModule.
- HttpClient also gives us advanced functionlaity like abilty to listen for progress events and interceptors to modify request and responses.
- Before using the HttpClient, you must need to import the Angular HttpClientModule and HttpClientModule is imported from @angular/common/http.
- You must import HttpClientModule after BrowserModule in your angular apps.

After imported HttpClientModule into the AppModule, you can inject the HttpClient into your created service.

import {Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';

@Injectable()
export class CutomerService{
	//Inject HttpClient into your components or services
	constructor(private httpClient: HttpClient){}
}

HttpClient Perform below HTTP requests - 
1. GET method - get()
2. POST method - post()
3. PUT method - put()
4. DELETE method - delete()
5. HEAD method - head()
6. JSONP method - jsonp()
7. OPTION method - option()
8. PATCH method - patch()


# Difference between HTTP and HttpClient:

# HttpClient get()
	import {HttpClient} from '@angular/common/http';

	//Constructor to inject HttpClient
	constructor(private http:HttpClient){}	

	//ready to call HttpClient methods using http instance
	getWriterWithFavBooks():Observable<any>{
		return this.http.get(this.writeUrl);
	}

	
# HttpClient post()
(app.component.ts)
import { Component , NgModule } from '@angular/core';
//import { Router } from '@angular/router';
//import { StudentComponent } from './student/student.component';
//import{MyservicenameService} from './myservicename.service';
import{ FormGroup, FormControl, FormBuilder, NgForm, Validators} from '@angular/forms';
import {BookService} from './book.service';
import {Book} from './book'
import { Observable } from 'rxjs/Observable';
import 'rxjs/add/operator/map';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css'],
  //providers:[MyservicenameService]
})


export class AppComponent {
  title:string;
  softBooks:string;
  datasaved = false;
  bookForm:FormGroup;
  allbooks:Observable<Book[]>;
  constructor(private formbuilder:FormBuilder, private bookservice:BookService){}

  ngOnInit(){
    this.bookForm = this.formbuilder.group({
      name:['',[Validators.required]],
      category:['',[Validators.required]],
      writer:['',[Validators.required]],
    });    
    this.getsoftBook();
  }

  onFormSubmit(){
    this.datasaved = false;
    let book = this.bookForm.value;
    this.createbooks(book);
    this.bookForm.reset();
  }

  createbooks(book:Book){
    this.bookservice.createBook(book).subscribe(
      book=>{
        this.datasaved = true;
        this.getsoftBook();
      }
    );
  }

  getsoftBook(){
    console.log('TTT');
    //this.bookservice.getBookFromStore().subscribe(books=>this.softBooks=books);
    //this.softBooks = this.bookservice.getBookFromStore(100).map(book=>'Name:'+book.name);
        // this.bookservice.getBookFromStore(100).map(book=>book.name).subscribe(name=>{
        //   this.softBooks = name;
        // });
        this.allbooks = this.bookservice.getBookFromStore();
  }

  
}


(app.component.html)
<h1>
  Welcome tos {{title}}
</h1>

<!-- <ul>
  <li *ngFor = "let bk of softBooks | async">
    Id:{{bk.id}}, Name:{{bk.name}}, Category:{{bk.category}}
  </li>
</ul> -->

<div *ngIf = "softBooks">
{{softBooks}}
</div>
<p *ngIf="datasaved" ngClass="Success">
  Record saved successfully!
</p>
<form [formGroup]="bookForm" (ngSubmit)="onFormSubmit()">
  <table>
    <tr>
      <td>Name:</td>
      <td><input type="" formControlName="name"></td>
    </tr>
    <tr>
      <td>Category:</td>
      <td><input type="" formControlName="category"></td>
    </tr>
    <tr>
      <td>Writer:</td>
      <td><input type="" formControlName="writer"></td>
    </tr>
    <tr>
      <td colspan="2">
        <button [disabled]="bookForm.invalid">Submit</button>
      </td>
    </tr>
  </table>
  </form>

  <h3>View</h3>
  <table>
    <tr><th>Id</th><th>Name</th><th>Category</th><th>Writer</th></tr>

    <tr *ngFor="let bk of allbooks|async">
      <td>{{bk.id}}</td>
      <td>{{bk.name}}</td>
      <td>{{bk.category}}</td>
      <td>{{bk.writer}}</td>
    </tr>

  </table>

(book.service.ts)
import { Injectable } from '@angular/core';
import {HttpClient, HttpHeaders} from '@angular/common/http'
import {Observable} from 'rxjs/observable'  //npm install rxjs-compat --save
import {Book} from './book'

@Injectable({
  providedIn: 'root'
})
export class BookService {
  bookUrl="/api/books";
  constructor(private http:HttpClient) { }

  createBook(book:Book):Observable<Book>{
    let httpheaders = new HttpHeaders()
    .set('Content-Type','application/Json');
    let options={
      headers:httpheaders
    };
    return this.http.post<Book>(this.bookUrl,book, options);
  }

  //getBookFromStore(id:number):Observable<Book>{
    getBookFromStore():Observable<Book[]>{
    //return this.http.get<Book>(this.bookUrl+"/"+id);
    return this.http.get<Book[]>(this.bookUrl);
  }


}

(testdata.ts)
import {InMemoryDbService} from 'angular-in-memory-web-api';

export class TestData implements InMemoryDbService{
    createDb(){
        let bookDetails = [
			{id:100,name:'Angular by Sahosoft',category:'Angular',writer:'Shubham Sharma'},
			// {id:101,name:'.net core by Sahosoft',category:'Java'},
			// {id:102,name:'NgRx by Sahosoft',category:'Angular'},
		];
		return {books:bookDetails};
    }
} 

(book.ts)
export interface Book{
    id:number;
    name:string;
    category:string;
    writer:string;
}


(app.module.ts)
import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import {ReactiveFormsModule} from '@angular/forms';
import { AppRoutingModule } from './app-routing.module';

//import {HttpClient, HttpClientModule} from '@angular/common/http'
import {HttpClientModule} from '@angular/common/http'

import { AppComponent } from './app.component';
import { MypipePipe } from './mypipe.pipe';
import { StudentComponent } from './student/student.component';
import { StudentdetailsComponent } from './studentdetails/studentdetails.component';
import { PagenotfoundComponent } from './pagenotfound/pagenotfound.component';
import { StudentRegistrationComponent } from './student-registration/student-registration.component';

import {BookService} from './book.service';
import {InMemoryWebApiModule} from 'angular-in-memory-web-api';
import {TestData} from './testdata';

@NgModule({
  declarations: [
    AppComponent,
    MypipePipe,
    StudentComponent,
    StudentdetailsComponent,
    PagenotfoundComponent,
    StudentRegistrationComponent
  ],
  imports: [
    BrowserModule,
    HttpClientModule,
    InMemoryWebApiModule.forRoot(TestData),
    FormsModule,
    ReactiveFormsModule,
    AppRoutingModule
  ],
  providers: [BookService],
  bootstrap: [AppComponent]
})
export class AppModule { }



# HttpClient Put()
(app.component.ts)
import { Component , NgModule } from '@angular/core';
//import { Router } from '@angular/router';
//import { StudentComponent } from './student/student.component';
//import{MyservicenameService} from './myservicename.service';
import{ FormGroup, FormControl, FormBuilder, NgForm, Validators} from '@angular/forms';
import {BookService} from './book.service';
import {Book} from './book'
import { Observable } from 'rxjs/Observable';
import 'rxjs/add/operator/map';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css'],
  //providers:[MyservicenameService]
})


export class AppComponent {
  title:string;
  softBooks:string;
  datasaved = false;
  bookForm:FormGroup;
  allbooks:Observable<Book[]>;
  bookiToUpdate = null;
  constructor(private formbuilder:FormBuilder, private bookservice:BookService){}

  ngOnInit(){
    this.bookForm = this.formbuilder.group({
      name:['',[Validators.required]],
      category:['',[Validators.required]],
      writer:['',[Validators.required]],
    });    
    this.getsoftBook();
  }

  booktoEdit(bookid:string){
    this.bookservice.getbookbyid(bookid).subscribe(book=>{
      this.bookiToUpdate = bookid;
      this.bookForm.controls['name'].setValue(book.name);
      this.bookForm.controls['category'].setValue(book.category);
      this.bookForm.controls['writer'].setValue(book.writer);
    })
  }

  onFormSubmit(){
    this.datasaved = false;
    let book = this.bookForm.value;
    this.createbooks(book);
    this.bookForm.reset();
  }

  createbooks(book:Book){
    if (this.bookiToUpdate == null) {
      this.bookservice.createBook(book).subscribe(
        book=>{
          this.datasaved = true;
          this.getsoftBook();
          this.bookiToUpdate=null;
        }
      );
    }else{
      book.id = this.bookiToUpdate;
      this.bookservice.UpeateBook(book)
      .subscribe(book=>{
        this.datasaved = true;
        this.getsoftBook();
        this.bookiToUpdate=null;
      })
    }
    
  }

  getsoftBook(){
    console.log('TTT');
    //this.bookservice.getBookFromStore().subscribe(books=>this.softBooks=books);
    //this.softBooks = this.bookservice.getBookFromStore(100).map(book=>'Name:'+book.name);
        // this.bookservice.getBookFromStore(100).map(book=>book.name).subscribe(name=>{
        //   this.softBooks = name;
        // });
        this.allbooks = this.bookservice.getBookFromStore();
  }

  
}

(app.component.html)
<h1>
  Welcome tos {{title}}
</h1>

<!-- <ul>
  <li *ngFor = "let bk of softBooks | async">
    Id:{{bk.id}}, Name:{{bk.name}}, Category:{{bk.category}}
  </li>
</ul> -->

<div *ngIf = "softBooks">
{{softBooks}}
</div>
<p *ngIf="datasaved" ngClass="Success">
  Record saved successfully!
</p>
<form [formGroup]="bookForm" (ngSubmit)="onFormSubmit()">
  <table>
    <tr>
      <td>Name:</td>
      <td><input type="" formControlName="name"></td>
    </tr>
    <tr>
      <td>Category:</td>
      <td><input type="" formControlName="category"></td>
    </tr>
    <tr>
      <td>Writer:</td>
      <td><input type="" formControlName="writer"></td>
    </tr>
    <tr>
      <td colspan="2">
        <button [disabled]="bookForm.invalid">Submit</button>
      </td>
    </tr>
  </table>
  </form>

  <h3>View</h3>
  <table>
    <tr><th>Id</th><th>Name</th><th>Category</th><th>Writer</th></tr>

    <tr *ngFor="let bk of allbooks|async">
      <td>{{bk.id}}</td>
      <td>{{bk.name}}</td>
      <td>{{bk.category}}</td>
      <td>{{bk.writer}}</td>
      <td><button (click)="booktoEdit(bk.id)">Edit</button></td>
    </tr>

  </table>


(book.service.ts)
import { Injectable } from '@angular/core';
import {HttpClient, HttpHeaders} from '@angular/common/http'
import {Observable} from 'rxjs/observable'  //npm install rxjs-compat --save
import {Book} from './book'

@Injectable({
  providedIn: 'root'
})
export class BookService {
  bookUrl="/api/books";
  constructor(private http:HttpClient) { }

  getbookbyid(bookid:string){
    return this.http.get<Book>(this.bookUrl+"/"+bookid);
  }

  createBook(book:Book):Observable<Book>{
    let httpheaders = new HttpHeaders()
    .set('Content-Type','application/Json');
    let options={
      headers:httpheaders
    };
    return this.http.post<Book>(this.bookUrl,book, options);
  }

  UpeateBook(book:Book):Observable<Book>{
    let httpheaders = new HttpHeaders()
    .set('Content-Type','application/Json');
    let options={
      headers:httpheaders
    };
    return this.http.put<Book>(this.bookUrl+"/"+book.id,book, options);
  }

  //getBookFromStore(id:number):Observable<Book>{
  getBookFromStore():Observable<Book[]>{
    //return this.http.get<Book>(this.bookUrl+"/"+id);
    return this.http.get<Book[]>(this.bookUrl);
  }


}


# Http Client Delete()
(app.component.ts)
import { Component , NgModule } from '@angular/core';
//import { Router } from '@angular/router';
//import { StudentComponent } from './student/student.component';
//import{MyservicenameService} from './myservicename.service';
import{ FormGroup, FormControl, FormBuilder, NgForm, Validators} from '@angular/forms';
import {BookService} from './book.service';
import {Book} from './book'
import { Observable } from 'rxjs/Observable';
import 'rxjs/add/operator/map';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css'],
  //providers:[MyservicenameService]
})


export class AppComponent {
  title:string;
  softBooks:string;
  datasaved = false;
  bookForm:FormGroup;
  allbooks:Observable<Book[]>;
  bookiToUpdate = null;
  constructor(private formbuilder:FormBuilder, private bookservice:BookService){}

  ngOnInit(){
    this.bookForm = this.formbuilder.group({
      name:['',[Validators.required]],
      category:['',[Validators.required]],
      writer:['',[Validators.required]],
    });    
    this.getsoftBook();
  }

  booktoEdit(bookid:string){
    this.bookservice.getbookbyid(bookid).subscribe(book=>{
      this.bookiToUpdate = bookid;
      this.bookForm.controls['name'].setValue(book.name);
      this.bookForm.controls['category'].setValue(book.category);
      this.bookForm.controls['writer'].setValue(book.writer);
    })
  }

  onFormSubmit(){
    this.datasaved = false;
    let book = this.bookForm.value;
    this.createbooks(book);
    this.bookForm.reset();
  }

  createbooks(book:Book){
    if (this.bookiToUpdate == null) {
      this.bookservice.createBook(book).subscribe(
        book=>{
          this.datasaved = true;
          this.getsoftBook();
          this.bookiToUpdate=null;
        }
      );
    }else{
      book.id = this.bookiToUpdate;
      this.bookservice.UpdateBook(book)
      .subscribe(book=>{
        this.datasaved = true;
        this.getsoftBook();
        this.bookiToUpdate=null;
      })
    }
    
  }

  BookDelete(bookid:string){
    this.bookservice.Deletebook(bookid)
    .subscribe(book=>{
      this.getsoftBook();
    })
  }

  getsoftBook(){
    console.log('TTT');
    //this.bookservice.getBookFromStore().subscribe(books=>this.softBooks=books);
    //this.softBooks = this.bookservice.getBookFromStore(100).map(book=>'Name:'+book.name);
        // this.bookservice.getBookFromStore(100).map(book=>book.name).subscribe(name=>{
        //   this.softBooks = name;
        // });
        this.allbooks = this.bookservice.getBookFromStore();
  }

  
}


(app.component.html)
<h1>
  Welcome tos {{title}}
</h1>

<!-- <ul>
  <li *ngFor = "let bk of softBooks | async">
    Id:{{bk.id}}, Name:{{bk.name}}, Category:{{bk.category}}
  </li>
</ul> -->

<div *ngIf = "softBooks">
{{softBooks}}
</div>
<p *ngIf="datasaved" ngClass="Success">
  Record saved successfully!
</p>
<form [formGroup]="bookForm" (ngSubmit)="onFormSubmit()">
  <table>
    <tr>
      <td>Name:</td>
      <td><input type="" formControlName="name"></td>
    </tr>
    <tr>
      <td>Category:</td>
      <td><input type="" formControlName="category"></td>
    </tr>
    <tr>
      <td>Writer:</td>
      <td><input type="" formControlName="writer"></td>
    </tr>
    <tr>
      <td colspan="2">
        <button [disabled]="bookForm.invalid">Submit</button>
      </td>
    </tr>
  </table>
  </form>

  <h3>View</h3>
  <table>
    <tr><th>Id</th><th>Name</th><th>Category</th><th>Writer</th></tr>

    <tr *ngFor="let bk of allbooks|async">
      <td>{{bk.id}}</td>
      <td>{{bk.name}}</td>
      <td>{{bk.category}}</td>
      <td>{{bk.writer}}</td>
      <td><button (click)="booktoEdit(bk.id)">Edit</button></td>
      <td><button (click)="BookDelete(bk.id)">Delete</button></td>
    </tr>

  </table>
  
  
(book.service.ts)
import { Injectable } from '@angular/core';
import {HttpClient, HttpHeaders} from '@angular/common/http'
import {Observable} from 'rxjs/observable'  //npm install rxjs-compat --save
import {Book} from './book'

@Injectable({
  providedIn: 'root'
})
export class BookService {
  bookUrl="/api/books";
  constructor(private http:HttpClient) { }

  getbookbyid(bookid:string){
    return this.http.get<Book>(this.bookUrl+"/"+bookid);
  }

  createBook(book:Book):Observable<Book>{
    let httpheaders = new HttpHeaders()
    .set('Content-Type','application/Json');
    let options={
      headers:httpheaders
    };
    return this.http.post<Book>(this.bookUrl,book, options);
  }

  UpdateBook(book:Book):Observable<Book>{
    let httpheaders = new HttpHeaders()
    .set('Content-Type','application/Json');
    let options={
      headers:httpheaders
    };
    return this.http.put<Book>(this.bookUrl+"/"+book.id,book, options);
  }

  Deletebook(bookid:String):Observable<Book>{
    let httpheaders = new HttpHeaders()
    .set('Content-Type','application/Json');
    let options={
      headers:httpheaders
    };
    return this.http.delete<Book>(this.bookUrl+"/"+bookid);
  }

  //getBookFromStore(id:number):Observable<Book>{
    getBookFromStore():Observable<Book[]>{
    //return this.http.get<Book>(this.bookUrl+"/"+id);
    return this.http.get<Book[]>(this.bookUrl);
  }


}
  

==================================================================================================
===================================================================================================

# 1.) ANGULAR PRACTICAL:
*****************(app.module.ts)*****************
import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { ReactiveFormsModule } from '@angular/forms';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { LoginComponent } from './login/login.component';
import { HeaderComponent } from './header/header.component';

@NgModule({
  declarations: [
    AppComponent,
    LoginComponent,
    HeaderComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    ReactiveFormsModule,
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }

(app-routing.module.ts)
import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import {LoginComponent} from './login/login.component';

const routes: Routes = [
  { path: '', redirectTo: '/login', pathMatch: 'full' },
  { path: 'login', component: LoginComponent },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }


*****************(app-routing.module.ts)*****************
import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import {LoginComponent} from './login/login.component';
import { DashboardComponent } from './dashboard/dashboard.component';

const routes: Routes = [
  { path: '', redirectTo: '/login', pathMatch: 'full' },
  { path: 'login', component: LoginComponent },
  { path: 'dashboard', component: DashboardComponent },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }


*****************(login.component.ts)*******************
import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, FormControl, Validators } from '@angular/forms';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
  login_form: FormGroup;    // login_form of type FormGroup

  constructor(public builder:FormBuilder) {     //What we now have done is created a login_form of type FormGroup 
    this.login_form = this.builder.group({      //with 2 FormControls using the FormBuilder.
      email:[null,[Validators.required,Validators.pattern('^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$')]],
      password:[null,Validators.required]
    });
  }

  ngOnInit() {
  }

}

*****************(login.component.html)*****************
<app-header></app-header>

<!-----Binding to a Template with formControlName
  we will bind our login_form to our template with [FormGroup] and formControlName.
--->
<section style="height: 100vh; display: flex; align-items: center;">
	<div class="height40"></div>
		<div class="container">
			<div class="row">
			  	<div class="col-md-4 text-center bg-light offset-4 p-3 pt-5 pb-5 mt-5 shadow-sm rounded">
			  		<div class="height40 d-md-none"></div>
			  		<div class="w-100-xs mx-auto">
				  		<h3>Login</h3>
							<div class="height20"></div>
							
				  		<form [formGroup]="login_form" (submit)="login(login_form.value)" >
                <div class="form-group">
                  <input type="text" class="form-control" formControlName="email" placeholder="Username">
                  <p *ngIf="login_form.get('email').hasError('required') && login_form.get('email').touched" class="help-inline">
                    This field is required.
                  </p>
                  <p *ngIf="login_form.get('email').hasError('pattern') && login_form.get('email').touched" class="help-inline">
                    Please enter a valid email address.
                </p>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" formControlName="password" placeholder="Password">
                  <p *ngIf="login_form.get('password').hasError('required') && login_form.get('password').touched" class="help-inline">
                    This field is required.
                  </p>
                </div>
                <button type="submit"  [disabled]="!login_form.valid" class="btn btn-danger btn-lg w-100">Submit</button>
						  </form>					  		
				  	</div>
			  	</div>
		  	</div>
		</div>
</section>


# 2.) ANGULAR PRACTICAL:

*****************(login.component.ts)*****************
import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, FormControl, Validators } from '@angular/forms';
import {DetailService} from '../services/detail.service';
//import {DataService} from '../services/data.service';
import { Router } from '@angular/router';
@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
  login_form: FormGroup;
  iserror:boolean= false;
  error:any = ''
  constructor(public builder:FormBuilder,public service:DetailService,public router:Router) {
    this.login_form = this.builder.group({
      email:[null,[Validators.required,Validators.pattern('^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$')]],
      password:[null,Validators.required]
    });
   }

  ngOnInit() {
  }

  login(data){
    this.service.login(data).subscribe(
      (data:any)=>{
        if(data.status == 'success'){
          
          this.router.navigateByUrl('/dashboard');
        }else{
          this.iserror = true;
          this.error = data.info;
        }
      }
    )
  }
}

*****************(detail.service.ts)*****************
import { Injectable } from '@angular/core';
import {environment} from '../../environments/environment';
import { HttpClient, HttpParams } from '@angular/common/http';
import { Observable } from 'rxjs/Rx';
let login_url = environment.api_url+'api/login';
@Injectable()
export class DetailService {

  constructor(public http:HttpClient) { }

  
  handler(error){
    return Observable.throw(error.json().error || 'server error');
  }

  
  login(data){
    let myParams = new HttpParams()
        .set('email',data.email)
        .set('password', window.btoa(data.password));
      return this.http.post(login_url,myParams).catch(this.handler)
  }

  
}

*****************(app.module.ts)*****************
import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { ReactiveFormsModule } from '@angular/forms';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { LoginComponent } from './login/login.component';
import { HeaderComponent } from './header/header.component';
import { DashboardComponent } from './dashboard/dashboard.component';

import { DetailService } from "./services/detail.service";
import { DataService } from './services/data.service';

import { HttpClientModule } from '@angular/common/http';

@NgModule({
  declarations: [
    AppComponent,
    LoginComponent,
    HeaderComponent,
    DashboardComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    ReactiveFormsModule,
    HttpClientModule
  ],
  providers: [DataService,DetailService],
  bootstrap: [AppComponent]
})
export class AppModule { }









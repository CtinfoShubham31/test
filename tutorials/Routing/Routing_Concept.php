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
 { path: 'blog/:id', component: BlogComponent } (1)
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
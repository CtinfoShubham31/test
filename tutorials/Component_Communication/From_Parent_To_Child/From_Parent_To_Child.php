Parent to Child: Sharing Data via Input
<?php 

#Example:1

--------(parent.component.ts)----------
import { Component } from '@angular/core';

@Component({
  selector: 'app-parent',
  template: `
    <app-child [childMessage]="parentMessage"></app-child>
  `,
  styleUrls: ['./parent.component.css']
})
export class ParentComponent{
  parentMessage = "message from parent"
  constructor() { }
}

--------(child.component.ts)----------
import { Component, Input } from '@angular/core';

@Component({
  selector: 'app-child',
  template: `
      Say {{ message }}
  `,
  styleUrls: ['./child.component.css']
})
export class ChildComponent {

  @Input() childMessage: string;

  constructor() { }

}

=======================================================================================

# Example:2

-------(app.component.ts)------
import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  message:string = "I am the parent component";
  instructMsg = "Hey child I am your parent";

  counter = 5;

  increment(){
    this.counter++;
  }

  decrement(){
    this.counter--;
  }
}

-------(app.component.html)------
<h1>Here, {{ message }}</h1>
<button (click)="increment()">Increment</button>
<button (click)="decrement()">Decrement</button>
<app-child [childMessage]="instructMsg" [count]="counter"></app-child>


-------(child.component.ts)------
import { Component, Input, OnInit } from '@angular/core';

@Component({
  selector: 'app-child',
  templateUrl: './child.component.html',
  styleUrls: ['./child.component.css']
})
export class ChildComponent implements OnInit {

  @Input() childMessage:string;
  @Input() count:number;
  constructor() { }

  ngOnInit() {
  }

}

-------(child.component.html)------

<h1>Here, {{ childMessage }}</h1>

current count is {{ count }}






?>
Child to Parent: Sharing Data via Output() and EventEmitter
<?php 
This approach is ideal when you want to share data changes that occur on things like button clicks, form entires, and other user events.
In the parent, we create a function to receive the message and set it equal to the message variable.

message:string;
receiveMessage($event) {
	this.message = $event
}
  
In the child, we declare a messageEvent variable with the Output decorator and set it equal to a new event emitter.
@Output() messageEvent = new EventEmitter<string>();

Then we create a function named sendMessage that calls emit on this event with the message we want to send. 

message: string = "Hola Mundo!"
sendMessage() {
    this.messageEvent.emit(this.message)
}
  
Lastly, we create a button to trigger this function.

<button (click)="sendMessage()">Send Message</button>  

The parent can now subscribe to this messageEvent that’s outputted by the child component, then run the receive message function whenever this event occurs. 
  
# Example:1  
-------(parent.component.ts)--------
import { Component } from '@angular/core';

@Component({
  selector: 'app-parent',
  template: `
    Message: {{message}}
    <app-child (messageEvent)="receiveMessage($event)"></app-child>
  `,
  styleUrls: ['./parent.component.css']
})
export class ParentComponent {

  constructor() { }

  message:string;

  receiveMessage($event) {
    this.message = $event
  }
}  
  
  
-----(child.component.ts)-----
import { Component, Output, EventEmitter } from '@angular/core';

@Component({
  selector: 'app-child',
  template: `
      <button (click)="sendMessage()">Send Message</button>
  `,
  styleUrls: ['./child.component.css']
})
export class ChildComponent {

  message: string = "Hola Mundo!"

  @Output() messageEvent = new EventEmitter<string>();

  constructor() { }

  sendMessage() {
    this.messageEvent.emit(this.message)
  }
}  
  
========================================================================
  
# Example 2  
Child component exposes an event emitter property with which emit event when something happening. and parent bind to event property and reacts to those events. So thit event emitter nothing it is an output property.
First step is to import EventEmitter and Output from the angular core.  
  
----------(app.component.ts)------------  
import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  ChildCurrentVal:string;

  GetOutputVal(selected:string){
		if(selected){
			this.ChildCurrentVal = "Value received from child: "+selected;
		}
	}
}  

----------(app.component.html)------------  
{{ChildCurrentVal}}
<app-child (outputToParent)="GetOutputVal($event)"></app-child>


----------(child.component.ts)------------ 
import { Component, Output, EventEmitter } from '@angular/core';

@Component({
  selector: 'app-child',
  templateUrl: './child.component.html',
  styleUrls: ['./child.component.css']
})
export class ChildComponent {

  @Output() outputToParent = new EventEmitter<string>();
  
  childname:string="Hamma";

  NotificationToParent(selected:string){
		this.outputToParent.emit(selected);
	}

}

----------(child.component.html)------------ 
<button (click)="NotificationToParent(childname)">Set Value To Parent</button>












  
  
  
?>
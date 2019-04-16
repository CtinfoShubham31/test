Sharing Data with a Service
<?php 
When you want to share data without any connection of the component at that time we use shared service. Data should sync on the component. In these example we use RXJS in Services to capture data and sync we use “BehaviorSubject” in Angular.

# BehaviorSubject
> getValue() function to extract the last value as raw data.
> It always return the current value on subscription
> Ensures that the component always receives the most recent data

-------(app.component.ts)-------
import { Component, OnInit } from '@angular/core';
import { MsgService } from "./msg.service";

@Component({
  selector: 'app-root',
  //templateUrl: './app.component.html',
  template: `{{message}}
  <app-hello></app-hello>`,
  styleUrls: ['./app.component.css']
})
export class AppComponent implements OnInit{
  message:string;

  constructor(private data: MsgService) { }

  ngOnInit() {
    this.data.currentMessage.subscribe(message => this.message = message)
  }
}

 HomeAngular2+Sharing Data with a Service in Angular
Sharing Data with a Service in Angular Jugal Rana  September 2, 2018  Angular2+  No Comments
In my last article we discuss on how to share data using ViewChild.

In this article we discuss on how to share data using Service.
When you want to share data without any connection of the component at that time we use shared service. Data should sync on the component. In these example we use RXJS in Services to capture data and sync we use “BehaviorSubject” in Angular.


BehaviorSubject

getValue() function to extract the last value as raw data.
It always return the current value on subscription
Ensures that the component always receives the most recent data
Let’s create Message service.
msgservice.ts

import { Injectable } from '@angular/core';
import { BehaviorSubject } from 'rxjs';

@Injectable()
export class MsgService {

  private messageSource = new BehaviorSubject('first message');
  currentMessage = this.messageSource.asObservable();

  constructor() { }

  changeMessage(message: string) {
    this.messageSource.next(message)
  }

}

In above code we have use “BehaviorSubject” as private message then we have set as observable so when value change we can get that value and broadcast that value in all places.

-------(hello.component.html)-------
import { Component, OnInit } from '@angular/core';
import { MsgService } from "./../msg.service";

@Component({
  selector: 'app-hello',
  //templateUrl: './hello.component.html',
  template: `
    {{message}} 

    <button (click)="newMessage()" >New Message </button >
  `,
  styleUrls: ['./hello.component.css']
})

export class HelloComponent implements OnInit {

  message:string;
  constructor(private data: MsgService) { }

  ngOnInit() {
    this.data.currentMessage.subscribe(message => this.message = message)
  }

  newMessage() {
    this.data.changeMessage("Hello from Sibling")
  }

}

-------(msg.service.html)-------
import { Injectable } from '@angular/core';
import { BehaviorSubject } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class MsgService {

  private messageSource = new BehaviorSubject('first message');
  currentMessage = this.messageSource.asObservable();

  constructor() {  }

  changeMessage(message: string) {
    this.messageSource.next(message)
  }
}










?>
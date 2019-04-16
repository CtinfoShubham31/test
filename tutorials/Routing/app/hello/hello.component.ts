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

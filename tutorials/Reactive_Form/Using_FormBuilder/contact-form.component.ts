import { Component, OnInit } from '@angular/core';
import { Contact } from '../contact';

@Component({
  selector: 'app-contact-form',
  templateUrl: './contact-form.component.html',
  styleUrls: ['./contact-form.component.css']
})
export class ContactFormComponent implements OnInit {

  submitted = false;
  contact = new Contact();  //Instance
  constructor() { }

  ngOnInit() {
  }

  onSubmit(){
    this.submitted = true;
  }

}

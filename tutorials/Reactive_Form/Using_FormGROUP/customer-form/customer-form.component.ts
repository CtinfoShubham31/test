import { Component, OnInit } from '@angular/core';
import { FormControl,FormGroup, FormBuilder } from '@angular/forms';
@Component({
  selector: 'app-customer-form',
  templateUrl: './customer-form.component.html',
  styleUrls: ['./customer-form.component.css']
})
export class CustomerFormComponent implements OnInit {
  // name = new FormControl('');

  customerForm = new FormGroup({
    firstName : new FormControl(''),
    lastName : new FormControl(''),
    address : new FormGroup({
      street : new FormControl(''),
      city : new FormControl(''),
      state : new FormControl(''),
      zipcode : new FormControl('')
    }),
  });
  constructor() { }

  ngOnInit() {
  }

  onSubmit(){
    console.warn(this.customerForm.value);
  }

}

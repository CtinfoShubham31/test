import { Component, OnInit } from '@angular/core';
//import { FormControl,FormGroup } from '@angular/forms';
import { FormBuilder } from '@angular/forms';
import { Validators } from '@angular/forms';
@Component({
  selector: 'app-customer-form',
  templateUrl: './customer-form.component.html',
  styleUrls: ['./customer-form.component.css']
})
export class CustomerFormComponent implements OnInit {
  // name = new FormControl('');

  /*customerForm = new FormGroup({
    firstName : new FormControl(''),
    lastName : new FormControl(''),
    address : new FormGroup({
      street : new FormControl(''),
      city : new FormControl(''),
      state : new FormControl(''),
      zipcode : new FormControl('')
    }),
  });*/

  customerForm = this.fb.group({
    firstName: ['',[Validators.required, Validators.minLength(4)]],
    lastName: [''],
    address: this.fb.group({
      street: [''],
      city: [''],
      state: [''],
      zipcode: [''],
    })
  });

  get firstName(){ return this.customerForm.get('firstName'); }
  get city(){ return this.customerForm.get('address.city'); }
  
  constructor(private fb:FormBuilder) { }

  ngOnInit() {
  }

  onSubmit(){
    console.warn(this.customerForm.value);
  }

}

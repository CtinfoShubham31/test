Form Validation in both Reactive Forms and Template driven Forms
<?php 
# Template driven Forms Validation

-------(contact-form.component.html)----------
<div class="form-group">
  <label>Name:</label>
  <input type="text" id="name" name="name" required minlength="4" [(ngModel)]="contact.name" #name="ngModel">
  <!--- <br/>{{name.className}}
  <span [hidden]="name.valid || name.pristine">This field is required</span>---> 
  <div *ngIf="name.invalid && (name.dirty || name.touched)">
	<div *ngIf="name.errors.required" class="form-error">Name is required</div>
	<div *ngIf="name.errors.minlength" class="form-error">Must be at least 4 characters</div>
  </div>
</div>

-------(contact-form.component.css)----------
.form-group{
    margin-bottom: 10px;
}
.form-error{
    color:red;
}

# Reactive Forms Validation
Validation can be apply by using syncronouly and Asyncronouly

Firstly import  Validators
import { Validators } from '@angular/forms';

Angular have many validators available in documents.

Example:

-------(customer-form.component.ts)----------
customerForm = this.fb.group({
    firstName: ['',Validators.required],
    
    })
  });

And if need more validation required for single fields, then make it by array form.
Like,
customerForm = this.fb.group({
    firstName: ['',[Validators.required, Validators.minLength(4)]],
    lastName: [''],
    address: this.fb.group({
      street: [''],
      city: ['',Validators.required],
      state: [''],
      zipcode: [''],
    })
  });

Now, How to get it`s error message.

get firstName(){ return this.customerForm.get('firstName'); }
get city(){ return this.customerForm.get('address.city'); }

-------(customer-form.component.html)----------

<div class="form-group">
  <label>First Name:</label>
  <input type="text" formControlName="firstName" required>
  <div *ngIf="firstName.invalid && (firstName.dirty || firstName.touched)">
	<div *ngIf="firstName.errors.required" class="form-error">Name is required</div>
	<div *ngIf="firstName.errors.minlength" class="form-error">Must be at least 4 characters</div>
  </div>
</div>
	
	
<div class="form-group">
	<label>City</label>
	<input type="text" formControlName="city" required>
	<div *ngIf="city.invalid && (city.dirty || city.touched)">
	  <div *ngIf="city.errors.required" class="form-error">City is required</div>
	</div>
  </div>
	
	
	
>>>>>>>>>>>Final Code For Customer Form	
	
-------(customer-form.component.ts)----------
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


-------(customer-form.component.html)----------

<!---<p>
  <label>Name:</label>
  <input type="text" id="name" name="name" [formControl]="name">
 
</p>
<p>{{name.value}}</p>-->

<form [formGroup]="customerForm" (ngSubmit)="onSubmit()">
    <div class="form-group">
      <label>First Name:</label>
      <input type="text" formControlName="firstName" required>
      <div *ngIf="firstName.invalid && (firstName.dirty || firstName.touched)">
        <div *ngIf="firstName.errors.required" class="form-error">Name is required</div>
        <div *ngIf="firstName.errors.minlength" class="form-error">Must be at least 4 characters</div>
      </div>
    </div>

    <p>
      <label>Last Name:</label>
      <input type="text" formControlName="lastName" required>
    </p>

    <div formGroupName="address">
      <h3>Address</h3>
      <p>
        <label>Street</label>
        <input type="text" formControlName="street" required>
      </p>
      <div class="form-group">
        <label>City</label>
        <input type="text" formControlName="city" required>
        <div *ngIf="city.invalid && (city.dirty || city.touched)">
          <div *ngIf="city.errors.required" class="form-error">City is required</div>
        </div>
      </div>
      <p>
        <label>State</label>
        <input type="text" formControlName="state" required>
      </p>
      <p>
        <label>Zipcode</label>
        <input type="text" formControlName="zipcode" required>
      </p>

      <p>
        <label>&nbsp;</label>
        <button type="submit" [disabled]="!customerForm.valid">Submit</button>
      </p>
    </div>
</form>


<p>{{customerForm.value | json}}</p>	
	

?>
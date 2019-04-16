Create Reactive Forms using FormControl, FormGroup and FormBuilder
<?php 
Reactive Forms r more robust : they are more scalable,resuable and testable.
It`s syncronous.

> FormControl:
A FormControl instance that tracks the value and validation status of an individual form control.

> FormGroup:
A FormGroup instance that tracks the same values and status for a collection of form control.

> Nested Form Group:
When building complex form, managing the different areas of information is easier in smaller section.

> FormBuilder:
The FormBuilder service provides convenient methods for generating form control.

ng g c customer-form

and import reactive form 
import { FormsModule } from '@angular/forms';


and import FormControl in (customer-form.component.ts)
import { FormControl } from '@angular/forms';

-----(customer-form.component.ts)--------
name = new FormControl(''); //bind with [formControl]="name" in html(customer-form.component.html)

-----(customer-form.component.html)--------
Here, Binding of form done by [formControl]="name". So this is the process of formcontrol by individual field.
We can check this it`s bind or not.
<p>
  <label>Name:</label>
  <input type="text" id="name" name="name" [formControl]="name">
 
</p>
<p>{{name.value}}</p>



Now using FormGroup. Then import FormGroup as well.
import { FormControl,FormGroup } from '@angular/forms';
and comment:
 => //name = new FormControl('');
We will create many FormControl inside the FormGroup
Like,
customerForm = new FormGroup({
	firstName : new FormControl(''),
	lastName : new FormControl(''),
});

if our form is very big we can nested it also.
Like,
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

Now, bind FormGroup into (customer-form.component.html) Like this-
<form [formGroup]="customerForm">

</form>


<form [formGroup]="customerForm" (ngSubmit)="onSubmit()">
    <p>
      <label>First Name:</label>
      <input type="text" formControlName="firstName" required>
    </p>

    <p>
      <label>Last Name:</label>
      <input type="text" formControlName="lastName" required>
    </p>
		
    <div formGroupName="address"> <!------------Nested Form Group--------------->
      <h3>Address</h3>
      <p>
        <label>Street</label>
        <input type="text" formControlName="street" required>
      </p>
      <p>
        <label>City</label>
        <input type="text" formControlName="city" required>
      </p>
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
        <button type="submit">Submit</button>
      </p>
    </div>
</form>


=> Disabled submit button.
<p>
<label>&nbsp;</label>
<button type="submit" [disabled]="!customerForm.valid">Submit</button>
</p>

=> On component make onSubmit() function.
onSubmit(){
    console.warn(this.customerForm.value);
  }

=> CSS
label {
    display:inline-block;
    width:100px;
}

input[type=text]{
    width:300px;
    padding: 5px;
}

=> if we want to see the form value after submit the form.
<p>{{customerForm.value}}</p>
and add json by using the pipe operator.
<p>{{customerForm.value | json}}</p>


>>>>>>>>>>>>>>>FINAL CODE OF REACTIVE USING FORM GROUP AND FORM CONTROL>>>>>>>>>>>>>>>>

-----(customer-form.component.html)--------
<!---<p>
  <label>Name:</label>
  <input type="text" id="name" name="name" [formControl]="name">
 
</p>
<p>{{name.value}}</p>-->

<form [formGroup]="customerForm" (ngSubmit)="onSubmit()">
    <p>
      <label>First Name:</label>
      <input type="text" formControlName="firstName" required>
    </p>

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
      <p>
        <label>City</label>
        <input type="text" formControlName="city" required>
      </p>
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

-----(customer-form.component.ts)--------
import { Component, OnInit } from '@angular/core';
import { FormControl,FormGroup } from '@angular/forms';
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

-----(customer-form.component.css)--------
label {
    display:inline-block;
    width:100px;
}

input[type=text]{
    width:300px;
    padding: 5px;
}

-----(app-routing.module.ts)--------
import { CustomerFormComponent } from './customer-form/customer-form.component';
{path:'customer',component:CustomerFormComponent}

# Now using FormBuilder 
First import it 
import { FormBuilder } from '@angular/forms';

Firstly add in constructor,
constructor(private fb:FormBuilder) { }

>>>>>>>>>>>>>>>FINAL CODE USING FORM BUILDER>>>>>>>>>>>>>>>

-----(customer-form.component.ts)--------

import { Component, OnInit } from '@angular/core';
//import { FormControl,FormGroup } from '@angular/forms';
import { FormBuilder } from '@angular/forms';
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
    firstName: [''],
    lastName: [''],
    address: this.fb.group({
      street: [''],
      city: [''],
      state: [''],
      zipcode: [''],
    })
  });
  constructor(private fb:FormBuilder) { }

  ngOnInit() {
  }

  onSubmit(){
    console.warn(this.customerForm.value);
  }

}








?>
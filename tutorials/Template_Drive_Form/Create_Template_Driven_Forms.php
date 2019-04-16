Create Template Driven Forms
<?php 
=> Create component form : ng g c contact-form
 
 ----(app.module.ts)----
 
 => Import FormsModule in (app.module.ts)
 import { FormsModule } from '@angular/forms';
 
 import { ContactFormComponent } from './contact-form/contact-form.component';
 
 @NgModule({
  declarations: [
    AppComponent,
    ContactFormComponent
  ],
  imports: [
    BrowserModule,
    FormsModule,
    AppRoutingModule
  ],
  providers: [MsgService],
  bootstrap: [AppComponent]
})
export class AppModule { }
 
=> Generate Class
ng generate class Contact 

------(contact.ts)------ 
export class Contact {
    id:number;
    name:string;
    phone:string;
    message:string;
}
 
=> Import Contact class inside (contatc-form.components.ts) 
 
=> Make instance of Contact class inside (contatc-form.components.ts) 
 
-----------(contact-form.components.ts)-----------
import { Component, OnInit } from '@angular/core';
import { Contact } from '../contact';

@Component({
  selector: 'app-contact-form',
  templateUrl: './contact-form.component.html',
  styleUrls: ['./contact-form.component.css']
})
export class ContactFormComponent implements OnInit {

  contact = new Contact();  //Instance
  constructor() { }

  ngOnInit() {
  }

} 
 
 
=> Bind form fields by [(ngModel)] 
 -----------(contact-form.components.html)-----------
<form>
  <p>
    <label>Name:</label>
    <input type="text" id="name" name="name" required [(ngModel)]="contact.name">
  </p>
</form> 
 
 Here contact is the instance and name we define in contact interface.
 
 Add css, -----------(contact-form.components.css)-----------
 label {
    display:inline-block;
    width:100px;
}

input[type=text], input[type=email], textarea{
    width:300px;
    padding: 5px;
}
 
 
Now, we can check the status of field(valid or not). Add reference variable #name and {{name.className}} 
 <p>
    <label>Name:</label>
    <input type="text" id="name" name="name" required [(ngModel)]="contact.name" #name>
    <br/>{{name.className}} 
  </p>
 And Get error below like
 ng-untouched ng-pristine ng-invalid 
 
 ng-untouched = not clicked on field
 ng-pristine = not type on field
 ng-invalid = empty field
 
 after type 
 ng-touched ng-dirty ng-valid 
 
 The status messages also show in field after inspect the form fields.
 
 Add Class,
 
.ng-valid[required], .ng-valid.required {
    border: 2px solid #42a948;
}

.ng-invalid:not(form){
    border: 2px solid #a94442;
}
 
=> Show message
For this we need to  #name="ngModel"
Like, 
<p>
    <label>Name:</label>
    <input type="text" id="name" name="name" required [(ngModel)]="contact.name" #name="ngModel">
    <!--- <br/>{{name.className}}---> 
    <span [hidden]="name.valid || name.pristine">This field is required</span>
</p> 
 
Same for message field

=> Add button, and apply condition for that, submit box is disable till then it`s valid. 
and for this we need form reference variable #contactForm="ngForm"

Here, ngForm is the directive.
By #contactForm="ngForm" we can enable and disable the form.
 
<button type="submit" [disabled]="!contactForm.form.valid">Send Message</button> 
 
Ater that, add submit method to submit(ngSubmit) the form. 
<form #contactForm="ngForm" (ngSubmit)="onSubmit()"> 
 
 -----------(contact-form.components.ts)-----------
 
 Take one variable, to check that form is submitted or not.
 submitted = false;
  onSubmit(){
    this.submitted = true;
  }
 
 After that,
 
 
 <div [hidden]="submitted">
	<form>
	
	</form>
 </div>
 
 We can put div below the form to see the submitted value of form.
 
 <div [hidden]="!submitted">
  <p>
    <strong>Name</strong>{{contact.name}}
  </p>
  <p>
    <strong>Phone</strong>{{contact.phone}}
  </p>
  <p>
    <strong>Message</strong>{{contact.message}}
  </p>
</div>
 
 And make one more button if want to go back to form.
 <p>
  <button (click)="submitted=flase;contactForm.reset()">Back</button>
</p>

Final code:

-----------(contact-form.components.html)-----------
<div [hidden]="submitted">
  <form #contactForm="ngForm" (ngSubmit)="onSubmit()">
    <p>
      <label>Name:</label>
      <input type="text" id="name" name="name" required [(ngModel)]="contact.name" #name="ngModel">
      <!--- <br/>{{name.className}}---> 
      <span [hidden]="name.valid || name.pristine">This field is required</span>
    </p>

    <p>
      <label>Phone:</label>
      <input type="text" id="phone" name="phone" required [(ngModel)]="contact.phone">
    </p>

      <p>
        <label>Message:</label>
        <input type="text" id="message" name="message" required [(ngModel)]="contact.message" #message="ngModel">
        <span [hidden]="message.valid || message.pristine">This field is required</span>
      </p>

      <p>
          <label>&nbsp;</label>
        <button type="submit" [disabled]="!contactForm.form.valid">Send Message</button>
      </p>
      
  </form>
</div>

<div [hidden]="!submitted">
  <p>
    <strong>Name: </strong>{{contact.name}}
  </p>
  <p>
    <strong>Phone: </strong>{{contact.phone}}
  </p>
  <p>
    <strong>Message: </strong>{{contact.message}}
  </p>
  <p>
      <button (click)="submitted=false;contactForm.reset()">Back</button>
  </p>
</div>


-----------(contact-form.components.ts)-----------

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

------(contact.ts)------ 
export class Contact {
    id:number;
    name:string;
    phone:string;
    message:string;
}

-----------(contact-form.components.css)-----------
label {
    display:inline-block;
    width:100px;
}

input[type=text], input[type=email], textarea{
    width:300px;
    padding: 5px;
}

.ng-valid[required], .ng-valid.required {
    border: 2px solid #42a948;
}

.ng-invalid:not(form){
    border: 2px solid #a94442;
}


-----------(app-routing.module.ts)-----------
import { ContactFormComponent } from './contact-form/contact-form.component';
const routes: Routes = [
	{path:'contact',component:ContactFormComponent},
];

-----------(app.component.html)-----------
{{message}}
<div>
    <app-contact-form></app-contact-form>
    <router-outlet></router-outlet>
</div>

?>
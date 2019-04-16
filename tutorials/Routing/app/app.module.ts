import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { MsgService } from './msg.service';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { ChildComponent } from './child/child.component';
import { HelloComponent } from './hello/hello.component';
import { StudentComponent } from './student/student.component';
import { StudentdetailsComponent } from './studentdetails/studentdetails.component';
import { PagenotfoundComponent } from './pagenotfound/pagenotfound.component';
import { SettingsComponent } from './settings/settings.component';
import { SettingsContactComponent } from './settings-contact/settings-contact.component';
import { SettingsProfileComponent } from './settings-profile/settings-profile.component';
import { DepartmentListComponent } from './department-list/department-list.component';
import { DepartmentDetailComponent } from './department-detail/department-detail.component';

@NgModule({
  declarations: [
    AppComponent,
    ChildComponent,
    HelloComponent,
    StudentComponent,
    StudentdetailsComponent,
    PagenotfoundComponent,
    SettingsComponent,
    SettingsContactComponent,
    SettingsProfileComponent,
    DepartmentListComponent,
    DepartmentDetailComponent
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

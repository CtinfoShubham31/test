import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { StudentComponent } from './student/student.component';
import { StudentdetailsComponent } from './studentdetails/studentdetails.component';
import { SettingsComponent } from './settings/settings.component';
import { SettingsProfileComponent } from './settings-profile/settings-profile.component';
import { SettingsContactComponent } from './settings-contact/settings-contact.component';
import { DepartmentListComponent } from './department-list/department-list.component';
import { DepartmentDetailComponent } from './department-detail/department-detail.component';
import { PagenotfoundComponent} from './pagenotfound/pagenotfound.component'

const routes: Routes = [
  {
    path:'',redirectTo:'student',pathMatch:'full'
  },
  {
    path:'student',component:StudentComponent
  },
  {
    path:'studentdetails',component:StudentdetailsComponent
  },
  {
    path:'settings',component:SettingsComponent,
    children:[
      {path:'', redirectTo:'profile', pathMatch:'full'},
      {path:'profile',component:SettingsProfileComponent},
      {path:'contact',component:SettingsContactComponent}
    ]
  },
  {path:'departments',component:DepartmentListComponent},
  {path:'departments/:id',component:DepartmentDetailComponent},
  {
    path:'**',component:PagenotfoundComponent
  },
  
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

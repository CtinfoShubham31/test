import { NgModule } from '@angular/core';
import { Routes, RouterModule, Params } from '@angular/router';
import { PageNotFoundComponent } from './page-not-found/page-not-found.component';

const routes: Routes = [
  {path: '', redirectTo: '', pathMatch: 'full'},  //Set route for home page
  {path: '**', component: PageNotFoundComponent}  //Set route for 404 error page
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
 
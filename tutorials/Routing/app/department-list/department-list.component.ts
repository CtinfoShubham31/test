import { Component, OnInit } from '@angular/core';
import { Router} from '@angular/router';
@Component({
  selector: 'app-department-list',
  //templateUrl: './department-list.component.html',
  template: `<h3>Department List</h3>
              <ul class="items">
                <li (click)="onSelect(department)" *ngFor="let department of departments">
                  <span class="badge">{{department.id}}</span>{{department.name}}
                </li>
              </ul>`,
  styleUrls: ['./department-list.component.css']
})
export class DepartmentListComponent {

  constructor(private router: Router) { }
  departments = [
    {"id":1,"name":"Angular"},
    {"id":2,"name":"Node"},
    {"id":3,"name":"MongoDB"},
    {"id":4,"name":"Ruby"},
    {"id":5,"name":"Bootstrap"},
  ];

  onSelect(department){
    this.router.navigate(['/departments',department.id]);
  }

}

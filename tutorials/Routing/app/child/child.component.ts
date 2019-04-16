import { Component, Output, EventEmitter } from '@angular/core';

@Component({
  selector: 'app-child',
  templateUrl: './child.component.html',
  styleUrls: ['./child.component.css']
})
export class ChildComponent {

  @Output() outputToParent = new EventEmitter<string>();
  
  childname:string="Hamma";

  NotificationToParent(selected:string){
		this.outputToParent.emit(selected);
	}

}

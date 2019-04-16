import { Injectable } from '@angular/core';
import { BehaviorSubject } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class MsgService {

  private messageSource = new BehaviorSubject('first message');
  currentMessage = this.messageSource.asObservable();

  constructor() {  }

  changeMessage(message: string) {
    this.messageSource.next(message)
  }
}

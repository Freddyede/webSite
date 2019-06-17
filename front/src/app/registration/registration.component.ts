import {Component, EventEmitter, OnInit, Output} from '@angular/core';
import {HttpClient, HttpHeaders} from '@angular/common/http';
import {Router} from '@angular/router';

// @ts-ignore
// @ts-ignore
@Component({
  selector: 'app-registration',
  templateUrl: './registration.component.html',
  styleUrls: ['./registration.component.css'],
})
export class RegistrationComponent implements OnInit {
  @Output() LoginStart: EventEmitter<any> = new EventEmitter();
  registrationActive = true;
  registrationObject: any = {
  };
  // tslint:disable-next-line:no-shadowed-variable
  constructor(private httpClient: HttpClient, private router: Router) {
  }
  setValeurRegistration() {
    this.registrationActive = false;
    this.httpClient.post('http://127.0.0.1:8000/api/users', this.registrationObject, {
      headers: new HttpHeaders({
        'Content-Type': 'application/json'
      })
    }).subscribe((data) => {
      console.log(data);
    });
    this.LoginStart.emit('login');
    this.router.navigate(['/login']);

  }
  ngOnInit() {
  }
}

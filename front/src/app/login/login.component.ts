import {Component, EventEmitter, OnInit, Output} from '@angular/core';
import {HttpClient, HttpHeaders} from '@angular/common/http';
import {Router} from '@angular/router';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
  @Output() logged: EventEmitter<any> = new EventEmitter();
  @Output() notify: EventEmitter<object> = new EventEmitter();
  @Output() storages: EventEmitter<object> = new EventEmitter();
  loginObject: any = {};
  storage: void;
  constructor(private httpClient: HttpClient, private router: Router) { }
  setLogin() {
    console.log(this.loginObject);
    const regex = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
    if (regex.test(this.loginObject.mail)) {
      this.httpClient.post('http://127.0.0.1:8000/login', this.loginObject, {
        headers: new HttpHeaders({
          'Content-Type': 'application/json'
        })
      }).subscribe((data) => {
        const storage = localStorage.setItem('token', data.id);
        if (data.id) {
          this.notify.emit(data);
          this.logged.emit('logged');
          // @ts-ignore
          this.storages.emit(storage);
        }
      });
    }
    if (this.storage !== null) {
      this.router.navigate(['/news']);
    }
  }
  ngOnInit() {
  }
}

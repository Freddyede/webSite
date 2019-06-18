import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import {Observable} from 'rxjs';
import { IUsers } from '../Interface/IUsers';
@Injectable()

export class UserServices {
  private urlApi = 'http://localhost:8000/api/users';
  constructor(private http: HttpClient) {}

  findBy(id): Observable <IUsers> {
    return this.http.get<IUsers>(this.urlApi + '/' + id);
  }
}

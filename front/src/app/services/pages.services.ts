import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import {Observable} from 'rxjs';
import {IPages} from '../Interface/IPages';
@Injectable()

export class PagesServices {
  private urlApi = 'http://localhost:8000/api/pages';
  private url = 'http://localhost:8000/pages';
  constructor(private http: HttpClient) {}

  getPages(): Observable <IPages> {
    return this.http.get<IPages>(this.url);
  }
  getPage(id): Observable <IPages> {
    return this.http.get<IPages>(this.urlApi + '/' + id);
  }
}

import {Component, OnInit} from '@angular/core';
@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent implements OnInit {
  title = 'Accueil';
  afficheAccueil = false;
  constructor() {}
  ngOnInit() {
    if (localStorage.getItem('token') !== null) {
      this.afficheAccueil = true;
    } else {
      this.afficheAccueil = false;
    }
  }
}

import {Component, Input, OnInit} from '@angular/core';
import {Router} from '@angular/router';



@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.css']
})
export class NavbarComponent implements OnInit {
  @Input() titreNavbar: string;
  afficheLogout = false;
  afficheLogin = false;
  constructor(private router: Router) { }
  ngOnInit() {
    if (localStorage.getItem('token') !== null) {
      this.afficheLogout = true;
    } else {
      this.afficheLogin = true;
    }
  }
  desactiveToken() {
    localStorage.removeItem('token');
    this.router.navigate(['/']);
  }

}

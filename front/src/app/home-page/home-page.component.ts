import {Component, OnInit} from '@angular/core';
import {PagesServices} from '../services/pages.services';

@Component({
  providers: [PagesServices],
  selector: 'app-home-page',
  templateUrl: './home-page.component.html',
  styleUrls: ['./home-page.component.css']
})
export class HomePageComponent implements OnInit {

  constructor(private PagesService: PagesServices) {
  }
  title = 'Registration';
  pages = [];
  AffichePage = false;
  // @ts-ignore
  ngOnInit() {
    this.PagesService.getPages().subscribe((data) => {
      // @ts-ignore
      // tslint:disable-next-line:prefer-for-of
      for (const i = 0; i < data.length; i++) {
        this.pages.push(data[i]);
      }
    });
    if (localStorage.getItem('token') !== null){
      this.AffichePage = true;
    } else {
      this.AffichePage = false;
    }
  }
}

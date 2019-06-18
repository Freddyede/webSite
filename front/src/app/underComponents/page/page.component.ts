import {Component, Input, OnInit} from '@angular/core';
import { PagesServices } from '../../services/pages.services';

@Component({
  providers: [PagesServices],
  selector: 'app-page',
  templateUrl: './page.component.html',
  styleUrls: ['./page.component.css']
})
export class PageComponent implements OnInit {
  @Input() pages = [];
  constructor(private PagesService: PagesServices) { }
  ngOnInit() {
    this.PagesService.getPages().subscribe((data) => {
      if (data.length !== 0) {
        if (data.length <= 6) {
        }
        if (data.length > 6) {
          console.log('sup 6');
        }
      }
    });
  }
}

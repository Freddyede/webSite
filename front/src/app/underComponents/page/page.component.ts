import {Component, Input, OnInit} from '@angular/core';

@Component({
  selector: 'app-page',
  templateUrl: './page.component.html',
  styleUrls: ['./page.component.css']
})
export class PageComponent implements OnInit {
  @Input() pages = [];
  constructor() { }

  ngOnInit() {
    console.log(this.pages);
  }
}

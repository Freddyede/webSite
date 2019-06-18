import { Component, OnInit } from '@angular/core';
import {ActivatedRoute} from '@angular/router';
import {PagesServices} from '../../app/services/pages.services';

@Component({
  providers: [PagesServices],
  selector: 'app-page-details',
  templateUrl: './page-details.component.html',
  styleUrls: ['./page-details.component.css']
})
export class PageDetailsComponent implements OnInit {
  id: number;
  objectPage: object;
  constructor(private route: ActivatedRoute, private pageService: PagesServices) { }
  ngOnInit() {
    this.id = Number(
      this.route.snapshot.paramMap.get('id')
        .split(',')[1]
        .replace(/]$/, '')
    );
    this.pageService.getPage(this.id).subscribe(data =>
    this.objectPage = data
    );
  }
}

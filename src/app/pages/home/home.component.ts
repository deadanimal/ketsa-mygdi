import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent implements OnInit {


  faqs: any[] = []

  
  // Accordian
  isCollapsed = true;
  isCollapsed1 = true;
  isCollapsed2 = true;
  isCollapsed3 = true;
  isCollapsed4 = true;
  isCollapsed5 = true;
  isCollapsed6 = true;
  isCollapsed7 = true;
  isCollapsed8 = true;
  constructor() { }

  ngOnInit() : void {
  }

}


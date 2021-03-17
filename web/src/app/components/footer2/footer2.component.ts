import { Component, OnInit } from '@angular/core';
import { Router, NavigationEnd } from "@angular/router";

@Component({
  selector: 'app-footer2',
  templateUrl: './footer2.component.html',
  styleUrls: ['./footer2.component.scss']
})
export class Footer2Component implements OnInit {
  panelOpenState = false;
  oneAtATime = true;
  test2: Date = new Date();
  isCollapsed = true;
  constructor(private router: Router) {
    router.events.subscribe(val => {
      this.isCollapsed = true;
    });
  }
  mobileView(){
    if (window.innerWidth < 992) {
        return true;
    }
    return false;
  }
  ngOnInit() {}
}

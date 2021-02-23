import { Component, OnInit, HostListener } from "@angular/core";
import { Router, NavigationEnd } from "@angular/router";

@Component({
  selector: "app-portal",
  templateUrl: "./portal.component.html",
  styleUrls: ["./portal.component.scss"]
})
export class PortalComponent implements OnInit {
  panelOpenState = false;
  oneAtATime = true;
  test: Date = new Date();
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
import { Component, OnInit } from "@angular/core";

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
  constructor() {}

  ngOnInit() {}
}
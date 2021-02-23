import { Component, OnInit } from "@angular/core";
import {
  Router,
  Event,
  NavigationStart,
  NavigationEnd,
  NavigationError,
} from "@angular/router";
import { ROUTES, ROUTESPENGESAH, ROUTESUSER } from '../../shared/menu/menu-items';
import { AuthService } from 'src/app/shared/services/auth/auth.service';
import { JwtService } from "src/app/shared/handler/jwt/jwt.service";



var misc: any = {
  sidebar_mini_active: true
};

@Component({
  selector: "app-sidebar",
  templateUrl: "./sidebar.component.html",
  styleUrls: ["./sidebar.component.scss"]
})
export class SidebarComponent implements OnInit {

  public menuItems: any[];
  public isCollapsed = true;
  public menu;

  constructor(
    private jwtService: JwtService,
    private authService: AuthService,
    private router: Router
  ) { }

  ngOnInit() {
    if (this.authService.userRole == 1) {
      this.menu = ROUTES
    }
    else if (this.authService.userRole == 2) {
      this.menu = ROUTESUSER
    }
    else if (this.authService.userRole == 3) {
      this.menu = ROUTESPENGESAH
    }
    this.menuItems = this.menu.filter(menuItem => menuItem);
    this.router.events.subscribe(event => {
      this.isCollapsed = true;
    });
  }

  navigatePage(path: String) {
    if (path == "notifications") {
      return this.router.navigate(["/global/notifications"]);
    } else if (path == "profile") {
      return this.router.navigate(["/global/profile"]);
    } else if (path == "settings") {
      return this.router.navigate(["/global/settings"]);
    } else if (path == "home") {
      return this.router.navigate(["/auth/login"]);
    }
  }

  logout() {
    this.jwtService.destroyToken();
    this.navigatePage("home");
  }

  onMouseEnterSidenav() {
    if (!document.body.classList.contains("g-sidenav-pinned")) {
      document.body.classList.add("g-sidenav-show");
    }
  }

  onMouseLeaveSidenav() {
    if (!document.body.classList.contains("g-sidenav-pinned")) {
      document.body.classList.remove("g-sidenav-show");
    }
  }
  
  minimizeSidebar() {
    const sidenavToggler = document.getElementsByClassName(
      "sidenav-toggler"
    )[0];
    const body = document.getElementsByTagName("body")[0];
    if (body.classList.contains("g-sidenav-pinned")) {
      misc.sidebar_mini_active = true;
    } else {
      misc.sidebar_mini_active = false;
    }
    if (misc.sidebar_mini_active === true) {
      body.classList.remove("g-sidenav-pinned");
      body.classList.add("g-sidenav-hidden");
      sidenavToggler.classList.remove("active");
      misc.sidebar_mini_active = false;
    } else {
      body.classList.add("g-sidenav-pinned");
      body.classList.remove("g-sidenav-hidden");
      sidenavToggler.classList.add("active");
      misc.sidebar_mini_active = true;
    }
  }
}

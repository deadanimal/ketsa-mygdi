(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["main"],{

/***/ "./node_modules/raw-loader/dist/cjs.js!./src/app/app.component.html":
/*!**************************************************************************!*\
  !*** ./node_modules/raw-loader/dist/cjs.js!./src/app/app.component.html ***!
  \**************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("<router-outlet></router-outlet>\n");

/***/ }),

/***/ "./node_modules/raw-loader/dist/cjs.js!./src/app/components/footer/footer.component.html":
/*!***********************************************************************************************!*\
  !*** ./node_modules/raw-loader/dist/cjs.js!./src/app/components/footer/footer.component.html ***!
  \***********************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("<div>\n\t<footer class=\"footer \" style=\"background: #40b3e9;\">\n\t\t<div class=\"container-fluid\">\n\t\t\t<div class=\"row align-items-center justify-content-xl-between \">\n\t\t\t\t<div class=\"col-xl-6\">\n\t\t\t\t\t<div class=\"copyright text-xl-left text-white \">\n\t\t\t\t\t\tHakcipta Terpelihara\n\t\t\t\t\t\t&copy; {{ test | date: \"yyyy\" }}. Pusat Geospatial Malaysia.\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t\t<div class=\"col-xl-6\">\n\t\t\t\t\t\n\t\t\t\t</div>\n\t\t</div>\n\t\t</div>\n\t\t\n\t</footer>\n</div>");

/***/ }),

/***/ "./node_modules/raw-loader/dist/cjs.js!./src/app/components/footer2/footer2.component.html":
/*!*************************************************************************************************!*\
  !*** ./node_modules/raw-loader/dist/cjs.js!./src/app/components/footer2/footer2.component.html ***!
  \*************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("<footer class=\"footer\" style=\"background: #242881\">\n    <div class=\"container-fluid\">\n        <div class=\"row align-items-center justify-content-xl-between \">\n            <div class=\"col-xl-4\">\n                <div class=\"copyright text-xl-left text-light\">\n                    <a class = \"text-light\" [routerLink]=\"['/disclaimer']\">PENAFIAN</a><span class=\"mr-2 ml-2\">|</span>\n                    <a class = \"text-light\"[routerLink]=\"['/privacy']\">PENYATAAN PRIVASI</a><br><br><br>\n                    Hakcipta Terpelihara\n                    &copy; {{ test2 | date: \"yyyy\" }}. Pusat Geospatial Malaysia.<br>\n                </div>\n            </div>\n            <div class=\"col-xl-4\">\n                <div class=\" copyright text-center text-light mt-2\">\n                    Jumlah Pelawat:<br>\n                    <span class=\"badge badge-custom badge-pill mt-1\">1,098,034</span>\n                </div>\n            </div>\n            <div class=\"col-xl-4\">\n                <div class=\"copyright text-xl-right text-light\">\n                    Sebarang pertanyaan, boleh menghubungi:<br>\n                    <br>\n                    <i class=\"fas fa-envelope\"></i>\n                    adminexplorer@ketsa.gov.my<br>\n                    Masa Operasi: 8.00 Pagi - 5.00 Petang\n                </div>\n            </div>\n        </div>\n    </div>\n</footer>");

/***/ }),

/***/ "./node_modules/raw-loader/dist/cjs.js!./src/app/components/navbar/navbar.component.html":
/*!***********************************************************************************************!*\
  !*** ./node_modules/raw-loader/dist/cjs.js!./src/app/components/navbar/navbar.component.html ***!
  \***********************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("<nav class=\"navbar navbar-top navbar-expand navbar-light bg-custom border-bottom\" id=\"navbar-main\">\n\t<div class=\"container-fluid\">\n\t\t<div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">\n\t\t\t<div class=\"media align-items-center\">\n\t\t\t\t<span class=\"ml-1\">\n\t\t\t\t\t<img alt=\"Image placeholder\" src=\"assets/img/logo/mygeoexplorer-logo2.png\" width=\"50%\"/>\n\t\t\t\t</span>\n\t\t\t</div>\n\t\t\t<!-- Search form -->\n\t\t\t<!--\n\t\t\t<form class=\"navbar-search navbar-search-light form-inline mr-sm-3\" id=\"navbar-search-main\">\n\t\t\t\t<div class=\"form-group mb-0\" [ngClass]=\"{ focused: focus === true }\">\n\t\t\t\t\t<div class=\"input-group input-group-alternative input-group-merge\">\n\t\t\t\t\t\t<div class=\"input-group-prepend\">\n\t\t\t\t\t\t\t<span class=\"input-group-text\"><i class=\"fas fa-search\"></i></span>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<input \n\t\t\t\t\t\t\tclass=\"form-control\" \n\t\t\t\t\t\t\tplaceholder=\"Search\" \n\t\t\t\t\t\t\ttype=\"text\" \n\t\t\t\t\t\t\t(focus)=\"focus = true\"\n\t\t\t\t\t\t\t(blur)=\"focus = false\" \n\t\t\t\t\t\t/>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\n\t\t\t\t<button type=\"button\" class=\"close\" (click)=\"closeSearch()\" data-action=\"search-close\"\n\t\t\t\t\tdata-target=\"#navbar-search-main\" aria-label=\"Close\">\n\t\t\t\t\t<span aria-hidden=\"true\">×</span>\n\t\t\t\t</button>\n\t\t\t</form>\n\t\t\t-->\n\t\t\t<!-- Navbar links -->\n\t\t\t<ul class=\"navbar-nav align-items-center ml-md-auto\">\n\t\t\t\t<li class=\"nav-item d-xl-none\">\n\t\t\t\t\t<!-- Sidenav toggler -->\n\t\t\t\t\t<div \n\t\t\t\t\t\tclass=\"pr-3 sidenav-toggler sidenav-toggler-dark\"\n\t\t\t\t\t\tdata-action=\"sidenav-pin\"\n\t\t\t\t\t\tdata-target=\"#sidenav-main\" \n\t\t\t\t\t\t(click)=\"openSidebar()\"\n\t\t\t\t\t>\n\t\t\t\t\t\t<div class=\"sidenav-toggler-inner\">\n\t\t\t\t\t\t\t<i class=\"sidenav-toggler-line\"></i>\n\t\t\t\t\t\t\t<i class=\"sidenav-toggler-line\"></i>\n\t\t\t\t\t\t\t<i class=\"sidenav-toggler-line\"></i>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</li>\n\t\t\t\t<li class=\"nav-item d-sm-none\">\n\t\t\t\t\t<a class=\"nav-link\" (click)=\"openSearch()\">\n\t\t\t\t\t\t<i class=\"ni ni-zoom-split-in\"></i>\n\t\t\t\t\t</a>\n\t\t\t\t</li>\n\t\t\t\t<li class=\"nav-item dropdown\" dropdown placement=\"bottom-right\">\n\t\t\t\t\t<a class=\"nav-link dropdown-toggle\" role=\"button\" disabled> <!--dropdownToggle-->\n\t\t\t\t\t\t<!-- <i class=\"ni ni-bell-55\"></i> -->\n\t\t\t\t\t</a>\n\t\t\t\t\t<div class=\"dropdown-menu dropdown-menu-xl dropdown-menu-right py-0 overflow-hidden\" *dropdownMenu>\n\t\t\t\t\t\t<!-- Dropdown header -->\n\t\t\t\t\t\t<div class=\"px-3 py-3\">\n\t\t\t\t\t\t\t<h6 class=\"text-sm text-muted m-0\">\n\t\t\t\t\t\t\t\tYou have <strong class=\"text-primary\">2</strong> notifications.\n\t\t\t\t\t\t\t</h6>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<!-- List group -->\n\t\t\t\t\t\t<div class=\"list-group list-group-flush\">\n\t\t\t\t\t\t\t<a href=\"javascript:void()\" class=\"list-group-item list-group-item-action\">\n\t\t\t\t\t\t\t\t<div class=\"row align-items-center\">\n\t\t\t\t\t\t\t\t\t<div class=\"col-auto\">\n\t\t\t\t\t\t\t\t\t\t<!-- Avatar -->\n\t\t\t\t\t\t\t\t\t\t<img \n\t\t\t\t\t\t\t\t\t\t\talt=\"Image placeholder\"\n\t\t\t\t\t\t\t\t\t\t\t[src]=\"imgAvatar\"\n\t\t\t\t\t\t\t\t\t\t\tclass=\"avatar rounded-circle\"\n\t\t\t\t\t\t\t\t\t\t/>\n\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t\t<div class=\"col ml--2\">\n\t\t\t\t\t\t\t\t\t\t<div class=\"d-flex justify-content-between align-items-center\">\n\t\t\t\t\t\t\t\t\t\t\t<div>\n\t\t\t\t\t\t\t\t\t\t\t\t<h4 class=\"mb-0 text-sm\">Khairul Naim</h4>\n\t\t\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t\t\t\t<div class=\"text-right text-muted\">\n\t\t\t\t\t\t\t\t\t\t\t\t<small>1 hrs ago</small>\n\t\t\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t\t\t<p class=\"text-sm mb-0\">\n\t\t\t\t\t\t\t\t\t\t\tAccount registered\n\t\t\t\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t</a>\n\t\t\t\t\t\t\t<a href=\"javascript:void()\" class=\"list-group-item list-group-item-action\">\n\t\t\t\t\t\t\t\t<div class=\"row align-items-center\">\n\t\t\t\t\t\t\t\t\t<div class=\"col-auto\">\n\t\t\t\t\t\t\t\t\t\t<!-- Avatar -->\n\t\t\t\t\t\t\t\t\t\t<img \n\t\t\t\t\t\t\t\t\t\t\talt=\"Image placeholder\"\n\t\t\t\t\t\t\t\t\t\t\t[src]=\"imgAvatar\"\n\t\t\t\t\t\t\t\t\t\t\tclass=\"avatar rounded-circle\"\n\t\t\t\t\t\t\t\t\t\t/>\n\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t\t<div class=\"col ml--2\">\n\t\t\t\t\t\t\t\t\t\t<div class=\"d-flex justify-content-between align-items-center\">\n\t\t\t\t\t\t\t\t\t\t\t<div>\n\t\t\t\t\t\t\t\t\t\t\t\t<h4 class=\"mb-0 text-sm\">Aina Amirah</h4>\n\t\t\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t\t\t\t<div class=\"text-right text-muted\">\n\t\t\t\t\t\t\t\t\t\t\t\t<small>3 hrs ago</small>\n\t\t\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t\t\t<p class=\"text-sm mb-0\">\n\t\t\t\t\t\t\t\t\t\t\tPassword has been reset\n\t\t\t\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t</a>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<!-- View all -->\n\t\t\t\t\t\t<a \n\t\t\t\t\t\t\t(click)=\"navigatePage('notifications')\"\n\t\t\t\t\t\t\tclass=\"dropdown-item text-center text-primary font-weight-bold py-3\"\n\t\t\t\t\t\t>\n\t\t\t\t\t\t\tView all\n\t\t\t\t\t\t</a>\n\t\t\t\t\t</div>\n\t\t\t\t</li>\n\t\t\t</ul>\n\t\t\t<!-- User -->\n\t\t\t<ul class=\"navbar-nav align-items-center ml-auto ml-md-0\">\n\t\t\t\t<li class=\"nav-item dropdown\" dropdown placement=\"bottom-right\">\n\t\t\t\t\t<a class=\"nav-link pr-0 dropdown-toggle\" role=\"button\" dropdownToggle>\n\t\t\t\t\t\t<div class=\"media align-items-center pointer\">\n\t\t\t\t\t\t\t<div class=\"media-body ml-2 d-none d-lg-block\">\n\t\t\t\t\t\t\t\t<span *ngIf=\"auth == 1\" class=\"mb-0 text-sm  font-weight-bold\">MISBUN BIN MUHAMMAD SAAD </span>\n\t\t\t\t\t\t\t\t<span *ngIf=\"auth == 2\" class=\"mb-0 text-sm  font-weight-bold\">MUHAMMAD FAIZ BIN AMIR </span>\n\t\t\t\t\t\t\t\t<span *ngIf=\"auth == 3\" class=\"mb-0 text-sm  font-weight-bold\">AINA HASRITA BINTI CHE SHAMSUL </span>\n\t\t\t\t\t\t\t\t<span *ngIf=\"auth == 4\" class=\"mb-0 text-sm  font-weight-bold\">MUHD IRFAN BIN ZAKARIA </span>\n\t\t\t\t\t\t\t\t<span *ngIf=\"auth == 5\" class=\"mb-0 text-sm  font-weight-bold\">NURKAMALIAH BINTI IBRAHIM </span>\n\t\t\t\t\t\t\t\t<span *ngIf=\"auth == 6\" class=\"mb-0 text-sm  font-weight-bold\">NURUL SYAKILA BINTI HUSSEIN </span>\n\t\t\t\t\t\t\t\t<br>\n\t\t\t\t\t\t\t\t<span *ngIf=\"auth == 1\" class=\"float-right text-sm  font-weight-light\">Pentadbir Aplikasi</span>\n\t\t\t\t\t\t\t\t<span *ngIf=\"auth == 2\" class=\"float-right text-sm  font-weight-light\">Pentadbir Metadata</span>\n\t\t\t\t\t\t\t\t<span *ngIf=\"auth == 3\" class=\"float-right text-sm  font-weight-light\">Pentadbir Data</span>\n\t\t\t\t\t\t\t\t<span *ngIf=\"auth == 4\" class=\"float-right text-sm  font-weight-light\">Penerbit Metadata</span>\n\t\t\t\t\t\t\t\t<span *ngIf=\"auth == 5\" class=\"float-right text-sm  font-weight-light\">Pengesah Metadata</span>\n\t\t\t\t\t\t\t\t<span *ngIf=\"auth == 6\" class=\"float-right text-sm  font-weight-light\">Pemohon Data</span>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<span class=\"avatar avatar-md rounded-circle ml-3\">\n\t\t\t\t\t\t\t\t<img alt=\"Image placeholder\" [src]=\"imgAvatar\" />\n\t\t\t\t\t\t\t</span>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<div class=\"dropdown-menu dropdown-menu-arrow dropdown-menu-right\" *dropdownMenu>\n\t\t\t\t\t\t<div class=\" dropdown-header noti-title\">\n\t\t\t\t\t\t\t<h6 class=\"text-overflow m-0\">Selamat Datang!</h6>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<a class=\"dropdown-item\" (click)=\"navigatePage('profile')\">\n\t\t\t\t\t\t\t<i class=\"fas fa-user fa-fw\"></i> <span>Profil Saya</span>\n\t\t\t\t\t\t</a>\n\t\t\t\t\t\t<a class=\"dropdown-item\" (click)=\"navigatePage('settings')\">\n\t\t\t\t\t\t\t<i class=\"fas fa-cogs fa-fw\"></i> <span>Tetapan</span>\n\t\t\t\t\t\t</a>\n\t\t\t\t\t\t<div class=\"dropdown-divider\"></div>\n\t\t\t\t\t\t<a (click)=\"logout()\" class=\"dropdown-item\">\n\t\t\t\t\t\t\t<i class=\"fas fa-sign-out-alt fa-fw\"></i>\n\t\t\t\t\t\t\t<span>Log Keluar</span>\n\t\t\t\t\t\t</a>\n\t\t\t\t\t</div>\n\t\t\t\t</li>\n\t\t\t</ul>\n\t\t</div>\n\t</div>\n</nav>\n<div *ngIf=\"sidenavOpen === true\" class=\"backdrop d-xl-none\" (click)=\"toggleSidenav()\"></div>");

/***/ }),

/***/ "./node_modules/raw-loader/dist/cjs.js!./src/app/components/navbar2/navbar2.component.html":
/*!*************************************************************************************************!*\
  !*** ./node_modules/raw-loader/dist/cjs.js!./src/app/components/navbar2/navbar2.component.html ***!
  \*************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("<nav class=\"navbar navbar-horizontal navbar-expand-lg navbar-dark\" style=\"background-color: #242881;\">\n  <div class=\"container-fluid\">\n    <a class=\"navbar-brand\" [routerLink]=\"['/portal']\">\n      <img src=\"assets/img/logo/mygeoexplorer-logo.png\" />\n    </a>\n\n    <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbar-collapse\"\n      aria-expanded=\"false\" aria-label=\"Toggle navigation\" (click)=\"isCollapsed = !isCollapsed\"\n      [attr.aria-expanded]=\"!isCollapsed\" aria-controls=\"collapseBasic\">\n      <span><img height=\"21\" src=\"assets/img/icons/common/menuoption.png\" /></span>\n    </button>\n    <div class=\"collapse navbar-collapse\" id=\"collapseBasic\" [collapse]=\"isCollapsed\">\n      <div class=\"navbar-collapse-header\">\n        <div class=\"row\">\n          <div class=\"col-6 collapse-brand\">\n            <a [routerLink]=\"['/portal']\">\n              <img src=\"assets/img/logo/mygeoexplorer-logo2.png\" />\n            </a>\n          </div>\n          <div class=\"col-6 collapse-close\">\n            <button type=\"button\" class=\"navbar-toggler\" data-toggle=\"collapse\" data-target=\"#navbar-collapse\"\n              aria-controls=\"navbar-collapse\" aria-expanded=\"false\" aria-label=\"Toggle navigation\"\n              (click)=\"isCollapsed = !isCollapsed\">\n              <span></span> <span></span>\n            </button>\n          </div>\n        </div>\n      </div>\n\n      <ul class=\"navbar-nav align-items-center ml-md-auto\" id=\"button-animated\">\n        <li class=\"nav-item\">\n          <a class=\"nav-link\" routerLinkActive=\"active\" [routerLink]=\"['/auth/login/']\">\n            <span class=\"nav-link-inner--text text-bold\">DAFTAR | LOG MASUK</span>\n          </a>\n        </li>\n        <li class=\"nav-item\">\n          <a class=\"nav-link nav-link-icon\" routerLinkActive=\"active\" [routerLink]=\"['/faq']\">\n            <img height=\"25\" src=\"assets/img/icons/common/faq-gold.png\" />\n            <span class=\"nav-link-inner--text text-bold d-lg-none\"> Soalan Lazim </span>\n          </a>\n        </li>\n        <li class=\"nav-item dropdown\" dropdown placement=\"bottom-right\">\n          <a class=\"nav-link nav-link-icon\" data-toggle=\"dropdown\" dropdownToggle role=\"button\">\n\n            <img height=\"21\" src=\"assets/img/icons/common/menuoption.png\" />\n            <span class=\"nav-link-inner--text text-bold d-lg-none\"> Lain-lain </span>\n          </a>\n          <div aria-labelledby=\"button-animated\" class=\"dropdown-menu dropdown-menu-right dropdown-menu-arrow\" *dropdownMenu>\n            <a class=\"dropdown-item\" [routerLink]=\"['/mygeoexplorer']\">\n              <i class=\"text-muted\"> </i> MyGeo Explorer\n            </a>\n            <a class=\"dropdown-item\" [routerLink]=\"['/userguide']\">\n              <i class=\"text-danger\"> </i> Panduan Pengguna\n            </a>\n            <a class=\"dropdown-item\" [routerLink]=\"['javascript:void(0)']\" (click)=\"openModal(feedBack)\">\n              <i class=\"text-pink\"> </i> Maklum Balas\n            </a>\n            <a class=\"dropdown-item\" [routerLink]=\"['/contactus']\">\n              <i class=\"text-info\"> </i> Hubungi Kami\n            </a>\n          </div>\n        </li>\n        <li class=\"nav-item d-lg-none\">\n          <!-- Sidenav toggler -->\n          <div class=\"sidenav-toggler sidenav-toggler-dark\" data-action=\"sidenav-pin\" data-target=\"#mySidenav\"\n            (click)=\"openSidebar()\">\n            <div class=\"sidenav-toggler-inner\">\n              <i class=\"sidenav-toggler-line\"></i>\n              <i class=\"sidenav-toggler-line\"></i>\n              <i class=\"sidenav-toggler-line\"></i>\n            </div>\n          </div>\n        </li>\n      </ul>\n    </div>\n  </div>\n</nav>\n<ng-template #feedBack>\n  <div class=\"modal-header bg-primary\">\n    <h5 class=\"modal-title text-white my-auto\" id=\"modal-title-default\">\n      Anda perlukan sebarang bantuan atau pertanyaan?\n    </h5>\n\n    <button aria-label=\"Close\" class=\"close\" data-dismiss=\"modal\" type=\"button\" (click)=\"closeModal()\">\n      <span aria-hidden=\"true\" class=\"text-white my-auto\"> × </span>\n    </button>\n  </div>\n\n  <div class=\"modal-body\">\n\n    <form [formGroup]=\"feedbackForm\">\n      <h6 class=\"heading-small text-muted mb-4\">Maklum Balas</h6>\n      <div class=\"pl-lg-4\">\n        <div class=\"row mb-3\">\n          <div class=\"col-2\">\n            <label class=\"form-control-label mr-4\" for=\"input-agensi\">\n              Kategori\n            </label>\n          </div>\n          <div class=\"col-9\">\n            <select class=\" form-control form-control-sm ml-3\" id=\"input-agensi\">\n              <option selected disabled hidden> Pilih Kategori </option>\n              <option value=\"penerbit\">Metadata</option>\n              <option value=\"pengesah\">Permohonan Data-data Asas</option>\n              <option value=\"vw\">Lain-lain</option>\n            </select>\n          </div>\n        </div>\n        <div class=\"row mb-3\">\n          <div class=\"col-2\">\n            <label class=\"form-control-label mr-4\" for=\"input-feedback\">\n              Pertanyaan\n            </label>\n          </div>\n          <div class=\"col-9\">\n            <textarea class=\"form-control form-control-sm ml-3\" id=\"input-feedback\"\n              placeholder=\"Nyatakan maklum balas anda\" type=\"text\" rows=\"5\" formControlName=\"feedback\"></textarea>\n          </div>\n        </div>\n        <div class=\"row mb-3\">\n          <div class=\"col-2\">\n            <label class=\"form-control-label mr-4\" for=\"input-emel\">\n              Emel Personal\n            </label>\n          </div>\n          <div class=\"col-7\">\n            <input class=\"form-control form-control-sm ml-3\" id=\"input-emel\" placeholder=\"Masukan E-mel anda\"\n              type=\"text\" formControlName=\"email\" />\n            <ng-container *ngFor=\"let message of feedbackFormMessages.email\">\n              <div\n                *ngIf=\"feedbackForm.get('email').hasError(message.type) && (feedbackForm.get('email').dirty || feedbackForm.get('email').touched)\">\n                <p class=\"error-message\"><span>{{ message.message }}</span></p>\n              </div>\n            </ng-container>\n          </div>\n        </div>\n      </div>\n    </form>\n  </div>\n\n  <div class=\"modal-footer\">\n    <button class=\"btn btn-success\" type=\"button\" (click)=\"confirm()\" [disabled]=\"!feedbackForm.valid\">\n      Hantar\n    </button>\n\n    <button class=\"btn btn-outline-danger ml-auto\" data-dismiss=\"modal\" type=\"button\" (click)=\"closeModal()\">\n      Batal\n    </button>\n  </div>\n</ng-template>");

/***/ }),

/***/ "./node_modules/raw-loader/dist/cjs.js!./src/app/components/sidebar/sidebar.component.html":
/*!*************************************************************************************************!*\
  !*** ./node_modules/raw-loader/dist/cjs.js!./src/app/components/sidebar/sidebar.component.html ***!
  \*************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("<nav \n\tclass=\"sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light\" \n\tid=\"sidenav-main\"\n\t(mouseover)=\"onMouseEnterSidenav()\" \n\t(mouseout)=\"onMouseLeaveSidenav()\"\n>\n\t<perfect-scrollbar>\n\t\t<div class=\"scrollbar-inner\">\n\t\t\t<div class=\"sidenav-header d-flex align-items-center\">\n\t\t\t\t<a class=\"navbar-brand\" [routerLink]=\"['/#']\">\n\t\t\t\t\t<img src=\"assets/img/logo/jata-negara.png\" class=\"navbar-brand-img\" alt=\"...\" />\n\t\t\t\t</a>\n\t\t\t\t<div class=\"ml-auto\">\n\t\t\t\t\t<!-- Sidenav toggler -->\n\t\t\t\t\t<div class=\"sidenav-toggler d-none d-xl-block\" data-action=\"sidenav-unpin\"\n\t\t\t\t\t\tdata-target=\"#sidenav-main\" (click)=\"minimizeSidebar()\">\n\t\t\t\t\t\t<div class=\"sidenav-toggler-inner\">\n\t\t\t\t\t\t\t<i class=\"sidenav-toggler-line\"></i>\n\t\t\t\t\t\t\t<i class=\"sidenav-toggler-line\"></i>\n\t\t\t\t\t\t\t<i class=\"sidenav-toggler-line\"></i>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t\t<div class=\"navbar-inner\">\n\t\t\t\t<div class=\"collapse navbar-collapse\" id=\"sidenav-collapse-main\">\n\t\t\t\t\t<!-- Collapse header -->\n\t\t\t\t\t<ul class=\"navbar-nav\">\n\t\t\t\t\t\t<li *ngFor=\"let menuitem of menuItems\" class=\"nav-item\">\n\t\t\t\t\t\t\t<!--If is a single link-->\n\t\t\t\t\t\t\t<a \n\t\t\t\t\t\t\t\trouterLinkActive=\"active\"\n\t\t\t\t\t\t\t\t[routerLink]=\"[menuitem.path]\"\n\t\t\t\t\t\t\t\t*ngIf=\"menuitem.type === 'link'\"\n\t\t\t\t\t\t\t\tclass=\"nav-link\"\n\t\t\t\t\t\t\t>\n\t\t\t\t\t\t\t\t<i class=\"ni {{ menuitem.icontype }}\"></i>\n\t\t\t\t\t\t\t\t<span class=\"nav-link-text\">{{ menuitem.title }}</span>\n\t\t\t\t\t\t\t</a>\n\t\t\t\t\t\t\t<!--If it have a submenu-->\n\t\t\t\t\t\t\t<a \n\t\t\t\t\t\t\t\tdata-toggle=\"collapse\" \n\t\t\t\t\t\t\t\trouterLinkActive=\"active\" \n\t\t\t\t\t\t\t\t*ngIf=\"menuitem.type === 'sub'\"\n\t\t\t\t\t\t\t\t(click)=\"menuitem.isCollapsed = !menuitem.isCollapsed\"\n\t\t\t\t\t\t\t\t[attr.aria-expanded]=\"!menuitem.isCollapsed\" \n\t\t\t\t\t\t\t\t[attr.aria-controls]=\"menuitem.collapse\"\n\t\t\t\t\t\t\t\tclass=\"nav-link\"\n\t\t\t\t\t\t\t>\n\t\t\t\t\t\t\t\t<i class=\"ni {{ menuitem.icontype }}\"></i>\n\t\t\t\t\t\t\t\t<span class=\"nav-link-text\">{{ menuitem.title }}</span>\n\t\t\t\t\t\t\t</a>\n\n\t\t\t\t\t\t\t<!--Display the submenu items-->\n\t\t\t\t\t\t\t<div \n\t\t\t\t\t\t\t\tid=\"{{ menuitem.collapse }}\"\n\t\t\t\t\t\t\t\tclass=\"collapse\"\n\t\t\t\t\t\t\t\t*ngIf=\"menuitem.type === 'sub'\"\n\t\t\t\t\t\t\t\t[collapse]=\"menuitem.isCollapsed\" \n\t\t\t\t\t\t\t\t[isAnimated]=\"true\"\n\t\t\t\t\t\t\t>\n\t\t\t\t\t\t\t\t<ul class=\"nav nav-sm flex-column\">\n\t\t\t\t\t\t\t\t\t<li *ngFor=\"let childitems of menuitem.children\" class=\"nav-item\">\n\t\t\t\t\t\t\t\t\t\t<!--If is a single link-->\n\t\t\t\t\t\t\t\t\t\t<a\n\t\t\t\t\t\t\t\t\t\t\trouterLinkActive=\"active\"\n\t\t\t\t\t\t\t\t\t\t\t[routerLink]=\"[menuitem.path, childitems.path]\"\n\t\t\t\t\t\t\t\t\t\t\tclass=\"nav-link\" *ngIf=\"childitems.type === 'link'\"\n\t\t\t\t\t\t\t\t\t\t>\n\t\t\t\t\t\t\t\t\t\t\t{{ childitems.title }}\n\t\t\t\t\t\t\t\t\t\t</a>\n\t\t\t\t\t\t\t\t\t\t<!--If it have a submenu-->\n\t\t\t\t\t\t\t\t\t\t<a \n\t\t\t\t\t\t\t\t\t\t\tdata-toggle=\"collapse\"\n\t\t\t\t\t\t\t\t\t\t\t(click)=\"childitems.isCollapsed = !childitems.isCollapsed\"\n\t\t\t\t\t\t\t\t\t\t\t[attr.aria-expanded]=\"!childitems.isCollapsed\"\n\t\t\t\t\t\t\t\t\t\t\t[attr.aria-controls]=\"childitems.collapse\"\n\t\t\t\t\t\t\t\t\t\t\t*ngIf=\"childitems.type === 'sub'\"\n\t\t\t\t\t\t\t\t\t\t\tclass=\"nav-link\"\n\t\t\t\t\t\t\t\t\t\t>\n\t\t\t\t\t\t\t\t\t\t\t{{ childitems.title }}\n\t\t\t\t\t\t\t\t\t\t</a>\n\t\t\t\t\t\t\t\t\t\t<!--Display the submenu items-->\n\t\t\t\t\t\t\t\t\t\t<div\n\t\t\t\t\t\t\t\t\t\t\tid=\"{{ childitems.collapse }}\"\n\t\t\t\t\t\t\t\t\t\t\tclass=\"collapse\"\n\t\t\t\t\t\t\t\t\t\t\t*ngIf=\"childitems.type === 'sub'\"\n\t\t\t\t\t\t\t\t\t\t\t[collapse]=\"childitems.isCollapsed\"\n\t\t\t\t\t\t\t\t\t\t\t[isAnimated]=\"true\"\n\t\t\t\t\t\t\t\t\t\t>\n\t\t\t\t\t\t\t\t\t\t\t<ul class=\"nav\">\n\t\t\t\t\t\t\t\t\t\t\t\t<li *ngFor=\"let childitem of childitems.children\" class=\"nav-item\">\n\t\t\t\t\t\t\t\t\t\t\t\t\t<a \n\t\t\t\t\t\t\t\t\t\t\t\t\t\t[routerLink]=\"[menuitem.path, childitems.path, childitem.path]\" \n\t\t\t\t\t\t\t\t\t\t\t\t\t\tclass=\"nav-link\"\n\t\t\t\t\t\t\t\t\t\t\t\t\t>\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t{{ childitem.title }}\n\t\t\t\t\t\t\t\t\t\t\t\t\t</a>\n\t\t\t\t\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t\t\t\t</ul>\n\t\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t</ul>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</li>\n\t\t\t\t\t</ul>\n\t\t\t\t\t<!-- Divider -->\n\t\t\t\t\t<hr class=\"my-3\" />\n\t\t\t\t\t<ul class=\"navbar-nav\">\n\t\t\t\t\t\t<li class=\"nav-item pointer\">\n\t\t\t\t\t\t\t<a \n\t\t\t\t\t\t\t\trouterLinkActive=\"active\"\n\t\t\t\t\t\t\t\t(click)=\"logout()\"\n\t\t\t\t\t\t\t\tclass=\"nav-link\"\n\t\t\t\t\t\t\t>\n\t\t\t\t\t\t\t\t<i class=\"fas fa-door-open text-black\"></i>\n\t\t\t\t\t\t\t\t<span class=\"nav-link-text\">Log keluar</span>\n\t\t\t\t\t\t\t</a>\n\t\t\t\t\t\t</li>\n\t\t\t\t\t</ul>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</perfect-scrollbar>\n</nav>");

/***/ }),

/***/ "./node_modules/raw-loader/dist/cjs.js!./src/app/components/vector-map/vector-map.component.html":
/*!*******************************************************************************************************!*\
  !*** ./node_modules/raw-loader/dist/cjs.js!./src/app/components/vector-map/vector-map.component.html ***!
  \*******************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("<dx-vector-map\n  id=\"vector-map\"\n  [bounds]=\"[0, 0, 0, 0]\"\n  (onClick)=\"click($event)\"\n>\n  <dxo-tooltip [enabled]=\"true\" [customizeTooltip]=\"customizeTooltip\">\n    <dxo-font color=\"#fff\"></dxo-font>\n    <dxo-border [visible]=\"false\"></dxo-border>\n  </dxo-tooltip>\n  <dxi-layer [dataSource]=\"worldMap\" [customize]=\"customizeLayers\"> </dxi-layer>\n</dx-vector-map>\n");

/***/ }),

/***/ "./node_modules/raw-loader/dist/cjs.js!./src/app/dashboard/dashboard.component.html":
/*!******************************************************************************************!*\
  !*** ./node_modules/raw-loader/dist/cjs.js!./src/app/dashboard/dashboard.component.html ***!
  \******************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("<p>dashboard works!</p>\n");

/***/ }),

/***/ "./node_modules/raw-loader/dist/cjs.js!./src/app/examples/presentation/presentation.component.html":
/*!*********************************************************************************************************!*\
  !*** ./node_modules/raw-loader/dist/cjs.js!./src/app/examples/presentation/presentation.component.html ***!
  \*********************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("<nav\n  id=\"navbar-main\"\n  class=\"navbar navbar-horizontal navbar-main navbar-expand-lg navbar-dark bg-danger\"\n>\n  <div class=\"container\">\n    <a class=\"navbar-brand\" [routerLink]=\"['/dashboards/dashboard']\">\n      <img src=\"assets/img/brand/white.png\" />\n    </a>\n    <button\n      class=\"navbar-toggler\"\n      type=\"button\"\n      data-toggle=\"collapse\"\n      data-target=\"#navbar-collapse\"\n      aria-expanded=\"false\"\n      aria-label=\"Toggle navigation\"\n      (click)=\"isCollapsed = !isCollapsed\"\n      [attr.aria-expanded]=\"!isCollapsed\" aria-controls=\"collapseBasic\"\n    >\n      <span class=\"navbar-toggler-icon\"></span>\n    </button>\n    <div\n      class=\"navbar-collapse navbar-custom-collapse collapse\"\n      id=\"collapseBasic\" [collapse]=\"isCollapsed\"\n    >\n      <div class=\"navbar-collapse-header\">\n        <div class=\"row\">\n          <div class=\"col-6 collapse-brand\">\n            <a [routerLink]=\"['/dashboards/dashboard']\">\n              <img src=\"assets/img/brand/blue.png\" />\n            </a>\n          </div>\n          <div class=\"col-6 collapse-close\">\n            <button\n              type=\"button\"\n              class=\"navbar-toggler\"\n              data-toggle=\"collapse\"\n              data-target=\"#navbar-collapse\"\n              aria-controls=\"navbar-collapse\"\n              aria-expanded=\"false\"\n              aria-label=\"Toggle navigation\"\n              (click)=\"isCollapsed = !isCollapsed\"\n            >\n              <span></span> <span></span>\n            </button>\n          </div>\n        </div>\n      </div>\n      <ul class=\"navbar-nav mr-auto\">\n        <li class=\"nav-item\">\n          <a\n            class=\"nav-link\"\n            routerLinkActive=\"active\"\n            [routerLink]=\"['/dashboards/dashboard']\"\n          >\n            <span class=\"nav-link-inner--text\">Dashboard</span>\n          </a>\n        </li>\n        <li class=\"nav-item\">\n          <a\n            class=\"nav-link\"\n            routerLinkActive=\"active\"\n            [routerLink]=\"['/examples/pricing']\"\n          >\n            <span class=\"nav-link-inner--text\">Pricing</span>\n          </a>\n        </li>\n        <li class=\"nav-item\">\n          <a\n            class=\"nav-link\"\n            routerLinkActive=\"active\"\n            [routerLink]=\"['/examples/login']\"\n          >\n            <span class=\"nav-link-inner--text\">Login</span>\n          </a>\n        </li>\n        <li class=\"nav-item\">\n          <a\n            class=\"nav-link\"\n            routerLinkActive=\"active\"\n            [routerLink]=\"['/examples/register']\"\n          >\n            <span class=\"nav-link-inner--text\">Register</span>\n          </a>\n        </li>\n        <li class=\"nav-item\">\n          <a\n            class=\"nav-link\"\n            routerLinkActive=\"active\"\n            [routerLink]=\"['/examples/lock']\"\n          >\n            <span class=\"nav-link-inner--text\">Lock</span>\n          </a>\n        </li>\n      </ul>\n      <hr class=\"d-lg-none\" />\n      <ul class=\"navbar-nav align-items-lg-center ml-lg-auto\">\n        <li class=\"nav-item\">\n          <a\n            class=\"nav-link nav-link-icon\"\n            href=\"https://www.facebook.com/creativetim\"\n            target=\"_blank\"\n            tooltip=\"Like us on Facebook\"\n          >\n            <i class=\"fab fa-facebook-square\"></i>\n            <span class=\"nav-link-inner--text d-lg-none\">Facebook</span>\n          </a>\n        </li>\n        <li class=\"nav-item\">\n          <a\n            class=\"nav-link nav-link-icon\"\n            href=\"https://www.instagram.com/creativetimofficial\"\n            target=\"_blank\"\n            tooltip=\"Follow us on Instagram\"\n          >\n            <i class=\"fab fa-instagram\"></i>\n            <span class=\"nav-link-inner--text d-lg-none\">Instagram</span>\n          </a>\n        </li>\n        <li class=\"nav-item\">\n          <a\n            class=\"nav-link nav-link-icon\"\n            href=\"https://twitter.com/creativetim\"\n            target=\"_blank\"\n            tooltip=\"Follow us on Twitter\"\n          >\n            <i class=\"fab fa-twitter-square\"></i>\n            <span class=\"nav-link-inner--text d-lg-none\">Twitter</span>\n          </a>\n        </li>\n        <li class=\"nav-item\">\n          <a\n            class=\"nav-link nav-link-icon\"\n            href=\"https://github.com/creativetimofficial\"\n            target=\"_blank\"\n            tooltip=\"Star us on Github\"\n          >\n            <i class=\"fab fa-github\"></i>\n            <span class=\"nav-link-inner--text d-lg-none\">Github</span>\n          </a>\n        </li>\n        <li class=\"nav-item d-none d-lg-block ml-lg-4\">\n          <a\n            href=\"https://www.creative-tim.com/product/argon-dashboard-pro-angular?ref=adpa-presentation-page\"\n            target=\"_blank\"\n            class=\"btn btn-neutral btn-icon\"\n          >\n            <span class=\"btn-inner--icon\">\n              <i class=\"fas fa-shopping-cart mr-2\"></i>\n            </span>\n            <span class=\"nav-link-inner--text\">Purchase now</span>\n          </a>\n        </li>\n      </ul>\n    </div>\n  </div>\n</nav>\n<div class=\"main-content\">\n  <!-- Header -->\n  <div class=\"header bg-danger pt-5 pb-7\">\n    <div class=\"container\">\n      <div class=\"header-body\">\n        <div class=\"row align-items-center\">\n          <div class=\"col-lg-6\">\n            <div class=\"pr-5\">\n              <h1 class=\"display-2 text-white font-weight-bold mb-0\">\n                Argon Dashboard PRO Angular\n              </h1>\n              <h2 class=\"display-4 text-white font-weight-light\">\n                A beautiful premium dashboard for Bootstrap 4 and Angular.\n              </h2>\n              <p class=\"text-white mt-4\">\n                Argon perfectly combines reusable HTML and modular CSS with a\n                modern styling and beautiful markup throughout each HTML\n                template in the pack.\n              </p>\n              <div class=\"mt-5\">\n                <a\n                  [routerLink]=\"['/dashboards/dashboard']\"\n                  class=\"btn btn-neutral my-2\"\n                  >Explore Dashboard</a\n                >\n                <a\n                  href=\"https://www.creative-tim.com/product/argon-dashboard-pro-angular?ref=adpa-presentation-page\"\n                  class=\"btn btn-default my-2\"\n                  >Purchase now</a\n                >\n              </div>\n            </div>\n          </div>\n          <div class=\"col-lg-6\">\n            <div class=\"row pt-5\">\n              <div class=\"col-md-6\">\n                <div class=\"card\">\n                  <div class=\"card-body\">\n                    <div\n                      class=\"icon icon-shape bg-gradient-red text-white rounded-circle shadow mb-4\"\n                    >\n                      <i class=\"ni ni-active-40\"></i>\n                    </div>\n                    <h5 class=\"h3\">Components</h5>\n                    <p>Argon comes with over 70 handcrafted components.</p>\n                  </div>\n                </div>\n                <div class=\"card\">\n                  <div class=\"card-body\">\n                    <div\n                      class=\"icon icon-shape bg-gradient-info text-white rounded-circle shadow mb-4\"\n                    >\n                      <i class=\"ni ni-active-40\"></i>\n                    </div>\n                    <h5 class=\"h3\">Plugins</h5>\n                    <p>\n                      Fully integrated and extendable third-party plugins that\n                      you will love.\n                    </p>\n                  </div>\n                </div>\n              </div>\n              <div class=\"col-md-6 pt-lg-5 pt-4\">\n                <div class=\"card mb-4\">\n                  <div class=\"card-body\">\n                    <div\n                      class=\"icon icon-shape bg-gradient-success text-white rounded-circle shadow mb-4\"\n                    >\n                      <i class=\"ni ni-active-40\"></i>\n                    </div>\n                    <h5 class=\"h3\">Pages</h5>\n                    <p>\n                      From simple to complex, you get a beautiful set of 15+\n                      page examples.\n                    </p>\n                  </div>\n                </div>\n                <div class=\"card mb-4\">\n                  <div class=\"card-body\">\n                    <div\n                      class=\"icon icon-shape bg-gradient-warning text-white rounded-circle shadow mb-4\"\n                    >\n                      <i class=\"ni ni-active-40\"></i>\n                    </div>\n                    <h5 class=\"h3\">Documentation</h5>\n                    <p>You will love how easy is to to work with Argon.</p>\n                  </div>\n                </div>\n              </div>\n            </div>\n          </div>\n        </div>\n      </div>\n    </div>\n    <div class=\"separator separator-bottom separator-skew zindex-100\">\n      <svg\n        x=\"0\"\n        y=\"0\"\n        viewBox=\"0 0 2560 100\"\n        preserveAspectRatio=\"none\"\n        version=\"1.1\"\n        xmlns=\"http://www.w3.org/2000/svg\"\n      >\n        <polygon class=\"fill-default\" points=\"2560 0 2560 100 0 100\"></polygon>\n      </svg>\n    </div>\n  </div>\n  <section class=\"py-6 pb-9 bg-default\">\n    <div class=\"container-fluid\">\n      <div class=\"row justify-content-center text-center\">\n        <div class=\"col-md-6\">\n          <h2 class=\"display-3 text-white\">A complete HTML solution</h2>\n          <p class=\"lead text-white\">\n            Argon is a completly new product built on our newest re-built from\n            scratch framework structure that is meant to make our products more\n            intuitive, more adaptive and, needless to say, so much easier to\n            customize. Let Argon amaze you with its cool features and build tools\n            and get your project to a whole new level.\n          </p>\n        </div>\n      </div>\n    </div>\n  </section>\n  <section class=\"section section-lg pt-lg-0 mt--7\">\n    <div class=\"container\">\n      <div class=\"row justify-content-center\">\n        <div class=\"col-lg-12\">\n          <div class=\"row\">\n            <div class=\"col-lg-4\">\n              <div class=\"card card-lift--hover shadow border-0\">\n                <div class=\"card-body py-5\">\n                  <div\n                    class=\"icon icon-shape bg-gradient-primary text-white rounded-circle mb-4\"\n                  >\n                    <i class=\"ni ni-check-bold\"></i>\n                  </div>\n                  <h4 class=\"h3 text-primary text-uppercase\">\n                    Based on Bootstrap 4\n                  </h4>\n                  <p class=\"description mt-3\">\n                    Argon is built on top of the most popular open source\n                    toolkit for developing with HTML, CSS, and JS.\n                  </p>\n                  <div>\n                    <span class=\"badge badge-pill badge-primary mr-1\"\n                      >bootstrap 4</span\n                    >\n                    <span class=\"badge badge-pill badge-primary mr-1\"\n                      >dashboard</span\n                    >\n                    <span class=\"badge badge-pill badge-primary\">template</span>\n                  </div>\n                </div>\n              </div>\n            </div>\n            <div class=\"col-lg-4\">\n              <div class=\"card card-lift--hover shadow border-0\">\n                <div class=\"card-body py-5\">\n                  <div\n                    class=\"icon icon-shape bg-gradient-success text-white rounded-circle mb-4\"\n                  >\n                    <i class=\"ni ni-istanbul\"></i>\n                  </div>\n                  <h4 class=\"h3 text-success text-uppercase\">\n                    Integrated build tools\n                  </h4>\n                  <p class=\"description mt-3\">\n                    Use Argons's included npm and gulp scripts to compile source\n                    code, run tests, and more with just a few simple commands.\n                  </p>\n                  <div>\n                    <span class=\"badge badge-pill badge-success mr-1\">npm</span>\n                    <span class=\"badge badge-pill badge-success mr-1\"\n                      >gulp</span\n                    >\n                    <span class=\"badge badge-pill badge-success\"\n                      >build tools</span\n                    >\n                  </div>\n                </div>\n              </div>\n            </div>\n            <div class=\"col-lg-4\">\n              <div class=\"card card-lift--hover shadow border-0\">\n                <div class=\"card-body py-5\">\n                  <div\n                    class=\"icon icon-shape bg-gradient-warning text-white rounded-circle mb-4\"\n                  >\n                    <i class=\"ni ni-planet\"></i>\n                  </div>\n                  <h4 class=\"h3 text-warning text-uppercase\">\n                    Full Sass support\n                  </h4>\n                  <p class=\"description mt-3\">\n                    Argon makes customization easier than ever before. You get\n                    all the tools to make your website building process a\n                    breeze.\n                  </p>\n                  <div>\n                    <span class=\"badge badge-pill badge-warning mr-1\"\n                      >sass</span\n                    >\n                    <span class=\"badge badge-pill badge-warning mr-1\"\n                      >design</span\n                    >\n                    <span class=\"badge badge-pill badge-warning\"\n                      >customize</span\n                    >\n                  </div>\n                </div>\n              </div>\n            </div>\n          </div>\n        </div>\n      </div>\n    </div>\n  </section>\n  <section class=\"py-6\">\n    <div class=\"container\">\n      <div class=\"row row-grid align-items-center\">\n        <div class=\"col-md-6 order-md-2\">\n          <img src=\"assets/img/theme/landing-1.png\" class=\"img-fluid\" />\n        </div>\n        <div class=\"col-md-6 order-md-1\">\n          <div class=\"pr-md-5\">\n            <h1>Awesome features</h1>\n            <p>\n              This dashboard comes with super cool features that are meant to\n              help in the process. Handcrafted components, page examples and\n              functional widgets are just a few things you will see and love at\n              first sight.\n            </p>\n            <ul class=\"list-unstyled mt-5\">\n              <li class=\"py-2\">\n                <div class=\"d-flex align-items-center\">\n                  <div>\n                    <div class=\"badge badge-circle badge-success mr-3\">\n                      <i class=\"ni ni-settings-gear-65\"></i>\n                    </div>\n                  </div>\n                  <div><h4 class=\"mb-0\">Carefully crafted components</h4></div>\n                </div>\n              </li>\n              <li class=\"py-2\">\n                <div class=\"d-flex align-items-center\">\n                  <div>\n                    <div class=\"badge badge-circle badge-success mr-3\">\n                      <i class=\"ni ni-html5\"></i>\n                    </div>\n                  </div>\n                  <div><h4 class=\"mb-0\">Amazing page examples</h4></div>\n                </div>\n              </li>\n              <li class=\"py-2\">\n                <div class=\"d-flex align-items-center\">\n                  <div>\n                    <div class=\"badge badge-circle badge-success mr-3\">\n                      <i class=\"ni ni-satisfied\"></i>\n                    </div>\n                  </div>\n                  <div><h4 class=\"mb-0\">Super friendly support team</h4></div>\n                </div>\n              </li>\n            </ul>\n          </div>\n        </div>\n      </div>\n    </div>\n  </section>\n  <section class=\"py-6\">\n    <div class=\"container\">\n      <div class=\"row row-grid align-items-center\">\n        <div class=\"col-md-6\">\n          <img src=\"assets/img/theme/landing-2.png\" class=\"img-fluid\" />\n        </div>\n        <div class=\"col-md-6\">\n          <div class=\"pr-md-5\">\n            <h1>Example pages</h1>\n            <p>\n              If you want to get inspiration or just show something directly to\n              your clients, you can jump start your development with our\n              pre-built example pages.\n            </p>\n            <a\n              [routerLink]=\"['/examples/profile']\"\n              class=\"font-weight-bold text-warning mt-5\"\n              >Explore pages</a\n            >\n          </div>\n        </div>\n      </div>\n    </div>\n  </section>\n  <section class=\"py-6\">\n    <div class=\"container\">\n      <div class=\"row row-grid align-items-center\">\n        <div class=\"col-md-6 order-md-2\">\n          <img src=\"assets/img/theme/landing-3.png\" class=\"img-fluid\" />\n        </div>\n        <div class=\"col-md-6 order-md-1\">\n          <div class=\"pr-md-5\">\n            <h1>Lovable widgets and cards</h1>\n            <p>\n              We love cards and everybody on the web seems to. We have gone\n              above and beyond with options for you to organise your\n              information. From cards designed for content, to pricing cards or\n              user profiles, you will have many options to choose from.\n            </p>\n            <a\n              [routerLink]=\"['/widgets']\"\n              class=\"font-weight-bold text-info mt-5\"\n              >Explore widgets</a\n            >\n          </div>\n        </div>\n      </div>\n    </div>\n  </section>\n  <section class=\"py-7 section-nucleo-icons bg-white overflow-hidden\">\n    <div class=\"container\">\n      <div class=\"row justify-content-center\">\n        <div class=\"col-lg-8 text-center\">\n          <h2 class=\"display-3\">Nucleo Icons</h2>\n          <p class=\"lead\">\n            The official package contains over 21.000 icons which are looking\n            great in combination with Argon Design System. Make sure you check\n            all of them and use those that you like the most.\n          </p>\n          <div class=\"btn-wrapper\">\n            <a\n              [routerLink]=\"['/documentation/icons']\"\n              target=\"_blank\"\n              class=\"btn btn-primary\"\n              >View demo icons</a\n            >\n            <a\n              href=\"https://nucleoapp.com/?ref=1712\"\n              target=\"_blank\"\n              class=\"btn btn-default mt-3 mt-md-0\"\n              >View all icons</a\n            >\n          </div>\n        </div>\n      </div>\n      <div class=\"blur--hover\">\n        <a [routerLink]=\"['/documentation/icons']\">\n          <div class=\"icons-container blur-item mt-5\">\n            <!-- Center -->\n            <i class=\"icon ni ni-diamond\"></i>\n            <!-- Right 1 -->\n            <i class=\"icon icon-sm ni ni-album-2\"></i>\n            <i class=\"icon icon-sm ni ni-app\"></i>\n            <i class=\"icon icon-sm ni ni-atom\"></i>\n            <!-- Right 2 -->\n            <i class=\"icon ni ni-bag-17\"></i>\n            <i class=\"icon ni ni-bell-55\"></i>\n            <i class=\"icon ni ni-credit-card\"></i>\n            <!-- Left 1 -->\n            <i class=\"icon icon-sm ni ni-briefcase-24\"></i>\n            <i class=\"icon icon-sm ni ni-building\"></i>\n            <i class=\"icon icon-sm ni ni-button-play\"></i>\n            <!-- Left 2 -->\n            <i class=\"icon ni ni-calendar-grid-58\"></i>\n            <i class=\"icon ni ni-camera-compact\"></i>\n            <i class=\"icon ni ni-chart-bar-32\"></i>\n          </div>\n          <span class=\"blur-hidden h5 text-success\"\n            >Explore all the 21.000+ Nucleo Icons</span\n          >\n        </a>\n      </div>\n    </div>\n  </section>\n  <section class=\"py-7\">\n    <div class=\"container\">\n      <div class=\"row row-grid justify-content-center\">\n        <div class=\"col-lg-8 text-center\">\n          <h2 class=\"display-3\">\n            Do you love this awesome\n            <span class=\"text-success\">Dashboard for Bootstrap 4?</span>\n          </h2>\n          <p class=\"lead\">\n            Cause if you do, it can be yours now. Hit the button below to\n            navigate to get the free version or purchase a license for your next\n            project. Build a new web app or give an old Bootstrap project a new\n            look!\n          </p>\n          <div class=\"btn-wrapper\">\n            <a\n              href=\"https://www.creative-tim.com/product/argon-dashboard-angular?ref=adpa-presentation-page\"\n              class=\"btn btn-neutral mb-3 mb-sm-0\"\n              target=\"_blank\"\n            >\n              <span class=\"btn-inner--text\">Get FREE version</span>\n            </a>\n            <a\n              href=\"https://www.creative-tim.com/product/argon-dashboard-pro-angular?ref=adpa-presentation-page\"\n              class=\"btn btn-primary btn-icon mb-3 mb-sm-0\"\n            >\n              <span class=\"btn-inner--icon\"><i class=\"ni ni-basket\"></i></span>\n              <span class=\"btn-inner--text\">Purchase now</span>\n              <span\n                class=\"badge badge-md badge-pill badge-floating badge-danger border-white\"\n                >$89</span\n              >\n            </a>\n          </div>\n          <div class=\"text-center\">\n            <h4 class=\"display-4 mb-5 mt-5\">Available on these technologies</h4>\n            <div class=\"row justify-content-center\">\n              <div class=\"my-2 col-3 col-md-2\">\n                <a\n                  href=\" https://www.creative-tim.com/product/argon-dashboard-pro-angular?ref=adpa-presentation-page\"\n                  target=\"_blank\"\n                  tooltip=\"Angular - One framework. Mobile &amp; desktop\"\n                >\n                  <img\n                    src=\"https://s3.amazonaws.com/creativetim_bucket/tim_static_images/presentation-page/angular.jpg\"\n                    class=\"img-fluid rounded-circle\"\n                  />\n                </a>\n              </div>\n              <div class=\"my-2 col-3 col-md-2\">\n                <a\n                  href=\"https://www.creative-tim.com/product/argon-dashboard-pro?ref=adpa-presentation-page\"\n                  target=\"_blank\"\n                  tooltip=\"Bootstrap 4 - Most popular front-end component library\"\n                >\n                  <img\n                    src=\"https://s3.amazonaws.com/creativetim_bucket/tim_static_images/presentation-page/bootstrap.jpg\"\n                    class=\"img-fluid rounded-circle shadow shadow-lg--hover\"\n                  />\n                </a>\n              </div>\n\n              <div class=\"my-2 col-3 col-md-2\">\n                <a\n                  href=\" https://www.creative-tim.com/product/argon-dashboard-pro-react?ref=adpa-presentation-page\"\n                  target=\"_blank\"\n                  tooltip=\"React - A JavaScript library for building user interfaces\"\n                >\n                  <img\n                    src=\"https://s3.amazonaws.com/creativetim_bucket/tim_static_images/presentation-page/react.jpg\"\n                    class=\"img-fluid rounded-circle\"\n                  />\n                </a>\n              </div>\n              <div class=\"my-2 col-3 col-md-2\">\n                <a\n                  href=\" https://www.creative-tim.com/product/argon-dashboard-pro-laravel?ref=adpa-presentation-page\"\n                  target=\"_blank\"\n                  tooltip=\"Laravel - The PHP Framework For Web Artisans\"\n                >\n                  <img\n                    src=\"https://raw.githubusercontent.com/creativetimofficial/public-assets/master/logos/laravel_logo.png\"\n                    class=\"img-fluid rounded-circle\"\n                  />\n                </a>\n              </div>\n              <div class=\"my-2 col-3 col-md-2\">\n                <a\n                  href=\" https://www.creative-tim.com/product/argon-dashboard-pro-nodejs?ref=adpa-presentation-page\"\n                  target=\"_blank\"\n                  tooltip=\"Node.js - a JavaScript runtime built on Chrome's V8 JavaScript engine\"\n                >\n                  <img\n                    src=\"https://raw.githubusercontent.com/creativetimofficial/public-assets/master/logos/nodejs-logo.jpg\"\n                    class=\"img-fluid rounded-circle\"\n                  />\n                </a>\n              </div>\n              <div class=\"my-2 col-3 col-md-2\">\n                <a\n                  href=\" https://www.creative-tim.com/product/vue-argon-dashboard-pro?ref=adpa-presentation-page\"\n                  target=\"_blank\"\n                  tooltip=\"Vue.js - The progressive javascript framework\"\n                >\n                  <img\n                    src=\"https://s3.amazonaws.com/creativetim_bucket/tim_static_images/presentation-page/vue.jpg\"\n                    class=\"img-fluid rounded-circle\"\n                  />\n                </a>\n              </div>\n              <div class=\"my-2 col-3 col-md-2\">\n                <a\n                  href=\" https://www.creative-tim.com/product/argon-dashboard-pro-angular?ref=adpa-presentation-page\"\n                  target=\"_blank\"\n                  tooltip=\"Sketch - Digital design toolkit\"\n                >\n                  <img\n                    src=\"https://s3.amazonaws.com/creativetim_bucket/tim_static_images/presentation-page/sketch.jpg\"\n                    class=\"img-fluid rounded-circle\"\n                  />\n                </a>\n              </div>\n              <div class=\"my-2 col-3 col-md-2\">\n                <a\n                  href=\" https://www.adobe.com/products/photoshop.html?ref=adpa-presentation-page\"\n                  target=\"_blank\"\n                  tooltip=\"[Coming Soon] Adobe Photoshop - Software for digital images manipulation\"\n                >\n                  <img\n                    src=\"https://s3.amazonaws.com/creativetim_bucket/tim_static_images/presentation-page/ps.jpg\"\n                    class=\"img-fluid rounded-circle opacity-3\"\n                  />\n                </a>\n              </div>\n            </div>\n            <div class=\"spinner-border\" role=\"status\">\n              <span class=\"sr-only\">Loading...</span>\n            </div>\n          </div>\n        </div>\n      </div>\n    </div>\n  </section>\n</div>\n<!-- Footer -->\n<footer class=\"py-5\" id=\"footer-main\">\n  <div class=\"container\">\n    <div class=\"row align-items-center justify-content-xl-between\">\n      <div class=\"col-xl-6\">\n        <div class=\"copyright text-center text-xl-left text-muted\">\n          &copy; {{ test | date: \"yyyy\" }}\n          <a\n            href=\"https://www.creative-tim.com?ref=adpa-presentation-page\"\n            class=\"font-weight-bold ml-1\"\n            target=\"_blank\"\n            >Creative Tim</a\n          >\n        </div>\n      </div>\n      <div class=\"col-xl-6\">\n        <ul\n          class=\"nav nav-footer justify-content-center justify-content-xl-end\"\n        >\n          <li class=\"nav-item\">\n            <a\n              href=\"https://www.creative-tim.com?ref=adpa-presentation-page\"\n              class=\"nav-link\"\n              target=\"_blank\"\n              >Creative Tim</a\n            >\n          </li>\n          <li class=\"nav-item\">\n            <a\n              href=\"https://www.creative-tim.com/presentation?ref=adpa-presentation-page\"\n              class=\"nav-link\"\n              target=\"_blank\"\n              >About Us</a\n            >\n          </li>\n          <li class=\"nav-item\">\n            <a\n              href=\"http://blog.creative-tim.com?ref=adpa-presentation-page\"\n              class=\"nav-link\"\n              target=\"_blank\"\n              >Blog</a\n            >\n          </li>\n          <li class=\"nav-item\">\n            <a\n              href=\"https://www.creative-tim.com/license?ref=adpa-presentation-page\"\n              class=\"nav-link\"\n              target=\"_blank\"\n              >License</a\n            >\n          </li>\n        </ul>\n      </div>\n    </div>\n  </div>\n</footer>\n");

/***/ }),

/***/ "./node_modules/raw-loader/dist/cjs.js!./src/app/layouts/admin-layout/admin-layout.component.html":
/*!********************************************************************************************************!*\
  !*** ./node_modules/raw-loader/dist/cjs.js!./src/app/layouts/admin-layout/admin-layout.component.html ***!
  \********************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("<!-- Sidenav -->\n<div class=\"\" (window:resize)=\"isMobile($event)\">\n  <app-sidebar\n    [ngClass]=\"{ 'sidenav fixed-left': isMobileResolution === false }\"\n  ></app-sidebar>\n  <div class=\"main-content\">\n    <!-- Top navbar -->\n    <app-navbar></app-navbar>\n    <!-- Pages -->\n    <router-outlet></router-outlet>\n    <app-footer></app-footer>\n  </div>\n</div>\n");

/***/ }),

/***/ "./node_modules/raw-loader/dist/cjs.js!./src/app/layouts/auth-layout/auth-layout.component.html":
/*!******************************************************************************************************!*\
  !*** ./node_modules/raw-loader/dist/cjs.js!./src/app/layouts/auth-layout/auth-layout.component.html ***!
  \******************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("<app-navbar2></app-navbar2>\n\n<router-outlet></router-outlet>\n\n<app-footer2></app-footer2>\n");

/***/ }),

/***/ "./node_modules/tslib/tslib.es6.js":
/*!*****************************************!*\
  !*** ./node_modules/tslib/tslib.es6.js ***!
  \*****************************************/
/*! exports provided: __extends, __assign, __rest, __decorate, __param, __metadata, __awaiter, __generator, __createBinding, __exportStar, __values, __read, __spread, __spreadArrays, __spreadArray, __await, __asyncGenerator, __asyncDelegator, __asyncValues, __makeTemplateObject, __importStar, __importDefault, __classPrivateFieldGet, __classPrivateFieldSet */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__extends", function() { return __extends; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__assign", function() { return __assign; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__rest", function() { return __rest; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__decorate", function() { return __decorate; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__param", function() { return __param; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__metadata", function() { return __metadata; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__awaiter", function() { return __awaiter; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__generator", function() { return __generator; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__createBinding", function() { return __createBinding; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__exportStar", function() { return __exportStar; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__values", function() { return __values; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__read", function() { return __read; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__spread", function() { return __spread; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__spreadArrays", function() { return __spreadArrays; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__spreadArray", function() { return __spreadArray; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__await", function() { return __await; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__asyncGenerator", function() { return __asyncGenerator; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__asyncDelegator", function() { return __asyncDelegator; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__asyncValues", function() { return __asyncValues; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__makeTemplateObject", function() { return __makeTemplateObject; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__importStar", function() { return __importStar; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__importDefault", function() { return __importDefault; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__classPrivateFieldGet", function() { return __classPrivateFieldGet; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__classPrivateFieldSet", function() { return __classPrivateFieldSet; });
/*! *****************************************************************************
Copyright (c) Microsoft Corporation.

Permission to use, copy, modify, and/or distribute this software for any
purpose with or without fee is hereby granted.

THE SOFTWARE IS PROVIDED "AS IS" AND THE AUTHOR DISCLAIMS ALL WARRANTIES WITH
REGARD TO THIS SOFTWARE INCLUDING ALL IMPLIED WARRANTIES OF MERCHANTABILITY
AND FITNESS. IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR ANY SPECIAL, DIRECT,
INDIRECT, OR CONSEQUENTIAL DAMAGES OR ANY DAMAGES WHATSOEVER RESULTING FROM
LOSS OF USE, DATA OR PROFITS, WHETHER IN AN ACTION OF CONTRACT, NEGLIGENCE OR
OTHER TORTIOUS ACTION, ARISING OUT OF OR IN CONNECTION WITH THE USE OR
PERFORMANCE OF THIS SOFTWARE.
***************************************************************************** */
/* global Reflect, Promise */

var extendStatics = function(d, b) {
    extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (Object.prototype.hasOwnProperty.call(b, p)) d[p] = b[p]; };
    return extendStatics(d, b);
};

function __extends(d, b) {
    if (typeof b !== "function" && b !== null)
        throw new TypeError("Class extends value " + String(b) + " is not a constructor or null");
    extendStatics(d, b);
    function __() { this.constructor = d; }
    d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
}

var __assign = function() {
    __assign = Object.assign || function __assign(t) {
        for (var s, i = 1, n = arguments.length; i < n; i++) {
            s = arguments[i];
            for (var p in s) if (Object.prototype.hasOwnProperty.call(s, p)) t[p] = s[p];
        }
        return t;
    }
    return __assign.apply(this, arguments);
}

function __rest(s, e) {
    var t = {};
    for (var p in s) if (Object.prototype.hasOwnProperty.call(s, p) && e.indexOf(p) < 0)
        t[p] = s[p];
    if (s != null && typeof Object.getOwnPropertySymbols === "function")
        for (var i = 0, p = Object.getOwnPropertySymbols(s); i < p.length; i++) {
            if (e.indexOf(p[i]) < 0 && Object.prototype.propertyIsEnumerable.call(s, p[i]))
                t[p[i]] = s[p[i]];
        }
    return t;
}

function __decorate(decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
}

function __param(paramIndex, decorator) {
    return function (target, key) { decorator(target, key, paramIndex); }
}

function __metadata(metadataKey, metadataValue) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(metadataKey, metadataValue);
}

function __awaiter(thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
}

function __generator(thisArg, body) {
    var _ = { label: 0, sent: function() { if (t[0] & 1) throw t[1]; return t[1]; }, trys: [], ops: [] }, f, y, t, g;
    return g = { next: verb(0), "throw": verb(1), "return": verb(2) }, typeof Symbol === "function" && (g[Symbol.iterator] = function() { return this; }), g;
    function verb(n) { return function (v) { return step([n, v]); }; }
    function step(op) {
        if (f) throw new TypeError("Generator is already executing.");
        while (_) try {
            if (f = 1, y && (t = op[0] & 2 ? y["return"] : op[0] ? y["throw"] || ((t = y["return"]) && t.call(y), 0) : y.next) && !(t = t.call(y, op[1])).done) return t;
            if (y = 0, t) op = [op[0] & 2, t.value];
            switch (op[0]) {
                case 0: case 1: t = op; break;
                case 4: _.label++; return { value: op[1], done: false };
                case 5: _.label++; y = op[1]; op = [0]; continue;
                case 7: op = _.ops.pop(); _.trys.pop(); continue;
                default:
                    if (!(t = _.trys, t = t.length > 0 && t[t.length - 1]) && (op[0] === 6 || op[0] === 2)) { _ = 0; continue; }
                    if (op[0] === 3 && (!t || (op[1] > t[0] && op[1] < t[3]))) { _.label = op[1]; break; }
                    if (op[0] === 6 && _.label < t[1]) { _.label = t[1]; t = op; break; }
                    if (t && _.label < t[2]) { _.label = t[2]; _.ops.push(op); break; }
                    if (t[2]) _.ops.pop();
                    _.trys.pop(); continue;
            }
            op = body.call(thisArg, _);
        } catch (e) { op = [6, e]; y = 0; } finally { f = t = 0; }
        if (op[0] & 5) throw op[1]; return { value: op[0] ? op[1] : void 0, done: true };
    }
}

var __createBinding = Object.create ? (function(o, m, k, k2) {
    if (k2 === undefined) k2 = k;
    Object.defineProperty(o, k2, { enumerable: true, get: function() { return m[k]; } });
}) : (function(o, m, k, k2) {
    if (k2 === undefined) k2 = k;
    o[k2] = m[k];
});

function __exportStar(m, o) {
    for (var p in m) if (p !== "default" && !Object.prototype.hasOwnProperty.call(o, p)) __createBinding(o, m, p);
}

function __values(o) {
    var s = typeof Symbol === "function" && Symbol.iterator, m = s && o[s], i = 0;
    if (m) return m.call(o);
    if (o && typeof o.length === "number") return {
        next: function () {
            if (o && i >= o.length) o = void 0;
            return { value: o && o[i++], done: !o };
        }
    };
    throw new TypeError(s ? "Object is not iterable." : "Symbol.iterator is not defined.");
}

function __read(o, n) {
    var m = typeof Symbol === "function" && o[Symbol.iterator];
    if (!m) return o;
    var i = m.call(o), r, ar = [], e;
    try {
        while ((n === void 0 || n-- > 0) && !(r = i.next()).done) ar.push(r.value);
    }
    catch (error) { e = { error: error }; }
    finally {
        try {
            if (r && !r.done && (m = i["return"])) m.call(i);
        }
        finally { if (e) throw e.error; }
    }
    return ar;
}

/** @deprecated */
function __spread() {
    for (var ar = [], i = 0; i < arguments.length; i++)
        ar = ar.concat(__read(arguments[i]));
    return ar;
}

/** @deprecated */
function __spreadArrays() {
    for (var s = 0, i = 0, il = arguments.length; i < il; i++) s += arguments[i].length;
    for (var r = Array(s), k = 0, i = 0; i < il; i++)
        for (var a = arguments[i], j = 0, jl = a.length; j < jl; j++, k++)
            r[k] = a[j];
    return r;
}

function __spreadArray(to, from) {
    for (var i = 0, il = from.length, j = to.length; i < il; i++, j++)
        to[j] = from[i];
    return to;
}

function __await(v) {
    return this instanceof __await ? (this.v = v, this) : new __await(v);
}

function __asyncGenerator(thisArg, _arguments, generator) {
    if (!Symbol.asyncIterator) throw new TypeError("Symbol.asyncIterator is not defined.");
    var g = generator.apply(thisArg, _arguments || []), i, q = [];
    return i = {}, verb("next"), verb("throw"), verb("return"), i[Symbol.asyncIterator] = function () { return this; }, i;
    function verb(n) { if (g[n]) i[n] = function (v) { return new Promise(function (a, b) { q.push([n, v, a, b]) > 1 || resume(n, v); }); }; }
    function resume(n, v) { try { step(g[n](v)); } catch (e) { settle(q[0][3], e); } }
    function step(r) { r.value instanceof __await ? Promise.resolve(r.value.v).then(fulfill, reject) : settle(q[0][2], r); }
    function fulfill(value) { resume("next", value); }
    function reject(value) { resume("throw", value); }
    function settle(f, v) { if (f(v), q.shift(), q.length) resume(q[0][0], q[0][1]); }
}

function __asyncDelegator(o) {
    var i, p;
    return i = {}, verb("next"), verb("throw", function (e) { throw e; }), verb("return"), i[Symbol.iterator] = function () { return this; }, i;
    function verb(n, f) { i[n] = o[n] ? function (v) { return (p = !p) ? { value: __await(o[n](v)), done: n === "return" } : f ? f(v) : v; } : f; }
}

function __asyncValues(o) {
    if (!Symbol.asyncIterator) throw new TypeError("Symbol.asyncIterator is not defined.");
    var m = o[Symbol.asyncIterator], i;
    return m ? m.call(o) : (o = typeof __values === "function" ? __values(o) : o[Symbol.iterator](), i = {}, verb("next"), verb("throw"), verb("return"), i[Symbol.asyncIterator] = function () { return this; }, i);
    function verb(n) { i[n] = o[n] && function (v) { return new Promise(function (resolve, reject) { v = o[n](v), settle(resolve, reject, v.done, v.value); }); }; }
    function settle(resolve, reject, d, v) { Promise.resolve(v).then(function(v) { resolve({ value: v, done: d }); }, reject); }
}

function __makeTemplateObject(cooked, raw) {
    if (Object.defineProperty) { Object.defineProperty(cooked, "raw", { value: raw }); } else { cooked.raw = raw; }
    return cooked;
};

var __setModuleDefault = Object.create ? (function(o, v) {
    Object.defineProperty(o, "default", { enumerable: true, value: v });
}) : function(o, v) {
    o["default"] = v;
};

function __importStar(mod) {
    if (mod && mod.__esModule) return mod;
    var result = {};
    if (mod != null) for (var k in mod) if (k !== "default" && Object.prototype.hasOwnProperty.call(mod, k)) __createBinding(result, mod, k);
    __setModuleDefault(result, mod);
    return result;
}

function __importDefault(mod) {
    return (mod && mod.__esModule) ? mod : { default: mod };
}

function __classPrivateFieldGet(receiver, privateMap) {
    if (!privateMap.has(receiver)) {
        throw new TypeError("attempted to get private field on non-instance");
    }
    return privateMap.get(receiver);
}

function __classPrivateFieldSet(receiver, privateMap, value) {
    if (!privateMap.has(receiver)) {
        throw new TypeError("attempted to set private field on non-instance");
    }
    privateMap.set(receiver, value);
    return value;
}


/***/ }),

/***/ "./node_modules/webpack/hot sync ^\\.\\/log$":
/*!*************************************************!*\
  !*** (webpack)/hot sync nonrecursive ^\.\/log$ ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var map = {
	"./log": "./node_modules/webpack/hot/log.js"
};


function webpackContext(req) {
	var id = webpackContextResolve(req);
	return __webpack_require__(id);
}
function webpackContextResolve(req) {
	if(!__webpack_require__.o(map, req)) {
		var e = new Error("Cannot find module '" + req + "'");
		e.code = 'MODULE_NOT_FOUND';
		throw e;
	}
	return map[req];
}
webpackContext.keys = function webpackContextKeys() {
	return Object.keys(map);
};
webpackContext.resolve = webpackContextResolve;
module.exports = webpackContext;
webpackContext.id = "./node_modules/webpack/hot sync ^\\.\\/log$";

/***/ }),

/***/ "./src/$$_lazy_route_resource lazy recursive":
/*!**********************************************************!*\
  !*** ./src/$$_lazy_route_resource lazy namespace object ***!
  \**********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var map = {
	"./auth/auth.module": [
		"./src/app/auth/auth.module.ts",
		"default~auth-auth-module~core-admin-admin-module~core-global-global-module~core-user-user-module~pag~a6c98f6f",
		"auth-auth-module"
	],
	"./core/admin/admin.module": [
		"./src/app/core/admin/admin.module.ts",
		"default~core-admin-admin-module~core-global-global-module~core-user-user-module~examples-tables-tabl~55a4efd1",
		"default~auth-auth-module~core-admin-admin-module~core-global-global-module~core-user-user-module~pag~a6c98f6f",
		"default~core-admin-admin-module~examples-charts-charts-module~examples-dashboards-dashboards-module~~33d563e1",
		"default~core-admin-admin-module~core-user-user-module~examples-forms-forms-module",
		"default~core-admin-admin-module~core-user-user-module",
		"core-admin-admin-module"
	],
	"./core/global/global.module": [
		"./src/app/core/global/global.module.ts",
		"default~core-admin-admin-module~core-global-global-module~core-user-user-module~examples-tables-tabl~55a4efd1",
		"default~auth-auth-module~core-admin-admin-module~core-global-global-module~core-user-user-module~pag~a6c98f6f",
		"core-global-global-module"
	],
	"./core/user/user.module": [
		"./src/app/core/user/user.module.ts",
		"default~core-admin-admin-module~core-global-global-module~core-user-user-module~examples-tables-tabl~55a4efd1",
		"default~auth-auth-module~core-admin-admin-module~core-global-global-module~core-user-user-module~pag~a6c98f6f",
		"default~core-admin-admin-module~core-user-user-module~examples-forms-forms-module",
		"default~core-admin-admin-module~core-user-user-module",
		"core-user-user-module"
	],
	"./examples/calendar/calendar.module": [
		"./src/app/examples/calendar/calendar.module.ts",
		"default~examples-calendar-calendar-module~examples-widgets-widgets-module",
		"examples-calendar-calendar-module"
	],
	"./examples/charts/charts.module": [
		"./src/app/examples/charts/charts.module.ts",
		"default~core-admin-admin-module~examples-charts-charts-module~examples-dashboards-dashboards-module~~33d563e1",
		"default~examples-charts-charts-module~examples-dashboards-dashboards-module",
		"examples-charts-charts-module"
	],
	"./examples/components/components.module": [
		"./src/app/examples/components/components.module.ts",
		"examples-components-components-module"
	],
	"./examples/dashboards/dashboards.module": [
		"./src/app/examples/dashboards/dashboards.module.ts",
		"default~core-admin-admin-module~examples-charts-charts-module~examples-dashboards-dashboards-module~~33d563e1",
		"default~examples-charts-charts-module~examples-dashboards-dashboards-module",
		"examples-dashboards-dashboards-module"
	],
	"./examples/examples/examples.module": [
		"./src/app/examples/examples/examples.module.ts",
		"examples-examples-examples-module"
	],
	"./examples/forms/forms.module": [
		"./src/app/examples/forms/forms.module.ts",
		"default~core-admin-admin-module~core-user-user-module~examples-forms-forms-module",
		"examples-forms-forms-module"
	],
	"./examples/maps/maps.module": [
		"./src/app/examples/maps/maps.module.ts",
		"examples-maps-maps-module"
	],
	"./examples/tables/tables.module": [
		"./src/app/examples/tables/tables.module.ts",
		"default~core-admin-admin-module~core-global-global-module~core-user-user-module~examples-tables-tabl~55a4efd1",
		"examples-tables-tables-module"
	],
	"./examples/widgets/widgets.module": [
		"./src/app/examples/widgets/widgets.module.ts",
		"default~core-admin-admin-module~examples-charts-charts-module~examples-dashboards-dashboards-module~~33d563e1",
		"default~examples-calendar-calendar-module~examples-widgets-widgets-module",
		"examples-widgets-widgets-module"
	],
	"./layouts/auth-layout/auth-layout.module": [
		"./src/app/layouts/auth-layout/auth-layout.module.ts",
		"layouts-auth-layout-auth-layout-module"
	],
	"./pages/pages.module": [
		"./src/app/pages/pages.module.ts",
		"default~core-admin-admin-module~core-global-global-module~core-user-user-module~examples-tables-tabl~55a4efd1",
		"default~auth-auth-module~core-admin-admin-module~core-global-global-module~core-user-user-module~pag~a6c98f6f",
		"pages-pages-module"
	]
};
function webpackAsyncContext(req) {
	if(!__webpack_require__.o(map, req)) {
		return Promise.resolve().then(function() {
			var e = new Error("Cannot find module '" + req + "'");
			e.code = 'MODULE_NOT_FOUND';
			throw e;
		});
	}

	var ids = map[req], id = ids[0];
	return Promise.all(ids.slice(1).map(__webpack_require__.e)).then(function() {
		return __webpack_require__(id);
	});
}
webpackAsyncContext.keys = function webpackAsyncContextKeys() {
	return Object.keys(map);
};
webpackAsyncContext.id = "./src/$$_lazy_route_resource lazy recursive";
module.exports = webpackAsyncContext;

/***/ }),

/***/ "./src/app/app-routing.module.ts":
/*!***************************************!*\
  !*** ./src/app/app-routing.module.ts ***!
  \***************************************/
/*! exports provided: AppRoutingModule */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "AppRoutingModule", function() { return AppRoutingModule; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm5/core.js");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/__ivy_ngcc__/fesm5/router.js");
/* harmony import */ var _layouts_admin_layout_admin_layout_component__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./layouts/admin-layout/admin-layout.component */ "./src/app/layouts/admin-layout/admin-layout.component.ts");
/* harmony import */ var _layouts_auth_layout_auth_layout_component__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./layouts/auth-layout/auth-layout.component */ "./src/app/layouts/auth-layout/auth-layout.component.ts");
/* harmony import */ var _examples_presentation_presentation_component__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./examples/presentation/presentation.component */ "./src/app/examples/presentation/presentation.component.ts");






var routes = [
    {
        path: '',
        redirectTo: 'portal',
        pathMatch: 'full'
    },
    {
        path: '',
        loadChildren: './pages/pages.module#PagesModule'
    },
    {
        path: 'presentation',
        component: _examples_presentation_presentation_component__WEBPACK_IMPORTED_MODULE_5__["PresentationComponent"]
    },
    {
        path: '',
        component: _layouts_admin_layout_admin_layout_component__WEBPACK_IMPORTED_MODULE_3__["AdminLayoutComponent"],
        children: [
            {
                path: 'admin',
                loadChildren: './core/admin/admin.module#AdminModule'
            },
            {
                path: 'user',
                loadChildren: './core/user/user.module#UserModule'
            },
            {
                path: 'global',
                loadChildren: './core/global/global.module#GlobalModule'
            },
            // Example
            {
                path: 'dashboards',
                loadChildren: './examples/dashboards/dashboards.module#DashboardsModule'
            },
            {
                path: 'components',
                loadChildren: './examples/components/components.module#ComponentsModule'
            },
            {
                path: 'forms',
                loadChildren: './examples/forms/forms.module#FormsModules'
            },
            {
                path: 'tables',
                loadChildren: './examples/tables/tables.module#TablesModule'
            },
            {
                path: 'maps',
                loadChildren: './examples/maps/maps.module#MapsModule'
            },
            {
                path: 'widgets',
                loadChildren: './examples/widgets/widgets.module#WidgetsModule'
            },
            {
                path: 'charts',
                loadChildren: './examples/charts/charts.module#ChartsModule'
            },
            {
                path: 'calendar',
                loadChildren: './examples/calendar/calendar.module#CalendarModule'
            },
            {
                path: 'examples',
                loadChildren: './examples/examples/examples.module#ExamplesModule'
            }
        ]
    },
    {
        path: '',
        component: _layouts_auth_layout_auth_layout_component__WEBPACK_IMPORTED_MODULE_4__["AuthLayoutComponent"],
        children: [
            {
                path: 'auth',
                loadChildren: './auth/auth.module#AuthModule'
            },
            {
                path: 'examples',
                loadChildren: './layouts/auth-layout/auth-layout.module#AuthLayoutModule'
            }
        ]
    },
    {
        path: '**',
        redirectTo: 'dashboard'
    }
];
var AppRoutingModule = /** @class */ (function () {
    function AppRoutingModule() {
    }
    AppRoutingModule = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["NgModule"])({
            imports: [
                _angular_router__WEBPACK_IMPORTED_MODULE_2__["RouterModule"].forRoot(routes, {
                    useHash: true
                })
            ],
            exports: [_angular_router__WEBPACK_IMPORTED_MODULE_2__["RouterModule"]]
        })
    ], AppRoutingModule);
    return AppRoutingModule;
}());



/***/ }),

/***/ "./src/app/app.component.scss":
/*!************************************!*\
  !*** ./src/app/app.component.scss ***!
  \************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IiIsImZpbGUiOiJzcmMvYXBwL2FwcC5jb21wb25lbnQuc2NzcyJ9 */");

/***/ }),

/***/ "./src/app/app.component.ts":
/*!**********************************!*\
  !*** ./src/app/app.component.ts ***!
  \**********************************/
/*! exports provided: AppComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "AppComponent", function() { return AppComponent; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm5/core.js");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/__ivy_ngcc__/fesm5/router.js");



var AppComponent = /** @class */ (function () {
    function AppComponent(router) {
        this.router = router;
        this.panelOpenState = false;
        this.router.events.subscribe(function (event) {
            if (event instanceof _angular_router__WEBPACK_IMPORTED_MODULE_2__["NavigationStart"]) {
                // Show loading indicator
                window.scrollTo(0, 0);
            }
            if (event instanceof _angular_router__WEBPACK_IMPORTED_MODULE_2__["NavigationEnd"]) {
                // Hide loading indicator
            }
            if (event instanceof _angular_router__WEBPACK_IMPORTED_MODULE_2__["NavigationError"]) {
                // Hide loading indicator
                // Present error to user
                console.log(event.error);
            }
        });
    }
    AppComponent.ctorParameters = function () { return [
        { type: _angular_router__WEBPACK_IMPORTED_MODULE_2__["Router"] }
    ]; };
    AppComponent = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"])({
            selector: "app-root",
            template: Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! raw-loader!./app.component.html */ "./node_modules/raw-loader/dist/cjs.js!./src/app/app.component.html")).default,
            styles: [Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! ./app.component.scss */ "./src/app/app.component.scss")).default]
        }),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"])("design:paramtypes", [_angular_router__WEBPACK_IMPORTED_MODULE_2__["Router"]])
    ], AppComponent);
    return AppComponent;
}());



/***/ }),

/***/ "./src/app/app.module.ts":
/*!*******************************!*\
  !*** ./src/app/app.module.ts ***!
  \*******************************/
/*! exports provided: AppModule */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "AppModule", function() { return AppModule; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_platform_browser_animations__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/platform-browser/animations */ "./node_modules/@angular/platform-browser/__ivy_ngcc__/fesm5/animations.js");
/* harmony import */ var _angular_common__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/common */ "./node_modules/@angular/common/__ivy_ngcc__/fesm5/common.js");
/* harmony import */ var _angular_platform_browser__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @angular/platform-browser */ "./node_modules/@angular/platform-browser/__ivy_ngcc__/fesm5/platform-browser.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm5/core.js");
/* harmony import */ var _angular_forms__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @angular/forms */ "./node_modules/@angular/forms/__ivy_ngcc__/fesm5/forms.js");
/* harmony import */ var _angular_common_http__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @angular/common/http */ "./node_modules/@angular/common/__ivy_ngcc__/fesm5/http.js");
/* harmony import */ var ngx_bootstrap__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ngx-bootstrap */ "./node_modules/ngx-bootstrap/__ivy_ngcc__/esm5/ngx-bootstrap.js");
/* harmony import */ var ngx_bootstrap_accordion__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ngx-bootstrap/accordion */ "./node_modules/ngx-bootstrap/__ivy_ngcc__/accordion/fesm5/ngx-bootstrap-accordion.js");
/* harmony import */ var _angular_material_expansion__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! @angular/material/expansion */ "./node_modules/@angular/material/__ivy_ngcc__/fesm5/expansion.js");
/* harmony import */ var ngx_bootstrap_collapse__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ngx-bootstrap/collapse */ "./node_modules/ngx-bootstrap/__ivy_ngcc__/collapse/fesm5/ngx-bootstrap-collapse.js");
/* harmony import */ var _asymmetrik_ngx_leaflet__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! @asymmetrik/ngx-leaflet */ "./node_modules/@asymmetrik/ngx-leaflet/__ivy_ngcc__/dist/index.js");
/* harmony import */ var ngx_chips__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! ngx-chips */ "./node_modules/ngx-chips/__ivy_ngcc__/fesm5/ngx-chips.js");
/* harmony import */ var ngx_toastr__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! ngx-toastr */ "./node_modules/ngx-toastr/__ivy_ngcc__/fesm5/ngx-toastr.js");
/* harmony import */ var _app_component__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(/*! ./app.component */ "./src/app/app.component.ts");
/* harmony import */ var _layouts_admin_layout_admin_layout_component__WEBPACK_IMPORTED_MODULE_15__ = __webpack_require__(/*! ./layouts/admin-layout/admin-layout.component */ "./src/app/layouts/admin-layout/admin-layout.component.ts");
/* harmony import */ var _layouts_auth_layout_auth_layout_component__WEBPACK_IMPORTED_MODULE_16__ = __webpack_require__(/*! ./layouts/auth-layout/auth-layout.component */ "./src/app/layouts/auth-layout/auth-layout.component.ts");
/* harmony import */ var _examples_presentation_presentation_module__WEBPACK_IMPORTED_MODULE_17__ = __webpack_require__(/*! ./examples/presentation/presentation.module */ "./src/app/examples/presentation/presentation.module.ts");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_18__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/__ivy_ngcc__/fesm5/router.js");
/* harmony import */ var _app_routing_module__WEBPACK_IMPORTED_MODULE_19__ = __webpack_require__(/*! ./app-routing.module */ "./src/app/app-routing.module.ts");
/* harmony import */ var _components_components_module__WEBPACK_IMPORTED_MODULE_20__ = __webpack_require__(/*! ./components/components.module */ "./src/app/components/components.module.ts");
/* harmony import */ var _dashboard_dashboard_component__WEBPACK_IMPORTED_MODULE_21__ = __webpack_require__(/*! ./dashboard/dashboard.component */ "./src/app/dashboard/dashboard.component.ts");






















var AppModule = /** @class */ (function () {
    function AppModule() {
    }
    AppModule = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_4__["NgModule"])({
            imports: [
                _app_routing_module__WEBPACK_IMPORTED_MODULE_19__["AppRoutingModule"],
                _angular_platform_browser_animations__WEBPACK_IMPORTED_MODULE_1__["BrowserAnimationsModule"],
                _angular_common__WEBPACK_IMPORTED_MODULE_2__["CommonModule"],
                _angular_platform_browser__WEBPACK_IMPORTED_MODULE_3__["BrowserModule"],
                _angular_forms__WEBPACK_IMPORTED_MODULE_5__["FormsModule"],
                ngx_bootstrap_accordion__WEBPACK_IMPORTED_MODULE_8__["AccordionModule"].forRoot(),
                _angular_common_http__WEBPACK_IMPORTED_MODULE_6__["HttpClientModule"],
                _components_components_module__WEBPACK_IMPORTED_MODULE_20__["ComponentsModule"],
                _angular_router__WEBPACK_IMPORTED_MODULE_18__["RouterModule"],
                ngx_bootstrap__WEBPACK_IMPORTED_MODULE_7__["BsDropdownModule"].forRoot(),
                ngx_bootstrap_collapse__WEBPACK_IMPORTED_MODULE_10__["CollapseModule"].forRoot(),
                ngx_chips__WEBPACK_IMPORTED_MODULE_12__["TagInputModule"],
                ngx_toastr__WEBPACK_IMPORTED_MODULE_13__["ToastrModule"].forRoot({
                    closeButton: true,
                    timeOut: 3000,
                    progressBar: true,
                    positionClass: 'toast-top-right'
                }),
                _asymmetrik_ngx_leaflet__WEBPACK_IMPORTED_MODULE_11__["LeafletModule"],
                _examples_presentation_presentation_module__WEBPACK_IMPORTED_MODULE_17__["PresentationModule"],
                _angular_material_expansion__WEBPACK_IMPORTED_MODULE_9__["MatExpansionModule"]
            ],
            declarations: [
                _app_component__WEBPACK_IMPORTED_MODULE_14__["AppComponent"],
                _layouts_admin_layout_admin_layout_component__WEBPACK_IMPORTED_MODULE_15__["AdminLayoutComponent"],
                _layouts_auth_layout_auth_layout_component__WEBPACK_IMPORTED_MODULE_16__["AuthLayoutComponent"], _dashboard_dashboard_component__WEBPACK_IMPORTED_MODULE_21__["DashboardComponent"],
            ],
            providers: [
            /* Uncomment this to use interceptor
            {
              provide: HTTP_INTERCEPTORS, useClass: HttpTokenInterceptor, multi: true
            }
            */
            ],
            bootstrap: [_app_component__WEBPACK_IMPORTED_MODULE_14__["AppComponent"]]
        })
    ], AppModule);
    return AppModule;
}());



/***/ }),

/***/ "./src/app/components/components.module.ts":
/*!*************************************************!*\
  !*** ./src/app/components/components.module.ts ***!
  \*************************************************/
/*! exports provided: ComponentsModule */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ComponentsModule", function() { return ComponentsModule; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm5/core.js");
/* harmony import */ var _angular_common__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/common */ "./node_modules/@angular/common/__ivy_ngcc__/fesm5/common.js");
/* harmony import */ var ngx_perfect_scrollbar__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ngx-perfect-scrollbar */ "./node_modules/ngx-perfect-scrollbar/__ivy_ngcc__/fesm5/ngx-perfect-scrollbar.js");
/* harmony import */ var _angular_forms__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @angular/forms */ "./node_modules/@angular/forms/__ivy_ngcc__/fesm5/forms.js");
/* harmony import */ var _sidebar_sidebar_component__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./sidebar/sidebar.component */ "./src/app/components/sidebar/sidebar.component.ts");
/* harmony import */ var _navbar_navbar_component__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./navbar/navbar.component */ "./src/app/components/navbar/navbar.component.ts");
/* harmony import */ var _navbar2_navbar2_component__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./navbar2/navbar2.component */ "./src/app/components/navbar2/navbar2.component.ts");
/* harmony import */ var _footer_footer_component__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./footer/footer.component */ "./src/app/components/footer/footer.component.ts");
/* harmony import */ var _vector_map_vector_map_component__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./vector-map/vector-map.component */ "./src/app/components/vector-map/vector-map.component.ts");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/__ivy_ngcc__/fesm5/router.js");
/* harmony import */ var ngx_bootstrap_collapse__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ngx-bootstrap/collapse */ "./node_modules/ngx-bootstrap/__ivy_ngcc__/collapse/fesm5/ngx-bootstrap-collapse.js");
/* harmony import */ var devextreme_angular__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! devextreme-angular */ "./node_modules/devextreme-angular/__ivy_ngcc__/fesm5/devextreme-angular.js");
/* harmony import */ var ngx_bootstrap__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! ngx-bootstrap */ "./node_modules/ngx-bootstrap/__ivy_ngcc__/esm5/ngx-bootstrap.js");
/* harmony import */ var _footer2_footer2_component__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(/*! ./footer2/footer2.component */ "./src/app/components/footer2/footer2.component.ts");






var DEFAULT_PERFECT_SCROLLBAR_CONFIG = {
    suppressScrollX: true
};










var ComponentsModule = /** @class */ (function () {
    function ComponentsModule() {
    }
    ComponentsModule = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["NgModule"])({
            imports: [
                _angular_common__WEBPACK_IMPORTED_MODULE_2__["CommonModule"],
                _angular_router__WEBPACK_IMPORTED_MODULE_10__["RouterModule"],
                ngx_bootstrap_collapse__WEBPACK_IMPORTED_MODULE_11__["CollapseModule"].forRoot(),
                devextreme_angular__WEBPACK_IMPORTED_MODULE_12__["DxVectorMapModule"],
                ngx_perfect_scrollbar__WEBPACK_IMPORTED_MODULE_3__["PerfectScrollbarModule"],
                ngx_bootstrap__WEBPACK_IMPORTED_MODULE_13__["BsDropdownModule"].forRoot(),
                ngx_bootstrap__WEBPACK_IMPORTED_MODULE_13__["ModalModule"].forRoot(),
                _angular_forms__WEBPACK_IMPORTED_MODULE_4__["FormsModule"],
                _angular_forms__WEBPACK_IMPORTED_MODULE_4__["ReactiveFormsModule"]
            ],
            declarations: [
                _footer_footer_component__WEBPACK_IMPORTED_MODULE_8__["FooterComponent"],
                _vector_map_vector_map_component__WEBPACK_IMPORTED_MODULE_9__["VectorMapComponent1"],
                _navbar_navbar_component__WEBPACK_IMPORTED_MODULE_6__["NavbarComponent"],
                _sidebar_sidebar_component__WEBPACK_IMPORTED_MODULE_5__["SidebarComponent"],
                _navbar2_navbar2_component__WEBPACK_IMPORTED_MODULE_7__["Navbar2Component"],
                _footer2_footer2_component__WEBPACK_IMPORTED_MODULE_14__["Footer2Component"]
            ],
            exports: [
                _footer_footer_component__WEBPACK_IMPORTED_MODULE_8__["FooterComponent"],
                _vector_map_vector_map_component__WEBPACK_IMPORTED_MODULE_9__["VectorMapComponent1"],
                _navbar_navbar_component__WEBPACK_IMPORTED_MODULE_6__["NavbarComponent"],
                _sidebar_sidebar_component__WEBPACK_IMPORTED_MODULE_5__["SidebarComponent"],
                _navbar2_navbar2_component__WEBPACK_IMPORTED_MODULE_7__["Navbar2Component"],
                _footer2_footer2_component__WEBPACK_IMPORTED_MODULE_14__["Footer2Component"]
            ],
            providers: [
                {
                    provide: ngx_perfect_scrollbar__WEBPACK_IMPORTED_MODULE_3__["PERFECT_SCROLLBAR_CONFIG"],
                    useValue: DEFAULT_PERFECT_SCROLLBAR_CONFIG
                }
            ]
        })
    ], ComponentsModule);
    return ComponentsModule;
}());



/***/ }),

/***/ "./src/app/components/footer/footer.component.scss":
/*!*********************************************************!*\
  !*** ./src/app/components/footer/footer.component.scss ***!
  \*********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IiIsImZpbGUiOiJzcmMvYXBwL2NvbXBvbmVudHMvZm9vdGVyL2Zvb3Rlci5jb21wb25lbnQuc2NzcyJ9 */");

/***/ }),

/***/ "./src/app/components/footer/footer.component.ts":
/*!*******************************************************!*\
  !*** ./src/app/components/footer/footer.component.ts ***!
  \*******************************************************/
/*! exports provided: FooterComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "FooterComponent", function() { return FooterComponent; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm5/core.js");


var FooterComponent = /** @class */ (function () {
    function FooterComponent() {
        this.test = new Date();
    }
    FooterComponent.prototype.ngOnInit = function () { };
    FooterComponent = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"])({
            selector: "app-footer",
            template: Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! raw-loader!./footer.component.html */ "./node_modules/raw-loader/dist/cjs.js!./src/app/components/footer/footer.component.html")).default,
            styles: [Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! ./footer.component.scss */ "./src/app/components/footer/footer.component.scss")).default]
        }),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"])("design:paramtypes", [])
    ], FooterComponent);
    return FooterComponent;
}());



/***/ }),

/***/ "./src/app/components/footer2/footer2.component.scss":
/*!***********************************************************!*\
  !*** ./src/app/components/footer2/footer2.component.scss ***!
  \***********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (".badge-custom {\n  color: #303030;\n  background-image: -webkit-gradient(linear, left top, right top, from(#ebba16), to(#ed8a19));\n  background-image: linear-gradient(to right, #ebba16, #ed8a19);\n  font-size: 110%;\n}\n\n.badge-custom[href]:hover,\n.badge-custom[href]:focus {\n  text-decoration: none;\n  color: #fff;\n  background-color: #fa3a0e;\n}\n\n.fancy {\n  box-shadow: 8px 14px 38px rgba(39, 44, 49, 0.06), 1px 3px 8px rgba(39, 44, 49, 0.03);\n  -webkit-transition: all 0.5s ease;\n  transition: all 0.5s ease;\n  /* back to normal */\n  color: transparent;\n  text-transform: uppercase;\n  background-image: -webkit-gradient(linear, left top, right top, from(#ebba16), to(#ed8a19));\n  background-image: linear-gradient(to right, #ebba16, #ed8a19);\n}\n\n.fancy:hover {\n  box-shadow: 8px 28px 50px rgba(39, 44, 49, 0.07), 1px 6px 12px rgba(39, 44, 49, 0.04);\n  -webkit-transition: all 0.4s ease;\n  transition: all 0.4s ease;\n  /* zoom in */\n  -webkit-transform: translate3D(0, -1px, 0) scale(1.2);\n          transform: translate3D(0, -1px, 0) scale(1.2);\n  font-size: 110%;\n  color: #ffffff;\n  background-image: -webkit-gradient(linear, left top, right top, from(#ebc64c), to(#e4a053));\n  background-image: linear-gradient(to right, #ebc64c, #e4a053);\n}\n\n.a {\n  color: lightgray;\n}\n\n.a:hover {\n  color: gray;\n}\n\n.footer {\n  padding: 1.5rem 0.25rem;\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIi9BcHBsaWNhdGlvbnMvTUFNUC9odGRvY3MvYWZpcWZlL3dlYi9zcmMvYXBwL2NvbXBvbmVudHMvZm9vdGVyMi9mb290ZXIyLmNvbXBvbmVudC5zY3NzIiwic3JjL2FwcC9jb21wb25lbnRzL2Zvb3RlcjIvZm9vdGVyMi5jb21wb25lbnQuc2NzcyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQTtFQUNJLGNBQUE7RUFDQSwyRkFBQTtFQUFBLDZEQUFBO0VBQ0EsZUFBQTtBQ0NKOztBREVBOztFQUVJLHFCQUFBO0VBRUEsV0FBQTtFQUNBLHlCQUFBO0FDQUo7O0FER0E7RUFDSSxvRkFBQTtFQUNBLGlDQUFBO0VBQUEseUJBQUE7RUFDQSxtQkFBQTtFQUNBLGtCQUFBO0VBQ0EseUJBQUE7RUFDQSwyRkFBQTtFQUFBLDZEQUFBO0FDQUo7O0FER0E7RUFDSSxxRkFBQTtFQUNBLGlDQUFBO0VBQUEseUJBQUE7RUFDQSxZQUFBO0VBQ0EscURBQUE7VUFBQSw2Q0FBQTtFQUNBLGVBQUE7RUFDQSxjQUFBO0VBQ0EsMkZBQUE7RUFBQSw2REFBQTtBQ0FKOztBREdBO0VBQ0ksZ0JBQUE7QUNBSjs7QURHQTtFQUNJLFdBQUE7QUNBSjs7QURJQTtFQUNBLHVCQUFBO0FDREEiLCJmaWxlIjoic3JjL2FwcC9jb21wb25lbnRzL2Zvb3RlcjIvZm9vdGVyMi5jb21wb25lbnQuc2NzcyIsInNvdXJjZXNDb250ZW50IjpbIi5iYWRnZS1jdXN0b20ge1xuICAgIGNvbG9yOiAjMzAzMDMwO1xuICAgIGJhY2tncm91bmQtaW1hZ2U6IGxpbmVhci1ncmFkaWVudCh0byByaWdodCwgI2ViYmExNiwgI2VkOGExOSk7XG4gICAgZm9udC1zaXplOiAxMTAlO1xufVxuXG4uYmFkZ2UtY3VzdG9tW2hyZWZdOmhvdmVyLFxuLmJhZGdlLWN1c3RvbVtocmVmXTpmb2N1cyB7XG4gICAgdGV4dC1kZWNvcmF0aW9uOiBub25lO1xuXG4gICAgY29sb3I6ICNmZmY7XG4gICAgYmFja2dyb3VuZC1jb2xvcjogI2ZhM2EwZTtcbn1cblxuLmZhbmN5IHtcbiAgICBib3gtc2hhZG93OiA4cHggMTRweCAzOHB4IHJnYmEoMzksIDQ0LCA0OSwgLjA2KSwgMXB4IDNweCA4cHggcmdiYSgzOSwgNDQsIDQ5LCAuMDMpO1xuICAgIHRyYW5zaXRpb246IGFsbCAuNXMgZWFzZTtcbiAgICAvKiBiYWNrIHRvIG5vcm1hbCAqL1xuICAgIGNvbG9yOiB0cmFuc3BhcmVudDtcbiAgICB0ZXh0LXRyYW5zZm9ybTogdXBwZXJjYXNlO1xuICAgIGJhY2tncm91bmQtaW1hZ2U6IGxpbmVhci1ncmFkaWVudCh0byByaWdodCwgI2ViYmExNiwgI2VkOGExOSk7XG59XG5cbi5mYW5jeTpob3ZlciB7XG4gICAgYm94LXNoYWRvdzogOHB4IDI4cHggNTBweCByZ2JhKDM5LCA0NCwgNDksIC4wNyksIDFweCA2cHggMTJweCByZ2JhKDM5LCA0NCwgNDksIC4wNCk7XG4gICAgdHJhbnNpdGlvbjogYWxsIC40cyBlYXNlO1xuICAgIC8qIHpvb20gaW4gKi9cbiAgICB0cmFuc2Zvcm06IHRyYW5zbGF0ZTNEKDAsIC0xcHgsIDApIHNjYWxlKDEuMik7XG4gICAgZm9udC1zaXplOiAxMTAlO1xuICAgIGNvbG9yOiAjZmZmZmZmO1xuICAgIGJhY2tncm91bmQtaW1hZ2U6IGxpbmVhci1ncmFkaWVudCh0byByaWdodCwgI2ViYzY0YywgI2U0YTA1Myk7XG59XG5cbi5hIHtcbiAgICBjb2xvcjogbGlnaHRncmF5XG59XG5cbi5hOmhvdmVyIHtcbiAgICBjb2xvcjogZ3JheTtcblxufVxuXG4uZm9vdGVyIHtcbnBhZGRpbmc6IDEuNXJlbSAuMjVyZW0gO1xufSIsIi5iYWRnZS1jdXN0b20ge1xuICBjb2xvcjogIzMwMzAzMDtcbiAgYmFja2dyb3VuZC1pbWFnZTogbGluZWFyLWdyYWRpZW50KHRvIHJpZ2h0LCAjZWJiYTE2LCAjZWQ4YTE5KTtcbiAgZm9udC1zaXplOiAxMTAlO1xufVxuXG4uYmFkZ2UtY3VzdG9tW2hyZWZdOmhvdmVyLFxuLmJhZGdlLWN1c3RvbVtocmVmXTpmb2N1cyB7XG4gIHRleHQtZGVjb3JhdGlvbjogbm9uZTtcbiAgY29sb3I6ICNmZmY7XG4gIGJhY2tncm91bmQtY29sb3I6ICNmYTNhMGU7XG59XG5cbi5mYW5jeSB7XG4gIGJveC1zaGFkb3c6IDhweCAxNHB4IDM4cHggcmdiYSgzOSwgNDQsIDQ5LCAwLjA2KSwgMXB4IDNweCA4cHggcmdiYSgzOSwgNDQsIDQ5LCAwLjAzKTtcbiAgdHJhbnNpdGlvbjogYWxsIDAuNXMgZWFzZTtcbiAgLyogYmFjayB0byBub3JtYWwgKi9cbiAgY29sb3I6IHRyYW5zcGFyZW50O1xuICB0ZXh0LXRyYW5zZm9ybTogdXBwZXJjYXNlO1xuICBiYWNrZ3JvdW5kLWltYWdlOiBsaW5lYXItZ3JhZGllbnQodG8gcmlnaHQsICNlYmJhMTYsICNlZDhhMTkpO1xufVxuXG4uZmFuY3k6aG92ZXIge1xuICBib3gtc2hhZG93OiA4cHggMjhweCA1MHB4IHJnYmEoMzksIDQ0LCA0OSwgMC4wNyksIDFweCA2cHggMTJweCByZ2JhKDM5LCA0NCwgNDksIDAuMDQpO1xuICB0cmFuc2l0aW9uOiBhbGwgMC40cyBlYXNlO1xuICAvKiB6b29tIGluICovXG4gIHRyYW5zZm9ybTogdHJhbnNsYXRlM0QoMCwgLTFweCwgMCkgc2NhbGUoMS4yKTtcbiAgZm9udC1zaXplOiAxMTAlO1xuICBjb2xvcjogI2ZmZmZmZjtcbiAgYmFja2dyb3VuZC1pbWFnZTogbGluZWFyLWdyYWRpZW50KHRvIHJpZ2h0LCAjZWJjNjRjLCAjZTRhMDUzKTtcbn1cblxuLmEge1xuICBjb2xvcjogbGlnaHRncmF5O1xufVxuXG4uYTpob3ZlciB7XG4gIGNvbG9yOiBncmF5O1xufVxuXG4uZm9vdGVyIHtcbiAgcGFkZGluZzogMS41cmVtIDAuMjVyZW07XG59Il19 */");

/***/ }),

/***/ "./src/app/components/footer2/footer2.component.ts":
/*!*********************************************************!*\
  !*** ./src/app/components/footer2/footer2.component.ts ***!
  \*********************************************************/
/*! exports provided: Footer2Component */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "Footer2Component", function() { return Footer2Component; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm5/core.js");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/__ivy_ngcc__/fesm5/router.js");



var Footer2Component = /** @class */ (function () {
    function Footer2Component(router) {
        var _this = this;
        this.router = router;
        this.panelOpenState = false;
        this.oneAtATime = true;
        this.test2 = new Date();
        this.isCollapsed = true;
        router.events.subscribe(function (val) {
            _this.isCollapsed = true;
        });
    }
    Footer2Component.prototype.mobileView = function () {
        if (window.innerWidth < 992) {
            return true;
        }
        return false;
    };
    Footer2Component.prototype.ngOnInit = function () { };
    Footer2Component.ctorParameters = function () { return [
        { type: _angular_router__WEBPACK_IMPORTED_MODULE_2__["Router"] }
    ]; };
    Footer2Component = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"])({
            selector: 'app-footer2',
            template: Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! raw-loader!./footer2.component.html */ "./node_modules/raw-loader/dist/cjs.js!./src/app/components/footer2/footer2.component.html")).default,
            styles: [Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! ./footer2.component.scss */ "./src/app/components/footer2/footer2.component.scss")).default]
        }),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"])("design:paramtypes", [_angular_router__WEBPACK_IMPORTED_MODULE_2__["Router"]])
    ], Footer2Component);
    return Footer2Component;
}());



/***/ }),

/***/ "./src/app/components/navbar/navbar.component.scss":
/*!*********************************************************!*\
  !*** ./src/app/components/navbar/navbar.component.scss ***!
  \*********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (".bg-custom {\n  background-image: url('navbar-mygeo.png');\n  background-position: center;\n  background-size: cover;\n  background-repeat: no-repeat;\n}\n\n.auto {\n  cursor: auto;\n}\n\n.default {\n  cursor: default;\n}\n\n.none {\n  cursor: none;\n}\n\n.context-menu {\n  cursor: context-menu;\n}\n\n.help {\n  cursor: help;\n}\n\n.pointer {\n  cursor: pointer;\n}\n\n.progress {\n  cursor: progress;\n}\n\n.wait {\n  cursor: wait;\n}\n\n.cell {\n  cursor: cell;\n}\n\n.crosshair {\n  cursor: crosshair;\n}\n\n.text {\n  cursor: text;\n}\n\n.vertical-text {\n  cursor: vertical-text;\n}\n\n.alias {\n  cursor: alias;\n}\n\n.copy {\n  cursor: copy;\n}\n\n.move {\n  cursor: move;\n}\n\n.no-drop {\n  cursor: no-drop;\n}\n\n.not-allowed {\n  cursor: not-allowed;\n}\n\n.all-scroll {\n  cursor: all-scroll;\n}\n\n.col-resize {\n  cursor: col-resize;\n}\n\n.row-resize {\n  cursor: row-resize;\n}\n\n.n-resize {\n  cursor: n-resize;\n}\n\n.e-resize {\n  cursor: e-resize;\n}\n\n.s-resize {\n  cursor: s-resize;\n}\n\n.w-resize {\n  cursor: w-resize;\n}\n\n.ns-resize {\n  cursor: ns-resize;\n}\n\n.ew-resize {\n  cursor: ew-resize;\n}\n\n.ne-resize {\n  cursor: ne-resize;\n}\n\n.nw-resize {\n  cursor: nw-resize;\n}\n\n.se-resize {\n  cursor: se-resize;\n}\n\n.sw-resize {\n  cursor: sw-resize;\n}\n\n.nesw-resize {\n  cursor: nesw-resize;\n}\n\n.nwse-resize {\n  cursor: nwse-resize;\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIi9BcHBsaWNhdGlvbnMvTUFNUC9odGRvY3MvYWZpcWZlL3dlYi9zcmMvYXBwL2NvbXBvbmVudHMvbmF2YmFyL25hdmJhci5jb21wb25lbnQuc2NzcyIsInNyYy9hcHAvY29tcG9uZW50cy9uYXZiYXIvbmF2YmFyLmNvbXBvbmVudC5zY3NzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBO0VBQ0kseUNBQUE7RUFDQSwyQkFBQTtFQUNBLHNCQUFBO0VBQ0EsNEJBQUE7QUNDSjs7QURFQTtFQUFpQixZQUFBO0FDRWpCOztBRERBO0VBQWlCLGVBQUE7QUNLakI7O0FESkE7RUFBaUIsWUFBQTtBQ1FqQjs7QURQQTtFQUFpQixvQkFBQTtBQ1dqQjs7QURWQTtFQUFpQixZQUFBO0FDY2pCOztBRGJBO0VBQWlCLGVBQUE7QUNpQmpCOztBRGhCQTtFQUFpQixnQkFBQTtBQ29CakI7O0FEbkJBO0VBQWlCLFlBQUE7QUN1QmpCOztBRHRCQTtFQUFpQixZQUFBO0FDMEJqQjs7QUR6QkE7RUFBaUIsaUJBQUE7QUM2QmpCOztBRDVCQTtFQUFpQixZQUFBO0FDZ0NqQjs7QUQvQkE7RUFBaUIscUJBQUE7QUNtQ2pCOztBRGxDQTtFQUFpQixhQUFBO0FDc0NqQjs7QURyQ0E7RUFBaUIsWUFBQTtBQ3lDakI7O0FEeENBO0VBQWlCLFlBQUE7QUM0Q2pCOztBRDNDQTtFQUFpQixlQUFBO0FDK0NqQjs7QUQ5Q0E7RUFBaUIsbUJBQUE7QUNrRGpCOztBRGpEQTtFQUFpQixrQkFBQTtBQ3FEakI7O0FEcERBO0VBQWlCLGtCQUFBO0FDd0RqQjs7QUR2REE7RUFBaUIsa0JBQUE7QUMyRGpCOztBRDFEQTtFQUFpQixnQkFBQTtBQzhEakI7O0FEN0RBO0VBQWlCLGdCQUFBO0FDaUVqQjs7QURoRUE7RUFBaUIsZ0JBQUE7QUNvRWpCOztBRG5FQTtFQUFpQixnQkFBQTtBQ3VFakI7O0FEdEVBO0VBQWlCLGlCQUFBO0FDMEVqQjs7QUR6RUE7RUFBaUIsaUJBQUE7QUM2RWpCOztBRDVFQTtFQUFpQixpQkFBQTtBQ2dGakI7O0FEL0VBO0VBQWlCLGlCQUFBO0FDbUZqQjs7QURsRkE7RUFBaUIsaUJBQUE7QUNzRmpCOztBRHJGQTtFQUFpQixpQkFBQTtBQ3lGakI7O0FEeEZBO0VBQWlCLG1CQUFBO0FDNEZqQjs7QUQzRkE7RUFBaUIsbUJBQUE7QUMrRmpCIiwiZmlsZSI6InNyYy9hcHAvY29tcG9uZW50cy9uYXZiYXIvbmF2YmFyLmNvbXBvbmVudC5zY3NzIiwic291cmNlc0NvbnRlbnQiOlsiLmJnLWN1c3RvbSB7XG4gICAgYmFja2dyb3VuZC1pbWFnZTogdXJsKFwic3JjL2Fzc2V0cy9pbWcvdGhlbWUvbmF2YmFyLW15Z2VvLnBuZ1wiKTtcbiAgICBiYWNrZ3JvdW5kLXBvc2l0aW9uOiBjZW50ZXI7XG4gICAgYmFja2dyb3VuZC1zaXplOiBjb3ZlcjsgXG4gICAgYmFja2dyb3VuZC1yZXBlYXQ6IG5vLXJlcGVhdDtcblxufVxuLmF1dG8gICAgICAgICAgeyBjdXJzb3I6IGF1dG87IH1cbi5kZWZhdWx0ICAgICAgIHsgY3Vyc29yOiBkZWZhdWx0OyB9XG4ubm9uZSAgICAgICAgICB7IGN1cnNvcjogbm9uZTsgfVxuLmNvbnRleHQtbWVudSAgeyBjdXJzb3I6IGNvbnRleHQtbWVudTsgfVxuLmhlbHAgICAgICAgICAgeyBjdXJzb3I6IGhlbHA7IH1cbi5wb2ludGVyICAgICAgIHsgY3Vyc29yOiBwb2ludGVyOyB9XG4ucHJvZ3Jlc3MgICAgICB7IGN1cnNvcjogcHJvZ3Jlc3M7IH1cbi53YWl0ICAgICAgICAgIHsgY3Vyc29yOiB3YWl0OyB9XG4uY2VsbCAgICAgICAgICB7IGN1cnNvcjogY2VsbDsgfVxuLmNyb3NzaGFpciAgICAgeyBjdXJzb3I6IGNyb3NzaGFpcjsgfVxuLnRleHQgICAgICAgICAgeyBjdXJzb3I6IHRleHQ7IH1cbi52ZXJ0aWNhbC10ZXh0IHsgY3Vyc29yOiB2ZXJ0aWNhbC10ZXh0OyB9XG4uYWxpYXMgICAgICAgICB7IGN1cnNvcjogYWxpYXM7IH1cbi5jb3B5ICAgICAgICAgIHsgY3Vyc29yOiBjb3B5OyB9XG4ubW92ZSAgICAgICAgICB7IGN1cnNvcjogbW92ZTsgfVxuLm5vLWRyb3AgICAgICAgeyBjdXJzb3I6IG5vLWRyb3A7IH1cbi5ub3QtYWxsb3dlZCAgIHsgY3Vyc29yOiBub3QtYWxsb3dlZDsgfVxuLmFsbC1zY3JvbGwgICAgeyBjdXJzb3I6IGFsbC1zY3JvbGw7IH1cbi5jb2wtcmVzaXplICAgIHsgY3Vyc29yOiBjb2wtcmVzaXplOyB9XG4ucm93LXJlc2l6ZSAgICB7IGN1cnNvcjogcm93LXJlc2l6ZTsgfVxuLm4tcmVzaXplICAgICAgeyBjdXJzb3I6IG4tcmVzaXplOyB9XG4uZS1yZXNpemUgICAgICB7IGN1cnNvcjogZS1yZXNpemU7IH1cbi5zLXJlc2l6ZSAgICAgIHsgY3Vyc29yOiBzLXJlc2l6ZTsgfVxuLnctcmVzaXplICAgICAgeyBjdXJzb3I6IHctcmVzaXplOyB9XG4ubnMtcmVzaXplICAgICB7IGN1cnNvcjogbnMtcmVzaXplOyB9XG4uZXctcmVzaXplICAgICB7IGN1cnNvcjogZXctcmVzaXplOyB9XG4ubmUtcmVzaXplICAgICB7IGN1cnNvcjogbmUtcmVzaXplOyB9XG4ubnctcmVzaXplICAgICB7IGN1cnNvcjogbnctcmVzaXplOyB9XG4uc2UtcmVzaXplICAgICB7IGN1cnNvcjogc2UtcmVzaXplOyB9XG4uc3ctcmVzaXplICAgICB7IGN1cnNvcjogc3ctcmVzaXplOyB9XG4ubmVzdy1yZXNpemUgICB7IGN1cnNvcjogbmVzdy1yZXNpemU7IH1cbi5ud3NlLXJlc2l6ZSAgIHsgY3Vyc29yOiBud3NlLXJlc2l6ZTsgfSIsIi5iZy1jdXN0b20ge1xuICBiYWNrZ3JvdW5kLWltYWdlOiB1cmwoXCJzcmMvYXNzZXRzL2ltZy90aGVtZS9uYXZiYXItbXlnZW8ucG5nXCIpO1xuICBiYWNrZ3JvdW5kLXBvc2l0aW9uOiBjZW50ZXI7XG4gIGJhY2tncm91bmQtc2l6ZTogY292ZXI7XG4gIGJhY2tncm91bmQtcmVwZWF0OiBuby1yZXBlYXQ7XG59XG5cbi5hdXRvIHtcbiAgY3Vyc29yOiBhdXRvO1xufVxuXG4uZGVmYXVsdCB7XG4gIGN1cnNvcjogZGVmYXVsdDtcbn1cblxuLm5vbmUge1xuICBjdXJzb3I6IG5vbmU7XG59XG5cbi5jb250ZXh0LW1lbnUge1xuICBjdXJzb3I6IGNvbnRleHQtbWVudTtcbn1cblxuLmhlbHAge1xuICBjdXJzb3I6IGhlbHA7XG59XG5cbi5wb2ludGVyIHtcbiAgY3Vyc29yOiBwb2ludGVyO1xufVxuXG4ucHJvZ3Jlc3Mge1xuICBjdXJzb3I6IHByb2dyZXNzO1xufVxuXG4ud2FpdCB7XG4gIGN1cnNvcjogd2FpdDtcbn1cblxuLmNlbGwge1xuICBjdXJzb3I6IGNlbGw7XG59XG5cbi5jcm9zc2hhaXIge1xuICBjdXJzb3I6IGNyb3NzaGFpcjtcbn1cblxuLnRleHQge1xuICBjdXJzb3I6IHRleHQ7XG59XG5cbi52ZXJ0aWNhbC10ZXh0IHtcbiAgY3Vyc29yOiB2ZXJ0aWNhbC10ZXh0O1xufVxuXG4uYWxpYXMge1xuICBjdXJzb3I6IGFsaWFzO1xufVxuXG4uY29weSB7XG4gIGN1cnNvcjogY29weTtcbn1cblxuLm1vdmUge1xuICBjdXJzb3I6IG1vdmU7XG59XG5cbi5uby1kcm9wIHtcbiAgY3Vyc29yOiBuby1kcm9wO1xufVxuXG4ubm90LWFsbG93ZWQge1xuICBjdXJzb3I6IG5vdC1hbGxvd2VkO1xufVxuXG4uYWxsLXNjcm9sbCB7XG4gIGN1cnNvcjogYWxsLXNjcm9sbDtcbn1cblxuLmNvbC1yZXNpemUge1xuICBjdXJzb3I6IGNvbC1yZXNpemU7XG59XG5cbi5yb3ctcmVzaXplIHtcbiAgY3Vyc29yOiByb3ctcmVzaXplO1xufVxuXG4ubi1yZXNpemUge1xuICBjdXJzb3I6IG4tcmVzaXplO1xufVxuXG4uZS1yZXNpemUge1xuICBjdXJzb3I6IGUtcmVzaXplO1xufVxuXG4ucy1yZXNpemUge1xuICBjdXJzb3I6IHMtcmVzaXplO1xufVxuXG4udy1yZXNpemUge1xuICBjdXJzb3I6IHctcmVzaXplO1xufVxuXG4ubnMtcmVzaXplIHtcbiAgY3Vyc29yOiBucy1yZXNpemU7XG59XG5cbi5ldy1yZXNpemUge1xuICBjdXJzb3I6IGV3LXJlc2l6ZTtcbn1cblxuLm5lLXJlc2l6ZSB7XG4gIGN1cnNvcjogbmUtcmVzaXplO1xufVxuXG4ubnctcmVzaXplIHtcbiAgY3Vyc29yOiBudy1yZXNpemU7XG59XG5cbi5zZS1yZXNpemUge1xuICBjdXJzb3I6IHNlLXJlc2l6ZTtcbn1cblxuLnN3LXJlc2l6ZSB7XG4gIGN1cnNvcjogc3ctcmVzaXplO1xufVxuXG4ubmVzdy1yZXNpemUge1xuICBjdXJzb3I6IG5lc3ctcmVzaXplO1xufVxuXG4ubndzZS1yZXNpemUge1xuICBjdXJzb3I6IG53c2UtcmVzaXplO1xufSJdfQ== */");

/***/ }),

/***/ "./src/app/components/navbar/navbar.component.ts":
/*!*******************************************************!*\
  !*** ./src/app/components/navbar/navbar.component.ts ***!
  \*******************************************************/
/*! exports provided: NavbarComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "NavbarComponent", function() { return NavbarComponent; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm5/core.js");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/__ivy_ngcc__/fesm5/router.js");
/* harmony import */ var _angular_common__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @angular/common */ "./node_modules/@angular/common/__ivy_ngcc__/fesm5/common.js");
/* harmony import */ var src_app_shared_handler_notify_notify_service__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! src/app/shared/handler/notify/notify.service */ "./src/app/shared/handler/notify/notify.service.ts");
/* harmony import */ var src_app_shared_services_users_users_service__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! src/app/shared/services/users/users.service */ "./src/app/shared/services/users/users.service.ts");
/* harmony import */ var src_app_shared_handler_jwt_jwt_service__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! src/app/shared/handler/jwt/jwt.service */ "./src/app/shared/handler/jwt/jwt.service.ts");
/* harmony import */ var src_app_shared_services_auth_auth_service__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! src/app/shared/services/auth/auth.service */ "./src/app/shared/services/auth/auth.service.ts");


//import { ROUTESADMIN, ROUTESPENGESAH, ROUTESUSER } from '../../shared/menu/menu-items';






var NavbarComponent = /** @class */ (function () {
    function NavbarComponent(location, authService, userService, jwtService, notifyService, element, router) {
        var _this = this;
        this.authService = authService;
        this.userService = userService;
        this.jwtService = jwtService;
        this.notifyService = notifyService;
        this.element = element;
        this.router = router;
        this.sidenavOpen = true;
        // Image
        this.imgAvatar = "assets/img/default/avatar.png";
        this.user = this.userService.user;
        this.location = location;
        this.router.events.subscribe(function (event) {
            if (event instanceof _angular_router__WEBPACK_IMPORTED_MODULE_2__["NavigationStart"]) {
                // Show loading indicator
            }
            if (event instanceof _angular_router__WEBPACK_IMPORTED_MODULE_2__["NavigationEnd"]) {
                // Hide loading indicator
                if (window.innerWidth < 1200) {
                    document.body.classList.remove("g-sidenav-pinned");
                    document.body.classList.add("g-sidenav-hidden");
                    _this.sidenavOpen = false;
                }
            }
            if (event instanceof _angular_router__WEBPACK_IMPORTED_MODULE_2__["NavigationError"]) {
                // Hide loading indicator
                // Present error to user
                console.log(event.error);
            }
        });
    }
    NavbarComponent.prototype.ngOnInit = function () {
        console.log("as: ", this.user);
        // this.listTitles = ROUTES.filter(listTitle => listTitle);
        if (this.authService.userRole == 1) {
            this.auth = 1;
        }
        else if (this.authService.userRole == 2) {
            this.auth = 2;
        }
        else if (this.authService.userRole == 3) {
            this.auth = 3;
        }
        else if (this.authService.userRole == 4) {
            this.auth = 4;
        }
        else if (this.authService.userRole == 5) {
            this.auth = 5;
        }
        else if (this.authService.userRole == 6) {
            this.auth = 6;
        }
    };
    NavbarComponent.prototype.getTitle = function () {
        var titlee = this.location.prepareExternalUrl(this.location.path());
        if (titlee.charAt(0) === "#") {
            titlee = titlee.slice(1);
        }
        for (var item = 0; item < this.listTitles.length; item++) {
            if (this.listTitles[item].path === titlee) {
                return this.listTitles[item].title;
            }
        }
        return "Dashboard";
    };
    NavbarComponent.prototype.navigatePage = function (path) {
        if (path == "notifications") {
            return this.router.navigate(["/global/notifications"]);
        }
        else if (path == "profile" && (this.auth == 1 || this.auth == 2 || this.auth == 3)) {
            return this.router.navigate(["/admin/profile"]);
        }
        else if (path == "profile" && (this.auth == 4 || this.auth == 5 || this.auth == 6)) {
            return this.router.navigate(["/user/profile"]);
        }
        else if (path == "settings") {
            return this.router.navigate(["/global/settings"]);
        }
        else if (path == "home") {
            return this.router.navigate(["/auth/login"]);
        }
    };
    NavbarComponent.prototype.successMessage = function () {
        var title = "Success";
        var message = "Loging in right now";
        this.notifyService.openToastr(title, message);
    };
    NavbarComponent.prototype.logout = function () {
        this.jwtService.destroyToken();
        this.navigatePage("home");
    };
    NavbarComponent.prototype.openSearch = function () {
        document.body.classList.add("g-navbar-search-showing");
        setTimeout(function () {
            document.body.classList.remove("g-navbar-search-showing");
            document.body.classList.add("g-navbar-search-show");
        }, 150);
        setTimeout(function () {
            document.body.classList.add("g-navbar-search-shown");
        }, 300);
    };
    NavbarComponent.prototype.closeSearch = function () {
        document.body.classList.remove("g-navbar-search-shown");
        setTimeout(function () {
            document.body.classList.remove("g-navbar-search-show");
            document.body.classList.add("g-navbar-search-hiding");
        }, 150);
        setTimeout(function () {
            document.body.classList.remove("g-navbar-search-hiding");
            document.body.classList.add("g-navbar-search-hidden");
        }, 300);
        setTimeout(function () {
            document.body.classList.remove("g-navbar-search-hidden");
        }, 500);
    };
    NavbarComponent.prototype.openSidebar = function () {
        if (document.body.classList.contains("g-sidenav-pinned")) {
            document.body.classList.remove("g-sidenav-pinned");
            document.body.classList.add("g-sidenav-hidden");
            this.sidenavOpen = false;
        }
        else {
            document.body.classList.add("g-sidenav-pinned");
            document.body.classList.remove("g-sidenav-hidden");
            this.sidenavOpen = true;
        }
    };
    NavbarComponent.prototype.toggleSidenav = function () {
        if (document.body.classList.contains("g-sidenav-pinned")) {
            document.body.classList.remove("g-sidenav-pinned");
            document.body.classList.add("g-sidenav-hidden");
            this.sidenavOpen = false;
        }
        else {
            document.body.classList.add("g-sidenav-pinned");
            document.body.classList.remove("g-sidenav-hidden");
            this.sidenavOpen = true;
        }
    };
    NavbarComponent.ctorParameters = function () { return [
        { type: _angular_common__WEBPACK_IMPORTED_MODULE_3__["Location"] },
        { type: src_app_shared_services_auth_auth_service__WEBPACK_IMPORTED_MODULE_7__["AuthService"] },
        { type: src_app_shared_services_users_users_service__WEBPACK_IMPORTED_MODULE_5__["UsersService"] },
        { type: src_app_shared_handler_jwt_jwt_service__WEBPACK_IMPORTED_MODULE_6__["JwtService"] },
        { type: src_app_shared_handler_notify_notify_service__WEBPACK_IMPORTED_MODULE_4__["NotifyService"] },
        { type: _angular_core__WEBPACK_IMPORTED_MODULE_1__["ElementRef"] },
        { type: _angular_router__WEBPACK_IMPORTED_MODULE_2__["Router"] }
    ]; };
    NavbarComponent = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"])({
            selector: "app-navbar",
            template: Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! raw-loader!./navbar.component.html */ "./node_modules/raw-loader/dist/cjs.js!./src/app/components/navbar/navbar.component.html")).default,
            styles: [Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! ./navbar.component.scss */ "./src/app/components/navbar/navbar.component.scss")).default]
        }),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"])("design:paramtypes", [_angular_common__WEBPACK_IMPORTED_MODULE_3__["Location"],
            src_app_shared_services_auth_auth_service__WEBPACK_IMPORTED_MODULE_7__["AuthService"],
            src_app_shared_services_users_users_service__WEBPACK_IMPORTED_MODULE_5__["UsersService"],
            src_app_shared_handler_jwt_jwt_service__WEBPACK_IMPORTED_MODULE_6__["JwtService"],
            src_app_shared_handler_notify_notify_service__WEBPACK_IMPORTED_MODULE_4__["NotifyService"],
            _angular_core__WEBPACK_IMPORTED_MODULE_1__["ElementRef"],
            _angular_router__WEBPACK_IMPORTED_MODULE_2__["Router"]])
    ], NavbarComponent);
    return NavbarComponent;
}());



/***/ }),

/***/ "./src/app/components/navbar2/navbar2.component.scss":
/*!***********************************************************!*\
  !*** ./src/app/components/navbar2/navbar2.component.scss ***!
  \***********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("a {\n  text-decoration: none;\n  color: #fdfcfc;\n  background-color: transparent;\n  -webkit-text-decoration-skip: objects;\n}\n\na:hover {\n  text-decoration: none;\n  color: #414141;\n}\n\na:not([href]):not([tabindex]) {\n  text-decoration: none;\n  color: inherit;\n}\n\na:not([href]):not([tabindex]):hover,\na:not([href]):not([tabindex]):focus {\n  text-decoration: none;\n  color: inherit;\n}\n\na:not([href]):not([tabindex]):focus {\n  outline: 0;\n}\n\n.navbar {\n  position: relative;\n  display: -webkit-box;\n  display: flex;\n  padding: 0.5rem 0.5rem;\n  flex-wrap: wrap;\n  -webkit-box-align: center;\n          align-items: center;\n  -webkit-box-pack: justify;\n          justify-content: space-between;\n}\n\n.fixed-top {\n  position: fixed;\n  z-index: 1030;\n  top: 0;\n  right: 0;\n  left: 0;\n}\n\n.square {\n  width: 100px;\n  height: 100px;\n}\n\n.auto {\n  cursor: auto;\n}\n\n.default {\n  cursor: default;\n}\n\n.none {\n  cursor: none;\n}\n\n.context-menu {\n  cursor: context-menu;\n}\n\n.help {\n  cursor: help;\n}\n\n.pointer {\n  cursor: pointer;\n}\n\n.progress {\n  cursor: progress;\n}\n\n.wait {\n  cursor: wait;\n}\n\n.cell {\n  cursor: cell;\n}\n\n.crosshair {\n  cursor: crosshair;\n}\n\n.text {\n  cursor: text;\n}\n\n.vertical-text {\n  cursor: vertical-text;\n}\n\n.alias {\n  cursor: alias;\n}\n\n.copy {\n  cursor: copy;\n}\n\n.move {\n  cursor: move;\n}\n\n.no-drop {\n  cursor: no-drop;\n}\n\n.not-allowed {\n  cursor: not-allowed;\n}\n\n.all-scroll {\n  cursor: all-scroll;\n}\n\n.col-resize {\n  cursor: col-resize;\n}\n\n.row-resize {\n  cursor: row-resize;\n}\n\n.n-resize {\n  cursor: n-resize;\n}\n\n.e-resize {\n  cursor: e-resize;\n}\n\n.s-resize {\n  cursor: s-resize;\n}\n\n.w-resize {\n  cursor: w-resize;\n}\n\n.ns-resize {\n  cursor: ns-resize;\n}\n\n.ew-resize {\n  cursor: ew-resize;\n}\n\n.ne-resize {\n  cursor: ne-resize;\n}\n\n.nw-resize {\n  cursor: nw-resize;\n}\n\n.se-resize {\n  cursor: se-resize;\n}\n\n.sw-resize {\n  cursor: sw-resize;\n}\n\n.nesw-resize {\n  cursor: nesw-resize;\n}\n\n.nwse-resize {\n  cursor: nwse-resize;\n}\n\n.bcard:hover {\n  background-color: #6bcffd;\n  box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);\n}\n\n.rcard:hover {\n  background-color: #fd6b6b;\n  box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);\n}\n\n.gcard:hover {\n  background-color: #7cfd6b;\n  box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);\n}\n\n.scroll {\n  max-height: 500px;\n  overflow-y: scroll;\n}\n\n/* Hide scrollbar for Chrome, Safari and Opera */\n\n.scroll::-webkit-scrollbar {\n  display: none;\n}\n\n/* Hide scrollbar for IE, Edge and Firefox */\n\n.scroll {\n  -ms-overflow-style: none;\n  /* IE and Edge */\n  scrollbar-width: none;\n  /* Firefox */\n}\n\n.card-header {\n  margin-top: 0;\n  padding: 1.25rem 1.5rem;\n  border-bottom: 1px solid rgba(255, 255, 255, 0);\n  background-color: #fff0;\n}\n\n.card {\n  border-radius: 0.75;\n}\n\n.card-body {\n  font-size: 90%;\n}\n\n.card-footer {\n  padding: 1.25rem 1.5rem;\n  height: 60px;\n  border-top: 0px solid rgba(255, 255, 255, 0);\n  background-color: #fff0;\n}\n\n.navbar {\n  display: -webkit-box;\n  display: flex;\n  padding: 0;\n  flex-wrap: wrap;\n  -webkit-box-align: center;\n          align-items: center;\n  -webkit-box-pack: justify;\n          justify-content: space-between;\n}\n\n.navbar-dark .navbar-toggler-icon {\n  background-image: url(\"data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(0, 0, 0, 0.5)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E\");\n}\n\n.footer {\n  left: 0;\n  right: 0;\n  bottom: 0;\n  padding: 1rem;\n}\n\n.text-bold {\n  font-weight: 600;\n}\n\n.bgg {\n  background-image: url('mygeo-background.jpg');\n  height: 100%;\n  background-position: center;\n  background-repeat: no-repeat;\n  background-size: cover;\n}\n\n.error-message {\n  color: #f5365c;\n  text-align: right;\n  font-size: 0.8em;\n  padding-top: 5px;\n  padding-bottom: 0;\n  margin-bottom: 0;\n}\n\n.navbar-horizontal .navbar-nav .dropdown-menu:before {\n  background: #1b1b1b;\n  box-shadow: none;\n  content: \"\";\n  display: block;\n  height: 16px;\n  width: 16px;\n  right: 20px;\n  position: absolute;\n  bottom: 100%;\n  -webkit-transform: rotate(-45deg) translateY(1rem);\n  transform: rotate(-45deg) translateY(1rem);\n  z-index: -5;\n  border-radius: 0.25rem;\n}\n\n.dropdown-menu {\n  background-color: #1b1b1b;\n}\n\n.dropdown-item:hover {\n  background-color: #727272;\n}\n\n@media (max-width: 991.98px) {\n  .navbar-expand-lg > .container,\n.navbar-expand-lg > .container-fluid {\n    padding: 0.55rem 0.5rem;\n  }\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIi9BcHBsaWNhdGlvbnMvTUFNUC9odGRvY3MvYWZpcWZlL3dlYi9zcmMvYXBwL2NvbXBvbmVudHMvbmF2YmFyMi9uYXZiYXIyLmNvbXBvbmVudC5zY3NzIiwic3JjL2FwcC9jb21wb25lbnRzL25hdmJhcjIvbmF2YmFyMi5jb21wb25lbnQuc2NzcyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQTtFQUNJLHFCQUFBO0VBRUEsY0FBQTtFQUNBLDZCQUFBO0VBRUEscUNBQUE7QUNESjs7QURJQTtFQUNJLHFCQUFBO0VBRUEsY0FBQTtBQ0ZKOztBREtBO0VBQ0kscUJBQUE7RUFFQSxjQUFBO0FDSEo7O0FETUE7O0VBRUkscUJBQUE7RUFFQSxjQUFBO0FDSko7O0FET0E7RUFDSSxVQUFBO0FDSko7O0FEUUE7RUFDSSxrQkFBQTtFQUVBLG9CQUFBO0VBQUEsYUFBQTtFQUVBLHNCQUFBO0VBRUEsZUFBQTtFQUNBLHlCQUFBO1VBQUEsbUJBQUE7RUFDQSx5QkFBQTtVQUFBLDhCQUFBO0FDUko7O0FEV0E7RUFDSSxlQUFBO0VBQ0EsYUFBQTtFQUNBLE1BQUE7RUFDQSxRQUFBO0VBQ0EsT0FBQTtBQ1JKOztBRFdBO0VBQ0ksWUFBQTtFQUNBLGFBQUE7QUNSSjs7QURXQTtFQUNJLFlBQUE7QUNSSjs7QURXQTtFQUNJLGVBQUE7QUNSSjs7QURXQTtFQUNJLFlBQUE7QUNSSjs7QURXQTtFQUNJLG9CQUFBO0FDUko7O0FEV0E7RUFDSSxZQUFBO0FDUko7O0FEV0E7RUFDSSxlQUFBO0FDUko7O0FEV0E7RUFDSSxnQkFBQTtBQ1JKOztBRFdBO0VBQ0ksWUFBQTtBQ1JKOztBRFdBO0VBQ0ksWUFBQTtBQ1JKOztBRFdBO0VBQ0ksaUJBQUE7QUNSSjs7QURXQTtFQUNJLFlBQUE7QUNSSjs7QURXQTtFQUNJLHFCQUFBO0FDUko7O0FEV0E7RUFDSSxhQUFBO0FDUko7O0FEV0E7RUFDSSxZQUFBO0FDUko7O0FEV0E7RUFDSSxZQUFBO0FDUko7O0FEV0E7RUFDSSxlQUFBO0FDUko7O0FEV0E7RUFDSSxtQkFBQTtBQ1JKOztBRFdBO0VBQ0ksa0JBQUE7QUNSSjs7QURXQTtFQUNJLGtCQUFBO0FDUko7O0FEV0E7RUFDSSxrQkFBQTtBQ1JKOztBRFdBO0VBQ0ksZ0JBQUE7QUNSSjs7QURXQTtFQUNJLGdCQUFBO0FDUko7O0FEV0E7RUFDSSxnQkFBQTtBQ1JKOztBRFdBO0VBQ0ksZ0JBQUE7QUNSSjs7QURXQTtFQUNJLGlCQUFBO0FDUko7O0FEV0E7RUFDSSxpQkFBQTtBQ1JKOztBRFdBO0VBQ0ksaUJBQUE7QUNSSjs7QURXQTtFQUNJLGlCQUFBO0FDUko7O0FEV0E7RUFDSSxpQkFBQTtBQ1JKOztBRFdBO0VBQ0ksaUJBQUE7QUNSSjs7QURXQTtFQUNJLG1CQUFBO0FDUko7O0FEV0E7RUFDSSxtQkFBQTtBQ1JKOztBRFdBO0VBQ0kseUJBQUE7RUFDQSwyQ0FBQTtBQ1JKOztBRFdBO0VBQ0kseUJBQUE7RUFDQSwyQ0FBQTtBQ1JKOztBRFdBO0VBQ0kseUJBQUE7RUFDQSwyQ0FBQTtBQ1JKOztBRFdBO0VBQ0ksaUJBQUE7RUFDQSxrQkFBQTtBQ1JKOztBRFdBLGdEQUFBOztBQUNBO0VBQ0ksYUFBQTtBQ1JKOztBRFdBLDRDQUFBOztBQUNBO0VBQ0ksd0JBQUE7RUFDQSxnQkFBQTtFQUNBLHFCQUFBO0VBQ0EsWUFBQTtBQ1JKOztBRFdBO0VBQ0ksYUFBQTtFQUNBLHVCQUFBO0VBRUEsK0NBQUE7RUFDQSx1QkFBQTtBQ1RKOztBRFlBO0VBQ0ksbUJBQUE7QUNUSjs7QURhQTtFQUNJLGNBQUE7QUNWSjs7QURhQTtFQUNJLHVCQUFBO0VBQ0EsWUFBQTtFQUNBLDRDQUFBO0VBQ0EsdUJBQUE7QUNWSjs7QURhQTtFQUVJLG9CQUFBO0VBQUEsYUFBQTtFQUVBLFVBQUE7RUFFQSxlQUFBO0VBQ0EseUJBQUE7VUFBQSxtQkFBQTtFQUNBLHlCQUFBO1VBQUEsOEJBQUE7QUNiSjs7QURnQkE7RUFDSSxxUUFDSTtBQ2RSOztBRGtCQTtFQUVJLE9BQUE7RUFDQSxRQUFBO0VBQ0EsU0FBQTtFQUNBLGFBQUE7QUNoQko7O0FEbUJBO0VBQ0ksZ0JBQUE7QUNoQko7O0FEbUJBO0VBQ0ksNkNBQUE7RUFDQSxZQUFBO0VBQ0EsMkJBQUE7RUFDQSw0QkFBQTtFQUNBLHNCQUFBO0FDaEJKOztBRG1CQTtFQUNJLGNBQUE7RUFDQSxpQkFBQTtFQUNBLGdCQUFBO0VBQ0EsZ0JBQUE7RUFDQSxpQkFBQTtFQUNBLGdCQUFBO0FDaEJKOztBRG1CQTtFQUNJLG1CQUFBO0VBQ0EsZ0JBQUE7RUFDQSxXQUFBO0VBQ0EsY0FBQTtFQUNBLFlBQUE7RUFDQSxXQUFBO0VBQ0EsV0FBQTtFQUNBLGtCQUFBO0VBQ0EsWUFBQTtFQUNBLGtEQUFBO0VBQ0EsMENBQUE7RUFDQSxXQUFBO0VBQ0Esc0JBQUE7QUNoQko7O0FEbUJBO0VBQ0kseUJBQUE7QUNoQko7O0FEbUJBO0VBQ0kseUJBQUE7QUNoQko7O0FEbUJBO0VBRUk7O0lBRUksdUJBQUE7RUNqQk47QUFDRiIsImZpbGUiOiJzcmMvYXBwL2NvbXBvbmVudHMvbmF2YmFyMi9uYXZiYXIyLmNvbXBvbmVudC5zY3NzIiwic291cmNlc0NvbnRlbnQiOlsiYSB7XG4gICAgdGV4dC1kZWNvcmF0aW9uOiBub25lO1xuXG4gICAgY29sb3I6IHJnYigyNTMsIDI1MiwgMjUyKTtcbiAgICBiYWNrZ3JvdW5kLWNvbG9yOiB0cmFuc3BhcmVudDtcblxuICAgIC13ZWJraXQtdGV4dC1kZWNvcmF0aW9uLXNraXA6IG9iamVjdHM7XG59XG5cbmE6aG92ZXIge1xuICAgIHRleHQtZGVjb3JhdGlvbjogbm9uZTtcblxuICAgIGNvbG9yOiByZ2IoNjUsIDY1LCA2NSk7XG59XG5cbmE6bm90KFtocmVmXSk6bm90KFt0YWJpbmRleF0pIHtcbiAgICB0ZXh0LWRlY29yYXRpb246IG5vbmU7XG5cbiAgICBjb2xvcjogaW5oZXJpdDtcbn1cblxuYTpub3QoW2hyZWZdKTpub3QoW3RhYmluZGV4XSk6aG92ZXIsXG5hOm5vdChbaHJlZl0pOm5vdChbdGFiaW5kZXhdKTpmb2N1cyB7XG4gICAgdGV4dC1kZWNvcmF0aW9uOiBub25lO1xuXG4gICAgY29sb3I6IGluaGVyaXQ7XG59XG5cbmE6bm90KFtocmVmXSk6bm90KFt0YWJpbmRleF0pOmZvY3VzIHtcbiAgICBvdXRsaW5lOiAwO1xufVxuXG5cbi5uYXZiYXIge1xuICAgIHBvc2l0aW9uOiByZWxhdGl2ZTtcblxuICAgIGRpc3BsYXk6IGZsZXg7XG5cbiAgICBwYWRkaW5nOiAuNXJlbSAuNXJlbTtcblxuICAgIGZsZXgtd3JhcDogd3JhcDtcbiAgICBhbGlnbi1pdGVtczogY2VudGVyO1xuICAgIGp1c3RpZnktY29udGVudDogc3BhY2UtYmV0d2Vlbjtcbn1cblxuLmZpeGVkLXRvcCB7XG4gICAgcG9zaXRpb246IGZpeGVkO1xuICAgIHotaW5kZXg6IDEwMzA7XG4gICAgdG9wOiAwO1xuICAgIHJpZ2h0OiAwO1xuICAgIGxlZnQ6IDA7XG59XG5cbi5zcXVhcmUge1xuICAgIHdpZHRoOiAxMDBweDtcbiAgICBoZWlnaHQ6IDEwMHB4O1xufVxuXG4uYXV0byB7XG4gICAgY3Vyc29yOiBhdXRvO1xufVxuXG4uZGVmYXVsdCB7XG4gICAgY3Vyc29yOiBkZWZhdWx0O1xufVxuXG4ubm9uZSB7XG4gICAgY3Vyc29yOiBub25lO1xufVxuXG4uY29udGV4dC1tZW51IHtcbiAgICBjdXJzb3I6IGNvbnRleHQtbWVudTtcbn1cblxuLmhlbHAge1xuICAgIGN1cnNvcjogaGVscDtcbn1cblxuLnBvaW50ZXIge1xuICAgIGN1cnNvcjogcG9pbnRlcjtcbn1cblxuLnByb2dyZXNzIHtcbiAgICBjdXJzb3I6IHByb2dyZXNzO1xufVxuXG4ud2FpdCB7XG4gICAgY3Vyc29yOiB3YWl0O1xufVxuXG4uY2VsbCB7XG4gICAgY3Vyc29yOiBjZWxsO1xufVxuXG4uY3Jvc3NoYWlyIHtcbiAgICBjdXJzb3I6IGNyb3NzaGFpcjtcbn1cblxuLnRleHQge1xuICAgIGN1cnNvcjogdGV4dDtcbn1cblxuLnZlcnRpY2FsLXRleHQge1xuICAgIGN1cnNvcjogdmVydGljYWwtdGV4dDtcbn1cblxuLmFsaWFzIHtcbiAgICBjdXJzb3I6IGFsaWFzO1xufVxuXG4uY29weSB7XG4gICAgY3Vyc29yOiBjb3B5O1xufVxuXG4ubW92ZSB7XG4gICAgY3Vyc29yOiBtb3ZlO1xufVxuXG4ubm8tZHJvcCB7XG4gICAgY3Vyc29yOiBuby1kcm9wO1xufVxuXG4ubm90LWFsbG93ZWQge1xuICAgIGN1cnNvcjogbm90LWFsbG93ZWQ7XG59XG5cbi5hbGwtc2Nyb2xsIHtcbiAgICBjdXJzb3I6IGFsbC1zY3JvbGw7XG59XG5cbi5jb2wtcmVzaXplIHtcbiAgICBjdXJzb3I6IGNvbC1yZXNpemU7XG59XG5cbi5yb3ctcmVzaXplIHtcbiAgICBjdXJzb3I6IHJvdy1yZXNpemU7XG59XG5cbi5uLXJlc2l6ZSB7XG4gICAgY3Vyc29yOiBuLXJlc2l6ZTtcbn1cblxuLmUtcmVzaXplIHtcbiAgICBjdXJzb3I6IGUtcmVzaXplO1xufVxuXG4ucy1yZXNpemUge1xuICAgIGN1cnNvcjogcy1yZXNpemU7XG59XG5cbi53LXJlc2l6ZSB7XG4gICAgY3Vyc29yOiB3LXJlc2l6ZTtcbn1cblxuLm5zLXJlc2l6ZSB7XG4gICAgY3Vyc29yOiBucy1yZXNpemU7XG59XG5cbi5ldy1yZXNpemUge1xuICAgIGN1cnNvcjogZXctcmVzaXplO1xufVxuXG4ubmUtcmVzaXplIHtcbiAgICBjdXJzb3I6IG5lLXJlc2l6ZTtcbn1cblxuLm53LXJlc2l6ZSB7XG4gICAgY3Vyc29yOiBudy1yZXNpemU7XG59XG5cbi5zZS1yZXNpemUge1xuICAgIGN1cnNvcjogc2UtcmVzaXplO1xufVxuXG4uc3ctcmVzaXplIHtcbiAgICBjdXJzb3I6IHN3LXJlc2l6ZTtcbn1cblxuLm5lc3ctcmVzaXplIHtcbiAgICBjdXJzb3I6IG5lc3ctcmVzaXplO1xufVxuXG4ubndzZS1yZXNpemUge1xuICAgIGN1cnNvcjogbndzZS1yZXNpemU7XG59XG5cbi5iY2FyZDpob3ZlciB7XG4gICAgYmFja2dyb3VuZC1jb2xvcjogIzZiY2ZmZDtcbiAgICBib3gtc2hhZG93OiAwIDhweCAxNnB4IDAgcmdiYSgwLCAwLCAwLCAwLjIpO1xufVxuXG4ucmNhcmQ6aG92ZXIge1xuICAgIGJhY2tncm91bmQtY29sb3I6ICNmZDZiNmI7XG4gICAgYm94LXNoYWRvdzogMCA4cHggMTZweCAwIHJnYmEoMCwgMCwgMCwgMC4yKTtcbn1cblxuLmdjYXJkOmhvdmVyIHtcbiAgICBiYWNrZ3JvdW5kLWNvbG9yOiAjN2NmZDZiO1xuICAgIGJveC1zaGFkb3c6IDAgOHB4IDE2cHggMCByZ2JhKDAsIDAsIDAsIDAuMik7XG59XG5cbi5zY3JvbGwge1xuICAgIG1heC1oZWlnaHQ6IDUwMHB4O1xuICAgIG92ZXJmbG93LXk6IHNjcm9sbDtcbn1cblxuLyogSGlkZSBzY3JvbGxiYXIgZm9yIENocm9tZSwgU2FmYXJpIGFuZCBPcGVyYSAqL1xuLnNjcm9sbDo6LXdlYmtpdC1zY3JvbGxiYXIge1xuICAgIGRpc3BsYXk6IG5vbmU7XG59XG5cbi8qIEhpZGUgc2Nyb2xsYmFyIGZvciBJRSwgRWRnZSBhbmQgRmlyZWZveCAqL1xuLnNjcm9sbCB7XG4gICAgLW1zLW92ZXJmbG93LXN0eWxlOiBub25lO1xuICAgIC8qIElFIGFuZCBFZGdlICovXG4gICAgc2Nyb2xsYmFyLXdpZHRoOiBub25lO1xuICAgIC8qIEZpcmVmb3ggKi9cbn1cblxuLmNhcmQtaGVhZGVyIHtcbiAgICBtYXJnaW4tdG9wOiAwO1xuICAgIHBhZGRpbmc6IDEuMjVyZW0gMS41cmVtO1xuXG4gICAgYm9yZGVyLWJvdHRvbTogMXB4IHNvbGlkIHJnYmEoMjU1LCAyNTUsIDI1NSwgMCk7XG4gICAgYmFja2dyb3VuZC1jb2xvcjogI2ZmZjA7XG59XG5cbi5jYXJkIHtcbiAgICBib3JkZXItcmFkaXVzOiAwLjc1O1xuXG59XG5cbi5jYXJkLWJvZHkge1xuICAgIGZvbnQtc2l6ZTogOTAlO1xufVxuXG4uY2FyZC1mb290ZXIge1xuICAgIHBhZGRpbmc6IDEuMjVyZW0gMS41cmVtO1xuICAgIGhlaWdodDogNjBweDtcbiAgICBib3JkZXItdG9wOiAwcHggc29saWQgcmdiYSgyNTUsIDI1NSwgMjU1LCAwKTtcbiAgICBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZmMDtcbn1cblxuLm5hdmJhciB7XG5cbiAgICBkaXNwbGF5OiBmbGV4O1xuXG4gICAgcGFkZGluZzogMDtcblxuICAgIGZsZXgtd3JhcDogd3JhcDtcbiAgICBhbGlnbi1pdGVtczogY2VudGVyO1xuICAgIGp1c3RpZnktY29udGVudDogc3BhY2UtYmV0d2Vlbjtcbn1cblxuLm5hdmJhci1kYXJrIC5uYXZiYXItdG9nZ2xlci1pY29uIHtcbiAgICBiYWNrZ3JvdW5kLWltYWdlOlxuICAgICAgICB1cmwoXCJkYXRhOmltYWdlL3N2Zyt4bWw7Y2hhcnNldD11dGY4LCUzQ3N2ZyB2aWV3Qm94PScwIDAgMzAgMzAnIHhtbG5zPSdodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyclM0UlM0NwYXRoIHN0cm9rZT0ncmdiYSgwLCAwLCAwLCAwLjUpJyBzdHJva2Utd2lkdGg9JzInIHN0cm9rZS1saW5lY2FwPSdyb3VuZCcgc3Ryb2tlLW1pdGVybGltaXQ9JzEwJyBkPSdNNCA3aDIyTTQgMTVoMjJNNCAyM2gyMicvJTNFJTNDL3N2ZyUzRVwiKVxufVxuXG5cbi5mb290ZXIge1xuXG4gICAgbGVmdDogMDtcbiAgICByaWdodDogMDtcbiAgICBib3R0b206IDA7XG4gICAgcGFkZGluZzogMXJlbTtcbn1cblxuLnRleHQtYm9sZCB7XG4gICAgZm9udC13ZWlnaHQ6IDYwMDtcbn1cblxuLmJnZyB7XG4gICAgYmFja2dyb3VuZC1pbWFnZTogdXJsKCdzcmMvYXNzZXRzL2ltZy90aGVtZS9teWdlby1iYWNrZ3JvdW5kLmpwZycpO1xuICAgIGhlaWdodDogMTAwJTtcbiAgICBiYWNrZ3JvdW5kLXBvc2l0aW9uOiBjZW50ZXI7XG4gICAgYmFja2dyb3VuZC1yZXBlYXQ6IG5vLXJlcGVhdDtcbiAgICBiYWNrZ3JvdW5kLXNpemU6IGNvdmVyO1xufVxuXG4uZXJyb3ItbWVzc2FnZSB7XG4gICAgY29sb3I6ICNmNTM2NWM7XG4gICAgdGV4dC1hbGlnbjogcmlnaHQ7XG4gICAgZm9udC1zaXplOiAwLjhlbTtcbiAgICBwYWRkaW5nLXRvcDogNXB4O1xuICAgIHBhZGRpbmctYm90dG9tOiAwO1xuICAgIG1hcmdpbi1ib3R0b206IDA7XG59XG5cbi5uYXZiYXItaG9yaXpvbnRhbCAubmF2YmFyLW5hdiAuZHJvcGRvd24tbWVudTpiZWZvcmUge1xuICAgIGJhY2tncm91bmQ6IHJnYigyNywgMjcsIDI3KTtcbiAgICBib3gtc2hhZG93OiBub25lO1xuICAgIGNvbnRlbnQ6IFwiXCI7XG4gICAgZGlzcGxheTogYmxvY2s7XG4gICAgaGVpZ2h0OiAxNnB4O1xuICAgIHdpZHRoOiAxNnB4O1xuICAgIHJpZ2h0OiAyMHB4O1xuICAgIHBvc2l0aW9uOiBhYnNvbHV0ZTtcbiAgICBib3R0b206IDEwMCU7XG4gICAgLXdlYmtpdC10cmFuc2Zvcm06IHJvdGF0ZSgtNDVkZWcpIHRyYW5zbGF0ZVkoMXJlbSk7XG4gICAgdHJhbnNmb3JtOiByb3RhdGUoLTQ1ZGVnKSB0cmFuc2xhdGVZKDFyZW0pO1xuICAgIHotaW5kZXg6IC01O1xuICAgIGJvcmRlci1yYWRpdXM6IDAuMjVyZW07XG59XG5cbi5kcm9wZG93bi1tZW51IHtcbiAgICBiYWNrZ3JvdW5kLWNvbG9yOiByZ2IoMjcsIDI3LCAyNyk7XG59XG5cbi5kcm9wZG93bi1pdGVtOmhvdmVyIHtcbiAgICBiYWNrZ3JvdW5kLWNvbG9yOiByZ2IoMTE0LCAxMTQsIDExNCk7XG59XG5cbkBtZWRpYSAobWF4LXdpZHRoOiA5OTEuOThweCkge1xuXG4gICAgLm5hdmJhci1leHBhbmQtbGc+LmNvbnRhaW5lcixcbiAgICAubmF2YmFyLWV4cGFuZC1sZz4uY29udGFpbmVyLWZsdWlkIHtcbiAgICAgICAgcGFkZGluZzogLjU1cmVtIC41cmVtO1xuICAgIH1cbn0iLCJhIHtcbiAgdGV4dC1kZWNvcmF0aW9uOiBub25lO1xuICBjb2xvcjogI2ZkZmNmYztcbiAgYmFja2dyb3VuZC1jb2xvcjogdHJhbnNwYXJlbnQ7XG4gIC13ZWJraXQtdGV4dC1kZWNvcmF0aW9uLXNraXA6IG9iamVjdHM7XG59XG5cbmE6aG92ZXIge1xuICB0ZXh0LWRlY29yYXRpb246IG5vbmU7XG4gIGNvbG9yOiAjNDE0MTQxO1xufVxuXG5hOm5vdChbaHJlZl0pOm5vdChbdGFiaW5kZXhdKSB7XG4gIHRleHQtZGVjb3JhdGlvbjogbm9uZTtcbiAgY29sb3I6IGluaGVyaXQ7XG59XG5cbmE6bm90KFtocmVmXSk6bm90KFt0YWJpbmRleF0pOmhvdmVyLFxuYTpub3QoW2hyZWZdKTpub3QoW3RhYmluZGV4XSk6Zm9jdXMge1xuICB0ZXh0LWRlY29yYXRpb246IG5vbmU7XG4gIGNvbG9yOiBpbmhlcml0O1xufVxuXG5hOm5vdChbaHJlZl0pOm5vdChbdGFiaW5kZXhdKTpmb2N1cyB7XG4gIG91dGxpbmU6IDA7XG59XG5cbi5uYXZiYXIge1xuICBwb3NpdGlvbjogcmVsYXRpdmU7XG4gIGRpc3BsYXk6IGZsZXg7XG4gIHBhZGRpbmc6IDAuNXJlbSAwLjVyZW07XG4gIGZsZXgtd3JhcDogd3JhcDtcbiAgYWxpZ24taXRlbXM6IGNlbnRlcjtcbiAganVzdGlmeS1jb250ZW50OiBzcGFjZS1iZXR3ZWVuO1xufVxuXG4uZml4ZWQtdG9wIHtcbiAgcG9zaXRpb246IGZpeGVkO1xuICB6LWluZGV4OiAxMDMwO1xuICB0b3A6IDA7XG4gIHJpZ2h0OiAwO1xuICBsZWZ0OiAwO1xufVxuXG4uc3F1YXJlIHtcbiAgd2lkdGg6IDEwMHB4O1xuICBoZWlnaHQ6IDEwMHB4O1xufVxuXG4uYXV0byB7XG4gIGN1cnNvcjogYXV0bztcbn1cblxuLmRlZmF1bHQge1xuICBjdXJzb3I6IGRlZmF1bHQ7XG59XG5cbi5ub25lIHtcbiAgY3Vyc29yOiBub25lO1xufVxuXG4uY29udGV4dC1tZW51IHtcbiAgY3Vyc29yOiBjb250ZXh0LW1lbnU7XG59XG5cbi5oZWxwIHtcbiAgY3Vyc29yOiBoZWxwO1xufVxuXG4ucG9pbnRlciB7XG4gIGN1cnNvcjogcG9pbnRlcjtcbn1cblxuLnByb2dyZXNzIHtcbiAgY3Vyc29yOiBwcm9ncmVzcztcbn1cblxuLndhaXQge1xuICBjdXJzb3I6IHdhaXQ7XG59XG5cbi5jZWxsIHtcbiAgY3Vyc29yOiBjZWxsO1xufVxuXG4uY3Jvc3NoYWlyIHtcbiAgY3Vyc29yOiBjcm9zc2hhaXI7XG59XG5cbi50ZXh0IHtcbiAgY3Vyc29yOiB0ZXh0O1xufVxuXG4udmVydGljYWwtdGV4dCB7XG4gIGN1cnNvcjogdmVydGljYWwtdGV4dDtcbn1cblxuLmFsaWFzIHtcbiAgY3Vyc29yOiBhbGlhcztcbn1cblxuLmNvcHkge1xuICBjdXJzb3I6IGNvcHk7XG59XG5cbi5tb3ZlIHtcbiAgY3Vyc29yOiBtb3ZlO1xufVxuXG4ubm8tZHJvcCB7XG4gIGN1cnNvcjogbm8tZHJvcDtcbn1cblxuLm5vdC1hbGxvd2VkIHtcbiAgY3Vyc29yOiBub3QtYWxsb3dlZDtcbn1cblxuLmFsbC1zY3JvbGwge1xuICBjdXJzb3I6IGFsbC1zY3JvbGw7XG59XG5cbi5jb2wtcmVzaXplIHtcbiAgY3Vyc29yOiBjb2wtcmVzaXplO1xufVxuXG4ucm93LXJlc2l6ZSB7XG4gIGN1cnNvcjogcm93LXJlc2l6ZTtcbn1cblxuLm4tcmVzaXplIHtcbiAgY3Vyc29yOiBuLXJlc2l6ZTtcbn1cblxuLmUtcmVzaXplIHtcbiAgY3Vyc29yOiBlLXJlc2l6ZTtcbn1cblxuLnMtcmVzaXplIHtcbiAgY3Vyc29yOiBzLXJlc2l6ZTtcbn1cblxuLnctcmVzaXplIHtcbiAgY3Vyc29yOiB3LXJlc2l6ZTtcbn1cblxuLm5zLXJlc2l6ZSB7XG4gIGN1cnNvcjogbnMtcmVzaXplO1xufVxuXG4uZXctcmVzaXplIHtcbiAgY3Vyc29yOiBldy1yZXNpemU7XG59XG5cbi5uZS1yZXNpemUge1xuICBjdXJzb3I6IG5lLXJlc2l6ZTtcbn1cblxuLm53LXJlc2l6ZSB7XG4gIGN1cnNvcjogbnctcmVzaXplO1xufVxuXG4uc2UtcmVzaXplIHtcbiAgY3Vyc29yOiBzZS1yZXNpemU7XG59XG5cbi5zdy1yZXNpemUge1xuICBjdXJzb3I6IHN3LXJlc2l6ZTtcbn1cblxuLm5lc3ctcmVzaXplIHtcbiAgY3Vyc29yOiBuZXN3LXJlc2l6ZTtcbn1cblxuLm53c2UtcmVzaXplIHtcbiAgY3Vyc29yOiBud3NlLXJlc2l6ZTtcbn1cblxuLmJjYXJkOmhvdmVyIHtcbiAgYmFja2dyb3VuZC1jb2xvcjogIzZiY2ZmZDtcbiAgYm94LXNoYWRvdzogMCA4cHggMTZweCAwIHJnYmEoMCwgMCwgMCwgMC4yKTtcbn1cblxuLnJjYXJkOmhvdmVyIHtcbiAgYmFja2dyb3VuZC1jb2xvcjogI2ZkNmI2YjtcbiAgYm94LXNoYWRvdzogMCA4cHggMTZweCAwIHJnYmEoMCwgMCwgMCwgMC4yKTtcbn1cblxuLmdjYXJkOmhvdmVyIHtcbiAgYmFja2dyb3VuZC1jb2xvcjogIzdjZmQ2YjtcbiAgYm94LXNoYWRvdzogMCA4cHggMTZweCAwIHJnYmEoMCwgMCwgMCwgMC4yKTtcbn1cblxuLnNjcm9sbCB7XG4gIG1heC1oZWlnaHQ6IDUwMHB4O1xuICBvdmVyZmxvdy15OiBzY3JvbGw7XG59XG5cbi8qIEhpZGUgc2Nyb2xsYmFyIGZvciBDaHJvbWUsIFNhZmFyaSBhbmQgT3BlcmEgKi9cbi5zY3JvbGw6Oi13ZWJraXQtc2Nyb2xsYmFyIHtcbiAgZGlzcGxheTogbm9uZTtcbn1cblxuLyogSGlkZSBzY3JvbGxiYXIgZm9yIElFLCBFZGdlIGFuZCBGaXJlZm94ICovXG4uc2Nyb2xsIHtcbiAgLW1zLW92ZXJmbG93LXN0eWxlOiBub25lO1xuICAvKiBJRSBhbmQgRWRnZSAqL1xuICBzY3JvbGxiYXItd2lkdGg6IG5vbmU7XG4gIC8qIEZpcmVmb3ggKi9cbn1cblxuLmNhcmQtaGVhZGVyIHtcbiAgbWFyZ2luLXRvcDogMDtcbiAgcGFkZGluZzogMS4yNXJlbSAxLjVyZW07XG4gIGJvcmRlci1ib3R0b206IDFweCBzb2xpZCByZ2JhKDI1NSwgMjU1LCAyNTUsIDApO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZmMDtcbn1cblxuLmNhcmQge1xuICBib3JkZXItcmFkaXVzOiAwLjc1O1xufVxuXG4uY2FyZC1ib2R5IHtcbiAgZm9udC1zaXplOiA5MCU7XG59XG5cbi5jYXJkLWZvb3RlciB7XG4gIHBhZGRpbmc6IDEuMjVyZW0gMS41cmVtO1xuICBoZWlnaHQ6IDYwcHg7XG4gIGJvcmRlci10b3A6IDBweCBzb2xpZCByZ2JhKDI1NSwgMjU1LCAyNTUsIDApO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZmMDtcbn1cblxuLm5hdmJhciB7XG4gIGRpc3BsYXk6IGZsZXg7XG4gIHBhZGRpbmc6IDA7XG4gIGZsZXgtd3JhcDogd3JhcDtcbiAgYWxpZ24taXRlbXM6IGNlbnRlcjtcbiAganVzdGlmeS1jb250ZW50OiBzcGFjZS1iZXR3ZWVuO1xufVxuXG4ubmF2YmFyLWRhcmsgLm5hdmJhci10b2dnbGVyLWljb24ge1xuICBiYWNrZ3JvdW5kLWltYWdlOiB1cmwoXCJkYXRhOmltYWdlL3N2Zyt4bWw7Y2hhcnNldD11dGY4LCUzQ3N2ZyB2aWV3Qm94PScwIDAgMzAgMzAnIHhtbG5zPSdodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyclM0UlM0NwYXRoIHN0cm9rZT0ncmdiYSgwLCAwLCAwLCAwLjUpJyBzdHJva2Utd2lkdGg9JzInIHN0cm9rZS1saW5lY2FwPSdyb3VuZCcgc3Ryb2tlLW1pdGVybGltaXQ9JzEwJyBkPSdNNCA3aDIyTTQgMTVoMjJNNCAyM2gyMicvJTNFJTNDL3N2ZyUzRVwiKTtcbn1cblxuLmZvb3RlciB7XG4gIGxlZnQ6IDA7XG4gIHJpZ2h0OiAwO1xuICBib3R0b206IDA7XG4gIHBhZGRpbmc6IDFyZW07XG59XG5cbi50ZXh0LWJvbGQge1xuICBmb250LXdlaWdodDogNjAwO1xufVxuXG4uYmdnIHtcbiAgYmFja2dyb3VuZC1pbWFnZTogdXJsKFwic3JjL2Fzc2V0cy9pbWcvdGhlbWUvbXlnZW8tYmFja2dyb3VuZC5qcGdcIik7XG4gIGhlaWdodDogMTAwJTtcbiAgYmFja2dyb3VuZC1wb3NpdGlvbjogY2VudGVyO1xuICBiYWNrZ3JvdW5kLXJlcGVhdDogbm8tcmVwZWF0O1xuICBiYWNrZ3JvdW5kLXNpemU6IGNvdmVyO1xufVxuXG4uZXJyb3ItbWVzc2FnZSB7XG4gIGNvbG9yOiAjZjUzNjVjO1xuICB0ZXh0LWFsaWduOiByaWdodDtcbiAgZm9udC1zaXplOiAwLjhlbTtcbiAgcGFkZGluZy10b3A6IDVweDtcbiAgcGFkZGluZy1ib3R0b206IDA7XG4gIG1hcmdpbi1ib3R0b206IDA7XG59XG5cbi5uYXZiYXItaG9yaXpvbnRhbCAubmF2YmFyLW5hdiAuZHJvcGRvd24tbWVudTpiZWZvcmUge1xuICBiYWNrZ3JvdW5kOiAjMWIxYjFiO1xuICBib3gtc2hhZG93OiBub25lO1xuICBjb250ZW50OiBcIlwiO1xuICBkaXNwbGF5OiBibG9jaztcbiAgaGVpZ2h0OiAxNnB4O1xuICB3aWR0aDogMTZweDtcbiAgcmlnaHQ6IDIwcHg7XG4gIHBvc2l0aW9uOiBhYnNvbHV0ZTtcbiAgYm90dG9tOiAxMDAlO1xuICAtd2Via2l0LXRyYW5zZm9ybTogcm90YXRlKC00NWRlZykgdHJhbnNsYXRlWSgxcmVtKTtcbiAgdHJhbnNmb3JtOiByb3RhdGUoLTQ1ZGVnKSB0cmFuc2xhdGVZKDFyZW0pO1xuICB6LWluZGV4OiAtNTtcbiAgYm9yZGVyLXJhZGl1czogMC4yNXJlbTtcbn1cblxuLmRyb3Bkb3duLW1lbnUge1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjMWIxYjFiO1xufVxuXG4uZHJvcGRvd24taXRlbTpob3ZlciB7XG4gIGJhY2tncm91bmQtY29sb3I6ICM3MjcyNzI7XG59XG5cbkBtZWRpYSAobWF4LXdpZHRoOiA5OTEuOThweCkge1xuICAubmF2YmFyLWV4cGFuZC1sZyA+IC5jb250YWluZXIsXG4ubmF2YmFyLWV4cGFuZC1sZyA+IC5jb250YWluZXItZmx1aWQge1xuICAgIHBhZGRpbmc6IDAuNTVyZW0gMC41cmVtO1xuICB9XG59Il19 */");

/***/ }),

/***/ "./src/app/components/navbar2/navbar2.component.ts":
/*!*********************************************************!*\
  !*** ./src/app/components/navbar2/navbar2.component.ts ***!
  \*********************************************************/
/*! exports provided: Navbar2Component */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "Navbar2Component", function() { return Navbar2Component; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm5/core.js");
/* harmony import */ var sweetalert2__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! sweetalert2 */ "./node_modules/sweetalert2/dist/sweetalert2.all.js");
/* harmony import */ var sweetalert2__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(sweetalert2__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _angular_forms__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @angular/forms */ "./node_modules/@angular/forms/__ivy_ngcc__/fesm5/forms.js");
/* harmony import */ var ngx_bootstrap_dropdown__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ngx-bootstrap/dropdown */ "./node_modules/ngx-bootstrap/__ivy_ngcc__/dropdown/fesm5/ngx-bootstrap-dropdown.js");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/__ivy_ngcc__/fesm5/router.js");
/* harmony import */ var ngx_bootstrap__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ngx-bootstrap */ "./node_modules/ngx-bootstrap/__ivy_ngcc__/esm5/ngx-bootstrap.js");







var Navbar2Component = /** @class */ (function () {
    function Navbar2Component(router, formBuilder, modalService) {
        var _this = this;
        this.router = router;
        this.formBuilder = formBuilder;
        this.modalService = modalService;
        this.modalConfig = {
            keyboard: true,
            class: "modal-dialog-centered modal-lg"
        };
        this.feedbackFormMessages = {
            'feedback': [
                { type: 'required', message: 'Ruang ini perlu di isi' }
            ],
            'email': [
                { type: 'required', message: 'E-mel diperlukan' },
                { type: 'email', message: 'Masukkan e-mel yang sah' }
            ]
        };
        this.sidenavOpen = true;
        this.panelOpenState = false;
        this.oneAtATime = true;
        this.test = new Date();
        this.isCollapsed = true;
        router.events.subscribe(function (val) {
            _this.isCollapsed = true;
        });
    }
    Navbar2Component.prototype.mobileView = function () {
        if (window.innerWidth < 992) {
            return true;
        }
        return false;
    };
    Navbar2Component.prototype.ngOnInit = function () {
        this.feedbackForm = this.formBuilder.group({
            feedback: new _angular_forms__WEBPACK_IMPORTED_MODULE_3__["FormControl"]('', _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].compose([
                _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].required
            ])),
            email: new _angular_forms__WEBPACK_IMPORTED_MODULE_3__["FormControl"]('', _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].compose([
                _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].required,
                _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].email
            ]))
        });
    };
    Navbar2Component.prototype.openSidebar = function () {
        if (document.body.classList.contains("g-sidenav-pinned")) {
            document.body.classList.remove("g-sidenav-pinned");
            document.body.classList.add("g-sidenav-hidden");
            this.sidenavOpen = false;
        }
        else {
            document.body.classList.add("g-sidenav-pinned");
            document.body.classList.remove("g-sidenav-hidden");
            this.sidenavOpen = true;
        }
    };
    Navbar2Component.prototype.toggleSidenav = function () {
        if (document.body.classList.contains("g-sidenav-pinned")) {
            document.body.classList.remove("g-sidenav-pinned");
            document.body.classList.add("g-sidenav-hidden");
            this.sidenavOpen = false;
        }
        else {
            document.body.classList.add("g-sidenav-pinned");
            document.body.classList.remove("g-sidenav-hidden");
            this.sidenavOpen = true;
        }
    };
    Navbar2Component.prototype.openModal = function (modalRef) {
        this.modal = this.modalService.show(modalRef, this.modalConfig);
    };
    Navbar2Component.prototype.closeModal = function () {
        this.modal.hide();
        this.feedbackForm.reset();
    };
    Navbar2Component.prototype.confirm = function () {
        var _this = this;
        sweetalert2__WEBPACK_IMPORTED_MODULE_2___default.a.fire({
            title: "Pengesahan",
            text: "Anda pasti untuk menghantar maklum balas ini?",
            type: "info",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-info",
            confirmButtonText: "Pasti",
            showCancelButton: true,
            cancelButtonClass: "btn btn-danger",
            cancelButtonText: "Batal"
        }).then(function (result) {
            if (result.value) {
                _this.sentFeedback();
            }
        });
    };
    Navbar2Component.prototype.sentFeedback = function () {
        var _this = this;
        sweetalert2__WEBPACK_IMPORTED_MODULE_2___default.a.fire({
            title: "Berjaya",
            text: "Maklum balas berjaya dihantar",
            type: "success",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-success",
            confirmButtonText: "Tutup"
        }).then(function (result) {
            if (result.value) {
                _this.modal.hide();
                _this.feedbackForm.reset();
            }
        });
    };
    Navbar2Component.ctorParameters = function () { return [
        { type: _angular_router__WEBPACK_IMPORTED_MODULE_5__["Router"] },
        { type: _angular_forms__WEBPACK_IMPORTED_MODULE_3__["FormBuilder"] },
        { type: ngx_bootstrap__WEBPACK_IMPORTED_MODULE_6__["BsModalService"] }
    ]; };
    Navbar2Component = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"])({
            selector: 'app-navbar2',
            template: Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! raw-loader!./navbar2.component.html */ "./node_modules/raw-loader/dist/cjs.js!./src/app/components/navbar2/navbar2.component.html")).default,
            providers: [{ provide: ngx_bootstrap_dropdown__WEBPACK_IMPORTED_MODULE_4__["BsDropdownConfig"], useValue: { isAnimated: true, autoClose: true } }],
            styles: [Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! ./navbar2.component.scss */ "./src/app/components/navbar2/navbar2.component.scss")).default]
        }),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"])("design:paramtypes", [_angular_router__WEBPACK_IMPORTED_MODULE_5__["Router"],
            _angular_forms__WEBPACK_IMPORTED_MODULE_3__["FormBuilder"],
            ngx_bootstrap__WEBPACK_IMPORTED_MODULE_6__["BsModalService"]])
    ], Navbar2Component);
    return Navbar2Component;
}());



/***/ }),

/***/ "./src/app/components/sidebar/sidebar.component.scss":
/*!***********************************************************!*\
  !*** ./src/app/components/sidebar/sidebar.component.scss ***!
  \***********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (".auto {\n  cursor: auto;\n}\n\n.default {\n  cursor: default;\n}\n\n.none {\n  cursor: none;\n}\n\n.context-menu {\n  cursor: context-menu;\n}\n\n.help {\n  cursor: help;\n}\n\n.pointer {\n  cursor: pointer;\n}\n\n.progress {\n  cursor: progress;\n}\n\n.wait {\n  cursor: wait;\n}\n\n.cell {\n  cursor: cell;\n}\n\n.crosshair {\n  cursor: crosshair;\n}\n\n.text {\n  cursor: text;\n}\n\n.vertical-text {\n  cursor: vertical-text;\n}\n\n.alias {\n  cursor: alias;\n}\n\n.copy {\n  cursor: copy;\n}\n\n.move {\n  cursor: move;\n}\n\n.no-drop {\n  cursor: no-drop;\n}\n\n.not-allowed {\n  cursor: not-allowed;\n}\n\n.all-scroll {\n  cursor: all-scroll;\n}\n\n.col-resize {\n  cursor: col-resize;\n}\n\n.row-resize {\n  cursor: row-resize;\n}\n\n.n-resize {\n  cursor: n-resize;\n}\n\n.e-resize {\n  cursor: e-resize;\n}\n\n.s-resize {\n  cursor: s-resize;\n}\n\n.w-resize {\n  cursor: w-resize;\n}\n\n.ns-resize {\n  cursor: ns-resize;\n}\n\n.ew-resize {\n  cursor: ew-resize;\n}\n\n.ne-resize {\n  cursor: ne-resize;\n}\n\n.nw-resize {\n  cursor: nw-resize;\n}\n\n.se-resize {\n  cursor: se-resize;\n}\n\n.sw-resize {\n  cursor: sw-resize;\n}\n\n.nesw-resize {\n  cursor: nesw-resize;\n}\n\n.nwse-resize {\n  cursor: nwse-resize;\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIi9BcHBsaWNhdGlvbnMvTUFNUC9odGRvY3MvYWZpcWZlL3dlYi9zcmMvYXBwL2NvbXBvbmVudHMvc2lkZWJhci9zaWRlYmFyLmNvbXBvbmVudC5zY3NzIiwic3JjL2FwcC9jb21wb25lbnRzL3NpZGViYXIvc2lkZWJhci5jb21wb25lbnQuc2NzcyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQTtFQUFpQixZQUFBO0FDRWpCOztBRERBO0VBQWlCLGVBQUE7QUNLakI7O0FESkE7RUFBaUIsWUFBQTtBQ1FqQjs7QURQQTtFQUFpQixvQkFBQTtBQ1dqQjs7QURWQTtFQUFpQixZQUFBO0FDY2pCOztBRGJBO0VBQWlCLGVBQUE7QUNpQmpCOztBRGhCQTtFQUFpQixnQkFBQTtBQ29CakI7O0FEbkJBO0VBQWlCLFlBQUE7QUN1QmpCOztBRHRCQTtFQUFpQixZQUFBO0FDMEJqQjs7QUR6QkE7RUFBaUIsaUJBQUE7QUM2QmpCOztBRDVCQTtFQUFpQixZQUFBO0FDZ0NqQjs7QUQvQkE7RUFBaUIscUJBQUE7QUNtQ2pCOztBRGxDQTtFQUFpQixhQUFBO0FDc0NqQjs7QURyQ0E7RUFBaUIsWUFBQTtBQ3lDakI7O0FEeENBO0VBQWlCLFlBQUE7QUM0Q2pCOztBRDNDQTtFQUFpQixlQUFBO0FDK0NqQjs7QUQ5Q0E7RUFBaUIsbUJBQUE7QUNrRGpCOztBRGpEQTtFQUFpQixrQkFBQTtBQ3FEakI7O0FEcERBO0VBQWlCLGtCQUFBO0FDd0RqQjs7QUR2REE7RUFBaUIsa0JBQUE7QUMyRGpCOztBRDFEQTtFQUFpQixnQkFBQTtBQzhEakI7O0FEN0RBO0VBQWlCLGdCQUFBO0FDaUVqQjs7QURoRUE7RUFBaUIsZ0JBQUE7QUNvRWpCOztBRG5FQTtFQUFpQixnQkFBQTtBQ3VFakI7O0FEdEVBO0VBQWlCLGlCQUFBO0FDMEVqQjs7QUR6RUE7RUFBaUIsaUJBQUE7QUM2RWpCOztBRDVFQTtFQUFpQixpQkFBQTtBQ2dGakI7O0FEL0VBO0VBQWlCLGlCQUFBO0FDbUZqQjs7QURsRkE7RUFBaUIsaUJBQUE7QUNzRmpCOztBRHJGQTtFQUFpQixpQkFBQTtBQ3lGakI7O0FEeEZBO0VBQWlCLG1CQUFBO0FDNEZqQjs7QUQzRkE7RUFBaUIsbUJBQUE7QUMrRmpCIiwiZmlsZSI6InNyYy9hcHAvY29tcG9uZW50cy9zaWRlYmFyL3NpZGViYXIuY29tcG9uZW50LnNjc3MiLCJzb3VyY2VzQ29udGVudCI6WyIuYXV0byAgICAgICAgICB7IGN1cnNvcjogYXV0bzsgfVxuLmRlZmF1bHQgICAgICAgeyBjdXJzb3I6IGRlZmF1bHQ7IH1cbi5ub25lICAgICAgICAgIHsgY3Vyc29yOiBub25lOyB9XG4uY29udGV4dC1tZW51ICB7IGN1cnNvcjogY29udGV4dC1tZW51OyB9XG4uaGVscCAgICAgICAgICB7IGN1cnNvcjogaGVscDsgfVxuLnBvaW50ZXIgICAgICAgeyBjdXJzb3I6IHBvaW50ZXI7IH1cbi5wcm9ncmVzcyAgICAgIHsgY3Vyc29yOiBwcm9ncmVzczsgfVxuLndhaXQgICAgICAgICAgeyBjdXJzb3I6IHdhaXQ7IH1cbi5jZWxsICAgICAgICAgIHsgY3Vyc29yOiBjZWxsOyB9XG4uY3Jvc3NoYWlyICAgICB7IGN1cnNvcjogY3Jvc3NoYWlyOyB9XG4udGV4dCAgICAgICAgICB7IGN1cnNvcjogdGV4dDsgfVxuLnZlcnRpY2FsLXRleHQgeyBjdXJzb3I6IHZlcnRpY2FsLXRleHQ7IH1cbi5hbGlhcyAgICAgICAgIHsgY3Vyc29yOiBhbGlhczsgfVxuLmNvcHkgICAgICAgICAgeyBjdXJzb3I6IGNvcHk7IH1cbi5tb3ZlICAgICAgICAgIHsgY3Vyc29yOiBtb3ZlOyB9XG4ubm8tZHJvcCAgICAgICB7IGN1cnNvcjogbm8tZHJvcDsgfVxuLm5vdC1hbGxvd2VkICAgeyBjdXJzb3I6IG5vdC1hbGxvd2VkOyB9XG4uYWxsLXNjcm9sbCAgICB7IGN1cnNvcjogYWxsLXNjcm9sbDsgfVxuLmNvbC1yZXNpemUgICAgeyBjdXJzb3I6IGNvbC1yZXNpemU7IH1cbi5yb3ctcmVzaXplICAgIHsgY3Vyc29yOiByb3ctcmVzaXplOyB9XG4ubi1yZXNpemUgICAgICB7IGN1cnNvcjogbi1yZXNpemU7IH1cbi5lLXJlc2l6ZSAgICAgIHsgY3Vyc29yOiBlLXJlc2l6ZTsgfVxuLnMtcmVzaXplICAgICAgeyBjdXJzb3I6IHMtcmVzaXplOyB9XG4udy1yZXNpemUgICAgICB7IGN1cnNvcjogdy1yZXNpemU7IH1cbi5ucy1yZXNpemUgICAgIHsgY3Vyc29yOiBucy1yZXNpemU7IH1cbi5ldy1yZXNpemUgICAgIHsgY3Vyc29yOiBldy1yZXNpemU7IH1cbi5uZS1yZXNpemUgICAgIHsgY3Vyc29yOiBuZS1yZXNpemU7IH1cbi5udy1yZXNpemUgICAgIHsgY3Vyc29yOiBudy1yZXNpemU7IH1cbi5zZS1yZXNpemUgICAgIHsgY3Vyc29yOiBzZS1yZXNpemU7IH1cbi5zdy1yZXNpemUgICAgIHsgY3Vyc29yOiBzdy1yZXNpemU7IH1cbi5uZXN3LXJlc2l6ZSAgIHsgY3Vyc29yOiBuZXN3LXJlc2l6ZTsgfVxuLm53c2UtcmVzaXplICAgeyBjdXJzb3I6IG53c2UtcmVzaXplOyB9XG4iLCIuYXV0byB7XG4gIGN1cnNvcjogYXV0bztcbn1cblxuLmRlZmF1bHQge1xuICBjdXJzb3I6IGRlZmF1bHQ7XG59XG5cbi5ub25lIHtcbiAgY3Vyc29yOiBub25lO1xufVxuXG4uY29udGV4dC1tZW51IHtcbiAgY3Vyc29yOiBjb250ZXh0LW1lbnU7XG59XG5cbi5oZWxwIHtcbiAgY3Vyc29yOiBoZWxwO1xufVxuXG4ucG9pbnRlciB7XG4gIGN1cnNvcjogcG9pbnRlcjtcbn1cblxuLnByb2dyZXNzIHtcbiAgY3Vyc29yOiBwcm9ncmVzcztcbn1cblxuLndhaXQge1xuICBjdXJzb3I6IHdhaXQ7XG59XG5cbi5jZWxsIHtcbiAgY3Vyc29yOiBjZWxsO1xufVxuXG4uY3Jvc3NoYWlyIHtcbiAgY3Vyc29yOiBjcm9zc2hhaXI7XG59XG5cbi50ZXh0IHtcbiAgY3Vyc29yOiB0ZXh0O1xufVxuXG4udmVydGljYWwtdGV4dCB7XG4gIGN1cnNvcjogdmVydGljYWwtdGV4dDtcbn1cblxuLmFsaWFzIHtcbiAgY3Vyc29yOiBhbGlhcztcbn1cblxuLmNvcHkge1xuICBjdXJzb3I6IGNvcHk7XG59XG5cbi5tb3ZlIHtcbiAgY3Vyc29yOiBtb3ZlO1xufVxuXG4ubm8tZHJvcCB7XG4gIGN1cnNvcjogbm8tZHJvcDtcbn1cblxuLm5vdC1hbGxvd2VkIHtcbiAgY3Vyc29yOiBub3QtYWxsb3dlZDtcbn1cblxuLmFsbC1zY3JvbGwge1xuICBjdXJzb3I6IGFsbC1zY3JvbGw7XG59XG5cbi5jb2wtcmVzaXplIHtcbiAgY3Vyc29yOiBjb2wtcmVzaXplO1xufVxuXG4ucm93LXJlc2l6ZSB7XG4gIGN1cnNvcjogcm93LXJlc2l6ZTtcbn1cblxuLm4tcmVzaXplIHtcbiAgY3Vyc29yOiBuLXJlc2l6ZTtcbn1cblxuLmUtcmVzaXplIHtcbiAgY3Vyc29yOiBlLXJlc2l6ZTtcbn1cblxuLnMtcmVzaXplIHtcbiAgY3Vyc29yOiBzLXJlc2l6ZTtcbn1cblxuLnctcmVzaXplIHtcbiAgY3Vyc29yOiB3LXJlc2l6ZTtcbn1cblxuLm5zLXJlc2l6ZSB7XG4gIGN1cnNvcjogbnMtcmVzaXplO1xufVxuXG4uZXctcmVzaXplIHtcbiAgY3Vyc29yOiBldy1yZXNpemU7XG59XG5cbi5uZS1yZXNpemUge1xuICBjdXJzb3I6IG5lLXJlc2l6ZTtcbn1cblxuLm53LXJlc2l6ZSB7XG4gIGN1cnNvcjogbnctcmVzaXplO1xufVxuXG4uc2UtcmVzaXplIHtcbiAgY3Vyc29yOiBzZS1yZXNpemU7XG59XG5cbi5zdy1yZXNpemUge1xuICBjdXJzb3I6IHN3LXJlc2l6ZTtcbn1cblxuLm5lc3ctcmVzaXplIHtcbiAgY3Vyc29yOiBuZXN3LXJlc2l6ZTtcbn1cblxuLm53c2UtcmVzaXplIHtcbiAgY3Vyc29yOiBud3NlLXJlc2l6ZTtcbn0iXX0= */");

/***/ }),

/***/ "./src/app/components/sidebar/sidebar.component.ts":
/*!*********************************************************!*\
  !*** ./src/app/components/sidebar/sidebar.component.ts ***!
  \*********************************************************/
/*! exports provided: SidebarComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "SidebarComponent", function() { return SidebarComponent; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm5/core.js");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/__ivy_ngcc__/fesm5/router.js");
/* harmony import */ var _shared_menu_menu_items__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../shared/menu/menu-items */ "./src/app/shared/menu/menu-items.ts");
/* harmony import */ var src_app_shared_services_auth_auth_service__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! src/app/shared/services/auth/auth.service */ "./src/app/shared/services/auth/auth.service.ts");
/* harmony import */ var src_app_shared_handler_jwt_jwt_service__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! src/app/shared/handler/jwt/jwt.service */ "./src/app/shared/handler/jwt/jwt.service.ts");






var misc = {
    sidebar_mini_active: true
};
var SidebarComponent = /** @class */ (function () {
    function SidebarComponent(jwtService, authService, router) {
        this.jwtService = jwtService;
        this.authService = authService;
        this.router = router;
        this.isCollapsed = true;
    }
    SidebarComponent.prototype.ngOnInit = function () {
        var _this = this;
        if (this.authService.userRole == 1) {
            this.menu = _shared_menu_menu_items__WEBPACK_IMPORTED_MODULE_3__["ROUTESADMIN"];
        }
        else if (this.authService.userRole == 2) {
            this.menu = _shared_menu_menu_items__WEBPACK_IMPORTED_MODULE_3__["ROUTESADMIN2"];
        }
        else if (this.authService.userRole == 3) {
            this.menu = _shared_menu_menu_items__WEBPACK_IMPORTED_MODULE_3__["ROUTESADMIN3"];
        }
        else if (this.authService.userRole == 4) {
            this.menu = _shared_menu_menu_items__WEBPACK_IMPORTED_MODULE_3__["ROUTESUSER"];
        }
        else if (this.authService.userRole == 5) {
            this.menu = _shared_menu_menu_items__WEBPACK_IMPORTED_MODULE_3__["ROUTESUSER2"];
        }
        else if (this.authService.userRole == 6) {
            this.menu = _shared_menu_menu_items__WEBPACK_IMPORTED_MODULE_3__["ROUTESUSER3"];
        }
        this.menuItems = this.menu.filter(function (menuItem) { return menuItem; });
        this.router.events.subscribe(function (event) {
            _this.isCollapsed = true;
        });
    };
    SidebarComponent.prototype.navigatePage = function (path) {
        if (path == "notifications") {
            return this.router.navigate(["/global/notifications"]);
        }
        else if (path == "profile") {
            return this.router.navigate(["/user/profile"]);
        }
        else if (path == "settings") {
            return this.router.navigate(["/global/settings"]);
        }
        else if (path == "home") {
            return this.router.navigate(["/auth/login"]);
        }
    };
    SidebarComponent.prototype.logout = function () {
        this.jwtService.destroyToken();
        this.navigatePage("home");
    };
    SidebarComponent.prototype.onMouseEnterSidenav = function () {
        if (!document.body.classList.contains("g-sidenav-pinned")) {
            document.body.classList.add("g-sidenav-show");
        }
    };
    SidebarComponent.prototype.onMouseLeaveSidenav = function () {
        if (!document.body.classList.contains("g-sidenav-pinned")) {
            document.body.classList.remove("g-sidenav-show");
        }
    };
    SidebarComponent.prototype.minimizeSidebar = function () {
        var sidenavToggler = document.getElementsByClassName("sidenav-toggler")[0];
        var body = document.getElementsByTagName("body")[0];
        if (body.classList.contains("g-sidenav-pinned")) {
            misc.sidebar_mini_active = true;
        }
        else {
            misc.sidebar_mini_active = false;
        }
        if (misc.sidebar_mini_active === true) {
            body.classList.remove("g-sidenav-pinned");
            body.classList.add("g-sidenav-hidden");
            sidenavToggler.classList.remove("active");
            misc.sidebar_mini_active = false;
        }
        else {
            body.classList.add("g-sidenav-pinned");
            body.classList.remove("g-sidenav-hidden");
            sidenavToggler.classList.add("active");
            misc.sidebar_mini_active = true;
        }
    };
    SidebarComponent.ctorParameters = function () { return [
        { type: src_app_shared_handler_jwt_jwt_service__WEBPACK_IMPORTED_MODULE_5__["JwtService"] },
        { type: src_app_shared_services_auth_auth_service__WEBPACK_IMPORTED_MODULE_4__["AuthService"] },
        { type: _angular_router__WEBPACK_IMPORTED_MODULE_2__["Router"] }
    ]; };
    SidebarComponent = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"])({
            selector: "app-sidebar",
            template: Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! raw-loader!./sidebar.component.html */ "./node_modules/raw-loader/dist/cjs.js!./src/app/components/sidebar/sidebar.component.html")).default,
            styles: [Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! ./sidebar.component.scss */ "./src/app/components/sidebar/sidebar.component.scss")).default]
        }),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"])("design:paramtypes", [src_app_shared_handler_jwt_jwt_service__WEBPACK_IMPORTED_MODULE_5__["JwtService"],
            src_app_shared_services_auth_auth_service__WEBPACK_IMPORTED_MODULE_4__["AuthService"],
            _angular_router__WEBPACK_IMPORTED_MODULE_2__["Router"]])
    ], SidebarComponent);
    return SidebarComponent;
}());



/***/ }),

/***/ "./src/app/components/vector-map/vector-map.component.css":
/*!****************************************************************!*\
  !*** ./src/app/components/vector-map/vector-map.component.css ***!
  \****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("::ng-deep #vector-map {\n    min-height: 220px;\n    width: 100%;\n    display: block;\n}\n::ng-deep #vector-map > svg > rect{\n  display: none;\n}\n\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbInNyYy9hcHAvY29tcG9uZW50cy92ZWN0b3ItbWFwL3ZlY3Rvci1tYXAuY29tcG9uZW50LmNzcyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQTtJQUNJLGlCQUFpQjtJQUNqQixXQUFXO0lBQ1gsY0FBYztBQUNsQjtBQUNBO0VBQ0UsYUFBYTtBQUNmIiwiZmlsZSI6InNyYy9hcHAvY29tcG9uZW50cy92ZWN0b3ItbWFwL3ZlY3Rvci1tYXAuY29tcG9uZW50LmNzcyIsInNvdXJjZXNDb250ZW50IjpbIjo6bmctZGVlcCAjdmVjdG9yLW1hcCB7XG4gICAgbWluLWhlaWdodDogMjIwcHg7XG4gICAgd2lkdGg6IDEwMCU7XG4gICAgZGlzcGxheTogYmxvY2s7XG59XG46Om5nLWRlZXAgI3ZlY3Rvci1tYXAgPiBzdmcgPiByZWN0e1xuICBkaXNwbGF5OiBub25lO1xufVxuIl19 */");

/***/ }),

/***/ "./src/app/components/vector-map/vector-map.component.ts":
/*!***************************************************************!*\
  !*** ./src/app/components/vector-map/vector-map.component.ts ***!
  \***************************************************************/
/*! exports provided: VectorMapComponent1 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "VectorMapComponent1", function() { return VectorMapComponent1; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm5/core.js");
/* harmony import */ var devextreme_dist_js_vectormap_data_world_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! devextreme/dist/js/vectormap-data/world.js */ "./node_modules/devextreme/dist/js/vectormap-data/world.js");
/* harmony import */ var devextreme_dist_js_vectormap_data_world_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(devextreme_dist_js_vectormap_data_world_js__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _vector_map_service__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./vector-map.service */ "./src/app/components/vector-map/vector-map.service.ts");




var VectorMapComponent1 = /** @class */ (function () {
    function VectorMapComponent1(service) {
        this.worldMap = devextreme_dist_js_vectormap_data_world_js__WEBPACK_IMPORTED_MODULE_2__["world"];
        this.countries = service.getCountries();
        this.customizeTooltip = this.customizeTooltip.bind(this);
        this.customizeLayers = this.customizeLayers.bind(this);
        this.click = this.click.bind(this);
    }
    VectorMapComponent1.prototype.customizeTooltip = function (arg) {
        var name = arg.attribute("name");
        return {
            text: name,
            color: "#FFFFFF",
            fontColor: "#000"
        };
    };
    VectorMapComponent1.prototype.customizeLayers = function (elements) {
        var _this = this;
        elements.forEach(function (element) {
            var country = _this.countries[element.attribute("name")];
            if (country) {
                element.applySettings({
                    color: country.color,
                    hoveredColor: country.color,
                    selectedColor: country.color
                });
            }
            else {
                element.applySettings({
                    color: "#e4e4e4",
                    hoveredColor: "#e4e4e4",
                    selectedColor: "#e4e4e4"
                });
            }
        });
    };
    VectorMapComponent1.prototype.click = function (e) {
        var target = e.target;
        if (target && this.countries[target.attribute("name")]) {
            target.selected(!target.selected());
        }
    };
    VectorMapComponent1.ctorParameters = function () { return [
        { type: _vector_map_service__WEBPACK_IMPORTED_MODULE_3__["Service"] }
    ]; };
    VectorMapComponent1 = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"])({
            selector: "app-vector-map-component",
            template: Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! raw-loader!./vector-map.component.html */ "./node_modules/raw-loader/dist/cjs.js!./src/app/components/vector-map/vector-map.component.html")).default,
            providers: [_vector_map_service__WEBPACK_IMPORTED_MODULE_3__["Service"]],
            styles: [Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! ./vector-map.component.css */ "./src/app/components/vector-map/vector-map.component.css")).default]
        }),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"])("design:paramtypes", [_vector_map_service__WEBPACK_IMPORTED_MODULE_3__["Service"]])
    ], VectorMapComponent1);
    return VectorMapComponent1;
}());



/***/ }),

/***/ "./src/app/components/vector-map/vector-map.service.ts":
/*!*************************************************************!*\
  !*** ./src/app/components/vector-map/vector-map.service.ts ***!
  \*************************************************************/
/*! exports provided: Country, Countries, Service */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "Country", function() { return Country; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "Countries", function() { return Countries; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "Service", function() { return Service; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm5/core.js");
/* harmony import */ var d3_scale__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! d3-scale */ "./node_modules/d3-scale/src/index.js");



var popScale = Object(d3_scale__WEBPACK_IMPORTED_MODULE_2__["scaleLinear"])()
    .domain([100, 3000])
    .range(["#AAAAAA", "#444444"]);
var Country = /** @class */ (function () {
    function Country() {
    }
    return Country;
}());

var Countries = /** @class */ (function () {
    function Countries() {
    }
    return Countries;
}());

var countries = {
    Russia: { color: popScale(300) },
    Canada: { color: popScale(120) },
    China: { color: popScale(1300) },
    "United States": { color: popScale(2920) },
    Brazil: { color: popScale(550) },
    Australia: { color: popScale(760) },
    India: { color: popScale(200) },
    Argentina: { color: popScale(240) },
    Romania: { color: popScale(600) },
    Algeria: { color: popScale(540) }
};
var Service = /** @class */ (function () {
    function Service() {
    }
    Service.prototype.getCountries = function () {
        return countries;
    };
    Service = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Injectable"])()
    ], Service);
    return Service;
}());



/***/ }),

/***/ "./src/app/dashboard/dashboard.component.scss":
/*!****************************************************!*\
  !*** ./src/app/dashboard/dashboard.component.scss ***!
  \****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IiIsImZpbGUiOiJzcmMvYXBwL2Rhc2hib2FyZC9kYXNoYm9hcmQuY29tcG9uZW50LnNjc3MifQ== */");

/***/ }),

/***/ "./src/app/dashboard/dashboard.component.ts":
/*!**************************************************!*\
  !*** ./src/app/dashboard/dashboard.component.ts ***!
  \**************************************************/
/*! exports provided: DashboardComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "DashboardComponent", function() { return DashboardComponent; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm5/core.js");


var DashboardComponent = /** @class */ (function () {
    function DashboardComponent() {
    }
    DashboardComponent.prototype.ngOnInit = function () {
    };
    DashboardComponent = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"])({
            selector: 'app-dashboard',
            template: Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! raw-loader!./dashboard.component.html */ "./node_modules/raw-loader/dist/cjs.js!./src/app/dashboard/dashboard.component.html")).default,
            styles: [Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! ./dashboard.component.scss */ "./src/app/dashboard/dashboard.component.scss")).default]
        }),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"])("design:paramtypes", [])
    ], DashboardComponent);
    return DashboardComponent;
}());



/***/ }),

/***/ "./src/app/examples/presentation/presentation.component.scss":
/*!*******************************************************************!*\
  !*** ./src/app/examples/presentation/presentation.component.scss ***!
  \*******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (".btn .badge-floating.badge:not(.badge-circle) {\n  -webkit-transform: translate(-30%, 50%);\n          transform: translate(-30%, 50%);\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIi9BcHBsaWNhdGlvbnMvTUFNUC9odGRvY3MvYWZpcWZlL3dlYi9zcmMvYXBwL2V4YW1wbGVzL3ByZXNlbnRhdGlvbi9wcmVzZW50YXRpb24uY29tcG9uZW50LnNjc3MiLCJzcmMvYXBwL2V4YW1wbGVzL3ByZXNlbnRhdGlvbi9wcmVzZW50YXRpb24uY29tcG9uZW50LnNjc3MiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBTUk7RUFDRSx1Q0FBQTtVQUFBLCtCQUFBO0FDTE4iLCJmaWxlIjoic3JjL2FwcC9leGFtcGxlcy9wcmVzZW50YXRpb24vcHJlc2VudGF0aW9uLmNvbXBvbmVudC5zY3NzIiwic291cmNlc0NvbnRlbnQiOlsiLy9cbi8vIEJhZGdlIGZsb2F0aW5nXG4vL1xuXG4uYnRuIHtcbiAgLmJhZGdlLWZsb2F0aW5nIHtcbiAgICAmLmJhZGdlOm5vdCguYmFkZ2UtY2lyY2xlKSB7XG4gICAgICB0cmFuc2Zvcm06IHRyYW5zbGF0ZSgtMzAlLCA1MCUpO1xuICAgIH1cbiAgfVxufVxuIiwiLmJ0biAuYmFkZ2UtZmxvYXRpbmcuYmFkZ2U6bm90KC5iYWRnZS1jaXJjbGUpIHtcbiAgdHJhbnNmb3JtOiB0cmFuc2xhdGUoLTMwJSwgNTAlKTtcbn0iXX0= */");

/***/ }),

/***/ "./src/app/examples/presentation/presentation.component.ts":
/*!*****************************************************************!*\
  !*** ./src/app/examples/presentation/presentation.component.ts ***!
  \*****************************************************************/
/*! exports provided: PresentationComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "PresentationComponent", function() { return PresentationComponent; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm5/core.js");


var PresentationComponent = /** @class */ (function () {
    function PresentationComponent() {
        this.test = new Date();
        this.isCollapsed = true;
    }
    PresentationComponent.prototype.ngOnInit = function () { };
    PresentationComponent = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"])({
            selector: "app-presentation",
            template: Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! raw-loader!./presentation.component.html */ "./node_modules/raw-loader/dist/cjs.js!./src/app/examples/presentation/presentation.component.html")).default,
            styles: [Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! ./presentation.component.scss */ "./src/app/examples/presentation/presentation.component.scss")).default]
        }),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"])("design:paramtypes", [])
    ], PresentationComponent);
    return PresentationComponent;
}());



/***/ }),

/***/ "./src/app/examples/presentation/presentation.module.ts":
/*!**************************************************************!*\
  !*** ./src/app/examples/presentation/presentation.module.ts ***!
  \**************************************************************/
/*! exports provided: PresentationModule */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "PresentationModule", function() { return PresentationModule; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm5/core.js");
/* harmony import */ var _angular_common__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/common */ "./node_modules/@angular/common/__ivy_ngcc__/fesm5/common.js");
/* harmony import */ var ngx_bootstrap_tooltip__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ngx-bootstrap/tooltip */ "./node_modules/ngx-bootstrap/__ivy_ngcc__/tooltip/fesm5/ngx-bootstrap-tooltip.js");
/* harmony import */ var ngx_bootstrap_dropdown__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ngx-bootstrap/dropdown */ "./node_modules/ngx-bootstrap/__ivy_ngcc__/dropdown/fesm5/ngx-bootstrap-dropdown.js");
/* harmony import */ var ngx_bootstrap_collapse__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ngx-bootstrap/collapse */ "./node_modules/ngx-bootstrap/__ivy_ngcc__/collapse/fesm5/ngx-bootstrap-collapse.js");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/__ivy_ngcc__/fesm5/router.js");
/* harmony import */ var _presentation_component__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./presentation.component */ "./src/app/examples/presentation/presentation.component.ts");








var PresentationModule = /** @class */ (function () {
    function PresentationModule() {
    }
    PresentationModule = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["NgModule"])({
            declarations: [_presentation_component__WEBPACK_IMPORTED_MODULE_7__["PresentationComponent"]],
            imports: [_angular_common__WEBPACK_IMPORTED_MODULE_2__["CommonModule"], _angular_router__WEBPACK_IMPORTED_MODULE_6__["RouterModule"], ngx_bootstrap_tooltip__WEBPACK_IMPORTED_MODULE_3__["TooltipModule"].forRoot(), ngx_bootstrap_dropdown__WEBPACK_IMPORTED_MODULE_4__["BsDropdownModule"].forRoot(), ngx_bootstrap_collapse__WEBPACK_IMPORTED_MODULE_5__["CollapseModule"].forRoot()]
        })
    ], PresentationModule);
    return PresentationModule;
}());



/***/ }),

/***/ "./src/app/layouts/admin-layout/admin-layout.component.scss":
/*!******************************************************************!*\
  !*** ./src/app/layouts/admin-layout/admin-layout.component.scss ***!
  \******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IiIsImZpbGUiOiJzcmMvYXBwL2xheW91dHMvYWRtaW4tbGF5b3V0L2FkbWluLWxheW91dC5jb21wb25lbnQuc2NzcyJ9 */");

/***/ }),

/***/ "./src/app/layouts/admin-layout/admin-layout.component.ts":
/*!****************************************************************!*\
  !*** ./src/app/layouts/admin-layout/admin-layout.component.ts ***!
  \****************************************************************/
/*! exports provided: AdminLayoutComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "AdminLayoutComponent", function() { return AdminLayoutComponent; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm5/core.js");


var AdminLayoutComponent = /** @class */ (function () {
    function AdminLayoutComponent() {
        if (window.innerWidth < 1200) {
            this.isMobileResolution = true;
        }
        else {
            this.isMobileResolution = false;
        }
    }
    AdminLayoutComponent.prototype.isMobile = function (event) {
        if (window.innerWidth < 1200) {
            this.isMobileResolution = true;
        }
        else {
            this.isMobileResolution = false;
        }
    };
    AdminLayoutComponent.prototype.ngOnInit = function () { };
    Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["HostListener"])("window:resize", ["$event"]),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"])("design:type", Function),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"])("design:paramtypes", [Object]),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"])("design:returntype", void 0)
    ], AdminLayoutComponent.prototype, "isMobile", null);
    AdminLayoutComponent = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"])({
            selector: "app-admin-layout",
            template: Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! raw-loader!./admin-layout.component.html */ "./node_modules/raw-loader/dist/cjs.js!./src/app/layouts/admin-layout/admin-layout.component.html")).default,
            styles: [Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! ./admin-layout.component.scss */ "./src/app/layouts/admin-layout/admin-layout.component.scss")).default]
        }),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"])("design:paramtypes", [])
    ], AdminLayoutComponent);
    return AdminLayoutComponent;
}());



/***/ }),

/***/ "./src/app/layouts/auth-layout/auth-layout.component.scss":
/*!****************************************************************!*\
  !*** ./src/app/layouts/auth-layout/auth-layout.component.scss ***!
  \****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("a {\n  text-decoration: none;\n  color: black;\n  background-color: transparent;\n  -webkit-text-decoration-skip: objects;\n}\n\na:hover {\n  text-decoration: none;\n  color: #494949;\n}\n\na:not([href]):not([tabindex]) {\n  text-decoration: none;\n  color: inherit;\n}\n\na:not([href]):not([tabindex]):hover,\na:not([href]):not([tabindex]):focus {\n  text-decoration: none;\n  color: inherit;\n}\n\na:not([href]):not([tabindex]):focus {\n  outline: 0;\n}\n\n.navbar-dark .navbar-nav .nav-link {\n  color: rgba(0, 0, 0, 0.95);\n}\n\n.navbar-dark .navbar-nav .nav-link:hover,\n.navbar-dark .navbar-nav .nav-link:focus {\n  color: rgba(65, 65, 65, 0.65);\n}\n\n.navbar-dark .navbar-nav .nav-link.disabled {\n  color: rgba(255, 255, 255, 0.25);\n}\n\n.navbar-dark .navbar-nav .show > .nav-link,\n.navbar-dark .navbar-nav .active > .nav-link,\n.navbar-dark .navbar-nav .nav-link.show,\n.navbar-dark .navbar-nav .nav-link.active {\n  color: rgba(255, 255, 255, 0.65);\n}\n\n.navbar {\n  position: relative;\n  display: -webkit-box;\n  display: flex;\n  padding: 0.5rem 0.5rem;\n  flex-wrap: wrap;\n  -webkit-box-align: center;\n          align-items: center;\n  -webkit-box-pack: justify;\n          justify-content: space-between;\n}\n\n.fixed-top {\n  position: fixed;\n  z-index: 1030;\n  top: 0;\n  right: 0;\n  left: 0;\n}\n\n.square {\n  width: 100px;\n  height: 100px;\n}\n\n.auto {\n  cursor: auto;\n}\n\n.default {\n  cursor: default;\n}\n\n.none {\n  cursor: none;\n}\n\n.context-menu {\n  cursor: context-menu;\n}\n\n.help {\n  cursor: help;\n}\n\n.pointer {\n  cursor: pointer;\n}\n\n.progress {\n  cursor: progress;\n}\n\n.wait {\n  cursor: wait;\n}\n\n.cell {\n  cursor: cell;\n}\n\n.crosshair {\n  cursor: crosshair;\n}\n\n.text {\n  cursor: text;\n}\n\n.vertical-text {\n  cursor: vertical-text;\n}\n\n.alias {\n  cursor: alias;\n}\n\n.copy {\n  cursor: copy;\n}\n\n.move {\n  cursor: move;\n}\n\n.no-drop {\n  cursor: no-drop;\n}\n\n.not-allowed {\n  cursor: not-allowed;\n}\n\n.all-scroll {\n  cursor: all-scroll;\n}\n\n.col-resize {\n  cursor: col-resize;\n}\n\n.row-resize {\n  cursor: row-resize;\n}\n\n.n-resize {\n  cursor: n-resize;\n}\n\n.e-resize {\n  cursor: e-resize;\n}\n\n.s-resize {\n  cursor: s-resize;\n}\n\n.w-resize {\n  cursor: w-resize;\n}\n\n.ns-resize {\n  cursor: ns-resize;\n}\n\n.ew-resize {\n  cursor: ew-resize;\n}\n\n.ne-resize {\n  cursor: ne-resize;\n}\n\n.nw-resize {\n  cursor: nw-resize;\n}\n\n.se-resize {\n  cursor: se-resize;\n}\n\n.sw-resize {\n  cursor: sw-resize;\n}\n\n.nesw-resize {\n  cursor: nesw-resize;\n}\n\n.nwse-resize {\n  cursor: nwse-resize;\n}\n\n.bcard:hover {\n  background-color: #6bcffd;\n  box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);\n}\n\n.rcard:hover {\n  background-color: #fd6b6b;\n  box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);\n}\n\n.gcard:hover {\n  background-color: #7cfd6b;\n  box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);\n}\n\n.scroll {\n  max-height: 500px;\n  overflow-y: scroll;\n}\n\n/* Hide scrollbar for Chrome, Safari and Opera */\n\n.scroll::-webkit-scrollbar {\n  display: none;\n}\n\n/* Hide scrollbar for IE, Edge and Firefox */\n\n.scroll {\n  -ms-overflow-style: none;\n  /* IE and Edge */\n  scrollbar-width: none;\n  /* Firefox */\n}\n\n.card-header {\n  margin-top: 0;\n  padding: 1.25rem 1.5rem;\n  border-bottom: 1px solid rgba(255, 255, 255, 0);\n  background-color: #fff0;\n}\n\n.card {\n  border-radius: 0.75;\n}\n\n.card-body {\n  font-size: 90%;\n}\n\n.card-footer {\n  padding: 1.25rem 1.5rem;\n  height: 60px;\n  border-top: 0px solid rgba(255, 255, 255, 0);\n  background-color: #fff0;\n}\n\n.navbar {\n  display: -webkit-box;\n  display: flex;\n  padding: 0;\n  flex-wrap: wrap;\n  -webkit-box-align: center;\n          align-items: center;\n  -webkit-box-pack: justify;\n          justify-content: space-between;\n}\n\n.navbar-dark .navbar-toggler-icon {\n  background-image: url(\"data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(0, 0, 0, 0.5)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E\");\n}\n\n.footer {\n  left: 0;\n  right: 0;\n  bottom: 0;\n  padding: 1rem;\n}\n\n.text-bold {\n  font-weight: 600;\n}\n\n.bgg {\n  background-image: url('mygeo-background.jpg');\n  height: 100%;\n  background-position: center;\n  background-repeat: no-repeat;\n  background-size: cover;\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIi9BcHBsaWNhdGlvbnMvTUFNUC9odGRvY3MvYWZpcWZlL3dlYi9zcmMvYXBwL2xheW91dHMvYXV0aC1sYXlvdXQvYXV0aC1sYXlvdXQuY29tcG9uZW50LnNjc3MiLCJzcmMvYXBwL2xheW91dHMvYXV0aC1sYXlvdXQvYXV0aC1sYXlvdXQuY29tcG9uZW50LnNjc3MiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBRUE7RUFFSSxxQkFBQTtFQUVBLFlBQUE7RUFDQSw2QkFBQTtFQUVBLHFDQUFBO0FDSko7O0FETUE7RUFFSSxxQkFBQTtFQUVBLGNBQUE7QUNMSjs7QURRQTtFQUVJLHFCQUFBO0VBRUEsY0FBQTtBQ1BKOztBRFNBOztFQUdJLHFCQUFBO0VBRUEsY0FBQTtBQ1JKOztBRFVBO0VBRUksVUFBQTtBQ1JKOztBRFdBO0VBRUksMEJBQUE7QUNUSjs7QURXQTs7RUFHSSw2QkFBQTtBQ1RKOztBRFdBO0VBRUksZ0NBQUE7QUNUSjs7QURZQTs7OztFQUtJLGdDQUFBO0FDVko7O0FEYUE7RUFFSSxrQkFBQTtFQUVBLG9CQUFBO0VBQUEsYUFBQTtFQUVBLHNCQUFBO0VBRUEsZUFBQTtFQUNBLHlCQUFBO1VBQUEsbUJBQUE7RUFDQSx5QkFBQTtVQUFBLDhCQUFBO0FDZEo7O0FEaUJBO0VBRUksZUFBQTtFQUNBLGFBQUE7RUFDQSxNQUFBO0VBQ0EsUUFBQTtFQUNBLE9BQUE7QUNmSjs7QURrQkE7RUFFSSxZQUFBO0VBQ0EsYUFBQTtBQ2hCSjs7QURtQkE7RUFBaUIsWUFBQTtBQ2ZqQjs7QURnQkE7RUFBaUIsZUFBQTtBQ1pqQjs7QURhQTtFQUFpQixZQUFBO0FDVGpCOztBRFVBO0VBQWlCLG9CQUFBO0FDTmpCOztBRE9BO0VBQWlCLFlBQUE7QUNIakI7O0FESUE7RUFBaUIsZUFBQTtBQ0FqQjs7QURDQTtFQUFpQixnQkFBQTtBQ0dqQjs7QURGQTtFQUFpQixZQUFBO0FDTWpCOztBRExBO0VBQWlCLFlBQUE7QUNTakI7O0FEUkE7RUFBaUIsaUJBQUE7QUNZakI7O0FEWEE7RUFBaUIsWUFBQTtBQ2VqQjs7QURkQTtFQUFpQixxQkFBQTtBQ2tCakI7O0FEakJBO0VBQWlCLGFBQUE7QUNxQmpCOztBRHBCQTtFQUFpQixZQUFBO0FDd0JqQjs7QUR2QkE7RUFBaUIsWUFBQTtBQzJCakI7O0FEMUJBO0VBQWlCLGVBQUE7QUM4QmpCOztBRDdCQTtFQUFpQixtQkFBQTtBQ2lDakI7O0FEaENBO0VBQWlCLGtCQUFBO0FDb0NqQjs7QURuQ0E7RUFBaUIsa0JBQUE7QUN1Q2pCOztBRHRDQTtFQUFpQixrQkFBQTtBQzBDakI7O0FEekNBO0VBQWlCLGdCQUFBO0FDNkNqQjs7QUQ1Q0E7RUFBaUIsZ0JBQUE7QUNnRGpCOztBRC9DQTtFQUFpQixnQkFBQTtBQ21EakI7O0FEbERBO0VBQWlCLGdCQUFBO0FDc0RqQjs7QURyREE7RUFBaUIsaUJBQUE7QUN5RGpCOztBRHhEQTtFQUFpQixpQkFBQTtBQzREakI7O0FEM0RBO0VBQWlCLGlCQUFBO0FDK0RqQjs7QUQ5REE7RUFBaUIsaUJBQUE7QUNrRWpCOztBRGpFQTtFQUFpQixpQkFBQTtBQ3FFakI7O0FEcEVBO0VBQWlCLGlCQUFBO0FDd0VqQjs7QUR2RUE7RUFBaUIsbUJBQUE7QUMyRWpCOztBRDFFQTtFQUFpQixtQkFBQTtBQzhFakI7O0FENUVBO0VBQ0kseUJBQUE7RUFDQSwyQ0FBQTtBQytFSjs7QUQ1RUU7RUFDRSx5QkFBQTtFQUNBLDJDQUFBO0FDK0VKOztBRDVFRTtFQUNFLHlCQUFBO0VBQ0EsMkNBQUE7QUMrRUo7O0FENUVFO0VBQ0UsaUJBQUE7RUFDQSxrQkFBQTtBQytFSjs7QUQ1RUEsZ0RBQUE7O0FBQ0E7RUFDSSxhQUFBO0FDK0VKOztBRDVFRSw0Q0FBQTs7QUFDQTtFQUNFLHdCQUFBO0VBQTJCLGdCQUFBO0VBQzNCLHFCQUFBO0VBQXdCLFlBQUE7QUNpRjVCOztBRC9FRTtFQUVFLGFBQUE7RUFDQSx1QkFBQTtFQUVBLCtDQUFBO0VBQ0EsdUJBQUE7QUNnRko7O0FEN0VBO0VBQ0ksbUJBQUE7QUNnRko7O0FENUVBO0VBQ0ksY0FBQTtBQytFSjs7QUQ1RUE7RUFFSSx1QkFBQTtFQUNBLFlBQUE7RUFDQSw0Q0FBQTtFQUNBLHVCQUFBO0FDOEVKOztBRDNFQTtFQUdJLG9CQUFBO0VBQUEsYUFBQTtFQUVBLFVBQUE7RUFFQSxlQUFBO0VBQ0EseUJBQUE7VUFBQSxtQkFBQTtFQUNBLHlCQUFBO1VBQUEsOEJBQUE7QUMwRUo7O0FEdkVBO0VBRUkscVFBQ0E7QUN3RUo7O0FEcEVBO0VBRUksT0FBQTtFQUFVLFFBQUE7RUFBVSxTQUFBO0VBQ3BCLGFBQUE7QUN3RUo7O0FEckVBO0VBQ0ksZ0JBQUE7QUN3RUo7O0FEckVBO0VBQ0ksNkNBQUE7RUFDQSxZQUFBO0VBQ0EsMkJBQUE7RUFDQSw0QkFBQTtFQUNBLHNCQUFBO0FDd0VKIiwiZmlsZSI6InNyYy9hcHAvbGF5b3V0cy9hdXRoLWxheW91dC9hdXRoLWxheW91dC5jb21wb25lbnQuc2NzcyIsInNvdXJjZXNDb250ZW50IjpbIlxuXG5hXG57XG4gICAgdGV4dC1kZWNvcmF0aW9uOiBub25lO1xuXG4gICAgY29sb3I6IGJsYWNrO1xuICAgIGJhY2tncm91bmQtY29sb3I6IHRyYW5zcGFyZW50O1xuXG4gICAgLXdlYmtpdC10ZXh0LWRlY29yYXRpb24tc2tpcDogb2JqZWN0cztcbn1cbmE6aG92ZXJcbntcbiAgICB0ZXh0LWRlY29yYXRpb246IG5vbmU7IFxuXG4gICAgY29sb3I6cmdiKDczLCA3MywgNzMpO1xufVxuXG5hOm5vdChbaHJlZl0pOm5vdChbdGFiaW5kZXhdKVxue1xuICAgIHRleHQtZGVjb3JhdGlvbjogbm9uZTsgXG5cbiAgICBjb2xvcjogaW5oZXJpdDtcbn1cbmE6bm90KFtocmVmXSk6bm90KFt0YWJpbmRleF0pOmhvdmVyLFxuYTpub3QoW2hyZWZdKTpub3QoW3RhYmluZGV4XSk6Zm9jdXNcbntcbiAgICB0ZXh0LWRlY29yYXRpb246IG5vbmU7IFxuXG4gICAgY29sb3I6IGluaGVyaXQ7XG59XG5hOm5vdChbaHJlZl0pOm5vdChbdGFiaW5kZXhdKTpmb2N1c1xue1xuICAgIG91dGxpbmU6IDA7XG59XG5cbi5uYXZiYXItZGFyayAubmF2YmFyLW5hdiAubmF2LWxpbmtcbntcbiAgICBjb2xvcjogcmdiYSgwLCAwLCAwLCAwLjk1KTtcbn1cbi5uYXZiYXItZGFyayAubmF2YmFyLW5hdiAubmF2LWxpbms6aG92ZXIsXG4ubmF2YmFyLWRhcmsgLm5hdmJhci1uYXYgLm5hdi1saW5rOmZvY3VzXG57XG4gICAgY29sb3I6IHJnYmEoNjUsIDY1LCA2NSwgMC42NSk7XG59XG4ubmF2YmFyLWRhcmsgLm5hdmJhci1uYXYgLm5hdi1saW5rLmRpc2FibGVkXG57XG4gICAgY29sb3I6IHJnYmEoMjU1LCAyNTUsIDI1NSwgLjI1KTtcbn1cblxuLm5hdmJhci1kYXJrIC5uYXZiYXItbmF2IC5zaG93ID4gLm5hdi1saW5rLFxuLm5hdmJhci1kYXJrIC5uYXZiYXItbmF2IC5hY3RpdmUgPiAubmF2LWxpbmssXG4ubmF2YmFyLWRhcmsgLm5hdmJhci1uYXYgLm5hdi1saW5rLnNob3csXG4ubmF2YmFyLWRhcmsgLm5hdmJhci1uYXYgLm5hdi1saW5rLmFjdGl2ZVxue1xuICAgIGNvbG9yOiByZ2JhKDI1NSwgMjU1LCAyNTUsIC42NSk7XG59XG5cbi5uYXZiYXJcbntcbiAgICBwb3NpdGlvbjogcmVsYXRpdmU7XG5cbiAgICBkaXNwbGF5OiBmbGV4O1xuXG4gICAgcGFkZGluZzogLjVyZW0gLjVyZW07IFxuXG4gICAgZmxleC13cmFwOiB3cmFwO1xuICAgIGFsaWduLWl0ZW1zOiBjZW50ZXI7XG4gICAganVzdGlmeS1jb250ZW50OiBzcGFjZS1iZXR3ZWVuO1xufVxuXG4uZml4ZWQtdG9wXG57XG4gICAgcG9zaXRpb246IGZpeGVkO1xuICAgIHotaW5kZXg6IDEwMzA7IFxuICAgIHRvcDogMDtcbiAgICByaWdodDogMDtcbiAgICBsZWZ0OiAwO1xufVxuXG4uc3F1YXJlXG57XG4gICAgd2lkdGg6IDEwMHB4O1xuICAgIGhlaWdodDogMTAwcHg7XG59XG5cbi5hdXRvICAgICAgICAgIHsgY3Vyc29yOiBhdXRvOyB9XG4uZGVmYXVsdCAgICAgICB7IGN1cnNvcjogZGVmYXVsdDsgfVxuLm5vbmUgICAgICAgICAgeyBjdXJzb3I6IG5vbmU7IH1cbi5jb250ZXh0LW1lbnUgIHsgY3Vyc29yOiBjb250ZXh0LW1lbnU7IH1cbi5oZWxwICAgICAgICAgIHsgY3Vyc29yOiBoZWxwOyB9XG4ucG9pbnRlciAgICAgICB7IGN1cnNvcjogcG9pbnRlcjsgfVxuLnByb2dyZXNzICAgICAgeyBjdXJzb3I6IHByb2dyZXNzOyB9XG4ud2FpdCAgICAgICAgICB7IGN1cnNvcjogd2FpdDsgfVxuLmNlbGwgICAgICAgICAgeyBjdXJzb3I6IGNlbGw7IH1cbi5jcm9zc2hhaXIgICAgIHsgY3Vyc29yOiBjcm9zc2hhaXI7IH1cbi50ZXh0ICAgICAgICAgIHsgY3Vyc29yOiB0ZXh0OyB9XG4udmVydGljYWwtdGV4dCB7IGN1cnNvcjogdmVydGljYWwtdGV4dDsgfVxuLmFsaWFzICAgICAgICAgeyBjdXJzb3I6IGFsaWFzOyB9XG4uY29weSAgICAgICAgICB7IGN1cnNvcjogY29weTsgfVxuLm1vdmUgICAgICAgICAgeyBjdXJzb3I6IG1vdmU7IH1cbi5uby1kcm9wICAgICAgIHsgY3Vyc29yOiBuby1kcm9wOyB9XG4ubm90LWFsbG93ZWQgICB7IGN1cnNvcjogbm90LWFsbG93ZWQ7IH1cbi5hbGwtc2Nyb2xsICAgIHsgY3Vyc29yOiBhbGwtc2Nyb2xsOyB9XG4uY29sLXJlc2l6ZSAgICB7IGN1cnNvcjogY29sLXJlc2l6ZTsgfVxuLnJvdy1yZXNpemUgICAgeyBjdXJzb3I6IHJvdy1yZXNpemU7IH1cbi5uLXJlc2l6ZSAgICAgIHsgY3Vyc29yOiBuLXJlc2l6ZTsgfVxuLmUtcmVzaXplICAgICAgeyBjdXJzb3I6IGUtcmVzaXplOyB9XG4ucy1yZXNpemUgICAgICB7IGN1cnNvcjogcy1yZXNpemU7IH1cbi53LXJlc2l6ZSAgICAgIHsgY3Vyc29yOiB3LXJlc2l6ZTsgfVxuLm5zLXJlc2l6ZSAgICAgeyBjdXJzb3I6IG5zLXJlc2l6ZTsgfVxuLmV3LXJlc2l6ZSAgICAgeyBjdXJzb3I6IGV3LXJlc2l6ZTsgfVxuLm5lLXJlc2l6ZSAgICAgeyBjdXJzb3I6IG5lLXJlc2l6ZTsgfVxuLm53LXJlc2l6ZSAgICAgeyBjdXJzb3I6IG53LXJlc2l6ZTsgfVxuLnNlLXJlc2l6ZSAgICAgeyBjdXJzb3I6IHNlLXJlc2l6ZTsgfVxuLnN3LXJlc2l6ZSAgICAgeyBjdXJzb3I6IHN3LXJlc2l6ZTsgfVxuLm5lc3ctcmVzaXplICAgeyBjdXJzb3I6IG5lc3ctcmVzaXplOyB9XG4ubndzZS1yZXNpemUgICB7IGN1cnNvcjogbndzZS1yZXNpemU7IH1cblxuLmJjYXJkOmhvdmVyIHtcbiAgICBiYWNrZ3JvdW5kLWNvbG9yOiAjNmJjZmZkO1xuICAgIGJveC1zaGFkb3c6IDAgOHB4IDE2cHggMCByZ2JhKDAsIDAsIDAsIDAuMik7XG4gIH1cblxuICAucmNhcmQ6aG92ZXIge1xuICAgIGJhY2tncm91bmQtY29sb3I6ICNmZDZiNmI7XG4gICAgYm94LXNoYWRvdzogMCA4cHggMTZweCAwIHJnYmEoMCwgMCwgMCwgMC4yKTtcbiAgfVxuXG4gIC5nY2FyZDpob3ZlciB7XG4gICAgYmFja2dyb3VuZC1jb2xvcjogIzdjZmQ2YjtcbiAgICBib3gtc2hhZG93OiAwIDhweCAxNnB4IDAgcmdiYSgwLCAwLCAwLCAwLjIpO1xuICB9XG5cbiAgLnNjcm9sbCB7XG4gICAgbWF4LWhlaWdodDogNTAwcHg7XG4gICAgb3ZlcmZsb3cteTogc2Nyb2xsO1xufVxuXG4vKiBIaWRlIHNjcm9sbGJhciBmb3IgQ2hyb21lLCBTYWZhcmkgYW5kIE9wZXJhICovXG4uc2Nyb2xsOjotd2Via2l0LXNjcm9sbGJhciB7XG4gICAgZGlzcGxheTogbm9uZTtcbiAgfVxuICBcbiAgLyogSGlkZSBzY3JvbGxiYXIgZm9yIElFLCBFZGdlIGFuZCBGaXJlZm94ICovXG4gIC5zY3JvbGwge1xuICAgIC1tcy1vdmVyZmxvdy1zdHlsZTogbm9uZTsgIC8qIElFIGFuZCBFZGdlICovXG4gICAgc2Nyb2xsYmFyLXdpZHRoOiBub25lOyAgLyogRmlyZWZveCAqL1xuICB9XG4gIC5jYXJkLWhlYWRlclxue1xuICAgIG1hcmdpbi10b3A6IDA7XG4gICAgcGFkZGluZzogMS4yNXJlbSAxLjVyZW07XG4gICAgXG4gICAgYm9yZGVyLWJvdHRvbTogMXB4IHNvbGlkIHJnYmEoMjU1LCAyNTUsIDI1NSwgMCk7IFxuICAgIGJhY2tncm91bmQtY29sb3I6ICNmZmYwO1xufVxuXG4uY2FyZCB7XG4gICAgYm9yZGVyLXJhZGl1czogMC43NTtcbiAgICBcbn1cblxuLmNhcmQtYm9keSB7XG4gICAgZm9udC1zaXplOiA5MCU7XG59XG5cbi5jYXJkLWZvb3Rlclxue1xuICAgIHBhZGRpbmc6IDEuMjVyZW0gMS41cmVtO1xuICAgIGhlaWdodDogNjBweDtcbiAgICBib3JkZXItdG9wOiAwcHggc29saWQgcmdiYSgyNTUsIDI1NSwgMjU1LCAwKTsgXG4gICAgYmFja2dyb3VuZC1jb2xvcjogI2ZmZjA7XG59XG5cbi5uYXZiYXJcbntcbiAgICBcbiAgICBkaXNwbGF5OiBmbGV4O1xuXG4gICAgcGFkZGluZzogMDsgXG5cbiAgICBmbGV4LXdyYXA6IHdyYXA7XG4gICAgYWxpZ24taXRlbXM6IGNlbnRlcjtcbiAgICBqdXN0aWZ5LWNvbnRlbnQ6IHNwYWNlLWJldHdlZW47XG59XG5cbi5uYXZiYXItZGFyayAubmF2YmFyLXRvZ2dsZXItaWNvblxue1xuICAgIGJhY2tncm91bmQtaW1hZ2U6IFxuICAgIHVybChcImRhdGE6aW1hZ2Uvc3ZnK3htbDtjaGFyc2V0PXV0ZjgsJTNDc3ZnIHZpZXdCb3g9JzAgMCAzMCAzMCcgeG1sbnM9J2h0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnJyUzRSUzQ3BhdGggc3Ryb2tlPSdyZ2JhKDAsIDAsIDAsIDAuNSknIHN0cm9rZS13aWR0aD0nMicgc3Ryb2tlLWxpbmVjYXA9J3JvdW5kJyBzdHJva2UtbWl0ZXJsaW1pdD0nMTAnIGQ9J000IDdoMjJNNCAxNWgyMk00IDIzaDIyJy8lM0UlM0Mvc3ZnJTNFXCIpXG59XG5cblxuLmZvb3RlciB7IFxuICAgIFxuICAgIGxlZnQ6IDAgOyByaWdodDogMDsgYm90dG9tOiAwOyBcbiAgICBwYWRkaW5nOiAxcmVtO1xufVxuXG4udGV4dC1ib2xkIHsgXG4gICAgZm9udC13ZWlnaHQ6IDYwMDtcbn1cblxuLmJnZyB7XG4gICAgYmFja2dyb3VuZC1pbWFnZTogdXJsKCdzcmMvYXNzZXRzL2ltZy90aGVtZS9teWdlby1iYWNrZ3JvdW5kLmpwZycpO1xuICAgIGhlaWdodDogMTAwJTtcbiAgICBiYWNrZ3JvdW5kLXBvc2l0aW9uOiBjZW50ZXI7XG4gICAgYmFja2dyb3VuZC1yZXBlYXQ6IG5vLXJlcGVhdDtcbiAgICBiYWNrZ3JvdW5kLXNpemU6IGNvdmVyO1xufSIsImEge1xuICB0ZXh0LWRlY29yYXRpb246IG5vbmU7XG4gIGNvbG9yOiBibGFjaztcbiAgYmFja2dyb3VuZC1jb2xvcjogdHJhbnNwYXJlbnQ7XG4gIC13ZWJraXQtdGV4dC1kZWNvcmF0aW9uLXNraXA6IG9iamVjdHM7XG59XG5cbmE6aG92ZXIge1xuICB0ZXh0LWRlY29yYXRpb246IG5vbmU7XG4gIGNvbG9yOiAjNDk0OTQ5O1xufVxuXG5hOm5vdChbaHJlZl0pOm5vdChbdGFiaW5kZXhdKSB7XG4gIHRleHQtZGVjb3JhdGlvbjogbm9uZTtcbiAgY29sb3I6IGluaGVyaXQ7XG59XG5cbmE6bm90KFtocmVmXSk6bm90KFt0YWJpbmRleF0pOmhvdmVyLFxuYTpub3QoW2hyZWZdKTpub3QoW3RhYmluZGV4XSk6Zm9jdXMge1xuICB0ZXh0LWRlY29yYXRpb246IG5vbmU7XG4gIGNvbG9yOiBpbmhlcml0O1xufVxuXG5hOm5vdChbaHJlZl0pOm5vdChbdGFiaW5kZXhdKTpmb2N1cyB7XG4gIG91dGxpbmU6IDA7XG59XG5cbi5uYXZiYXItZGFyayAubmF2YmFyLW5hdiAubmF2LWxpbmsge1xuICBjb2xvcjogcmdiYSgwLCAwLCAwLCAwLjk1KTtcbn1cblxuLm5hdmJhci1kYXJrIC5uYXZiYXItbmF2IC5uYXYtbGluazpob3Zlcixcbi5uYXZiYXItZGFyayAubmF2YmFyLW5hdiAubmF2LWxpbms6Zm9jdXMge1xuICBjb2xvcjogcmdiYSg2NSwgNjUsIDY1LCAwLjY1KTtcbn1cblxuLm5hdmJhci1kYXJrIC5uYXZiYXItbmF2IC5uYXYtbGluay5kaXNhYmxlZCB7XG4gIGNvbG9yOiByZ2JhKDI1NSwgMjU1LCAyNTUsIDAuMjUpO1xufVxuXG4ubmF2YmFyLWRhcmsgLm5hdmJhci1uYXYgLnNob3cgPiAubmF2LWxpbmssXG4ubmF2YmFyLWRhcmsgLm5hdmJhci1uYXYgLmFjdGl2ZSA+IC5uYXYtbGluayxcbi5uYXZiYXItZGFyayAubmF2YmFyLW5hdiAubmF2LWxpbmsuc2hvdyxcbi5uYXZiYXItZGFyayAubmF2YmFyLW5hdiAubmF2LWxpbmsuYWN0aXZlIHtcbiAgY29sb3I6IHJnYmEoMjU1LCAyNTUsIDI1NSwgMC42NSk7XG59XG5cbi5uYXZiYXIge1xuICBwb3NpdGlvbjogcmVsYXRpdmU7XG4gIGRpc3BsYXk6IGZsZXg7XG4gIHBhZGRpbmc6IDAuNXJlbSAwLjVyZW07XG4gIGZsZXgtd3JhcDogd3JhcDtcbiAgYWxpZ24taXRlbXM6IGNlbnRlcjtcbiAganVzdGlmeS1jb250ZW50OiBzcGFjZS1iZXR3ZWVuO1xufVxuXG4uZml4ZWQtdG9wIHtcbiAgcG9zaXRpb246IGZpeGVkO1xuICB6LWluZGV4OiAxMDMwO1xuICB0b3A6IDA7XG4gIHJpZ2h0OiAwO1xuICBsZWZ0OiAwO1xufVxuXG4uc3F1YXJlIHtcbiAgd2lkdGg6IDEwMHB4O1xuICBoZWlnaHQ6IDEwMHB4O1xufVxuXG4uYXV0byB7XG4gIGN1cnNvcjogYXV0bztcbn1cblxuLmRlZmF1bHQge1xuICBjdXJzb3I6IGRlZmF1bHQ7XG59XG5cbi5ub25lIHtcbiAgY3Vyc29yOiBub25lO1xufVxuXG4uY29udGV4dC1tZW51IHtcbiAgY3Vyc29yOiBjb250ZXh0LW1lbnU7XG59XG5cbi5oZWxwIHtcbiAgY3Vyc29yOiBoZWxwO1xufVxuXG4ucG9pbnRlciB7XG4gIGN1cnNvcjogcG9pbnRlcjtcbn1cblxuLnByb2dyZXNzIHtcbiAgY3Vyc29yOiBwcm9ncmVzcztcbn1cblxuLndhaXQge1xuICBjdXJzb3I6IHdhaXQ7XG59XG5cbi5jZWxsIHtcbiAgY3Vyc29yOiBjZWxsO1xufVxuXG4uY3Jvc3NoYWlyIHtcbiAgY3Vyc29yOiBjcm9zc2hhaXI7XG59XG5cbi50ZXh0IHtcbiAgY3Vyc29yOiB0ZXh0O1xufVxuXG4udmVydGljYWwtdGV4dCB7XG4gIGN1cnNvcjogdmVydGljYWwtdGV4dDtcbn1cblxuLmFsaWFzIHtcbiAgY3Vyc29yOiBhbGlhcztcbn1cblxuLmNvcHkge1xuICBjdXJzb3I6IGNvcHk7XG59XG5cbi5tb3ZlIHtcbiAgY3Vyc29yOiBtb3ZlO1xufVxuXG4ubm8tZHJvcCB7XG4gIGN1cnNvcjogbm8tZHJvcDtcbn1cblxuLm5vdC1hbGxvd2VkIHtcbiAgY3Vyc29yOiBub3QtYWxsb3dlZDtcbn1cblxuLmFsbC1zY3JvbGwge1xuICBjdXJzb3I6IGFsbC1zY3JvbGw7XG59XG5cbi5jb2wtcmVzaXplIHtcbiAgY3Vyc29yOiBjb2wtcmVzaXplO1xufVxuXG4ucm93LXJlc2l6ZSB7XG4gIGN1cnNvcjogcm93LXJlc2l6ZTtcbn1cblxuLm4tcmVzaXplIHtcbiAgY3Vyc29yOiBuLXJlc2l6ZTtcbn1cblxuLmUtcmVzaXplIHtcbiAgY3Vyc29yOiBlLXJlc2l6ZTtcbn1cblxuLnMtcmVzaXplIHtcbiAgY3Vyc29yOiBzLXJlc2l6ZTtcbn1cblxuLnctcmVzaXplIHtcbiAgY3Vyc29yOiB3LXJlc2l6ZTtcbn1cblxuLm5zLXJlc2l6ZSB7XG4gIGN1cnNvcjogbnMtcmVzaXplO1xufVxuXG4uZXctcmVzaXplIHtcbiAgY3Vyc29yOiBldy1yZXNpemU7XG59XG5cbi5uZS1yZXNpemUge1xuICBjdXJzb3I6IG5lLXJlc2l6ZTtcbn1cblxuLm53LXJlc2l6ZSB7XG4gIGN1cnNvcjogbnctcmVzaXplO1xufVxuXG4uc2UtcmVzaXplIHtcbiAgY3Vyc29yOiBzZS1yZXNpemU7XG59XG5cbi5zdy1yZXNpemUge1xuICBjdXJzb3I6IHN3LXJlc2l6ZTtcbn1cblxuLm5lc3ctcmVzaXplIHtcbiAgY3Vyc29yOiBuZXN3LXJlc2l6ZTtcbn1cblxuLm53c2UtcmVzaXplIHtcbiAgY3Vyc29yOiBud3NlLXJlc2l6ZTtcbn1cblxuLmJjYXJkOmhvdmVyIHtcbiAgYmFja2dyb3VuZC1jb2xvcjogIzZiY2ZmZDtcbiAgYm94LXNoYWRvdzogMCA4cHggMTZweCAwIHJnYmEoMCwgMCwgMCwgMC4yKTtcbn1cblxuLnJjYXJkOmhvdmVyIHtcbiAgYmFja2dyb3VuZC1jb2xvcjogI2ZkNmI2YjtcbiAgYm94LXNoYWRvdzogMCA4cHggMTZweCAwIHJnYmEoMCwgMCwgMCwgMC4yKTtcbn1cblxuLmdjYXJkOmhvdmVyIHtcbiAgYmFja2dyb3VuZC1jb2xvcjogIzdjZmQ2YjtcbiAgYm94LXNoYWRvdzogMCA4cHggMTZweCAwIHJnYmEoMCwgMCwgMCwgMC4yKTtcbn1cblxuLnNjcm9sbCB7XG4gIG1heC1oZWlnaHQ6IDUwMHB4O1xuICBvdmVyZmxvdy15OiBzY3JvbGw7XG59XG5cbi8qIEhpZGUgc2Nyb2xsYmFyIGZvciBDaHJvbWUsIFNhZmFyaSBhbmQgT3BlcmEgKi9cbi5zY3JvbGw6Oi13ZWJraXQtc2Nyb2xsYmFyIHtcbiAgZGlzcGxheTogbm9uZTtcbn1cblxuLyogSGlkZSBzY3JvbGxiYXIgZm9yIElFLCBFZGdlIGFuZCBGaXJlZm94ICovXG4uc2Nyb2xsIHtcbiAgLW1zLW92ZXJmbG93LXN0eWxlOiBub25lO1xuICAvKiBJRSBhbmQgRWRnZSAqL1xuICBzY3JvbGxiYXItd2lkdGg6IG5vbmU7XG4gIC8qIEZpcmVmb3ggKi9cbn1cblxuLmNhcmQtaGVhZGVyIHtcbiAgbWFyZ2luLXRvcDogMDtcbiAgcGFkZGluZzogMS4yNXJlbSAxLjVyZW07XG4gIGJvcmRlci1ib3R0b206IDFweCBzb2xpZCByZ2JhKDI1NSwgMjU1LCAyNTUsIDApO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZmMDtcbn1cblxuLmNhcmQge1xuICBib3JkZXItcmFkaXVzOiAwLjc1O1xufVxuXG4uY2FyZC1ib2R5IHtcbiAgZm9udC1zaXplOiA5MCU7XG59XG5cbi5jYXJkLWZvb3RlciB7XG4gIHBhZGRpbmc6IDEuMjVyZW0gMS41cmVtO1xuICBoZWlnaHQ6IDYwcHg7XG4gIGJvcmRlci10b3A6IDBweCBzb2xpZCByZ2JhKDI1NSwgMjU1LCAyNTUsIDApO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZmMDtcbn1cblxuLm5hdmJhciB7XG4gIGRpc3BsYXk6IGZsZXg7XG4gIHBhZGRpbmc6IDA7XG4gIGZsZXgtd3JhcDogd3JhcDtcbiAgYWxpZ24taXRlbXM6IGNlbnRlcjtcbiAganVzdGlmeS1jb250ZW50OiBzcGFjZS1iZXR3ZWVuO1xufVxuXG4ubmF2YmFyLWRhcmsgLm5hdmJhci10b2dnbGVyLWljb24ge1xuICBiYWNrZ3JvdW5kLWltYWdlOiB1cmwoXCJkYXRhOmltYWdlL3N2Zyt4bWw7Y2hhcnNldD11dGY4LCUzQ3N2ZyB2aWV3Qm94PScwIDAgMzAgMzAnIHhtbG5zPSdodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyclM0UlM0NwYXRoIHN0cm9rZT0ncmdiYSgwLCAwLCAwLCAwLjUpJyBzdHJva2Utd2lkdGg9JzInIHN0cm9rZS1saW5lY2FwPSdyb3VuZCcgc3Ryb2tlLW1pdGVybGltaXQ9JzEwJyBkPSdNNCA3aDIyTTQgMTVoMjJNNCAyM2gyMicvJTNFJTNDL3N2ZyUzRVwiKTtcbn1cblxuLmZvb3RlciB7XG4gIGxlZnQ6IDA7XG4gIHJpZ2h0OiAwO1xuICBib3R0b206IDA7XG4gIHBhZGRpbmc6IDFyZW07XG59XG5cbi50ZXh0LWJvbGQge1xuICBmb250LXdlaWdodDogNjAwO1xufVxuXG4uYmdnIHtcbiAgYmFja2dyb3VuZC1pbWFnZTogdXJsKFwic3JjL2Fzc2V0cy9pbWcvdGhlbWUvbXlnZW8tYmFja2dyb3VuZC5qcGdcIik7XG4gIGhlaWdodDogMTAwJTtcbiAgYmFja2dyb3VuZC1wb3NpdGlvbjogY2VudGVyO1xuICBiYWNrZ3JvdW5kLXJlcGVhdDogbm8tcmVwZWF0O1xuICBiYWNrZ3JvdW5kLXNpemU6IGNvdmVyO1xufSJdfQ== */");

/***/ }),

/***/ "./src/app/layouts/auth-layout/auth-layout.component.ts":
/*!**************************************************************!*\
  !*** ./src/app/layouts/auth-layout/auth-layout.component.ts ***!
  \**************************************************************/
/*! exports provided: AuthLayoutComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "AuthLayoutComponent", function() { return AuthLayoutComponent; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm5/core.js");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/__ivy_ngcc__/fesm5/router.js");



var AuthLayoutComponent = /** @class */ (function () {
    function AuthLayoutComponent(router) {
        this.router = router;
        this.test = new Date();
        this.isCollapsed = true;
    }
    AuthLayoutComponent.prototype.ngOnInit = function () {
        var html = document.getElementsByTagName("html")[0];
        // html.classList.add("auth-layout");
        var body = document.getElementsByTagName("body")[0];
        //body.classList.add("");
        // var navbar = document.getElementsByClassName("navbar-horizontal")[0];
        // navbar.classList.add("navbar-light");
        // navbar.classList.add("navbar-transparent");
    };
    AuthLayoutComponent.prototype.ngOnDestroy = function () {
        var html = document.getElementsByTagName("html")[0];
        // html.classList.remove("auth-layout");
        var body = document.getElementsByTagName("body")[0];
        body.classList.remove("bg-default");
        // var navbar = document.getElementsByClassName("navbar-horizontal")[0];
        // navbar.classList.remove("navbar-light");
        // navbar.classList.remove("navbar-transparent");
    };
    AuthLayoutComponent.ctorParameters = function () { return [
        { type: _angular_router__WEBPACK_IMPORTED_MODULE_2__["Router"] }
    ]; };
    AuthLayoutComponent = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"])({
            selector: "app-auth-layout",
            template: Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! raw-loader!./auth-layout.component.html */ "./node_modules/raw-loader/dist/cjs.js!./src/app/layouts/auth-layout/auth-layout.component.html")).default,
            styles: [Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! ./auth-layout.component.scss */ "./src/app/layouts/auth-layout/auth-layout.component.scss")).default]
        }),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"])("design:paramtypes", [_angular_router__WEBPACK_IMPORTED_MODULE_2__["Router"]])
    ], AuthLayoutComponent);
    return AuthLayoutComponent;
}());



/***/ }),

/***/ "./src/app/shared/handler/jwt/jwt.service.ts":
/*!***************************************************!*\
  !*** ./src/app/shared/handler/jwt/jwt.service.ts ***!
  \***************************************************/
/*! exports provided: JwtService */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "JwtService", function() { return JwtService; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm5/core.js");


var JwtService = /** @class */ (function () {
    function JwtService() {
    }
    JwtService.prototype.getToken = function (title) {
        return window.localStorage[title];
    };
    JwtService.prototype.saveToken = function (title, token) {
        window.localStorage[title] = token;
    };
    JwtService.prototype.destroyToken = function () {
        window.localStorage.clear();
    };
    JwtService = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Injectable"])({
            providedIn: 'root'
        }),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"])("design:paramtypes", [])
    ], JwtService);
    return JwtService;
}());



/***/ }),

/***/ "./src/app/shared/handler/notify/notify.service.ts":
/*!*********************************************************!*\
  !*** ./src/app/shared/handler/notify/notify.service.ts ***!
  \*********************************************************/
/*! exports provided: NotifyService */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "NotifyService", function() { return NotifyService; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm5/core.js");
/* harmony import */ var ngx_toastr__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ngx-toastr */ "./node_modules/ngx-toastr/__ivy_ngcc__/fesm5/ngx-toastr.js");



var NotifyService = /** @class */ (function () {
    function NotifyService(toastr) {
        this.toastr = toastr;
    }
    NotifyService.prototype.openToastrConnection = function () {
        var title = 'Error';
        var message = 'No connection';
        this.toastr.info(message, title);
    };
    NotifyService.prototype.openToastrHttp = function (title, message) {
        this.toastr.warning(title, message);
    };
    NotifyService.prototype.openToastrInfo = function (title, message) {
        this.toastr.info(title, message);
    };
    NotifyService.prototype.openToastr = function (title, message) {
        this.toastr.success(title, message);
    };
    NotifyService.ctorParameters = function () { return [
        { type: ngx_toastr__WEBPACK_IMPORTED_MODULE_2__["ToastrService"] }
    ]; };
    NotifyService = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Injectable"])({
            providedIn: 'root'
        }),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"])("design:paramtypes", [ngx_toastr__WEBPACK_IMPORTED_MODULE_2__["ToastrService"]])
    ], NotifyService);
    return NotifyService;
}());



/***/ }),

/***/ "./src/app/shared/menu/menu-items.ts":
/*!*******************************************!*\
  !*** ./src/app/shared/menu/menu-items.ts ***!
  \*******************************************/
/*! exports provided: ROUTESUSER, ROUTESUSER2, ROUTESUSER3, ROUTESADMIN, ROUTESADMIN2, ROUTESADMIN3 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ROUTESUSER", function() { return ROUTESUSER; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ROUTESUSER2", function() { return ROUTESUSER2; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ROUTESUSER3", function() { return ROUTESUSER3; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ROUTESADMIN", function() { return ROUTESADMIN; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ROUTESADMIN2", function() { return ROUTESADMIN2; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ROUTESADMIN3", function() { return ROUTESADMIN3; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");

// Menu Items
var ROUTESUSER = [
    {
        path: '/portal/',
        title: 'Utama',
        type: 'link',
        icontype: 'fas fa-home text-teal'
    },
    {
        path: '/user/profile',
        title: 'Profil',
        type: 'link',
        icontype: 'fas fa-user text-blue'
    },
    {
        path: '/user/metadata',
        title: 'Pengisian Metadata',
        type: 'link',
        icontype: 'fas fa-edit text-pink'
    },
    {
        path: '/user/tabledata',
        title: 'Senarai Metadata',
        type: 'link',
        icontype: 'fas fa-list-ul text-indigo'
    },
];
var ROUTESUSER2 = [
    {
        path: '/portal/',
        title: 'Utama',
        type: 'link',
        icontype: 'fas fa-home text-teal'
    },
    {
        path: '/user/profile',
        title: 'Profil',
        type: 'link',
        icontype: 'fas fa-user text-blue'
    },
    {
        path: '/user/dashboard',
        title: 'Dashboard',
        type: 'link',
        icontype: 'fas fa-desktop text-warning'
    },
    {
        path: '/user/semakan',
        title: 'Semakan Metadata',
        type: 'link',
        icontype: 'fas fa-edit text-pink'
    },
    {
        path: '/user/tabledata',
        title: 'Senarai Metadata',
        type: 'link',
        icontype: 'fas fa-list-ul text-indigo'
    },
];
var ROUTESUSER3 = [
    {
        path: '/portal/',
        title: 'Utama',
        type: 'link',
        icontype: 'fas fa-home text-teal'
    },
    {
        path: '/user/profile',
        title: 'Profil',
        type: 'link',
        icontype: 'fas fa-user text-blue'
    },
    {
        path: '/user/data-app',
        title: 'Mohon Data',
        type: 'link',
        icontype: 'fas fa-pen-alt text-warning'
    },
    {
        path: '/user/checkstatus',
        title: 'Semakan Status',
        type: 'link',
        icontype: 'fas fa-search text-danger'
    },
    {
        path: '/user/download',
        title: 'Muat Turun Data',
        type: 'link',
        icontype: 'fas fa-cloud-download-alt text-purple'
    },
    {
        path: '/user/valuation',
        title: 'Penilaian',
        type: 'link',
        icontype: 'fas fa-edit text-green'
    },
];
var ROUTESADMIN = [
    {
        path: '/portal/',
        title: 'Utama',
        type: 'link',
        icontype: 'fas fa-home text-teal'
    },
    {
        path: '/admin/profile',
        title: 'Profil',
        type: 'link',
        icontype: 'fas fa-user text-blue'
    },
    {
        path: '/admin/dashboard',
        title: 'Dashboard',
        type: 'link',
        icontype: 'fas fa-desktop text-warning'
    },
    {
        path: '/admin/management/user',
        title: 'Pengurusan Pengguna',
        type: 'link',
        icontype: 'fas fa-user-cog text-purple',
    },
    {
        path: '/admin/management/',
        title: 'Pengurusan Metadata',
        type: 'sub',
        icontype: 'fas fa-braille text-indigo',
        collapse: 'management',
        isCollapsed: true,
        children: [
            { path: 'tabledata', title: 'Senarai Metadata', type: 'link' },
            { path: 'update-element', title: 'Kemas Kini Elemen Metadata', type: 'link' }
        ]
    },
    {
        path: '/admin/management',
        title: 'Pengurusan Data Asas',
        type: 'sub',
        icontype: 'fas fa-tasks text-red',
        collapse: 'management',
        isCollapsed: true,
        children: [
            {
                path: 'dataasas', title: 'Kemas Kini Data', type: 'sub', collapse: 'update-data', isCollapsed: true,
                children: [
                    { path: 'datalist', title: 'Senarai Data', type: 'link' },
                    { path: 'class-category', title: 'Kategori Pengkelasan Data', type: 'link' },
                    { path: 'class-sharecategory', title: 'Kategori Pengkelasan Perkongsian Data', type: 'link' },
                    { path: 'dataprice', title: 'Harga Data', type: 'link' },
                ]
            },
            { path: 'newapplication', title: 'Permohonan Baru', type: 'link' },
            { path: 'applicationstatus', title: 'Status Permohonan', type: 'link' },
            { path: 'dataprocess', title: 'Proses Data', type: 'link' },
            { path: 'valuation', title: 'Penilaian', type: 'link' },
        ]
    },
    {
        path: '/admin/feedback',
        title: 'Maklum Balas',
        type: 'link',
        icontype: 'fas fa-comments text-primary'
    },
    {
        path: '/admin/management/',
        title: 'Pengurusan Portal',
        type: 'sub',
        icontype: 'fas fa-glasses text-green',
        collapse: 'management',
        isCollapsed: true,
        children: [
            { path: 'faq', title: 'Soalan Lazim', type: 'link' },
            { path: 'annoucement', title: 'Pengumuman', type: 'link' },
            { path: 'userguide', title: 'Panduan Pengguna', type: 'link' }
        ]
    },
];
var ROUTESADMIN2 = [
    {
        path: '/portal/',
        title: 'Utama',
        type: 'link',
        icontype: 'fas fa-home text-teal'
    },
    {
        path: '/admin/profile',
        title: 'Profil',
        type: 'link',
        icontype: 'fas fa-user text-blue'
    },
    {
        path: '/admin/dashboard',
        title: 'Dashboard',
        type: 'link',
        icontype: 'fas fa-desktop text-warning'
    },
    {
        path: '/admin/management/tabledata',
        title: 'Senarai Metadata',
        type: 'link',
        icontype: 'fa fa-tasks text-indigo'
    },
    {
        path: '/admin/management/update-element',
        title: 'Kemas Kini Elemen Metadata',
        type: 'link',
        icontype: 'fas fa-cubes text-green'
    },
];
var ROUTESADMIN3 = [
    {
        path: '/portal/',
        title: 'Utama',
        type: 'link',
        icontype: 'fas fa-home text-teal'
    },
    {
        path: '/admin/profile',
        title: 'Profil',
        type: 'link',
        icontype: 'fas fa-user text-blue'
    },
    {
        path: '/admin/dashboard',
        title: 'Dashboard',
        type: 'link',
        icontype: 'fas fa-desktop text-warning'
    },
    {
        path: '/admin/management/dataasas',
        title: 'Kemas Kini Data',
        type: 'sub',
        collapse: 'update-data',
        icontype: 'fas fa-magic text-red',
        isCollapsed: true,
        children: [
            { path: 'datalist', title: 'Senarai Data', type: 'link' },
            { path: 'class-category', title: 'Kategori Pengkelasan Data', type: 'link' },
            { path: 'class-sharecategory', title: 'Kategori Pengkelasan Perkongsian Data', type: 'link' },
            { path: 'dataprice', title: 'Harga Data', type: 'link' },
        ]
    },
    {
        path: '/admin/management/newapplication',
        title: 'Permohonan Baru',
        type: 'link',
        icontype: 'far fa-id-card text-green'
    },
    {
        path: '/admin/management/applicationstatus',
        title: 'Status Permohonan',
        type: 'link',
        icontype: 'fas fa-book text-purple'
    },
    {
        path: '/admin/management/dataprocess',
        title: 'Proses Data',
        type: 'link',
        icontype: 'fas fa-sync-alt text-cyan'
    },
    {
        path: '/admin/management/valuation',
        title: 'Penilaian',
        type: 'link',
        icontype: 'fas fa-file-signature text-primary'
    },
];


/***/ }),

/***/ "./src/app/shared/services/auth/auth.service.ts":
/*!******************************************************!*\
  !*** ./src/app/shared/services/auth/auth.service.ts ***!
  \******************************************************/
/*! exports provided: AuthService */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "AuthService", function() { return AuthService; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm5/core.js");
/* harmony import */ var src_environments_environment__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! src/environments/environment */ "./src/environments/environment.ts");
/* harmony import */ var _angular_common_http__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @angular/common/http */ "./node_modules/@angular/common/__ivy_ngcc__/fesm5/http.js");
/* harmony import */ var _auth0_angular_jwt__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @auth0/angular-jwt */ "./node_modules/@auth0/angular-jwt/__ivy_ngcc__/fesm5/auth0-angular-jwt.js");
/* harmony import */ var rxjs_operators__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! rxjs/operators */ "./node_modules/rxjs/_esm5/operators/index.js");
/* harmony import */ var _handler_jwt_jwt_service__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../../handler/jwt/jwt.service */ "./src/app/shared/handler/jwt/jwt.service.ts");







var AuthService = /** @class */ (function () {
    function AuthService(jwtService, http) {
        this.jwtService = jwtService;
        this.http = http;
        // URL
        this.urlRegister = src_environments_environment__WEBPACK_IMPORTED_MODULE_2__["environment"].baseUrl + 'auth/registration/';
        this.urlPasswordChange = src_environments_environment__WEBPACK_IMPORTED_MODULE_2__["environment"].baseUrl + 'auth/password/change/';
        this.urlPasswordReset = src_environments_environment__WEBPACK_IMPORTED_MODULE_2__["environment"].baseUrl + 'auth/password/reset';
        this.urlTokenObtain = src_environments_environment__WEBPACK_IMPORTED_MODULE_2__["environment"].baseUrl + 'auth/obtain/';
        this.urlTokenRefresh = src_environments_environment__WEBPACK_IMPORTED_MODULE_2__["environment"].baseUrl + 'auth/refresh/';
        this.urlTokenVerify = src_environments_environment__WEBPACK_IMPORTED_MODULE_2__["environment"].baseUrl + 'auth/verify/';
        this.urlUser = src_environments_environment__WEBPACK_IMPORTED_MODULE_2__["environment"].baseUrl + 'v1/users/';
        this.userRole = 1;
        this.retrievedUsers = [];
    }
    AuthService.prototype.register = function (body) {
        return this.http.post(this.urlRegister, body).pipe(Object(rxjs_operators__WEBPACK_IMPORTED_MODULE_5__["tap"])(function (res) {
            console.log('Registration: ', res);
        }));
    };
    AuthService.prototype.changePassword = function (body) {
        return this.http.post(this.urlPasswordChange, body).pipe(Object(rxjs_operators__WEBPACK_IMPORTED_MODULE_5__["tap"])(function (res) {
            console.log('Change password: ', res);
        }));
    };
    AuthService.prototype.resetPassword = function (body) {
        return this.http.post(this.urlPasswordReset, body).pipe(Object(rxjs_operators__WEBPACK_IMPORTED_MODULE_5__["tap"])(function (res) {
            console.log('Reset password: ', res);
        }));
    };
    AuthService.prototype.obtainToken = function (body) {
        var _this = this;
        var jwtHelper = new _auth0_angular_jwt__WEBPACK_IMPORTED_MODULE_4__["JwtHelperService"]();
        return this.http.post(this.urlTokenObtain, body).pipe(Object(rxjs_operators__WEBPACK_IMPORTED_MODULE_5__["tap"])(function (res) {
            _this.token = res;
            _this.tokenRefresh = res.refresh;
            _this.tokenAccess = res.access;
            var decodedToken = jwtHelper.decodeToken(_this.tokenAccess);
            _this.email = decodedToken.email;
            _this.username = decodedToken.username;
            _this.userID = decodedToken.user_id;
            _this.userType = decodedToken.user_type;
            // console.log('Decoded token: ', decodedToken)
            // console.log('Post response: ', res)
            // console.log('Refresh token', this.tokenRefresh)
            // console.log('Access token', this.tokenAccess)
            // console.log('Token: ', this.token)
            // console.log('Email: ', this.email)
            // console.log('Username: ', this.username)
            // console.log('User ID: ', this.userID)
            // console.log('User type: ', this.userType)
            _this.jwtService.saveToken('accessToken', _this.tokenAccess);
            _this.jwtService.saveToken('refreshToken', _this.tokenRefresh);
        }));
    };
    AuthService.prototype.refreshToken = function () {
        var refreshToken = this.jwtService.getToken('refreshToken');
        var body = {
            refresh: refreshToken
        };
        return this.http.post(this.urlTokenRefresh, body).pipe(Object(rxjs_operators__WEBPACK_IMPORTED_MODULE_5__["tap"])(function (res) {
            console.log('Token refresh: ', res);
        }));
    };
    AuthService.prototype.verifyToken = function (body) {
        return this.http.post(this.urlTokenVerify, body).pipe(Object(rxjs_operators__WEBPACK_IMPORTED_MODULE_5__["tap"])(function (res) {
            console.log('Token verify: ', res);
        }));
    };
    AuthService.prototype.getUserDetail = function () {
        var _this = this;
        console.log('getuserdetail');
        var selfInformationUrl = this.urlUser + this.userID + '/';
        return this.http.get(selfInformationUrl).pipe(Object(rxjs_operators__WEBPACK_IMPORTED_MODULE_5__["tap"])(function (res) {
            _this.userDetail = res;
            // console.log('User detail', this.userDetail)
        }));
    };
    AuthService.ctorParameters = function () { return [
        { type: _handler_jwt_jwt_service__WEBPACK_IMPORTED_MODULE_6__["JwtService"] },
        { type: _angular_common_http__WEBPACK_IMPORTED_MODULE_3__["HttpClient"] }
    ]; };
    AuthService = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Injectable"])({
            providedIn: 'root'
        }),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"])("design:paramtypes", [_handler_jwt_jwt_service__WEBPACK_IMPORTED_MODULE_6__["JwtService"],
            _angular_common_http__WEBPACK_IMPORTED_MODULE_3__["HttpClient"]])
    ], AuthService);
    return AuthService;
}());



/***/ }),

/***/ "./src/app/shared/services/users/users.service.ts":
/*!********************************************************!*\
  !*** ./src/app/shared/services/users/users.service.ts ***!
  \********************************************************/
/*! exports provided: UsersService */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "UsersService", function() { return UsersService; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm5/core.js");
/* harmony import */ var src_environments_environment__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! src/environments/environment */ "./src/environments/environment.ts");
/* harmony import */ var _angular_common_http__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @angular/common/http */ "./node_modules/@angular/common/__ivy_ngcc__/fesm5/http.js");
/* harmony import */ var rxjs_operators__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! rxjs/operators */ "./node_modules/rxjs/_esm5/operators/index.js");





var UsersService = /** @class */ (function () {
    function UsersService(http) {
        this.http = http;
        // URL
        this.urlUser = src_environments_environment__WEBPACK_IMPORTED_MODULE_2__["environment"].baseUrl + 'v1/users/';
        this.users = [];
        this.usersFiltered = [];
    }
    UsersService.prototype.create = function (body) {
        return this.http.post(this.urlUser, body).pipe(Object(rxjs_operators__WEBPACK_IMPORTED_MODULE_4__["tap"])(function (res) {
            console.log('User: ', res);
        }));
    };
    UsersService.prototype.getAll = function () {
        return this.http.get(this.urlUser).pipe(Object(rxjs_operators__WEBPACK_IMPORTED_MODULE_4__["tap"])(function (res) {
            console.log('Users: ', res);
        }));
    };
    UsersService.prototype.getOne = function (id) {
        var urlUserOne = this.urlUser + id + '/';
        return this.http.get(urlUserOne).pipe(Object(rxjs_operators__WEBPACK_IMPORTED_MODULE_4__["tap"])(function (res) {
            console.log('User: ', res);
        }));
    };
    UsersService.prototype.update = function (id, body) {
        var urlUserOne = this.urlUser + id + '/';
        return this.http.put(urlUserOne, body).pipe(Object(rxjs_operators__WEBPACK_IMPORTED_MODULE_4__["tap"])(function (res) {
            console.log('User', res);
        }));
    };
    UsersService.prototype.filter = function (field) {
        var urlFilter = this.urlUser + '?' + field + '/';
        return this.http.get(urlFilter).pipe(Object(rxjs_operators__WEBPACK_IMPORTED_MODULE_4__["tap"])(function (res) {
            console.log('Users', res);
        }));
    };
    UsersService.ctorParameters = function () { return [
        { type: _angular_common_http__WEBPACK_IMPORTED_MODULE_3__["HttpClient"] }
    ]; };
    UsersService = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Injectable"])({
            providedIn: 'root'
        }),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"])("design:paramtypes", [_angular_common_http__WEBPACK_IMPORTED_MODULE_3__["HttpClient"]])
    ], UsersService);
    return UsersService;
}());



/***/ }),

/***/ "./src/environments/environment.ts":
/*!*****************************************!*\
  !*** ./src/environments/environment.ts ***!
  \*****************************************/
/*! exports provided: environment */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "environment", function() { return environment; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
// This file can be replaced during build by using the `fileReplacements` array.
// `ng build --prod` replaces `environment.ts` with `environment.prod.ts`.
// The list of file replacements can be found in `angular.json`.

var environment = {
    production: false,
    baseUrl: 'https://www.api.prototype.com.my/',
    mapboxKey: {
        accessToken: 'pk.eyJ1IjoiZG5pZWFmZWVxIiwiYSI6ImNrbm55YmNscDEydnIyeW94MW5nMW92OTYifQ.SeLAsWQstUdr4vkzPk3GmA' // Your access token goes here
    }
};
/*
 * For easier debugging in development mode, you can import the following file
 * to ignore zone related error stack frames such as `zone.run`, `zoneDelegate.invokeTask`.
 *
 * This import should be commented out in production mode because it will have a negative impact
 * on performance if an error is thrown.
 */
// import 'zone.js/dist/zone-error';  // Included with Angular CLI.


/***/ }),

/***/ "./src/main.ts":
/*!*********************!*\
  !*** ./src/main.ts ***!
  \*********************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm5/core.js");
/* harmony import */ var _angular_platform_browser_dynamic__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/platform-browser-dynamic */ "./node_modules/@angular/platform-browser-dynamic/__ivy_ngcc__/fesm5/platform-browser-dynamic.js");
/* harmony import */ var _app_app_module__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./app/app.module */ "./src/app/app.module.ts");
/* harmony import */ var _environments_environment__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./environments/environment */ "./src/environments/environment.ts");
/*!

=========================================================
* Argon Dashboard PRO Angular - v1.1.1
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard-pro-angular
* Copyright 2019 Creative Tim (https://www.creative-tim.com)

* Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

*/





if (_environments_environment__WEBPACK_IMPORTED_MODULE_4__["environment"].production) {
    Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["enableProdMode"])();
}
Object(_angular_platform_browser_dynamic__WEBPACK_IMPORTED_MODULE_2__["platformBrowserDynamic"])()
    .bootstrapModule(_app_app_module__WEBPACK_IMPORTED_MODULE_3__["AppModule"])
    .catch(function (err) { return console.error(err); });


/***/ }),

/***/ 0:
/*!**********************************************************************************************************!*\
  !*** multi (webpack)-dev-server/client?http://0.0.0.0:0/sockjs-node&sockPath=/sockjs-node ./src/main.ts ***!
  \**********************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /Applications/MAMP/htdocs/afiqfe/web/node_modules/webpack-dev-server/client/index.js?http://0.0.0.0:0/sockjs-node&sockPath=/sockjs-node */"./node_modules/webpack-dev-server/client/index.js?http://0.0.0.0:0/sockjs-node&sockPath=/sockjs-node");
module.exports = __webpack_require__(/*! /Applications/MAMP/htdocs/afiqfe/web/src/main.ts */"./src/main.ts");


/***/ })

},[[0,"runtime","vendor"]]]);
//# sourceMappingURL=main.js.map
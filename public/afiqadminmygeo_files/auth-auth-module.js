(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["auth-auth-module"],{

/***/ "./node_modules/raw-loader/dist/cjs.js!./src/app/auth/forgot/forgot.component.html":
/*!*****************************************************************************************!*\
  !*** ./node_modules/raw-loader/dist/cjs.js!./src/app/auth/forgot/forgot.component.html ***!
  \*****************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("<ngx-loading-bar></ngx-loading-bar>\n<div class=\"main-content auth-content d-flex align-items-center\">\n    <div class=\"container\">\n        <div class=\"row justify-content-center\">\n            <div class=\"col-lg-5 col-md-7\">\n                <div class=\"card bg-secondary border-0 mb-0\">\n                    <div class=\"card-body px-lg-5 py-lg-5\">\n                        <div class=\"logo-box\">\n                            <img class=\"logo\" [src]=\"imgLogo\">\n                            <h6 class=\"h2 text-default mt-3 mb-0\">Set Semula Kata Laluan</h6>\n                        </div>\n\n                        <form [formGroup]=\"resetForm\">\n                            <div class=\"form-group mb-3\" [ngClass]=\"{ focused: focusEmail === true }\">\n                                <div class=\"input-group input-group-alternative\">\n                                    <div class=\"input-group-prepend\">\n                                        <span class=\"input-group-text bg-primary\">\n                                            <i class=\"fas fa-envelope text-white\"></i>\n                                        </span>\n                                    </div>\n                                    <input\n                                        class=\"form-control text-dark\"\n                                        placeholder=\"Masukkan Emel ...\"\n                                        type=\"email\"\n                                        formControlName=\"email\"\n                                        (focus)=\"focusEmail = true\"\n                                        (blur)=\"focusEmail = false\"\n                                    />\n                                </div>\n                                <ng-container *ngFor=\"let message of resetFormMessages.email\">\n                                    <div *ngIf=\"resetForm.get('email').hasError(message.type) && (resetForm.get('email').dirty || resetForm.get('email').touched)\">\n                                        <p class=\"error-message\"><span>{{ message.message }}</span></p>\n                                    </div>\n                                </ng-container>\n                            </div>\n                            <div class=\"text-center\">\n                                <button type=\"button\" class=\"btn btn-primary btn-block my-4\" (click)=\"reset()\" [disabled]=\"!resetForm.valid\">\n                                    Set Semula\n                                </button>\n                                <button type=\"button\" class=\"btn btn-icon btn-outline-primary btn-block my-2\"  (click)=\"navigatePage('login')\">\n                                    <span class=\"btn-inner--icon\"><i class=\"fas fa-angle-left\"></i></span>\n                                    <span class=\"btn-inner--text\">Log Masuk</span>\n                                </button>\n                            </div>\n                        </form>\n                    </div>\n                </div>\n            </div>\n        </div>\n    </div>\n</div>\n");

/***/ }),

/***/ "./node_modules/raw-loader/dist/cjs.js!./src/app/auth/login/login.component.html":
/*!***************************************************************************************!*\
  !*** ./node_modules/raw-loader/dist/cjs.js!./src/app/auth/login/login.component.html ***!
  \***************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("<ngx-loading-bar></ngx-loading-bar>\n<div class=\" bgg\" style=\"min-height: 800px;\">\n    <!-- Content Header (Page header) -->\n    <div class=\"content-header\">\n        <div class=\"container-fluid\">\n            <div class=\"row mb-2\">\n                <div class=\"col-sm-6\">\n                    <h1 class=\"m-0 text-dark\"></h1>\n                </div><!-- /.col -->\n            </div><!-- /.row -->\n        </div><!-- /.container-fluid -->\n    </div>\n    <!-- /.content-header -->\n\n    <!-- Main content -->\n    <div class=\"content p-5\">\n        <div class=\"container-fluid\">\n            <div class=\"row\">\n                <!-- /.col-md-6 -->\n                <div class=\"col-lg-5 p-4 mt-7\">\n                    <div class=\"card\" style=\"background-color: rgba(255, 255, 255, 0.2);\">\n\n                        <div class=\"card-body px-lg-5 py-lg-5\">\n                            <!--<div class=\"logo-box\">\n                        <img class=\"logo\" [src]=\"\">\n                    </div>-->\n                            <div class=\"text-white\" style=\"font-size: 17px;\">\n                                <span>Maklumat geospatial kini dihujung jari anda.</span><br>\n                                <span>Log Masuk.</span>\n                                <br><br>\n                            </div>\n                            <div class=\"mb-4\">\n                                <a class=\"text-yellow\" (click)=\"openModal2(addUser)\">\n                                    Pengguna Baru? Daftar sekarang.\n                                </a>\n\n                            </div>\n                            <form [formGroup]=\"loginForm\">\n                                <div class=\"form-group mb-3\" [ngClass]=\"{ focused: focusUsername === true }\">\n                                    <div class=\"input-group input-group-alternative\">\n                                        <input class=\"form-control\" placeholder=\"ID Pengguna\" type=\"email\"\n                                            formControlName=\"username\" (focus)=\"focusUsername = true\"\n                                            (blur)=\"focusUsername = false\" />\n                                        <div class=\"input-group-append\">\n                                            <div class=\"input-group-text\">\n                                                <span class=\"fas fa-envelope\"></span>\n                                            </div>\n                                        </div>\n                                    </div>\n                                    <ng-container *ngFor=\"let message of loginFormMessages.username\">\n                                        <div\n                                            *ngIf=\"loginForm.get('username').hasError(message.type) && (loginForm.get('username').dirty || loginForm.get('username').touched)\">\n                                            <p class=\"error-message text-orange\"><span>{{ message.message }}</span></p>\n                                        </div>\n                                    </ng-container>\n                                </div>\n\n                                <div class=\"form-group\" [ngClass]=\"{ focused: focusPassword === true }\">\n                                    <div class=\"input-group input-group-alternative\">\n                                        <input class=\"form-control\" placeholder=\"Kata Laluan\" type=\"password\"\n                                            formControlName=\"password\" (focus)=\"focusPassword = true\"\n                                            (blur)=\"focusPassword = false\" />\n                                        <div class=\"input-group-append\">\n                                            <div class=\"input-group-text\">\n                                                <span class=\"fas fa-lock\"></span>\n                                            </div>\n                                        </div>\n                                    </div>\n                                    <div class=\"validation-errors\">\n                                        <ng-container *ngFor=\"let message of loginFormMessages.password\">\n                                            <div\n                                                *ngIf=\"loginForm.get('password').hasError(message.type) && (loginForm.get('password').dirty || loginForm.get('password').touched)\">\n                                                <p class=\"error-message text-orange\"><span>{{ message.message }}</span>\n                                                </p>\n                                            </div>\n                                        </ng-container>\n                                    </div>\n                                </div>\n\n                            </form>\n\n                            <div class=\"row align-items-center\">\n                                <div class=\"col-6 order-2\">\n                                    <!-- <div class=\"custom-control custom-control-alternative custom-checkbox\">\n                                <input class=\"custom-control-input\" id=\"customCheckLogin\" type=\"checkbox\" />\n                                <label class=\"custom-control-label\" for=\"customCheckLogin\">\n                                    <span>Remember me?</span>\n                                </label>\n                            </div>-->\n                                    <div class=\"text-center\">\n                                        <button type=\"button\" class=\"btn btn-warning float-right\" (click)=\"login()\">\n                                            Log Masuk\n                                        </button>\n                                    </div>\n                                </div>\n                                <div class=\"col-6 order-1\">\n                                    <label class=\"forget-label\" (click)=\"navigatePage('forgot')\">\n                                        <a class=\"pointer text-white\">Lupa kata laluan?</a>\n                                    </label>\n                                </div>\n                            </div>\n                        </div>\n                    </div>\n                </div>\n                <div class=\"col-lg-6\"></div>\n                <div class=\"col-lg-1\">\n                    <div class=\"form-group mt-7\">\n                        <div class=\"card fancy_card square rounded-circle mt-4 ml-4 float-right\">\n                            <div class=\"card-body pointer\" [routerLink]=\"['/metadata']\">\n                                <img height=\"50\" src=\"assets/img/icons/common/metadata.png\" />\n                            </div>\n                            <span class=\"text-center mt-2\">Metadata</span>\n                        </div>\n                        <div class=\"card fancy_card square rounded-circle mt-4 ml-4 float-right\">\n                            <div class=\"card-body pointer\" [routerLink]=\"['/data-asas']\">\n                                <img height=\"50\" src=\"assets/img/icons/common/dataapp.png\" />\n                            </div>\n                            <span class=\"text-center mt-2\">Data Asas</span>\n                        </div>\n                        <div class=\"card fancy_card square rounded-circle mt-4 float-right\">\n                            <div class=\"card-body pointer\" [routerLink]=\"['/tutorial']\">\n                                <img height=\"50\" src=\"assets/img/icons/common/tutorial.png\" />\n                            </div>\n                            <span class=\"text-center mt-2\">Tutorial</span>\n                        </div>\n                    </div>\n                </div>\n            </div>\n        </div>\n    </div>\n</div>\n<ng-template #createUser>\n    <div class=\"modal-header bg-primary\">\n        <h6 *ngIf=\"myCheck == 1\" class=\"modal-title text-white my-auto\" id=\"modal-title-default\">\n            Pendaftaran Penerbit Metadata</h6>\n        <h6 *ngIf=\"myCheck == 2\" class=\"modal-title text-white my-auto\" id=\"modal-title-default\">\n            Pendaftaran Pengesah Metadata</h6>\n        <h6 *ngIf=\"myCheck == 3 && myCheck2 == 2\" class=\"modal-title text-white my-auto\" id=\"modal-title-default\">\n            Pendaftaran Pemohon Data - G2G</h6>\n        <h6 *ngIf=\"myCheck == 3 && myCheck2 == 3\" class=\"modal-title text-white my-auto\" id=\"modal-title-default\">\n            Pendaftaran Pemohon Data - G2E</h6>\n\n        <button aria-label=\"Close\" class=\"close\" data-dismiss=\"modal\" type=\"button\" (click)=\"closeModal()\">\n            <span aria-hidden=\"true\" class=\"text-white my-auto\"> × </span>\n        </button>\n    </div>\n\n    <div class=\"modal-body\">\n        <form [formGroup]=\"registerForm\">\n            <h6 class=\"heading-small text-muted mb-4\">Maklumat Pengguna</h6>\n            <div class=\"pl-lg-4\">\n                <div class=\"row mb-2\">\n                    <div class=\"col-3\">\n                        <label class=\"form-control-label mr-4\" for=\"input-username\">\n                            Nama Penuh\n                        </label>\n                    </div>\n                    <div class=\"col-8\">\n                        <input class=\"form-control form-control-sm ml-3\" id=\"input-username\"\n                            placeholder=\"Nama Penuh seperti dalam Kad Pengenalan\" type=\"text\" formControlName=\"name\" />\n                        <ng-container *ngFor=\"let message of registerFormMessages.name\">\n                            <div\n                                *ngIf=\"registerForm.get('name').hasError(message.type) && (registerForm.get('name').dirty || registerForm.get('name').touched)\">\n                                <p class=\"error-message\"><span>{{ message.message }}</span></p>\n                            </div>\n                        </ng-container>\n                    </div>\n                </div>\n                <div class=\"row mb-2\">\n                    <div class=\"col-3\">\n                        <label class=\"form-control-label mr-4\" for=\"input-nric\">\n                            No NRIC\n                        </label>\n                    </div>\n                    <div class=\"col-8\">\n                        <input class=\"form-control form-control-sm ml-3\" id=\"input-nric\" placeholder=\"No Kad Pengenalan\"\n                            type=\"text\" formControlName=\"nric\" />\n                        <ng-container *ngFor=\"let message of registerFormMessages.nric\">\n                            <div\n                                *ngIf=\"registerForm.get('nric').hasError(message.type) && (registerForm.get('nric').dirty || registerForm.get('nric').touched)\">\n                                <p class=\"error-message\"><span>{{ message.message }}</span></p>\n                            </div>\n                        </ng-container>\n                    </div>\n                </div>\n                <div class=\"row mb-2\">\n                    <div class=\"col-3\">\n                        <label *ngIf=\"myCheck == 1 || myCheck == 2 || myCheck == 3 && myCheck2 == 2\"\n                            class=\"form-control-label mr-4\" for=\"input-agensi\">Agensi/Organisasi</label>\n                        <label *ngIf=\"myCheck == 3 && myCheck2 == 3\" class=\"form-control-label mr-4\"\n                            for=\"input-agensi\">Institusi</label>\n                    </div>\n                    <div *ngIf=\"myCheck == 1 || myCheck == 2 || myCheck == 3 && myCheck2 == 2\" class=\"col-8\">\n                        <select class=\" form-control form-control-sm ml-3\" id=\"input-agensi\">\n                            <option selected disabled hidden> Nama Agensi/Organisasi </option>\n                            <option value=\"penerbit\">Kerajaan</option>\n                            <option value=\"pengesah\">Swasta</option>\n                        </select>\n                    </div>\n                    <div *ngIf=\"myCheck == 3 && myCheck2 == 3\"  class=\"col-8\">\n                        <input class=\"form-control form-control-sm ml-3\" id=\"input-agensi\"\n                            placeholder=\"Nama Institusi\" type=\"text\" formControlName=\"agensi\" />\n                        <ng-container *ngFor=\"let message of registerFormMessages.name\">\n                            <div\n                                *ngIf=\"registerForm.get('name').hasError(message.type) && (registerForm.get('name').dirty || registerForm.get('name').touched)\">\n                                <p class=\"error-message\"><span>{{ message.message }}</span></p>\n                            </div>\n                        </ng-container>\n                    </div>\n                </div>\n                <div *ngIf=\"myCheck == 1 || myCheck == 2\" class=\"row mb-2\">\n                    <div class=\"col-3\">\n                        <label class=\"form-control-label mr-4\" for=\"input-sektor\">\n                            Bahagian\n                        </label>\n                    </div>\n                    <div class=\"col-8\">\n                        <select class=\" form-control form-control-sm ml-3\" id=\"input-bahagian\">\n                            <option selected disabled hidden> Nama bahagian dalam organisasi </option>\n                            <option value=\"penerbit\">Kerajaan</option>\n                            <option value=\"pengesah\">Swasta</option>\n                        </select>\n                    </div>\n                </div>\n                <div *ngIf =\"myCheck == 3\" class=\"row mb-2\">\n                    <div class=\"col-3\">\n                        <label class=\"form-control-label mr-4\" for=\"input-address\">\n                            Alamat\n                        </label>\n                    </div>\n                    <div class=\"col-8\">\n                        <textarea class=\"form-control form-control-sm ml-3\" id=\"input-address\" row=\"4\"\n                            placeholder=\"Alamat Agensi/Organisasi\" type=\"text\" formControlName=\"address\"></textarea>\n                        <ng-container *ngFor=\"let message of registerFormMessages.address\">\n                            <div\n                                *ngIf=\"registerForm.get('address').hasError(message.type) && (registerForm.get('address').dirty || registerForm.get('address').touched)\">\n                                <p class=\"error-message\"><span>{{ message.message }}</span></p>\n                            </div>\n                        </ng-container>\n                    </div>\n                </div>\n                <div *ngIf=\"myCheck == 1 || myCheck == 2\" class=\"row mb-2\">\n                    <div class=\"col-3\">\n                        <label class=\"form-control-label mr-4\" for=\"input-bahagian\">\n                            Sektor\n                        </label>\n                    </div>\n                    <div class=\"col-8\">\n                        <select class=\" form-control form-control-sm ml-3\" id=\"category\">\n                            <option selected disabled hidden> Pilih Sektor </option>\n                            <option value=\"penerbit\">Kerajaan</option>\n                            <option value=\"pengesah\">Swasta</option>\n                        </select>\n                    </div>\n                </div>\n                <div class=\"row mb-2\">\n                    <div class=\"col-3\">\n                        <label *ngIf=\"myCheck == 1 || myCheck == 2 || myCheck == 3 && myCheck2 == 3\"\n                            class=\"form-control-label mr-4\" for=\"input-emel\">Emel</label>\n                        <label *ngIf=\"myCheck == 3 && myCheck2 == 2\" class=\"form-control-label mr-4\"\n                            for=\"input-emel\">Emel Rasmi</label>\n                    </div>\n                    <div class=\"col-6\">\n                        <input class=\"form-control form-control-sm ml-3\" id=\"input-emel\"\n                            placeholder=\"Masukan E-mel anda\" type=\"text\" formControlName=\"email\" />\n                        <ng-container *ngFor=\"let message of registerFormMessages.email\">\n                            <div\n                                *ngIf=\"registerForm.get('email').hasError(message.type) && (registerForm.get('email').dirty || registerForm.get('email').touched)\">\n                                <p class=\"error-message\"><span>{{ message.message }}</span></p>\n                            </div>\n                        </ng-container>\n                    </div>\n                </div>\n                <div class=\"row mb-2\">\n                    <div class=\"col-3\">\n                        <label class=\"form-control-label mr-4\" for=\"input-tpejabat\">\n                            Telefon Pejabat\n                        </label>\n                    </div>\n                    <div class=\"col-6\">\n                        <input class=\"form-control form-control-sm ml-3\" id=\"input-tpejabat\"\n                            placeholder=\"Nombor Telefon Pejabat\" type=\"text\" formControlName=\"officephone\" />\n                    </div>\n                </div>\n                <div *ngIf=\"myCheck == 3\"  class=\"row mb-2\">\n                    <div class=\"col-3\">\n                        <label class=\"form-control-label mr-4\" for=\"input-tbimbit\">\n                            Telefon Bimbit\n                        </label>\n                    </div>\n                    <div class=\"col-6\">\n                        <input class=\"form-control form-control-sm ml-3\" id=\"input-tbimbit\"\n                            placeholder=\"Nombor Telefon Pejabat\" type=\"text\" formControlName=\"mobilephone\" />\n                    </div>\n                </div>\n                <div class=\"row mb-2\">\n                    <div class=\"col-3\">\n                        <label class=\"form-control-label mr-4\" for=\"input-peranan\">\n                            Peranan\n                        </label>\n                    </div>\n                    <div class=\"col-6\">\n                        <input *ngIf=\"myCheck == 1\" class=\" form-control form-control-sm ml-3\" id=\"input-peranan\"\n                            type=\"text\" value=\"Penerbit Metadata\" disabled />\n                        <input *ngIf=\"myCheck == 2\" class=\" form-control form-control-sm ml-3\" id=\"input-peranan\"\n                            type=\"text\" value=\"Pengesah Metadata\" disabled />\n                        <input *ngIf=\"myCheck == 3\" class=\" form-control form-control-sm ml-3\" id=\"input-peranan\"\n                            type=\"text\" value=\"Pemohon Data\" disabled />\n                    </div>\n                </div>\n                <div *ngIf =\"myCheck == 1 || myCheck == 2\" class=\"row mb-2\">\n                    <div class=\"col-3\">\n                        <label class=\"form-control-label mr-4\" for=\"input-address\">\n                            Alamat\n                        </label>\n                    </div>\n                    <div class=\"col-8\">\n                        <textarea class=\"form-control form-control-sm ml-3\" id=\"input-address\" row=\"4\"\n                            placeholder=\"Alamat Agensi/Organisasi\" type=\"text\" formControlName=\"address\"></textarea>\n                        <ng-container *ngFor=\"let message of registerFormMessages.address\">\n                            <div\n                                *ngIf=\"registerForm.get('address').hasError(message.type) && (registerForm.get('address').dirty || registerForm.get('address').touched)\">\n                                <p class=\"error-message\"><span>{{ message.message }}</span></p>\n                            </div>\n                        </ng-container>\n                    </div>\n                </div>\n                <div *ngIf=\"myCheck == 3\" class=\"row mb-2\">\n                    <div class=\"col-3\">\n                        <label class=\"form-control-label mr-4\" for=\"input-kategori\">\n                            Kategori\n                        </label>\n                    </div>\n                    <div class=\"col-6\">\n                        <input *ngIf=\"myCheck3 == 1\" class=\" form-control form-control-sm ml-3\" id=\"input-kategori\"\n                            type=\"text\" value=\"Agensi Persekutuan/Agensi Negeri\" disabled />\n                        <input *ngIf=\"myCheck3 == 2\" class=\" form-control form-control-sm ml-3\" id=\"input-kategori\"\n                            type=\"text\" value=\"Badan Berkanun\" disabled />\n                        <input *ngIf=\"myCheck3 == 3\" class=\" form-control form-control-sm ml-3\" id=\"input-kategori\"\n                            type=\"text\" value=\"GLC\" disabled />\n                        <input *ngIf=\"myCheck4 == 1\" class=\" form-control form-control-sm ml-3\" id=\"input-kategori\"\n                            type=\"text\" value=\"IPTA - Pensyarah/Penyelidik\" disabled />\n                        <input *ngIf=\"myCheck4 == 2\" class=\" form-control form-control-sm ml-3\" id=\"input-kategori\"\n                            type=\"text\" value=\"IPTA - Pelajar\" disabled />\n                        <input *ngIf=\"myCheck4 == 3\" class=\" form-control form-control-sm ml-3\" id=\"input-kategori\"\n                            type=\"text\" value=\"IPTS - Pensyarah/Penyelidik\" disabled />\n                        <input *ngIf=\"myCheck4 == 4\" class=\" form-control form-control-sm ml-3\" id=\"input-kategori\"\n                            type=\"text\" value=\"IPTS - Pelajar\" disabled />\n                    </div>\n                </div>\n            </div>\n            <hr class=\"my-4\" />\n\n            <h6 class=\"heading-small text-muted mb-4\"> Kata Laluan</h6>\n\n            <div class=\"pl-lg-4\">\n                <div class=\"row mb-2\">\n                    <div class=\"col-4\">\n                        <label class=\"form-control-label mr-4\" for=\"input-password\">\n                            Kata Laluan\n                        </label>\n                    </div>\n                    <div class=\"col-6\">\n                        <input class=\"form-control form-control-sm ml-3\" id=\"input-password\"\n                            placeholder=\"Masukkan Kata Laluan Anda\" type=\"password\" formControlName=\"password1\" />\n                        <ng-container *ngFor=\"let message of registerFormMessages.password1\">\n                            <div\n                                *ngIf=\"registerForm.get('password1').hasError(message.type) && (registerForm.get('password1').dirty || registerForm.get('password1').touched)\">\n                                <p class=\"error-message\"><span>{{ message.message }}</span></p>\n                            </div>\n                        </ng-container>\n                    </div>\n                </div>\n                <div class=\"row mb-2\">\n                    <div class=\"col-4\">\n                        <label class=\"form-control-label mr-4\" for=\"input-password\">\n                            Sahkan Kata Laluan\n                        </label>\n                    </div>\n                    <div class=\"col-6\">\n                        <input class=\"form-control form-control-sm ml-3\" id=\"input-password\"\n                            placeholder=\"Masukkan Semula Kata Laluan\" type=\"password\" formControlName=\"password2\" />\n                        <ng-container *ngFor=\"let message of registerFormMessages.password2\">\n                            <div\n                                *ngIf=\"registerForm.get('password2').hasError(message.type) && (registerForm.get('password2').dirty || registerForm.get('password2').touched)\">\n                                <p class=\"error-message\"><span>{{ message.message }}</span></p>\n                            </div>\n                        </ng-container>\n                    </div>\n                </div>\n            </div>\n        </form>\n    </div>\n\n    <div class=\"modal-footer\">\n        <button class=\"btn btn-success\" type=\"button\" (click)=\"confirm()\" [disabled]=\"registerForm.valid\">\n            Daftar\n        </button>\n\n        <button class=\"btn btn-outline-danger ml-auto\" data-dismiss=\"modal\" type=\"button\" (click)=\"closeModal()\">\n            Tutup\n        </button>\n    </div>\n</ng-template>\n\n<ng-template #addUser>\n    <div class=\"modal-header bg-primary\">\n        <h6 class=\"modal-title text-white my-auto\" id=\"modal-title-default\">\n            Daftar Sebagai :\n        </h6>\n\n        <button aria-label=\"Close\" class=\"close\" data-dismiss=\"modal\" type=\"button\" (click)=\"closeModal()\">\n            <span aria-hidden=\"true\" class=\"text-white my-auto\"> × </span>\n        </button>\n    </div>\n\n    <div class=\"modal-body\">\n        <form class=\"p-lg-5\" id=\"myForm\">\n            <div class=\" custom-control custom-radio mb-3\">\n                <input [(ngModel)]=\"myCheck\" class=\" custom-control-input\" id=\"customRadio1\" name=\"custom-radio-1\"\n                    type=\"radio\" value=\"1\" (click)=\"resetCheck3()\" />\n                <label class=\" custom-control-label\" for=\"customRadio1\">\n                    Penerbit Metadata\n                </label>\n            </div>\n            <div class=\" custom-control custom-radio mb-3\">\n                <input [(ngModel)]=\"myCheck\" class=\" custom-control-input\" id=\"customRadio2\" name=\"custom-radio-1\"\n                    type=\"radio\" value=\"2\" (click)=\"resetCheck3()\" />\n                <label class=\" custom-control-label\" for=\"customRadio2\">\n                    Pengesah Metadata\n                </label>\n            </div>\n            <div class=\" custom-control custom-radio mb-3\">\n                <input [(ngModel)]=\"myCheck\" class=\" custom-control-input\" id=\"customRadio3\" name=\"custom-radio-1\"\n                    type=\"radio\" value=\"3\" />\n                <label class=\" custom-control-label\" for=\"customRadio3\">\n                    Pemohon Data\n                </label>\n\n                <div class=\"ml-3 mt-2\" *ngIf=\"myCheck == 3\">\n                    <div class=\" custom-control custom-radio mb-3\">\n                        <input [(ngModel)]=\"myCheck2\" class=\" custom-control-input\" id=\"customRadio4\"\n                            name=\"custom-radio-2\" type=\"radio\" value=\"1\" (click)=\"resetCheck2()\">\n                        <label class=\" custom-control-label\" for=\"customRadio4\">\n                            G2C\n                        </label>\n                        <span class=\"ml-3\" tooltip=\"Awam\" [tooltipDisabled]=\"false\" [tooltipAnimation]=\"true\"\n                            tooltipPlacement=\"right\">\n                            <i class=\"far fa-question-circle\"></i>\n                        </span>\n                    </div>\n                    <div class=\" custom-control custom-radio mb-3\">\n                        <input [(ngModel)]=\"myCheck2\" class=\" custom-control-input\" id=\"customRadio5\"\n                            name=\"custom-radio-2\" type=\"radio\" value=\"2\" (click)=\"resetCheck2()\" />\n                        <label class=\" custom-control-label\" for=\"customRadio5\">\n                            G2G\n                        </label>\n                        <span class=\"ml-3\" tooltip=\"Agensi, Badan Berkanun, GLC\" [tooltipDisabled]=\"false\"\n                            [tooltipAnimation]=\"true\" tooltipPlacement=\"right\">\n                            <i class=\"far fa-question-circle\"></i>\n                        </span>\n                        <div class=\"ml-3 mt-2\" *ngIf=\"myCheck2 == 2\">\n                            <div class=\" custom-control custom-radio mb-3\">\n                                <input [(ngModel)]=\"myCheck3\" class=\" custom-control-input\" id=\"customRad1\"\n                                    name=\"custom-radio-3\" type=\"radio\" value=\"1\" />\n                                <label class=\" custom-control-label\" for=\"customRad1\">\n                                    Agensi Persekutuan/Agensi Negeri\n                                </label>\n                            </div>\n                            <div class=\" custom-control custom-radio mb-3\">\n                                <input [(ngModel)]=\"myCheck3\" class=\" custom-control-input\" id=\"customRad2\"\n                                    name=\"custom-radio-3\" type=\"radio\" value=\"2\" />\n                                <label class=\" custom-control-label\" for=\"customRad2\">\n                                    Badan Berkanun\n                                </label>\n                            </div>\n                            <div class=\" custom-control custom-radio mb-3\">\n                                <input [(ngModel)]=\"myCheck3\" class=\" custom-control-input\" id=\"customRad3\"\n                                    name=\"custom-radio-3\" type=\"radio\" value=\"3\" />\n                                <label class=\" custom-control-label\" for=\"customRad3\">\n                                    GLC\n                                </label>\n                            </div>\n                        </div>\n                    </div>\n\n                    <div class=\" custom-control custom-radio mb-3\">\n                        <input [(ngModel)]=\"myCheck2\" class=\" custom-control-input\" id=\"customRadio6\"\n                            name=\"custom-radio-2\" type=\"radio\" value=\"3\" (click)=\"resetCheck2()\" />\n                        <label class=\" custom-control-label\" for=\"customRadio6\">\n                            G2E\n                        </label>\n                        <span class=\"ml-3\" tooltip=\"IPTA/IPTS\" [tooltipDisabled]=\"false\" [tooltipAnimation]=\"true\"\n                            tooltipPlacement=\"right\">\n                            <i class=\"far fa-question-circle\"></i>\n                        </span>\n                        <div class=\"ml-3 mt-2\" *ngIf=\"myCheck2 == 3\">\n                            <div class=\" custom-control custom-radio mb-3\">\n                                <input [(ngModel)]=\"myCheck4\" class=\" custom-control-input\" id=\"customRadi1\"\n                                    name=\"custom-radio-4\" type=\"radio\" value=\"1\" />\n                                <label class=\" custom-control-label\" for=\"customRadi1\">\n                                    IPTA - Pensyarah/Penyelidik\n                                </label>\n                            </div>\n                            <div class=\" custom-control custom-radio mb-3\">\n                                <input [(ngModel)]=\"myCheck4\" class=\" custom-control-input\" id=\"customRadi2\"\n                                    name=\"custom-radio-4\" type=\"radio\" value=\"2\" />\n                                <label class=\" custom-control-label\" for=\"customRadi2\">\n                                    IPTA - Pelajar\n                                </label>\n                            </div>\n                            <div class=\" custom-control custom-radio mb-3\">\n                                <input [(ngModel)]=\"myCheck4\" class=\" custom-control-input\" id=\"customRadi3\"\n                                    name=\"custom-radio-4\" type=\"radio\" value=\"3\" />\n                                <label class=\" custom-control-label\" for=\"customRadi3\">\n                                    IPTS - Pensyarah/Penyelidik\n                                </label>\n                            </div>\n                            <div class=\" custom-control custom-radio mb-3\">\n                                <input [(ngModel)]=\"myCheck4\" class=\" custom-control-input\" id=\"customRadi4\"\n                                    name=\"custom-radio-4\" type=\"radio\" value=\"4\" />\n                                <label class=\" custom-control-label\" for=\"customRadi4\">\n                                    IPTS - Pelajar\n                                </label>\n                            </div>\n                        </div>\n                    </div>\n                </div>\n            </div>\n        </form>\n        <div class=\"row\">\n            <button\n                *ngIf=\" myCheck == 1 || \n                        myCheck == 2 || \n                        myCheck == 3 && myCheck2 == 2 && (myCheck3 == 1 || myCheck3 == 2 || myCheck3 == 3) || \n                        myCheck == 3 && myCheck2 == 3 && (myCheck4 == 1 || myCheck4 == 2 || myCheck4 == 3 || myCheck4 == 4)\"\n                class=\"btn btn-primary mx-auto\" type=\"button\" (click)=\"closeModal()\" (click)=\"openModal(createUser)\"\n                [disabled]=\"registerForm.valid\">\n                Isi Borang\n            </button>\n        </div>\n    </div>\n</ng-template>");

/***/ }),

/***/ "./node_modules/raw-loader/dist/cjs.js!./src/app/auth/register/register.component.html":
/*!*********************************************************************************************!*\
  !*** ./node_modules/raw-loader/dist/cjs.js!./src/app/auth/register/register.component.html ***!
  \*********************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("<ngx-loading-bar></ngx-loading-bar>\n<div class=\"main-content auth-content d-flex align-items-center\">\n    <div class=\"container\">\n        <div class=\"row justify-content-center\">\n            <div class=\"col-lg-5 col-md-7\">\n                <div class=\"card bg-secondary border-0 mb-0\">\n                    <div class=\"card-body px-lg-5 py-lg-5\">\n                        <div class=\"logo-box\">\n                            <img class=\"logo\" [src]=\"imgLogo\">\n                            <h6 class=\"h2 text-default mt-3 mb-0\">Register account</h6>\n                        </div>\n\n                        <form [formGroup]=\"registerForm\">\n                            <div class=\"form-group\" [ngClass]=\"{ focused: focusUsername === true }\">\n                                <div class=\"input-group input-group-alternative mb-3\">\n                                    <div class=\"input-group-prepend\">\n                                        <span class=\"input-group-text bg-primary\">\n                                            <i class=\"fas fa-envelope text-white\"></i>\n                                        </span>\n                                    </div>\n                                    <input \n                                        class=\"form-control\" \n                                        placeholder=\"Email\"\n                                        type=\"email\"\n                                        formControlName=\"username\"\n                                        (focus)=\"focusUsername = true\"\n                                        (blur)=\"focusUsername = false\"\n                                    />\n                                </div>\n                                <ng-container *ngFor=\"let message of registerFormMessages.username\">\n                                    <div *ngIf=\"registerForm.get('username').hasError(message.type) && (registerForm.get('username').dirty || registerForm.get('username').touched)\">\n                                        <p class=\"error-message\"><span>{{ message.message }}</span></p>\n                                    </div>\n                                </ng-container>\n                            </div>\n\n                            <div class=\"form-group\" [ngClass]=\"{ focused: focusPassword === true }\">\n                                <div class=\"input-group input-group-alternative mb-3\">\n                                    <div class=\"input-group-prepend\">\n                                        <span class=\"input-group-text bg-primary\">\n                                            <i class=\"fas fa-lock text-white\"></i>\n                                        </span>\n                                    </div>\n                                    <input \n                                        class=\"form-control\"\n                                        placeholder=\"Password\"\n                                        type=\"password\" \n                                        formControlName=\"password1\"\n                                        (focus)=\"focusPassword = true\"\n                                        (blur)=\"focusPassword = false\"\n                                    />\n                                </div>\n                                <ng-container *ngFor=\"let message of registerFormMessages.password1\">\n                                    <div *ngIf=\"registerForm.get('password1').hasError(message.type) && (registerForm.get('password1').dirty || registerForm.get('password1').touched)\">\n                                        <p class=\"error-message\"><span>{{ message.message }}</span></p>\n                                    </div>\n                                </ng-container>\n                            </div>\n\n                            <div class=\"form-group\" [ngClass]=\"{ focused: focusConfirmPassword === true }\">\n                                <div class=\"input-group input-group-alternative\">\n                                    <div class=\"input-group-prepend\">\n                                        <span class=\"input-group-text bg-primary\">\n                                            <i class=\"fas fa-lock text-white\"></i>\n                                        </span>\n                                    </div>\n                                    <input \n                                        class=\"form-control\"\n                                        placeholder=\"Confirm password\" \n                                        type=\"password\"\n                                        formControlName=\"password2\"\n                                        (focus)=\"focusConfirmPassword = true\"\n                                        (blur)=\"focusConfirmPassword = false\" \n                                    />\n                                </div>\n                                <ng-container *ngFor=\"let message of registerFormMessages.password2\">\n                                    <div *ngIf=\"registerForm.get('password2').hasError(message.type) && (registerForm.get('password2').dirty || registerForm.get('password2').touched)\">\n                                        <p class=\"error-message\"><span>{{ message.message }}</span></p>\n                                    </div>\n                                </ng-container>\n                            </div>\n                            <!--\n                            <div class=\"strength\">\n                                <ul class=\"strength-bar\">\n                                    <li class=\"point\" [style.background-color]=\"bar0\"></li>\n                                    <li class=\"point\" [style.background-color]=\"bar1\"></li>\n                                    <li class=\"point\" [style.background-color]=\"bar2\"></li>\n                                    <li class=\"point\" [style.background-color]=\"bar3\"></li>\n                                </ul>\n                            </div>\n                            -->\n                            <div class=\"text-muted font-italic\">\n                                <small>password strength:\n                                    <span class=\"text-success font-weight-700\">strong</span>\n                                </small>\n                            </div>\n\n                            <div class=\"row my-4\">\n                                <div class=\"col-12\">\n                                    <div class=\"custom-control custom-control-alternative custom-checkbox\">\n                                        <input class=\"custom-control-input\" id=\"customCheckRegister\" type=\"checkbox\" />\n                                        <label class=\"custom-control-label\" for=\"customCheckRegister\">\n                                            <span>I agree with the\n                                                <a href=\"javascript:void(0)\">Privacy Policy</a>\n                                            </span>\n                                        </label>\n                                    </div>\n                                </div>\n                            </div>\n                        </form>\n\n                        <div class=\"text-center\">\n                            <button type=\"button\" class=\"btn btn-primary mt-4 btn-block\" >\n                                Create account\n                            </button>\n                            <button type=\"button\" class=\"btn btn-icon btn-outline-primary btn-block my-2\"  (click)=\"navigatePage('login')\">\n                                <span class=\"btn-inner--icon\"><i class=\"fas fa-angle-left\"></i></span>\n                                <span class=\"btn-inner--text\">Login</span>\n                            </button>\n                        </div>\n                    </div>\n                </div>\n            </div>\n        </div>\n    </div>\n</div>");

/***/ }),

/***/ "./src/app/auth/auth.module.ts":
/*!*************************************!*\
  !*** ./src/app/auth/auth.module.ts ***!
  \*************************************/
/*! exports provided: AuthModule */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "AuthModule", function() { return AuthModule; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _components_components_module__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../components/components.module */ "./src/app/components/components.module.ts");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm5/core.js");
/* harmony import */ var _angular_common__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @angular/common */ "./node_modules/@angular/common/__ivy_ngcc__/fesm5/common.js");
/* harmony import */ var _angular_forms__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @angular/forms */ "./node_modules/@angular/forms/__ivy_ngcc__/fesm5/forms.js");
/* harmony import */ var ngx_bootstrap__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ngx-bootstrap */ "./node_modules/ngx-bootstrap/__ivy_ngcc__/esm5/ngx-bootstrap.js");
/* harmony import */ var _ngx_loading_bar_core__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @ngx-loading-bar/core */ "./node_modules/@ngx-loading-bar/core/__ivy_ngcc__/fesm5/ngx-loading-bar-core.js");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/__ivy_ngcc__/fesm5/router.js");
/* harmony import */ var _auth_routing__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./auth.routing */ "./src/app/auth/auth.routing.ts");
/* harmony import */ var _login_login_component__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./login/login.component */ "./src/app/auth/login/login.component.ts");
/* harmony import */ var _register_register_component__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./register/register.component */ "./src/app/auth/register/register.component.ts");
/* harmony import */ var _forgot_forgot_component__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ./forgot/forgot.component */ "./src/app/auth/forgot/forgot.component.ts");












var AuthModule = /** @class */ (function () {
    function AuthModule() {
    }
    AuthModule = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["NgModule"])({
            declarations: [
                _login_login_component__WEBPACK_IMPORTED_MODULE_9__["LoginComponent"],
                _register_register_component__WEBPACK_IMPORTED_MODULE_10__["RegisterComponent"],
                _forgot_forgot_component__WEBPACK_IMPORTED_MODULE_11__["ForgotComponent"]
            ],
            imports: [
                _angular_common__WEBPACK_IMPORTED_MODULE_3__["CommonModule"],
                _angular_forms__WEBPACK_IMPORTED_MODULE_4__["FormsModule"],
                _angular_forms__WEBPACK_IMPORTED_MODULE_4__["ReactiveFormsModule"],
                ngx_bootstrap__WEBPACK_IMPORTED_MODULE_5__["BsDropdownModule"].forRoot(),
                ngx_bootstrap__WEBPACK_IMPORTED_MODULE_5__["ProgressbarModule"].forRoot(),
                ngx_bootstrap__WEBPACK_IMPORTED_MODULE_5__["TooltipModule"].forRoot(),
                _ngx_loading_bar_core__WEBPACK_IMPORTED_MODULE_6__["LoadingBarModule"],
                _angular_router__WEBPACK_IMPORTED_MODULE_7__["RouterModule"].forChild(_auth_routing__WEBPACK_IMPORTED_MODULE_8__["AuthRoutes"]),
                _components_components_module__WEBPACK_IMPORTED_MODULE_1__["ComponentsModule"],
                ngx_bootstrap__WEBPACK_IMPORTED_MODULE_5__["ModalModule"].forRoot(),
            ]
        })
    ], AuthModule);
    return AuthModule;
}());



/***/ }),

/***/ "./src/app/auth/auth.routing.ts":
/*!**************************************!*\
  !*** ./src/app/auth/auth.routing.ts ***!
  \**************************************/
/*! exports provided: AuthRoutes */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "AuthRoutes", function() { return AuthRoutes; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _forgot_forgot_component__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./forgot/forgot.component */ "./src/app/auth/forgot/forgot.component.ts");
/* harmony import */ var _login_login_component__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./login/login.component */ "./src/app/auth/login/login.component.ts");
/* harmony import */ var _register_register_component__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./register/register.component */ "./src/app/auth/register/register.component.ts");




var AuthRoutes = [
    {
        path: '',
        children: [
            {
                path: 'forgot',
                component: _forgot_forgot_component__WEBPACK_IMPORTED_MODULE_1__["ForgotComponent"]
            },
            {
                path: 'login',
                component: _login_login_component__WEBPACK_IMPORTED_MODULE_2__["LoginComponent"]
            },
            {
                path: 'register',
                component: _register_register_component__WEBPACK_IMPORTED_MODULE_3__["RegisterComponent"]
            }
        ]
    }
];


/***/ }),

/***/ "./src/app/auth/forgot/forgot.component.scss":
/*!***************************************************!*\
  !*** ./src/app/auth/forgot/forgot.component.scss ***!
  \***************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (".logo-box {\n  text-align: center;\n  margin-bottom: 2rem;\n}\n.logo-box .logo {\n  max-height: 9rem;\n}\n.auth-content {\n  background-image: url('mygeo-background.jpg');\n  background-repeat: no-repeat;\n  background-size: cover;\n  height: 100vh;\n  overflow: hidden;\n}\n.error-message {\n  color: #f5365c;\n  text-align: right;\n  font-size: 0.8em;\n  padding-top: 5px;\n  padding-bottom: 0;\n  margin-bottom: 0;\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIi9BcHBsaWNhdGlvbnMvTUFNUC9odGRvY3MvYWZpcWZlL3dlYi9zcmMvYXBwL2F1dGgvZm9yZ290L2ZvcmdvdC5jb21wb25lbnQuc2NzcyIsInNyYy9hcHAvYXV0aC9mb3Jnb3QvZm9yZ290LmNvbXBvbmVudC5zY3NzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBO0VBQ0ksa0JBQUE7RUFDQSxtQkFBQTtBQ0NKO0FEQUk7RUFDSSxnQkFBQTtBQ0VSO0FERUE7RUFFSSw2Q0FBQTtFQUNBLDRCQUFBO0VBSUEsc0JBQUE7RUFDQSxhQUFBO0VBQ0EsZ0JBQUE7QUNBSjtBREdBO0VBQ0ksY0FBQTtFQUNBLGlCQUFBO0VBQ0EsZ0JBQUE7RUFDQSxnQkFBQTtFQUNBLGlCQUFBO0VBQ0EsZ0JBQUE7QUNBSiIsImZpbGUiOiJzcmMvYXBwL2F1dGgvZm9yZ290L2ZvcmdvdC5jb21wb25lbnQuc2NzcyIsInNvdXJjZXNDb250ZW50IjpbIi5sb2dvLWJveCB7XG4gICAgdGV4dC1hbGlnbjogY2VudGVyO1xuICAgIG1hcmdpbi1ib3R0b206IDJyZW07XG4gICAgLmxvZ28ge1xuICAgICAgICBtYXgtaGVpZ2h0OiA5cmVtO1xuICAgIH1cbn1cblxuLmF1dGgtY29udGVudCB7XG4gICAgLy9iYWNrZ3JvdW5kLWNvbG9yOiAjMTcyYjRkO1xuICAgIGJhY2tncm91bmQtaW1hZ2U6IHVybCgnc3JjL2Fzc2V0cy9pbWcvdGhlbWUvbXlnZW8tYmFja2dyb3VuZC5qcGcnKTtcbiAgICBiYWNrZ3JvdW5kLXJlcGVhdDogbm8tcmVwZWF0O1xuICAgIC13ZWJraXQtYmFja2dyb3VuZC1zaXplOiBjb3ZlcjtcbiAgICAtbW96LWJhY2tncm91bmQtc2l6ZTogY292ZXI7XG4gICAgLW8tYmFja2dyb3VuZC1zaXplOiBjb3ZlcjtcbiAgICBiYWNrZ3JvdW5kLXNpemU6IGNvdmVyO1xuICAgIGhlaWdodDogMTAwdmg7XG4gICAgb3ZlcmZsb3c6IGhpZGRlbjtcbn1cblxuLmVycm9yLW1lc3NhZ2Uge1xuICAgIGNvbG9yOiAjZjUzNjVjO1xuICAgIHRleHQtYWxpZ246IHJpZ2h0O1xuICAgIGZvbnQtc2l6ZTogMC44ZW07XG4gICAgcGFkZGluZy10b3A6IDVweDtcbiAgICBwYWRkaW5nLWJvdHRvbTogMDtcbiAgICBtYXJnaW4tYm90dG9tOiAwO1xufSIsIi5sb2dvLWJveCB7XG4gIHRleHQtYWxpZ246IGNlbnRlcjtcbiAgbWFyZ2luLWJvdHRvbTogMnJlbTtcbn1cbi5sb2dvLWJveCAubG9nbyB7XG4gIG1heC1oZWlnaHQ6IDlyZW07XG59XG5cbi5hdXRoLWNvbnRlbnQge1xuICBiYWNrZ3JvdW5kLWltYWdlOiB1cmwoXCJzcmMvYXNzZXRzL2ltZy90aGVtZS9teWdlby1iYWNrZ3JvdW5kLmpwZ1wiKTtcbiAgYmFja2dyb3VuZC1yZXBlYXQ6IG5vLXJlcGVhdDtcbiAgLXdlYmtpdC1iYWNrZ3JvdW5kLXNpemU6IGNvdmVyO1xuICAtbW96LWJhY2tncm91bmQtc2l6ZTogY292ZXI7XG4gIC1vLWJhY2tncm91bmQtc2l6ZTogY292ZXI7XG4gIGJhY2tncm91bmQtc2l6ZTogY292ZXI7XG4gIGhlaWdodDogMTAwdmg7XG4gIG92ZXJmbG93OiBoaWRkZW47XG59XG5cbi5lcnJvci1tZXNzYWdlIHtcbiAgY29sb3I6ICNmNTM2NWM7XG4gIHRleHQtYWxpZ246IHJpZ2h0O1xuICBmb250LXNpemU6IDAuOGVtO1xuICBwYWRkaW5nLXRvcDogNXB4O1xuICBwYWRkaW5nLWJvdHRvbTogMDtcbiAgbWFyZ2luLWJvdHRvbTogMDtcbn0iXX0= */");

/***/ }),

/***/ "./src/app/auth/forgot/forgot.component.ts":
/*!*************************************************!*\
  !*** ./src/app/auth/forgot/forgot.component.ts ***!
  \*************************************************/
/*! exports provided: ForgotComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ForgotComponent", function() { return ForgotComponent; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm5/core.js");
/* harmony import */ var _angular_forms__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/forms */ "./node_modules/@angular/forms/__ivy_ngcc__/fesm5/forms.js");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/__ivy_ngcc__/fesm5/router.js");
/* harmony import */ var src_app_shared_services_auth_auth_service__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! src/app/shared/services/auth/auth.service */ "./src/app/shared/services/auth/auth.service.ts");
/* harmony import */ var _ngx_loading_bar_core__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @ngx-loading-bar/core */ "./node_modules/@ngx-loading-bar/core/__ivy_ngcc__/fesm5/ngx-loading-bar-core.js");
/* harmony import */ var src_app_shared_handler_notify_notify_service__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! src/app/shared/handler/notify/notify.service */ "./src/app/shared/handler/notify/notify.service.ts");







var ForgotComponent = /** @class */ (function () {
    function ForgotComponent(authService, notifyService, formBuilder, loadingBar, router) {
        this.authService = authService;
        this.notifyService = notifyService;
        this.formBuilder = formBuilder;
        this.loadingBar = loadingBar;
        this.router = router;
        // Image
        this.imgLogo = 'assets/img/logo/mygeo-logo.png';
        this.resetFormMessages = {
            'email': [
                { type: 'email', message: 'Sila masukkan emel yang sah' }
            ]
        };
    }
    ForgotComponent.prototype.ngOnInit = function () {
        this.resetForm = this.formBuilder.group({
            email: new _angular_forms__WEBPACK_IMPORTED_MODULE_2__["FormControl"]('', _angular_forms__WEBPACK_IMPORTED_MODULE_2__["Validators"].compose([
                _angular_forms__WEBPACK_IMPORTED_MODULE_2__["Validators"].required,
                _angular_forms__WEBPACK_IMPORTED_MODULE_2__["Validators"].email
            ]))
        });
    };
    ForgotComponent.prototype.reset = function () {
        this.loadingBar.start();
        this.loadingBar.complete();
        this.successMessage();
        this.resetForm.reset();
    };
    ForgotComponent.prototype.navigatePage = function (path) {
        if (path == 'login') {
            return this.router.navigate(['/auth/login']);
        }
    };
    ForgotComponent.prototype.successMessage = function () {
        var title = 'Pautan set semula kata laluan telah dihantar ke emel anda!';
        var message = 'Berjaya';
        this.notifyService.openToastr(title, message);
    };
    ForgotComponent.ctorParameters = function () { return [
        { type: src_app_shared_services_auth_auth_service__WEBPACK_IMPORTED_MODULE_4__["AuthService"] },
        { type: src_app_shared_handler_notify_notify_service__WEBPACK_IMPORTED_MODULE_6__["NotifyService"] },
        { type: _angular_forms__WEBPACK_IMPORTED_MODULE_2__["FormBuilder"] },
        { type: _ngx_loading_bar_core__WEBPACK_IMPORTED_MODULE_5__["LoadingBarService"] },
        { type: _angular_router__WEBPACK_IMPORTED_MODULE_3__["Router"] }
    ]; };
    ForgotComponent = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"])({
            selector: 'app-forgot',
            template: Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! raw-loader!./forgot.component.html */ "./node_modules/raw-loader/dist/cjs.js!./src/app/auth/forgot/forgot.component.html")).default,
            styles: [Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! ./forgot.component.scss */ "./src/app/auth/forgot/forgot.component.scss")).default]
        }),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"])("design:paramtypes", [src_app_shared_services_auth_auth_service__WEBPACK_IMPORTED_MODULE_4__["AuthService"],
            src_app_shared_handler_notify_notify_service__WEBPACK_IMPORTED_MODULE_6__["NotifyService"],
            _angular_forms__WEBPACK_IMPORTED_MODULE_2__["FormBuilder"],
            _ngx_loading_bar_core__WEBPACK_IMPORTED_MODULE_5__["LoadingBarService"],
            _angular_router__WEBPACK_IMPORTED_MODULE_3__["Router"]])
    ], ForgotComponent);
    return ForgotComponent;
}());



/***/ }),

/***/ "./src/app/auth/login/login.component.scss":
/*!*************************************************!*\
  !*** ./src/app/auth/login/login.component.scss ***!
  \*************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("a {\n  text-decoration: none;\n  color: black;\n  background-color: transparent;\n  -webkit-text-decoration-skip: objects;\n}\n\na:hover {\n  text-decoration: none;\n  color: #414141;\n}\n\na:not([href]):not([tabindex]) {\n  text-decoration: none;\n  color: inherit;\n}\n\na:not([href]):not([tabindex]):hover,\na:not([href]):not([tabindex]):focus {\n  text-decoration: none;\n  color: inherit;\n}\n\na:not([href]):not([tabindex]):focus {\n  outline: 0;\n}\n\n.navbar-dark .navbar-nav .nav-link {\n  color: rgba(0, 0, 0, 0.95);\n}\n\n.navbar-dark .navbar-nav .nav-link:hover,\n.navbar-dark .navbar-nav .nav-link:focus {\n  color: rgba(65, 65, 65, 0.65);\n}\n\n.navbar-dark .navbar-nav .nav-link.disabled {\n  color: rgba(255, 255, 255, 0.25);\n}\n\n.navbar-dark .navbar-nav .show > .nav-link,\n.navbar-dark .navbar-nav .active > .nav-link,\n.navbar-dark .navbar-nav .nav-link.show,\n.navbar-dark .navbar-nav .nav-link.active {\n  color: rgba(255, 255, 255, 0.65);\n}\n\n.navbar {\n  position: relative;\n  display: -webkit-box;\n  display: flex;\n  padding: 0.5rem 0.5rem;\n  flex-wrap: wrap;\n  -webkit-box-align: center;\n          align-items: center;\n  -webkit-box-pack: justify;\n          justify-content: space-between;\n}\n\n.fixed-top {\n  position: fixed;\n  z-index: 1030;\n  top: 0;\n  right: 0;\n  left: 0;\n}\n\n.square {\n  width: 100px;\n  height: 100px;\n}\n\n.auto {\n  cursor: auto;\n}\n\n.default {\n  cursor: default;\n}\n\n.none {\n  cursor: none;\n}\n\n.context-menu {\n  cursor: context-menu;\n}\n\n.help {\n  cursor: help;\n}\n\n.pointer {\n  cursor: pointer;\n}\n\n.progress {\n  cursor: progress;\n}\n\n.wait {\n  cursor: wait;\n}\n\n.cell {\n  cursor: cell;\n}\n\n.crosshair {\n  cursor: crosshair;\n}\n\n.text {\n  cursor: text;\n}\n\n.vertical-text {\n  cursor: vertical-text;\n}\n\n.alias {\n  cursor: alias;\n}\n\n.copy {\n  cursor: copy;\n}\n\n.move {\n  cursor: move;\n}\n\n.no-drop {\n  cursor: no-drop;\n}\n\n.not-allowed {\n  cursor: not-allowed;\n}\n\n.all-scroll {\n  cursor: all-scroll;\n}\n\n.col-resize {\n  cursor: col-resize;\n}\n\n.row-resize {\n  cursor: row-resize;\n}\n\n.n-resize {\n  cursor: n-resize;\n}\n\n.e-resize {\n  cursor: e-resize;\n}\n\n.s-resize {\n  cursor: s-resize;\n}\n\n.w-resize {\n  cursor: w-resize;\n}\n\n.ns-resize {\n  cursor: ns-resize;\n}\n\n.ew-resize {\n  cursor: ew-resize;\n}\n\n.ne-resize {\n  cursor: ne-resize;\n}\n\n.nw-resize {\n  cursor: nw-resize;\n}\n\n.se-resize {\n  cursor: se-resize;\n}\n\n.sw-resize {\n  cursor: sw-resize;\n}\n\n.nesw-resize {\n  cursor: nesw-resize;\n}\n\n.nwse-resize {\n  cursor: nwse-resize;\n}\n\n.bcard:hover {\n  background-color: #6bcffd;\n  box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);\n}\n\n.rcard:hover {\n  background-color: #fd6b6b;\n  box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);\n}\n\n.gcard:hover {\n  background-color: #7cfd6b;\n  box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);\n}\n\n.scroll {\n  max-height: 480px;\n  overflow-y: scroll;\n}\n\n/* Hide scrollbar for Chrome, Safari and Opera */\n\n.scroll::-webkit-scrollbar {\n  display: none;\n}\n\n/* Hide scrollbar for IE, Edge and Firefox */\n\n.scroll {\n  -ms-overflow-style: none;\n  /* IE and Edge */\n  scrollbar-width: none;\n  /* Firefox */\n}\n\n.card-header {\n  margin-top: 0;\n  padding: 1.25rem 1.5rem;\n  border-bottom: 1px solid rgba(255, 255, 255, 0);\n  background-color: #fff0;\n}\n\n.card {\n  border-radius: 25px;\n  background-color: #eba70d;\n}\n\n.card-body {\n  font-size: 90%;\n}\n\n.card-footer {\n  padding: 1.25rem 1.5rem;\n  height: 80px;\n  border-top: 0px solid rgba(255, 255, 255, 0);\n  background-color: #fff0;\n}\n\n.navbar {\n  display: -webkit-box;\n  display: flex;\n  padding: 0;\n  flex-wrap: wrap;\n  -webkit-box-align: center;\n          align-items: center;\n  -webkit-box-pack: justify;\n          justify-content: space-between;\n}\n\n.navbar-dark .navbar-toggler-icon {\n  background-image: url(\"data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(0, 0, 0, 0.5)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E\");\n}\n\n.footer {\n  position: absolute;\n  left: 0;\n  right: 0;\n  bottom: 0;\n  padding: 1rem;\n}\n\n.text-bold {\n  font-weight: 600;\n}\n\n.bgg {\n  background-image: url('mygeo-background.jpg');\n  height: 100%;\n  background-position: center;\n  background-repeat: no-repeat;\n  background-size: cover;\n}\n\n.modal-content {\n  max-width: 500px;\n}\n\n.error-message {\n  color: #f5365c;\n  text-align: right;\n  font-size: 0.8em;\n  padding-top: 5px;\n  padding-bottom: 0;\n  margin-bottom: 0;\n}\n\n.fancy_card {\n  box-shadow: 8px 14px 38px rgba(39, 44, 49, 0.06), 1px 3px 8px rgba(39, 44, 49, 0.03);\n  -webkit-transition: all 0.7s ease;\n  transition: all 0.7s ease;\n  /* back to normal */\n  color: transparent;\n  text-transform: uppercase;\n  background-image: -webkit-gradient(linear, left top, right top, from(#ebba16), to(#ed8a19));\n  background-image: linear-gradient(to right, #ebba16, #ed8a19);\n}\n\n.fancy_card:hover {\n  box-shadow: 8px 28px 50px rgba(39, 44, 49, 0.07), 1px 6px 12px rgba(39, 44, 49, 0.04);\n  -webkit-transition: all 0.4s ease;\n  transition: all 0.4s ease;\n  /* zoom in */\n  -webkit-transform: translate3D(0, -1px, 0) scale(1.2);\n          transform: translate3D(0, -1px, 0) scale(1.2);\n  font-size: 110%;\n  color: #ffffff;\n  background-image: -webkit-gradient(linear, left top, right top, from(#ebc64c), to(#e4a053));\n  background-image: linear-gradient(to right, #ebc64c, #e4a053);\n}\n\n.badge-custom {\n  color: #303030;\n  background-image: -webkit-gradient(linear, left top, right top, from(#ebba16), to(#ed8a19));\n  background-image: linear-gradient(to right, #ebba16, #ed8a19);\n  font-size: 80%;\n  padding: 0.75rem 1.05rem;\n}\n\n.badge-custom[href]:hover,\n.badge-custom[href]:focus {\n  text-decoration: none;\n  color: #fff;\n  background-color: #fa3a0e;\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIi9BcHBsaWNhdGlvbnMvTUFNUC9odGRvY3MvYWZpcWZlL3dlYi9zcmMvYXBwL2F1dGgvbG9naW4vbG9naW4uY29tcG9uZW50LnNjc3MiLCJzcmMvYXBwL2F1dGgvbG9naW4vbG9naW4uY29tcG9uZW50LnNjc3MiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7RUFDSSxxQkFBQTtFQUVBLFlBQUE7RUFDQSw2QkFBQTtFQUVBLHFDQUFBO0FDREo7O0FESUE7RUFDSSxxQkFBQTtFQUVBLGNBQUE7QUNGSjs7QURLQTtFQUNJLHFCQUFBO0VBRUEsY0FBQTtBQ0hKOztBRE1BOztFQUVJLHFCQUFBO0VBRUEsY0FBQTtBQ0pKOztBRE9BO0VBQ0ksVUFBQTtBQ0pKOztBRE9BO0VBQ0ksMEJBQUE7QUNKSjs7QURPQTs7RUFFSSw2QkFBQTtBQ0pKOztBRE9BO0VBQ0ksZ0NBQUE7QUNKSjs7QURPQTs7OztFQUlJLGdDQUFBO0FDSko7O0FET0E7RUFDSSxrQkFBQTtFQUVBLG9CQUFBO0VBQUEsYUFBQTtFQUVBLHNCQUFBO0VBRUEsZUFBQTtFQUNBLHlCQUFBO1VBQUEsbUJBQUE7RUFDQSx5QkFBQTtVQUFBLDhCQUFBO0FDUEo7O0FEVUE7RUFDSSxlQUFBO0VBQ0EsYUFBQTtFQUNBLE1BQUE7RUFDQSxRQUFBO0VBQ0EsT0FBQTtBQ1BKOztBRFVBO0VBQ0ksWUFBQTtFQUNBLGFBQUE7QUNQSjs7QURVQTtFQUNJLFlBQUE7QUNQSjs7QURVQTtFQUNJLGVBQUE7QUNQSjs7QURVQTtFQUNJLFlBQUE7QUNQSjs7QURVQTtFQUNJLG9CQUFBO0FDUEo7O0FEVUE7RUFDSSxZQUFBO0FDUEo7O0FEVUE7RUFDSSxlQUFBO0FDUEo7O0FEVUE7RUFDSSxnQkFBQTtBQ1BKOztBRFVBO0VBQ0ksWUFBQTtBQ1BKOztBRFVBO0VBQ0ksWUFBQTtBQ1BKOztBRFVBO0VBQ0ksaUJBQUE7QUNQSjs7QURVQTtFQUNJLFlBQUE7QUNQSjs7QURVQTtFQUNJLHFCQUFBO0FDUEo7O0FEVUE7RUFDSSxhQUFBO0FDUEo7O0FEVUE7RUFDSSxZQUFBO0FDUEo7O0FEVUE7RUFDSSxZQUFBO0FDUEo7O0FEVUE7RUFDSSxlQUFBO0FDUEo7O0FEVUE7RUFDSSxtQkFBQTtBQ1BKOztBRFVBO0VBQ0ksa0JBQUE7QUNQSjs7QURVQTtFQUNJLGtCQUFBO0FDUEo7O0FEVUE7RUFDSSxrQkFBQTtBQ1BKOztBRFVBO0VBQ0ksZ0JBQUE7QUNQSjs7QURVQTtFQUNJLGdCQUFBO0FDUEo7O0FEVUE7RUFDSSxnQkFBQTtBQ1BKOztBRFVBO0VBQ0ksZ0JBQUE7QUNQSjs7QURVQTtFQUNJLGlCQUFBO0FDUEo7O0FEVUE7RUFDSSxpQkFBQTtBQ1BKOztBRFVBO0VBQ0ksaUJBQUE7QUNQSjs7QURVQTtFQUNJLGlCQUFBO0FDUEo7O0FEVUE7RUFDSSxpQkFBQTtBQ1BKOztBRFVBO0VBQ0ksaUJBQUE7QUNQSjs7QURVQTtFQUNJLG1CQUFBO0FDUEo7O0FEVUE7RUFDSSxtQkFBQTtBQ1BKOztBRFVBO0VBQ0kseUJBQUE7RUFDQSwyQ0FBQTtBQ1BKOztBRFVBO0VBQ0kseUJBQUE7RUFDQSwyQ0FBQTtBQ1BKOztBRFVBO0VBQ0kseUJBQUE7RUFDQSwyQ0FBQTtBQ1BKOztBRFVBO0VBQ0ksaUJBQUE7RUFDQSxrQkFBQTtBQ1BKOztBRFVBLGdEQUFBOztBQUNBO0VBQ0ksYUFBQTtBQ1BKOztBRFVBLDRDQUFBOztBQUNBO0VBQ0ksd0JBQUE7RUFDQSxnQkFBQTtFQUNBLHFCQUFBO0VBQ0EsWUFBQTtBQ1BKOztBRFVBO0VBQ0ksYUFBQTtFQUNBLHVCQUFBO0VBRUEsK0NBQUE7RUFDQSx1QkFBQTtBQ1JKOztBRFdBO0VBQ0ksbUJBQUE7RUFDQSx5QkFBQTtBQ1JKOztBRFdBO0VBQ0ksY0FBQTtBQ1JKOztBRFlBO0VBQ0ksdUJBQUE7RUFDQSxZQUFBO0VBQ0EsNENBQUE7RUFDQSx1QkFBQTtBQ1RKOztBRFlBO0VBR0ksb0JBQUE7RUFBQSxhQUFBO0VBRUEsVUFBQTtFQUVBLGVBQUE7RUFDQSx5QkFBQTtVQUFBLG1CQUFBO0VBQ0EseUJBQUE7VUFBQSw4QkFBQTtBQ2JKOztBRGdCQTtFQUNJLHFRQUNJO0FDZFI7O0FEa0JBO0VBQ0ksa0JBQUE7RUFDQSxPQUFBO0VBQ0EsUUFBQTtFQUNBLFNBQUE7RUFDQSxhQUFBO0FDZko7O0FEa0JBO0VBQ0ksZ0JBQUE7QUNmSjs7QURrQkE7RUFDSSw2Q0FBQTtFQUNBLFlBQUE7RUFDQSwyQkFBQTtFQUNBLDRCQUFBO0VBQ0Esc0JBQUE7QUNmSjs7QURrQkE7RUFDSSxnQkFBQTtBQ2ZKOztBRGtCQTtFQUNJLGNBQUE7RUFDQSxpQkFBQTtFQUNBLGdCQUFBO0VBQ0EsZ0JBQUE7RUFDQSxpQkFBQTtFQUNBLGdCQUFBO0FDZko7O0FEa0JBO0VBQ0ksb0ZBQUE7RUFDQSxpQ0FBQTtFQUFBLHlCQUFBO0VBQ0EsbUJBQUE7RUFDQSxrQkFBQTtFQUNBLHlCQUFBO0VBQ0EsMkZBQUE7RUFBQSw2REFBQTtBQ2ZKOztBRGtCQTtFQUNJLHFGQUFBO0VBQ0EsaUNBQUE7RUFBQSx5QkFBQTtFQUNBLFlBQUE7RUFDQSxxREFBQTtVQUFBLDZDQUFBO0VBQ0EsZUFBQTtFQUNBLGNBQUE7RUFDQSwyRkFBQTtFQUFBLDZEQUFBO0FDZko7O0FEa0JBO0VBQ0ksY0FBQTtFQUNBLDJGQUFBO0VBQUEsNkRBQUE7RUFDQSxjQUFBO0VBQ0Esd0JBQUE7QUNmSjs7QURrQkE7O0VBRUkscUJBQUE7RUFFQSxXQUFBO0VBQ0EseUJBQUE7QUNoQkoiLCJmaWxlIjoic3JjL2FwcC9hdXRoL2xvZ2luL2xvZ2luLmNvbXBvbmVudC5zY3NzIiwic291cmNlc0NvbnRlbnQiOlsiYSB7XG4gICAgdGV4dC1kZWNvcmF0aW9uOiBub25lO1xuXG4gICAgY29sb3I6IGJsYWNrO1xuICAgIGJhY2tncm91bmQtY29sb3I6IHRyYW5zcGFyZW50O1xuXG4gICAgLXdlYmtpdC10ZXh0LWRlY29yYXRpb24tc2tpcDogb2JqZWN0cztcbn1cblxuYTpob3ZlciB7XG4gICAgdGV4dC1kZWNvcmF0aW9uOiBub25lO1xuXG4gICAgY29sb3I6IHJnYig2NSwgNjUsIDY1KTtcbn1cblxuYTpub3QoW2hyZWZdKTpub3QoW3RhYmluZGV4XSkge1xuICAgIHRleHQtZGVjb3JhdGlvbjogbm9uZTtcblxuICAgIGNvbG9yOiBpbmhlcml0O1xufVxuXG5hOm5vdChbaHJlZl0pOm5vdChbdGFiaW5kZXhdKTpob3ZlcixcbmE6bm90KFtocmVmXSk6bm90KFt0YWJpbmRleF0pOmZvY3VzIHtcbiAgICB0ZXh0LWRlY29yYXRpb246IG5vbmU7XG5cbiAgICBjb2xvcjogaW5oZXJpdDtcbn1cblxuYTpub3QoW2hyZWZdKTpub3QoW3RhYmluZGV4XSk6Zm9jdXMge1xuICAgIG91dGxpbmU6IDA7XG59XG5cbi5uYXZiYXItZGFyayAubmF2YmFyLW5hdiAubmF2LWxpbmsge1xuICAgIGNvbG9yOiByZ2JhKDAsIDAsIDAsIDAuOTUpO1xufVxuXG4ubmF2YmFyLWRhcmsgLm5hdmJhci1uYXYgLm5hdi1saW5rOmhvdmVyLFxuLm5hdmJhci1kYXJrIC5uYXZiYXItbmF2IC5uYXYtbGluazpmb2N1cyB7XG4gICAgY29sb3I6IHJnYmEoNjUsIDY1LCA2NSwgMC42NSk7XG59XG5cbi5uYXZiYXItZGFyayAubmF2YmFyLW5hdiAubmF2LWxpbmsuZGlzYWJsZWQge1xuICAgIGNvbG9yOiByZ2JhKDI1NSwgMjU1LCAyNTUsIC4yNSk7XG59XG5cbi5uYXZiYXItZGFyayAubmF2YmFyLW5hdiAuc2hvdz4ubmF2LWxpbmssXG4ubmF2YmFyLWRhcmsgLm5hdmJhci1uYXYgLmFjdGl2ZT4ubmF2LWxpbmssXG4ubmF2YmFyLWRhcmsgLm5hdmJhci1uYXYgLm5hdi1saW5rLnNob3csXG4ubmF2YmFyLWRhcmsgLm5hdmJhci1uYXYgLm5hdi1saW5rLmFjdGl2ZSB7XG4gICAgY29sb3I6IHJnYmEoMjU1LCAyNTUsIDI1NSwgLjY1KTtcbn1cblxuLm5hdmJhciB7XG4gICAgcG9zaXRpb246IHJlbGF0aXZlO1xuXG4gICAgZGlzcGxheTogZmxleDtcblxuICAgIHBhZGRpbmc6IC41cmVtIC41cmVtO1xuXG4gICAgZmxleC13cmFwOiB3cmFwO1xuICAgIGFsaWduLWl0ZW1zOiBjZW50ZXI7XG4gICAganVzdGlmeS1jb250ZW50OiBzcGFjZS1iZXR3ZWVuO1xufVxuXG4uZml4ZWQtdG9wIHtcbiAgICBwb3NpdGlvbjogZml4ZWQ7XG4gICAgei1pbmRleDogMTAzMDtcbiAgICB0b3A6IDA7XG4gICAgcmlnaHQ6IDA7XG4gICAgbGVmdDogMDtcbn1cblxuLnNxdWFyZSB7XG4gICAgd2lkdGg6IDEwMHB4O1xuICAgIGhlaWdodDogMTAwcHg7XG59XG5cbi5hdXRvIHtcbiAgICBjdXJzb3I6IGF1dG87XG59XG5cbi5kZWZhdWx0IHtcbiAgICBjdXJzb3I6IGRlZmF1bHQ7XG59XG5cbi5ub25lIHtcbiAgICBjdXJzb3I6IG5vbmU7XG59XG5cbi5jb250ZXh0LW1lbnUge1xuICAgIGN1cnNvcjogY29udGV4dC1tZW51O1xufVxuXG4uaGVscCB7XG4gICAgY3Vyc29yOiBoZWxwO1xufVxuXG4ucG9pbnRlciB7XG4gICAgY3Vyc29yOiBwb2ludGVyO1xufVxuXG4ucHJvZ3Jlc3Mge1xuICAgIGN1cnNvcjogcHJvZ3Jlc3M7XG59XG5cbi53YWl0IHtcbiAgICBjdXJzb3I6IHdhaXQ7XG59XG5cbi5jZWxsIHtcbiAgICBjdXJzb3I6IGNlbGw7XG59XG5cbi5jcm9zc2hhaXIge1xuICAgIGN1cnNvcjogY3Jvc3NoYWlyO1xufVxuXG4udGV4dCB7XG4gICAgY3Vyc29yOiB0ZXh0O1xufVxuXG4udmVydGljYWwtdGV4dCB7XG4gICAgY3Vyc29yOiB2ZXJ0aWNhbC10ZXh0O1xufVxuXG4uYWxpYXMge1xuICAgIGN1cnNvcjogYWxpYXM7XG59XG5cbi5jb3B5IHtcbiAgICBjdXJzb3I6IGNvcHk7XG59XG5cbi5tb3ZlIHtcbiAgICBjdXJzb3I6IG1vdmU7XG59XG5cbi5uby1kcm9wIHtcbiAgICBjdXJzb3I6IG5vLWRyb3A7XG59XG5cbi5ub3QtYWxsb3dlZCB7XG4gICAgY3Vyc29yOiBub3QtYWxsb3dlZDtcbn1cblxuLmFsbC1zY3JvbGwge1xuICAgIGN1cnNvcjogYWxsLXNjcm9sbDtcbn1cblxuLmNvbC1yZXNpemUge1xuICAgIGN1cnNvcjogY29sLXJlc2l6ZTtcbn1cblxuLnJvdy1yZXNpemUge1xuICAgIGN1cnNvcjogcm93LXJlc2l6ZTtcbn1cblxuLm4tcmVzaXplIHtcbiAgICBjdXJzb3I6IG4tcmVzaXplO1xufVxuXG4uZS1yZXNpemUge1xuICAgIGN1cnNvcjogZS1yZXNpemU7XG59XG5cbi5zLXJlc2l6ZSB7XG4gICAgY3Vyc29yOiBzLXJlc2l6ZTtcbn1cblxuLnctcmVzaXplIHtcbiAgICBjdXJzb3I6IHctcmVzaXplO1xufVxuXG4ubnMtcmVzaXplIHtcbiAgICBjdXJzb3I6IG5zLXJlc2l6ZTtcbn1cblxuLmV3LXJlc2l6ZSB7XG4gICAgY3Vyc29yOiBldy1yZXNpemU7XG59XG5cbi5uZS1yZXNpemUge1xuICAgIGN1cnNvcjogbmUtcmVzaXplO1xufVxuXG4ubnctcmVzaXplIHtcbiAgICBjdXJzb3I6IG53LXJlc2l6ZTtcbn1cblxuLnNlLXJlc2l6ZSB7XG4gICAgY3Vyc29yOiBzZS1yZXNpemU7XG59XG5cbi5zdy1yZXNpemUge1xuICAgIGN1cnNvcjogc3ctcmVzaXplO1xufVxuXG4ubmVzdy1yZXNpemUge1xuICAgIGN1cnNvcjogbmVzdy1yZXNpemU7XG59XG5cbi5ud3NlLXJlc2l6ZSB7XG4gICAgY3Vyc29yOiBud3NlLXJlc2l6ZTtcbn1cblxuLmJjYXJkOmhvdmVyIHtcbiAgICBiYWNrZ3JvdW5kLWNvbG9yOiAjNmJjZmZkO1xuICAgIGJveC1zaGFkb3c6IDAgOHB4IDE2cHggMCByZ2JhKDAsIDAsIDAsIDAuMik7XG59XG5cbi5yY2FyZDpob3ZlciB7XG4gICAgYmFja2dyb3VuZC1jb2xvcjogI2ZkNmI2YjtcbiAgICBib3gtc2hhZG93OiAwIDhweCAxNnB4IDAgcmdiYSgwLCAwLCAwLCAwLjIpO1xufVxuXG4uZ2NhcmQ6aG92ZXIge1xuICAgIGJhY2tncm91bmQtY29sb3I6ICM3Y2ZkNmI7XG4gICAgYm94LXNoYWRvdzogMCA4cHggMTZweCAwIHJnYmEoMCwgMCwgMCwgMC4yKTtcbn1cblxuLnNjcm9sbCB7XG4gICAgbWF4LWhlaWdodDogNDgwcHg7XG4gICAgb3ZlcmZsb3cteTogc2Nyb2xsO1xufVxuXG4vKiBIaWRlIHNjcm9sbGJhciBmb3IgQ2hyb21lLCBTYWZhcmkgYW5kIE9wZXJhICovXG4uc2Nyb2xsOjotd2Via2l0LXNjcm9sbGJhciB7XG4gICAgZGlzcGxheTogbm9uZTtcbn1cblxuLyogSGlkZSBzY3JvbGxiYXIgZm9yIElFLCBFZGdlIGFuZCBGaXJlZm94ICovXG4uc2Nyb2xsIHtcbiAgICAtbXMtb3ZlcmZsb3ctc3R5bGU6IG5vbmU7XG4gICAgLyogSUUgYW5kIEVkZ2UgKi9cbiAgICBzY3JvbGxiYXItd2lkdGg6IG5vbmU7XG4gICAgLyogRmlyZWZveCAqL1xufVxuXG4uY2FyZC1oZWFkZXIge1xuICAgIG1hcmdpbi10b3A6IDA7XG4gICAgcGFkZGluZzogMS4yNXJlbSAxLjVyZW07XG5cbiAgICBib3JkZXItYm90dG9tOiAxcHggc29saWQgcmdiYSgyNTUsIDI1NSwgMjU1LCAwKTtcbiAgICBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZmMDtcbn1cblxuLmNhcmQge1xuICAgIGJvcmRlci1yYWRpdXM6IDI1cHg7XG4gICAgYmFja2dyb3VuZC1jb2xvcjogI2ViYTcwZDtcbn1cblxuLmNhcmQtYm9keSB7XG4gICAgZm9udC1zaXplOiA5MCU7XG5cbn1cblxuLmNhcmQtZm9vdGVyIHtcbiAgICBwYWRkaW5nOiAxLjI1cmVtIDEuNXJlbTtcbiAgICBoZWlnaHQ6IDgwcHg7XG4gICAgYm9yZGVyLXRvcDogMHB4IHNvbGlkIHJnYmEoMjU1LCAyNTUsIDI1NSwgMCk7XG4gICAgYmFja2dyb3VuZC1jb2xvcjogI2ZmZjA7XG59XG5cbi5uYXZiYXIge1xuXG5cbiAgICBkaXNwbGF5OiBmbGV4O1xuXG4gICAgcGFkZGluZzogMDtcblxuICAgIGZsZXgtd3JhcDogd3JhcDtcbiAgICBhbGlnbi1pdGVtczogY2VudGVyO1xuICAgIGp1c3RpZnktY29udGVudDogc3BhY2UtYmV0d2Vlbjtcbn1cblxuLm5hdmJhci1kYXJrIC5uYXZiYXItdG9nZ2xlci1pY29uIHtcbiAgICBiYWNrZ3JvdW5kLWltYWdlOlxuICAgICAgICB1cmwoXCJkYXRhOmltYWdlL3N2Zyt4bWw7Y2hhcnNldD11dGY4LCUzQ3N2ZyB2aWV3Qm94PScwIDAgMzAgMzAnIHhtbG5zPSdodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyclM0UlM0NwYXRoIHN0cm9rZT0ncmdiYSgwLCAwLCAwLCAwLjUpJyBzdHJva2Utd2lkdGg9JzInIHN0cm9rZS1saW5lY2FwPSdyb3VuZCcgc3Ryb2tlLW1pdGVybGltaXQ9JzEwJyBkPSdNNCA3aDIyTTQgMTVoMjJNNCAyM2gyMicvJTNFJTNDL3N2ZyUzRVwiKVxufVxuXG5cbi5mb290ZXIge1xuICAgIHBvc2l0aW9uOiBhYnNvbHV0ZTtcbiAgICBsZWZ0OiAwO1xuICAgIHJpZ2h0OiAwO1xuICAgIGJvdHRvbTogMDtcbiAgICBwYWRkaW5nOiAxcmVtO1xufVxuXG4udGV4dC1ib2xkIHtcbiAgICBmb250LXdlaWdodDogNjAwO1xufVxuXG4uYmdnIHtcbiAgICBiYWNrZ3JvdW5kLWltYWdlOiB1cmwoJ3NyYy9hc3NldHMvaW1nL3RoZW1lL215Z2VvLWJhY2tncm91bmQuanBnJyk7XG4gICAgaGVpZ2h0OiAxMDAlO1xuICAgIGJhY2tncm91bmQtcG9zaXRpb246IGNlbnRlcjtcbiAgICBiYWNrZ3JvdW5kLXJlcGVhdDogbm8tcmVwZWF0O1xuICAgIGJhY2tncm91bmQtc2l6ZTogY292ZXI7XG59XG5cbi5tb2RhbC1jb250ZW50IHtcbiAgICBtYXgtd2lkdGg6IDUwMHB4O1xufVxuXG4uZXJyb3ItbWVzc2FnZSB7XG4gICAgY29sb3I6ICNmNTM2NWM7XG4gICAgdGV4dC1hbGlnbjogcmlnaHQ7XG4gICAgZm9udC1zaXplOiAwLjhlbTtcbiAgICBwYWRkaW5nLXRvcDogNXB4O1xuICAgIHBhZGRpbmctYm90dG9tOiAwO1xuICAgIG1hcmdpbi1ib3R0b206IDA7XG59XG5cbi5mYW5jeV9jYXJkIHtcbiAgICBib3gtc2hhZG93OiA4cHggMTRweCAzOHB4IHJnYmEoMzksIDQ0LCA0OSwgLjA2KSwgMXB4IDNweCA4cHggcmdiYSgzOSwgNDQsIDQ5LCAuMDMpO1xuICAgIHRyYW5zaXRpb246IGFsbCAuN3MgZWFzZTtcbiAgICAvKiBiYWNrIHRvIG5vcm1hbCAqL1xuICAgIGNvbG9yOiB0cmFuc3BhcmVudDtcbiAgICB0ZXh0LXRyYW5zZm9ybTogdXBwZXJjYXNlO1xuICAgIGJhY2tncm91bmQtaW1hZ2U6IGxpbmVhci1ncmFkaWVudCh0byByaWdodCwgI2ViYmExNiwgI2VkOGExOSk7XG59XG5cbi5mYW5jeV9jYXJkOmhvdmVyIHtcbiAgICBib3gtc2hhZG93OiA4cHggMjhweCA1MHB4IHJnYmEoMzksIDQ0LCA0OSwgLjA3KSwgMXB4IDZweCAxMnB4IHJnYmEoMzksIDQ0LCA0OSwgLjA0KTtcbiAgICB0cmFuc2l0aW9uOiBhbGwgLjRzIGVhc2U7XG4gICAgLyogem9vbSBpbiAqL1xuICAgIHRyYW5zZm9ybTogdHJhbnNsYXRlM0QoMCwgLTFweCwgMCkgc2NhbGUoMS4yKTtcbiAgICBmb250LXNpemU6IDExMCU7XG4gICAgY29sb3I6ICNmZmZmZmY7XG4gICAgYmFja2dyb3VuZC1pbWFnZTogbGluZWFyLWdyYWRpZW50KHRvIHJpZ2h0LCAjZWJjNjRjLCAjZTRhMDUzKTtcbn1cblxuLmJhZGdlLWN1c3RvbSB7XG4gICAgY29sb3I6ICMzMDMwMzA7XG4gICAgYmFja2dyb3VuZC1pbWFnZTogbGluZWFyLWdyYWRpZW50KHRvIHJpZ2h0LCAjZWJiYTE2LCAjZWQ4YTE5KTtcbiAgICBmb250LXNpemU6IDgwJTtcbiAgICBwYWRkaW5nOiAuNzVyZW0gMS4wNXJlbTtcbn1cblxuLmJhZGdlLWN1c3RvbVtocmVmXTpob3Zlcixcbi5iYWRnZS1jdXN0b21baHJlZl06Zm9jdXMge1xuICAgIHRleHQtZGVjb3JhdGlvbjogbm9uZTtcblxuICAgIGNvbG9yOiAjZmZmO1xuICAgIGJhY2tncm91bmQtY29sb3I6ICNmYTNhMGU7XG59XG4iLCJhIHtcbiAgdGV4dC1kZWNvcmF0aW9uOiBub25lO1xuICBjb2xvcjogYmxhY2s7XG4gIGJhY2tncm91bmQtY29sb3I6IHRyYW5zcGFyZW50O1xuICAtd2Via2l0LXRleHQtZGVjb3JhdGlvbi1za2lwOiBvYmplY3RzO1xufVxuXG5hOmhvdmVyIHtcbiAgdGV4dC1kZWNvcmF0aW9uOiBub25lO1xuICBjb2xvcjogIzQxNDE0MTtcbn1cblxuYTpub3QoW2hyZWZdKTpub3QoW3RhYmluZGV4XSkge1xuICB0ZXh0LWRlY29yYXRpb246IG5vbmU7XG4gIGNvbG9yOiBpbmhlcml0O1xufVxuXG5hOm5vdChbaHJlZl0pOm5vdChbdGFiaW5kZXhdKTpob3ZlcixcbmE6bm90KFtocmVmXSk6bm90KFt0YWJpbmRleF0pOmZvY3VzIHtcbiAgdGV4dC1kZWNvcmF0aW9uOiBub25lO1xuICBjb2xvcjogaW5oZXJpdDtcbn1cblxuYTpub3QoW2hyZWZdKTpub3QoW3RhYmluZGV4XSk6Zm9jdXMge1xuICBvdXRsaW5lOiAwO1xufVxuXG4ubmF2YmFyLWRhcmsgLm5hdmJhci1uYXYgLm5hdi1saW5rIHtcbiAgY29sb3I6IHJnYmEoMCwgMCwgMCwgMC45NSk7XG59XG5cbi5uYXZiYXItZGFyayAubmF2YmFyLW5hdiAubmF2LWxpbms6aG92ZXIsXG4ubmF2YmFyLWRhcmsgLm5hdmJhci1uYXYgLm5hdi1saW5rOmZvY3VzIHtcbiAgY29sb3I6IHJnYmEoNjUsIDY1LCA2NSwgMC42NSk7XG59XG5cbi5uYXZiYXItZGFyayAubmF2YmFyLW5hdiAubmF2LWxpbmsuZGlzYWJsZWQge1xuICBjb2xvcjogcmdiYSgyNTUsIDI1NSwgMjU1LCAwLjI1KTtcbn1cblxuLm5hdmJhci1kYXJrIC5uYXZiYXItbmF2IC5zaG93ID4gLm5hdi1saW5rLFxuLm5hdmJhci1kYXJrIC5uYXZiYXItbmF2IC5hY3RpdmUgPiAubmF2LWxpbmssXG4ubmF2YmFyLWRhcmsgLm5hdmJhci1uYXYgLm5hdi1saW5rLnNob3csXG4ubmF2YmFyLWRhcmsgLm5hdmJhci1uYXYgLm5hdi1saW5rLmFjdGl2ZSB7XG4gIGNvbG9yOiByZ2JhKDI1NSwgMjU1LCAyNTUsIDAuNjUpO1xufVxuXG4ubmF2YmFyIHtcbiAgcG9zaXRpb246IHJlbGF0aXZlO1xuICBkaXNwbGF5OiBmbGV4O1xuICBwYWRkaW5nOiAwLjVyZW0gMC41cmVtO1xuICBmbGV4LXdyYXA6IHdyYXA7XG4gIGFsaWduLWl0ZW1zOiBjZW50ZXI7XG4gIGp1c3RpZnktY29udGVudDogc3BhY2UtYmV0d2Vlbjtcbn1cblxuLmZpeGVkLXRvcCB7XG4gIHBvc2l0aW9uOiBmaXhlZDtcbiAgei1pbmRleDogMTAzMDtcbiAgdG9wOiAwO1xuICByaWdodDogMDtcbiAgbGVmdDogMDtcbn1cblxuLnNxdWFyZSB7XG4gIHdpZHRoOiAxMDBweDtcbiAgaGVpZ2h0OiAxMDBweDtcbn1cblxuLmF1dG8ge1xuICBjdXJzb3I6IGF1dG87XG59XG5cbi5kZWZhdWx0IHtcbiAgY3Vyc29yOiBkZWZhdWx0O1xufVxuXG4ubm9uZSB7XG4gIGN1cnNvcjogbm9uZTtcbn1cblxuLmNvbnRleHQtbWVudSB7XG4gIGN1cnNvcjogY29udGV4dC1tZW51O1xufVxuXG4uaGVscCB7XG4gIGN1cnNvcjogaGVscDtcbn1cblxuLnBvaW50ZXIge1xuICBjdXJzb3I6IHBvaW50ZXI7XG59XG5cbi5wcm9ncmVzcyB7XG4gIGN1cnNvcjogcHJvZ3Jlc3M7XG59XG5cbi53YWl0IHtcbiAgY3Vyc29yOiB3YWl0O1xufVxuXG4uY2VsbCB7XG4gIGN1cnNvcjogY2VsbDtcbn1cblxuLmNyb3NzaGFpciB7XG4gIGN1cnNvcjogY3Jvc3NoYWlyO1xufVxuXG4udGV4dCB7XG4gIGN1cnNvcjogdGV4dDtcbn1cblxuLnZlcnRpY2FsLXRleHQge1xuICBjdXJzb3I6IHZlcnRpY2FsLXRleHQ7XG59XG5cbi5hbGlhcyB7XG4gIGN1cnNvcjogYWxpYXM7XG59XG5cbi5jb3B5IHtcbiAgY3Vyc29yOiBjb3B5O1xufVxuXG4ubW92ZSB7XG4gIGN1cnNvcjogbW92ZTtcbn1cblxuLm5vLWRyb3Age1xuICBjdXJzb3I6IG5vLWRyb3A7XG59XG5cbi5ub3QtYWxsb3dlZCB7XG4gIGN1cnNvcjogbm90LWFsbG93ZWQ7XG59XG5cbi5hbGwtc2Nyb2xsIHtcbiAgY3Vyc29yOiBhbGwtc2Nyb2xsO1xufVxuXG4uY29sLXJlc2l6ZSB7XG4gIGN1cnNvcjogY29sLXJlc2l6ZTtcbn1cblxuLnJvdy1yZXNpemUge1xuICBjdXJzb3I6IHJvdy1yZXNpemU7XG59XG5cbi5uLXJlc2l6ZSB7XG4gIGN1cnNvcjogbi1yZXNpemU7XG59XG5cbi5lLXJlc2l6ZSB7XG4gIGN1cnNvcjogZS1yZXNpemU7XG59XG5cbi5zLXJlc2l6ZSB7XG4gIGN1cnNvcjogcy1yZXNpemU7XG59XG5cbi53LXJlc2l6ZSB7XG4gIGN1cnNvcjogdy1yZXNpemU7XG59XG5cbi5ucy1yZXNpemUge1xuICBjdXJzb3I6IG5zLXJlc2l6ZTtcbn1cblxuLmV3LXJlc2l6ZSB7XG4gIGN1cnNvcjogZXctcmVzaXplO1xufVxuXG4ubmUtcmVzaXplIHtcbiAgY3Vyc29yOiBuZS1yZXNpemU7XG59XG5cbi5udy1yZXNpemUge1xuICBjdXJzb3I6IG53LXJlc2l6ZTtcbn1cblxuLnNlLXJlc2l6ZSB7XG4gIGN1cnNvcjogc2UtcmVzaXplO1xufVxuXG4uc3ctcmVzaXplIHtcbiAgY3Vyc29yOiBzdy1yZXNpemU7XG59XG5cbi5uZXN3LXJlc2l6ZSB7XG4gIGN1cnNvcjogbmVzdy1yZXNpemU7XG59XG5cbi5ud3NlLXJlc2l6ZSB7XG4gIGN1cnNvcjogbndzZS1yZXNpemU7XG59XG5cbi5iY2FyZDpob3ZlciB7XG4gIGJhY2tncm91bmQtY29sb3I6ICM2YmNmZmQ7XG4gIGJveC1zaGFkb3c6IDAgOHB4IDE2cHggMCByZ2JhKDAsIDAsIDAsIDAuMik7XG59XG5cbi5yY2FyZDpob3ZlciB7XG4gIGJhY2tncm91bmQtY29sb3I6ICNmZDZiNmI7XG4gIGJveC1zaGFkb3c6IDAgOHB4IDE2cHggMCByZ2JhKDAsIDAsIDAsIDAuMik7XG59XG5cbi5nY2FyZDpob3ZlciB7XG4gIGJhY2tncm91bmQtY29sb3I6ICM3Y2ZkNmI7XG4gIGJveC1zaGFkb3c6IDAgOHB4IDE2cHggMCByZ2JhKDAsIDAsIDAsIDAuMik7XG59XG5cbi5zY3JvbGwge1xuICBtYXgtaGVpZ2h0OiA0ODBweDtcbiAgb3ZlcmZsb3cteTogc2Nyb2xsO1xufVxuXG4vKiBIaWRlIHNjcm9sbGJhciBmb3IgQ2hyb21lLCBTYWZhcmkgYW5kIE9wZXJhICovXG4uc2Nyb2xsOjotd2Via2l0LXNjcm9sbGJhciB7XG4gIGRpc3BsYXk6IG5vbmU7XG59XG5cbi8qIEhpZGUgc2Nyb2xsYmFyIGZvciBJRSwgRWRnZSBhbmQgRmlyZWZveCAqL1xuLnNjcm9sbCB7XG4gIC1tcy1vdmVyZmxvdy1zdHlsZTogbm9uZTtcbiAgLyogSUUgYW5kIEVkZ2UgKi9cbiAgc2Nyb2xsYmFyLXdpZHRoOiBub25lO1xuICAvKiBGaXJlZm94ICovXG59XG5cbi5jYXJkLWhlYWRlciB7XG4gIG1hcmdpbi10b3A6IDA7XG4gIHBhZGRpbmc6IDEuMjVyZW0gMS41cmVtO1xuICBib3JkZXItYm90dG9tOiAxcHggc29saWQgcmdiYSgyNTUsIDI1NSwgMjU1LCAwKTtcbiAgYmFja2dyb3VuZC1jb2xvcjogI2ZmZjA7XG59XG5cbi5jYXJkIHtcbiAgYm9yZGVyLXJhZGl1czogMjVweDtcbiAgYmFja2dyb3VuZC1jb2xvcjogI2ViYTcwZDtcbn1cblxuLmNhcmQtYm9keSB7XG4gIGZvbnQtc2l6ZTogOTAlO1xufVxuXG4uY2FyZC1mb290ZXIge1xuICBwYWRkaW5nOiAxLjI1cmVtIDEuNXJlbTtcbiAgaGVpZ2h0OiA4MHB4O1xuICBib3JkZXItdG9wOiAwcHggc29saWQgcmdiYSgyNTUsIDI1NSwgMjU1LCAwKTtcbiAgYmFja2dyb3VuZC1jb2xvcjogI2ZmZjA7XG59XG5cbi5uYXZiYXIge1xuICBkaXNwbGF5OiBmbGV4O1xuICBwYWRkaW5nOiAwO1xuICBmbGV4LXdyYXA6IHdyYXA7XG4gIGFsaWduLWl0ZW1zOiBjZW50ZXI7XG4gIGp1c3RpZnktY29udGVudDogc3BhY2UtYmV0d2Vlbjtcbn1cblxuLm5hdmJhci1kYXJrIC5uYXZiYXItdG9nZ2xlci1pY29uIHtcbiAgYmFja2dyb3VuZC1pbWFnZTogdXJsKFwiZGF0YTppbWFnZS9zdmcreG1sO2NoYXJzZXQ9dXRmOCwlM0Nzdmcgdmlld0JveD0nMCAwIDMwIDMwJyB4bWxucz0naHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmcnJTNFJTNDcGF0aCBzdHJva2U9J3JnYmEoMCwgMCwgMCwgMC41KScgc3Ryb2tlLXdpZHRoPScyJyBzdHJva2UtbGluZWNhcD0ncm91bmQnIHN0cm9rZS1taXRlcmxpbWl0PScxMCcgZD0nTTQgN2gyMk00IDE1aDIyTTQgMjNoMjInLyUzRSUzQy9zdmclM0VcIik7XG59XG5cbi5mb290ZXIge1xuICBwb3NpdGlvbjogYWJzb2x1dGU7XG4gIGxlZnQ6IDA7XG4gIHJpZ2h0OiAwO1xuICBib3R0b206IDA7XG4gIHBhZGRpbmc6IDFyZW07XG59XG5cbi50ZXh0LWJvbGQge1xuICBmb250LXdlaWdodDogNjAwO1xufVxuXG4uYmdnIHtcbiAgYmFja2dyb3VuZC1pbWFnZTogdXJsKFwic3JjL2Fzc2V0cy9pbWcvdGhlbWUvbXlnZW8tYmFja2dyb3VuZC5qcGdcIik7XG4gIGhlaWdodDogMTAwJTtcbiAgYmFja2dyb3VuZC1wb3NpdGlvbjogY2VudGVyO1xuICBiYWNrZ3JvdW5kLXJlcGVhdDogbm8tcmVwZWF0O1xuICBiYWNrZ3JvdW5kLXNpemU6IGNvdmVyO1xufVxuXG4ubW9kYWwtY29udGVudCB7XG4gIG1heC13aWR0aDogNTAwcHg7XG59XG5cbi5lcnJvci1tZXNzYWdlIHtcbiAgY29sb3I6ICNmNTM2NWM7XG4gIHRleHQtYWxpZ246IHJpZ2h0O1xuICBmb250LXNpemU6IDAuOGVtO1xuICBwYWRkaW5nLXRvcDogNXB4O1xuICBwYWRkaW5nLWJvdHRvbTogMDtcbiAgbWFyZ2luLWJvdHRvbTogMDtcbn1cblxuLmZhbmN5X2NhcmQge1xuICBib3gtc2hhZG93OiA4cHggMTRweCAzOHB4IHJnYmEoMzksIDQ0LCA0OSwgMC4wNiksIDFweCAzcHggOHB4IHJnYmEoMzksIDQ0LCA0OSwgMC4wMyk7XG4gIHRyYW5zaXRpb246IGFsbCAwLjdzIGVhc2U7XG4gIC8qIGJhY2sgdG8gbm9ybWFsICovXG4gIGNvbG9yOiB0cmFuc3BhcmVudDtcbiAgdGV4dC10cmFuc2Zvcm06IHVwcGVyY2FzZTtcbiAgYmFja2dyb3VuZC1pbWFnZTogbGluZWFyLWdyYWRpZW50KHRvIHJpZ2h0LCAjZWJiYTE2LCAjZWQ4YTE5KTtcbn1cblxuLmZhbmN5X2NhcmQ6aG92ZXIge1xuICBib3gtc2hhZG93OiA4cHggMjhweCA1MHB4IHJnYmEoMzksIDQ0LCA0OSwgMC4wNyksIDFweCA2cHggMTJweCByZ2JhKDM5LCA0NCwgNDksIDAuMDQpO1xuICB0cmFuc2l0aW9uOiBhbGwgMC40cyBlYXNlO1xuICAvKiB6b29tIGluICovXG4gIHRyYW5zZm9ybTogdHJhbnNsYXRlM0QoMCwgLTFweCwgMCkgc2NhbGUoMS4yKTtcbiAgZm9udC1zaXplOiAxMTAlO1xuICBjb2xvcjogI2ZmZmZmZjtcbiAgYmFja2dyb3VuZC1pbWFnZTogbGluZWFyLWdyYWRpZW50KHRvIHJpZ2h0LCAjZWJjNjRjLCAjZTRhMDUzKTtcbn1cblxuLmJhZGdlLWN1c3RvbSB7XG4gIGNvbG9yOiAjMzAzMDMwO1xuICBiYWNrZ3JvdW5kLWltYWdlOiBsaW5lYXItZ3JhZGllbnQodG8gcmlnaHQsICNlYmJhMTYsICNlZDhhMTkpO1xuICBmb250LXNpemU6IDgwJTtcbiAgcGFkZGluZzogMC43NXJlbSAxLjA1cmVtO1xufVxuXG4uYmFkZ2UtY3VzdG9tW2hyZWZdOmhvdmVyLFxuLmJhZGdlLWN1c3RvbVtocmVmXTpmb2N1cyB7XG4gIHRleHQtZGVjb3JhdGlvbjogbm9uZTtcbiAgY29sb3I6ICNmZmY7XG4gIGJhY2tncm91bmQtY29sb3I6ICNmYTNhMGU7XG59Il19 */");

/***/ }),

/***/ "./src/app/auth/login/login.component.ts":
/*!***********************************************!*\
  !*** ./src/app/auth/login/login.component.ts ***!
  \***********************************************/
/*! exports provided: LoginComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "LoginComponent", function() { return LoginComponent; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm5/core.js");
/* harmony import */ var sweetalert2__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! sweetalert2 */ "./node_modules/sweetalert2/dist/sweetalert2.all.js");
/* harmony import */ var sweetalert2__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(sweetalert2__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _angular_forms__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @angular/forms */ "./node_modules/@angular/forms/__ivy_ngcc__/fesm5/forms.js");
/* harmony import */ var src_app_shared_services_mocks_mocks_service__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! src/app/shared/services/mocks/mocks.service */ "./src/app/shared/services/mocks/mocks.service.ts");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/__ivy_ngcc__/fesm5/router.js");
/* harmony import */ var src_app_shared_services_auth_auth_service__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! src/app/shared/services/auth/auth.service */ "./src/app/shared/services/auth/auth.service.ts");
/* harmony import */ var _ngx_loading_bar_core__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @ngx-loading-bar/core */ "./node_modules/@ngx-loading-bar/core/__ivy_ngcc__/fesm5/ngx-loading-bar-core.js");
/* harmony import */ var ngx_bootstrap__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ngx-bootstrap */ "./node_modules/ngx-bootstrap/__ivy_ngcc__/esm5/ngx-bootstrap.js");
/* harmony import */ var src_app_shared_handler_notify_notify_service__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! src/app/shared/handler/notify/notify.service */ "./src/app/shared/handler/notify/notify.service.ts");










var LoginComponent = /** @class */ (function () {
    function LoginComponent(authService, notifyService, formBuilder, loadingBar, router, mockService, modalService, zone) {
        this.authService = authService;
        this.notifyService = notifyService;
        this.formBuilder = formBuilder;
        this.loadingBar = loadingBar;
        this.router = router;
        this.mockService = mockService;
        this.modalService = modalService;
        this.zone = zone;
        this.myCheck = null;
        this.myCheck2 = null;
        this.myCheck3 = null;
        this.myCheck4 = null;
        // Image
        this.imgLogo = 'assets/img/logo/prototype-logo.png';
        this.modalConfig = {
            keyboard: true,
            class: "modal-dialog-centered modal-lg"
        };
        this.registerFormMessages = {
            'name': [
                { type: 'required', message: 'Sila masukkan Nama' }
            ],
            'nric': [
                { type: 'required', message: 'Sila masukkan No Kad Pengenalan' }
            ],
            'section': [
                { type: 'required', message: 'Sila masukkan Bahagian' }
            ],
            'email': [
                { type: 'required', message: 'Sila masukkan Emel' },
                { type: 'email', message: 'A valid email is required' }
            ],
            'password1': [
                { type: 'required', message: 'Password is required' },
                { type: 'minLength', message: 'Password must have at least 8 characters' }
            ],
            'password2': [
                { type: 'required', message: 'Password is required' },
                { type: 'minLength', message: 'Password must have at least 8 characters' }
            ]
        };
        this.loginFormMessages = {
            'username': [
                { type: 'required', message: 'Masukkan ID pengguna' },
                { type: 'email', message: 'Masukkan emel yang sah' }
            ],
            'password': [
                { type: 'required', message: 'Password is required' },
                { type: 'minLength', message: 'Password must have at least 8 characters' }
            ]
        };
    }
    LoginComponent.prototype.ngOnInit = function () {
        this.loginForm = this.formBuilder.group({
            username: new _angular_forms__WEBPACK_IMPORTED_MODULE_3__["FormControl"]('', _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].compose([
                _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].required,
                _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].email
            ])),
            password: new _angular_forms__WEBPACK_IMPORTED_MODULE_3__["FormControl"]('', _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].compose([
                _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].required,
                _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].minLength(8)
            ]))
        });
        this.registerForm = this.formBuilder.group({
            name: new _angular_forms__WEBPACK_IMPORTED_MODULE_3__["FormControl"]('', _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].compose([
                _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].required
            ])),
            nric: new _angular_forms__WEBPACK_IMPORTED_MODULE_3__["FormControl"]('', _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].compose([
                _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].required
            ])),
            section: new _angular_forms__WEBPACK_IMPORTED_MODULE_3__["FormControl"]('', _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].compose([
                _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].required
            ])),
            password1: new _angular_forms__WEBPACK_IMPORTED_MODULE_3__["FormControl"]('', _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].compose([
                _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].required
            ])),
            password2: new _angular_forms__WEBPACK_IMPORTED_MODULE_3__["FormControl"]('', _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].compose([
                _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].required
            ])),
            email: new _angular_forms__WEBPACK_IMPORTED_MODULE_3__["FormControl"]('', _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].compose([
                _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].required,
                _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].email
            ]))
        });
    };
    LoginComponent.prototype.login = function () {
        this.loadingBar.start();
        this.loadingBar.complete();
        this.successMessage();
        if (this.loginForm.value.username == 'admin') {
            this.authService.userRole = 1;
            this.navigatePage('dashboard-admin');
        }
        else if (this.loginForm.value.username == 'admin2') {
            this.authService.userRole = 2;
            this.navigatePage('dashboard-admin');
        }
        else if (this.loginForm.value.username == 'admin3') {
            this.authService.userRole = 3;
            this.navigatePage('dashboard-admin');
        }
        else if (this.loginForm.value.username == 'user') {
            this.authService.userRole = 4;
            this.navigatePage('dashboard-user');
        }
        else if (this.loginForm.value.username == 'user2') {
            this.authService.userRole = 5;
            this.navigatePage('dashboard-user');
        }
        else if (this.loginForm.value.username == 'user3') {
            this.authService.userRole = 6;
            this.navigatePage('dashboard-user');
        }
    };
    LoginComponent.prototype.navigatePage = function (path) {
        if (path == 'login') {
            return this.router.navigate(['/auth/login']);
        }
        else if (path == 'forgot') {
            return this.router.navigate(['/auth/forgot']);
        }
        else if (path == 'register') {
            return this.router.navigate(['/auth/register']);
        }
        else if (path == 'dashboard-user') {
            return this.router.navigate(['/user/profile']);
        }
        else if (path == 'dashboard-admin') {
            return this.router.navigate(['/admin/profile']);
        }
    };
    LoginComponent.prototype.successMessage = function () {
        var title = 'Berjaya';
        var message = 'Log masuk sekarang';
        this.notifyService.openToastr(title, message);
    };
    LoginComponent.prototype.openModal = function (modalRef) {
        this.modal = this.modalService.show(modalRef, this.modalConfig);
    };
    LoginComponent.prototype.openModal2 = function (modalRef) {
        this.modal = this.modalService.show(modalRef, this.modalConfig);
        this.resetCheck();
    };
    LoginComponent.prototype.closeModal = function () {
        this.modal.hide();
        this.registerForm.reset();
    };
    LoginComponent.prototype.confirm = function () {
        var _this = this;
        sweetalert2__WEBPACK_IMPORTED_MODULE_2___default.a.fire({
            title: "Pengesahan",
            text: "Anda pasti untuk mendaftar pengguna baru ini?",
            type: "warning",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-info",
            confirmButtonText: "Pasti",
            showCancelButton: true,
            cancelButtonClass: "btn btn-danger",
            cancelButtonText: "Batal"
        }).then(function (result) {
            if (result.value) {
                _this.register();
            }
        });
    };
    LoginComponent.prototype.register = function () {
        var _this = this;
        sweetalert2__WEBPACK_IMPORTED_MODULE_2___default.a.fire({
            title: "Pendaftaran Berjaya",
            text: "Pendaftaran pengguna baru dalam proses.",
            type: "success",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-success",
            confirmButtonText: "Tutup"
        }).then(function (result) {
            if (result.value) {
                _this.modal.hide();
                _this.registerForm.reset();
            }
        });
    };
    LoginComponent.prototype.resetCheck = function () {
        this.myCheck = null;
        this.myCheck2 = null;
        this.myCheck3 = null;
        this.myCheck4 = null;
    };
    LoginComponent.prototype.resetCheck3 = function () {
        this.myCheck2 = null;
        this.myCheck3 = null;
        this.myCheck4 = null;
    };
    LoginComponent.prototype.resetCheck2 = function () {
        this.myCheck3 = null;
        this.myCheck4 = null;
    };
    LoginComponent.prototype.resetCheck4 = function () {
        this.myCheck4 = null;
    };
    LoginComponent.ctorParameters = function () { return [
        { type: src_app_shared_services_auth_auth_service__WEBPACK_IMPORTED_MODULE_6__["AuthService"] },
        { type: src_app_shared_handler_notify_notify_service__WEBPACK_IMPORTED_MODULE_9__["NotifyService"] },
        { type: _angular_forms__WEBPACK_IMPORTED_MODULE_3__["FormBuilder"] },
        { type: _ngx_loading_bar_core__WEBPACK_IMPORTED_MODULE_7__["LoadingBarService"] },
        { type: _angular_router__WEBPACK_IMPORTED_MODULE_5__["Router"] },
        { type: src_app_shared_services_mocks_mocks_service__WEBPACK_IMPORTED_MODULE_4__["MocksService"] },
        { type: ngx_bootstrap__WEBPACK_IMPORTED_MODULE_8__["BsModalService"] },
        { type: _angular_core__WEBPACK_IMPORTED_MODULE_1__["NgZone"] }
    ]; };
    LoginComponent = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"])({
            selector: 'app-login',
            template: Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! raw-loader!./login.component.html */ "./node_modules/raw-loader/dist/cjs.js!./src/app/auth/login/login.component.html")).default,
            styles: [Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! ./login.component.scss */ "./src/app/auth/login/login.component.scss")).default]
        }),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"])("design:paramtypes", [src_app_shared_services_auth_auth_service__WEBPACK_IMPORTED_MODULE_6__["AuthService"],
            src_app_shared_handler_notify_notify_service__WEBPACK_IMPORTED_MODULE_9__["NotifyService"],
            _angular_forms__WEBPACK_IMPORTED_MODULE_3__["FormBuilder"],
            _ngx_loading_bar_core__WEBPACK_IMPORTED_MODULE_7__["LoadingBarService"],
            _angular_router__WEBPACK_IMPORTED_MODULE_5__["Router"],
            src_app_shared_services_mocks_mocks_service__WEBPACK_IMPORTED_MODULE_4__["MocksService"],
            ngx_bootstrap__WEBPACK_IMPORTED_MODULE_8__["BsModalService"],
            _angular_core__WEBPACK_IMPORTED_MODULE_1__["NgZone"]])
    ], LoginComponent);
    return LoginComponent;
}());



/***/ }),

/***/ "./src/app/auth/register/register.component.scss":
/*!*******************************************************!*\
  !*** ./src/app/auth/register/register.component.scss ***!
  \*******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (".logo-box {\n  text-align: center;\n  margin-bottom: 2rem;\n}\n.logo-box .logo {\n  max-height: 9rem;\n}\n.auth-content {\n  background-color: #172b4d;\n  background-repeat: no-repeat;\n  background-size: cover;\n  height: 100vh;\n  overflow: hidden;\n}\n.forget-label {\n  font-size: 0.875rem;\n  cursor: pointer;\n}\n.forget-label span {\n  position: relative;\n  top: 2px;\n}\n.custom-control-label {\n  vertical-align: none !important;\n}\n.error-message {\n  color: #f5365c;\n  text-align: right;\n  font-size: 0.8em;\n  padding-top: 5px;\n  padding-bottom: 0;\n  margin-bottom: 0;\n}\n.strength-bar {\n  display: inline;\n  list-style: none;\n  margin: 0;\n  padding: 0;\n  vertical-align: 2px;\n}\n.point:last-of-type {\n  margin: 0 !important;\n}\n.point {\n  background: #DDD;\n  border-radius: 2px;\n  display: inline-block;\n  height: 5px;\n  margin-right: 1px;\n  width: 62px;\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIi9BcHBsaWNhdGlvbnMvTUFNUC9odGRvY3MvYWZpcWZlL3dlYi9zcmMvYXBwL2F1dGgvcmVnaXN0ZXIvcmVnaXN0ZXIuY29tcG9uZW50LnNjc3MiLCJzcmMvYXBwL2F1dGgvcmVnaXN0ZXIvcmVnaXN0ZXIuY29tcG9uZW50LnNjc3MiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7RUFDSSxrQkFBQTtFQUNBLG1CQUFBO0FDQ0o7QURBSTtFQUNJLGdCQUFBO0FDRVI7QURFQTtFQUNJLHlCQUFBO0VBRUEsNEJBQUE7RUFJQSxzQkFBQTtFQUNBLGFBQUE7RUFDQSxnQkFBQTtBQ0FKO0FER0E7RUFDSSxtQkFBQTtFQUNBLGVBQUE7QUNBSjtBRENJO0VBQ0ksa0JBQUE7RUFDQSxRQUFBO0FDQ1I7QURHQTtFQUNJLCtCQUFBO0FDQUo7QURHQTtFQUNJLGNBQUE7RUFDQSxpQkFBQTtFQUNBLGdCQUFBO0VBQ0EsZ0JBQUE7RUFDQSxpQkFBQTtFQUNBLGdCQUFBO0FDQUo7QURHQTtFQUNJLGVBQUE7RUFDQSxnQkFBQTtFQUNBLFNBQUE7RUFDQSxVQUFBO0VBQ0EsbUJBQUE7QUNBSjtBREdBO0VBQ0ksb0JBQUE7QUNBSjtBREdBO0VBQ0ksZ0JBQUE7RUFDQSxrQkFBQTtFQUNBLHFCQUFBO0VBQ0EsV0FBQTtFQUNBLGlCQUFBO0VBQ0EsV0FBQTtBQ0FKIiwiZmlsZSI6InNyYy9hcHAvYXV0aC9yZWdpc3Rlci9yZWdpc3Rlci5jb21wb25lbnQuc2NzcyIsInNvdXJjZXNDb250ZW50IjpbIi5sb2dvLWJveCB7XG4gICAgdGV4dC1hbGlnbjogY2VudGVyO1xuICAgIG1hcmdpbi1ib3R0b206IDJyZW07XG4gICAgLmxvZ28ge1xuICAgICAgICBtYXgtaGVpZ2h0OiA5cmVtO1xuICAgIH1cbn1cblxuLmF1dGgtY29udGVudCB7XG4gICAgYmFja2dyb3VuZC1jb2xvcjogIzE3MmI0ZDtcbiAgICAvLyBiYWNrZ3JvdW5kLWltYWdlOiB1cmwoJy4uLy4uLy4uL2Fzc2V0cy9pbWcvYmFja2dyb3VuZC9nYWxheHkuanBnJyk7XG4gICAgYmFja2dyb3VuZC1yZXBlYXQ6IG5vLXJlcGVhdDtcbiAgICAtd2Via2l0LWJhY2tncm91bmQtc2l6ZTogY292ZXI7XG4gICAgLW1vei1iYWNrZ3JvdW5kLXNpemU6IGNvdmVyO1xuICAgIC1vLWJhY2tncm91bmQtc2l6ZTogY292ZXI7XG4gICAgYmFja2dyb3VuZC1zaXplOiBjb3ZlcjtcbiAgICBoZWlnaHQ6IDEwMHZoO1xuICAgIG92ZXJmbG93OiBoaWRkZW47XG59XG5cbi5mb3JnZXQtbGFiZWwge1xuICAgIGZvbnQtc2l6ZTogMC44NzVyZW07XG4gICAgY3Vyc29yOiBwb2ludGVyO1xuICAgIHNwYW4ge1xuICAgICAgICBwb3NpdGlvbjogcmVsYXRpdmU7XG4gICAgICAgIHRvcDogMnB4O1xuICAgIH1cbn1cblxuLmN1c3RvbS1jb250cm9sLWxhYmVsIHtcbiAgICB2ZXJ0aWNhbC1hbGlnbjogbm9uZSAhaW1wb3J0YW50O1xufVxuXG4uZXJyb3ItbWVzc2FnZSB7XG4gICAgY29sb3I6ICNmNTM2NWM7XG4gICAgdGV4dC1hbGlnbjogcmlnaHQ7XG4gICAgZm9udC1zaXplOiAwLjhlbTtcbiAgICBwYWRkaW5nLXRvcDogNXB4O1xuICAgIHBhZGRpbmctYm90dG9tOiAwO1xuICAgIG1hcmdpbi1ib3R0b206IDA7XG59XG5cbi5zdHJlbmd0aC1iYXIge1xuICAgIGRpc3BsYXk6IGlubGluZTtcbiAgICBsaXN0LXN0eWxlOiBub25lO1xuICAgIG1hcmdpbjogMDtcbiAgICBwYWRkaW5nOiAwO1xuICAgIHZlcnRpY2FsLWFsaWduOiAycHg7XG59XG4gIFxuLnBvaW50Omxhc3Qtb2YtdHlwZSB7XG4gICAgbWFyZ2luOiAwICFpbXBvcnRhbnQ7XG59XG4gIFxuLnBvaW50IHtcbiAgICBiYWNrZ3JvdW5kOiAjREREO1xuICAgIGJvcmRlci1yYWRpdXM6IDJweDtcbiAgICBkaXNwbGF5OiBpbmxpbmUtYmxvY2s7XG4gICAgaGVpZ2h0OiA1cHg7XG4gICAgbWFyZ2luLXJpZ2h0OiAxcHg7XG4gICAgd2lkdGg6IDYycHg7XG59XG4gIFxuLy8gcCB7XG4vLyAgICAgZm9udC13ZWlnaHQ6IGJvbGQ7XG4vLyAgICAgZm9udC1zaXplOiAyMHB4O1xuLy8gfVxuICAiLCIubG9nby1ib3gge1xuICB0ZXh0LWFsaWduOiBjZW50ZXI7XG4gIG1hcmdpbi1ib3R0b206IDJyZW07XG59XG4ubG9nby1ib3ggLmxvZ28ge1xuICBtYXgtaGVpZ2h0OiA5cmVtO1xufVxuXG4uYXV0aC1jb250ZW50IHtcbiAgYmFja2dyb3VuZC1jb2xvcjogIzE3MmI0ZDtcbiAgYmFja2dyb3VuZC1yZXBlYXQ6IG5vLXJlcGVhdDtcbiAgLXdlYmtpdC1iYWNrZ3JvdW5kLXNpemU6IGNvdmVyO1xuICAtbW96LWJhY2tncm91bmQtc2l6ZTogY292ZXI7XG4gIC1vLWJhY2tncm91bmQtc2l6ZTogY292ZXI7XG4gIGJhY2tncm91bmQtc2l6ZTogY292ZXI7XG4gIGhlaWdodDogMTAwdmg7XG4gIG92ZXJmbG93OiBoaWRkZW47XG59XG5cbi5mb3JnZXQtbGFiZWwge1xuICBmb250LXNpemU6IDAuODc1cmVtO1xuICBjdXJzb3I6IHBvaW50ZXI7XG59XG4uZm9yZ2V0LWxhYmVsIHNwYW4ge1xuICBwb3NpdGlvbjogcmVsYXRpdmU7XG4gIHRvcDogMnB4O1xufVxuXG4uY3VzdG9tLWNvbnRyb2wtbGFiZWwge1xuICB2ZXJ0aWNhbC1hbGlnbjogbm9uZSAhaW1wb3J0YW50O1xufVxuXG4uZXJyb3ItbWVzc2FnZSB7XG4gIGNvbG9yOiAjZjUzNjVjO1xuICB0ZXh0LWFsaWduOiByaWdodDtcbiAgZm9udC1zaXplOiAwLjhlbTtcbiAgcGFkZGluZy10b3A6IDVweDtcbiAgcGFkZGluZy1ib3R0b206IDA7XG4gIG1hcmdpbi1ib3R0b206IDA7XG59XG5cbi5zdHJlbmd0aC1iYXIge1xuICBkaXNwbGF5OiBpbmxpbmU7XG4gIGxpc3Qtc3R5bGU6IG5vbmU7XG4gIG1hcmdpbjogMDtcbiAgcGFkZGluZzogMDtcbiAgdmVydGljYWwtYWxpZ246IDJweDtcbn1cblxuLnBvaW50Omxhc3Qtb2YtdHlwZSB7XG4gIG1hcmdpbjogMCAhaW1wb3J0YW50O1xufVxuXG4ucG9pbnQge1xuICBiYWNrZ3JvdW5kOiAjREREO1xuICBib3JkZXItcmFkaXVzOiAycHg7XG4gIGRpc3BsYXk6IGlubGluZS1ibG9jaztcbiAgaGVpZ2h0OiA1cHg7XG4gIG1hcmdpbi1yaWdodDogMXB4O1xuICB3aWR0aDogNjJweDtcbn0iXX0= */");

/***/ }),

/***/ "./src/app/auth/register/register.component.ts":
/*!*****************************************************!*\
  !*** ./src/app/auth/register/register.component.ts ***!
  \*****************************************************/
/*! exports provided: RegisterComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "RegisterComponent", function() { return RegisterComponent; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm5/core.js");
/* harmony import */ var _angular_forms__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/forms */ "./node_modules/@angular/forms/__ivy_ngcc__/fesm5/forms.js");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/__ivy_ngcc__/fesm5/router.js");
/* harmony import */ var src_app_shared_services_auth_auth_service__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! src/app/shared/services/auth/auth.service */ "./src/app/shared/services/auth/auth.service.ts");
/* harmony import */ var _ngx_loading_bar_core__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @ngx-loading-bar/core */ "./node_modules/@ngx-loading-bar/core/__ivy_ngcc__/fesm5/ngx-loading-bar-core.js");
/* harmony import */ var src_app_shared_handler_notify_notify_service__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! src/app/shared/handler/notify/notify.service */ "./src/app/shared/handler/notify/notify.service.ts");







var RegisterComponent = /** @class */ (function () {
    function RegisterComponent(authService, notifyService, formBuilder, loadingBar, router) {
        this.authService = authService;
        this.notifyService = notifyService;
        this.formBuilder = formBuilder;
        this.loadingBar = loadingBar;
        this.router = router;
        // Image
        this.imgLogo = 'assets/img/logo/prototype-logo.png';
        this.registerFormMessages = {
            'username': [
                { type: 'required', message: 'Email is required' },
                { type: 'email', message: 'Please enter a valid email' }
            ],
            'password1': [
                { type: 'required', message: 'Password is required' },
                { type: 'minLength', message: 'Password must have at least 8 characters' }
            ],
            'password2': [
                { type: 'required', message: 'Password is required' },
                { type: 'minLength', message: 'Password must have at least 8 characters' }
            ]
        };
    }
    RegisterComponent.prototype.ngOnInit = function () {
        this.registerForm = this.formBuilder.group({
            username: new _angular_forms__WEBPACK_IMPORTED_MODULE_2__["FormControl"]('', _angular_forms__WEBPACK_IMPORTED_MODULE_2__["Validators"].compose([
                _angular_forms__WEBPACK_IMPORTED_MODULE_2__["Validators"].required,
                _angular_forms__WEBPACK_IMPORTED_MODULE_2__["Validators"].email
            ])),
            password1: new _angular_forms__WEBPACK_IMPORTED_MODULE_2__["FormControl"]('', _angular_forms__WEBPACK_IMPORTED_MODULE_2__["Validators"].compose([
                _angular_forms__WEBPACK_IMPORTED_MODULE_2__["Validators"].required,
                _angular_forms__WEBPACK_IMPORTED_MODULE_2__["Validators"].minLength(8)
            ])),
            password2: new _angular_forms__WEBPACK_IMPORTED_MODULE_2__["FormControl"]('', _angular_forms__WEBPACK_IMPORTED_MODULE_2__["Validators"].compose([
                _angular_forms__WEBPACK_IMPORTED_MODULE_2__["Validators"].required,
                _angular_forms__WEBPACK_IMPORTED_MODULE_2__["Validators"].minLength(8)
            ]))
        });
    };
    RegisterComponent.prototype.login = function () {
        this.loadingBar.start();
        this.loadingBar.complete();
        this.successMessage();
    };
    RegisterComponent.prototype.navigatePage = function (path) {
        if (path == 'login') {
            return this.router.navigate(['/auth/login']);
        }
    };
    RegisterComponent.prototype.successMessage = function () {
        var title = 'Success';
        var message = 'Loging in right now';
        this.notifyService.openToastr(title, message);
    };
    RegisterComponent.ctorParameters = function () { return [
        { type: src_app_shared_services_auth_auth_service__WEBPACK_IMPORTED_MODULE_4__["AuthService"] },
        { type: src_app_shared_handler_notify_notify_service__WEBPACK_IMPORTED_MODULE_6__["NotifyService"] },
        { type: _angular_forms__WEBPACK_IMPORTED_MODULE_2__["FormBuilder"] },
        { type: _ngx_loading_bar_core__WEBPACK_IMPORTED_MODULE_5__["LoadingBarService"] },
        { type: _angular_router__WEBPACK_IMPORTED_MODULE_3__["Router"] }
    ]; };
    RegisterComponent = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"])({
            selector: 'app-register',
            template: Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! raw-loader!./register.component.html */ "./node_modules/raw-loader/dist/cjs.js!./src/app/auth/register/register.component.html")).default,
            styles: [Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! ./register.component.scss */ "./src/app/auth/register/register.component.scss")).default]
        }),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"])("design:paramtypes", [src_app_shared_services_auth_auth_service__WEBPACK_IMPORTED_MODULE_4__["AuthService"],
            src_app_shared_handler_notify_notify_service__WEBPACK_IMPORTED_MODULE_6__["NotifyService"],
            _angular_forms__WEBPACK_IMPORTED_MODULE_2__["FormBuilder"],
            _ngx_loading_bar_core__WEBPACK_IMPORTED_MODULE_5__["LoadingBarService"],
            _angular_router__WEBPACK_IMPORTED_MODULE_3__["Router"]])
    ], RegisterComponent);
    return RegisterComponent;
}());



/***/ }),

/***/ "./src/app/shared/services/mocks/mocks.service.ts":
/*!********************************************************!*\
  !*** ./src/app/shared/services/mocks/mocks.service.ts ***!
  \********************************************************/
/*! exports provided: MocksService */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "MocksService", function() { return MocksService; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm5/core.js");
/* harmony import */ var _angular_common_http__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/common/http */ "./node_modules/@angular/common/__ivy_ngcc__/fesm5/http.js");
/* harmony import */ var rxjs_operators__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! rxjs/operators */ "./node_modules/rxjs/_esm5/operators/index.js");




var MocksService = /** @class */ (function () {
    function MocksService(http) {
        this.http = http;
        // URL
        this.urlMock = 'assets/mock/';
        // Data
        this.datas = [];
    }
    MocksService.prototype.getAll = function (path) {
        var _this = this;
        var urlPath = this.urlMock + path;
        return this.http.get(urlPath).pipe(Object(rxjs_operators__WEBPACK_IMPORTED_MODULE_3__["tap"])(function (res) {
            _this.datas = res;
            console.log('Data: ', _this.datas);
        }));
    };
    MocksService.ctorParameters = function () { return [
        { type: _angular_common_http__WEBPACK_IMPORTED_MODULE_2__["HttpClient"] }
    ]; };
    MocksService = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Injectable"])({
            providedIn: 'root'
        }),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"])("design:paramtypes", [_angular_common_http__WEBPACK_IMPORTED_MODULE_2__["HttpClient"]])
    ], MocksService);
    return MocksService;
}());



/***/ })

}]);
//# sourceMappingURL=auth-auth-module.js.map
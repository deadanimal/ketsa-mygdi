
import { Component, OnInit, OnDestroy, NgZone, TemplateRef } from '@angular/core';
import swal from 'sweetalert2';
import { FormGroup, FormBuilder, Validators, FormControl } from '@angular/forms';
import { MocksService } from 'src/app/shared/services/mocks/mocks.service';
import { Router } from '@angular/router';
import { AuthService } from 'src/app/shared/services/auth/auth.service';
import { LoadingBarService } from '@ngx-loading-bar/core';
import { BsModalRef, BsModalService } from 'ngx-bootstrap';
import { NotifyService } from 'src/app/shared/handler/notify/notify.service';
import * as moment from 'moment';
import { User } from 'src/assets/mock/admin-user/users.model'


@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {
  
  // Image
  imgLogo = 'assets/img/logo/prototype-logo.png'

  // Modal
  modal: BsModalRef;
  modalConfig = {
    keyboard: true,
    class: "modal-dialog-centered modal-lg"
  };

  // Form
  registerForm: FormGroup
  registerFormMessages = {
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
  }


  // Form
  focusUsername
  focusPassword
  loginForm: FormGroup
  loginFormMessages = {
    'username': [
      { type: 'required', message: 'Masukkan ID pengguna' },
      { type: 'email', message: 'Masukkan emel yang sah'}
    ],
    'password': [
      { type: 'required', message: 'Password is required' },
      { type: 'minLength', message: 'Password must have at least 8 characters' }
    ]
  }

  
  constructor(
    
    private authService: AuthService,
    private notifyService: NotifyService,
    private formBuilder: FormBuilder,
    private loadingBar: LoadingBarService,
    private router: Router,
    private mockService: MocksService,
    private modalService: BsModalService,
    private zone: NgZone
  ) { }
  

  ngOnInit() {
    this.loginForm = this.formBuilder.group({
      username: new FormControl('', Validators.compose([
        Validators.required,
        Validators.email
      ])),
      password: new FormControl('', Validators.compose([
        Validators.required,
        Validators.minLength(8)
      ]))
    })

    this.registerForm = this.formBuilder.group({
      name: new FormControl('', Validators.compose([
        Validators.required
      ])),
      nric: new FormControl('', Validators.compose([
        Validators.required
      ])),
      section: new FormControl('', Validators.compose([
        Validators.required
      ])),
      password1: new FormControl('', Validators.compose([
        Validators.required
      ])),
      password2: new FormControl('', Validators.compose([
        Validators.required
      ])),
      email: new FormControl('', Validators.compose([
        Validators.required,
        Validators.email
      ]))
    })
  }


  login() {
    this.loadingBar.start()
    this.loadingBar.complete()
    this.successMessage()
    if (this.loginForm.value.username == 'admin') {
      this.authService.userRole = 1
      this.navigatePage('dashboard-admin')
    }
    else if (this.loginForm.value.username == 'admin2') {
      this.authService.userRole = 2
      this.navigatePage('dashboard-admin')
    }
    else if (this.loginForm.value.username == 'admin3') {
      this.authService.userRole = 3
      this.navigatePage('dashboard-admin')
    }
    else if (this.loginForm.value.username == 'user') {
      this.authService.userRole = 4
      this.navigatePage('dashboard-user')
    }
    else if (this.loginForm.value.username == 'user2') {
      this.authService.userRole = 5
      this.navigatePage('dashboard-user')
    }
    else if (this.loginForm.value.username == 'user3') {
      this.authService.userRole = 6
      this.navigatePage('dashboard-user')
    }
  }

  navigatePage(path: String) {
    if (path == 'login') {
      return this.router.navigate(['/auth/login'])
    }
    else  if (path == 'forgot') {
      return this.router.navigate(['/auth/forgot'])
    }
    else  if (path == 'register') {
      return this.router.navigate(['/auth/register'])
    }
    else if (path == 'dashboard-user') {
      return this.router.navigate(['/user/profile'])
    }
    else if (path == 'dashboard-admin') {
      return this.router.navigate(['/admin/profile'])
    }
  }

  successMessage() {
    let title = 'Berjaya'
    let message = 'Log masuk sekarang'
    this.notifyService.openToastr(title, message)
  }

  openModal(modalRef: TemplateRef<any>) {
    this.modal = this.modalService.show(modalRef, this.modalConfig);
  }

  closeModal() {
    this.modal.hide()
    this.registerForm.reset()
  }

  confirm() {
    swal.fire({
      title: "Pengesahan",
      text: "Anda pasti untuk mendaftar pengguna baru ini?",
      type: "warning",
      buttonsStyling: false,
      confirmButtonClass: "btn btn-info",
      confirmButtonText: "Pasti",
      showCancelButton: true,
      cancelButtonClass: "btn btn-danger",
      cancelButtonText: "Batal"
    }).then((result) => {
      if (result.value) {
        this.register()
      }
    })
  }

  register() {
    swal.fire({
      title: "Dalam proses",
      text: "Pendaftaran pengguna baru dalam proses.",
      type: "info",
      buttonsStyling: false,
      confirmButtonClass: "btn btn-success",
      confirmButtonText: "Tutup"
    }).then((result) => {
      if (result.value) {
        this.modal.hide()
        this.registerForm.reset()
      }
    })
  }

}

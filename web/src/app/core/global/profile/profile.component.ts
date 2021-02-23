import { Component, OnInit } from '@angular/core';
import swal from 'sweetalert2';
import { FormGroup, FormBuilder, FormControl, Validators } from '@angular/forms';

@Component({
  selector: 'app-profile',
  templateUrl: './profile.component.html',
  styleUrls: ['./profile.component.scss']
})
export class ProfileComponent implements OnInit {


  // Toggle
  editEnabled: boolean = false
  formDataset: boolean = false

  // Form
  editForm: FormGroup
  editFormMessages = {
    'name': [
      { type: 'required', message: 'Name is required' }
    ],
    'email': [
      { type: 'required', message: 'Email is required' },
      { type: 'email', message: 'A valid email is required' }
    ]
  }

  constructor(
    private formBuilder: FormBuilder
  ) { }

  ngOnInit() {
    this.editForm = this.formBuilder.group({
      name: new FormControl('', Validators.compose([
        Validators.required
      ])),
      email: new FormControl('', Validators.compose([
        Validators.required,
        Validators.email
      ]))
    })
  }

  toggleEdit() {
    this.editEnabled = !this.editEnabled
  }
  

  confirm() {
    swal.fire({
      title: "Pengesahan",
      text: "Adakah anda pasti untuk menukar gambar profil ini?",
      type: "info",
      buttonsStyling: false,
      confirmButtonClass: "btn btn-info",
      confirmButtonText: "Pasti",
      showCancelButton: true,
      cancelButtonClass: "btn btn-danger",
      cancelButtonText: "Batal"
    }).then((result) => {
      if (result.value) {
        this.edit()
      }
    })
  }

  confirmSave() {
    swal.fire({
      title: "Pengesahan",
      text: "Adakah anda pasti untuk menyimpan maklumat yang disunting ini?",
      type: "info",
      buttonsStyling: false,
      confirmButtonClass: "btn btn-info",
      confirmButtonText: "Pasti",
      showCancelButton: true,
      cancelButtonClass: "btn btn-danger",
      cancelButtonText: "Batal"
    }).then((result) => {
      if (result.value) {
        this.edit()
        this.toggleEdit()
      }
    })
  }

  confirmPassword() {
    swal.fire({
      title: "Pengesahan",
      text: "Adakah anda pasti untuk tukar laluan?",
      type: "info",
      buttonsStyling: false,
      confirmButtonClass: "btn btn-info",
      confirmButtonText: "Pasti",
      showCancelButton: true,
      cancelButtonClass: "btn btn-danger",
      cancelButtonText: "Batal"
    }).then((result) => {
      if (result.value) {
        this.edit()
      }
    })
  }

  edit() {
    swal.fire({
      title: "Berjaya",
      text: "Kemaskini telah berjaya disimpan",
      type: "success",
      buttonsStyling: false,
      confirmButtonClass: "btn btn-success",
      confirmButtonText: "Tutup"
    }).then((result) => {
      if (result.value) {
        this.editForm.reset()
      }
    })
  }

}

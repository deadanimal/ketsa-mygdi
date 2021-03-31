import { Component, OnInit } from '@angular/core';
import swal from 'sweetalert2';
import { FormGroup, FormBuilder, FormControl, Validators } from '@angular/forms';

@Component({
  selector: 'app-check-metadata',
  templateUrl: './check-metadata.component.html',
  styleUrls: ['./check-metadata.component.scss']
})
export class CheckMetadataComponent implements OnInit {

  //Select Category

  categoryList = [
    { name: "Dataset" },
    { name: "Services" },
    { name: "Imagery" },
    { name: "Gridded" },
  ];
  selectedCat = "Select Category";

  // Accordian
  isCollapsed1 = true;
  isCollapsed2 = true;
  isCollapsed3 = true;
  isCollapsed4 = true;
  isCollapsed5 = true;
  isCollapsed6 = true;
  isCollapsed7 = true;
  isCollapsed8 = true;
  isCollapsed9 = true;
  isCollapsed10 = true;
  isCollapsed11 = true;
  isCollapsed12 = true;
  isCollapsed13 = true;
  isCollapsed14 = true;
  isCollapsed15 = true;


  // Toggle
  editEnabled: boolean = false


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

  resetAccordion() {
    // set default Accordian
    this.isCollapsed1 = true;
    this.isCollapsed2 = true;
    this.isCollapsed3 = true;
    this.isCollapsed4 = true;
    this.isCollapsed5 = true;
    this.isCollapsed6 = true;
    this.isCollapsed7 = true;
    this.isCollapsed8 = true;
    this.isCollapsed9 = true;
    this.isCollapsed10 = true;
    this.isCollapsed11 = true;
    this.isCollapsed12 = true;
    this.isCollapsed13 = true;
    this.isCollapsed14 = true;
    this.isCollapsed15 = true;
  }
}

import { Component, OnInit, TemplateRef } from '@angular/core';
import { BsModalRef, BsModalService } from 'ngx-bootstrap';

import swal from 'sweetalert2';
import { FormGroup, FormBuilder, Validators, FormControl } from '@angular/forms';

export enum SelectionType {
  single = "single",
  multi = "multi",
  multiClick = "multiClick",
  cell = "cell",
  checkbox = "checkbox"
}

@Component({
  selector: 'app-class-category',
  templateUrl: './class-category.component.html',
  styleUrls: ['./class-category.component.scss']
})
export class ClassCategoryComponent implements OnInit {

  // Toggle
  checkEnabled: boolean = false

   // Modal
   modal: BsModalRef;
   modalConfig = {
     keyboard: true,
     class: "modal-dialog-centered modal-md"
   };

   // Form
  registerForm: FormGroup
  registerFormMessages = {
    'name': [
      { type: 'required', message: 'Name is required' }
    ],
    'email': [
      { type: 'required', message: 'Email is required' },
      { type: 'email', message: 'A valid email is required' }
    ]
  }

  entries: number = 5;
  selected: any[] = [];
  temp = [];
  activeRow: any;
  rows: any = [
    {
      category: "Aeronautical",
      subcategory:"Lapangan Terbang (Aerodrome-AB)",
      datalayer: "Transitional Surface",
    },
    {
      category: "Aeronautical",
      subcategory:"Lapangan Terbang (Aerodrome-AB)",
      datalayer: "Transitional Surface",
    },
    {
      category: "Aeronautical",
      subcategory:"Lapangan Terbang (Aerodrome-AB)",
      datalayer: "Transitional Surface",
    },
    
  ];
  SelectionType = SelectionType;

  constructor(
    private modalService: BsModalService,
  ) {
    this.temp = this.rows.map((prop, key) => {
      return {
        ...prop,
        id: key
      };
    });
  }
  entriesChange($event) {
    this.entries = $event.target.value;
  }
  filterTable($event) {
    let val = $event.target.value;
    this.temp = this.rows.filter(function(d) {
      for (var key in d) {
        if (d[key].toLowerCase().indexOf(val) !== -1) {
          return true;
        }
      }
      return false;
    });
  }
  onSelect({ selected }) {
    this.selected.splice(0, this.selected.length);
    this.selected.push(...selected);
  }
  onActivate(event) {
    this.activeRow = event.row;
  }

displayCheck(){
  this.checkEnabled = !this.checkEnabled;
}

openModal(modalRef: TemplateRef<any>) {
  this.modal = this.modalService.show(modalRef, this.modalConfig);
}

closeModal() {
  this.modal.hide()
  //this.registerForm.reset()
}


confirm() {
  swal.fire({
    title: "Pengesahan",
    text: "Anda pasti untuk simpan aktiviti ini?",
    type: "info",
    buttonsStyling: false,
    confirmButtonClass: "btn btn-info",
    confirmButtonText: "Pasti",
    showCancelButton: true,
    cancelButtonClass: "btn btn-danger",
    cancelButtonText: "Batal"
  }).then((result) => {
    if (result.value) {
      this.success()
    }
  })
}
deleteData() {
  swal.fire({
    title: "Pengesahan",
    text: "Anda pasti untuk buang data ini?",
    type: "warning",
    buttonsStyling: false,
    confirmButtonClass: "btn btn-info",
    confirmButtonText: "Pasti",
    showCancelButton: true,
    cancelButtonClass: "btn btn-danger",
    cancelButtonText: "Batal"
  }).then((result) => {
    if (result.value) {
      this.success()
    }
  })
}

success() {
  swal.fire({
    title: "Berjaya",
    text: "Kemaskini telah berjaya!",
    type: "success",
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

  ngOnInit() {}
}
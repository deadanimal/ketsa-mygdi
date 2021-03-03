import { Component, OnInit,TemplateRef } from '@angular/core';
import swal from 'sweetalert2';
import { FormGroup, FormBuilder, FormControl, Validators } from '@angular/forms';
import Quill from "quill";
import { BsModalRef, BsModalService } from 'ngx-bootstrap';


export enum SelectionType {
  single = "single",
  multi = "multi",
  multiClick = "multiClick",
  cell = "cell",
  checkbox = "checkbox"
}

@Component({
  selector: 'app-management-annoucement',
  templateUrl: './management-annoucement.component.html',
  styleUrls: ['./management-annoucement.component.scss']
})
export class ManagementAnnoucementComponent implements OnInit {

  
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

  // Modal
  modal: BsModalRef;
  modalConfig = {
    keyboard: true,
    class: "modal-dialog-centered modal-md"
  };

  entries: number = -1;
  selected: any[] = [];
  temp = [];
  activeRow: any;
  rows: any = [
    {
      soalan: "Apa itu MyGeo Explorer? ",
    },
    {
      soalan: "Apa itu MyGeo Explorer? ",
    },
    {
      soalan: "Apa itu MyGeo Explorer? ",
    },
    {
      soalan: "Apa itu MyGeo Explorer? ",
    },
    
  ];
  SelectionType = SelectionType;

  constructor(
    private formBuilder: FormBuilder,
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
    var quill = new Quill("#quill", {
      modules: {
        toolbar: [
          ["bold", "italic","underline"],
          ["link"],
          [
            {
              list: "ordered"
            },
            {
              list: "bullet"
            }
          ]
        ]
      },
      placeholder: "Quill WYSIWYG",
      theme: "snow"
    });
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

  openModal(modalRef: TemplateRef<any>) {
    this.modal = this.modalService.show(modalRef, this.modalConfig);
  }

  closeModal() {
    this.modal.hide()
  }


}

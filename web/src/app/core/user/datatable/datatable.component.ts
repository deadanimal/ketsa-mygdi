import { Component, OnInit, OnDestroy, NgZone, TemplateRef } from '@angular/core';
import { User } from 'src/assets/mock/admin-user/users.model'
import { MocksService } from 'src/app/shared/services/mocks/mocks.service';

import * as moment from 'moment';
import * as am4core from "@amcharts/amcharts4/core";
import * as am4charts from "@amcharts/amcharts4/charts";
import am4themes_animated from "@amcharts/amcharts4/themes/animated";
import { BsModalRef, BsModalService } from 'ngx-bootstrap';
am4core.useTheme(am4themes_animated);

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
  selector: 'app-datatable',
  templateUrl: './datatable.component.html',
  styleUrls: ['./datatable.component.scss']
})
export class DatatableComponent implements OnInit {

  // Modal
  modal: BsModalRef;
  modalConfig = {
    keyboard: true,
    class: "modal-dialog-centered modal-lg"
  };

  entries: number = 5;
  selected: any[] = [];
  temp = [];
  activeRow: any;
  rows: any = [
    {
      metadata: "Peta Pemetaan Utiliti Putrajaya AU1302521 ",
      kategori: "Dataset",
      status: "61",
      tindakan: "Semak"
    },
    {
      metadata: "Peta Pemetaan Utiliti Putrajaya AU1302521 ",
      kategori: "Dataset",
      status: "61"
    },
    {
      metadata: "Peta Pemetaan Utiliti Putrajaya AU1302521 ",
      kategori: "Dataset",
      status: "61"
    },
    {
      metadata: "Peta Pemetaan Utiliti Putrajaya AU1302521 ",
      kategori: "Imagery",
      status: "61"
    },
    {
      metadata: "Peta Pemetaan Utiliti Putrajaya AU1302521 ",
      kategori: "Imagery",
      status: "61"
    },
    {
      metadata: "Peta Pemetaan Utiliti Putrajaya AU1302521 ",
      kategori: "Imagery",
      status: "61"
    },
    {
      metadata: "Peta Pemetaan Utiliti Putrajaya AU1302521 ",
      kategori: "Gridded",
      status: "61"
    },
    {
      metadata: "Peta Pemetaan Utiliti Putrajaya AU1302521 ",
      kategori: "Gridded",
      status: "61"
    },
    {
      metadata: "Peta Pemetaan Utiliti Putrajaya AU1302521 ",
      kategori: "Gridded",
      status: "61"
    },
    {
      metadata: "Peta Pemetaan Utiliti Putrajaya AU1302521 ",
      kategori: "Gridded",
      status: "61"
    },
    {
      metadata: "Peta Pemetaan Utiliti Putrajaya AU1302521 ",
      kategori: "Gridded",
      status: "61"
    },
    {
      metadata: "Peta Pemetaan Utiliti Putrajaya AU1302521 ",
      kategori: "Gridded",
      status: "61"
    },
    {
      metadata: "Peta Pemetaan Utiliti Putrajaya AU1302521 ",
      kategori: "Gridded",
      status: "61"
    },
    {
      metadata: "Peta Pemetaan Utiliti Putrajaya AU1302521 ",
      kategori: "Gridded",
      status: "61"
    },
    {
      metadata: "Peta Pemetaan Utiliti Putrajaya AU1302521 ",
      kategori: "Gridded",
      status: "61"
    },
  ];
  SelectionType = SelectionType;

  constructor(
    private mockService: MocksService,
    private modalService: BsModalService,
    private formBuilder: FormBuilder,
    private zone: NgZone
  ){
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

  

  ngOnInit() {
    this.registerForm = this.formBuilder.group({
      name: new FormControl('', Validators.compose([
        Validators.required
      ])),
      email: new FormControl('', Validators.compose([
        Validators.required,
        Validators.email
      ]))
    })
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
      title: "Confirmation",
      text: "Are you sure to create this new user?",
      type: "info",
      buttonsStyling: false,
      confirmButtonClass: "btn btn-info",
      confirmButtonText: "Confirm",
      showCancelButton: true,
      cancelButtonClass: "btn btn-danger",
      cancelButtonText: "Cancel"
    }).then((result) => {
      if (result.value) {
        this.register()
      }
    })
  }

  register() {
    swal.fire({
      title: "Success",
      text: "A new user has been created!",
      type: "success",
      buttonsStyling: false,
      confirmButtonClass: "btn btn-success",
      confirmButtonText: "Close"
    }).then((result) => {
      if (result.value) {
        this.modal.hide()
        this.registerForm.reset()
      }
    })
  }

}
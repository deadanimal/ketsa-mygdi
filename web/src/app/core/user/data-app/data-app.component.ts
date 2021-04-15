import {
  Component,
  OnInit,
  OnDestroy,
  NgZone,
  TemplateRef,
} from "@angular/core";
import swal from "sweetalert2";
import {
  FormGroup,
  FormBuilder,
  Validators,
  FormControl,
} from "@angular/forms";
import { BsDropdownConfig } from "ngx-bootstrap/dropdown";
import { Router } from "@angular/router";
import { LoadingBarService } from "@ngx-loading-bar/core";
import { BsModalRef, BsModalService } from "ngx-bootstrap";

export enum SelectionType {
  single = "single",
  multi = "multi",
  multiClick = "multiClick",
  cell = "cell",
  checkbox = "checkbox",
}

@Component({
  selector: "app-data-app",
  templateUrl: "./data-app.component.html",
  styleUrls: ["./data-app.component.scss"],
})
export class DataAppComponent implements OnInit {
  // Toggle
  checkEnabled: boolean = false;

  // Modal
  modal: BsModalRef;
  modalConfig = {
    keyboard: true,
    class: "modal-dialog-centered modal-lg",
  };

  entries: number = 5;
  selected: any[] = [];
  temp = [];
  activeRow: any;
  rows: any = [
    {
      namapermohonan: "Permohonan Data Sungai Selangor ",
      namapemohon: "Muhammad Rahman bin Talib",
      kategori: "G2E-Pelajar",
      subkategori: "",
      tarikh: "25/02/2021",
    },
    {
      namapermohonan: "Permohonan Data Sungai Selangor ",
      namapemohon: "Muhammad Rahman bin Talib",
      kategori: "G2E-Pelajar",
      subkategori: "",
      tarikh: "25/02/2021",
    },
    {
      namapermohonan: "Permohonan Data Sungai Selangor ",
      namapemohon: "Muhammad Rahman bin Talib",
      kategori: "G2E-Pelajar",
      subkategori: "",
      tarikh: "25/02/2021",
    },
    {
      namapermohonan: "Permohonan Data Sungai Selangor ",
      namapemohon: "Muhammad Rahman bin Talib",
      kategori: "G2E-Pelajar",
      subkategori: "",
      tarikh: "25/02/2021",
    },
  ];
  SelectionType = SelectionType;

  constructor (private modalService: BsModalService) {
    this.temp = this.rows.map((prop, key) => {
      return {
        ...prop,
        id: key,
      };
    });
  }

  openModal(modalRef: TemplateRef<any>) {
    this.modal = this.modalService.show(modalRef, this.modalConfig);
  }

  closeModal() {
    this.modal.hide();
  }
  entriesChange($event) {
    this.entries = $event.target.value;
  }
  filterTable($event) {
    let val = $event.target.value;
    this.temp = this.rows.filter(function (d) {
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

  displayCheck() {
    this.checkEnabled = !this.checkEnabled;
  }

  deleteRow() {
    swal
      .fire({
        title: "Pengesahan",
        text: "Anda pasti untuk buang data ini?",
        type: "warning",
        buttonsStyling: false,
        confirmButtonClass: "btn btn-info",
        confirmButtonText: "Pasti",
        showCancelButton: true,
        cancelButtonClass: "btn btn-danger",
        cancelButtonText: "Batal",
      })
      .then((result) => {
        if (result.value) {
          this.success();
        }
      });
  }

  success() {
    swal
      .fire({
        title: "Berjaya",
        text: "Data telah dibuang!",
        type: "success",
        buttonsStyling: false,
        confirmButtonClass: "btn btn-success",
        confirmButtonText: "Tutup",
      })
      .then((result) => {
        if (result.value) {
          this.modal.hide();
        }
      });
  }

  ngOnInit() {}
}

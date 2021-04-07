import { Component, OnInit, TemplateRef } from '@angular/core';
import { BsModalRef,BsModalService } from 'ngx-bootstrap';

export enum SelectionType {
  single = "single",
  multi = "multi",
  multiClick = "multiClick",
  cell = "cell",
  checkbox = "checkbox"
}

@Component({
  selector: 'app-management-processdata',
  templateUrl: './management-processdata.component.html',
  styleUrls: ['./management-processdata.component.scss']
})
export class ManagementProcessdataComponent implements OnInit {

  // Modal
  modal: BsModalRef;
  modalConfig = {
    keyboard: true,
    class: "modal-dialog-centered modal-xl"
  };

  entries: number = 5;
  entries2: number = -1;
  selected: any[] = [];
  temp = [];
  activeRow: any;
  rows: any = [
    {
      namapermohonan: "Permohonan Data Sungai Selangor ",
      namapemohon: "Muhammad Rahman bin Talib",
      kategori: "G2E-Pelajar",
      subkategori:"",
      tarikh: "25/02/2021",
    },
    {
      namapermohonan: "Permohonan Data Sungai Selangor ",
      namapemohon: "Muhammad Rahman bin Talib",
      kategori: "G2E-Pelajar",
      subkategori:"",
      tarikh: "25/02/2021",
    },
    {
      namapermohonan: "Permohonan Data Sungai Selangor ",
      namapemohon: "Muhammad Rahman bin Talib",
      kategori: "G2E-Pelajar",
      subkategori:"",
      tarikh: "25/02/2021",
    },
    {
      namapermohonan: "Permohonan Data Sungai Selangor ",
      namapemohon: "Muhammad Rahman bin Talib",
      kategori: "G2E-Pelajar",
      subkategori:"",
      tarikh: "25/02/2021",
    },
  ];
  SelectionType = SelectionType;

  constructor(
    private modalService: BsModalService,) {
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

  ngOnInit() {}

  openModal(modalRef: TemplateRef<any>) {
    this.modal = this.modalService.show(modalRef, this.modalConfig);
  }

  closeModal() {
    this.modal.hide()
  }
}
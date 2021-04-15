import { Component, OnInit, TemplateRef } from '@angular/core';
import { BsModalRef, BsModalService } from 'ngx-bootstrap';
import Dropzone from "dropzone";
Dropzone.autoDiscover = false;
import { HttpClient } from '@angular/common/http';
import { FormGroup, FormControl, Validators} from '@angular/forms';

export enum SelectionType {
  single = "single",
  multi = "multi",
  multiClick = "multiClick",
  cell = "cell",
  checkbox = "checkbox"
  
}

@Component({
  selector: 'app-valuation',
  templateUrl: './valuation.component.html',
  styleUrls: ['./valuation.component.scss']
})
export class ValuationComponent implements OnInit {

  checkOther = "null";
  imageSrc: string;
   myForm = new FormGroup({
    file: new FormControl('', [Validators.required]),
    fileSource: new FormControl('', [Validators.required])
  });

  // Toggle
  editEnabled: boolean = true

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

  openModal(modalRef: TemplateRef<any>) {
    this.modal = this.modalService.show(modalRef, this.modalConfig);
  }

  closeModal() {
    this.modal.hide()
  }

  toggleForm() {
    this.editEnabled = !this.editEnabled;
  }

  ngOnInit() {}

  get f(){
    return this.myForm.controls;
  }

  onFileChange(event) {
    const reader = new FileReader();
    
    if(event.target.files && event.target.files.length) {
      const [file] = event.target.files;
      reader.readAsDataURL(file);
    
      reader.onload = () => {
   
        this.imageSrc = reader.result as string;
        //alert(this.imageSrc)
        this.myForm.patchValue({
          fileSource: reader.result
        });
   
      };
   
    }
  }
}
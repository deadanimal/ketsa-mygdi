import { Component, OnInit, TemplateRef } from '@angular/core';
import { BsModalRef, BsModalService } from 'ngx-bootstrap';

export enum SelectionType {
  single = "single",
  multi = "multi",
  multiClick = "multiClick",
  cell = "cell",
  checkbox = "checkbox"
}

@Component({
  selector: 'app-datalist',
  templateUrl: './datalist.component.html',
  styleUrls: ['./datalist.component.scss']
})
export class DatalistComponent implements OnInit {

  // Toggle
  checkEnabled: boolean = false

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

  ngOnInit() {}
}
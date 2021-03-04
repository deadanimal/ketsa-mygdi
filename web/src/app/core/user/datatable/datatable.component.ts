import { Component, OnInit } from '@angular/core';

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

  constructor() {
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
}

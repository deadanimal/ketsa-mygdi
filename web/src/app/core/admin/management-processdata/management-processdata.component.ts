import { Component, OnInit } from '@angular/core';

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

  entries: number = 5;
  selected: any[] = [];
  temp = [];
  activeRow: any;
  rows: any = [
    {
      metadata: "Peta Pemetaan Utiliti Putrajaya AU1302521 ",
      kategori: "Edinburgh",
      tarikh: "25/02/2021",
      
    },
    {
      metadata: "Peta Pemetaan Utiliti Putrajaya AU1302521 ",
      kategori: "Edinburgh",
      tarikh: "25/02/2021",
      
    },
    {
      metadata: "Peta Pemetaan Utiliti Putrajaya AU1302521 ",
      kategori: "Edinburgh",
      tarikh: "25/02/2021",
      
    },
    {
      metadata: "Peta Pemetaan Utiliti Putrajaya AU1302521 ",
      kategori: "Edinburgh",
      tarikh: "25/02/2021",
      
    },
    {
      metadata: "Peta Pemetaan Utiliti Putrajaya AU1302521 ",
      kategori: "Edinburgh",
      tarikh: "25/02/2021",
      
    },
    {
      metadata: "Peta Pemetaan Utiliti Putrajaya AU1302521 ",
      kategori: "Edinburgh",
      tarikh: "25/02/2021",
      
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
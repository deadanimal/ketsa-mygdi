import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-data-list',
  templateUrl: './data-list.component.html',
  styleUrls: ['./data-list.component.scss']
})
export class DataListComponent implements OnInit {

  selectData = null;
  public prevnum = null;

  constructor() { }

  ngOnInit() {
  }

  onSelect() {
    this.selectData = 1;
  }
  onSelect2() {
    this.selectData = 2;
  }

  activate(num: number) {
    
    let cid = "target" + num
    this.selectData = num;
    this.prevnum = num;
    document.getElementById(cid).style.color = "red"
  }

  reset(){
    let previd = "target" + this.prevnum
    document.getElementById(previd).style.color = "black"
  }



}

import { Component, OnInit, TemplateRef } from "@angular/core";
import swal from "sweetalert2";
import { BsModalRef, BsModalService } from "ngx-bootstrap";

export enum SelectionType {
  single = "single",
  multi = "multi",
  multiClick = "multiClick",
  cell = "cell",
  checkbox = "checkbox",
}

@Component({
  selector: "app-download",
  templateUrl: "./download.component.html",
  styleUrls: ["./download.component.scss"],
})
export class DownloadComponent implements OnInit {
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

  constructor(private modalService: BsModalService) {
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

  confirm() {
    swal
      .fire({
        title: "Pengesahan",
        text: "Adakah anda berjaya memuat turun data?",
        type: "info",
        buttonsStyling: false,
        confirmButtonClass: "btn btn-info",
        confirmButtonText: "Ya",
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
        text: "Data telah berjaya dimuat turun!",
        type: "success",
        buttonsStyling: false,
        confirmButtonClass: "btn btn-success",
        confirmButtonText: "Tutup",
      })
      .then((result) => {
        if (result.value) {
          this.test();
        }
      });
  }

  async test() {
    const { value: accept } = await swal.fire({
      title: "Akuan Penerimaan Data",
      type: "warning",
      input: "checkbox",
      inputPlaceholder: "Sila klik kotak 'checkbox' untuk mengesah akuan penerimaan data",
      buttonsStyling: false,
      confirmButtonClass: "btn btn-warning",
      confirmButtonText: 'Seterusnya&nbsp;<i class="fa fa-arrow-right"></i>',
      footer: '<a href>Baca Akuan Penerimaan Data</a>',
      inputValidator: (result) => {
        return !result && "Anda perlu sahkan akuan penerimaan data ini!";
      },
    });

    if (accept) {
      swal.fire({
        title: "Akuan Penerimaan Data",
        text: "Berjaya disahkan!",
        type: "success",
        showConfirmButton: false,
        timer: 1700,
      });
    }
  }

  ngOnInit() {}
}

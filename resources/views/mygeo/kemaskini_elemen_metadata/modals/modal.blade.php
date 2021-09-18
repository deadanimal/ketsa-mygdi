<div class="modal fade" id="modalKategori">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Kategori</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formTambahKategori" method="POST" action="{{ url('simpan_kategori') }}" class="theForm">
                @csrf
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label for="kategori">Kategori:</label>
                                    <input type="text" name="kategori" class="form-control kategori">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between1">
                    <button type="button" class="btn btn-primary btnSimpan" data-dismiss="modal">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="modalTajuk">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Tajuk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formTambahTajuk" method="POST" action="{{ url('simpan_tajuk') }}" class="theForm">
                @csrf
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label for="kategori">Kategori:</label>
                                    <select name="kategori" class="form-control kategori">
                                        <option value="">Pilih...</option>
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat-> id }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tajuk">Tajuk:</label>
                                    <input type="text" name="tajuk" class="form-control tajuk">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between1">
                    <button type="button" class="btn btn-primary btnSimpan" data-dismiss="modal">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="modalSubTajuk">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Sub-Tajuk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formTambahSubTajuk" method="POST" action="{{ url('simpan_tajuk') }}" class="theForm">
                @csrf
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label for="kategori">Kategori:</label>
                                    <select name="kategori" class="form-control kategori">
                                        <option value="">Pilih...</option>
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat-> id }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tajuk">Tajuk:</label>
                                    <select name="tajuk" class="form-control tajuk">
                                        <option value="">Pilih...</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sub_tajuk">Sub-Tajuk:</label>
                                    <input type="text" name="sub_tajuk" class="form-control sub_tajuk">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between1">
                    <button type="button" class="btn btn-primary btnSimpan" data-dismiss="modal">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="modalElemen">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Elemen</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formTambahElemen" method="POST" action="{{ url('simpan_elemen') }}" class="theForm">
                @csrf
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="kategori">Kategori:</label>
                                    <select name="kategori" class="form-control kategori">
                                        <option value="">Pilih...</option>
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat-> id }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tajuk">Tajuk:</label>
                                    <select name="tajuk" class="form-control tajuk">
                                        <option value="">Pilih...</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sub_tajuk">Sub-Tajuk:</label>
                                    <select name="sub_tajuk" class="form-control sub_tajuk">
                                        <option value="">Pilih...</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="elemen">Elemen:</label>
                                    <input type="text" name="elemen" class="form-control elemen">
                                </div>
                                <div class="form-group">
                                    <label for="elemen">Jenis Input:</label>
                                    <select name="jenis_input" class="form-control jenis_input">
                                        <option value="">Pilih...</option>
                                        <option value="Text">Text</option>
                                        <option value="Dropdown">Dropdown</option>
                                        <option value="Checkbox">Checkbox</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="data_type">Data Type:</label>
                                    <select name="data_type" class="form-control data_type">
                                        <option value="">Pilih...</option>
                                        <option value="Varchar">Varchar</option>
                                        <option value="Rext">Rext</option>
                                        <option value="Integer">Integer</option>
                                        <option value="Date">Date</option>
                                        <option value="Timestamp">Timestamp</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between1">
                    <button type="button" class="btn btn-primary btnSimpan" data-dismiss="modal">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="modalCustomInput">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Custom Input</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formTambahCustomInput" method="POST" action="{{ url('simpan_custom_input') }}" class="theForm">
                @csrf
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Nama EN:</label>
                                    <input type="text" name="name" class="form-control name">
                                </div>
                                <div class="form-group">
                                    <label for="name_bm">Nama BM:</label>
                                    <input type="text" name="name_bm" class="form-control name_bm">
                                </div>
                                <div class="form-group">
                                    <label for="kategori">Kategori:</label>
                                    <select name="kategori" class="form-control thekategori">
                                        <option value="">Pilih...</option>
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat-> id }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
<!--                                <div class="form-group">
                                    <label for="input_type">Data Type:</label>
                                    <select name="input_type" class="form-control input_type" readonly>
                                        <option value="">Pilih...</option>
                                        <option value="Text" selected disabled>Text</option>
                                        <option value="Textarea">Textarea</option>
                                        <option value="Dropdown">Dropdown</option>
                                        <option value="Date">Date</option>
                                        <option value="Number">Number</option>
                                    </select>
                                </div>-->
                                <div class="form-group">
                                    <label for="mandatory">Mandatory:</label>
                                    <select name="mandatory" class="form-control mandatory">
                                        <option value="">Pilih...</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
<!--                                <div class="form-group">
                                    <label for="status">Status:</label>
                                    <select name="status" class="form-control status">
                                        <option value="">Pilih...</option>
                                        <option value="Active" selected disabled>Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between1">
                    <button type="button" class="btn btn-primary btnSimpan">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalKemaskiniCustomInput">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Kemaskini Custom Input</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formKemaskiniCustomInput" method="POST" action="{{ url('simpan_kemaskini_custom_input') }}" class="theForm">
                @csrf
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12 ajaxHtml">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between1">
                    <button type="button" class="btn btn-primary btnSimpan">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
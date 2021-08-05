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
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="label">Label:</label>
                                    <input type="text" name="label" class="form-control label">
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
            <form id="formTambahSubTajuk" method="POST" action="{{ url('simpan_sub_tajuk') }}" class="theForm">
                @csrf
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label for="kategori">Kategori:</label>
                                    <select name="kategori" class="form-control kategori">
                                        <option value="">Pilih...</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="label">Label:</label>
                                    <select name="label" class="form-control label">
                                        <option value="">Pilih...</option>
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
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="label">Label:</label>
                                    <select name="label" class="form-control label">
                                        <option value="">Pilih...</option>
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
                                    <label for="data_type">Data Type:</label>
                                    <select name="data_type" class="form-control data_type">
                                        <option value="">Pilih...</option>
                                        <option value="">varchar</option>
                                        <option value="">text</option>
                                        <option value="">integer</option>
                                        <option value="">date</option>
                                        <option value="">timestamp</option>
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
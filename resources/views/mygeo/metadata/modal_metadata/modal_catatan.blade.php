  <!--===== MODALS START =====-->
  <div class="modal fade" id="modal1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Catatan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="modal-body">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                      @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
                        {{ (trim($metadataSearched->catatan1) != "" ? $metadataSearched->catatan1:"- Tiada Catatan - ") }}
                      @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin']))
                        <textarea name="catatan1" placeholder="Masukkan catatan..." class="form-control">{{ $metadataSearched->catatan1 }}</textarea>
                      @endif
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between1">
              @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
              @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin']))
                <button type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button>
              @endif
          </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modal2">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Catatan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="modal-body">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                      @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
                        {{ (trim($metadataSearched->catatan2) != "" ? $metadataSearched->catatan2:"- Tiada Catatan - ") }}
                      @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin']))
                        <textarea name="catatan2" placeholder="Masukkan catatan..." class="form-control">{{ $metadataSearched->catatan2 }}</textarea>
                      @endif
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between1">
            @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
              @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin']))
                <button type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button>
              @endif
          </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modal3">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Catatan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="modal-body">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                      @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
                        {{ (trim($metadataSearched->catatan3) != "" ? $metadataSearched->catatan3:"- Tiada Catatan - ") }}
                      @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin']))
                        <textarea name="catatan3" placeholder="Masukkan catatan..." class="form-control">{{ $metadataSearched->catatan3 }}</textarea>
                      @endif
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between1">
            @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
              @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin']))
                <button type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button>
              @endif
          </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modal4">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Catatan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="modal-body">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                      @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
                        {{ (trim($metadataSearched->catatan4) != "" ? $metadataSearched->catatan4:"- Tiada Catatan - ") }}
                      @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin']))
                        <textarea name="catatan4" placeholder="Masukkan catatan..." class="form-control">{{ $metadataSearched->catatan4 }}</textarea>
                      @endif
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between1">
            @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
              @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin']))
                <button type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button>
              @endif
          </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modal5">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Catatan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="modal-body">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                      @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
                        {{ (trim($metadataSearched->catatan5) != "" ? $metadataSearched->catatan5:"- Tiada Catatan - ") }}
                      @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin']))
                        <textarea name="catatan5" placeholder="Masukkan catatan..." class="form-control">{{ $metadataSearched->catatan5 }}</textarea>
                      @endif
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between1">
            @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
              @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin']))
                <button type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button>
              @endif
          </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modal6">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Catatan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="modal-body">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                      @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
                        {{ (trim($metadataSearched->catatan6) != "" ? $metadataSearched->catatan6:"- Tiada Catatan - ") }}
                      @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin']))
                        <textarea name="catatan6" placeholder="Masukkan catatan..." class="form-control">{{ $metadataSearched->catatan6 }}</textarea>
                      @endif
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between1">
            @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
              @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin']))
                <button type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button>
              @endif
          </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modal7">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Catatan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="modal-body">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                      @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
                        {{ (trim($metadataSearched->catatan7) != "" ? $metadataSearched->catatan7:"- Tiada Catatan - ") }}
                      @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin']))
                        <textarea name="catatan7" placeholder="Masukkan catatan..." class="form-control">{{ $metadataSearched->catatan7 }}</textarea>
                      @endif
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between1">
            @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
              @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin']))
                <button type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button>
              @endif
          </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modal8">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Catatan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="modal-body">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                      @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
                        {{ (trim($metadataSearched->catatan8) != "" ? $metadataSearched->catatan8:"- Tiada Catatan - ") }}
                      @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin']))
                        <textarea name="catatan8" placeholder="Masukkan catatan..." class="form-control">{{ $metadataSearched->catatan8 }}</textarea>
                      @endif
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between1">
            @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
              @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin']))
                <button type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button>
              @endif
          </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modal9">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Catatan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="modal-body">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                      @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
                        {{ (trim($metadataSearched->catatan9) != "" ? $metadataSearched->catatan9:"- Tiada Catatan - ") }}
                      @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin']))
                        <textarea name="catatan9" placeholder="Masukkan catatan..." class="form-control">{{ $metadataSearched->catatan9 }}</textarea>
                      @endif
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between1">
            @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
              @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin']))
                <button type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button>
              @endif
          </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modal10">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Catatan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="modal-body">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                      @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
                        {{ (trim($metadataSearched->catatan10) != "" ? $metadataSearched->catatan10:"- Tiada Catatan - ") }}
                      @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin']))
                        <textarea name="catatan10" placeholder="Masukkan catatan..." class="form-control">{{ $metadataSearched->catatan10 }}</textarea>
                      @endif
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between1">
            @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
              @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin']))
                <button type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button>
              @endif
          </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modal11">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Catatan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="modal-body">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                      @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
                        {{ (trim($metadataSearched->catatan11) != "" ? $metadataSearched->catatan11:"- Tiada Catatan - ") }}
                      @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin']))
                        <textarea name="catatan11" placeholder="Masukkan catatan..." class="form-control">{{ $metadataSearched->catatan11 }}</textarea>
                      @endif
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between1">
            @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
              @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin']))
                <button type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button>
              @endif
          </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modal12">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Catatan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="modal-body">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                      @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
                        {{ (trim($metadataSearched->catatan12) != "" ? $metadataSearched->catatan12:"- Tiada Catatan - ") }}
                      @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin']))
                        <textarea name="catatan12" placeholder="Masukkan catatan..." class="form-control">{{ $metadataSearched->catatan12 }}</textarea>
                      @endif
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between1">
            @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
              @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin']))
                <button type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button>
              @endif
          </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modal13">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Catatan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="modal-body">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                      @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
                        {{ (trim($metadataSearched->catatan13) != "" ? $metadataSearched->catatan13:"- Tiada Catatan - ") }}
                      @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin']))
                        <textarea name="catatan13" placeholder="Masukkan catatan..." class="form-control">{{ $metadataSearched->catatan13 }}</textarea>
                      @endif
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between1">
            @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
              @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin']))
                <button type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button>
              @endif
          </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modal14">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Catatan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="modal-body">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                      @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
                        {{ (trim($metadataSearched->catatan14) != "" ? $metadataSearched->catatan14:"- Tiada Catatan - ") }}
                      @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin']))
                        <textarea name="catatan14" placeholder="Masukkan catatan..." class="form-control">{{ $metadataSearched->catatan14 }}</textarea>
                      @endif
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between1">
            @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
              @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin']))
                <button type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button>
              @endif
          </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modal15">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Catatan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="modal-body">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                      @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
                        {{ (trim($metadataSearched->catatan15) != "" ? $metadataSearched->catatan15:"- Tiada Catatan - ") }}
                      @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin']))
                        <textarea name="catatan15" placeholder="Masukkan catatan..." class="form-control">{{ $metadataSearched->catatan15 }}</textarea>
                      @endif
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between1">
            @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
              @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin']))
                <button type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button>
              @endif
          </div>
      </div>
    </div>
  </div>
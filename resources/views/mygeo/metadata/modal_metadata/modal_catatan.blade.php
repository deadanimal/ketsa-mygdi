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
                        <span class="catatan" data-parentmodal="modal1">{{ (trim($metadataSearched->catatan1) != "" ? $metadataSearched->catatan1:"- Tiada Catatan -") }}</span>
                      @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin','Pentadbir Aplikasi']))
                        <textarea name="catatan1" placeholder="Masukkan catatan..." data-parentmodal="modal1" class="form-control catatan">{{ $metadataSearched->catatan1 }}</textarea>
                      @endif
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between1">
              @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
              @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin','Pentadbir Aplikasi']))
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
                        <span class="catatan" data-parentmodal="modal2">{{ (trim($metadataSearched->catatan2) != "" ? $metadataSearched->catatan2:"- Tiada Catatan -") }}</span>
                      @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin','Pentadbir Aplikasi']))
                        <textarea name="catatan2" placeholder="Masukkan catatan..." data-parentmodal="modal2" class="form-control catatan">{{ $metadataSearched->catatan2 }}</textarea>
                      @endif
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between1">
            @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
              @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin','Pentadbir Aplikasi']))
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
                        <span class="catatan" data-parentmodal="modal3">{{ (trim($metadataSearched->catatan3) != "" ? $metadataSearched->catatan3:"- Tiada Catatan -") }}</span>
                      @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin','Pentadbir Aplikasi']))
                        <textarea name="catatan3" placeholder="Masukkan catatan..." data-parentmodal="modal3" class="form-control catatan">{{ $metadataSearched->catatan3 }}</textarea>
                      @endif
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between1">
            @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
              @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin','Pentadbir Aplikasi']))
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
                      <span class="catatan" data-parentmodal="modal4">{{ (trim($metadataSearched->catatan4) != "" ? $metadataSearched->catatan4:"- Tiada Catatan -") }}</span>
                      @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin','Pentadbir Aplikasi']))
                        <textarea name="catatan4" placeholder="Masukkan catatan..." data-parentmodal="modal4" class="form-control catatan">{{ $metadataSearched->catatan4 }}</textarea>
                      @endif
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between1">
            @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
              @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin','Pentadbir Aplikasi']))
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
                        <span class="catatan" data-parentmodal="modal5">{{ (trim($metadataSearched->catatan5) != "" ? $metadataSearched->catatan5:"- Tiada Catatan -") }}</span>
                      @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin','Pentadbir Aplikasi']))
                        <textarea name="catatan5" placeholder="Masukkan catatan..." data-parentmodal="modal5" class="form-control catatan">{{ $metadataSearched->catatan5 }}</textarea>
                      @endif
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between1">
            @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
              @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin','Pentadbir Aplikasi']))
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
                        <span class="catatan" data-parentmodal="modal6">{{ (trim($metadataSearched->catatan6) != "" ? $metadataSearched->catatan6:"- Tiada Catatan -") }}</span>
                      @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin','Pentadbir Aplikasi']))
                        <textarea name="catatan6" placeholder="Masukkan catatan..." data-parentmodal="modal6" class="form-control catatan">{{ $metadataSearched->catatan6 }}</textarea>
                      @endif
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between1">
            @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
              @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin','Pentadbir Aplikasi']))
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
                        <span class="catatan" data-parentmodal="modal7">{{ (trim($metadataSearched->catatan7) != "" ? $metadataSearched->catatan7:"- Tiada Catatan -") }}</span>
                      @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin','Pentadbir Aplikasi']))
                        <textarea name="catatan7" placeholder="Masukkan catatan..." data-parentmodal="modal7" class="form-control catatan">{{ $metadataSearched->catatan7 }}</textarea>
                      @endif
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between1">
            @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
              @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin','Pentadbir Aplikasi']))
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
                        <span class="catatan" data-parentmodal="modal8">{{ (trim($metadataSearched->catatan8) != "" ? $metadataSearched->catatan8:"- Tiada Catatan -") }}</span>
                      @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin','Pentadbir Aplikasi']))
                        <textarea name="catatan8" placeholder="Masukkan catatan..." data-parentmodal="modal8" class="form-control catatan">{{ $metadataSearched->catatan8 }}</textarea>
                      @endif
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between1">
            @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
              @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin','Pentadbir Aplikasi']))
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
                        <span class="catatan" data-parentmodal="modal9">{{ (trim($metadataSearched->catatan9) != "" ? $metadataSearched->catatan9:"- Tiada Catatan -") }}</span>
                      @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin','Pentadbir Aplikasi']))
                        <textarea name="catatan9" placeholder="Masukkan catatan..." data-parentmodal="modal9" class="form-control catatan">{{ $metadataSearched->catatan9 }}</textarea>
                      @endif
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between1">
            @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
              @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin','Pentadbir Aplikasi']))
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
                        <span class="catatan" data-parentmodal="modal10">{{ (trim($metadataSearched->catatan10) != "" ? $metadataSearched->catatan10:"- Tiada Catatan -") }}</span>
                      @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin','Pentadbir Aplikasi']))
                        <textarea name="catatan10" placeholder="Masukkan catatan..." data-parentmodal="modal10" class="form-control catatan">{{ $metadataSearched->catatan10 }}</textarea>
                      @endif
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between1">
            @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
              @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin','Pentadbir Aplikasi']))
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
                        <span class="catatan" data-parentmodal="modal11">{{ (trim($metadataSearched->catatan11) != "" ? $metadataSearched->catatan11:"- Tiada Catatan -") }}</span>
                      @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin','Pentadbir Aplikasi']))
                        <textarea name="catatan11" placeholder="Masukkan catatan..." data-parentmodal="modal11" class="form-control catatan">{{ $metadataSearched->catatan11 }}</textarea>
                      @endif
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between1">
            @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
              @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin','Pentadbir Aplikasi']))
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
                        <span class="catatan" data-parentmodal="modal12">{{ (trim($metadataSearched->catatan12) != "" ? $metadataSearched->catatan12:"- Tiada Catatan -") }}</span>
                      @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin','Pentadbir Aplikasi']))
                        <textarea name="catatan12" placeholder="Masukkan catatan..." data-parentmodal="modal12" class="form-control catatan">{{ $metadataSearched->catatan12 }}</textarea>
                      @endif
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between1">
            @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
              @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin','Pentadbir Aplikasi']))
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
                        <span class="catatan" data-parentmodal="modal13">{{ (trim($metadataSearched->catatan13) != "" ? $metadataSearched->catatan13:"- Tiada Catatan -") }}</span>
                      @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin','Pentadbir Aplikasi']))
                        <textarea name="catatan13" placeholder="Masukkan catatan..." data-parentmodal="modal13" class="form-control catatan">{{ $metadataSearched->catatan13 }}</textarea>
                      @endif
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between1">
            @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
              @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin','Pentadbir Aplikasi']))
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
                        <span class="catatan" data-parentmodal="modal14">{{ (trim($metadataSearched->catatan14) != "" ? $metadataSearched->catatan14:"- Tiada Catatan -") }}</span>
                      @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin','Pentadbir Aplikasi']))
                        <textarea name="catatan14" placeholder="Masukkan catatan..." data-parentmodal="modal14" class="form-control catatan">{{ $metadataSearched->catatan14 }}</textarea>
                      @endif
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between1">
            @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
              @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin','Pentadbir Aplikasi']))
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
                        <span class="catatan" data-parentmodal="modal15" data-parentmodal="modal15">{{ (trim($metadataSearched->catatan15) != "" ? $metadataSearched->catatan15:"- Tiada Catatan -") }}</span>
                      @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin','Pentadbir Aplikasi']))
                        <textarea name="catatan15" placeholder="Masukkan catatan..." data-parentmodal="modal15" class="form-control catatan">{{ $metadataSearched->catatan15 }}</textarea>
                      @endif
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between1">
            @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
              @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin','Pentadbir Aplikasi']))
                <button type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button>
              @endif
          </div>
      </div>
    </div>
  </div>
@extends ('layouts.layout')

@section('content')
    <div class="page-title d-flex flex-column gap-1 mx-5 my-5  ">

        <div id="kt_app_content"
            class="app-content flex-column-fluid rounded bg-light  mb-20 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">
            <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100 mb-5 px-5 border-bottom border-5">
                <!--begin::Page title-->
                <h2>Profile Anda</h2>
                <!--begin::Main wrapper-->

                <!--end::Main wrapper-->
                <div>
                    <a href="{{ route('dashboard') }}" type="button" class="btn btn-secondary text-white btn-sm mb-2 mr-2"
                    style="background: #505050"><i class="bi bi-chevron-left text-white"></i>Kembali</a>
                    <button data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="btn btn-secondary text-white btn-sm mb-2"
                    style="background: #fdaf1f"><i class="bi bi-pencil text-white"></i>Ubah Data</button>
                </div>
                <!--end::Title-->
            </div>
            <!--begin::Content container-->
            <div class="container">
                <div class="row">
                    <div class="col">
                        <p class="h3">Nama</p>
                    </div>
                    <div class="col">
                        <div class="h3 font-weight-normal">: {{Auth::user()->name}}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p class="h3">Email</p>
                    </div>
                    <div class="col">
                        <p class="h3 font-weight-normal">: {{Auth::user()->email}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p class="h3">Jabatan</p>
                    </div>
                    <div class="col">
                        <p class="h3 font-weight-normal">: {{Auth::user()->hak_akses}}</p>
                    </div>
                </div>
            </div>

            <!--Edit Modal-->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Ubah Data Profile</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <title>

                            </title>
                        </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>
            <!--END Modal-->


            <!--end::Content container-->
        </div>
    </div>
@stop

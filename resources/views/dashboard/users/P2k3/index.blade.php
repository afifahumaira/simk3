@extends ('layouts.layout')

@section('content')
    <div class="page-title d-flex flex-column gap-1 mx-5 my-5  ">

        <div id="kt_app_content"
            class="app-content flex-column-fluid rounded bg-light  mb-20 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">

            <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100 mb-5 px-5 border-bottom border-5">
                <!--begin::Page title-->
                <h2>Data User P2K3</h2>

                <!--begin::Main wrapper-->
                <div id="kt_docs_search_handler_basic" data-kt-search-keypress="true" data-kt-search-min-length="2"
                    data-kt-search-enter="true" data-kt-search-layout="inline">

                    <!--begin::Input Form-->
                    <form data-kt-search-element="form" class="w-100 position-relative mb-5 shadow rounded"
                        autocomplete="off">
                        <!--begin::Hidden input(Added to disable form autocomplete)-->
                        <input type="hidden" />
                        <!--end::Hidden input-->

                        <!--begin::Icon-->
                        <i
                            class="ki-duotone ki-magnifier fs-2 fs-lg-1 text-gray-500 position-absolute top-50 ms-5 translate-middle-y"><span
                                class="path1"></span><span class="path2"></span></i>
                        <!--begin::Svg Icon | path: magnifier-->
                        <!--end::Icon-->

                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-lg form-control-solid px-15"
                            name="search" value="" placeholder="Search " data-kt-search-element="input" />
                        <!--end::Input-->

                        <!--begin::Spinner-->
                        <span class="position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-5"
                            data-kt-search-element="spinner">
                            <span class="spinner-border h-15px w-15px align-middle text-gray-400"></span>
                        </span>
                        <!--end::Spinner-->

                        <!--begin::Reset-->
                        <span
                            class="btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 me-5 d-none"
                            data-kt-search-element="clear">

                            <!--begin::Svg Icon | path: cross-->
                        </span>
                        <!--end::Reset-->
                    </form>
                    <!--end::Form-->

                    <!--begin::Wrapper-->
                    <!--end::Wrapper-->
                </div>
                <!--end::Main wrapper-->
                <a href="{{ route('p2k3.tambah') }}" type="button" class="btn btn-primary btn-sm"
                    style="background: #233EAE">Tambah Data +</a>
                <!--end::Title-->
            </div>
            <!--begin::Content container-->
            <table class="table table-bordered border-secondary px-3 py-3 mb-5 shadow">
                <thead px-3>
                    <tr>
                        <th scope="col" class="text-center">NO</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Departemen</th>
                        <th scope="col">Foto Profil</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($datas as $data)
                    <tr>
                        <td scope="row" class="text-center">{{ ($datas->currentpage()-1) * $datas ->perpage() + $loop->index + 1 }}</td>
                        <td>{{$data->nama}}</td>
                        <td>{{$data->user->email}}</td>
                        <td>{{$data->jabatan}}</td>
                        <td>{{$data->departemen}}</td>
                        <td class="d-flex justify-content-center"><img
                                src="{{ asset('berkas/'. $data->avatar) }}" class="rounded-4"
                                style="width:auto; height:55px;"></td>
                        <td style="text-align: center;"><a href="{{ route('p2k3.lihat', $data->id) }}" type="button"
                                class="btn  btn-sm bg-warning " style="width:20px;"><i
                                    class="bi bi-eye text-dark d-flex justify-content-center align-items-center"></i></a>
                            <a href="{{ route('p2k3.edit', $data->id) }}" type="button" class="btn  btn-sm bg-primary"
                                style="width:20px;"><i
                                    class="bi bi-pencil-square text-dark d-flex justify-content-center align-items-center"></i></a>
                            <button type="button" class="btn btn-sm" style="width: 20px; background: #DC3545" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $data->id }}">
                                <i class="bi bi-trash text-dark d-flex justify-content-center align-items-center"></i>
                            </button>
                        </td>
                    </tr>
                    <div class="modal fade" id="deleteModal{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $data->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel{{ $data->id }}">Confirm Deletion</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete this item?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <form action="{{ route('p2k3.hapus',$data->id)}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </tbody>
            </table>

            {{ $datas->links('pagination::customb5') }}

        </div>
    </div>
@stop

@section('custom-css')
    <style>
        .team .member {
            width: 336px;
            height: 360px;
            /* justify-content: center; */
            position: relative;
            box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.2);
            padding: 30px;
            border-radius: 25px;
            background: #fff;
            transition: 0.5s;
        }

        .team .member .pic {
            justify-content: center;
            /* position: relative; */
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 24px;
            /* text-align: center; */
            border-radius: 65%;
            width: 153px;
            height: 152px;
            left: 414px;
            top: 3830px;
        }

        .team .member .pic img {
            transition: ease-in-out 0.3s;
        }

        .team .member .member-info {
            justify-content: center;
            text-align: center;
            /* margin-left: 80px; */
            /* padding-left: 30px; */
        }

        .team .member h4 {
            font-weight: 700;
            margin-bottom: 10px;
            font-size: 16px;
            color: #37517e;
        }

        .team .member span {
            display: block;
            font-size: 16px;
            /* padding-bottom: 10px; */
            position: relative;
            font-weight: 500;
        }

        /* .team .member span::after {
                  content: "";
                  position: absolute;
                  display: block;
                  width: 50px;
                  height: 1px;
                  background: #cbd6e9;
                  bottom: 0;
                  left: 0;
                } */

        .team .member p {
            /* margin: 10px 0 0 0; */
            font-size: 16px;
        }
    </style>
@stop

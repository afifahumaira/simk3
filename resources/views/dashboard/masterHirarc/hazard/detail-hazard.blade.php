@extends ('layouts.layout')

@section('content')
    <div class="page-title d-flex flex-column gap-1 mx-5 my-5  ">

        <div id="kt_app_content"
            class="app-content flex-column-fluid rounded bg-light  mb-20 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">
            <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100 mb-5 px-5 border-bottom border-5">
                <!--begin::Page title-->
                <h2>Detail Hazard</h2>
                <!--begin::Main wrapper-->

                <!--end::Main wrapper-->
                <a href="{{ route('hazard.index') }} " type="button" class="btn text-white btn-secondary btn-sm mb-2"
                    style="background: #505050"><i class="bi bi-chevron-left text-white"></i>Kembali</a>
                <!--end::Title-->
            </div>
            <!--begin::Content container-->
            <table class="table table-bordered border-secondary px-3 py-3 mb-10 shadow">
                <thead px-3>
                    <tr>
                        <th scope="col" class="text-center col-1">No</th>
                        <th scope="col" class="col 7">Aktifitas</th>
                        <th scope="col" class="w-50">Hazard</th>
                        <th scope="col" class="col-1">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hazards as $haz)
                        <tr>
                            <td scope="row" class="text-center">{{ ($hazards->currentpage()-1) * $hazards ->perpage() + $loop->index + 1 }}</td>
                            <td>{{ $act->name }}</td>
                            <td>{{ $haz->name }}</td>
                            <td>
                                <a href="{{ route('hazard.edit', ['id' => $id, 'id_haz' => $haz->id]) }}" type="button"
                                    class="btn btn-sm btn-primary px-4"><i
                                        class="bi bi-pencil-square pe-0"></i></a>
                                <button type="button" class="btn btn-danger btn-sm px-4" data-bs-toggle="modal" data-bs-target="#deleteForm{{ $haz->id }}"><i class="bi bi-trash pe-0"></i></button>

                                <div class="modal fade" id="deleteForm{{ $haz->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered ">
                                        <div class="modal-content">

                                            <form method="POST" action="{{ route('hazard.delete', ['id' => $id, 'id_haz' => $haz->id]) }}">
                                                @csrf
                                                <div class="modal-body mt-5 d-flex justify-content-center align-items-center">
                                                    <h2 class="mt-5 text-center"
                                                        style="color: #16243D; font-size: 20px font-weight:700">Yakin data
                                                        ingin dihapus?
                                                    </h2>
                                                </div>
                                                <div class="modal-footer d-flex justify-content-center border-0">
                                                    <button type="submit"
                                                        class="btn btn-success text-white d-flex justify-content-center align-items-center text-center rounded-1"
                                                        style="width:76px; height:31px; background: #29CC6A;">Ya</button>
                                                    <button type="button"
                                                        class="btn btn-secondary text-center d-flex align-items-center rounded-1"
                                                        data-bs-dismiss="modal"
                                                        style="width:76px; height:31px; ">Tidak</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $hazards->links('pagination::customb5') }}
            <!--end::Content container-->
        </div>
    </div>
@stop

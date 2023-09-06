<div class="modal fade" id="editmodal" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered ">
                                        <form action="{{ route('laporan-insiden.edit', $lap->id) }}"
                                            method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title" id="staticBackdropLabel">Ubah Data Laporan Insiden
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close" id="update"></button>
                                                </div>
                                                <div class="modal-body mt-5 ">
                                                    <div id="additionalForm">
                                                        <div class="ps-3 pe-5 pb-5">
                                                            <label class="col-form-label ps-2">P2K3</label>
                                                            <div class=" w-100">
                                                                <select id="p2k3_id" name="p2k3_id"                                                                
                                                                    class="form-select fs-6 w-100" data-control="select2"
                                                                    data-hide-search="true" data-placeholder="p2k3_id">
                                                                    @foreach ($p2k3 as $p2k3)
                                                                        <option value="{{ $p2k3->id }}">
                                                                            {{ $p2k3->nama }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div id="additionalForm">
                                                            <div class="ps-3 pe-5">
                                                                <label class="col-form-label ps-2">Status Laporan
                                                                </label>
                                                                <div class=" w-100">
                                                                    <select name="status" id="status"
                                                                        class="form-select fs-6 w-100"
                                                                        data-control="select2" data-hide-search="true"
                                                                        data-placeholder="status">
                                                                        <option value="2">Investigasi
                                                                        </option>
                                                                        <option value="3">Sukses
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer d-flex justify-content-center border-0 mt-5">
                                                        <button type="submit"
                                                            class="btn btn-success text-white d-flex justify-content-center align-items-center "
                                                            style="background: #29CC6A;height: 38px; margin : 10px 20px 30px 20px; font-size:14px; border-radius: 5px;">Simpan
                                                            Data</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
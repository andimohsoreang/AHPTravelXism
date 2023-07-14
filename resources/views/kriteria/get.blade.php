@extends('layouts.default')

@section('container')
    {{-- style --}}
    <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/scss/pages/simple-datatables.scss') }}">
    {{-- endstyle --}}

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Kriteria</h3>
                    <p class="text-subtitle text-muted">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quia,
                        alias!</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Kriteria</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Daftar Kriteria</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        Kriteria
                    </h5>
                    <button type="button" class="btn btn-primary d-flex float-end" data-bs-toggle="modal"
                        data-bs-target="#inlineForm">
                        Tambah Kriteria
                    </button>
                    <!--login form Modal -->
                    <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel33" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel33">Tambah Kriteria</h4>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <form action="#">
                                    <div class="modal-body">
                                        <label for="nama-kriteria">Nama Kriteria </label>
                                        <div class="form-group">
                                            <input id="nama-kriteria" type="text" placeholder="Nama Kriteria"
                                                class="form-control">
                                        </div>
                                        <label for="nama-kriteria">Bobot </label>
                                        <div class="form-group">
                                            <input id="bobot" type="number" placeholder="Masukan Bobot Kriteria"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                            <i class="bx bx-x d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Close</span>
                                        </button>
                                        <button type="button" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                                            <i class="bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Tambah</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kriteria</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Destinasi Wisata</td>
                                <td style="width: 200px">
                                    {{-- Button Modal Upadte> --}}
                                    <a href="#" class="btn icon btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#UpdateKriteria"><i class="bi bi-pencil"></i></a>
                                    {{-- end-button modal --}}
                                    {{-- form modals --}}
                                    <div class="modal fade text-left" id="UpdateKriteria" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel33" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel33">Edit Kriteria</h4>
                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <form action="#">
                                                    <div class="modal-body">
                                                        <label for="nama-kriteria">Nama Kriteria </label>
                                                        <div class="form-group">
                                                            <input id="nama-kriteria" type="text"
                                                                placeholder="Nama Kriteria" class="form-control">
                                                        </div>
                                                        <label for="nama-kriteria">Bobot </label>
                                                        <div class="form-group">
                                                            <input id="bobot" type="number"
                                                                placeholder="Masukan Bobot Kriteria" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light-secondary"
                                                            data-bs-dismiss="modal">
                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Close</span>
                                                        </button>
                                                        <button type="button" class="btn btn-primary ms-1"
                                                            data-bs-dismiss="modal">
                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Edit</span>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- endform modal --}}
                                    <a href="#" class="btn icon btn-sm btn-danger"><i class="bi bi-x"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Objek Wisata</td>
                                <td style="width: 200px">
                                    {{-- Button Modal Upadte> --}}
                                    <a href="#" class="btn icon btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#UpdateKriteria"><i class="bi bi-pencil"></i></a>
                                    {{-- end-button modal --}}
                                    {{-- form modals --}}
                                    <div class="modal fade text-left" id="UpdateKriteria" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel33" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel33">Edit Kriteria</h4>
                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <form action="#">
                                                    <div class="modal-body">
                                                        <label for="nama-kriteria">Nama Kriteria </label>
                                                        <div class="form-group">
                                                            <input id="nama-kriteria" type="text"
                                                                placeholder="Nama Kriteria" class="form-control">
                                                        </div>
                                                        <label for="nama-kriteria">Bobot </label>
                                                        <div class="form-group">
                                                            <input id="bobot" type="number"
                                                                placeholder="Masukan Bobot Kriteria" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light-secondary"
                                                            data-bs-dismiss="modal">
                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Close</span>
                                                        </button>
                                                        <button type="button" class="btn btn-primary ms-1"
                                                            data-bs-dismiss="modal">
                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Edit</span>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- endform modal --}}
                                    <a href="#" class="btn icon btn-sm btn-danger"><i class="bi bi-x"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>


    <script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/static/js/pages/simple-datatables.js') }}"></script>

    @include('partials.footer')
@endsection

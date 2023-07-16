use App\Http\Controllers\CriterionController;

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
                        data-bs-target="#addCriteriaModal">
                        Tambah Kriteria
                    </button>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kriteria</th>
                                <th>Bobot</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($criterias as $criteria)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $criteria->name }}</td>
                                    <td>{{ $criteria->weight }}</td>
                                    <td>
                                        <a href="#" class="btn icon btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#updateCriteriaModal{{ $criteria->id }}"><i
                                                class="bi bi-pencil"></i></a>
                                        <a href="#" class="btn icon btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteCriteriaModal{{ $criteria->id }}"><i class="bi bi-x"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>

    <!-- Tambah Kriteria Modal -->
    <div class="modal fade" id="addCriteriaModal" tabindex="-1" role="dialog" aria-labelledby="addCriteriaModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCriteriaModalLabel">Tambah Kriteria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('kriteria.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama-kriteria">Nama Kriteria</label>
                            <input id="nama-kriteria" type="text" name="name" placeholder="Nama Kriteria"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="bobot">Bobot</label>
                            <input id="bobot" type="number" name="weight" placeholder="Masukan Bobot Kriteria"
                                class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Kriteria Modal -->
    @foreach ($criterias as $criteria)
        <div class="modal fade" id="updateCriteriaModal{{ $criteria->id }}" tabindex="-1" role="dialog"
            aria-labelledby="updateCriteriaModal{{ $criteria->id }}Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateCriteriaModal{{ $criteria->id }}Label">Edit Kriteria</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('kriteria.update', $criteria->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama-kriteria{{ $criteria->id }}">Nama Kriteria</label>
                                <input id="nama-kriteria{{ $criteria->id }}" type="text" name="name"
                                    placeholder="Nama Kriteria" class="form-control"
                                    value="{{ $criteria->name }}">
                            </div>
                            <div class="form-group">
                                <label for="bobot{{ $criteria->id }}">Bobot</label>
                                <input id="bobot{{ $criteria->id }}" type="number" name="weight"
                                    placeholder="Masukkan Bobot Kriteria" class="form-control"
                                    value="{{ $criteria->weight }}">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Hapus Kriteria Modal -->
@foreach ($criterias as $criteria)
    <div class="modal fade" id="deleteCriteriaModal{{ $criteria->id }}" tabindex="-1" role="dialog"
        aria-labelledby="deleteCriteriaModal{{ $criteria->id }}Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteCriteriaModal{{ $criteria->id }}Label">Hapus Kriteria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('kriteria.delete', $criteria->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus kriteria "{{ $criteria->name }}"?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach

    <script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/static/js/pages/simple-datatables.js') }}"></script>

    @include('partials.footer')
@endsection

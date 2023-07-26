use App\Http\Controllers\SubCriterionController;

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
                    <h3>Sub Kriteria</h3>
                    <p class="text-subtitle text-muted">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quia,
                        alias!</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Kriteria</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Sub Kriteria</li>
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
                        data-bs-target="#addSubCriteriaModal">
                        Tambah Sub Kriteria
                    </button>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kriteria</th>
                                <th>Nama Sub Kriteria</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subCriterias as $subCriteria)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $subCriteria->criterion->name }}</td>
                                    <td>{{ $subCriteria->name }}</td>
                                    <td>
                                        <a href="#" class="btn icon btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#updateSubCriteriaModal{{ $subCriteria->id }}"><i
                                                class="bi bi-pencil"></i></a>
                                        <a href="#" class="btn icon btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteSubCriteriaModal{{ $subCriteria->id }}"><i class="bi bi-x"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>

    <!-- Tambah Sub Kriteria Modal -->
    <div class="modal fade" id="addSubCriteriaModal" tabindex="-1" role="dialog" aria-labelledby="addSubCriteriaModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSubCriteriaModalLabel">Tambah Sub Kriteria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('kriteria.storesub') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="kriteria">Pilih Kriteria</label>
                            <select class="form-select" id="kriteria" name="criterion_id">
                                @foreach ($criterias as $criteria)
                                    <option value="{{ $criteria->id }}" {{ $criteria->id == $criteria->id ? 'selected' : '' }}>
                                        {{ $criteria->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama-sub-kriteria">Nama Sub Kriteria</label>
                            <input id="nama-sub-kriteria" type="text" name="name" placeholder="Nama Sub Kriteria" class="form-control">
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

    <!-- Edit Sub Kriteria Modal -->
    @foreach ($subCriterias as $subCriteria)
        <div class="modal fade" id="updateSubCriteriaModal{{ $subCriteria->id }}" tabindex="-1" role="dialog"
            aria-labelledby="updateSubCriteriaModal{{ $subCriteria->id }}Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateSubCriteriaModal{{ $subCriteria->id }}Label">Edit Sub
                            Kriteria</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('kriteria.updatesub', $subCriteria->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="kriteria{{ $subCriteria->id }}">Pilih Kriteria</label>
                                <select class="form-select" id="kriteria{{ $subCriteria->id }}" name="criterion_id">
                                    @foreach ($criterias as $criteria)
                                        <option value="{{ $criteria->id }}"
                                            {{ $subCriteria->criterion_id == $criteria->id ? 'selected' : '' }}>
                                            {{ $criteria->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nama-sub-kriteria{{ $subCriteria->id }}">Nama Sub Kriteria</label>
                                <input id="nama-sub-kriteria{{ $subCriteria->id }}" type="text" name="name"
                                    placeholder="Nama Sub Kriteria" class="form-control"
                                    value="{{ $subCriteria->name }}">
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

    <!-- Hapus Sub Kriteria Modal -->
    @foreach ($subCriterias as $subCriteria)
        <div class="modal fade" id="deleteSubCriteriaModal{{ $subCriteria->id }}" tabindex="-1" role="dialog"
            aria-labelledby="deleteSubCriteriaModal{{ $subCriteria->id }}Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteSubCriteriaModal{{ $subCriteria->id }}Label">Hapus Sub Kriteria</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('kriteria.deletesub', $subCriteria->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus sub kriteria "{{ $subCriteria->name }}"?</p>
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

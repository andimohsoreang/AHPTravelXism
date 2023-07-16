use App\Http\Controllers\AlternativeController;

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
                    <h3>Alternatif</h3>
                    <p class="text-subtitle text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid, vitae!</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Alternatif</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Alternatif</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Daftar Alternatif
                </h5>
                <button type="button" class="btn btn-primary d-flex float-end" data-bs-toggle="modal"
                    data-bs-target="#addAlternativeModal">
                    Tambah Alternatif
                </button>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Alternatif</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alternatives as $alternative)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $alternative->name }}</td>
                                <td>
                                    <a href="#" class="btn icon btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#editAlternativeModal{{ $alternative->id }}"><i class="bi bi-pencil"></i></a>
                                    <a href="#" class="btn icon btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteAlternativeModal{{ $alternative->id }}"><i class="bi bi-x"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Tambah Alternatif Modal -->
    <div class="modal fade" id="addAlternativeModal" tabindex="-1" role="dialog"
        aria-labelledby="addAlternativeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAlternativeModalLabel">Tambah Alternatif</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('alternatif.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama-alternatif">Nama Alternatif</label>
                            <input id="nama-alternatif" type="text" name="name" placeholder="Nama Alternatif"
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

    <!-- Edit Alternatif Modal -->
    @foreach ($alternatives as $alternative)
        <div class="modal fade" id="editAlternativeModal{{ $alternative->id }}" tabindex="-1" role="dialog"
            aria-labelledby="editAlternativeModal{{ $alternative->id }}Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editAlternativeModal{{ $alternative->id }}Label">Edit Alternatif</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('alternatif.update', $alternative->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama-alternatif{{ $alternative->id }}">Nama Alternatif</label>
                                <input id="nama-alternatif{{ $alternative->id }}" type="text" name="name"
                                    placeholder="Nama Alternatif" class="form-control" value="{{ $alternative->name }}">
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

    <!-- Hapus Alternatif Modal -->
    @foreach ($alternatives as $alternative)
        <div class="modal fade" id="deleteAlternativeModal{{ $alternative->id }}" tabindex="-1" role="dialog"
            aria-labelledby="deleteAlternativeModal{{ $alternative->id }}Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteAlternativeModal{{ $alternative->id }}Label">Hapus Alternatif</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('alternatif.delete', $alternative->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus alternatif "{{ $alternative->name }}"?</p>
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

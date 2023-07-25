<!-- resources/views/alternatif/delete.blade.php -->

@extends('layouts.default')

@section('container')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Hapus Alternatif</h3>
                    <p class="text-subtitle text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid, vitae!</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Alternatif</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Hapus Alternatif</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('alternatif.destroy', $alternative->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="form-group">
                        <p>Apakah Anda yakin ingin menghapus alternatif "{{ $alternative->name }}"?</p>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    @include('partials.footer')
@endsection

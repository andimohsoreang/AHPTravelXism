<!-- resources/views/alternatif/edit.blade.php -->

@extends('layouts.default')

@section('container')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Edit Alternatif</h3>
                    <p class="text-subtitle text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid, vitae!</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Alternatif</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Alternatif</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('alternatif.update', $alternative->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="edit-nama-alternatif">Nama Alternatif</label>
                        <input id="edit-nama-alternatif" type="text" name="name" value="{{ $alternative->name }}" class="form-control">
                    </div>
                    @foreach ($criteria as $criterion)
                        <div class="form-group">
                            <label for="{{ 'edit_criteria_id_' . $criterion->id }}">{{ $criterion->name }}</label>
                            <select class="form-control" id="{{ 'edit_criteria_id_' . $criterion->id }}" name="{{ 'criteria_id_' . $criterion->id }}">
                                @foreach ($subCriteria as $subCriterion)
                                    <option value="{{ $subCriterion->id }}" {{ $subCriterion->id === $alternative->{'criteria_id_' . $criterion->id} ? 'selected' : '' }}>
                                        {{ $subCriterion->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    @endforeach
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    @include('partials.footer')
@endsection

@extends('layouts.default')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Ranking Alternatif</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Alternatif</th>
                                    <th>Priority</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rankedAlternatives as $index => $rankedAlternative)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $rankedAlternative['alternative']->name }}</td>
                                        <td>{{ $rankedAlternative['priority'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

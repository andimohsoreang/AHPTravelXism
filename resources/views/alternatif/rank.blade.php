@extends('layouts.default')

@section('container')
    <div class="container">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Ranked Alternatives</div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Ranking</th>
                                    <th>Alternative</th>
                                    <th>Score</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($data['SumRank'] as $key => $rank)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $key }}</td>
                                        <td>{{ $rank }}</td>
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

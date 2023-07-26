@extends('layouts.default')

@section('container')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Ranked Alternatives</div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Rank</th>
                                <th>Alternative</th>
                                <th>Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rankedAlternatives as $rank => $alternative)
                            <tr>
                                <td>{{ $rank + 1 }}</td>
                                <td>{{ $alternative['name'] }}</td>
                                <td>{{ $alternative['score'] }}</td>
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
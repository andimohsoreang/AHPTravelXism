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
                                    <th>Alternative</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['SumRank'] as $key => $rank)
                                <tr>
                                    <td>{{ $key }}</td>
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
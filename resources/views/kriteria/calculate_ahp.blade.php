@extends('layouts.default')

@section('container')
    <div class="container">
        <h1>Hasil Kalkulasi AHP</h1>

        <div class="card mb-4">
            <div class="card-body">
                <h3>Criteria Komparasi Matrix</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Criteria</th>
                            @foreach($criterias as $criterion)
                                <th>{{ $criterion->name }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($criterias as $rowCriterion)
                            <tr>
                                <th>{{ $rowCriterion->name }}</th>
                                @foreach($matrix[$rowCriterion->id] as $colCriterionId => $value)
                                    <td>{{ $value }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <p>Consistency Index (CI): {{ $ci }}</p>
                <p>Consistency Ratio (CR): {{ $cr }}</p>
                <p>Apakah Konsisten? {{ $consistency ? 'Yes' : 'No' }}</p>
            </div>
        </div>

        <div class="card mb-4">
    <div class="card-body">
        <h3>Final Weights</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Criteria</th>
                    <th>Final Weight</th>
                </tr>
            </thead>
            <tbody>
                @foreach($criterias as $criterion)
                    <tr>
                        <th>{{ $criterion->name }}</th>
                        <td>{{ $finalWeights[$criterion->id] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


        <div class="card">
            <div class="card-body">
                <h3>Alternative Terbaik</h3>
                @if($bestAlternative)
                    <p>Alternative Terbaik: {{ $bestAlternative->name }}</p>
                @else
                    <p>Belum Ada Alternative Terbaik.</p>
                @endif
            </div>
        </div>
    </div>
@endsection

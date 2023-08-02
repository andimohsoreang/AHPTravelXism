@extends('layouts.default')

@section('container')
    <div class="page-heading">
        <!-- Page content goes here -->
        <h3>AHP Result</h3>
        <p class="text-subtitle text-muted">Calculated AHP Results</p>
        <!-- Display Comparison Matrix -->
        <h4>Comparison Matrix:</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Criteria</th>
                    @for ($i = 0; $i < $data['HasilKriteria']['matrixSize']; $i++)
                        <th>{{ $criteria[$i]->name }}</th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i < $data['HasilKriteria']['matrixSize']; $i++)
                    <tr>
                        <td>{{ $criteria[$i]->name }}</td>
                        @for ($j = 0; $j < $data['HasilKriteria']['matrixSize']; $j++)
                            <td>{{ number_format($data['HasilKriteria']['matrix'][$i][$j], 2) }}</td>
                        @endfor
                    </tr>
                @endfor
            </tbody>
        </table>

        <!-- Display Priorities -->
        <h4>Priorities and Eigen Value:</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Criteria</th>
                    <th>Priority</th>
                    <th>Eigen Value</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['HasilKriteria']['priorities'] as $index => $priority)
                    <tr>
                        <td>{{ $criteria[$index]->name }}</td>
                        <td>{{ number_format($priority, 2) }}</td>
                        <td>{{ number_format($data['HasilKriteria']['eigenValue'][$index], 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Display CR, IR, and RC -->
        <h4>CR, IR, and RC:</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Consistency Ratio (CR)</th>
                    <th>Inconsistency Ratio (IR)</th>
                    <th>Random Consistency Index (RC)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ number_format($data['HasilKriteria']['CR'], 2) }}</td>
                    <td>{{ number_format($data['HasilKriteria']['IR'], 2) }}</td>
                    <td>{{ number_format($data['HasilKriteria']['RC'], 2) }}</td>
                </tr>
            </tbody>
        </table>

        <!-- Display Sub-criteria Results -->
        @php $i = 0; @endphp
        @foreach ($data['Hasil_SubKriteria'] as $index => $subKriteria)
            <h4>{{ $criteria[$index]->name }} Result:</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Criteria</th>
                        <th>Priority</th>
                        <th>Eigen Value</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subKriteria['priorities'] as $subIndex => $subPriority)
                        <tr>
                            <td>{{ $subCriteria[$i]->name }}</td>
                            <td>{{ number_format($subPriority, 2) }}</td>
                            <td>{{ number_format($subKriteria['eigenValue'][$subIndex], 2) }}</td>
                            @php $i++; @endphp
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <h5>CR, IR, and RC:</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Consistency Ratio (CR)</th>
                        <th>Inconsistency Ratio (IR)</th>
                        <th>Random Consistency Index (RC)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ number_format($subKriteria['CR'], 2) }}</td>
                        <td>{{ number_format($subKriteria['IR'], 2) }}</td>
                        <td>{{ number_format($subKriteria['RC'], 2) }}</td>
                    </tr>
                </tbody>
            </table>
        @endforeach

        <!-- Display Ranking -->
        <h4>Ranking:</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>Alternative</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['SumRank'] as $alternativeName => $score)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $alternativeName }}</td>
                        <td>{{ number_format($score, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

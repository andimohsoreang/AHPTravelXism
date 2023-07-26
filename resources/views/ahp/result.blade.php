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
                    @for ($i = 0; $i < $matrixSize; $i++)
                        <th>Criteria {{ $i + 1 }}</th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i < $matrixSize; $i++)
                    <tr>
                        <td>Criteria {{ $i + 1 }}</td>
                        @for ($j = 0; $j < $matrixSize; $j++)
                            <td>{{ number_format($matrix[$i][$j], 2) }}</td>
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
                @foreach ($priorities as $index => $priority)
                    <tr>
                        <td>Criteria {{ $index + 1 }}</td>
                        <td>{{ number_format($priority, 2) }}</td>
                        <td>{{ number_format($eigenValue[$index], 2) }}</td>

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
                    <td>{{ number_format($CR, 2) }}</td>
                    <td>{{ number_format($IR, 2) }}</td>
                    <td>{{ number_format($RC, 2) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection

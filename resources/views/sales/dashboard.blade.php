@extends('layouts.app')

@section('content')
<div class="main-top">
    <h2>Sales Dashboard</h2>
    <p>Select a date range to view total paid appointments grouped by package.</p>
</div>

<div class="sales-container">
    <form method="GET" action="{{ route('sales.dashboard') }}" class="filter-form">
        <div class="form-group">
            <label for="from_date">From Date:</label>
            <input type="date" name="from_date" id="from_date" value="{{ request('from_date') }}">

            <label for="to_date">To Date:</label>
            <input type="date" name="to_date" id="to_date" value="{{ request('to_date') }}">

            <button type="submit" class="btn-view">View Sales</button>
        </div>
    </form>

    @if(request()->has('from_date') || request()->has('to_date'))
    @if(isset($results))
        @if(count($results['packages']) > 0)
            <div class="results-section">
                <table class="client-record-table">
                    <thead>
                        <tr>
                            <th>Package Name</th>
                            <th>Times Taken</th>
                            <th>Subtotal (RM)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($results['packages'] as $row)
                        <tr>
                            <td>{{ $row['name'] }}</td>
                            <td>{{ $row['count'] }}</td>
                            <td>{{ number_format($row['subtotal'], 2) }}</td>
                        </tr>
                        @endforeach
                        <tr class="total-summary-row">
                            <td>Total</td>
                            <td>{{ $results['total_appointments'] }}</td>
                            <td>RM {{ number_format($results['total_sales'], 2) }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-center">
                    <a href="{{ route('sales.report', ['from_date' => request('from_date'), 'to_date' => request('to_date')]) }}" class="btn-view">Generate Report</a>
                </div>
            </div>
        @else
            <div class="results-section">
                <p style="text-align: center; color: red; margin-top: 20px;">No appointments found for the selected date range.</p>
            </div>
        @endif
    @endif
@endif

<style>
.sales-container {
    max-width: 900px;
    margin: 20px auto;
    padding: 25px;
    background: #fdfdfd;
    border: 1px solid #ccc;
    border-radius: 10px;
    box-shadow: 0 0 8px rgba(0,0,0,0.1);
}

.filter-form .form-group {
    display: flex;
    align-items: center;
    gap: 20px;
    flex-wrap: wrap;
    margin-bottom: 30px;
}

.filter-form label {
    font-weight: bold;
    margin-bottom: 5px;
}

.filter-form input[type="date"] {
    padding: 8px 12px;
    border-radius: 5px;
    border: 1px solid #aaa;
    margin-right: 10px;
    margin-bottom: 10px;
}

.btn-view {
    background-color: #00897b;
    color: white;
    border: none;
    padding: 12px 18px;
    border-radius: 6px;
    cursor: pointer;
    transition: background-color 0.3s;
    margin-top: 30px; /* Adjust this to control the gap */
}

.btn-view:hover {
    background-color: #00695c;
}

.client-record-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 30px;
}

.client-record-table th,
.client-record-table td {
    border: 1px solid #ddd;
    padding: 12px 15px;
    text-align: left;
}

.client-record-table th {
    background-color: lightblue;
    color: black;
}

.client-record-table tr:nth-child(even) {
    background-color: #f2f2f2;
}

.client-record-table tr:hover {
    background-color: #e6f7ff;
}

.total-summary-row {
    font-weight: bold;
    background-color: #e6f7ff;
    color: black;
}

.text-center {
    text-align: center;
    margin-top: 20px; /* Adds gap between the table and button */
}

</style>

@endsection

@extends('layouts.app')

@section('content')
<div class="main-top">
    <h2>Payment Details</h2>
    <p>Review your appointment and total amount before proceeding to payment.</p>
</div>

{{-- Success/Error Messages --}}
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<div class="sales-container"> <!-- Added container -->
{{-- Payment Table --}}
<div class="payment-table">
    @if($appointments->isEmpty())  <!-- Check if there are no appointments -->
        <div class="no-appointments">
            <p>No appointments requiring payment at this moment. Either your payments are completed or no appointments are due.</p>
        </div>
    @else <!-- Render the table when appointments exist -->
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Service</th>
                    <th>Price (RM)</th>
                    <th>Payment Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->date }}</td>
                        <td>{{ $appointment->time }}</td>
                        <td>{{ $appointment->package->name }}</td>
                        <td>RM {{ number_format($appointment->package->price, 2) }}</td>
                        <td>
                            @if($appointment->payment_status == 'paid')
                                <span class=>Paid ✅</span>
                            @else
                                <span class=>Pending</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('customer.payment.cancel', $appointment->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm cancel-btn" onclick="return confirm('Are you sure you want to cancel this appointment?');">
                                ❌
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            @if(!$appointments->isEmpty())
            <tfoot>
                <tr>
                    <td colspan="4"><strong>Total Amount:</strong></td>
                    <td colspan="2"><strong>RM {{ number_format($totalPayment, 2) }}</strong></td>
                </tr>
            </tfoot>
            @endif
        </table>
    @endif
</div>

{{-- Proceed Section (Only if there are pending payments) --}}
@if($appointments->contains('payment_status', 'pending'))
    <div class="proceed-section">
        <a href="{{ route('customer.payment.show', $appointments->firstWhere('payment_status', 'pending')->id) }}" class="action-btn btn-primary">
            Proceed to Payment
        </a>
    </div>
    </div>
@endif



{{-- Styles --}}
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

.payment-table {
    width: 80%;  /* Adjust the width as needed (for example, 80% of the container's width) */
    margin: 0 auto;  /* This centers the table horizontally */
    table-layout: fixed;  /* Keep columns evenly distributed */
    border-collapse: collapse;
    margin-top: 20px;
}
.payment-table th {
    background-color: lightblue;   /* Light blue header */
    color: black;                  /* Black text for visibility */
    padding: 12px 15px;
    text-align: center;
    border-bottom: 2px solid #42A5F5;  /* Stylish bottom border */
}

.payment-table td {
    background-color: #ffffff;     /* White background for rows */
    padding: 10px 15px;
    border: 1px solid #ddd;
    text-align: center;
}

/* Alternating Row Colors */
.payment-table tr:nth-child(even) {
    background-color: lightblue;  /* Light blue for even rows */
}

.payment-table tr:hover {
    background-color: #BBDEFB;   /* Softer blue hover effect */
}

.action-btn {
    padding: 8px 12px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    font-size: 14px;
    text-decoration: none;
}

.btn-primary {
    background-color: #00897b;
    color: white;
}

.btn-success {
    background-color: #4CAF50;
    color: white;
}

.btn-danger {
    background-color: #d32f2f;
    color: white;
}

.proceed-section {
    text-align: center;
    margin-top: 20px;
}

.badge-success {
    background-color: #4CAF50;
    color: #fff;
    padding: 4px 10px;
    border-radius: 5px;
}

.badge-warning {
    background-color: #FFA000;
    color: #fff;
    padding: 4px 10px;
    border-radius: 5px;
}
.alert {
    padding: 12px;
    border-radius: 8px;
    margin-bottom: 20px;
    text-align: center;
}

.alert-success {
    background-color: #d4edda;
    color: #155724;
}

.alert-danger {
    background-color: #f8d7da;
    color: #721c24;
}

    .cancel-btn {
        background-color: #add8e6;  /* Light blue background */
        color: #000;                /* Black text */
        padding: 6px 14px;          /* Compact but visible */
        font-size: 14px;
        border: none;               /* No border for a clean look */
        border-radius: 8px;         /* Rounded corners */
        cursor: pointer;
        transition: background 0.3s ease, color 0.3s ease;
    }

    .cancel-btn:hover {
        background-color: #87ceeb;  /* Slightly darker blue on hover */
        color: #000;                /* Black text remains */
    }
    .no-appointments {
    background-color: #e3f2fd; /* Soft blue background */
    border: 2px solid #90caf9; /* Slightly stronger border */
    color: #0d47a1; /* Darker blue text for readability */
    padding: 25px;
    margin: 30px auto;
    width: 70%;
    border-radius: 12px;
    text-align: center;
    font-size: 18px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    transition: all 0.3s ease;
}

.no-appointments:hover {
    background-color: #bbdefb; /* Slightly darker on hover */
    border-color: #64b5f6;
    transform: scale(1.01);
}

</style>


</style>

@endsection

@extends('layouts.app')

@section('content')
@if(isset($appointment))
<div class="main-top">
    <h2>Payment Details</h2>
    <p>Make Your Payment Here.</p>
</div>

<div class="payment-container">
    <div class="qr-code">
        <img src="{{ asset('pictures/qr.jpg') }}" alt="QR Code for Payment">
    </div>

    <form 
        action="{{ route('customer.payment.upload', $appointment->id) }}" 
        method="POST" 
        enctype="multipart/form-data" 
        class="receipt-form"
    >
        @csrf

        <div class="form-group">
            <label for="receipt">Upload Payment Receipt:</label>
            <input type="file" name="receipt" id="receipt" required>
        </div>

        <div class="button-section">
            <a 
                href="{{ route('customer.payment') }}" 
                class="btn-back" 
                aria-label="Back to Payment List"
            >
                Back to Payment List
            </a>

            <button 
                type="submit" 
                class="btn-primary" 
                aria-label="Submit Payment Proof"
            >
                Submit Payment Proof
            </button>
        </div>
    </form>

    @if($appointment->payment_status == 'paid')
    <div class="receipt-section">
        <p><strong>Payment Status: Paid ✅</p>
        <a 
            href="{{ asset('storage/' . $appointment->receipt_path) }}" 
            target="_blank" 
            class="btn-view-receipt"
            aria-label="View Uploaded Receipt"
        >
            View Receipt
        </a>
    </div>
    @endif

</div>

@else
<div class="error-message">
    <p>No appointment details found.</p>
</div>
@endif

<style>
/* Payment Content */
.payment-container {
    background-color: #f9f9f9;
    border-radius: 10px;
    padding: 40px 30px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
    max-width: 600px;
    margin: 50px auto;
    text-align: center;
}

.qr-code {
    display: flex;
    justify-content: center;
    margin-bottom: 30px;
}

.qr-code img {
    width: 220px;
    height: 220px;
    border: 3px solid #00897b;
    border-radius: 15px;
    padding: 10px;
}

.receipt-form {
    margin-top: 40px;
}

.form-group {
    background-color: #fff;
    border: 2px solid #00897b;
    border-radius: 8px;
    padding: 12px;
    width: 100%;
    max-width: 450px;
    margin: 0 auto;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 8px;
    color: #00897b;
}

.form-group input[type="file"] {
    width: 100%;
    border: none;
    background-color: #f0f0f0;
    padding: 10px;
    border-radius: 5px;
}

/* Button Section */
.button-section {
    display: flex;
    justify-content: space-between;
    margin-top: 25px;
}

.btn-primary, .btn-back {
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    text-decoration: none;
    transition: background 0.3s ease;
}

.btn-primary {
    background-color: #00897b;
    color: #fff;
    border: none;
}

.btn-primary:hover {
    background-color: #00796b;
}

.btn-back {
    background-color: #d32f2f;
    color: #fff;
}

.btn-back:hover {
    background-color: #b71c1c;
}

.receipt-section {
    text-align: center;
    margin-top: 20px;
}

.btn-view-receipt {
    background-color: #4CAF50;
    color: #fff;
    padding: 8px 16px;
    border-radius: 3px;
    text-decoration: none;
    display: inline-block;
}

.btn-view-receipt:hover {
    background-color: #45a049;
}
</style>

@endsection

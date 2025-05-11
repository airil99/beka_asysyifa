@extends('layouts.app')

@section('content')
<div class="main-top">
    <h2>Book Appointment</h2>
    <p>Choose a package and book your appointment.</p>
</div>

<div class="package-container">
    @foreach($packages as $package)
    <div class="card">
        <div class="card-content">
            <div class="card-image"> 
                @if($package->type === 'messages') 
                <img src="{{ asset('pictures/massages.jpg') }}" alt="Massage">
                @elseif($package->type === 'cupping treatment')
                <img src="{{ asset('pictures/cupping treatment.jpg') }}" alt="Cupping Treatment">
                @endif
            </div>
            <div class="card-info">
                <div class="card-header">
                    <h3 class="card-title">{{ $package->name }}</h3>
                </div>
                <div class="card-body">
                    <p class="card-type"><strong>Type:</strong> {{ $package->type }}</p>
                    <p class="card-description">{{ $package->description }}</p>
                    <p class="card-price"><strong>Price:</strong> RM {{ number_format($package->price, 2) }}</p>
                </div>
                <div class="card-footer">
                <a href="{{ route('customer.appointment.book', $package->id) }}" class="btn-book">Book Now</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<style>
/* Styling for package cards */
.package-container {
    display: flex;
    flex-direction: column; 
    gap: 20px; 
    margin-top: 20px;
    align-items: center; 
}

.card {
    background-color: #e0f7fa; 
    border: none; 
    border-radius: 12px; 
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 80%; 
    max-width: 600px; 
    padding: 0; 
    text-align: left;
    overflow: hidden; 
    transition: transform 0.2s ease; 
}

.card:hover {
    transform: translateY(-5px); 
}

.card-content {
    display: flex; 
}

.card-image {
    flex: 1; 
}

.card-image img {
    width: 100%; 
    height: 100%;
    object-fit: cover; 
    border-radius: 12px 0 0 12px; /* Rounded left corners */ 
}

.card-info {
    flex: 2; 
    padding: 20px; 
}

.card-header {
    background-color: #b2ebf2; 
    padding: 10px 20px;
    border-bottom: 1px solid #e0f7fa; 
    border-radius: 0 12px 0 0; /* Rounded top-right corner only */
}

.card-title {
    font-size: 20px;
    margin-bottom: 0; 
    font-weight: bold;
    color: #00838f; 
}

.card-body {
    padding: 20px;
}

.card-type, .card-description, .card-price {
    margin-bottom: 10px;
    color: #555;
}

.card-footer {
    background-color: #e0f7fa; 
    padding: 10px 20px;
    border-top: 1px solid #e0f7fa; 
    border-radius: 0 0 12px 0; /* Rounded bottom-right corner only */
    text-align: right;
}

.btn-book {
    background-color: #00897b; 
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
    font-size: 16px;
    border: none; 
    transition: background-color 0.3s ease; 
}

.btn-book:hover {
    background-color: #00695c; 
    cursor: pointer;
}
</style>
@endsection
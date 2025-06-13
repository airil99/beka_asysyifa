@extends('layouts.app')

@section('title', 'Staff Dashboard')

@section('content')
<div class="main-top">
    <h2>Welcome, {{ Auth::user()->name }}!</h2>
    <p>Here is an overview of your account and activities.</p>
</div>

<!-- 🔹 Summary Cards Section (separated) -->
<div class="summary-overview">
    <div class="summary-card small-card bg-blue">
        <h3><i class="fas fa-users"></i> Staff</h3>
        <p class="summary-value">{{ $totalStaff }}</p>
    </div>

    <div class="summary-card small-card bg-green">
        <h3><i class="fas fa-user-friends"></i> Customers</h3>
        <p class="summary-value">{{ $totalCustomers }}</p>
    </div>

    <div class="summary-card small-card bg-orange">
        <h3><i class="fas fa-dollar-sign"></i> Sales</h3>
        <p class="summary-value">RM {{ number_format($totalSalesAllTime, 2) }}</p>
    </div>

    <div class="summary-card small-card bg-purple">
    <h3><i class="fas fa-box-open"></i> Packages</h3>
    <p class="summary-value">{{ $totalPackages }}</p>
</div>

</div>

<!-- 🔸 Larger Overview Section -->
<div class="overview">
    <div class="card-container">
        <!-- Appointments Card -->
        <div class="card upcoming-appointments-card">
            <h3>Today's Appointments</h3>
            <span class="pin-icon"><i class="fas fa-thumbtack"></i></span>
            <div class="card-content">
                @if($appointmentsToday->isEmpty())
                    <p class="empty-state">No appointments today</p>
                @else
                    @foreach($appointmentsToday as $appointment)
                        <div class="appointment-item">
                            <div class="appointment-date"><strong>Time:</strong> {{ $appointment->time }}</div>
                            <div class="appointment-package">
                                <strong>Customer:</strong> {{ $appointment->user->name ?? 'Unknown' }}<br>
                                <strong>Package:</strong>
                                {{ $appointment->package->name ?? 'No package assigned' }}
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        <!-- Sales Today Card -->
        <div class="card sales-card">
            <h3>Sales Today</h3>
            <span class="pin-icon"><i class="fas fa-thumbtack"></i></span>
            <div class="card-content">
                <p><strong>Total:</strong> RM {{ number_format($totalSalesToday, 2) }}</p>
            </div>
        </div>
    </div>
</div>

<!-- 🔧 Styles -->
<style>
/* 🔹 Summary Card Section */
.summary-overview {
    display: flex;
    justify-content: center;
    gap: 16px; /* reduced spacing between cards */
    margin-top: 20px;
    flex-wrap: wrap;
}

.summary-card.small-card {
    width: 140px; /* smaller width */
    padding: 10px 12px; /* tighter padding */
    border-radius: 10px;
    color: white;
    text-align: center;
    box-shadow: 0 3px 6px rgba(0,0,0,0.1);
    transition: transform 0.2s ease;
    font-family: 'Segoe UI', sans-serif;
}

.summary-card h3 {
    font-size: 0.8em; /* smaller title */
    margin-bottom: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
    font-weight: 500;
}

.summary-value {
    font-size: 1.3em; /* smaller value text */
    font-weight: 600;
}

/* Colorful backgrounds */
.bg-blue    { background-color: #42a5f5; }
.bg-green   { background-color: #66bb6a; }
.bg-orange  { background-color: #ffa726; }
.bg-purple { background-color: #ab47bc; }


/* Hover effect */
.summary-card.small-card:hover {
    transform: translateY(-5px);
}

/* 🔸 Keep existing overview styles for larger cards */
.overview {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 2rem;
    padding: 20px;
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
}
.card-container {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
    justify-content: space-between;
    width: 100%;
}
.card {
    width: 300px;
    background-color: #e0f7fa;
    border-radius: 12px;
    padding: 20px;
    text-align: left;
    position: relative;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    transition: 0.3s ease;
}
.card h3 {
    text-align: center;
    font-weight: bold;
    background-color: #b2ebf2;
    padding-bottom: 10px;
    border-bottom: 3px solid #b2ebf2;
}
.card-content {
    max-height: 250px;
    overflow-y: auto;
}
.pin-icon {
    position: absolute;
    top: 10px;
    right: 10px;
    color: #ff9800;
}
.appointment-item {
    background: #e0f7fa;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 8px;
}
.empty-state {
    color: #888;
    text-align: center;
    font-style: italic;
}

/* Responsive */
@media (max-width: 768px) {
    .summary-card.small-card,
    .card {
        width: 100%;
    }
    .card-container {
        flex-direction: column;
    }
}
</style>
@endsection

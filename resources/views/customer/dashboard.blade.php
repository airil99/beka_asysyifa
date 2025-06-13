@extends('layouts.app')

@section('title', 'Customer Dashboard')

@section('content') <!-- Start of section -->

<div class="main-top">
    <h2>Welcome, {{ Auth::user()->name }}!</h2>
    <p>Here is an overview of your account and activities.</p>
</div>

<!-- Display Success or Error Message -->
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@elseif($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Customer-specific content -->
<div class="overview">
    <div class="card-container">
        <!-- Upcoming Appointments Card -->
        <div class="card upcoming-appointments-card">
            <h3>Upcoming Appointments</h3>
            <span class="pin-icon">
            <i class="fas fa-thumbtack"></i> <!-- FontAwesome pin icon -->
        </span>
            <div class="card-content">
                @if($upcomingAppointments->isEmpty())
                    <p class="empty-state">No upcoming appointments</p>
                @else
                    @foreach($upcomingAppointments as $appointment)
                        <div class="appointment-item">
                            <div class="appointment-date">
                                <strong>Date:</strong> {{ $appointment->date }} <br>
                                <strong>Time:</strong> {{ $appointment->time }}
                            </div>
                            <div class="appointment-package">
                                <strong>Package:</strong>
                                @if($appointment->package)
                                    {{ $appointment->package->name }}
                                @else
                                    No package assigned
                                @endif
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        <!-- Therapists Section -->
        <div class="card therapist-card tall-card">
            <h3>Therapists List</h3>
            <div class="therapist-list">
                <div class="therapist-item">
                    <img src="{{ asset('pictures/man therapist.jpg') }}" alt="Syafiq Jamal">
                    <p>Syafiq Jamal</p>
                </div>
                <div class="therapist-item">
                    <img src="{{ asset('pictures/women theapist.jpg') }}" alt="Nurul Waheeda">
                    <p>Nurul Waheeda</p>
                </div>
                <div class="therapist-item">
                    <img src="{{ asset('pictures/massage therapist.jpg') }}" alt="Airil Denial">
                    <p>Airil Denial</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="card contact-card tall-card">
        <h3>Contact Us</h3>
        <div class="social-links">
            <a href="https://api.whatsapp.com/send?phone=%2B601114210949&context=Afc1wgg6wmx7ZrtuuiMBAKPXO_fAw8mxOQ3p5xqkfwPeEfVuZX8mHuV12S9VuYVszXQxCf4MWbgx1IFI4aKebYCUkTrBQXbebxV9gPZ6AhpLXrbZKp-oXxUmxf6qZSdEYflIkhTjFo2hfrwu2dLN06RnmQ&source=FB_Page&app=facebook&entry_point=page_cta&fbclid=IwY2xjawKeSM5leHRuA2FlbQIxMABicmlkETFiWWtyZzdSR1VxQjdnVElDAR585Nm3VkyxmR2dOcSogHWxm0R1PllW4yaAyuWgCJqYmPJwJzWQU-DSEf9Zzw_aem_iDZfwuRiuR5PZlha1IMS_w" target="_blank">
                <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png" alt="WhatsApp" class="social-icon">
            </a>
            <a href="https://api.whatsapp.com/send?phone=%2B601114210949&context=Afc1wgg6wmx7ZrtuuiMBAKPXO_fAw8mxOQ3p5xqkfwPeEfVuZX8mHuV12S9VuYVszXQxCf4MWbgx1IFI4aKebYCUkTrBQXbebxV9gPZ6AhpLXrbZKp-oXxUmxf6qZSdEYflIkhTjFo2hfrwu2dLN06RnmQ&source=FB_Page&app=facebook&entry_point=page_cta&fbclid=IwY2xjawKeSM5leHRuA2FlbQIxMABicmlkETFiWWtyZzdSR1VxQjdnVElDAR585Nm3VkyxmR2dOcSogHWxm0R1PllW4yaAyuWgCJqYmPJwJzWQU-DSEf9Zzw_aem_iDZfwuRiuR5PZlha1IMS_w" target="_blank">
                <img src="https://cdn-icons-png.flaticon.com/512/733/733547.png" alt="Facebook" class="social-icon">
            </a>
            <!-- Instagram Icon Added -->
            <a href="https://www.instagram.com/bekamasysyifa_puchong?igsh=MWp1OXU5aTJjenQzeQ==" target="_blank">
                <img src="https://cdn-icons-png.flaticon.com/512/733/733614.png" alt="Instagram" class="social-icon">
            </a>
        </div>
    </div>

</div>
<style>
<!-- Styles -->
/* Dashboard specific styles */
.overview {
    display: flex;
    flex-direction: column; /* Stack vertically */
    align-items: center;     /* Center cards horizontally */
    gap: 20px;
    margin-top: 2rem;
    padding: 20px;
    margin-bottom: 40px; /* Add bottom margin to create space between the overview and the contact card */
}

.pin-icon {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 1.5em;
    color: #ff9800; /* Orange color for the pin */
    cursor: pointer;
    visibility: visible;  /* Always visible */
    opacity: 1;           /* Always fully opaque */
    z-index: 10;          /* Ensure it stays on top */
}

/* Hover effect for the pin icon */
.pin-icon:hover {
    color: #ff5722; /* Darker orange when hovered */
}

.card-container {
    display: flex;
    gap: 20px; /* Adjust spacing between the cards */
    justify-content: center; /* Center the cards horizontally */
    flex-wrap: wrap; /* Ensure cards wrap on small screens */
}

.card {
    background-color: #e0f7fa; /* Light blue */
    border: none;
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    text-align: left;
    overflow: hidden;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    position: relative; /* Ensure positioning for the pin icon */
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Slightly stronger hover effect */
}

.card h3 {
    background-color: #b2ebf2; /* Light blue background only for title */
    font-size: 1.0em;
    margin-bottom: 20px; /* Adjusted margin */
    font-weight: bold;
    color: black; /* Darker blue for title */
    text-align: center;
    border-bottom: 3px solid #b2ebf2; /* Thicker border */
    padding-bottom: 10px; /* Adjusted padding */
}

/* Content inside card */
.card-content {
    overflow-y: auto;
    max-height: 250px;
}

.appointment-item {
    background: #e0f7fa;
    padding: 15px;
    margin-bottom: 10px;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08);
}

.appointment-item:hover {
    background: #f0f0f0;
}

.appointment-item .appointment-date,
.appointment-item .appointment-package {
    font-size: 1em;
    color: #333;
}

/* Therapists Section */
.therapist-list {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 20px;
    margin-top: 10px;
}

.therapist-item {
    text-align: center;
    width: 120px;
}

.therapist-item img {
    width: 100px;
    height: 100px;
    object-fit: cover;
    border-radius: 50%;
    margin-bottom: 8px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease;
}

.therapist-item img:hover {
    transform: scale(1.05);
}

.therapist-item p {
    font-weight: bold;
    margin-bottom: 4px;
    color: #333;
}

.therapist-item small {
    color: #777;
}

/* Contact Section */
.contact-card {
    width: 100%; /* Full width for contact card */
    margin-top: 20px; /* Add space above the contact card */
}

.social-links {
    margin-top: 15px;
    display: flex;
    justify-content: center;
    gap: 20px;
}

.social-icon {
    width: 35px;
    height: 35px;
    transition: transform 0.3s ease;
}

.social-icon:hover {
    transform: scale(1.2);
}

/* Empty state */
.empty-state {
    color: #888;
    font-style: italic;
    text-align: center;
}

/* Responsive */
@media (max-width: 768px) {
    .card {
        width: 100%; /* Full width on small screens */
    }

    .card-container {
        flex-direction: column;
        gap: 10px; /* Adjust the gap on small screens */
    }

    .card-content {
        max-height: 200px;
    }

    .pin-icon {
        top: 8px; /* Adjust top margin for small screens */
        right: 8px; /* Adjust right margin for small screens */
    }
}
</style>
@endsection <!-- End of section -->

<?php
// Start session if necessary
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bekam Asy Syifa</title>

    <!-- Bootstrap & FontAwesome -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Helvetica Neue', sans-serif;
            background-color: #f0f4f7;
            color: white;
        }

        .navbar {
            background-color: transparent !important;
            position: absolute;
            width: 100%;
            z-index: 10;
        }

        .navbar-brand, .nav-link {
            color: white !important;
            font-weight: bold;
            font-family: "Times New Roman", Times, serif;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.7);
            padding: 10px 20px;
        }

        .hero {
            position: relative;
            height: 70vh;
            overflow: hidden;
        }

        .hero-video {
            position: absolute;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            transform: translate(-50%, -50%);
            object-fit: cover;
            filter: blur(3px);
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
            text-align: center;
            font-family: "Times New Roman", Times, serif;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.25rem;
            margin-bottom: 30px;
        }

        .btn-custom {
            background-color: #1976d2;
            color: white;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: bold;
            font-family: "Times New Roman", Times, serif;
            transition: background-color 0.3s ease-in-out;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }

        .packages {
            padding: 50px 0;
            background-color: lightblue;
        }

        .container h2 {
            font-family: "Times New Roman", Times, serif;
            font-size: 2rem;
            margin-bottom: 20px;
            color: black;
            text-align: center;
        }

        .package-card {
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 2px;
            margin: 10px;
            background-color: lightseagreen;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
        }

        .package-card img {
            width: 80%;
            max-width: 150px;
            height: auto;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .package-card h3 {
            font-size: 0.9rem;
            color: black;
            margin-bottom: 10px;
        }

        .package-card p {
            font-size: 0.8rem;
            color: red;
        }

        .package-card p1 {
            font-size: 0.8rem;
            color: white;
        }

        .features {
            padding: 50px 0;
            background-color: white;
            text-align: center;
            color: #333;
        }

        .feature {
            text-align: center;
            margin-bottom: 30px;
            color: #666;
        }

        .feature i {
            color: #007bff;
            font-size: 3rem;
            margin-bottom: 20px;
        }

        .feature h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #007bff;
        }

        .feature p {
            font-size: 1rem;
        }

        .footer {
            background-color: #0d6f78;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        .footer p {
            margin: 0;
        }

        @media (max-width: 768px) {
            .package-card {
                margin: 10px 0;
                width: calc(100% - 20px);
            }
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="/">Bekam Asy Syifa</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('register.form') }}">Register</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('login.form') }}">Login</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero">
    <video autoplay muted loop class="hero-video">
        <source src="{{ asset('video/video2.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="container hero-content">
        <h1>WELCOME TO BEKAM ASY SYIFA</h1>
        <p>Experience the balance and wellness that comes with professional cupping therapy.</p>
        <a href="{{ route('login.form') }}" class="btn btn-custom">Book Now</a>
    </div>
</section>

<!-- Popular Packages Section -->
<section class="packages">
    <div class="container">
        <h2>POPULAR PACKAGES</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-md-3 package-card">
                <img src="{{ asset('pictures/package3.jpg') }}" alt="Package 1">
                <h3>BEKAM SUNNAH (BEKAM DARAH)</h3>
                <p>TOTAL CUP: 24</p>
                <p1>+ BEKAM LUNCUR + URUTAN GUASHA + BEKAM ANGIN + BEKAM KEPALA TANPA CUKUR</p1>
            </div>
            <div class="col-md-3 package-card">
                <img src="{{ asset('pictures/package3.jpg') }}" alt="Package 2">
                <h3>BEKAM SUNNAH & MIGRAIN (2 IN 1)</h3>
                <p>TOTAL CUP: 29</p>
                <p1>+ BEKAM LUNCUR + URUTAN GUASHA + BEKAM ANGIN</p1>
            </div>
            <div class="col-md-3 package-card">
                <img src="{{ asset('pictures/package3.jpg') }}" alt="Package 3">
                <h3>BEKAM OVERHAUL (BEKAM DARAH)</h3>
                <p>TOTAL CUP: 35</p>
                <p1>+ BEKAM LUNCUR + URUTAN GUASHA + BEKAM ANGIN</p1>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('all.packages') }}" class="btn btn-custom">View All Packages</a>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features">
    <div class="container">
        <h2>Why Choose Us?</h2>
        <div class="row">
            <div class="col-md-4 feature">
                <i class="fas fa-hand-holding-medical"></i>
                <h3>Professional Cupping</h3>
                <p>Our experienced practitioners ensure the highest quality care with traditional healing techniques.</p>
            </div>
            <div class="col-md-4 feature">
                <i class="fas fa-calendar-alt"></i>
                <h3>Easy Booking</h3>
                <p>Our convenient online booking system provides real-time availability and secure appointments.</p>
            </div>
            <div class="col-md-4 feature">
                <i class="fas fa-heartbeat"></i>
                <h3>Client-Focused Care</h3>
                <p>Personalized treatments that cater to your specific health and wellness needs.</p>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer">
    <p>&copy; 2024 Bekam Asy Syifa | All Rights Reserved</p>
</footer>

<!-- JS Includes -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

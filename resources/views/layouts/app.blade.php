<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title', 'Bekam Asy Syifa')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    
    @yield('styles')
    <style>
        /* Import Google Fonts */
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");

        * {
            margin: 0;
            padding: 0;
            outline: none;
            border: none;
            text-decoration: none;
            list-style: none;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background: rgb(233, 233, 233);
            font-size: 16px;
        }

        .main-top {
            width: 100%;
            background: lightblue;
            padding: 20px;
            text-align: center;
            font-size: 20px;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: #2b2b2b;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            border-radius: 8px;
        }

        .container {
            display: flex;
            width: 1200px;
            margin: auto;
        }

        nav {
            position: sticky;
            top: 0;
            left: 0;
            bottom: 0;
            width: 280px;
            height: 100vh;
            background: lightblue;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            padding-top: 20px;
        }

        .navbar {
            width: 85%;
            margin: 0 auto;
        }

        .logo {
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            padding-left: 10px;
        }

        .logo img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        .logo h1 {
            margin-left: 1rem;
            text-transform: uppercase;
            font-size: 1rem;
            font-weight: 600;
        }

        ul {
            margin: 0;
            padding: 0;
        }

        nav ul li {
            padding-bottom: 1.2rem;
        }

        nav ul li a {
            display: flex;
            align-items: center;
            padding: 10px 16px;
            border-radius: 6px;
            transition: all 0.3s ease;
            color: black;
            font-size: 16px;
        }

        nav ul li a i {
            font-size: 14px;
            margin-right: 12px;
            min-width: 24px;
            text-align: center;
            color: black;
        }

        nav ul li a .nav-item {
            font-size: 16px;
            transition: 0.3s;
        }

        nav ul li a:hover {
            background-color: #007bff;
            color: white;
            transform: scale(1.03);
        }

        nav ul li a:hover i,
        nav ul li a:hover .nav-item {
            color: white;
        }

        .logout {
            position: absolute;
            bottom: 20px;
            width: 100%;
        }

        .logout a {
            margin-left: 16px;
        }

        .main {
            width: 100%;
            margin-left: 20px;
        }

        .main-body {
            padding: 10px 10px 10px 20px;
        }

        h1 {
            margin: 20px 10px;
        }

        .search_bar {
            display: flex;
            padding: 10px;
            justify-content: space-between;
        }

        .search_bar input {
            width: 40%;
            padding: 10px;
            border: 1px solid rgb(190, 190, 190);
        }

        .search_bar input:focus {
            border: 1px solid blueviolet;
        }

        .search_bar select {
            border: 1px solid rgb(190, 190, 190);
            padding: 10px;
            margin-left: 2rem;
        }
      




    </style>
</head>
<body>
    <div class="container">
        <nav>
            <div class="navbar">
                <div class="logo">
                    <img src="{{ asset('pictures/images1.jpg') }}" alt="Logo">
                    <h1>Bekam Asy Syifa</h1>
                </div>
                <ul>
                    <li><a href="#" onclick="reloadPage()"><i class="fas fa-home"></i><span class="nav-item">Dashboard</span></a></li>

                    @if(Auth::user()->role === 'manager')
                        <li><a href="#" onclick="loadPage('{{ route('manager.profile') }}')"><i class="fas fa-user-cog"></i><span class="nav-item">Profile</span></a></li>
                        <li><a href="#" onclick="loadPage('{{ route('appointment.index') }}')"><i class="fas fa-calendar-alt"></i><span class="nav-item">Manage Appointment</span></a></li>
                        <li><a href="#" onclick="loadPage('{{ route('staff.index') }}')"><i class="fas fa-user-cog"></i><span class="nav-item">Manage Staff</span></a></li>
                        <li><a href="#" onclick="loadPage('{{ route('packages.index') }}')"><i class="fas fa-tags"></i><span class="nav-item">Manage Package</span></a></li>
                        <li><a href="#" onclick="loadPage('{{ route('record.index') }}')"><i class="fas fa-calendar-alt"></i><span class="nav-item">Client Record</span></a></li>
                        <li><a href="#" onclick="loadPage('{{ route('sales.dashboard') }}')"><i class="fas fa-chart-pie"></i><span class="nav-item">View Sales</span></a></li>
                    @elseif(Auth::user()->role === 'staff')
                        <li><a href="#" onclick="loadPage('{{ route('staff.profile') }}')"><i class="fas fa-user-cog"></i><span class="nav-item">Profile</span></a></li>
                        <li><a href="#" onclick="loadPage('{{ route('appointment.index') }}')"><i class="fas fa-calendar-alt"></i><span class="nav-item">Manage Appointment</span></a></li>
                        <li><a href="#" onclick="loadPage('{{ route('record.index') }}')"><i class="fas fa-calendar-alt"></i><span class="nav-item">Client Record</span></a></li>
                        <li><a href="#" onclick="loadPage('{{ route('sales.dashboard') }}')"><i class="fas fa-chart-pie"></i><span class="nav-item">View Sales</span></a></li>
                    @elseif(Auth::user()->role === 'customer')
                        <li><a href="#" onclick="loadPage('{{ route('customer.profile') }}')"><i class="fas fa-user-cog"></i><span class="nav-item">Profile</span></a></li>
                        <li><a href="#" onclick="loadPage('{{ route('customer.consultation') }}')"><i class="fas fa-user"></i><span class="nav-item">Consultation Form</span></a></li>
                        <li><a href="#" onclick="loadPage('{{ route('customer.appointment.index') }}')"><i class="fas fa-calendar-alt"></i><span class="nav-item">Appointment</span></a></li>
                        <li><a href="#" onclick="loadPage('{{ route('customer.payment') }}')"><i class="fas fa-wallet"></i> <span class="nav-item">Payments</span> </a></li>
     

                    @endif

                    <li><a href="{{ route('login.form') }}" class="logout"><i class="fas fa-sign-out-alt"></i><span class="nav-item">Logout</span></a></li>
                </ul>
            </div>
        </nav>

        <section class="main">
            <div id="main-content">
                @yield('content')
            </div>
        </section>
    </div>

    <script>
        // This function now properly loads new content into the main section
        function loadPage(url) {
            fetch(url)
                .then(response => response.text())
                .then(html => {
                    const tempDiv = document.createElement('div');
                    tempDiv.innerHTML = html;
                    const content = tempDiv.querySelector('#main-content');
                    document.getElementById('main-content').innerHTML = content.innerHTML;
                })
                .catch(err => console.error('Error loading page:', err));
        }

        function reloadPage() {
    const userRole = "{{ auth()->user()->role }}"; // Get the user's role dynamically
    
    // Redirect to the dashboard based on the user's role
    if (userRole === 'manager') {
        window.location.href = '/bekamasysyifa/public/manager/dashboard';
    } else if (userRole === 'staff') {
        window.location.href = '/bekamasysyifa/public/staff/dashboard';
    } else if (userRole === 'customer') {
        window.location.href = '/bekamasysyifa/public/customer/dashboard';
    }
}

    </script>
</body>
</html>

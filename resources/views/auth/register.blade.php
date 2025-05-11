<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Registration - Bekam Asy Syifa</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
</head>

<body>
    <section class="{{ session('success') ? 'blur' : '' }}"> <!-- Add blur class if success message is present -->
        <span></span>
        <span></span>
        <span></span>
        <div class="signin">
            <div class="content">
                <h2>Register</h2>

                <!-- Display Validation Errors -->
                @if ($errors->any())
                    <div>
                        @foreach ($errors->all() as $error)
                            <p style="color: red;">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <!-- Registration Form -->
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form">
                        <div class="inputBox">
                            <input type="text" name="name" placeholder="Enter your name" required>
                        </div>
                        <div class="inputBox">
                            <input type="email" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="inputBox">
                            <input type="text" name="phone" placeholder="Enter your number" required>
                        </div>
                        <div class="inputBox">
                            <input type="password" name="password" placeholder="Enter your password" required>
                        </div>
                        <div class="inputBox">
                            <input type="password" name="password_confirmation" placeholder="Confirm your password" required>
                        </div>
                        <div class="inputBox">
                            <input type="submit" value="Register">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Success Message Overlay -->
    @if (session('success'))
        <div class="success-overlay">
            <div class="success-box">
                <p class="success-message">{{ session('success') }}</p>
                <a href="{{ route('login') }}" class="login-link">Go to Login</a>
            </div>
        </div>
    @endif
</body>

</html>

<style>
    /* Styling for success message overlay */
    .success-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background: rgba(0, 0, 0, 0.6); /* Semi-transparent dark overlay */
        z-index: 10000; /* Ensure it's above other content */
    }

    .success-box {
        background: rgba(34, 34, 34, 0.9); /* Semi-transparent box background */
        padding: 30px 50px;
        border-radius: 8px;
        text-align: center;
        color: lightgreen;
        font-family: "Times New Roman", Times, seri
        font-weight: bold;
        font-size: 1.50em;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.8);
    }

    .login-link {
    display: inline-block;
    margin-top: 15px;
    padding: 8px 15px; /* Add padding to make it look like a button */
    background-color: lightblue; /* Button color */
    color: black; /* Text color */
    font-weight: bold;
    font-size: 0.5em; /* Make the font size smaller */
    text-decoration: none;
    border-radius: 4px; /* Rounded corners */
    border: 1px solid lightblue; /* Border matching background */
    transition: background-color 0.3s, color 0.3s; /* Smooth hover transition */
}

.login-link:hover {
    background-color: white; /* Background color on hover */
    color: black; /* Text color on hover */
    text-decoration: none; /* Remove underline */
}

    /* Add blur effect to background when success message is shown */
    .blur {
        filter: blur(5px);
        pointer-events: none; /* Disable interaction with blurred content */
    }

    /* Other CSS styles remain the same */
    @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Quicksand', sans-serif;
    }

    body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: black;
        background-image: url('{{ asset('pictures/images4.avif') }}');
        background-size: contain;
        background-position: center;
        background-repeat: no-repeat;
    }

    section {
        position: absolute;
        width: 100vw;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 2px;
        flex-wrap: wrap;
    }

    section .signin {
        position: absolute;
        width: 400px;
        background: rgba(34, 34, 34, 0.9);
        z-index: 1000;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 40px;
        border-radius: 4px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.9);
        right: 200px;
        top: 50%;
        transform: translateY(-50%);
    }

    section .signin .content {
        position: relative;
        width: 200%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        gap: 40px;
    }

    section .signin .content h2 {
        font-size: 2em;
        color: white;
        text-transform: uppercase;
        font-family: "Times New Roman", Times, serif;
    }

    section .signin .content .form {
        width: 100%;
        display: flex;
        flex-direction: column;
        gap: 25px;
    }

    section .signin .content .form .inputBox {
        position: relative;
        width: 100%;
    }

    section .signin .content .form .inputBox input {
        position: relative;
        width: 100%;
        background: white;
        border: none;
        outline: none;
        padding: 25px 10px 7.5px;
        border-radius: 4px;
        color: black;
        font-weight: 500;
        font-size: 1em;
        font-family: "Times New Roman", Times, serif;
    }

    section .signin .content .form .inputBox input[type="submit"] {
        padding: 10px;
        background: lightblue;
        color: #000;
        font-weight: 600;
        font-size: 1.35em;
        letter-spacing: 0.05em;
        cursor: pointer;
        font-family: "Times New Roman", Times, serif;
    }
</style>



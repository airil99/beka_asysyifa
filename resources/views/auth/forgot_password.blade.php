<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Forgot Password - Bekam Asy Syifa</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <style>
        /* Your CSS styles go here */
        .status-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: rgba(0, 0, 0, 0.6);
            z-index: 10000;
        }

        .status-box {
            background: rgba(34, 34, 34, 0.9);
            padding: 30px 50px;
            border-radius: 8px;
            text-align: center;
            color: lightgreen;
            font-family: "Times New Roman", Times, serif;
            font-weight: bold;
            font-size: 1.50em;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.8);
        }

        .login-link {
            display: inline-block;
            margin-top: 15px;
            padding: 8px 15px;
            background-color: lightblue;
            color: black;
            font-weight: bold;
            font-size: 0.9em;
            text-decoration: none;
            border-radius: 4px;
            border: 1px solid lightblue;
            transition: background-color 0.3s, color 0.3s;
        }

        .login-link:hover {
            background-color: white;
            color: black;
        }

        .blur {
            filter: blur(5px);
            pointer-events: none;
        }

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
            background-size: cover;
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
        }

        section .forgot-password {
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

        section .forgot-password .content {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }

        section .forgot-password .content h2 {
            font-size: 2em;
            color: white;
            text-transform: uppercase;
            font-family: "Times New Roman", Times, serif;
        }

        section .forgot-password .content .form {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        section .forgot-password .content .form .inputBox {
            width: 100%;
        }

        section .forgot-password .content .form .inputBox input {
            width: 100%;
            background: white;
            border: none;
            outline: none;
            padding: 15px;
            border-radius: 4px;
            color: black;
            font-weight: 500;
            font-size: 1em;
            font-family: "Times New Roman", Times, serif;
        }

        section .forgot-password .content .form .inputBox input[type="submit"] {
            padding: 10px;
            background: lightblue;
            color: #000;
            font-weight: 600;
            font-size: 1.35em;
            letter-spacing: 0.05em;
            cursor: pointer;
            font-family: "Times New Roman", Times, serif;
            border: none; /* No border for submit button */
        }

        .alert {
            color: red; /* Error message color */
            text-align: center; /* Center error messages */
            margin-bottom: 15px; /* Space below error messages */
        }

        .alert-success {
            color: lightgreen; /* Success message color */
            text-align: center; /* Center success messages */
            margin-bottom: 15px; /* Space below success messages */
        }

        .signup-message {
            text-align: center; /* Center the text */
            color: white; /* Set the default text color to white */
            font-family: "Times New Roman", Times, serif; /* Use the same font family */
            margin-top: 15px; /* Add some space above the message */
        }

        .signup-message a {
            color: gold; /* Set the color for the "Sign up now" link to gold */
            font-weight: 600; /* Make the signup link bold */
            text-decoration: none; /* Remove underline */
        }

        .signup-message a:hover {
            text-decoration: underline; /* Add underline on hover */
        }
    </style>
</head>

<body>
    <section>
        <div class="forgot-password">
            <div class="content">
                <h2>Forgot Password</h2>

                <!-- Displaying error messages -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('password.update') }}" method="POST">
                    @csrf <!-- CSRF token for security -->
                    <div class="form">
                        <div class="inputBox">
                            <input type="email" name="email" required placeholder="Email">
                        </div>
                        <div class="inputBox">
                            <input type="password" name="new_password" required placeholder="New Password">
                        </div>
                        <div class="inputBox">
                            <input type="password" name="new_password_confirmation" required placeholder="Confirm Password">
                        </div>
                        <div class="inputBox">
                            <input type="submit" value="Reset Password">
                        </div>
                        <div class="signup-message">
                            <p>Remembered your password? <a href="{{ route('login') }}">Sign in now</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Status Overlay -->
        @if (session('status'))
            <div class="status-overlay">
                <div class="status-box">
                    <p class="status-message">{{ session('status') }}</p>
                <a href="{{ route('login') }}" class="login-link">Go to Login</a>
                    </div>
                </div>
            </div>
        @endif
    </section>
</body>

</html>

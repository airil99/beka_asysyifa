<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login - Bekam Asy Syifa</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

</head>

<body>
    
    <section>
        <span></span>
        <span></span>
        <span></span>
        <div class="signin">
            <div class="content">
                <h2>Sign In</h2>

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

                <form action="{{ route('login') }}" method="POST">
                    @csrf <!-- CSRF token for security -->
                    <div class="form">
                        <div class="inputBox">
                            <input type="text" name="email" required>
                            <i>Email</i>
                        </div>
                        <div class="inputBox">
                            <input type="password" name="password" required>
                            <i>Password</i>
                        </div>
                        <div class="links">
                        <a href="{{ route('password.request') }}">Forgot Password?</a>
                        </div>
                        <div class="inputBox">
                            <input type="submit" value="Login">
                        </div>
                        <div class="signup-message">
                            <p>No account? <a href="{{ route('register') }}">Sign up now</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>

</html>



<style>
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
    background-color: black; /* Set the background color to black */
    background-image: url('{{ asset('pictures/images4.avif') }}');
    background-size: contain; /* Avoid stretching */
    background-position: center;
    background-repeat: no-repeat;
}

section {
    position: absolute;
    width: 100vw; /* Full viewport width */
    height: 100vh; /* Full viewport height */
    display: flex;
    justify-content: center; /* Center child elements horizontally */
    align-items: center; /* Center child elements vertically */
    gap: 2px;
    flex-wrap: wrap;
}

section .signin {
    position: absolute; /* Keep it absolute for positioning */
    width: 400px; /* Width of the sign-in box */
    background: rgba(34, 34, 34, 0.9); /* Semi-transparent background */
    z-index: 1000; /* Layering */
    display: flex; /* Flexbox for alignment */
    justify-content: center; /* Center content horizontally */
    align-items: center; /* Center content vertically */
    padding: 40px; /* Padding inside the box */
    border-radius: 4px; /* Rounded corners */
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.9); /* Shadow for depth */
    right: 200px; /* Position it 20px from the right */
    top: 50%; /* Center it vertically */
    transform: translateY(-50%); /* Shift it up by half its height */
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
    color: #000;
    font-weight: 500;
    font-size: 1em;
    font-family: "Times New Roman", Times, serif;
}

section .signin .content .form .inputBox i {
    position: absolute;
    left: 0;
    padding: 15px 10px;
    color: #aaa;
    transition: 0.5s;
    pointer-events: none;
    font-family: "Times New Roman", Times, serif;
}

.signin .content .form .inputBox input:focus ~ i,
.signin .content .form .inputBox input:valid ~ i {
    transform: translateY(-7.5px);
    font-size: 0.8em;
    color: #fff;
    font-family: "Times New Roman", Times, serif;
}

.signin .content .form .links {
    position: relative;
    width: 100%;
    display: flex;
    justify-content: space-between;
}

.signin .content .form .links a {
    color: white;
    text-decoration: none;
    font-family: "Times New Roman", Times, serif;
}

.signin .content .form .links a:nth-child(2) {
    color: gold;
    font-weight: 600;
}

.signin .content .form .inputBox input[type="submit"] {
    padding: 10px;
    background: lightblue;
    color: #000;
    font-weight: 600;
    font-size: 1.35em;
    letter-spacing: 0.05em;
    cursor: pointer;
    font-family: "Times New Roman", Times, serif;
}

input[type="submit"]:active {
    opacity: 0.6;
}

.signin .content .form .signup-message {
    text-align: center; /* Center the text */
    color: white; /* Set the default text color to white */
    font-family: "Times New Roman", Times, serif; /* Use the same font family */
    margin-top: 15px; /* Add some space above the message */
}

.signin .content .form .signup-message a {
    color: gold; /* Set the color for the "Sign up now" link to gold */
    font-weight: 600; /* Make the signup link bold */
    text-decoration: none; /* Remove underline */
}

.signin .content .form .signup-message a:hover {
    text-decoration: underline; /* Add underline on hover */
}

.alert {
    background-color: #f8d7da; /* Light red background */
    color: #721c24; /* Dark red text */
    border: 1px solid #f5c6cb; /* Light red border */
    padding: 15px; /* Add some padding */
    border-radius: 4px; /* Rounded corners */
    margin-bottom: 20px; /* Space below the alert */
    display: flex; /* Flexbox for alignment */
    flex-direction: column; /* Column layout */
}

.alert ul {
    margin: 0; /* Reset margin for list */
    padding: 0; /* Reset padding for list */
}

.alert li {
    list-style: none; /* Remove bullet points */
}
</style>



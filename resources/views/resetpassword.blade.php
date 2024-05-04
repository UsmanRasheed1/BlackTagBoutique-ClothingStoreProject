<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification Form</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Custom CSS -->
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    <!-- Animation CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
         body {
            font-family: Arial, sans-serif;
            background-image: url('{{ asset("images/background.jpg") }}');
            background-size: cover;
            color: rgb(255, 254, 254);
            background-position: center;
            background-repeat: no-repeat;
            margin: 0; /* Added to remove default margin */
            padding: 0; /* Added to remove default padding */
            min-height: 100vh;
        }
        .login-form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .login-form {
            border: 1px solid rgb(204, 204, 204); /* Add a thin outline */
            padding: 30px; /* Add padding */
            max-width: 400px; /* Set maximum width */
            width: 100%; /* Take up full width */
            background-color: #383131; /* Dark red color */
            border-radius: 10px; /* Add some border radius */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Add shadow */
        }
        .required-symbol {
            color: red; /* Set the color to red */
        }
        /* Change button color */
        .btn-primary {
            background-color: #da2a37; 
            border: 2px solid black;
            border-radius: 5px;
            width: 100%;
            margin-top: 20px;
            font-size: 16px;
        }
        .btn-primary:hover {
            background-color: #991d27; 
            border: 2px solid black;
        }
        .btn-primary:active {
            background-color: #991d27 !important; 
            border: 2px solid black !important;
        }
        
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <!-- Navbar brand/logo -->
            <a class="navbar-brand" href="#">
                <img src= "{{ asset('images/Logo2.jpeg') }}" alt="Your Logo" height="100">
            </a>
    
            <!-- Navbar toggler button for small screens -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <!-- Navbar items and form -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <!-- Other navbar items -->
                    <li class="nav-item">
                        <form id="register" action="/registerform" method="POST" class="nav-link navbar-text ">
                            @csrf
                            <button type="submit" class="navbar-btn navbar-btn-text navbar-text">Register</button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <form id="login" action="/" method="POST" class="nav-link navbar-text ">
                            @csrf
                            <button type="submit" class="navbar-btn navbar-btn-text navbar-text">Login</button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <form id="homeForm" action="/homepage" method="POST" class="nav-link navbar-text">
                            @csrf
                            @if(@isset($email))
                                <input type="hidden" name="email" value="{{ $email }}"> 
                            @endif
                            <button type="submit" class=" navbar-btn navbar-btn-text">Home</button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <form id="menForm" action="/catalogue" method="POST" class="nav-link navbar-text">
                            @csrf
                            @if(@isset($email))
                                <input type="hidden" name="email" value="{{ $email }}"> 
                            @endif
                            <input type="hidden" name="category" value="Men">
                            <button type="submit" class=" navbar-btn navbar-btn-text">Men</button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <form id="womenForm" action="/catalogue" method="POST" class="nav-link navbar-text">
                            @csrf
                            @if(@isset($email))
                                <input type="hidden" name="email" value="{{ $email }}"> 
                            @endif
                            <input type="hidden" name="category" value="Women">
                            <button type="submit" class=" navbar-btn navbar-btn-text">Women</button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <form id="kidsForm" action="/catalogue" method="POST" class="nav-link navbar-text ">
                            @csrf
                            @if(@isset($email))
                                <input type="hidden" name="email" value="{{ $email }}"> 
                            @endif
                            <input type="hidden" name="category" value="Kids">
                            <button type="submit" class="navbar-btn navbar-btn-text navbar-text">Kids</button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <form id="winterForm" action="/catalogue" method="POST" class="nav-link navbar-text ">
                            @csrf
                            @if(@isset($email))
                                <input type="hidden" name="email" value="{{ $email }}"> 
                            @endif
                            <input type="hidden" name="category" value="Winter">
                            <button type="submit" class="navbar-btn navbar-btn-text navbar-text">Winter</button>
                        </form>
                    </li>
                   
                 
                   
                    <li class="nav-item">
                        <div class="container mt-3 mb-3 search-bar">
                            <form class="d-flex" id="searchForm" action="/catalogue" method="POST" onsubmit="return validateSearch()">
                                @csrf <!-- Add CSRF token for security -->
                                @if(@isset($email))
                                    <input type="hidden" name="email" value="{{ $email }}"> 
                                @endif
                                <input class="form-control me-2" type="search" name="search" id="searchText" placeholder="Search By Name" aria-label="Search" required>
                                <button class="btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container login-form-container">
        <div class="login-form">
            <h1 class="text-center mb-4">Reset Password</h1>
            @if(isset($error))
    <div class="alert alert-danger">
        {{ $error }}
    </div>
@endif

    
<form id="resetForm" method="POST" action="/resetpassword">
    @csrf
    <input type="hidden" name="email" value="{{ $email }}">
    
    <!-- Password input -->
    <div class="mb-3">
        <label for="password" class="form-label">Password <span class="required-symbol">*</span></label>
        <input type="password" id="password" name="password" class="form-control" required minlength="8">
    </div>

    <!-- Confirm password input -->
    <div class="mb-3">
        <label for="confirmPassword" class="form-label">Confirm Password <span class="required-symbol">*</span></label>
        <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" required minlength="8">
    </div>

    <!-- Error message for password mismatch -->
    <div id="passwordError" class="alert alert-danger" style="display: none;">
        Passwords do not match.
    </div>

    <button type="submit" class="btn btn-primary">Enter Password</button>
</form>
        </div>
    </div>

    @include('component.footer')
    <!-- Bootstrap JS and dependencies -->
    <script>
        function validateSearch() {
            var searchText = document.getElementById("searchText").value;
            if (searchText.trim() == "") {
                alert("Please enter a search term.");
                return false; // Prevent form submission
            }
            return true; // Allow form submission
        }
        function validatePassword() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirmPassword").value;
        var passwordError = document.getElementById("passwordError");

        // Regex pattern for password validation
        var pattern = /^(?=.*[A-Z])(?=.*\d).+$/;

        if (password !== confirmPassword) {
            passwordError.textContent = "Passwords do not match.";
            passwordError.style.display = "block";
            return false; // Prevent form submission
        } else if (!pattern.test(password)) {
            passwordError.textContent = "Password must be at least 8 characters long and contain at least one uppercase letter and one digit.";
            passwordError.style.display = "block";
            return false; // Prevent form submission
        } else {
            passwordError.style.display = "none";
            return true; // Allow form submission
        }
    }

    // Add event listener to form submit for password validation
    document.getElementById("resetForm").addEventListener("submit", function(event) {
        if (!validatePassword()) {
            event.preventDefault(); // Prevent form submission on validation failure
        }
    });
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>

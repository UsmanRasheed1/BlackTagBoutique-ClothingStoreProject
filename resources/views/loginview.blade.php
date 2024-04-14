<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
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
            <h1 class="text-center mb-4">Login Form</h1>
            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <form method="POST" action="/loginfunc">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email <span class="required-symbol">*</span></label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" required autocomplete="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password <span class="required-symbol">*</span></label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
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
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>

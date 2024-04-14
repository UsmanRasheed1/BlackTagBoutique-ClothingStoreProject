<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remove Clothes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Animation CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
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
        .checkout-form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .checkout-form {
            border: 1px solid rgb(204, 204, 204); /* Add a thin outline */
            padding: 20px; /* Add padding */
            max-width: 600px; /* Set maximum width */
            width: 100%; /* Take up full width */
            background-color: #383131; /* Dark red color */
            border-radius: 10px; /* Add some border radius */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Add shadow */
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
        /* Set heading text color to white */
        h1 {
            color: #ffffff;
        }
    </style>
</head>
<body>
    @include('component.ownernavbar')
    <div class="checkout-form-container">
        <div class="checkout-form">
            <!-- Apply white color to the heading text -->
            <h1 class="text-center mb-4" style="color: #ffffff;">Remove Clothes</h1>
            @if (isset($error))
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endif
        @if (isset($success))
            <div class="alert alert-success">
                {{ $success }}
            </div>
        @endif
           
            <form action="/ownerremoveclothes" method="post">
                @csrf
                <div class="mb-3">
                    <input type="hidden" name="email" value="{{ $email }}">
                    <label for="Clothesid" class="form-label">Clothes ID:</label>
                    <input type="number" id="Clothesid" name="Clothesid" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Remove</button>
            </form>
        </div>
    </div>
    @include('component.footer')
    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>

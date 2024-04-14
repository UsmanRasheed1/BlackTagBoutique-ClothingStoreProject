<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Form</title>
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
        .required-symbol {
            color: red; /* Set the color to red */
            margin-left: 5px; /* Add a margin to separate from the label */
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
         .form-example{
            color: rgb(255, 255, 255);
            font-size: 12px;
        }
    </style>
</head>
<body>
    @include('component.navbar')
<div class="container checkout-form-container">
    <div class="checkout-form">
        <h1 class="text-center mb-4">Checkout Form for {{$Name}}</h1>
        <form method="POST" action="/checkoutfunction">
            @csrf
            @if (isset($error))
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endif
            <div class="mb-3">
                <input type="hidden" name="email" value="{{ $email }}"> 
                <label for="phone" class="form-label">Phone Number<span class="required-symbol">*</span></label>
                <input type="text" id="phonenum" name="phonenum" class="form-control" pattern="(\+92|0)3\d{9}" placeholder="Enter your Phone Number" required>
                <div class="form-example">Example:+923456789012 or 03123456789</div>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address<span class="required-symbol">*</span></label>
                <textarea id="Address" name="Address" class="form-control" rows="3" required placeholder="Enter your address"></textarea>
                <div class="form-example">Example: House No. 123, Street Name, City, Country</div>
            </div>

            <div class="mb-3">
                <label for="Comments" class="form-label">Comments </label>
                <textarea id="Comments" name="Comments" class="form-control" rows="3" placeholder="Enter any Additional Comments if necessary"></textarea>
                <div class="form-example">Example: Near X</div>
            </div>

            <button type="submit" class="btn btn-primary">Checkout</button>
            
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

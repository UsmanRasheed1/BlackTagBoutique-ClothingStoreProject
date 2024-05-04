<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
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
            background-color: #000000;
            color: rgb(17, 17, 17);
            line-height: 1.6;
            text-align: center;
            background-image: url('{{ asset("images/background.jpg") }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .homepagecontainer {
            max-width: 800px;
            margin: 50px auto 0;
            padding: 20px;
            background-color: #383131; /* Apply black background color */
            border-radius: 10px; /* Add border radius for rounded corners */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Add shadow for depth */
        }
        .receipt {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .receipt p {
            margin: 5px 0;
        }
        .receipt .total {
            font-weight: bold;
        }
        h1 {
            font-family: Arial, sans-serif;
            font-size: 32px;
            color: rgb(255, 255, 255);
            text-align: center;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        hr.dashed-line {
            border: none; /* Remove default border */
            border-top: 4px dashed rgb(0, 0, 0); /* Sets the dashed style, thickness, and color */
            height: 0; /* Reset default height */
            margin: 20px 0; /* Adds some spacing above and below the line */
        }
        .btn-container {
            display: flex; /* Use flexbox to arrange items horizontally */
            justify-content: center; /* Center the buttons horizontally */
            margin-top: 20px;
        }
        .btn {
            
            font-size: 16px;
            border-radius: 5px;
            color: #ffffff;
            cursor: pointer;
            transition: background-color 0.3s;
            text-transform: uppercase;
            border: 2px solid black;
            margin-top: 1%;
            margin-bottom: 50%;
        }
        .btn-red,
        .btn-green {
            margin-right: 4px; /* Add some space between buttons */
        
        }
        .btn-red:hover,
        .btn-green:hover {
            border: 2px solid black;
            color: #ffffff;
        }
        .btn:active {
            border: 2px solid black !important;
        }
        .btn-red {
            background-color: #da2a37;
        }
        .btn-red:hover {
            background-color: #991d27; /* Darker green on hover */
        }
        .btn-green {
            background-color: #3cba54; /* Green color */
        }
        .btn-green:hover {
            background-color: #2e8b44; /* Darker green on hover */
        }
    </style>
</head>
<body>
    @include('component.navbar')
    <div class="homepagecontainer">
        <div class="receipt">
            <h1 style="color: black;">Your Order</h1>
            {!! nl2br(e($receipt->ReceiptText)) !!}
            <p class="total">Total Price: {!! $receipt->TotalPrice !!}</p>
            <p>Delivery Date: {!! $receipt->formattedDeliveryDate !!}</p>    
        </div>
    </div>
    <!-- Button container -->
    <div class="btn-container">
        <!-- Button for forwarding to Page 1 -->
        <form action="/cancelorder" method="post">
            @csrf
            <button type="submit" class="btn btn-red">Cancel Order</button>
            <input type="hidden" name="email" value="{{$email}}">
        </form>
        <!-- Button for forwarding to Page 2 -->
        <form action="/receipts" method="post">
            @csrf
            <button type="submit" class="btn btn-green">View Receipts</button>
            <input type="hidden" name="email" value="{{$email}}">
        </form>
    </div>
    @include('component.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>

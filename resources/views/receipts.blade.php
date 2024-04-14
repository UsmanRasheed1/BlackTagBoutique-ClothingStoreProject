<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Receipts</title>
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
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
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
        .receipt hr {
            margin: 10px 0;
            border: none;
            border-top: 1px dashed #ccc;
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
        border-top: 4px dashed rgb(0, 0, 0) ; /* Sets the dashed style, thickness, and color */
        height: 0; /* Reset default height */
        margin: 20px 0; /* Adds some spacing above and below the line */
    }
    </style>
</head>
<body>
    @include('component.navbar')
    <h1> {{$Name}}'s Receipts </h1>
    <div class="container">
        @if($receipts->isEmpty())
        <br><br><br><br><br>
        <div class="homepagecontainer">
        
            <h1>No Receipts Yet!</h1>
           
        </div>
        <br><br><br><br><br>
        @else
        @foreach($receipts as $receipt)
        <div class="receipt">
            {!! nl2br(e($receipt->ReceiptText)) !!}
            <hr class="dashed-line">
            <p class="total">Total Price: {!! $receipt->TotalPrice !!}</p>
            <p>Delivery Date: {!! $receipt->formattedDeliveryDate !!}</p>
        </div>
        @endforeach
        @endif
    </div>
</body>
@include('component.footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</html>

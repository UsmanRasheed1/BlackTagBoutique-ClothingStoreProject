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
        border-top: 4px dashed rgb(0, 0, 0) ; /* Sets the dashed style, thickness, and color */
        height: 0; /* Reset default height */
        margin: 20px 0; /* Adds some spacing above and below the line */
    }
    .card {
            border: 1px solid #000000 ;
            border-radius: 5px;
            overflow: hidden;
            transition: transform 0.3s;
            background-color: #383131; 
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-img-top {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .card-body {
            padding: 15px;
        }

        .btn-image {
            border: none;
            background: none;
            cursor: pointer;
            padding: 0;
            display: block;
            width: 100%;
            text-align: left;
        }

        .btn-image:focus {
            outline: none;
        }

        .card-title {
            font-size: 1rem;
            font-weight: bold;
            margin-bottom: 5px;
            text-align: center;
            color: #000000; /* white color */
        }

        .card-text {
            font-weight: bold;
            margin-bottom: 5px;
            color: #000000; /* white color */
        }

        .col-md-4 {
            flex: 0 0 calc(33.333% - 20px);
            margin-right: 20px;
            margin-bottom: 20px;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin-left: -10px;
            margin-right: -10px;
        }

        .col {
            flex: 0 0 100%;
        }

        @media (max-width: 768px) {
            .col-md-4 {
                flex: 0 0 calc(50% - 20px);
            }
        }

        /* Fade-in Animation */
        .fade-in {
            opacity: 0;
            animation: fadeInAnimation 1s forwards;
        }

        @keyframes fadeInAnimation {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
</head>
<body>
 
    @include('component.ownernavbar')
    <h1> Welcome {{$Name}} </h1>
    <div class="homepagecontainer">
        <h1> User Details </h1>
           
            <div class="receipt">
                @foreach($userview as $user)
                <p>Name: {!! $user->{'Full Name'} !!}</p>
                <p>Email: {!! $user->email !!}</p>
                <p>Address: {!! $user->address !!}</p>
                <p>Phone Number: {!! $user->phonenum !!}</p>
                <hr class="dashed-line">
                @endforeach
            </div>
            
    </div>
    <div class="homepagecontainer">
        
        <h1> Sales Details </h1>
            <div class="receipt">
                <h1 style="color: black;">Highest Spending Customer(s)</h1>
                <p class="total">Name: {!! $user->{'Full Name'} !!}</p>
                @foreach($HSC as $receipt)
                {!! nl2br(e($receipt->receipttext)) !!}
                <p class="total">Total Price: {!! $receipt->totalprice !!}</p>
                <p>Delivery Date: {!! $receipt->formattedDeliveryDate !!}</p>
                <hr class="dashed-line">
            @endforeach

            <h1 style="color: black;">Highest Total Spending Customer(s)</h1>
            @foreach($HTSC as $receipt)
            <p class="total">Name: {!! $user->{'Full Name'} !!}</p>
                <p class="total">Total Sum: {!! $receipt->total_sum !!}</p>
                <hr class="dashed-line">
            @endforeach

            <h1 style="color: black;">Most Frequent Customer(s)</h1>
            @foreach($FC as $receipt)
            <p class="total">Name: {!! $user->{'Full Name'} !!}</p>
                <p class="total">Frequency: {!! $receipt->Frequency !!}</p>
                <hr class="dashed-line">
            @endforeach
            <h1 style="color: black;">Total Revenue: {!!$rcptsum!!}</h1>
            <hr class="dashed-line">
            <h1 style="color: black;">Average Sale: {!!$rcptavg!!}</h1>
            <hr class="dashed-line">
            <h1 style="color: black;">Amount of Total Records: {!!$rcptcount!!}</h1>
            <hr class="dashed-line">
            </div>
    </div>
    <div class="homepagecontainer">
        <h1> Orders Yet to be Delivered </h1>
            @foreach($OYD as $receipt)
            <div class="receipt">
                {!! nl2br(e($receipt->receipttext)) !!}
                <hr class="dashed-line">
                <p class="total">Total Price: {!! $receipt->totalprice !!}</p>
                <p>Delivery Date: {!! $receipt->formattedDeliveryDate !!}</p>
            </div>
            @endforeach
    </div>
    <div class="homepagecontainer">
    <h1> Orders Succesfully Delivered </h1>
        @foreach($OSD as $receipt)
        <div class="receipt">
            {!! nl2br(e($receipt->receipttext)) !!}
            <hr class="dashed-line">
            <p class="total">Total Price: {!! $receipt->totalprice !!}</p>
            <p>Delivery Date: {!! $receipt->formattedDeliveryDate !!}</p>
        </div>
        @endforeach
</div>

<div class="homepagecontainer">
        
    <h1> Clothes Details </h1>
        <div class="receipt">
           <h1 style="color: black;">Total Clothes Price: {!!$clsum!!}</h1>
        <hr class="dashed-line">
        <h1 style="color: black;">Average Clothes Price: {!!$clavg!!}</h1>
        <hr class="dashed-line">
        <h1 style="color: black;">Amount of Total Clothes (Not including color): {!!$clcount!!}</h1>
        <hr class="dashed-line">
        <h1 style="color: black;">Amount of Total Clothes (Including color): {!!$clrcount!!}</h1>
        <hr class="dashed-line">
        <h1 style="color: black;">Most Expensive Clothing:</h1>
        @foreach($clmax as $clmax)
        <p class="total"> Clothes Name: {!! $clmax->clothes_name !!} </p>
        <p class="total"> Clothes Price: {!! $clmax->Price !!} </p>
        <hr class="dashed-line">
        @endforeach
        <h1 style="color: black;">Least Expensive Clothing:</h1>
        @foreach($clmin as $clmin)
        <p class="total"> Clothes Name: {!! $clmin->clothes_name !!} </p>
        <p class="total"> Clothes Price: {!! $clmin->Price !!} </p>
        <hr class="dashed-line">
        @endforeach
        </div>
</div>
<div class="homepagecontainer">
    <h1 style="color: rgb(255, 255, 255);">Displaying Clothes Below:</h1>
</div>
<div class="container mt-5">
    
<div class="row">
    @forelse($clothes as $cloth)
    <div class="col-md-4 mb-4 fade-in">
        <div class="card">
                    <img src="{{ asset('images/' . $cloth->picture) }}" class="card-img-top" alt="{{ $cloth->clothes_name }}" loading="lazy">
            <div class="card-body">
                <h5  class="card-title">{{ $cloth->clothes_name }}</h5>
                <p  class="card-text">Clothes ID: {{ $cloth->Clothesid }}</p>
                <p  class="card-text">Price: Rs {{ $cloth->Price }}</p>
                <p class="card-text">Available in Colors:
                    @php
                    $colors = \App\Models\colors::where('Clothesid', $cloth->Clothesid)->pluck('Color');
                
                    // Check if any colors were found
                    if ($colors->isNotEmpty()) {
                        // Output the colors
                        foreach ($colors as $color) {
                           
                            $textColor = $color === 'Blue' ? 'LightBlue' : $color;
                            echo "<span style='color: $textColor; '>$color</span> ";
                        }
                    } else {
                        echo "Not specified";
                    }
                    @endphp
                </p>
            </div>
        </div>
    </div>
    @empty
    <div class="col">
        <p>No items found.</p>
    </div>
    @endforelse
</div>
</div>
</div>

@include('component.footer')

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</html>

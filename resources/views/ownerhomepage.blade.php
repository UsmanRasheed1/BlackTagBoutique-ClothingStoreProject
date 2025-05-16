<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner HomePage</title>
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
        #slider-container {
            position: fixed;
            top: 50%;
            right: 0;
            transform: translateY(-50%);
            z-index: 1000;
            width: 20px; /* Set initial width */
            height: 400px;
            background-color: rgb(230, 99, 99);
            border-radius: 10px;
            overflow: hidden;
            cursor: pointer;
            transition: width 0.3s ease-in-out; /* Added transition for width */
        }

        #slider-container.active {
            width: 250px; /* Increased width when active */
            height: 250px;
        }        



#slider-container.active #slider-button {
    transform: translateX(-100%);
}




    .heading-link {
        display: block;
        padding: 10px;
        color: #fff;
        text-decoration: none;
        transition: background-color 0.3s ease-in-out;
    }

    .heading-link:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }

    #slider-button i {
    /* Styles for the arrow icon */
    font-size: 20px; /* Adjust the size as needed */
    margin-right: 10px; /* Optional: Add spacing between the icon and text */
}

    </style>
</head>
<body>
 
    @include('component.ownernavbar')
    <h1> Welcome {{$Name}} </h1>
    <div class="homepagecontainer">
        <h1 id="user-details-heading" class="heading">User Details</h1>
           
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
        
        <h1 id="sales-details-heading" class="heading" > Sales Details </h1>
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
    <div class="homepagecontainer" id="order-details-heading" class="heading">
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

<div class="homepagecontainer" id="clothes-details-heading" class="heading">
        
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
<div class="homepagecontainer" id='reviews-heading' class="heading">
        <h1> Reviews </h1>
</div>
 <div class="homepagecontainer"  class="heading">
              <div class="content">
                
            <h3 class="mt-4" style="color: #08ff08;"> Total Positive Reviews: {{ $positive }}</h3>
            <h3 class="mt-4" style="color: #f56b6b;">Total Negative Reviews: {{ $negative }}</h3>
             <h3 class="mt-4" style="color: #a699f0;">Total Neutral Reviews: {{ $neutral }}</h3>

    <h3 class="mt-4" style="color: #fff;">Customer Reviews</h3>

    @php
        $groupedReviews = $reviews->groupBy('sentiment');
    @endphp

    @foreach (['Positive' => 'Positive Reviews', 'Neutral' => 'Neutral Reviews', 'Negative' => 'Negative Reviews'] as $sentiment => $label)
      @if ($groupedReviews->has($sentiment))
        <h4 style="color: #ffc107; margin-top: 20px;">{{ $label }}</h4>
        @foreach ($groupedReviews[$sentiment] as $review)
          <div class="receipt">
            <p><strong>User:</strong> {{ $review->email }}</p>
            <p><strong>Review:</strong> {{ $review->reviewtext }}</p>
             <p><strong>Clothing:</strong> {{ $review->clothes_name }}</p>
            <hr class="dashed-line">
            <p class="total"><strong>Date:</strong> {{ \Carbon\Carbon::parse($review->reviewdate)->format('F j, Y, g:i a') }}</p>
          </div>
        @endforeach
      @endif
    @endforeach
  </div>

    </div>
   


<div id="slider-container" class="slider-closed">
    <!-- Slider button -->
    <div id="slider-button" class="active">
        <i class="fas fa-chevron-left"></i> <!-- Arrow icon -->
    </div>
    <!-- Anchor links inside the slider -->
    <a href="#" class="heading-link" data-target="user-details-heading">User Details</a>
    <a href="#" class="heading-link" data-target="sales-details-heading">Sales Details</a>
    <a href="#" class="heading-link" data-target="order-details-heading">Order Details</a>
    <a href="#" class="heading-link" data-target="clothes-details-heading">Clothe Details</a>
    <a href="#" class="heading-link" data-target="reviews-heading">Reviews</a>
</div>
@include('component.footer')

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sliderContainer = document.getElementById('slider-container');
        const sliderButton = document.getElementById('slider-button');
        const headingLinks = document.querySelectorAll('.heading-link');

        // Toggle slider state
        function toggleSlider() {
            sliderContainer.classList.toggle('active');
            sliderContainer.classList.toggle('slider-open');
            sliderContainer.classList.toggle('slider-closed');
            sliderButton.classList.toggle('active'); // Toggle button state
        }

        // Scroll to target element
        function scrollToElement(targetId) {
            const targetElement = document.getElementById(targetId);
            if (targetElement) {
                targetElement.scrollIntoView({ behavior: 'smooth' });
            }
        }

        // Handle slider button click
        sliderButton.addEventListener('click', function () {
            toggleSlider();
        });

        // Handle heading link clicks
        headingLinks.forEach(function (link) {
            link.addEventListener('click', function (event) {
                event.preventDefault();
                const targetId = this.getAttribute('data-target');
                scrollToElement(targetId);
                toggleSlider(); // Close the slider after clicking a link
            });
        });
    });
</script>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    
    
    <style>
        /* Custom styles for the product page */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            background-image: url('{{ asset("images/background.jpg") }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #ffffff; /* Set text color to white */
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .content {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%; /* Set width to 100% */
            max-width: 800px; /* Limit maximum width */
            background-color: #383131;
            box-shadow: 0 0 10px rgba(177, 27, 27, 0.1);
            padding: 20px;
            margin-top: 20px; /* Move margin from h2 to content */
            color: #ffffff; /* Set text color to white */
        }

        .item {
            margin-bottom: 30px;
            border: 5px solid #ddd;
            padding: 10px;
            border-radius: 5px;
        }

        .colors-container .item {
            width: calc(35% - 20px); /* Adjust width and margin for mobile devices */
            margin-right: 10px;
            margin-bottom: 10px; /* Add margin bottom */
            display: inline-block; /* Display items inline */
        }

        @media (max-width: 500px) {
            .colors-container .item {
                width: calc(30% - 10px); /* Adjust width and margin for tablets */
                margin-right: 10px;
                margin-bottom: 10px; /* Add margin bottom */
            }
        }

        @media (max-width: 450px) {
            .colors-container .item {
                width: calc(80% - 20px); /* Adjust width for mobile devices */
                margin-right: 0;
                margin-bottom: 10px; /* Add margin bottom */
            }
        }

        .colors-container input[type="radio"] {
            display: none; /* Hide the radio buttons */
        }

        .colors-container label {
            display: block;
            position: relative;
            cursor: pointer;
            border: 1px solid #ddd;
            border-radius: 3px;
            padding: 5px;
            margin-bottom: 10px;
            color: #ffffff; /* Set text color to white */
        }

        .colors-container label img {
            width: 100%;
            height: auto;
            border-radius: 3px;
            border: 1px solid #ddd;
        }

        p.text-muted {
            font-weight: bold; /* Make the price text bolder */
            text-align: center; /* Center align price text */
            color: #ffffff; /* Set text color to white */
        }

        /* Customizing form elements and buttons */
        input[type="number"],
        input[type="submit"],
        select,
        .btn {
            background-color: #dc2d3a; /* Custom background color */
            color: #fff; /* Custom text color */
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="number"]:hover,
        input[type="submit"]:hover,
        select:hover,
        .btn:hover {
            background-color: #e08696; /* Custom background color on hover */
        }

        input[type="number"],
        select {
            width: 60%; /* Reduced width for quantity and size inputs */
            box-sizing: border-box;
        }

        .btn {
            width: 100%; /* Full width for the Add to Cart button */
        }
        
        .color-label {
            display: flex;
            align-items: center;
            position: relative;
            cursor: pointer;
        }

        .radio-circle {
            margin-right: 10px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 2px solid rgb(255, 255, 255);
        }

        .color-radio:checked + .color-label .radio-circle {
            background-color: #e03367;
            border-color: #f7f7f7;
            
        }

        .colors-container label img {
            width: 100%;
            height: auto;
            border-radius: 3px;
            border: 1px solid #ddd;
            opacity: 0.5; /* Make the original image opaque */
            transform: scale(0.8); /* Scale down the original image */
            transition: opacity 0.3s ease, transform 0.3s ease; /* Add transition for opacity and transform */
        }

        .colors-container input[type="radio"]:checked + label img {
            border: 3px solid rgb(0, 0, 0);
            opacity: 1; /* Make the selected image fully opaque */
            transform: scale(0.9); /* Return the selected image to its original size */
        }

        .input-container input[type="number"],
        .input-container select {
            width: 40%; /* Adjust the width of the input/select */
            box-sizing: border-box;
            padding: 8px; /* Adjust padding for input/select */
        }

        .input-container label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px; /* Dynamic color */
            color: #ffffff; /* Set text color to white */
        }

        /* Customizing form elements and buttons */
        .input-container {
            margin-bottom: 15px;
            text-align: center; /* Center align the content within input-container */
        }

        .input-container input[type="number"],
        .input-container select {
            width: 20%; /* Adjust the width of the input/select */
            box-sizing: border-box;
            padding: 8px; /* Adjust padding for input/select */
            margin: 0 auto; /* Center align input/select */
        }

        .btn {
            background-color: #dc2d3a; /* Custom background color */
            color: #fff; /* Custom text color */
            border: none;
            padding: 10% 20%;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: inline-block;
            width: auto; /* Adjust width to fit content */
            margin: 0 auto; /* Center align the button */
        }

        .btn:hover {
            background-color: #e08696; /* Custom background color on hover */
        }
        .btn:focus,
.btn:active {
    background-color: #991d27 !important; /* Revert back to original color on click */
}


    </style>
</head>
@include('component.navbar')
<body>
    
    <div class="container">
        <h2 style="color: #ffffff; margin-bottom: 10px;">{{ $clothes_name }}</h2>
        <div class="content">
            <form action="/addtocart" method="post">
                @csrf
                <div class="form-group input-container">
                    <label for="color" style="color: #dc3545;">Select Color:</label>
                    <div class="colors-container">
                        @foreach ($colors as $color)
                        <div class="item">
                            <input type="radio" name="color" value="{{ $color->Color }}" id="{{ $color->Color }}" class="color-radio">
                            <label for="{{ $color->Color }}" class="color-label" style="color: {{ $color->Color === 'Blue' ? 'LightBlue' : $color->Color }};">
                                <div class="radio-circle"></div>
                                <img src="{{ asset('images/' . $color->picture) }}" alt="{{ $color->Color }}" class="img-fluid color-image" loading="lazy">
                                {{ $color->Color }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="form-group input-container">
                    <label for="size" style="color: #dc3545;">Select Size:</label>
                    <select id="size" name="size" class="form-control size-button">
                        <option value="XS">XS</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                    </select>
                </div>
                <div class="form-group input-container">
                    <label for="quantity" style="color: #dc3545;">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" min="1" max="100" value="1" class="form-control quantity-input">
                </div>
                <div class="form-group">
                    <input type="submit" value="Add to Cart" class="btn btn-primary btn-block">
                </div>
                <input type="hidden" name="email" value="{{ $email }}">
                <input type="hidden" name="Clothesid" value="{{ $Clothesid }}">
                <input type="hidden" name="clothes_name" value="{{ $clothes_name }}">
                <input type="hidden" name="Price" value="{{ $Price }}">
            </form>
        </div>
    </div>
    @include('component.footer')
    <!-- Include Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script>
       window.onload = function() {
            // Mark the first radio button as checked by default
            document.querySelector('.color-radio').checked = true;
        };
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000; /* black background */
            color: #fff; /* white text color */
            background-image: url('{{ asset("images/background.jpg") }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
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
        
        .btn-primary {
    background-color: #da2a37;
    color: #fff;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
    text-transform: uppercase;
    border: 2px solid black;
    margin-bottom: 10px;
    outline: none;
}

.btn-primary:hover {
    background-color: #991d27;
    border-color: black; /* Ensure border color remains black on hover */
}

.btn-primary:focus,
.btn-primary:active {
    background-color: #991d27 !important; /* Revert back to original color on click */
}

    </style>
</head>

<body>
    @include('component.navbar')
    <div class="container mt-5">
        <h1 style="color: #fff;">Welcome, {{ $Name }}!</h1>
        @if($category == 'Men' || $category == 'Women' || $category == 'Winter')
        <h2 style="color: #fff;">{{$category}}'s Catalogue</h2>
@elseif ($category == 'Kids')
<h2 style="color: #fff;">{{$category}}' Catalogue</h2>
@else
<h2 style="color: #fff;">Searching for {{$search}}</h2>
@endif
@if (isset($minPrice))
<p style="color: #fff;">Minimum Price: {{$minPrice}}</p>
@endif
@if (isset($maxPrice))
<p style="color: #fff;">Maximum Price: {{$maxPrice}}</p>
@endif
@if (isset($cltext))
<p style="color: #fff;">Includes Text: {{$cltext}}</p>
@endif

<!-- Button to toggle filter form visibility -->
@if (isset($minPrice) || isset($maxPrice) || isset($cltext))
<button id="toggleFilterForm" class="btn btn-primary">Update Filter</button>
@else
<button id="toggleFilterForm" class="btn btn-primary">Apply Filter</button>
@endif

<!-- Filter form (initially hidden) -->
<form id="filterForm" action="/catalogue" method="POST" style="display: none;">
    @csrf <!-- Include CSRF token -->
    @if(isset($email))
    <input type="hidden" name="email" value="{{ $email }}"> <!-- Include email if set -->
    @endif
    <input type="hidden" name="category" value="{{ $category }}"> <!-- Include category -->
    <input type="hidden" name="search" value="{{ $search }}">

    <div class="row mt-3">
        <div class="col-md-6">
            <label for="minPrice" class="form-label">Minimum Price:</label>
            <input type="number" id="minPrice" name="minPrice" class="form-control" placeholder="Enter minimum price" value="{{ isset($minPrice) ? $minPrice : '' }}">
        </div>
        <div class="col-md-6">
            <label for="maxPrice" class="form-label">Maximum Price:</label>
            <input type="number" id="maxPrice" name="maxPrice" class="form-control" placeholder="Enter maximum price" value="{{ isset($maxPrice) ? $maxPrice : '' }}">
        </div>
        @if(!isset($search))
        <div class="col-md-6">
            <label for="clname" class="form-label">Clothing Text:</label>
            <input type="text" id="cltext" name="cltext" class="form-control" placeholder="Enter Clothing text" value="{{ isset($cltext) ? $cltext : '' }}">
        </div>
        @endif
    </div>
    <div class="row mt-3">
        <div class="col">
            <button type="submit" class="btn btn-primary">Filter!</button>
        </div>
    </div>
</form>


        <div class="row">
            @forelse($clothes as $cloth)
            <div class="col-md-4 mb-4 fade-in">
                <div class="card">
                    
                @if(isset($email))
                    <form action="/productpage" method="POST">
                        @csrf
                        <input type="hidden" name="email" value="{{ $email }}">
                        <input type="hidden" name="category" value="{{ $category }}">
                        <input type="hidden" name="Clothesid" value="{{ $cloth->Clothesid }}">
                        <button type="submit" class="btn-image">
                            <img src="{{ asset('images/' . $cloth->picture) }}" class="card-img-top" alt="{{ $cloth->clothes_name }}">
                        </button>
                @else
                        <form action="/logincustomerror" method="POST">
                            @csrf
                            <input type="hidden" name="error" value="You need to be Logged in to Purchase product">
                            <button type="submit" class="btn-image">
                                <img src="{{ asset('images/' . $cloth->picture) }}" class="card-img-top" alt="{{ $cloth->clothes_name }}" loading="lazy">
                            </button> 
                @endif  
                        
                    </form>
                
                    <div class="card-body">
                        <h5  class="card-title">{{ $cloth->clothes_name }}</h5>
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
                <div class="text-center">
                    <br><br><br><br><br>
                    <h1>No items found.</h1>
                    <br><br><br><br><br>
                </div>
            </div>
            @endforelse
        </div>
    </div>

    @include('component.footer')

    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var elements = document.querySelectorAll('.fade-in');
            var delay = 0;

            elements.forEach(function(element) {
                setTimeout(function() {
                    element.style.opacity = 1;
                }, delay);
                delay += 100; // Adjust the delay as needed for the desired sequence
            });
        });
    
    </script>
    <script>
        document.getElementById('toggleFilterForm').addEventListener('click', function() {
            var filterForm = document.getElementById('filterForm');
            if (filterForm.style.display === 'none' || filterForm.style.display === '') {
                filterForm.style.display = 'block';
            } else {
                filterForm.style.display = 'none';
            }
        });
    </script>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>

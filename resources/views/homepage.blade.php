<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLOTHING STORE</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Custom CSS -->
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    <!-- Animation CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

</head>
<style>
    body {
        font-family: Arial, sans-serif;
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
        border: 1px solid #ccc;
        border-radius: 5px;
        overflow: hidden;
        transition: transform 0.3s;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card-img-top {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .card-body {
        padding: 15px;
    }

    .btn-link {
        text-decoration: none;
        color: #ffffff; /* Rest of the text color */
    }

    .btn-link:hover {
    color: #e08696; /* Text color on hover (black) */
    text-decoration: underline; /* Optionally, add underline on hover */
}
.btn-link:active {
    color: #991d27 !important; /* Text color when clicked */
    text-decoration: underline; /* Optionally, add underline when clicked */
}

    .card-title {
        font-size: 1.2rem;
        margin-bottom: 5px;
        color: #ffffff; /* Rest of the text color */
    }

    .card-text {
        margin-bottom: 5px;
        color: #ffffff; /* Rest of the text color */
    }

    h1, p {
        color: #ffffff; /* Top header and paragraph text color */
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
    .fade-in-image {
    opacity: 0;
    transition: opacity 0.5s ease-in-out;
}

</style>
<body>
    
    @include('component.navbar')
        
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="welcome-text animate__animated animate__fadeInDown">Welcome to Our Clothing Store @if(isset($email)) {{$name}}!@else Anonymous! @endif</h1>
                <p class="subtext animate__animated animate__fadeInUp">Explore our latest collections and find your style.</p>
            </div>
        </div>
    </div>
    
    <!-- Main content -->
    <div class="container">
        <div class="row">
            <!-- Winter Collection -->
            <div class="col-md-6 mb-4 winter-image fade-in-image">
                <form action="/catalogue" method="POST">
                    @csrf <!-- Add CSRF token for security -->
                    @if(@isset($email))
                        <input type="hidden" name="email" value="{{ $email }}"> 
                    @endif
                    <input type="hidden" name="category" value="Winter">
                    <button type="submit" class="btn btn-link">
                        <h2>Winter</h2>
                        <img src="{{ asset('images/winter.webp') }}" class="img-fluid winter-img" alt="Winter Collection" loading="lazy">
                    </button>
                </form>
            </div>

            <!-- Kids Collection -->
            <div class="col-md-6 mb-4 kids-image fade-in-image">
                <form action="/catalogue" method="POST">
                    @csrf <!-- Add CSRF token for security -->
                    @if(@isset($email))
                        <input type="hidden" name="email" value="{{ $email }}"> 
                    @endif
                    <input type="hidden" name="category" value="Kids">
                    <button type="submit" class="btn btn-link">
                        <h2>Kids</h2>
                        <img src="{{ asset('images/kids.webp') }}" class="img-fluid kids-img" alt="Kids Collection" loading="lazy">
                    </button>
                </form>
            </div>

            <!-- Men's Collection -->
            <div class="col-md-6 mb-4 men-image fade-in-image">
                <form action="/catalogue" method="POST">
                    @csrf <!-- Add CSRF token for security -->
                    @if(@isset($email))
                        <input type="hidden" name="email" value="{{ $email }}"> 
                    @endif
                    <input type="hidden" name="category" value="Men">
                    <button type="submit" class="btn btn-link">
                        <h2>Men</h2>
                        <img src="{{ asset('images/men.webp') }}" class="img-fluid men-img" alt="Men's Collection" loading="lazy">
                    </button>
                </form>
            </div>

            <!-- Women's Collection -->
            <div class="col-md-6 mb-4 women-image fade-in-image">
                <form action="/catalogue" method="POST">
                    @csrf <!-- Add CSRF token for security -->
                    @if(@isset($email))
                        <input type="hidden" name="email" value="{{ $email }}"> 
                    @endif
                    <input type="hidden" name="category" value="Women">
                    <button type="submit" class="btn btn-link">
                        <h2>Women</h2>
                        <img src="{{ asset('images/women.jpg') }}" class="img-fluid women-img" alt="Women's Collection" loading="lazy">
                    </button>
                </form>
            </div>
        </div>
    </div>

   
        @include('component.footer')
   

    <script src="{{ asset('js/style.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <script>
        // Your JavaScript code here
    </script>
</body>
</html>

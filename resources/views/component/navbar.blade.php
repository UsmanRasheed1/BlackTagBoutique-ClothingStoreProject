
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <!-- Navbar brand/logo -->
        <a class="navbar-brand" href="#">
            <img src= "{{ asset('images/Logo2.jpeg') }}" alt="Your Logo" height="100" loading="lazy">
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
                    <form id="updateCheckoutForm" action="/displaycheckout" method="POST" class="nav-link navbar-text">
                        @csrf
                        @if(@isset($email))
                            <input type="hidden" name="email" value="{{ $email }}"> 
                        @endif
                        <button type="submit" class="navbar-btn navbar-btn-text navbar-text">Update Checkout Details</button>
                    </form>
                </li>
                <li class="nav-item">
                    <form id="Cartform" action="/cart" method="POST" class="nav-link navbar-text ">
                        @csrf
                        @if(@isset($email))
                            <input type="hidden" name="email" value="{{ $email }}"> 
                        @endif
                        <button type="submit" class=" navbar-btn navbar-btn-text navbar-text">
                            <i class="fas fa-shopping-cart"></i> <!-- Font Awesome icon for cart -->
                        </button>
                    </form>
                </li>
               
                <li class="nav-item">
                    <form id="receiptForm" action="/receipts" method="POST" class="nav-link nav-link navbar-text">
                        @csrf
                        @if(@isset($email))
                            <input type="hidden" name="email" value="{{ $email }}"> 
                        @endif
                        <button type="submit" class=" navbar-btn navbar-btn-text navbar-text">
                            <i class="fas fa-receipt"></i> <!-- Font Awesome icon for receipt -->
                        </button>
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


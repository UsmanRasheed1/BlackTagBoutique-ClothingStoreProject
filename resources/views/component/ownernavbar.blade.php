
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
                    <form id="homeForm" action="/ownerhomepage" method="POST" class="nav-link navbar-text">
                        @csrf
                            <input type="hidden" name="email" value="{{ $email }}"> 
                        <button type="submit" class=" navbar-btn navbar-btn-text">Home</button>
                    </form>
                </li>
                <li class="nav-item">
                    <form id="menForm" action="/ownerdisplayaddclothes" method="POST" class="nav-link navbar-text">
                        @csrf
                            <input type="hidden" name="email" value="{{ $email }}"> 
                        <button type="submit" class=" navbar-btn navbar-btn-text">Add Clothes</button>
                    </form>
                </li>
                <li class="nav-item">
                    <form id="womenForm" action="/ownerdisplayremoveclothes" method="POST" class="nav-link navbar-text">
                        @csrf
                            <input type="hidden" name="email" value="{{ $email }}"> 
                        <button type="submit" class=" navbar-btn navbar-btn-text">Remove Clothes</button>
                    </form>
                </li>
        
                
                
            </ul>
        </div>
    </div>
</nav>

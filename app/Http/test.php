<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (request()->has('email')) {
        $email = request('email');
    } else {
        return redirect()->route('login');
    }

    return view('welcome', compact('email'));
});

Route::get('/homepage', function () {
    return view('homepage');
})->name('homepage');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/proceed_to_cart', function () {
    $email = request('email');
    return view('proceed_to_cart', compact('email'));
})->name('proceed_to_cart');

Route::get('/enter_checkout', function () {
    $email = request('email');
    return view('enter_checkout', compact('email'));
})->name('enter_checkout');

Route::get('/receipts', function () {
    $email = request('email');
    return view('receipts', compact('email'));
})->name('receipts');

Route::get('/search_results', function () {
    $email = request('email');
    return view('search_results', compact('email'));
})->name('search_results');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLOTHING STORE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
<header>
    <div class="navbar">
        <div class="nav-logo border">
            <div class="logo"></div>
        </div>
        <div class="nav-text">
            <h1 id="head">Clothing Store</h1>
        </div>
        <div class="nav-address border">
            <p class="add-first">Deliver to</p>
            <div class="add-icon">
                <i class="fa-solid fa-location-dot"></i>
                <p class="add-sec">Pakistan</p>
            </div>
        </div>
    </div>
    <div class="h_sec_div">
        <a class="h_home" href="{{ route('homepage') }}" target="_blank">home</a>
        <a class="h_register" href="{{ route('register') }}" target="_blank">register</a>
        <a class="h_login" href="{{ route('login') }}" target="_blank">login</a>
        <a href="{{ route('proceed_to_cart', ['email' => $email]) }}" target="_blank">cart</a>
        <a href="{{ route('enter_checkout', ['email' => $email]) }}" target="_blank">Update Checkout Details</a>
        <a href="{{ route('receipts', ['email' => $email]) }}" target="_blank">View Your Receipts</a>
        <div>
            <form action="{{ route('search_results') }}" method="GET">
                <input type="hidden" name="email" value="{{ $email }}">
                <input class="h_search" type="text" name="searchitem" placeholder="Search By Name">
                <button type="submit" class="h_s_button"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
    </div>
</header>
<div>
    <p>
        <a href="{{ route('winter', ['email' => $email]) }}" target="_blank">
            <img src="winter.webp">
        </a>
    </p>
</div>
<div>
    <p>
        <a href="{{ route('kids', ['email' => $email]) }}" target="_blank">
            <img src="kids.webp">
        </a>
    </p>
</div>
<div class="mw">
    <div class="m">
        <a href="{{ route('men', ['email' => $email]) }}" target="_blank">
            <h2 class="mname">men</h2>
            <img src="men.webp"
                 style="object-fit:cover;
                 object-position: right;
                 width:500px;
                 height:500px;
                 border: solid 1px #CCC"/>
        </a>
    </div>
    <div class="m">
        <a href="{{ route('women', ['email' => $email]) }}" target="_blank">
            <h2 class="wname">women</h2>
            <img src="women.jpg"
                 style="object-fit:cover;
                 object-position: right;
                 width:500px;
                 height:500px;
                 border: solid 1px #CCC"/>
        </a>
    </div>
</div>
</body>
<footer>
<div class="info">
    <div class="info-logo">
    </div>
    <div class="queries">
        <p>Send Queries at K214924@nu.edu.pk and K213225@nu.edu.pk</p>
        <br>
        <i class="fa-solid fa-phone"></i><p class="contact">Contact +92-111-567-567</p>
    </div>
    <div class="tag">
        <h2>Design For Fit, Loved To Style!</h2>
    </div>
    <div class="copyright">
        <p class="copy">&copy; 2023 All rights reserved</p>
    </div>
</div>
</footer>
</html>

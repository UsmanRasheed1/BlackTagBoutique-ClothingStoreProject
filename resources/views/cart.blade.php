<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: rgb(255, 254, 254);
            line-height: 1.6;
            text-align: center;
            background-image: url('{{ asset("images/background.jpg") }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .main-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .item-container {
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
            transition: transform 0.3s;
            background-color: #383131;
            width: calc(50% - 20px); /* Adjust based on desired number of items per row */
            max-width: 300px; /* Adjust maximum width of items */
            margin-bottom: 20px;
        }

        .item-container:hover {
            transform: translateY(-5px);
        }

        .item-details {
            padding: 15px;
        }

        .item-image img {
            max-width: 100%;
            height: auto;
            object-fit: cover;
            max-height: 150px; 
            /* Adjust height of images */
        }
    

        .checkbox-container {
            padding: 15px;
        }

        .checkbox-container input[type="checkbox"] {
            margin: auto;
        }

        p {
            margin: 0; /* Remove default margins from paragraphs */
            text-align: center;
        }

        h4 {
            margin: 0;
            color: #000000; 
        }

        h1, h2, h3, h4, h5, h6 {
            margin-top: 0;
            margin-bottom: 3px;
        }

        .checkout-btn {
            margin-bottom: 20px;
        }

        /* Custom button styles */
        .btn-primary,
        .btn-success,
        .btn-danger,
        .checkout-btn {
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-transform: uppercase;
            border: 2px solid black;
        }

        .btn-primary {
            background-color: #e56a73;
            color: #fff;
            
        }

        .btn-primary:hover {
            background-color: #da2a37;
        }

        .btn-success {
            background-color: #28a745;
            color: #fff;
            border: none;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .btn-danger {
            background-color: #dc3545;
            color: #fff;
            
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        /* Custom button styles for view checkout details button */
        .btn-view-checkout-details {
    background-color: #da2a37;
    color: #fff;
     /* Apply black border */
    margin-top: 10px;
}
        .btn-view-checkout-details:hover {
            background-color: #991d27;
        }

        .popup-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 999;
}

.popup-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #383131;
    padding: 20px;
    border-radius: 5px;
}
.alert {
    padding: 15px;
    margin: 20px auto; /* Centering horizontally */
    border: 1px solid transparent;
    border-radius: 4px;
    width: 20%;
}

.alert-danger {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
}

.selected-image {
    border: 3px solid rgb(0, 0, 0);
    opacity: 1; /* Make the selected image fully opaque */
    transform: scale(0.9); /* Return the selected image to its original size */
    }
    p {
            margin: 0; /* Remove default margins from paragraphs */
            text-align: center;
            color: #ffffff; 
        }

        .alert {
        padding: 15px;
        margin: 20px auto; /* Centering horizontally */
        border: 2px solid black;
        border-radius: 4px;
        width: 20%;
    }

    /* Custom style for alert-danger */
    .alert.alert-danger {
        color: #fff;
        background-color: #383131;
    }

 
.quantity-btn, {
    padding: 5px 10px; /* Adjust padding as needed */
    width: 40px; /* Ensure width and height are the same for a circular shape */
    height: 40px; /* Ensure width and height are the same for a circular shape */
    font-size: 14px; /* Adjust font size as needed */
    border-radius: 50%; /* Make the buttons round */
    background-color: #dc3545; /* Red background color */
    color: #fff; /* Text color */
    border: 2px solid black; /* Black border */
    cursor: pointer;
    transition: background-color 0.3s;
}

.quantity-btn:hover,
.hidden-submit-btn:hover {
    background-color: #c82333; /* Darker red on hover */
}

.quantity-btn {
    padding: 5px 10px; /* Adjust padding as needed */
    width: 40px; /* Ensure width and height are the same for a circular shape */
    height: 40px; /* Ensure width and height are the same for a circular shape */
    font-size: 14px; /* Adjust font size as needed */
    border-radius: 50%; /* Make the buttons round */
    background-color: #dc3545; /* Red background color */
    color: #fff; /* Text color */
    border: 2px solid black; /* Black border */
    cursor: pointer;
    transition: background-color 0.3s;
}

.hidden-submit-btn {
    margin-top: 5px;
    padding: 5px 20px; /* Adjust padding as needed */
    font-size: 16px; /* Adjust font size as needed */
    border-radius: 5px; /* Make the button slightly rounded */
    background-color: #dc3545; /* Red background color */
    color: #fff; /* Text color */
    border: 2px solid black; /* Black border */
    cursor: pointer;
    transition: background-color 0.3s;
}


    </style>
</head>

<body>
    @include('component.navbar')
<div class="main-container">
    <h1>{{ $Name }}'s Cart</h1>
</div>

@if ($message)
    <div class="alert alert-danger">{{ $message }}</div>
@endif
<button type="button" class="btn btn-view-checkout-details checkout-btn" onclick="togglePopup()">View Checkout Details</button>

<form method="post" action="/displaycheckout">
    @csrf
    <input type="hidden" name="email" value="{{ $email }}">
    <button type="submit" class="btn btn-primary checkout-btn">Update Checkout Details</button>
    
</form>

<div class="container">
    @if ($cartitems->isEmpty())
    <br><br><br><br><br><br><br><br><br>
    <h1>Your Cart is currently empty</h1>
    <br><br><br><br><br><br>
@else
    @foreach ($cartitems as $cartitem)
        <div class="item-container">
            <h4>{{ $cartitem->Clothes_Name }}</h4>
                <h4>Color: <?php
            $textColor = ($cartitem->Color == 'Blue') ? 'LightBlue' : $cartitem->Color;
            echo "<span style='color: $textColor;'>$cartitem->Color</span>";
            ?></h4>
                <p>Size {{ $cartitem->Clothesize }}</p>
                <p>Quantity {{ $cartitem->Quantity }}</p>
                <p>Price: {{ $cartitem->Price }}</p>
                <p>Total Price: {{ $cartitem->Total_Price }}</p>
                <div class="item-image">
                    <img src="{{ asset('images/' . $cartitem->Picture) }}" alt="Clothes Image" loading="lazy">
                </div>
                <div class="checkbox-container">
                    <input type="checkbox" name="Orderid" value="{{ $cartitem->Orderid }}">
                </div>
                <div class="quantity-section">
                    <button class="quantity-btn minus-btn">-</button>
                    <span class="quantity">{{ $cartitem->Quantity }}</span>
                    <button class="quantity-btn plus-btn">+</button>
                    <form class="quantity-form" action="/update_quantity" method="POST">
                        @csrf
                        <input type="hidden" name="quantity" class="quantity-input" value="{{ $cartitem->Quantity }}">
                        <input type="hidden" name="Orderid" value="{{ $cartitem->Orderid }}">
                        <input type="hidden" name="email" value="{{$email}}">
                        <button type="submit" class="hidden-submit-btn">Update Quantity</button>
                    </form>
                </div>
        </div>
        
    @endforeach
    @endif
</div>

<form id="checkoutForm" method="POST">
    @csrf
    <input type="hidden" id="selectedOrderIds" name="OrderIds"> <!-- Hidden field to store selected order IDs -->
    <input type="hidden" name="email" value="{{ $email }}"> <!-- Hidden field to store email -->
    <button type="button" id="removeFromCartBtn" class="btn btn-danger">Remove from Cart</button>
    <button type="button" id="PurchaseBtn" class="btn btn-success">Purchase</button>
</form>

<!-- Popup Content -->
<div class="popup-overlay" id="popupOverlay">
    <div class="popup-content">
        <h2>Checkout Details</h2>
        <p><b>Phone Number:</b> {{ $checkout_details->phonenum }}</p>
        <p><b>Address:</b> {{ $checkout_details->Address }}</p>
        <p><b>Your Comments:</b> {{ $checkout_details->Comments }}</p>
        <button type="button" onclick="togglePopup()" class="btn btn-secondary">Close</button>
    </div>
</div>

@include('component.footer')
<!-- Include Bootstrap JS (required for button toggle features) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

<script>
    document.getElementById('removeFromCartBtn').addEventListener('click', function() {
    var selectedIds = getSelectedOrderIds();
    if (selectedIds.length === 0) {
        alert('Please select at least one OrderId.'); // Display error message
    } else {
        document.getElementById('checkoutForm').action = '/cart_delete';
        document.getElementById('selectedOrderIds').value = selectedIds;
        document.getElementById('checkoutForm').submit();
    }
});

document.getElementById('PurchaseBtn').addEventListener('click', function() {
    var selectedIds = getSelectedOrderIds();
    if (selectedIds.length === 0) {
        alert('Please select at least one Item!.'); // Display error message
    } else {
        document.getElementById('checkoutForm').action = '/purchasefunction';
        document.getElementById('selectedOrderIds').value = selectedIds;
        document.getElementById('checkoutForm').submit();
    }
});

function getSelectedOrderIds() {
    var selectedIds = [];
    var checkboxes = document.querySelectorAll('input[name="Orderid"]:checked');
    checkboxes.forEach(function(checkbox) {
        selectedIds.push(checkbox.value);
    });
    return selectedIds;
}

function togglePopup() {
    var popupOverlay = document.getElementById('popupOverlay');
    if (window.getComputedStyle(popupOverlay).display === 'none') {
        popupOverlay.style.display = 'block';
    } else {
        popupOverlay.style.display = 'none';
    }
}

function handleCheckboxChange() {
        var checkboxes = document.querySelectorAll('input[name="Orderid"]');
        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                var itemContainer = this.closest('.item-container'); // Get the parent item container
                var itemImage = itemContainer.querySelector('.item-image img'); // Get the image inside the item container

                // Toggle the selected-image class based on checkbox state
                if (this.checked) {
                    itemImage.classList.add('selected-image');
                } else {
                    itemImage.classList.remove('selected-image');
                }
            });
        });
    }
    function handleQuantityButtons() {
    var plusButtons = document.querySelectorAll('.plus-btn');
    var minusButtons = document.querySelectorAll('.minus-btn');
    plusButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var quantityElement = this.parentElement.querySelector('.quantity');
            var currentQuantity = parseInt(quantityElement.textContent);
            if (currentQuantity < 100) {
            var newQuantity = currentQuantity + 1;
            quantityElement.textContent = newQuantity; // Update displayed quantity
            updateQuantityInForm(this, newQuantity); // Update quantity in form
            }
        });
    });
    minusButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var quantityElement = this.parentElement.querySelector('.quantity');
            var currentQuantity = parseInt(quantityElement.textContent);
            if (currentQuantity > 1) {
                var newQuantity = currentQuantity - 1;
                quantityElement.textContent = newQuantity; // Update displayed quantity
                updateQuantityInForm(this, newQuantity); // Update quantity in form
            }
        });
    });
}

// Function to update quantity in the hidden form field
function updateQuantityInForm(button, newQuantity) {
    var quantityInput = button.closest('.item-container').querySelector('.quantity-input');
    var orderIdInput = button.closest('.item-container').querySelector('input[name="Orderid"]');
    quantityInput.value = newQuantity; // Update quantity value in the hidden input field
    var form = button.closest('.quantity-form');
    form.submit(); // Submit the form
}

// Call the function to handle quantity buttons
document.addEventListener('DOMContentLoaded', function() {
    handleQuantityButtons();
});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

</body>
</html>



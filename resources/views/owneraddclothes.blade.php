<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Clothes</title>
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
            background-image: url('{{ asset("images/background.jpg") }}');
            background-size: cover;
            color: rgb(255, 254, 254);
            background-position: center;
            background-repeat: no-repeat;
            margin: 0; /* Added to remove default margin */
            padding: 0; /* Added to remove default padding */
            min-height: 100vh;
        }
        .checkout-form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .checkout-form {
            border: 1px solid rgb(204, 204, 204); /* Add a thin outline */
            padding: 20px; /* Add padding */
            max-width: 600px; /* Set maximum width */
            width: 100%; /* Take up full width */
            background-color: #383131; /* Dark red color */
            border-radius: 10px; /* Add some border radius */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Add shadow */
        }
        .required-symbol {
            color: red; /* Set the color to red */
            margin-left: 5px; /* Add a margin to separate from the label */
        }
        /* Change button color */
        .btn{
            border: 2px solid black;
            border-radius: 5px;
            font-size: 16px;
        }
        .btn:hover {
           
            border: 2px solid black;
        }
        .btn:active {
            border: 2px solid black !important;
        }
        .btn-primary {
            background-color: #da2a37; 
           
            
            width: 50%;
            margin-top: 20px;
            margin-bottom: 20px;
            

        }

        .btn-primary:hover {
            background-color: #991d27; 
            
        }
        .btn-primary:active {
            background-color: #991d27 !important; 
           
        }
         .form-example{
            color: rgb(255, 255, 255);
            font-size: 12px;
        }
        h1 {
            color: #ffffff;
        }
    </style>
</head>
<body>
    @include('component.ownernavbar')
    <div class="checkout-form-container">
       

    
        <div class="checkout-form">
         
            
            <h1 class="text-center mb-4">Add Clothes</h1> <!-- Moved inside checkout-form -->
            <p class="text-center mb-4">Suggested Clothes ID: {!!$nextavailableid!!}</p>
            @if (isset($error))
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endif
        @if (isset($success))
            <div class="alert alert-success">
                {{ $success }}
            </div>
        @endif
            <form action="/owneraddclothes" method="post" onsubmit="return validateForm()">
                @csrf
                <input type="hidden" name="email" value="{{ $email }}">
                <div class="mb-3">
                    <label for="Clothesid" class="form-label">Clothes ID:</label>
                    <input type="number" id="Clothesid" name="Clothesid" class="form-control" required>
                </div>
        
                <div class="mb-3">
                    <label for="clothesName" class="form-label">Clothes Name:</label>
                    <input type="text" id="clothesName" name="clothesName" class="form-control" required>
                </div>
        
                <div class="mb-3">
                    <label for="price" class="form-label">Price:</label>
                    <input type="number" id="price" name="price" class="form-control" required>
                </div>
        
                <div class="mb-3">
                    <label for="category" class="form-label">Category:</label>
                    <select id="category" name="category" class="form-control" required>
                        <option value="Men">Men</option>
                        <option value="Women">Women</option>
                        <option value="Winter">Winter</option>
                        <option value="Kids">Kids</option>
                    </select>
                </div>
        
                <!-- Colors and Image Paths -->
                <div id="colorsDiv" class="mb-3">
                    <label for="color" class="form-label">Color:</label>
                    <input type="text" name="colors[]" class="form-control mb-2" placeholder="Enter Color" required>
                    <label for="colorPath" class="form-label">Image Path:</label>
                    <input type="text" name="colorPaths[]" class="form-control mb-3" placeholder="Enter Image Path" required>
                </div>
        
                <button type="button" class="btn btn-primary" onclick="addColor()">Add Another Color</button>
                <br>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>

    @include('component.footer')

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <script>
        function addColor() {
            var colorsDiv = document.getElementById('colorsDiv');
            var colorInput = document.createElement('input');
            var imagePathInput = document.createElement('input');
    
            colorInput.type = 'text';
            colorInput.name = 'colors[]';
            colorInput.placeholder = 'Enter Color';
            colorInput.className = 'form-control mb-4'; // Increased margin-bottom to create gap
    
            imagePathInput.type = 'text';
            imagePathInput.name = 'colorPaths[]';
            imagePathInput.placeholder = 'Enter Image Path';
            imagePathInput.className = 'form-control mb-4'; // Increased margin-bottom to create gap
    
            colorsDiv.appendChild(colorInput);
            colorsDiv.appendChild(imagePathInput);
        }
    
        function validateForm() {
            var colorInputs = document.querySelectorAll('input[name="colors[]"]');
            var imagePathInputs = document.querySelectorAll('input[name="colorPaths[]"]');
            var colorSet = new Set();
            var imagePathSet = new Set();
    
            // Check for empty colors or paths
            for (var i = 0; i < colorInputs.length; i++) {
                var color = colorInputs[i].value.trim();
                var imagePath = imagePathInputs[i].value.trim();
    
                if (color === '' || imagePath === '') {
                    alert('Color and Image Path cannot be empty.');
                    return false; // Prevent form submission
                }
    
                colorSet.add(color);
                imagePathSet.add(imagePath);
            }
    
            // Check for repeated colors
            if (colorInputs.length !== colorSet.size) {
                alert('Repeated color found.');
                return false; // Prevent form submission
            }
    
            // Check for repeated image paths
            if (imagePathInputs.length !== imagePathSet.size) {
                alert('Repeated Image Path found.');
                return false; // Prevent form submission
            }
    
            return true; // Allow form submission
        }
    </script>
    
    
    
    

</body>
</html>

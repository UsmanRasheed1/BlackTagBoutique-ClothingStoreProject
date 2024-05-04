<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification Code</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff; /* Light grey background */
            padding: 50px;
        }
        .verification-container {
            max-width: 400px;
            margin: auto;
            background-color: rgb(255, 255, 255); /* White background */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Soft shadow */
        }
        .verification-code {
            font-size: 24px;
            text-align: center;
            padding: 20px;
            border: 2px dashed #007bff; /* Blue dashed border */
            border-radius: 5px;
            margin-bottom: 20px;
        }
        
    </style>
</head>
<body>
    <div class="verification-container">
        <h1 class="text-center mb-4">Your Verification Code: </h1>
        <div class="verification-code">
            {!! $body !!}
       

    <!-- Bootstrap JS and dependencies (for button styling) -->
    
</body>
</html>

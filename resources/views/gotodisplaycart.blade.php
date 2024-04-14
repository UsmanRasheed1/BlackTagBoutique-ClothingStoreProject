<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <body onload="document.getElementById('autoSubmitForm').submit();">
        <form id="autoSubmitForm" action="/cart" method="post">
            @csrf
          
            <input type="hidden" name="email" value="{{$email}}">
            <!-- Add more form fields if needed -->

        </form>
</body>
</html>
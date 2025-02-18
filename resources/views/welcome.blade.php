<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Worksheets</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite(['resources/css/app.css'])
</head>
<body>
    <h1>Welcome to Worksheets!</h1>
    <a href="{{ route('login') }}">Login</a> | 
    <a href="{{ route('register') }}">Register</a>
</body>
</html>
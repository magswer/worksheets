<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Worksheets</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-200 text-gray-800 font-sans antialiased flex flex-col justify-center items-center min-h-screen py-10">
    <div class="text-center bg-white p-12 rounded-lg shadow-lg w-full max-w-2xl">
        <h1 class="text-3xl font-bold text-gray-900 mb-6">Welcome to Worksheets!</h1>        
        <div class="space-x-6">
            <a href="{{ route('login') }}" 
               class="px-6 py-2 bg-gray-800 text-white rounded-md hover:bg-gray-700 transition">
                Login
            </a>
            <a href="{{ route('register') }}" 
               class="px-6 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-500 transition">
                Register
            </a>
        </div>
    </div>
</body>
</html>
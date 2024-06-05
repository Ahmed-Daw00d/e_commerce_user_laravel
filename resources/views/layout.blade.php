<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="This is an E-commerce App.">
    <meta name="author" content='Ahmed Dawoud'>
    <meta name="copyright" content='dawoud2024'>
    <meta name="keywords" content="E-commerce, shopApp, متجر">
    <link rel="icon" href=" {{url('images/logo.png')}}">
    <link rel="apple-touch-icon" href="{{url('images/logo.png')}}">
    <link rel="stylesheet" href="{{url('css/style.css')}}">
    <title>@yield('title')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
 
    <nav class="nav">
        <div class="logo">
            <img src="{{url('images/logo.png')}}" alt="Logo">
        </div>
        <ul>
            <li><a href="{{route('home.index')}}">Home</a></li>
            <li><a href="#">Cart</a></li>
            {{-- <li><a href="#">Orders</a></li> --}}
            <li><a href="{{route('home.about')}}">About Us</a></li>
            <li><a href="{{route('home.contact')}}">Contact</a></li>
        </ul>
    </nav>
    <div class="container">
        @yield('content')
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
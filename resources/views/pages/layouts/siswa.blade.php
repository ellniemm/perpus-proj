<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('style')
    @livewireStyles
    <style>
        body {
            padding-top: 60px;
            /* Tinggi navbar */
        }

        .navbar-nav .dropdown-menu {
            right: 0;
            left: auto;
        }

        .custom-card {
            background-color: #634832;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .custom-card-header {
            border-bottom: 1px solid #dee2e6;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .card-img-top {
            width: 100%;
            /* Full width of the card */
            padding-top: 66.67%; 
            /* Aspect ratio 1.5:1 (height = 1.5 / 1 = 66.67%) */
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            /* Optional: to match the card's border radius */
        }

        .card-img-top img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Ensures image covers the container */
        }


        .custom-table {
            border-radius: 10px;
            overflow: hidden;
        }

        .custom-text-color {
            color: #ffd9ade7;
            /* Custom text color (Tomato) */
        }

        /* Custom Navbar Colors */
        .navbar-custom {
            background-color: #634832;
            /* Custom background color */
        }

        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link,
        .navbar-custom .navbar-toggler-icon {
            color: #ffffff;
            /* Custom text color */
        }

        .navbar-custom .navbar-toggler {
            border-color: #ffffff;
            /* Custom border color for toggler */
        }

        .navbar-custom .nav-link.active {
            color: #ff8c00;
            /* Custom active color */
        }

        .custom-button {
            background-color: #634832;
            color: #ffffff;
            display: inline-block;
        }

        .custom-button:hover {
            background-color: #7a5537;
            
            color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }

        .cart-btn,
        .profile-btn {
            position: relative;
        }

        .cart-btn .cart-count,
        .profile-btn .cart-count {
            position: absolute;
            top: 0;
            right: 0;
            background-color: red;
            color: white;
            border-radius: 50%;
            padding: 0 5px;
            font-size: 0.75rem;
        }

        .cart-btn:hover .dropdown-menu,
        .profile-btn:hover .dropdown-menu {
            display: block;
        }

        .cart-btn .dropdown-menu,
        .profile-btn .dropdown-menu {
            right: 0;
            left: auto;
        }
    </style>

</head>

<body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @yield('main') 
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    @yield('script')
    @livewireScripts
</body>

</html>

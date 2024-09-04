<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('style')
    <style>
        
        body {
            padding-top: 56px; /* Tinggi navbar */
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
        .custom-table {
            border-radius: 10px;
            overflow: hidden;
        }
        .custom-text-color {
            color: #ffd9ade7; /* Custom text color (Tomato) */
        }
        /* Custom Navbar Colors */
        .navbar-custom {
            background-color: #634832; /* Custom background color */
        }
        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link,
        .navbar-custom .navbar-toggler-icon {
            color: #ffffff; /* Custom text color */
        }
        .navbar-custom .navbar-toggler {
            border-color: #ffffff; /* Custom border color for toggler */
        }
        .navbar-custom .nav-link:hover {
            color: #ff6347; /* Custom hover color */
        }
        .offcanvas-custom {
            background-color: #38220f; /* Custom offcanvas background color */
        }
        .offcanvas-custom .offcanvas-title,
        .offcanvas-custom .nav-link {
            color: #ffffff; /* Custom offcanvas text color */
        }
        .offcanvas-custom .nav-link:hover {
            color: #ff6347; /* Custom offcanvas hover color */
        }
        .navbar-custom .nav-link.active {
            color: #ff8c00; /* Custom active color */
        }
        .custom-button {
            background-color: #dbc1ac; /* Custom button background color */
            border-color: #634832; /* Custom button border color */
            color: #000000; /* Custom button text color */
        }
        .cart-btn, .profile-btn {
            position: relative;
        }
        .cart-btn .cart-count, .profile-btn .cart-count {
            position: absolute;
            top: 0;
            right: 0;
            background-color: red;
            color: white;
            border-radius: 50%;
            padding: 0 5px;
            font-size: 0.75rem;
        }
        .cart-btn:hover .dropdown-menu, .profile-btn:hover .dropdown-menu {
            display: block;
        }
        .cart-btn .dropdown-menu, .profile-btn .dropdown-menu {
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
</body>

</html>

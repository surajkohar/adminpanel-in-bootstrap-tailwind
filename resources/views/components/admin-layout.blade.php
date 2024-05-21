<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background-color: #e2e6ea; /* Gray-200 color */
            overflow-x: hidden;
        }
        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: -250px; /* Initially hidden */
            height: 100%;
            width: 250px;
            background-color: #333;
            transition: left 0.3s ease;
        }

        /* Show sidebar */
        .sidebar.open {
            left: 0;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li a {
            display: block;
            padding: 10px 15px;
            text-decoration: none;
            color: #fff;
            font-weight: 400;
            font-size: 18px;
        }

        .sidebar ul li a.active {
            background-color: #fff;
            color: #000;
            font-weight: 500;
        }
        .sidebar ul li a.active:hover {
            background-color: #e7dfdf;
            color: #000;
        }
        .sidebar ul li a:hover{
            background-color:  #555;
        }

        /* Main content */
        .main-content {
            transition: margin-left 0.3s;
            padding: 20px;
            margin-left: 0; /* Reset margin-left for larger screens */
        }

        /* Hamburger icon */
        .navbar-toggler {
            color: #000; /* Black color for text */
        }

        /* Close button for the sidebar */
        .close-sidebar {
            display: block;
        }
        
        /* User profile button */
        .user-profile {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            color: #000; /* Black color for text */
            cursor: pointer;
        }

        .user-profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        /* Navbar brand */
        .navbar-brand {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-grow: 1; /* Allow the brand to take available space */
            color: #000; /* Black color for text */
            font-weight: 600; /* Semi-bold font weight */
        }

        /* Navbar */
        .navbar {
            background-color: #fff; /* White color */
        }

        /* Media query for larger screens */
        @media (min-width: 992px) {
            .sidebar {
                left: 0; /* Always visible on large screens */
            }

            .main-content {
                margin-left: 250px; /* Add margin to main content when sidebar is visible */
            }

            .navbar-toggler {
                display: none; /* Hide the hamburger icon on larger screens */
            }

            .close-sidebar {
                display: none; /* Hide the close button on larger screens */
            }
        }

        /* Custom CSS to adjust the dropdown positioning */
        .dropdown-menu-end {
            right: 0 !important;
            left: auto !important;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-light">
    <div class="container-fluid">
        <!-- Hamburger button for smaller screens -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle sidebar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navbar brand -->
        <div class="navbar-brand">Admin Dashboard</div>
        <!-- User profile button and user name -->
        <div class="dropdown">
            <div class="user-profile" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <span>{{ auth()->user()->name }}</span>
                <img src="https://example.com/user-profile-image.jpg" alt="">
            </div>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <li class="dropdown-header">Manage Account</li>
                <li><a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a></li>
                @if (\Laravel\Jetstream\Jetstream::hasApiFeatures())
                <li><a class="dropdown-item" href="{{ route('api-tokens.index') }}">API Tokens</a></li>
                @endif
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">Log Out</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 5%;">
                <img src="https://cloud-travel.co.uk/live_flight/frontend/assets/images/logo.png" alt="" style="width: 75%; height: auto; margin-top: 2px;">
                <button class="btn btn-danger close-sidebar">&times;</button>
            </div>
            
            <ul class="mt-4">
                <li><a href="{{ route('dashboard') }}" class="{{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}"><i class="fa-solid fa-gauge mr-2"></i>Dashboard</a></li>
                <li><a href="{{ route('home') }}" class="{{ Route::currentRouteName() == 'analytics' ? 'active' : '' }}">Analytics</a></li>
                <li><a href="{{ route('flight') }}" class="{{ Route::currentRouteName() == 'flight' ? 'active' : '' }}"><i class="fa-solid fa-plane-departure mr-2"></i>Flight</a></li>
                <li><a href="{{ route('profile.show') }}" class="{{ Route::currentRouteName() == 'profile.show' ? 'active' : '' }}"><i class="fa-solid fa-gear mr-2"></i>Settings</a></li>
            </ul>
        </div>

        <!-- Main content -->
        <div class="main-content">
            <main>
                {{ $slot }}
            </main>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        // Toggle sidebar on hamburger click
        $('.navbar-toggler').click(function() {
            $('#sidebar').toggleClass('open');
        });

        // Close sidebar on close button click
        $('.close-sidebar').click(function() {
            $('#sidebar').removeClass('open');
        });
    });
</script>
</body>
</html>

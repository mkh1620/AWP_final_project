<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Research Grant Management System') }}</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Tailwind CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        header {
            background: #2575fc;
            color: #fff;
            padding: 15px;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 1.8rem;
        }

        header nav {
            margin-top: 10px;
        }

        header nav a {
            color: #fff;
            text-decoration: none;
            margin-right: 40px; /* Increased spacing */
            font-size: 1rem;
            transition: color 0.3s;
        }

        header nav a:last-child {
            margin-right: 0; /* Remove margin for the last button */
        }

        header nav a:hover {
            color: #6a11cb;
        }

        main {
            padding: 20px;
            margin: 0 auto;
            max-width: 1200px;
        }

        footer {
            text-align: center;
            padding: 10px;
            background: #2575fc;
            color: #fff;
            margin-top: 20px;
        }
    </style>
</head>
<body style="background: linear-gradient(135deg, #2575fc, #6a11cb); margin: 0; padding: 0; color: white;">
    <!-- Header -->
    <header style="background: #2575fc; color: white; padding: 15px; text-align: center;">
        <h1 style="margin: 0; font-size: 1.5rem;">Research Grant Management System</h1>
        <nav style="margin-top: 10px;">
            <a href="{{ route('dashboard') }}" style="color: white; text-decoration: none;">Dashboard</a>

            <!-- Show Academicians link only for Admin -->
            @if(auth()->user()->isAdmin())
                <a href="{{ route('academicians.index') }}" style="color: white; text-decoration: none;">Academicians</a>
            @endif

            <a href="{{ route('research-grants.index') }}" style="color: white; text-decoration: none;">Research Grants</a>
            <a href="{{ route('milestones.index') }}" style="color: white; text-decoration: none;">Milestones</a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color: white; text-decoration: none;">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; {{ date('Y') }} Research Grant Management System. All rights reserved.</p>
    </footer>
</body>
</html>

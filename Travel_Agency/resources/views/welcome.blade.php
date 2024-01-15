<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ mix('css/app.css') }}"> <!-- Use Laravel Mix for CSS -->
</head>
<body class="antialiased">
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                @auth
                    <a href="{{ route('admin.dashboard.index') }}" class="menu-link">Home</a>
                    <a onclick="document.getElementById('logout').submit();" href="#" class="menu-link">Logout</a>
                    <form id="logout" action="{{ route('logout') }}" method="post">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}" class="menu-link">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="menu-link">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="flex justify-center">
                <svg class="logo" viewBox="0 0 62 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <!-- SVG path data -->
                </svg>
            </div>

            <div class="mt-16">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                    <a href="https://laravel.com/docs" class="feature-link">
                        <!-- Feature content -->
                    </a>

                </div>
            </div>
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Manager</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
            <style>
        body {
            font-family: 'Inter', sans-serif;
        }
            </style>
    </head>
<body class="antialiased bg-gray-50">
    <div class="min-h-screen">
        <!-- Navigation -->
        {{-- <nav class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <span class="text-xl font-semibold text-gray-800">Contact Manager</span>
                    </div>
                    <div class="flex items-center space-x-4">
            @if (Route::has('login'))
                    @auth
                                <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-gray-900">Dashboard</a>
                    @else
                                <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900">Log in</a>
                        @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Register</a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
                </nav> --}}

        <!-- Hero Section -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-gray-900 sm:text-5xl md:text-6xl">
                    Manage Your Contacts<br>
                    <span class="text-blue-600">Simply and Efficiently</span>
                </h1>
                <p class="mt-6 text-xl text-gray-500 max-w-2xl mx-auto">
                    Keep track of your professional network with our easy-to-use contact management system. Organize, tag, and maintain your relationships all in one place.
                </p>
                <div class="mt-10">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ route('dashboard') }}" class="bg-blue-600 text-white px-8 py-3 rounded-md text-lg font-medium hover:bg-blue-700">
                                Go to Dashboard
                            </a>
                        @else
                            <a href="{{ route('register') }}" class="bg-blue-600 text-white px-8 py-3 rounded-md text-lg font-medium hover:bg-blue-700">
                                Get Started
                            </a>
                        @endauth
                    @endif
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <div class="bg-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="text-center">
                        <div class="text-blue-600 text-2xl mb-4">📱</div>
                        <h3 class="text-lg font-medium text-gray-900">Easy Contact Management</h3>
                        <p class="mt-2 text-gray-500">Add, edit, and organize your contacts with a simple interface.</p>
                    </div>
                    <div class="text-center">
                        <div class="text-blue-600 text-2xl mb-4">🏷️</div>
                        <h3 class="text-lg font-medium text-gray-900">Smart Tagging</h3>
                        <p class="mt-2 text-gray-500">Categorize contacts with custom tags for better organization.</p>
                    </div>
                    <div class="text-center">
                        <div class="text-blue-600 text-2xl mb-4">📊</div>
                        <h3 class="text-lg font-medium text-gray-900">Activity Tracking</h3>
                        <p class="mt-2 text-gray-500">Keep track of all your interactions with contacts.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>

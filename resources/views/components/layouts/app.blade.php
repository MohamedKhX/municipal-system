<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'My App' }}</title>

    <!-- Include Livewire Styles -->
    @livewireStyles

    <!-- Tailwind CSS (Optional, for styling) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-100 text-gray-800">

<!-- Header -->
<header class="bg-blue-600 text-white shadow">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <h1 class="text-xl font-bold">
            <a href="{{ url('/') }}">My App</a>
        </h1>
        <nav>
            <a href="{{ url('/') }}" class="px-3 py-2 hover:bg-blue-500 rounded">Home</a>
            <a href="{{ url('/about') }}" class="px-3 py-2 hover:bg-blue-500 rounded">About</a>
        </nav>
    </div>
</header>

<!-- Main Content -->
<main class="container mx-auto px-4 py-6">
    {{ $slot }}
</main>

<!-- Footer -->
<footer class="bg-gray-800 text-white py-4 mt-6">
    <div class="container mx-auto text-center">
        &copy; {{ date('Y') }} My App. All rights reserved.
    </div>
</footer>

<!-- Include Livewire Scripts -->
@livewireScripts

<!-- Custom Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

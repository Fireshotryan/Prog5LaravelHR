<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>GameReviews</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type='image/x-icon'>
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>

    </head>
 
        <div class="relative sm:flex sm:justify-center sm:items-center py-10 bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
         </div>
         
            <div class="container mx-auto p-6">
    <h1 class="text-3xl font-semibold text-gray-900 dark:text-white">Our Products</h1>
    <!-- Product Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-4">
        @foreach ($games->where('game_status', true) as $game)
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-4">
        <img src="{{ asset('storage/' . $game->game_img) }}" alt="{{ $game->name }}" class="w-full h-40 object-cover rounded-lg">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white mt-2">{{ $game->name }}</h2>
            <p class="text-gray-500 dark:text-gray-400 mt-2">{{ $game->id }}</p>
            <p class="text-gray-700 dark:text-gray-500 mt-2">{{ $game->description }}</p>
             @if ($game->tags->count() > 0)
            <p class="text-gray-500 dark:text-gray-400 mt-2">
                Tags: {{ $game->tags->pluck('name')->implode(', ') }}
            </p>
        @else
            <p class="text-gray-500 dark:text-gray-400 mt-2">No tags available</p>
        @endif
            @if ($game->creator)
                    <p class="text-gray-500 dark:text-gray-400 mt-2">Created by: {{ $game->creator->name }}</p>
                @else
                    <p class="text-gray-500 dark:text-gray-400 mt-2">Creator information not available</p>
                @endif
   <a href="{{ route('login') }}" class="mt-4 inline-block font-semibold text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-200">View Details</a> 
        </div>
        @endforeach
    </div>
</div>
    </div>

    
</html>

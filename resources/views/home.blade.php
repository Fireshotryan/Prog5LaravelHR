@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

        
                </div>
            </div>
        </div>
    </div>
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
            @if ($game->creator)
                    <p class="text-gray-500 dark:text-gray-400 mt-2">Created by: {{ $game->creator->name }}</p>
                @else
                    <p class="text-gray-500 dark:text-gray-400 mt-2">Creator information not available</p>
                @endif
   <a href="{{ route('games.show', ['game' => $game -> id]) }}" class="mt-4 inline-block font-semibold text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-200">View Details</a> 
        </div>
        @endforeach
    </div>
</div>

@endsection

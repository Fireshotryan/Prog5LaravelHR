@extends('layouts.app')

@section('content')
<div class="container">
<div class="container mx-1">
        <div class="ml-2 flex flex-col">
            <h2 class="my-4 text-4xl font-semibold text-gray-600 dark:text-gray-400">
                Games Admin
            </h2>
        </div>

        @if(session('status'))
            <div class="bg-green-200 text-green-900 rounded-lg shadow-md p-6 pr-10 mb-8" style="...">
                {{ session('status') }}
            </div>
        @endif
        @if(auth()->user()->role === 1 || auth()->user()->role === 2)
        <a href="{{ route('games.create') }}">
    <button
    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        Create
    </button>
</a>
@endif


<div class="overflow-x-auto">
<table class="min-w-full table-auto">
    <thead class="bg-gray divide-y divide-gray-200">
        <tr>
            <th class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                Games
            </th>
            <th class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
               Naam game
            </th>
            <th class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
               Info Game
            </th>
            <th class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
               Img name Game
            </th>
            <th class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
             
            </th>
            <th class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
      
            </th>
            <th class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
        
            </th>
            @if(auth()->user()->role === 2)
            <th class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
               Status
            </th>
            @endif

        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach($games as $game)
        <tr>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
               {{ $game->id }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            {{ $game->name }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            {{ $game->description }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            {{ $game->game_img }}
            </td>

            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <a class="no-underline hover:underline" href="{{ route('games.show', ['game' => $game -> id]) }}"> Details </a>
                    </td>

                    @if(auth()->user()->role === 1 || auth()->user()->role === 2)
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            <a class="no-underline hover:underline" href="{{ route('games.edit', $game->id) }}"> Edit </a>
            </td>

            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            <a class="no-underline hover:underline" href="{{ route('games.delete', $game->id) }}"> Delete </a>
            </td>
            @endif

            @if(auth()->user()->role === 2)

            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
    <a
        class="btn {{ $game->game_status ? 'btn-primary' : 'btn-outline-secondary' }}"
        href="{{ $game->game_status ? route('games.reject', $game->id) : route('games.accept', $game->id) }}"
    >
        {{ $game->game_status ? 'Reject' : 'Accept' }}
    </a>
</td>
@endif

        </tr>
        @endforeach
    </tbody>
</table>
    </div>
    </div>
@endsection
</div>

<script>
    document.querySelectorAll('.btn').forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const gameId = this.dataset.gameId;
            const currentStatus = this.dataset.currentStatus;

            this.classList.toggle('btn-primary');
            this.classList.toggle('btn-outline-secondary');
            this.innerText = currentStatus === 'true' ? 'Accept' : 'Reject';
            this.dataset.currentStatus = currentStatus === 'true' ? 'false' : 'true';
        });
    });
</script>



@extends('layouts.app')

@section('content')


        @if(session('status'))
            <div class="bg-green-200 text-green-900 rounded-lg shadow-md p-6 pr-10 mb-8" style="...">
                {{ session('status') }}
            </div>
        @endif

        <div class="container">
<div class="container mx-1">

        @if($errors->any())
    <div class="bg-red-200 text-red-200 rounded-lg shadow-md p-6 pr-10 mb-8" style="...">
        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach($errors->all() as $error)
                <li>{{ $error }} </li>
            @endforeach
        </ul>
    </div>
@endif

        <form id="form" class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4"
    action="{{ route('games.update',$games->id) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf

        <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
            Name
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tigh focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror" name="name" id="name" value="{{$games->name}}" type="text">
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
            Description
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tigh focus:outline-none focus:shadow-outline @error('description') border-red-500 @enderror" name="description" id="description" value="{{$games->description}}" type="text">
    </div>

    <div class="form-group">
    <label for="tags">Select Tags:</label>
    <select name="tags[]" id="tags" class="form-control" multiple>
        @foreach($tags as $tag)
            <option value="{{ $tag->id }}"
                @if(in_array($tag->id, $games->tags->pluck('id')->toArray())) selected @endif>
                {{ $tag->name }}
            </option>
        @endforeach
    </select>
</div>


    <div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="game_img">
        Game Image
    </label>

    @if ($games->game_img)
        <img src="{{ asset('storage/' . $games->game_img) }}" alt="Current Image" class="mb-2 max-w-full">
    @endif

    <input type="file" class="block w-full py-2 px-3 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline @error('game_img') border-red-500 @enderror" name="game_img">
</div>

    <div class="flex items-center justify-between">
        <button id="submit" class="bg-green-500 hover:bg-green-700 text:white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Edit
        </button>
    </div>


    </div>
@endsection
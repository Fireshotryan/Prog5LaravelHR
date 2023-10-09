@extends('layouts.app')

@section('content')

        @if(session('status'))
            <div class="bg-green-200 text-green-900 rounded-lg shadow-md p-6 pr-10 mb-8" style="...">
                {{ session('status') }}
            </div>
        @endif

        <div class="container">
<div class="container mx-1">

<form id="form" class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4"
    action="{{ route('writers.destroy',$writers->id) }}" method="POST">
    @method('DELETE')
    @csrf

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
            Name
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tigh focus:outline-none focus:shadow-outline" name="name" id="name" value="{{$writers->name}}" type="text" disabled>
    </div>

    <div class="flex items-center justify-between">
        <button id="submit" class="bg-green-500 hover:bg-green-700 text:white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Delete
        </button>
    </div>

</form>

@endsection
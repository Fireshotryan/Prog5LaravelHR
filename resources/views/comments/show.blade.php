@extends('layouts.app')

@section('content')



@if(session('status'))
            <div class="bg-green-200 text-green-900 rounded-lg shadow-md p-6 pr-10 mb-8" style="...">
                {{ session('status') }}
            </div>
        @endif
        <div class="container">
<div class="container mx-1">

        <table class="table-fixed">
    <thead class="bg-gray divide-y divide-gray-200">
        <tr>
            <th class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
               Naam Game
            </th>
            <th class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
               Info Game
            </th>
           
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
      
        <tr>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            {{ $games->name }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            {{ $games->description }}
            </td>
        </tr>
 
    </tbody>
</table>
    </div>

    <h2>Comments</h2>
<ul>
    @if(count($comments) > 0)
        @foreach ($comments as $comment)
            <li>
                {{ $comment->content }}
                <p>Comment by: {{ $comment->user->name }}</p>
            </li>
        @endforeach
    @else
        <li>No comments available.</li>
    @endif
</ul>

<h2>Add a Comment</h2>
<form action="{{ route('comments.store', ['games' => $games->id]) }}" method="post">
    @csrf
    <textarea name="content" rows="4" cols="50" required></textarea>
    <button type="submit">Submit Comment</button>
</form>
@endsection
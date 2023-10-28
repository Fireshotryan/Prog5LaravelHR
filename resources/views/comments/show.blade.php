@extends('layouts.app')

@section('content')



@if(session('status'))
            <div class="bg-green-200 text-green-900 rounded-lg shadow-md p-6 pr-10 mb-8" style="...">
                {{ session('status') }}
            </div>
        @endif
        <div class="flex items-center justify-center h-screen">
    <div class="container mx-1">
    <div class="table-fixed">
        <table class="w-full bg-white divide-y divide-gray-200 rounded-lg shadow-md p-4">
            <thead class="bg-gray">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-300">Name Game</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-300">Info Game</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="px-6 py-4 text-left text-sm text-gray-700">{{ $games->name }}</td>
                    <td class="px-6 py-4 text-left text-sm text-gray-700">{{ $games->description }}</td>
                    <td class="px-6 py-4 w-1/2">
                        <img src="{{ asset('storage/' . $games->game_img) }}" class="w-full h-40 object-cover rounded-lg">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <h2 class="mt-6 text-xl font-semibold text-gray-900">Comments</h2>
    <ul class="comment-list">
    @if(count($comments) > 0)
        @foreach ($comments as $comment)
            <li class="comment-item" style="border: 1px solid #ccc; margin: 10px 0; padding: 10px; background-color: #f9f9f9; display: flex; align-items: flex-start;">
                <div class="comment-avatar" style="margin-right: 10px;">
                    <img src="{{ asset('storage/' . $comment->user->avatar) }}" alt="{{ $comment->user->name }}" style="border: 1px solid #3498db; border-radius: 50%; width: 40px; height: 40px;">
                </div>
                <div class="comment-content">
                    <p class="comment-author" style="color: #3498db;">Comment made by: {{ $comment->user->name }}</p>
                    <p class="comment-date" style="color: #3498db;">on {{ $comment->created_at }}</p>
                    {{ $comment->content }}
                </div>
            </li>
        @endforeach
    @else
        <li class="mt-4 text-gray-500">No comments available.</li>
    @endif
</ul>




    <h2 class="mt-6 text-xl font-semibold text-gray-900">Add a Comment</h2>
    <form action="{{ route('comments.store', ['games' => $games->id]) }}" method="post">
        @csrf
        <textarea name="content" rows="4" cols="50" required class="w-full p-2 border rounded"></textarea>
        <button type="submit" class="mt-2 p-2 bg-blue-500 text-white rounded hover:bg-blue-600">Submit Comment</button>
    </form>
</div>
</div>

@endsection
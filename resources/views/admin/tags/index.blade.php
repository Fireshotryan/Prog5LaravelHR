@extends('layouts.app')
<div class="container mx-1 pr-4">
@section('content')
        @if(session('status'))
            <div class="bg-green-200 text-green-900 rounded-lg shadow-md p-6 pr-10 mb-8" style="...">
                {{ session('status') }}
            </div>
        @endif
</div>

        <div class="container">
<div class="container mx-1">
@if(auth()->user()->role === 1 || auth()->user()->role === 2)
<a href="{{ route('tags.create') }}">
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
                Tag id
            </th>
            <th class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            Tag
            </th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach($tags as $tag)
        <tr>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
               {{ $tag->id }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            {{ $tag->name }}
            </td>

            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <a class="no-underline hover:underline" href="{{ route('tags.show', ['tag' => $tag -> id]) }}"> Details </a>
                    </td>
                    @if(auth()->user()->role === 2)
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <a class="no-underline hover:underline" href="{{ route('tags.edit', ['tag' => $tag -> id]) }}"> Edit </a>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <a class="no-underline hover:underline" href="{{ route('tags.delete', $tag->id) }}"> Delete </a>
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
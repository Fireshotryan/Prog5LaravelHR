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

<a href="{{ route('writers.create') }}">
    <button
    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        Create
    </button> 
</a>
<div class="overflow-x-auto">
<table class="min-w-full table-auto">
    <thead class="bg-gray divide-y divide-gray-200">
        <tr>
            <th class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                Writer id
            </th>
            <th class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            Writer
            </th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach($writers as $writer)
        <tr>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
               {{ $writer->id }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            {{ $writer->name }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <a class="no-underline hover:underline" href="{{ route('writers.show', ['writer' => $writer -> id]) }}"> Details </a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <a class="no-underline hover:underline" href="{{ route('writers.edit', ['writer' => $writer -> id]) }}"> Edit </a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <a class="no-underline hover:underline" href="{{ route('writers.delete', $writer->id) }}"> Delete </a>
                    </td>
            </tr>
        @endforeach
    </tbody>
</table>
    </div>
    </div>
@endsection
</div>
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
    class="ml-6 py-2 block border-b-2 border-transparent
        focus:outline-none font-medium capitalize text-center
        focus:text-green-500 focus:border-green-500
        dark-focus:text-green-200 dark-focus:border-green-200
        transition duration-500 ease-in-out">
        Create
    </button> 
</a>

        <table class="table-fixed">
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
                        <a href="{{ route('writers.show', ['writer' => $writer -> id]) }}"> Details </a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <a href="{{ route('writers.edit', ['writer' => $writer -> id]) }}"> Edit </a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <a href="{{ route('writers.delete', $writer->id) }}"> Delete </a>
                    </td>
            </tr>
        @endforeach
    </tbody>
</table>
    </div>

@endsection
</div>
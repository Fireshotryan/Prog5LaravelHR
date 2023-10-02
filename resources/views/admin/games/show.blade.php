@extends('layouts.app')

@section('content')

<div class="container">
<div class="container mx-1">

@if(session('status'))
            <div class="bg-green-200 text-green-900 rounded-lg shadow-md p-6 pr-10 mb-8" style="...">
                {{ session('status') }}
            </div>
        @endif

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
@endsection
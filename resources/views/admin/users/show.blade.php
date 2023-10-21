@extends('layouts.app')

@section('content')
<div class="container">
<div class="container mx-1">
        <div class="ml-2 flex flex-col">
            <h2 class="my-4 text-4xl font-semibold text-gray-600 dark:text-gray-400">
                Users Admin
            </h2>
        </div>

        @if(session('status'))
            <div class="bg-green-200 text-green-900 rounded-lg shadow-md p-6 pr-10 mb-8" style="...">
                {{ session('status') }}
            </div>
        @endif

        <table class="table-fixed">
    <thead class="bg-gray divide-y divide-gray-200">
        <tr>
            <th class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
               Naam 
            </th>
            <th class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
               Account mail
            </th>
            <th class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
               Account Wachtwoord
            </th>
            <th class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
               Account Role
            </th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
      
        <tr>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            {{ $users->name }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            {{ $users->email }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            {{ $users->password }}
            </td>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
      @if(!empty($users->getRoleNames()))
        @foreach($users->getRoleNames() as $v)
           <label>{{ $v }}</label>
        @endforeach
      @endif
    </td>
        </tr>
 
    </tbody>
</table>
    </div>
@endsection
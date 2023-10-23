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


<a href="{{ route('users.create') }}">
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
                Games
            </th>
            <th class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
               Naam user
            </th>
            <th class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
               Mail
            </th>
            <th class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
               Role id
            </th>
            <th class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
               Wachtwoord (hashed)
            </th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach($users as $user)
        <tr>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
               {{ $user->id }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            {{ $user->name }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            {{ $user->email }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            {{ $user->role }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            {{ $user->password }}
            </td>

            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <a href="{{ route('users.show', ['user' => $user -> id]) }}"> Details </a>
                    </td>

            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            <a href="{{ route('users.edit', $user->id) }}"> Edit </a>
            </td>

            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            <a href="{{ route('users.delete', $user->id) }}"> Delete </a>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
    </div>
    </div>
@endsection
</div>
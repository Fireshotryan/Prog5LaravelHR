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

        <form id="form" class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4"
    action="{{ route('users.update',$users->id) }}" method="POST">
    @method('PUT')
    @csrf

        <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
            Name
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tigh focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror" name="name" id="name" value="{{$users->name}}" type="text">
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
            Mail
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tigh focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror" name="email" id="email" value="{{$users->email}}" type="mail">
    </div>
            <div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="role">
        Role
    </label>
    <select name="role" id="role" class="form-control">
                                <option value="0" {{ $userRole == 0 ? 'selected' : '' }}>Reader</option>
                                <option value="1" {{ $userRole == 1 ? 'selected' : '' }}>Writer</option>
                                <option value="2" {{ $userRole == 2 ? 'selected' : '' }}>Admin</option>
                            </select>
</div>



            </div>

            <div class="flex item-center justifiy-between">
                <button id="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Submit
                </button>
            </div>
        </form>
    </div>
@endsection
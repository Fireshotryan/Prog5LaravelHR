@extends('layouts.app')

@section('content')


        @if(session('status'))
            <div class="bg-green-200 text-green-900 rounded-lg shadow-md p-6 pr-10 mb-8" style="...">
                {{ session('status') }}
            </div>
        @endif

        <div class="container">
<div class="container mx-1">

        @if($errors->any())
    <div class="bg-red-200 text-red-200 rounded-lg shadow-md p-6 pr-10 mb-8" style="...">
        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach($errors->all() as $error)
                <li>{{ $error }} </li>
            @endforeach
        </ul>
    </div>
@endif

<h2>User Profile</h2>
<!-- Form for updating profile info -->
<form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="avatar">
            Current Avatar
        </label>
        <img src="{{ asset('storage/' . $user->avatar) }}" alt="Current Avatar" class="mb-2">
        <input type="file" name="avatar" accept="image/*">
    </div>


    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
            Name
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tigh focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror" name="name" id="name" value="{{$user->name}}" type="text">
    </div>

  
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
            Mail
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tigh focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror" name="email" id="email" value="{{$user->email}}" type="mail">
    </div>


    <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                Wachtwoord
                </label>

                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tigh focus:outline-none focus:shadow-outline @error('password') border-red-500 @enderror" name="password" id="password" value="{{$user->password }}" type="text">
            </div>

            <div class="mb-4">
                            <label for="password-confirm" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Confirm Password') }}</label>


                                <input id="password-confirm" type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tigh focus:outline-none focus:shadow-outline @error('password') border-red-500 @enderror" value="{{$user->password }}" name="password_confirmation" required autocomplete="new-password">
                            </div>


    
    <div class="flex item-center justifiy-between">
                <button id="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Update Profiel
                </button>
            </div>
</form>

@endsection
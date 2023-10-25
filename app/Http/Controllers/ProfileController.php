<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;

class ProfileController extends Controller
{
    public function show()
{
    $user = auth()->user(); // Get the currently logged-in user
    return view('profile.show', compact('user'));
}

public function update(ProfileUpdateRequest $request)
{
    $user = auth()->user(); // Get the currently logged-in user

    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password,
   
    ]);

    return redirect()->route('profile.show')->with('success', 'Profile updated successfully');
}


}

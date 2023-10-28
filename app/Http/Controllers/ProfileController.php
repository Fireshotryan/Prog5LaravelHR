<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

    $data = [
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password,
    ];

    // Handle avatar file upload
    if ($request->hasFile('avatar')) {
        // Remove the old avatar (if it exists)
        if ($user->avatar) {
            // Delete the old avatar file
            Storage::delete('public/' . $user->avatar);
        }

        // Upload and store the new avatar
        $avatar = $request->file('avatar');
        $avatarName = time() . '.' . $avatar->extension();
        $avatar->storeAs('public/avatars', $avatarName);
        $data['avatar'] = 'avatars/' . $avatarName; // Update the avatar field
    }

    $user->update($data);

    $user->save(); // Save the updated user data, including the avatar path



    return redirect()->route('profile.show')->with('success', 'Profile updated successfully');
}


}

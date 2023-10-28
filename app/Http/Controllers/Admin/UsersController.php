<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UsersStoreRequest;
use App\Http\Requests\UsersUpdateRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Arr;
use DB;

class UsersController extends Controller
{


        /**Set permission on methods... */

        public function __construct() {
            $this->middleware('auth');
        }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        if(auth()->user()->role == 2) {
            return view('admin.users.index', compact('users'));
        }
        else {
            return redirect()->route('dashboard');
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = [0 => 'Reader', 1 => 'Writer', 2 => 'Admin'];
        
        if(auth()->user()->role == 2) {
            return view('admin.users.create',compact('role'));
        }
        else {
            return redirect()->route('dashboard');
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersStoreRequest $request)
    {

        $users = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => (int)$request->role, // Cast the role to an integer
        ]);
        $users -> save();

        event(new Registered($users));

        return redirect()->route('users.index')->with('status', 'user created');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::find($id);

        if(auth()->user()->role == 2) {
            return view('admin.users.show', compact('users'));
        }
        else {
            return redirect()->route('dashboard');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $users, $id)
    {
        $users = User::find($id);
        $role = [0 => 'Role 0', 1 => 'Role 1', 2 => 'Role 2'];
        $userRole = $users->role;

        if(auth()->user()->role == 2) {
            return view('admin.users.edit', compact('users', 'userRole'));
        }
        else {
            return redirect()->route('dashboard');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UsersUpdateRequest $request, $id)
      {

        $users = User::find($id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->role = $request->role;
        $users->save();
        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  \App\Models\Evenements  $users
     * @return \Illuminate\Http\Response
     */
    public function delete(User $users)
    {

        if(auth()->user()->role == 2) {
            return view('admin.users.delete', compact('users'));
        }
        else {
            return redirect()->route('dashboard');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evenements  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $users, $id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect()->route('users.index')->with('message', 'User deleted');
    }
}
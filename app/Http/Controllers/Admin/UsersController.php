<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UsersStoreRequest;
use App\Http\Requests\UsersUpdateRequest;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Arr;
use DB;

class UsersController extends Controller
{

    
        /**Set permission on methods... */

        public function __construct() {
            $this->middleware('auth');
            $this->middleware('permission:index users', ['only' => ['index']]);
            $this->middleware('permission:show users', ['only' => ['show']]);
            $this->middleware('permission:create users', ['only' => ['create', 'store']]);
            $this->middleware('permission:edit users', ['only' => ['edit', 'update']]);
            $this->middleware('permission:delete users', ['only' => ['delete', 'destroy']]);
        }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('admin.users.create',compact('roles'));
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
            'roles' => $request->roles,
        ]);
        $users -> save();
        
        event(new Registered($users));
        $users->assignRole($request->input('roles'));

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
     
        return view('admin.users.show', compact('users'));
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
        $roles = Role::pluck('name','name')->all();
        $userRole = $users->roles->pluck('name','name')->all();

        return view('admin.users.edit', compact('users','roles','userRole'));
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
        $users->save();
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $users->assignRole($request->input('roles'));
    
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
        return view('admin.users.delete', compact('users'));
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
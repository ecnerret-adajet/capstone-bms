<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;
use App\Models\Role;

class UsersApiController extends Controller
{
    public function roles()
    {
        $roles = Role::orderBy('id','asc')->get();
        return $roles;
    }

    public function index()
    {
        $users = User::orderBy('id','desc')->get();
        return UserResource::collection($users);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'role_id' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->syncRoles($request->role_id);

        return ['redirect' => route('users')];
    }
}

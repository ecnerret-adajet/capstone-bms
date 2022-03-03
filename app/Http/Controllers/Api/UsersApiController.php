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
}

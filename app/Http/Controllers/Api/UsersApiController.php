<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;

class UsersApiController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id','desc')->get();
        return UserResource::collection($users);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_role = Auth::user()->roles->first()->id;

        switch ($user_role) {
            case 2: // donor
                return redirect('events');
                break;
            default:
                return view('home');
                break;
        }

        return view('home');

    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Event;
use App\Models\User;

class EventApiController extends Controller
{

    /**
     * Current event
     */
    public function currentEvent()
    {
        $event = Event::orderBy('id','desc')->first();
        return $event;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return $events;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Request::validate([
            'title' => ['required'],
            'description' => ['required'],
        ]);

        $user = User::create([
            'name' =>  Request::get('representative_name'),
            'email' => Request::get('email'),
            'password' => bcrypt(Request::get('password')),
        ]);

        $user->syncRoles(7); // pernsonnel role

        $event = new Event;
        $event->title = Request::get('title');
        $event->description = Request::get('description');
        $event->location = Request::get('location');
        $event->start_date = Request::get('start_date');
        $event->end_date = Request::get('end_date');
        $event->save();

        return ['redirect' => route('events')];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        Request::validate([
            'title' => ['required'],
            'description' => ['required'],
        ]);

        $event->title = Request::get('title');
        $event->description = Request::get('description');
        $event->start_date = Request::get('start_date');
        $event->end_date = Request::get('end_date');
        $event->save();

        return ['redirect' => route('events')];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

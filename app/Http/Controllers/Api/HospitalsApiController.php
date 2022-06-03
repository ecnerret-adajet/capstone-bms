<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Hospital;
use App\Models\User;
use App\Http\Resources\HospitalResource;

class HospitalsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hospitals = Hospital::orderBy('id','desc')->get();
        return HospitalResource::collection($hospitals);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        Request::validate([
            'hospital_name' => ['required'],
            'address' => ['required'],
            'name' => 'required',
            'email' => 'required',
        ]);

        $user = User::create([
            'name' =>  Request::get('name'),
            'email' =>  Request::get('email'),
            'password' => bcrypt(Request::get('password')),
        ]);

        $user->syncRoles(Request::get('role_id'));

        $hospital = new Hospital;
        // $hospital->create(Request::all());
        $hospital->user_id = $user->id;
        $hospital->hospital_name = Request::get('hospital_name');
        $hospital->address = Request::get('address');
        $hospital->save();


        // $hospital->bloodType()->associate(Request::get('hospital_id'));
        // $hospital->rhGroup()->associate(Request::get('rh_group_id'));
        // $hospital->gender()->associate(Request::get('gender_id'));



        return ['redirect' => route('hospitals')];
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
    public function update(Request $request, $id)
    {
        //
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

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Resources\DonorResource;
use App\Models\Donor;
use App\Models\User;

class DonorsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donors = Donor::orderBy('id','desc')->get();
        return DonorResource::collection($donors);
    }

    /**
     * Show own create donors profile
     */
    public function donorRequests()
    {
        $donors = Donor::orderBy('id','desc')
                ->where('user_id', Auth::user()->id)
                ->get();
                
        return DonorResource::collection($donors);
    }

    /**
     * Show profile donor
     */
    public function donorProfile()
    {
        $donor = Donor::where('user_id', Auth::user()->id)->first();
        return new DonorResource($donor);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'first_name' => ['required'],
            'last_name' => ['required'],
            'phone_number' => ['required'],
            'blood_type_id' => ['required'],
            'rh_group_id' => ['required'],
            'gender_id' => ['required'],
        ]);

        $user = User::create([
            'name' =>  Request::get('first_name').' '.Request::get('last_name'),
            'email' => Request::get('email'),
            'password' => bcrypt(Request::get('password')),
        ]);

        $user->syncRoles(Request::get('role_id'));

        $donor = new Donor;       
        // $donor->create(Request::all());
        $donor->first_name = Request::get('first_name');
        $donor->last_name = Request::get('last_name');
        $donor->phone_number = Request::get('phone_number');
        $donor->birthdate = Request::get('birthdate');
        $donor->height = Request::get('height');
        $donor->weight = Request::get('weight');
        $donor->address = Request::get('address');
        $donor->user_id = $user->id;
        $donor->gender()->associate(Request::get('gender_id'));
        $donor->bloodType()->associate(Request::get('blood_type_id'));
        $donor->rhGroup()->associate(Request::get('rh_group_id'));
        $donor->save();

        return ['redirect' => route('donors')];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Donor $donor)
    {
        return new DonorResource($donor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Donor $donor)
    {
        Request::validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'phone_number' => ['required'],
            'blood_type_id' => ['required'],
            'rh_group_id' => ['required'],
            'gender_id' => ['required'],
        ]);

        $donor->update(Request::all());
        $donor->gender()->associate(Request::get('gender_id'));
        $donor->bloodType()->associate(Request::get('blood_type_id'));
        $donor->rhGroup()->associate(Request::get('rh_group_id'));
        $donor->save();

        return ['redirect' => route('donors')];
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

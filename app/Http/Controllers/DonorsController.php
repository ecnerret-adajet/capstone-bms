<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Donor;
use App\Models\Gender;
use App\Models\BloodType;
use App\Models\RhGroup;

class DonorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('donors.index');
    }

    /**
     * Show donors profile page
     */
    public function donor()
    {
        return view('donors.profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('donors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'gender_id' => 'required',
            'birthdate' => 'required',
        ]);

        $donor = Auth::user()->donors()->create($request->all());
        $donor->gender()->associate($request->gender_id);
        $donor->bloodType()->associate($request->blood_type_id);
        $donor->rhGroup()->associate($request->rh_group_id);
        $donor->save();

        return $donor;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Donor $donor)
    {
        return $donor;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Donor $donor)
    {
        return view('donors.edit', compact('donor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donor $donor)
    {
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'gender_id' => 'required',
            'birthdate' => 'required',
        ]);

        $donor->update(Request::all());
        $donor->gender()->associate($request->gender_id);
        $donor->bloodType()->associate($request->blood_type_id);
        $donor->rhGroup()->associate($request->rh_group_id);
        $donor->save();

        return $donor;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donor $donor)
    {
        $donor->delete();
        return $donor;
    }
}

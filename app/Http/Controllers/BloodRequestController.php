<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\RequestBlood;
use App\BloodPackNeed;
use App\UrgencyType;
use App\RhGroup;
use App\BloodType;
use App\Http\Resources\BloodRequestResource;

class BloodRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bloodRequests = BloodRequest::orderBy('id','desc')->all();
        return BloodRequestResource::collect($bloodRequests);
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
    public function store(Request $request)
    {
        $this->validate($request,[
            'pateint_name' => 'required',
            'blood_type_id' => 'required'
        ]);

        $bloodRequest = Auth::user()->bloodRequests($request->all());
        
        $bloodRequest->bloodType()->associate($request->blood_type_id);
        $bloodRequest->rhGroup()->associate($request->rh_group_id);
        $bloodRequest->rhGroup()->associate($request->rh_group_id);
        $bloodRequest->purpose()->associate($request->purpose_id);
        $bloodRequest->hospital()->associate($request->hospital_id);
        $bloodRequest->urgency()->associate($request->urgeny_id);
        $bloodRequest->save();

        return $bloodRequest;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BloodRequest $bloodRequest)
    {
        return new BloodRequestResource($bloodRequest);
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

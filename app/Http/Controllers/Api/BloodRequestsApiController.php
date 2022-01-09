<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\BloodType;
use App\Models\RequestBlood;
use App\Models\BloodPackNeed;
use App\Models\Urgency;
use App\Models\RhGroup;
use App\Models\BloodRequest;
use App\Http\Resources\BloodRequestResource;

class BloodRequestsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bloodRequests = BloodRequest::orderBy('id','desc')->get();
        return BloodRequestResource::collection($bloodRequests);
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
            'patient_name' => ['required'],
            'hostpita_id' => ['required'],
            'blood_type_id' => ['required'],
        ]);

        $bloodRequest = Auth::user()->bloodRequests()->create([
            'patient_name' => Request::get('patient_name'),
            'diagnosies' => Request::get('diagnosies'),
            'bag_quantity' => Request::get('bag_quantity'),
        ]);

        $bloodRequest->bloodType()->associate(Request::get('blood_type_id'));

        $bloodRequest->rhGroup()->associate(Request::get('rh_group_id'));
        
        $bloodRequest->purpose()->associate(Request::get('purpose_id'));
        
        $bloodRequest->hospital()->associate(Request::get('hospital_id'));
        
        $bloodRequest->urgencyType()->associate(Request::get('urgency_id'));
        
        $bloodRequest->save();

        // return $bloodRequest;

        return ['redirect' => route('blood-requests')];
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BloodRequest $bloodRequest)
    {
        Request::validate([
            'patient_name' => ['required'],
            'hostpita_id' => ['required'],
            'blood_type_id' => ['required'],
        ]);

        $bloodRequest->update(Request::all());

        $bloodRequest->bloodType()->associate(Request::get('blood_type_id'));

        $bloodRequest->rhGroup()->associate(Request::get('rh_group_id'));
        
        $bloodRequest->purpose()->associate(Request::get('purpose_id'));
        
        $bloodRequest->hospital()->associate(Request::get('hospital_id'));
        
        $bloodRequest->urgencyType()->associate(Request::get('urgency_id'));
        
        $bloodRequest->save();

        // return $bloodRequest;

        return ['redirect' => route('blood-requests')];
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

    /**
     * Request approval
     */
}

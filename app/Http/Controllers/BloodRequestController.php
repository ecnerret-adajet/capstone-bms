<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\BloodType;
use App\Models\BloodRequest;
use App\Models\BloodPackNeed;
use App\Models\Urgency;
use App\Models\RhGroup;
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
        return view('bloodRequests.index');
    }

    public function profile()
    {
        return view('bloodRequests.profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bloodRequests.create');
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
            'hospital_id' => ['required'],
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

        // return Redirect::route('blood-requests')->with('success','Successfully created.');
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

    // Approve or disapprove blood request
    public function showRequestApproval(BloodRequest $bloodRequest)
    {
        return view('bloodRequests.approval',compact('bloodRequest'));
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

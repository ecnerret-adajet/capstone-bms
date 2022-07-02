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
use App\Models\BloodBank;
use App\Models\BloodBankSummary;
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
        if (Auth::user()->hasRole('administrator')) { // you can pass an id or slug

            $bloodRequests = BloodRequest::orderBy('id','desc')->get();
            return BloodRequestResource::collection($bloodRequests);

        }
        $hospital = Auth::user()->hospital;
        $ownbloodRequests = BloodRequest::where('hospital_id',$hospital->id)->orderBy('id','desc')->get();
        return BloodRequestResource::collection($ownbloodRequests);
    }

    public function totalApprovedBags()
    {
        $bloodRequests = collect(BloodRequest::select('bag_quantity')
                    ->where('status_id',1)
                    ->pluck('bag_quantity'))
                    ->sum();

        return $bloodRequests;
    }

    public function totalApprovedRequest()
    {
        if (Auth::user()->hasRole('administrator')) { // you can pass an id or slug
            $bloodRequests = BloodRequest::where('status_id',1)->count();
            return $bloodRequests;
        }

        $hospital = Auth::user()->hospital;
        $ownbloodRequests = BloodRequest::where('hospital_id',$hospital->id)
                        ->where('status_id',1)
                        ->count();
                        
        return $ownbloodRequests;
    }


    public function totalPending()
    {
        if (Auth::user()->hasRole('administrator')) { // you can pass an id or slug
            $bloodRequests = BloodRequest::where('status_id', 0)->count();
            return $bloodRequests;
        }

        $hospital = Auth::user()->hospital;
        $ownbloodRequests = BloodRequest::where('hospital_id',$hospital->id)
                        ->where('status_id', 0)
                        ->count();

        return $ownbloodRequests;
    }

    /**
     * View on request profile
     */
    public function requestorProfile()
    {
        $bloodRequest = BloodRequest::where('user_id',Auth::user()->id)->first();

        return $bloodRequest;
                    
        return BloodRequestResource::collection($bloodRequest);
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
            // 'attachment' => Request::file('attachment') ? Request::file('attachment')->store('documents') : null,
        ]);

        if(Request::hasFile('attachment')) {
            $fileName = Auth::user()->id() . '_' . time() . '.'. Request::file('attachment')->extension();  
            $type = Request::file('attachment')->getClientMimeType();
            $size = Request::file('attachment')->getSize();

            $bloodRequest->attachment = Request::file('attachment')->move(public_path('documents'), $fileName);
        }

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

    public function showBloodRequest(BloodRequest $bloodRequest)
    {
        return $bloodRequest;
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
            'blood_type_id' => ['required'],
            'hospital_id' => ['required'],
        ]);

        $bloodRequest->update([
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

    // process approval or disapprove 
    public function approval(BloodRequest $bloodRequest)
    {
        Request::validate([
            'status_id' => ['required'],
        ]);

        if(Request::get('status_id') == 1) {
            $checkAvailability = BloodBankSummary::where('blood_type_id', $bloodRequest->blood_type_id)->sum('quantity');

            if($checkAvailability > $bloodRequest->bag_quantity) {

                $bloodRequest->status_id = Request::get('status_id');
                $bloodRequest->save();

                $getBloodInventory = BloodBankSummary::where('blood_type_id', $bloodRequest->blood_type_id)->first();

                $bloodApproved = BloodBankSummary::where('blood_type_id', $bloodRequest->blood_type_id)->first();
                $bloodApproved->quantity = (int) $getBloodInventory->quantity - (int) $bloodRequest->bag_quantity;
                $bloodApproved->save();

                          
            } else {
                Request::validate([
                    'insufficient_quantity' => ['required'],
                ],[
                    'insufficient_quantity.required' => "Not enought blood inventory"
                ]);
            }
        }

        $bloodRequest->status_id = Request::get('status_id');
        $bloodRequest->save();

        return ['redirect' => route('blood-requests')];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BloodRequest $bloodRequest)
    {
        $bloodRequest->delete();
        return ['redirect' => route('blood-requests')];
    }

    /**
     * Request approval
     */
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\BloodType;
use App\Models\BloodBank;

class BloodBankApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bloodBanks = BloodBank::orderBy('id','desc')
                    ->with('bloodType')    
                    ->get();
                    
        return $bloodBanks;
    }

    public function bloodTypeCount()
    {
        return array(
            'a' => BloodBank::where('blood_type_id',1)->sum('quantity'),
            'b' => BloodBank::where('blood_type_id',2)->sum('quantity'),
            'ab' => BloodBank::where('blood_type_id',3)->sum('quantity'),
            'o' => BloodBank::where('blood_type_id',4)->sum('quantity'),
        );
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
            'quantity' => ['required'],
            'blood_type_id' => ['required'],
        ]);

        $bloodBank = Auth::user()->bloodBanks()->create(Request::all());

        $bloodBank->bloodType()->associate(Request::get('blood_type_id'));

        $bloodBank->save();

        return ['redirect' => route('blood-banks')];
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

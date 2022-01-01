<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_name',
        'diagnosies',
        'bag_quantity'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bloodType()
    {
        return $this->belongsTo(BloodType::class);
    }

    public function urgencyType()
    {
        return $this->belongsTo(Urgency::class);
    }

    public function rhGroup()
    {
        return $this->belongsTo(RhGroup::class);
    }

    public function purpose()
    {
        return $this->belongsTo(Purpose::class);
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

}

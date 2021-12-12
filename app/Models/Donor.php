<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'birthdate',
        'height',
        'weight',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function bloodType()
    {
        return $this->belongsTo(BloodType::class);
    }

    public function rfGroup()
    {
        return $this->belongsTo(RhGroup::class);
    }
}

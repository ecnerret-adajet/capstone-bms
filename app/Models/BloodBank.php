<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodBank extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'blood_type_id',
        'remarks',
        'user_id',
        'expiration_date',
    ];

    public function bloodType()
    {
        return $this->belongsTo(BloodType::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }
}

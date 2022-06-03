<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodBankSummary extends Model
{
    use HasFactory;

    protected $fillable = [
        'blood_type_id',
        'quantity'
    ];

    public function bloodType()
    {
        return $this->belongsTo(BloodType::class);
    }
}

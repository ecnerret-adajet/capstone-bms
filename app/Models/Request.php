<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $fillable = [
        'purpose'
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
        return $this->belongsTo(UrgencyType::class);
    }

    public function rhGroup()
    {
        return $this->belongsTo(RhGroup::class);
    }

    public function bloodPackNeed()
    {
        return $this->belongsTo(BloodPackNeed::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function bloodRequests()
    {
        return $this->hasMany(BloodRequeset::class);
    }

    public function bloodBanks()
    {
        return $this->hasMany(BlooBank::class);
    }
}

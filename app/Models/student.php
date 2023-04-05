<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class student extends Model
{
    use HasFactory;
    protected $guarded = ["id", "created_at", "updated_at"];

    public function parentStudent(): HasOne
    {
        return $this->hasOne(parrent::class, 'parent_id', 'id');
    }

    public function rideStudent(): HasOne
    {
        return $this->hasOne(ride::class, 'ride_id', 'id');
    }

    public function addressStudent(): HasOne
    {
        return $this->hasOne(address::class, 'address_id', 'id');
    }
}

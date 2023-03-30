<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ride extends Model
{
    use HasFactory;
    protected $guarded = ["id", "created_at", "updated_at"];
    public function driverRide(): HasOne
    {
        return $this->hasOne(driver::class, 'driver_id', 'id');
    }

    public function studentRide(): HasMany
    {
        return $this->hasMany(student::class);
    }
}

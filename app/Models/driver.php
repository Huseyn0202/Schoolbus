<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class driver extends Model
{
    use HasFactory;
    protected $guarded = ["id", "created_at", "updated_at"];


    public function carDriver(): HasOne
    {
        return $this->hasOne(car::class, 'car_id', 'id');
    }
}

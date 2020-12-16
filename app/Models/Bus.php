<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    
    use HasFactory;
    //relation one to many between seat & Bus
    public function seats()
    {
        return $this->hasMany(Seat::class);
    }
    //relation one to many between bus & Route
    public function routes()
    {
        return $this->belongsTo(Route::class,'id');
    }

    //relation one to many between bus & Ticket
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}

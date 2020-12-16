<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    //relation Many to many between Route & stop
    public function stops()
    {
        return $this->belongsToMany(Stop::class,'route_stop');
    }

    //relation one to many between Route & bus
    public function bus()
    {
        return $this->hasMany(Bus::class,'route_id');
    }

    //relation one to many between route and Ticket
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}

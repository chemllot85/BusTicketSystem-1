<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stop extends Model
{
    use HasFactory;

    //relation Many to many between bus & Stop
    /*public function buses()
    {
        return $this->belongsToMany(Bus::class,'bus_stop');
    }*/

    //relation Many to many between route & Stop
    public function routes()
    {
        return $this->belongsToMany(Route::class,'route_stop');
    }
}

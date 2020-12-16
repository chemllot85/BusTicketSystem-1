<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    //relation one to many between bus & Ticket
    public function buses()
    {
        return $this->belongsTo(Bus::class,'id');
    }
    //relation one to many between route & Ticket
    public function routes()
    {
        return $this->belongsTo(Route::class,'id');
    }
    //relation one to one between Ticket and seat
    public function seat()
    {
        return $this->hasOne(Seat::class,'id');
    }
    //relation one to one between Ticket and user
    public function user()
    {
        return $this->hasOne(User::class);
    }
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;
    protected $status = ['avaliable', 'not_avaliable'];
    //relation one to many between seat & Bus
    public function Bus()
    {
        return $this->belongsTo(Bus::class);
    }
    //relation one to one between Ticket and seat
    public function Ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}

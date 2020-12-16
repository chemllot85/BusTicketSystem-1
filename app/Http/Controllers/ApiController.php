<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seat;
use App\Models\User;
use App\Models\Route;
use App\Models\Stop;
use App\Models\Bus;
use App\Models\Ticket;

use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    //
        
    function seatList(Request $request){
        $start=$request->source;
        $end=$request->dest;

        //find all buses has this source & dest name
        $buses=Bus::where('source',$From)
                    ->where('dest',$Destination)
                    ->get();

        return response()->json($buses);
    }
    function book(Request $request){

        $user_id=$request->id;
        $seat_id=$request->id;

        $bus_id=Seat::find($seat_id)->Bus()->get();
        //find the route_id from the bus_id
        $route_id=Bus::find($bus_id[0]->id)->routes()->get();

            $ticket=DB::table('tickets')->insert([
                'user_id'=>$user_id,
                'seat_id'=>$seat_id,
                'bus_id'=>$bus_id[0]->id,
                'route_id'=>$route_id[0]->id
            ]);
            //update the seat to be unvailable
            $affected = DB::table('seats')
                        ->where('id', $seat_id)
                        ->update(['status' => 'not_available']);

            return "Success";
        
    }

}

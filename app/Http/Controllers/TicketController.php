<?php

namespace App\Http\Controllers;
use App\Models\Route;
use App\Models\Stop;
use App\Models\Bus;
use App\Models\Seat;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class TicketController extends Controller
{
    //
    function getAllRoute(){
        //select all Routes
        $stops=Stop::get();
        return view('welcome',[
            //data to view
            'stops'=>$stops
        ]);
    }

    function getAllBusTrips(Request $request){
        //extract data from the form
        $From=$request->input('route_from');
        $Destination=$request->input('route_destination');
        
        //find all routes start From the source{from} Route
        /*$routes= Stop::find($From)->routes()->get();
        
        //find all buses has the same route
        $buses=array();
        foreach($routes as $route){
            $trip=Bus::where('route_id',$route->id)->get();
            array_push($buses,$trip);
        }*/
        
        //find all buses has this source & dest name
        $buses=Bus::where('source',$From)
                    ->where('dest',$Destination)
                    ->get();
        
        return view('avaliable_bus',[
            'buses'=>$buses
        ]);
    }

    function getAllSeats($bus_id){
        //select All Seats
        $seats=Seat::where('bus_id',$bus_id)->get();
        return view('avaliable_seat',[
            'seats'=>$seats
        ]);
    }

    function bookSeat($seat_id){
        //find the bus_id from the seat
        $bus_id=Seat::find($seat_id)->Bus()->get();
        //find the route_id from the bus_id
        $route_id=Bus::find($bus_id[0]->id)->routes()->get();

        if(Auth::check()){
            $ticket=new Ticket();
            $ticket=DB::table('tickets')->insert([
                'user_id'=>Auth::user()->id,
                'seat_id'=>$seat_id,
                'bus_id'=>$bus_id[0]->id,
                'route_id'=>$route_id[0]->id
            ]);
            //update the seat to be unvailable
            $affected = DB::table('seats')
                        ->where('id', $seat_id)
                        ->update(['status' => 'not_available']);

            return view('booking',[
                'ticket'=>$ticket
            ]);
        }
        else{
            return view('users/login');
        }
    }
}

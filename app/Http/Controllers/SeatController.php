<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Seat;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    //
    //show all Buses
    function list(){
        //select all Seats in DB
        $seats=Seat::get();
        return view('admin/Seat/SeatList',[
            //data to view
            'seats'=>$seats
        ]); 
    }

    //Add new Seat
    function add(){
        //get all Buses
        $buses=Bus::get();
        return view('admin/Seat/add',[
            'buses'=>$buses
        ]);
    }

    function save(Request $request){
        //input validation
        $validatedData = \Validator::make($request->all(), [
            'seat_code' => 'required|min:2|max:255',
            'bus_id' => 'required',
            'status' => 'required',
        ]);
        //check if there is an error
        if($validatedData->fails()){
            return redirect('/admin_dashboard/Seats/add')->withErrors($validatedData)->withInput();
        }
        //extract data from the form
        $s_code=$request->seat_code;
        $b_id=$request->bus_id;
        $s_status=$request->status;
        //insert data
        $Seat=new Seat();

        $Seat->seat_code=$s_code;
        $Seat->status=$s_status;
        $Seat->bus_id=$b_id;

        $Seat->save();
        return redirect('/admin_dashboard/Seats');
    }

    /**********Edit********/

    function edit($id){
        //get all Buses
        $buses=Bus::get();
        //find the Seat by id
        $Seat=Seat::find($id);
        return view('admin/Seat/edit',[
            'buses'=>$buses,
            'Seat'=>$Seat
        ]);
    }

    function update($id,Request $request){
        //input validation
        $validatedData = \Validator::make($request->all(), [
            'seat_code' => 'required|min:2|max:255',
            'bus_id' => 'required',
            'status' => 'required',
        ]);
        //check if there is an error
        if($validatedData->fails()){
            return redirect('/admin_dashboard/Seats/edit/'.$id)->withErrors($validatedData)->withInput();
        }
        //extract data from the form
        $s_code=$request->seat_code;
        $b_id=$request->bus_id;
        $s_status=$request->status;
        //insert data
        $Seat=Seat::find($id);

        $Seat->seat_code=$s_code;
        $Seat->status=$s_status;
        $Seat->bus_id=$b_id;

        $Seat->save();
        return redirect('/admin_dashboard/Seats');
    }

    /***********Delete*********/
    
    function delete($id){
        $Seat=Seat::find($id);
        $Seat->delete();
        return redirect('/admin_dashboard/Seats');
    }
}

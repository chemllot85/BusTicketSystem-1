<?php

namespace App\Http\Controllers;
use App\Models\Bus;
use App\Models\Route;
use App\Models\Stop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BusController extends Controller
{
    //show all Buses
    function list(){
        //select all Buses in DB
        $buses=Bus::get();
        /*foreach($buses as $bus){
            if(!empty($bus->routes->route_name))
            echo $bus->routes->route_name;
        }
        dd($buses);*/
        return view('admin/Bus/BusList',[
            //data to view
            'buses'=>$buses
        ]); 
    }

    //Add new Bus
    function add(){
        //get all routes
        $routes=Route::get();
        $stops=Stop::get();
        return view('admin/Bus/add',[
            'routes'=>$routes,
            'stops'=>$stops
        ]);
    }

    function save(Request $request){
        //input validation
        $validatedData = \Validator::make($request->all(), [
            'bus_code' => 'required|min:2|max:255',
            'route_id' => 'required',
            'source'=>'required',
            'dest'=>'required',
            'total_seats' => 'required|numeric',
        ]);
        
        //check if there is an error
        if($validatedData->fails()){
            return redirect('/admin_dashboard/Buses/add')->withErrors($validatedData)->withInput();
        }
        //extract data from the form
        $_code=$request->bus_code;
        $r_id=$request->route_id;

        $s_source=$request->source;
        $s_dest=$request->dest;

        $_seats=$request->total_seats;
        
        //insert data
        $Bus=new Bus();
        $Bus->bus_code=$_code;
        $Bus->route_id=$r_id;

        $Bus->source=$s_source;
        $Bus->dest=$s_dest;

        $Bus->total_seats=$_seats;

        $Bus->save();
        
        return redirect('/admin_dashboard/Buses');
    }

    /**********Edit********/

    function edit($id){
        //get all route $stops
        $routes=Route::get();
        //find the bus by id
        $bus=Bus::find($id);
        $stops=Stop::get();

        return view('admin/Bus/edit',[
            'routes'=>$routes,
            'bus'=>$bus,
            'stops'=>$stops
        ]);
    }

    function update($id,Request $request){
        
        //input validation
        $validatedData = \Validator::make($request->all(), [
            'bus_code' => 'required|min:2|max:255',
            //'route_id' => 'required',
            'source'=>'required',
            'dest'=>'required',
            'total_seats' => 'required|numeric',
        ]);
        
        //check if there is an error
        if($validatedData->fails()){
            return redirect('/admin_dashboard/Buses/edit/'.$id)->withErrors($validatedData)->withInput();
        }
        //extract data from the form
        $_code=$request->bus_code;
        //$r_id=$request->route_id;
        $_seats=$request->total_seats;
        $s_source=$request->source;
        $s_dest=$request->dest;
        //find raw by id 
        $Bus=Bus::find($id);

        $Bus->bus_code=$_code;
        //$Bus->route_id=$r_id;
        $Bus->total_seats=$_seats;

        $Bus->source=$s_source;
        $Bus->dest=$s_dest;
        
        $Bus->save();
        return redirect('/admin_dashboard/Buses');
    }

    /***********Delete*********/
    
    function delete($id){
        $bus=Bus::find($id);
        $bus->delete();
        return redirect('/admin_dashboard/Buses');
    }
}

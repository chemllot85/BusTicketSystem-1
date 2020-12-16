<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stop;
class StopController extends Controller
{
    //
    //show all stops
    function list(){
        //select all Routes
        $stops=Stop::get();
        return view('admin/Stop/StopList',[
            //data to view
            'stops'=>$stops
        ]); 
    }

    //Add new City/Route
    function add(){
        return view('admin/Stop/add');
    }

    function save(Request $request){
        //input validation
        $validatedData = \Validator::make($request->all(), [
            'stop_name' => 'required|min:3|max:255',
            'stop_code' => 'required|min:2|max:255',
        ]);
        //check if there is an error
        if($validatedData->fails()){
            return redirect('/admin_dashboard/Stops/add')->withErrors($validatedData)->withInput();
        }
        //extract data from the form
        $_name=$request->stop_name;
        $_code=$request->stop_code;
        //insert data
        $Route=new Stop();
        $Route->stop_name=$_name;
        $Route->stop_code=$_code;
        $Route->save();
        return redirect('/admin_dashboard/Stops');
    }

    //Edit Rout
    function edit($id){
        $stop=Stop::find($id);

        return view('admin/Stop/edit',[
            'stop'=>$stop
        ]);
    }
    function update($id,Request $request){
        $validatedData = \Validator::make($request->all(), [
            'stop_name' => 'required|min:3|max:255',
            'stop_code' => 'required|min:2|max:255',
        ]);
        //check if there is an error
        if($validatedData->fails()){
            return redirect('/admin_dashboard/Stops/edit/'.$id)->withErrors($validatedData)->withInput();
        }
        //extract data from the form
        $_name=$request->stop_name;
        $_code=$request->stop_code;
        //Select row with ID and update it
        $stop=Stop::find($id);
        $stop->stop_name=$_name;
        $stop->stop_code=$_code;
        $stop->save();
        return redirect('/admin_dashboard/Stops');
    }

    function delete($id){
        $stop=Stop::find($id);
        $stop->delete();
        return redirect('/admin_dashboard/Stops');
    }
}

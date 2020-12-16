<?php

namespace App\Http\Controllers;
use App\Models\Route;
use App\Models\Stop;

use Illuminate\Http\Request;

class RouteController extends Controller
{
    //show all Routes
    function list(){
        //select all Routes
        $routes=Route::get();
        
        return view('admin/Route/RouteList',[
            //data to view
            'routes'=>$routes,
            
        ]); 
    }

    //Add new City/Route
    function add(){
        $stops=Stop::get();
        return view('admin/Route/add',[
            'stops'=>$stops
        ]);
    }

    function save(Request $request){
        //input validation
        $validatedData = \Validator::make($request->all(), [
            'route_name' => 'required|min:3|max:255',
            'route_code' => 'required|min:2|max:255',
            'stops'=>'required'
        ]);
        //check if there is an error
        if($validatedData->fails()){
            return redirect('/admin_dashboard/Routes/add')->withErrors($validatedData)->withInput();
        }
        //extract data from the form
        $_name=$request->route_name;
        $_code=$request->route_code;
        //insert data
        $Route=new Route();
        $Route->route_name=$_name;
        $Route->route_code=$_code;
        $Route->save();
        //add stops to the route
        $Route->stops()->attach($request->stops);

        return redirect('/admin_dashboard/Routes');
    }

    //Edit Rout
    function edit($id){
        $Route=Route::find($id);
        $stops=Stop::get();
        return view('admin/Route/edit',[
            'Route'=>$Route,
            'stops'=>$stops
        ]);
    }
    function update($id,Request $request){
        $validatedData = \Validator::make($request->all(), [
            'route_name' => 'required|min:3|max:255',
            'route_code' => 'required|min:2|max:255',
            'stops'=>'required'
        ]);
        //check if there is an error
        if($validatedData->fails()){
            return redirect('/admin_dashboard/Routes/edit/'.$id)->withErrors($validatedData)->withInput();
        }
        //extract data from the form
        $_name=$request->route_name;
        $_code=$request->route_code;
        //Select row with ID and update it
        $Route=Route::find($id);
        $Route->route_name=$_name;
        $Route->route_code=$_code;
        $Route->save();
        //add stops to the route
        $Route->stops()->attach($request->stops);

        return redirect('/admin_dashboard/Routes');
    }

    function delete($id){
        $route=Route::find($id);
        $route->delete();
        return redirect('/admin_dashboard/Routes');
    }
}
